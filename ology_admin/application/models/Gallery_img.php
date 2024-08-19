<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery_img extends CI_Model
{

    private $table = 'gallery_img';

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        return $this->db->insert('gallery_img', $data);
    }
    public function getBlog()
    {
        return $this->db->get($this->table)->row();
    }
    public function uploadImages()
    {
        $fileNames = [];
        $fileCount = count($_FILES['images']['name']); // Count the number of files

        // Loop through each file
        for ($i = 0; $i < $fileCount; $i++) {
            $_FILES['image']['name']     = $_FILES['images']['name'][$i];
            $_FILES['image']['type']     = $_FILES['images']['type'][$i];
            $_FILES['image']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
            $_FILES['image']['error']    = $_FILES['images']['error'][$i];
            $_FILES['image']['size']     = $_FILES['images']['size'][$i];

            $fileName = slugify($this->input->post('gallery_name', true)) . '-' . round(microtime(true) * 10);

            $config = [
                'upload_path'   => './images/gallery',
                'file_name'     => $fileName,
                'allowed_types' => 'jpg|jpeg|gif|png|JPG|PNG',
                'max_size'      => '3000',
                'max_width'     => 0,
                'max_height'    => 0,
                'overwrite'     => true,
                'file_ext_tolower' => true
            ];

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                $data['error_string'] = 'Upload error: ' . $this->upload->display_errors('', '');
                exit();
            }

            $fileNames[] = $this->upload->data('file_name'); // Store the uploaded file name
        }

        return $fileNames; // Return an array of file names
    }

    public function getImagesByGalleryId($gallery_id)
    {
        $this->db->where('gallery_fk_id', $gallery_id);
        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            return $query->result();
        }

        return [];
    }
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('gallery_img', $data);
    }
}
