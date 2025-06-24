<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Email_template_model extends CI_Model {

   private $table = 'email_template';
   
   public function getTemplate($id)
   {
      $this->db->from($this->table);
      $this->db->where($this->id, $id);
      return $this->db->get()->row();
   }
   public function update($where, $data)
   {
      $this->db->update($this->table, $data, $where);
      return $this->db->affected_rows();
   }
}

