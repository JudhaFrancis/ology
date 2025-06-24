<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscriptions_model extends CI_Model {

   private $table = 'newsletter';
   
   public function getsubscriptions()
   {
      return $this->db->get($this->table)->result();
   }

}

