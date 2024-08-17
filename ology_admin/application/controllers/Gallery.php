<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery extends CI_Controller
{

   var $table = 'gallery';
   var $id = 'id';
   var $tableJoin = '';
   var $column_search = ['title', 'photo', 'description', 'video',];

   public function __construct()
   {
      parent::__construct();
      $this->load->model('my_model', 'my');
      $this->load->model('menu_model', 'menu', true);
      $this->load->model('gallery_model', 'gallery', true);
      $this->load->model('gallery_img', 'gallery_img', true);
   }

   public function ajax_list()
   {
      $list = $this->my->get_datatables();
      $data = [];
      $no = 1;

      foreach ($list as $li) {
         $row = [];
         $row[] = '<input type="checkbox" class="data-check" value="' . $li->id . '">';
         $row[] = $li->title;

         $description = strlen($li->description) > 100 ? substr($li->description, 0, 100) . '...' : $li->description;
         $row[] = $description;
         $row[] = $li->photo;
         $row[] = $li->video;
         $row[] =
            '<a class="btn btn-sm btn-warning text-white"  href="' . base_url("gallery/update/$li->id") . '"  
                     title="Edit" >
                  <i class="fa fa-pencil-alt mr-1"></i> Edit</a>
   
                     <a class="btn btn-sm btn-danger" href="#" 
                     title="Delete" onclick="delete_gallery(' . "'" . $li->id . "'" . ')">
                     <i class="fa fa-trash mr-1"></i></a>';
         $data[] = $row;
      }

      $output = [
         'draw'            => $_POST['draw'],
         'recordsTotal'    => $this->my->count_all(),
         'recordsFiltered' => $this->my->count_filtered(),
         'data'            => $data
      ];

      echo json_encode($output);
   }

   public function create()
   {
      if (!$_POST) {
         $input = (object) $this->gallery->getDefaultValues();
      } else {
         $input = (object) $this->input->post(null, true);
      }

      $this->form_validation->set_rules('title', 'Title', 'required');
      $this->form_validation->set_rules('description', 'Description', 'required');

      if ($this->form_validation->run() == false) {
         $data['title'] = 'Title Gallery';
         $data['form_action'] = base_url("gallery/create");
         $data['menu'] = $this->menu->getMenu();
         $data['input'] = $input;

         $this->load->view('back/pages/photobooth/gallery_form_post', $data);
      } else {
         $data = [
            'title' => $this->input->post('title', true),
            'description' => $this->input->post('description', true),
         ];

         // Upload image if available
         if (!empty($_FILES['photo']['name'])) {
            $upload_photo = $this->gallery->uploadSingleImage('photo')[0];
            if ($upload_photo) {
               $data['photo'] = $upload_photo;
            } else {
               echo 'Error uploading photo';
            }
         }

         // Upload video if available
         if (!empty($_FILES['video']['name'])) {
            $upload_video = $this->gallery->uploadVideo('video');
            if ($upload_video) {
               $data['video'] = $upload_video;
            } else {
               echo 'Error uploading video';
            }
         }

         // Debugging: Print the $_FILES array
         echo '<pre>';
         print_r($_FILES['images']);
         echo '</pre>';

         // Upload multiple images if available
         if (!empty($_FILES['images']['name'][0])) {
            $upload_images = [];

            if ($upload_images = $this->gallery->uploadMultipleImages('images')) {
               // Store comma-separated filenames in the main table
            } else {
               echo 'Error uploading images';
            }
         }

         $last_id = $this->my->insert($data);

         // Save image filenames to another table if multiple images are uploaded
         if (isset($upload_images) && !empty($upload_images)) {
            foreach ($upload_images as $image) {
               $this->gallery_img->insert([
                  'gallery_fk_id' => $last_id,
                  '	images' => $image
               ]);
            }
         }

         $this->session->set_flashdata('success', 'Post Added Successfully.');
         redirect(base_url('admin/gallery'));
      }
   }






   public function update($id)
   {
      $dataPost = $this->gallery->getGalleryById($id);

      if (!$dataPost) {
         $this->session->set_flashdata('warning', 'Sorry, data could not be found!');
         redirect(base_url('admin/posting'));
      }

      if (!$_POST) {
         $input = $dataPost;
      } else {
         $input = (object) $this->input->post(null, true);
      }

      $this->form_validation->set_rules('title', 'Title', 'required');
      $this->form_validation->set_rules('description', 'Description', 'required');

      if ($this->form_validation->run() == false) {
         $data['title'] = 'Edit gallery';
         $data['form_action'] = base_url("gallery/update/$id");
         $data['menu'] = $this->menu->getMenu();
         $data['input'] = $input;
         $this->load->view('back/pages/photobooth/gallery_form_post', $data);
      } else {

         $data = [
            'title'  => $this->input->post('title', true),
            'description' => $this->input->post('description', true),
         ];


         if (!empty($_FILES['photo']['name'])) {
            $upload = $this->gallery->uploadImage();
            $this->_create_thumbs($upload);
            $gallery = $this->my->get_by_id($id);

            if (file_exists('images/gallery/' . $gallery->photo) && $gallery->photo) {
               unlink('images/gallery/' . $gallery->photo);
               unlink('images/gallery/large/' . $gallery->photo);
               unlink('images/gallery/medium/' . $gallery->photo);
               unlink('images/gallery/small/' . $gallery->photo);
               unlink('images/gallery/xsmall/' . $gallery->photo);
            }

            $data['photo'] = $upload;
         }

         $this->my->update(['id' => $id], $data);
         $this->session->set_flashdata('success', 'Post was successfully updated.');

         redirect(base_url('admin/gallery'));
      }
   }

   public function get_data()
   {
      $data = $this->my->get_by_id($this->input->post('id', true));
      echo json_encode($data);
   }


   public function delete()
   {
      $id = $this->input->post('id', true);
      $gallery = $this->my->get_by_id($id);

      if (file_exists('images/gallery/' . $gallery->photo) && $gallery->photo) {
         unlink('images/gallery/' . $gallery->photo);
         unlink('images/gallery/large/' . $gallery->photo);
         unlink('images/gallery/medium/' . $gallery->photo);
         unlink('images/gallery/small/' . $gallery->photo);
         unlink('images/gallery/xsmall/' . $gallery->photo);
      }

      $this->my->delete($id);
      echo json_encode(["status" => TRUE]);
   }

   public function bulk_delete()
   {
      $list_id = $this->input->post('id', true);

      foreach ($list_id as $id) {
         $gallery = $this->my->get_by_id($id);

         if (file_exists('images/gallery/' . $gallery->photo) && $gallery->photo) {
            unlink('images/gallery/' . $gallery->photo);
            unlink('images/gallery/large/' . $gallery->photo);
            unlink('images/gallery/medium/' . $gallery->photo);
            unlink('images/gallery/small/' . $gallery->photo);
            unlink('images/gallery/xsmall/' . $gallery->photo);
         }

         $this->my->delete($id);
      }

      echo json_encode(["status" => TRUE]);
   }
}

/* End of file Home.php */
