<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Identity extends CI_Controller
{

   var $table = 'identity';
   var $id = 'id';
   var $tableJoin = '';
   var $column_order = [];
   var $column_search = [];

   public function __construct()
   {
      parent::__construct();
      $this->load->model('my_model', 'my', true);
      $this->load->model('menu_model', 'menu', true);
      $this->load->model('identity_model', 'identity', true);
   }

   public function ajax_list()
   {
      $list = $this->my->get_datatables();
      $data = [];
      $no = $_POST['start'];

      foreach ($list as $li) {
         $no++;
         $row = [];
         $row[] = $no++;
         $row[] = $li->Title;
         $row[] = $li->description;
         $row[] =
            '<a class="btn btn-sm btn-warning text-white"  href="' . base_url("back/identity/update/$li->id") . '"  
                  title="Edit" >
			      <i class="fa fa-pencil-alt mr-1"></i> Edit</a>

         <a class="btn btn-sm btn-danger" href="#" 
		   title="Delete" onclick="delete_banner(' . "'" . $li->id . "'" . ')">
		   <i class="fa fa-trash mr-1"></i> Delete</a>';
         $data[] = $row;
      }

      $output = [
         'draw' => $_POST['draw'],
         'recordsTotal' => $this->my->count_all(),
         'recordsFiltered' => $this->my->count_filtered(),
         'data' => $data
      ];

      echo json_encode($output);
   }

   public function get_data()
   {
      $data = $this->my->get_by_id($this->input->post('id', true));
      echo json_encode($data);
   }

   public function create()
   {
      if (!$_POST) {
         $input = (object) $this->identity->getDefaultValues();
      } else {
         $input = (object) $this->input->post(null, true);
      }

      $this->form_validation->set_rules('Title', 'Title', 'required');
      $this->form_validation->set_rules('describtion', 'Describtion', 'required');

      if ($this->form_validation->run() == false) {
         $data['title'] = 'Title banner';
         $data['form_action'] = base_url("back/identity/create");
         $data['menu'] = $this->menu->getMenu();
         $data['input'] = $input;
         $this->load->view('back/pages/web/gallery_form_post', $data);
      } else {

         $data = [
            'Title' => $this->input->post('Title', true),
            'describtion' => $this->input->post('Describtion', true),
         ];


         if (!empty($_FILES['photo']['name'])) {
            $upload = $this->banner->uploadImage();
            $this->_create_thumbs($upload);
            $data['photo'] = $upload;
         }

         $this->my->save($data);
         $this->session->set_flashdata('success', 'Post Added Successfully..');

         redirect(base_url('admin/banner'));
      }
   }

   public function update()
   {
      if (!$_POST) {
         $input = (object) $this->identity->getDefaultValues();
      } else {
         $input = (object) $this->input->post(null, true);
      }

      $this->form_validation->set_rules('Title', 'Title', 'required');
      $this->form_validation->set_rules('describtion', 'Describtion', 'required');

      if ($this->form_validation->run() == false) {
         $data['title'] = 'Title banner';
         $data['form_action'] = base_url("back/identity/create");
         $data['menu'] = $this->menu->getMenu();
         $data['input'] = $input;
         $this->load->view('back/pages/web/gallery_form_post', $data);
      } else {

         $data = [
            'Title' => $this->input->post('Title', true),
            'describtion' => $this->input->post('Describtion', true),
         ];


         if (!empty($_FILES['photo']['name'])) {
            $upload = $this->banner->uploadImage();
            $this->_create_thumbs($upload);
            $data['photo'] = $upload;
         }

         $this->my->save($data);
         $this->session->set_flashdata('success', 'Post Added Successfully..');

         redirect(base_url('admin/banner'));
      }
   }
}

/* End of file Identity.php */
