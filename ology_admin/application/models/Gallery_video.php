<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery_video extends CI_Model
{

    private $table = 'gallery_video';

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        return $this->db->insert('gallery_video', $data);
    }
    public function getBlog()
    {
        return $this->db->get($this->table)->row();
    }

    public function getvideosByGalleryId($gallery_id)
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
        return $this->db->update('gallery_video', $data);
    }
    public function delete($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->delete($this->table);
    }
    public function getGalleryvideoById($id)
    {
        $this->db->from('gallery_video');
        $this->db->where('gallery_video.id', $id);
        return $this->db->get()->row();
    }
}
