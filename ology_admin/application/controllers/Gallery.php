<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery extends CI_Controller
{

   var $table = 'gallery';
   var $id = 'id';
   var $tableJoin = '';
   var $column_search = ['title', 'photo', 'description',];

   public function __construct()
   {
      parent::__construct();
      $this->load->model('my_model', 'my');
      $this->load->model('menu_model', 'menu', true);
      $this->load->model('gallery_model', 'gallery', true);
      $this->load->model('gallery_img', 'gallery_img', true);
      $this->load->model('gallery_video', 'gallery_video', true);
      $this->load->library('session');
   }

   public function ajax_list()
   {
      $list = $this->my->get_datatables();
      $data = [];
      $no = 1;

      foreach ($list as $li) {
         $row = [];
         $row[] = '<input type="checkbox" class="data-check" value="' . $li->id . '">';
         $title = strlen($li->title) > 20 ? substr($li->title, 0, 20) . '...' : $li->title;
         $row[] = $title;
         $description = strlen($li->description) > 50 ? substr($li->description, 0, 50) . '...' : $li->description;
         $row[] = $description;
         $photo = strlen($li->photo) > 20 ? substr($li->photo, 0, 20) . '...' : $li->photo;
         $row[] = $photo;
         $row[] =
            '<a class="btn btn-sm btn-warning text-white"  href="' . base_url("gallery/update/$li->id") . '"  
                     title="Edit" >
                  <i class="fa fa-pencil-alt mr-1"></i> </a>
   
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
         if (!empty($_FILES['photo']['name'])) {
            $upload = $this->gallery->uploadImage();
            $data['photo'] = $upload;
         }
         $youtubeUrls = $this->input->post('video_urls', true);
         if (!empty($youtubeUrls)) {
            $uploadvideos = $this->gallery->uploadvideo();
         }

         $upload_images = [];
         if (!empty($_FILES['images']['name'][0])) {
            foreach ($_FILES['images']['name'] as $key => $image) {
               $_FILES['image']['name'] = $_FILES['images']['name'][$key];
               $_FILES['image']['type'] = $_FILES['images']['type'][$key];
               $_FILES['image']['tmp_name'] = $_FILES['images']['tmp_name'][$key];
               $_FILES['image']['error'] = $_FILES['images']['error'][$key];
               $_FILES['image']['size'] = $_FILES['images']['size'][$key];

               $upload_image = $this->gallery->uploadSingleImage('image');
               if ($upload_image) {
                  $upload_images[] = $upload_image[0];
               }
            }
         }

         $last_id = $this->my->insert($data);

         if (!empty($uploadvideos)) {
            foreach ($uploadvideos as $video_url) {
               if (!empty($video_url)) {
                  $this->gallery_video->insert([
                     'gallery_fk_id' => $last_id,
                     'video_url' => $video_url
                  ]);
               }
            }
         }
         if (!empty($upload_images)) {
            foreach ($upload_images as $image) {
               $this->gallery_img->insert([
                  'gallery_fk_id' => $last_id,
                  'images' => $image
               ]);
            }
            $this->session->set_flashdata('success', 'Post Added Successfully..');
            redirect(base_url('admin/gallery'));
         }
         $this->session->set_flashdata('success', 'Post Added Successfully..');
         redirect(base_url('admin/gallery'));
      }
   }

   public function update($id)
   {
      $dataPost = $this->gallery->getGalleryById($id);

      if (!$dataPost) {
         $this->session->set_flashdata('warning', 'Sorry, data could not be found!');
         redirect(base_url('admin/gallery'));
      }

      if (!$_POST) {
         $input = $dataPost;
      } else {
         $input = (object) $this->input->post(null, true);
      }

      $this->form_validation->set_rules('title', 'Title', 'required');

      if ($this->form_validation->run() == false) {
         $data['title'] = 'Edit Gallery';
         $data['form_action'] = base_url("gallery/update/$id");
         $data['menu'] = $this->menu->getMenu();
         $data['input'] = $input;
         $this->load->view('back/pages/photobooth/gallery_form_post', $data);
      } else {
         $data = [
            'title' => $this->input->post('title', true),
            'description' => $this->input->post('description', true),
         ];

         if (!empty($_FILES['photo']['name'])) {
            $upload = $this->gallery->uploadImage();
            $data['photo'] = $upload;
            $gallery = $this->gallery->getGalleryById($id);
            if (file_exists('images/gallery/' . $gallery->photo) && $gallery->photo) {
               unlink('images/gallery/' . $gallery->photo);
            }
            $data['photo'] = $upload;
         }

         $youtubeUrls = $this->input->post('video_urls', true);
         if (!empty($youtubeUrls)) {
            $uploadvideos = $this->gallery->uploadvideo();
         }
         if (!empty($uploadvideos)) {
            foreach ($uploadvideos as $video_url) {
               if (!empty($video_url)) {
                  $this->gallery_video->insert([
                     'gallery_fk_id' => $id,
                     'video_url' => $video_url
                  ]);
               }
            }
         }
         $upload_images = [];
         if (!empty($_FILES['images']['name'][0])) {
            foreach ($_FILES['images']['name'] as $key => $image) {
               $_FILES['image']['name'] = $_FILES['images']['name'][$key];
               $_FILES['image']['type'] = $_FILES['images']['type'][$key];
               $_FILES['image']['tmp_name'] = $_FILES['images']['tmp_name'][$key];
               $_FILES['image']['error'] = $_FILES['images']['error'][$key];
               $_FILES['image']['size'] = $_FILES['images']['size'][$key];

               $upload_image = $this->gallery->uploadSingleImage('image');
               if ($upload_image) {
                  $upload_images[] = $upload_image[0];
               }
            }
            $gallery_images = $this->gallery->getimagesByGalleryId($id);
            
            if (file_exists('images/gallery/' . $gallery_images->images) && $gallery_images->images) {
               unlink('images/gallery/' . $gallery_images->images);
            }
            if (!empty($upload_images)) {
               foreach ($upload_images as $image) {
                  $this->gallery_img->insert([
                     'gallery_fk_id' => $id,
                     'images' => $image
                  ]);
               }
            }
         }

         $this->gallery->update($id, $data);

         $this->session->set_flashdata('success', 'Post Updated Successfully..');
         redirect(base_url('admin/gallery'));
      }
   }
   public function _create_thumbs($file_name)
   {
      $config = [
         // Large Image
         [
            'image_library'   => 'GD2',
            'source_image'      => './images/gallery/' . $file_name,
            'maintain_ratio'   => TRUE,
            'width'            => 770,
            'height'            => 450,
            'new_image'         => './images/gallery/large/' . $file_name
         ],
         // Medium Image
         [
            'image_library'   => 'GD2',
            'source_image'      => './images/gallery/' . $file_name,
            'maintain_ratio'   => FALSE,
            'width'            => 300,
            'height'            => 188,
            'new_image'         => './images/gallery/medium/' . $file_name
         ],
         // Small Image
         [
            'image_library'   => 'GD2',
            'source_image'      => './images/gallery/' . $file_name,
            'maintain_ratio'   => FALSE,
            'width'            => 270,
            'height'            => 169,
            'new_image'         => './images/gallery/small/' . $file_name
         ],
         // XSmall Image
         [
            'image_library'   => 'GD2',
            'source_image'      => './images/gallery/' . $file_name,
            'maintain_ratio'   => FALSE,
            'width'            => 170,
            'height'            => 100,
            'new_image'         => './images/gallery/xsmall/' . $file_name
         ],
      ];

      $this->load->library('image_lib', $config[0]);

      foreach ($config as $item) {
         $this->image_lib->initialize($item);

         if (!$this->image_lib->resize()) {
            return false;
         }

         $this->image_lib->clear();
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

      if ($gallery) {
         // Delete the photo file if it exists
         if (file_exists('images/gallery/' . $gallery->photo) && $gallery->photo) {
            unlink('images/gallery/' . $gallery->photo);
            // Optionally unlink other image sizes if they exist
            // unlink('images/gallery/large/' . $gallery->photo);
            // unlink('images/gallery/medium/' . $gallery->photo);
            // unlink('images/gallery/small/' . $gallery->photo);
            // unlink('images/gallery/xsmall/' . $gallery->photo);
         }

         $this->my->delete($id);
      }
      echo json_encode(["status" => TRUE]);
   }

   public function bulk_delete()
   {
      $list_id = $this->input->post('id', true);

      foreach ($list_id as $id) {
         $gallery = $this->my->get_by_id($id);

         if (file_exists('images/gallery/' . $gallery->photo) && $gallery->photo) {
            unlink('images/gallery/' . $gallery->photo);
            // unlink('images/gallery/large/' . $gallery->photo);
            // unlink('images/gallery/medium/' . $gallery->photo);
            // unlink('images/gallery/small/' . $gallery->photo);
            // unlink('images/gallery/xsmall/' . $gallery->photo);
         }

         $this->my->delete($id);
      }

      echo json_encode(["status" => TRUE]);
   }

   public function deleteByGalleryId($id)
   {
      $this->load->database();

      if (empty($id) || !is_numeric($id)) {
         return false;
      }

      $this->db->where('gallery_fk_id', $id);
      $deleted = $this->db->delete('video_url');

      if ($deleted) {
         return true;
      } else {
         return false;
      }
   }
}

/* End of file Home.php */
