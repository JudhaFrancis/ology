<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Posting extends CI_Controller {

	var $table = 'posting';
	var $tableJoin = 'category';
	var $id = 'id';
	var $select = ['posting.*','category.category_name AS category'];
	var $column_order = ['posting.id','posting.event_name', 'posting.description', 'posting.event_date', 'posting.venue', 'category.category_name', 'posting.address', 'posting.reg_link', 'posting.event_image'];
	var $column_search = ['posting.title', 'posting.event_name','posting.description', 'posting.event_date', 'posting.venue', 'category.category_name', 'posting.address', 'posting.reg_link', 'posting.event_image'];

	public function __construct()
	{
		parent::__construct();
		$this->load->model('my_model', 'my', true);
		$this->load->model('posting_model', 'posting', true);
		$this->load->model('menu_model', 'menu', true);
        $this->load->model('category_model', 'category', true);	
	}
	
	public function ajax_list()
    {
      $list = $this->my->get_datatables($this->tableJoin, $this->select);
      $data = [];
      foreach($list as $li){
			$row = [];
			$row[] = '<input type="checkbox" class="data-check" value="' . $li->id . '">';
			$row[] = $li->event_name;
			$description = strlen($li->description) > 20 ? substr($li->description, 0, 20) . '...' : $li->description;
            $row[] = $description;
			$row[] = $li->event_date;
			$row[] = $li->venue;
			$address = strlen($li->address) > 20 ? substr($li->address, 0, 20) . '...' : $li->address;
            $row[] = $address;
			$reg_link = strlen($li->reg_link) > 20 ? substr($li->reg_link, 0, 20) . '...' : $li->reg_link;
            $row[] = $reg_link;
			$photo = strlen($li->photo) > 20 ? substr($li->photo, 0, 20) . '...' : $li->photo;
            $row[] = $photo;

         $row[] = 
         '<a class="btn btn-sm btn-warning text-white" href="'.base_url("back/posting/update/$li->id").'" 
         title="Edit">
			<i class="fa fa-pencil-alt mr-1"></i></a>

			<a class="btn btn-sm btn-danger" href="#" 
			title="Delete" onclick="delete_posting('."'".$li->id."'".')">
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

	public function get_data()
   {
      $data = $this->my->get_by_id($this->input->post('id', true));
      echo json_encode($data);
	}

	public function create()
	{
		if(!$_POST){
			$input = (object) $this->posting->getDefaultValues();
		}else{
			$input = (object) $this->input->post(null, true);
		}

		$this->form_validation->set_rules('event_name','Event Name','required');
		$this->form_validation->set_rules('description','Description','required');
		$this->form_validation->set_rules('event_date','Event Date','required');
		$this->form_validation->set_rules('venue','Venue','required');
		$this->form_validation->set_rules('address','Address','required');
		$this->form_validation->set_rules('starting_time','Starting Time','required');
		$this->form_validation->set_rules('ending_time','Ending Time','required');
		$this->form_validation->set_rules('id_category','Category','required');

		if($this->form_validation->run() == false){
			$data['title'] = 'Tambah Posting';
			$data['form_action'] = base_url("back/posting/create");
			$data['menu'] = $this->menu->getMenu();
			$data['category'] = $this->category->getCategory();
			
			$data['input'] = $input;
			$this->load->view('back/pages/article/form_post', $data);
		}else{
			
			$data = [
				'event_name'          => $this->input->post('event_name', true),
				'description'         => $this->input->post('description', true),
				'event_date'          => $this->input->post('event_date', true),
				'starting_time'       => $this->input->post('starting_time', true),
				'ending_time'         => $this->input->post('ending_time', true),
				'venue'               => $this->input->post('venue', true),
				'address'             => $this->input->post('address', true),
				'id_category'         => $this->input->post('id_category', true),
				'reg_link'            => $this->input->post('reg_link', true),
				'registration_amount' => $this->input->post('registration_amount', true),
			];

			
			if(!empty($_FILES['photo']['name'])){
				$upload = $this->posting->uploadImage();
				$this->_create_thumbs($upload);	
				$data['photo'] = $upload;
			}
			
			$this->my->save($data);
			$this->session->set_flashdata('success', 'Post Added Successfully..');

			redirect(base_url('admin/posting'));
		}

	}

	public function update($id)
	{
		$dataPost = $this->posting->getPostingById($id);

		if(!$dataPost){
			$this->session->set_flashdata('warning','Sorry, data could not be found!');
			redirect(base_url('admin/posting'));
		}

		if(!$_POST){
			$input = $dataPost;
		}else{
			$input = (object) $this->input->post(null, true);
		}

		$this->form_validation->set_rules('event_name','Event Name','required');
		$this->form_validation->set_rules('description','Description','required');
		$this->form_validation->set_rules('event_date','Event Date','required');
		$this->form_validation->set_rules('venue','Venue','required');
		$this->form_validation->set_rules('address','Address','required');
		$this->form_validation->set_rules('starting_time','Starting Time','required');
		$this->form_validation->set_rules('ending_time','Ending Time','required');
		$this->form_validation->set_rules('id_category','Category','required');

		if($this->form_validation->run() == false){
			$data['title'] = 'Edit Posting';
			$data['form_action'] = base_url("back/posting/update/$id");
			$data['menu'] = $this->menu->getMenu();
			$data['category'] = $this->category->getCategory();
			$data['input'] = $input;
			$this->load->view('back/pages/article/form_post', $data);
		}else{
			
			$data = [
				'event_name'          => $this->input->post('event_name', true),
				'description'         => $this->input->post('description', true),
				'event_date'          => $this->input->post('event_date', true),
				'starting_time'       => $this->input->post('starting_time', true),
				'ending_time'         => $this->input->post('ending_time', true),
				'venue'               => $this->input->post('venue', true),
				'address'             => $this->input->post('address', true),
				'id_category'         => $this->input->post('id_category', true),
				'reg_link'            => $this->input->post('reg_link', true),
				'registration_amount' => $this->input->post('registration_amount', true),
			];


			if(!empty($_FILES['photo']['name'])){
				$upload = $this->posting->uploadImage();
				$this->_create_thumbs($upload);
				$posting = $this->my->get_by_id($id);

				if(file_exists('images/posting/' . $posting->photo) && $posting->photo){
					unlink('images/posting/' . $posting->photo);
					unlink('images/posting/large/' . $posting->photo);
					unlink('images/posting/medium/' . $posting->photo);
					unlink('images/posting/small/' . $posting->photo);
					unlink('images/posting/xsmall/' . $posting->photo);
				}

				$data['photo'] = $upload;
			}

			$this->my->update(['id' => $id], $data);
			$this->session->set_flashdata('success', 'Post was successfully updated.');

			redirect(base_url('admin/posting'));
		}

	}

	public function _create_thumbs($file_name)
	{
		$config = [
			// Large Image
			[
				'image_library'	=> 'GD2',
				'source_image'		=> './images/posting/' . $file_name,
				'maintain_ratio'	=> TRUE,
				'width'				=> 770,
				'height'				=> 450,
				'new_image'			=> './images/posting/large/' . $file_name
			],
			// Medium Image
			[
				'image_library'	=> 'GD2',
				'source_image'		=> './images/posting/' . $file_name,
				'maintain_ratio'	=> FALSE,
				'width'				=> 300,
				'height'				=> 188,
				'new_image'			=> './images/posting/medium/' . $file_name
			],
			// Small Image
			[
				'image_library'	=> 'GD2',
				'source_image'		=> './images/posting/' . $file_name,
				'maintain_ratio'	=> FALSE,
				'width'				=> 270,
				'height'				=> 169,
				'new_image'			=> './images/posting/small/' . $file_name
			],
			// XSmall Image
			[
				'image_library'	=> 'GD2',
				'source_image'		=> './images/posting/' . $file_name,
				'maintain_ratio'	=> FALSE,
				'width'				=> 170,
				'height'				=> 100,
				'new_image'			=> './images/posting/xsmall/' . $file_name
			],
		];

		$this->load->library('image_lib', $config[0]);

		foreach ($config as $item){
			$this->image_lib->initialize($item);

			if(!$this->image_lib->resize()){
				return false;
			}

			$this->image_lib->clear();
		}
	}
	
	public function delete(){
		$id = $this->input->post('id', true);
		$posting = $this->my->get_by_id($id);

		if(file_exists('images/posting/' . $posting->photo) && $posting->photo){
			unlink('images/posting/' . $posting->photo);
			unlink('images/posting/large/' . $posting->photo);
			unlink('images/posting/medium/' . $posting->photo);
			unlink('images/posting/small/' . $posting->photo);
			unlink('images/posting/xsmall/' . $posting->photo);
		}

		$this->my->delete($id);
		echo json_encode(["status" => TRUE]);
	}

	public function bulk_delete()
	{
		$list_id = $this->input->post('id', true);
		
		foreach ($list_id as $id){
			$posting = $this->my->get_by_id($id);
	
			if(file_exists('images/posting/' . $posting->photo) && $posting->photo){
				unlink('images/posting/' . $posting->photo);
				unlink('images/posting/large/' . $posting->photo);
				unlink('images/posting/medium/' . $posting->photo);
				unlink('images/posting/small/' . $posting->photo);
				unlink('images/posting/xsmall/' . $posting->photo);
			}

			$this->my->delete($id);
		}

		echo json_encode(["status" => TRUE]);
	}


}

/* End of file Posting.php */
