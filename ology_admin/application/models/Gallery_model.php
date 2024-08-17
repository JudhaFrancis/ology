<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery_model extends CI_Model
{

   private $table = 'gallery';
   public function getGallery()
   {
      return $this->db->get($this->table)->row();
   }

   public function getGalleryById($id)
   {
      $this->db->from('gallery');
      $this->db->where('gallery.id', $id);
      return $this->db->get()->row();
   }
<<<<<<< HEAD
   public function uploadImage()
   {
      $fileName = slugify($this->input->post('gallery_name', true));

      $config = [
         'upload_path' => './images/gallery',
         'file_name' => $fileName . '-' . round(microtime(true) * 10),
         'allowed_types' => 'jpg|jpeg|gif|png|JPG|PNG',
         'max_size' => '3000',
         'max_width' => 0,
         'max_height' => 0,
         'overwrite' => true,
         'file_ext_tolower' => true
      ];

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('photo')) {
         $data['error_string'] = 'Upload error: ' . $this->upload->display_errors('', '');
         exit();
      }
      return $this->upload->data('file_name');
   }

   public function uploadVideo()
   {
      $fileName = slugify($this->input->post('gallery_name', true));

      $config = [
         'upload_path' => './videos/gallery',
         'file_name' => $fileName . '-' . round(microtime(true) * 10),
         'allowed_types' => 'mp4|avi|mov|wmv|flv',
         'max_size' => '50000', // Set the size limit in kilobytes
         'overwrite' => true,
         'file_ext_tolower' => true
      ];

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('video')) {
         $data['error_string'] = 'Upload error: ' . $this->upload->display_errors('', '');
         exit();
      }
      return $this->upload->data('file_name');
   }
=======
   public function uploadSingleImage($file_input_name) {
      $uploadedFiles = [];
      $errors = [];
  
      $file = $_FILES[$file_input_name];
      
      $_FILES['file']['name'] = $file['name'];
      $_FILES['file']['type'] = $file['type'];
      $_FILES['file']['tmp_name'] = $file['tmp_name'];
      $_FILES['file']['error'] = $file['error'];
      $_FILES['file']['size'] = $file['size'];
  
      $config = [
          'upload_path' => './images/gallery',
          'file_name' => 'img-' . round(microtime(true) * 10),
          'allowed_types' => 'jpg|jpeg|gif|png|JPG|PNG',
          'max_size' => '3000',
          'max_width' => 0,
          'max_height' => 0,
          'overwrite' => false,
          'file_ext_tolower' => true
      ];
  
      $this->load->library('upload', $config);
  
      if ($this->upload->do_upload('file')) {
          $uploadedFiles[] = $this->upload->data('file_name');
      } else {
          $errors[] = $this->upload->display_errors('', '');
      }
  
      // Debugging: Print any errors encountered during upload
      if (!empty($errors)) {
          print_r($errors);
          $this->session->set_flashdata('image_errors', $errors);
          return null;
      }
  
      return $uploadedFiles;
  }
public function uploadMultipleImages($file_input_name) {
    $uploadedFiles = [];
    $errors = [];
    $files = $_FILES[$file_input_name];

    if (is_array($files['name'])) {
        $fileCount = count($files['name']);
        for ($i = 0; $i < $fileCount; $i++) {
            $_FILES['file']['name'] = $files['name'][$i];
            $_FILES['file']['type'] = $files['type'][$i];
            $_FILES['file']['tmp_name'] = $files['tmp_name'][$i];
            $_FILES['file']['error'] = $files['error'][$i];
            $_FILES['file']['size'] = $files['size'][$i];

            $config = [
                'upload_path' => './images/gallery',
                'file_name' => 'img-' . round(microtime(true) * 10) . '-' . $i,
                'allowed_types' => 'jpg|jpeg|gif|png|JPG|PNG',
                'max_size' => '3000',
                'max_width' => 0,
                'max_height' => 0,
                'overwrite' => false,
                'file_ext_tolower' => true
            ];

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file')) {
                $uploadedFiles[] = $this->upload->data('file_name');
            } else {
                $errors[] = $this->upload->display_errors('', '');
            }
        }
    } else {
        // If no files are found, return errors or handle accordingly
        $errors[] = 'No files found.';
    }

    // Debugging: Print any errors encountered during upload
    if (!empty($errors)) {
        print_r($errors);
        $this->session->set_flashdata('image_errors', $errors);
        return null;
    }

    return $uploadedFiles;
}
  
  
  

  public function uploadVideo($input_name) {
   $upload_path = './uploads/videos/';
   
   // Check if upload path exists, if not, attempt to create it
   if (!is_dir($upload_path)) {
       if (!mkdir($upload_path, 0755, true)) {
           // Handle directory creation failure
           echo '<pre>';
           echo 'Failed to create upload directory.';
           echo '</pre>';
           return false;
       }
   }

   $config['upload_path'] = $upload_path;
   $config['allowed_types'] = 'mp4|avi|mov|wmv';
   $config['max_size'] = 10000; // Adjust size limit as needed

   $this->load->library('upload');
   $this->upload->initialize($config);

   if ($this->upload->do_upload($input_name)) {
       $uploaded_data = $this->upload->data();
       return $uploaded_data['file_name'];
   } else {
       // Print any upload errors
       echo '<pre>';
       print_r($this->upload->display_errors());
       echo '</pre>';
       return false;
   }
}

>>>>>>> e72e25269d796f01cdc27ada424e4cf2dc2039d1
   
   public function deleteImage($fileName)
   {
      if (file_exists("./images/gallery/$fileName")) {
         unlink("./images/gallery/$fileName");
      }
   }

   public function getDefaultValues()
   {
      return [
         'title' => '',
         'description' => '',
         'photo' => '',
         'video_url' => '',
      ];
   }
}

/* End of file Gallery_model.php */
