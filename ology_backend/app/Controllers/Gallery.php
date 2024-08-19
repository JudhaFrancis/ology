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

         // Upload single image if available
         if (!empty($_FILES['photo']['name'])) {
            $upload_photo = $this->gallery->uploadSingleImage('photo');
            if ($upload_photo) {
               $data['photo'] = $upload_photo[0];
            } else {
               echo json_encode([
                  'status' => 'error',
                  'message' => 'Error uploading photo'
               ]);
               return;
            }
         }

         // Upload video if available
         if (!empty($_FILES['video']['name'])) {
            $upload_video = $this->gallery->uploadVideo('video');
            if ($upload_video) {
               $data['video'] = $upload_video;
            } else {
               echo json_encode([
                  'status' => 'error',
                  'message' => 'Error uploading video'
               ]);
               return;
            }
         }

         // Upload multiple images if available
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
               } else {
                  echo json_encode([
                     'status' => 'error',
                     'message' => 'Error uploading image: ' . $_FILES['image']['name']
                  ]);
                  return;
               }
            }
         }

         $last_id = $this->my->insert($data);

         // Save individual image filenames to another table if multiple images are uploaded
         if (!empty($upload_images)) {
            foreach ($upload_images as $image) {
               $this->gallery_img->insert([
                  'gallery_fk_id' => $last_id,
                  'images' => $image
               ]);
            }
         }

         // Return success response
         echo json_encode([
            'status' => 'success',
            'message' => 'Post Added Successfully.'
         ]);
         return;
      }
   }



   public function update($id)
   {
      // Fetch existing gallery data
      $dataPost = $this->gallery->getGalleryById($id);

      if (!$dataPost) {
         $this->session->set_flashdata('warning', 'Sorry, data could not be found!');
         redirect(base_url('admin/gallery'));
      }

      if (!$_POST) {
         $input = $dataPost;
         $input->gallery_images = $this->gallery_img->getImagesByGalleryId($id); // Get existing images
      } else {
         $input = (object) $this->input->post(null, true);
         $input->gallery_images = $this->gallery_img->getImagesByGalleryId($id); // Keep existing images in the input object
      }

      // Form validation
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
            'title' => $this->input->post('title', true),
            'description' => $this->input->post('description', true),
         ];

         // Handle photo upload and replacement
         if (!empty($_FILES['photo']['name'])) {
            $upload = $this->gallery->uploadSingleImage('photo');
            if ($upload) {
               $data['photo'] = $upload[0];
               $gallery = $this->gallery->get_by_id($id);

               if (file_exists('images/gallery/' . $gallery->photo) && $gallery->photo) {
                  unlink('images/gallery/' . $gallery->photo);
               }
            } else {
               $this->session->set_flashdata('error', 'Error uploading photo.');
               redirect(current_url());
            }
         }

         // Handle new image uploads
         $new_images = [];
         if (!empty($_FILES['images']['name'][0])) {
            foreach ($_FILES['images']['name'] as $key => $image) {
               $_FILES['image']['name'] = $_FILES['images']['name'][$key];
               $_FILES['image']['type'] = $_FILES['images']['type'][$key];
               $_FILES['image']['tmp_name'] = $_FILES['images']['tmp_name'][$key];
               $_FILES['image']['error'] = $_FILES['images']['error'][$key];
               $_FILES['image']['size'] = $_FILES['images']['size'][$key];

               $upload_image = $this->gallery->uploadSingleImage('image');
               if ($upload_image) {
                  $new_images[] = $upload_image[0];
               } else {
                  $this->session->set_flashdata('error', 'Error uploading image: ' . $_FILES['image']['name']);
                  redirect(current_url());
               }
            }
         }

         // Update gallery record
         $this->gallery->update($id, $data);  // Ensure this method exists and $id is not an array

         // Remove old images if any
         if (!empty($this->input->post('remove_images'))) {
            $remove_images = $this->input->post('remove_images');
            foreach ($remove_images as $img_id) {
               $img_data = $this->gallery_img->get_by_id($img_id);
               if (file_exists('images/gallery/' . $img_data->images)) {
                  unlink('images/gallery/' . $img_data->images);
               }
               $this->gallery_img->delete($img_id);
            }
         }

         // Add new images
         if (!empty($new_images)) {
            foreach ($new_images as $image) {
               $this->gallery_img->insert([
                  'gallery_fk_id' => $id,
                  'images' => $image
               ]);
            }
         }

         //   $this->session->set_flashdata('success', 'Gallery updated successfully.');
         //   redirect(base_url('admin/gallery'));
         echo json_encode([
            'status' => 'success',
            'message' => 'Post Added Successfully.'
         ]);
         return;
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
