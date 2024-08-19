<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Banner extends CI_Controller
{

	var $table = 'banner';
	var $id = 'id';
	var $tableJoin = '';
	var $column_search = ['title', 'author', 'photo', 'describtion', 'published_date', 'created_at'];
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('my_model', 'my');
		$this->load->model('menu_model', 'menu', true);
		$this->load->model('banner_model', 'banner', true);
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
			$row[] = $li->author;

			$description = strlen($li->describtion) > 100 ? substr($li->describtion, 0, 100) . '...' : $li->describtion;
            $row[] = $description;

			$row[] = $li->published_date;

			if ($li->photo) {
				$row[] = '<a href="' . base_url('images/banner/' . $li->photo) . '" target="_blank"><img src="' . base_url('images/banner/' . $li->photo) . '" class="img-responsive" style="max-height:250px; max-width:650px;"/></a>';
			} else {
				$row[] = '(No photo)';
			}

			$row[] = 
                    '<a class="btn btn-sm btn-warning text-white"  href="'.base_url("back/banner/update/$li->id").'"  
                    title="Edit" >
			        <i class="fa fa-pencil-alt mr-1"></i> Edit</a>

		            <a class="btn btn-sm btn-danger" href="#" 
		            title="Delete" onclick="delete_banner('."'".$li->id."'".')">
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

	public function create_blog()
	{
		if (!$_POST) {
			$input = (object) $this->banner->getDefaultValues();
		} else {
			$input = (object) $this->input->post(null, true);
		}

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('author', 'Author', 'required');
		$this->form_validation->set_rules('published_date', 'published_date', 'required');
		$this->form_validation->set_rules('describtion', 'Describtion', 'required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Title banner';
			$data['form_action'] = base_url("back/banner/create_blog");
			$data['menu'] = $this->menu->getMenu();
			$data['input'] = $input;
			$this->load->view('back/pages/article/banner_form_post', $data);
		} else {

			$data = [
				'title'  => $this->input->post('title', true),
				'author' => $this->input->post('author', true),
				'published_date' => $this->input->post('published_date', true),
				'describtion' => $this->input->post('describtion', true),
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

	public function update($id)
	{
		$dataPost = $this->banner->getBannerById($id);

		if(!$dataPost){
			$this->session->set_flashdata('warning','Sorry, data could not be found!');
			redirect(base_url('admin/posting'));
		}

		if(!$_POST){
			$input = $dataPost;
		}else{
			$input = (object) $this->input->post(null, true);
		}

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('author', 'Author', 'required');
		$this->form_validation->set_rules('published_date', 'published_date', 'required');
		$this->form_validation->set_rules('describtion', 'Describtion', 'required');

		if($this->form_validation->run() == false){
			$data['title'] = 'Edit banner';
			$data['form_action'] = base_url("back/banner/update/$id");
			$data['menu'] = $this->menu->getMenu();
			$data['input'] = $input;
			$this->load->view('back/pages/article/banner_form_post', $data);
		}else{
			
			$data = [
				'title'  => $this->input->post('title', true),
				'author' => $this->input->post('author', true),
				'published_date' => $this->input->post('published_date', true),
				'describtion' => $this->input->post('describtion', true),
			];


			if(!empty($_FILES['photo']['name'])){
				$upload = $this->banner->uploadImage();
				$this->_create_thumbs($upload);
				$banner = $this->my->get_by_id($id);

				if(file_exists('images/banner/' . $banner->photo) && $banner->photo){
					unlink('images/banner/' . $banner->photo);
					unlink('images/banner/large/' . $banner->photo);
					unlink('images/banner/medium/' . $banner->photo);
					unlink('images/banner/small/' . $banner->photo);
					unlink('images/banner/xsmall/' . $banner->photo);
				}

				$data['photo'] = $upload;
			}

			$this->my->update(['id' => $id], $data);
			$this->session->set_flashdata('success', 'Post was successfully updated.');

			redirect(base_url('admin/banner'));
		}

	}

	public function _create_thumbs($file_name)
	{
		$config = [
			// Large Image
			[
				'image_library'	=> 'GD2',
				'source_image'		=> './images/banner/' . $file_name,
				'maintain_ratio'	=> TRUE,
				'width'				=> 770,
				'height'				=> 450,
				'new_image'			=> './images/banner/large/' . $file_name
			],
			// Medium Image
			[
				'image_library'	=> 'GD2',
				'source_image'		=> './images/banner/' . $file_name,
				'maintain_ratio'	=> FALSE,
				'width'				=> 300,
				'height'				=> 188,
				'new_image'			=> './images/banner/medium/' . $file_name
			],
			// Small Image
			[
				'image_library'	=> 'GD2',
				'source_image'		=> './images/banner/' . $file_name,
				'maintain_ratio'	=> FALSE,
				'width'				=> 270,
				'height'				=> 169,
				'new_image'			=> './images/banner/small/' . $file_name
			],
			// XSmall Image
			[
				'image_library'	=> 'GD2',
				'source_image'		=> './images/banner/' . $file_name,
				'maintain_ratio'	=> FALSE,
				'width'				=> 170,
				'height'				=> 100,
				'new_image'			=> './images/banner/xsmall/' . $file_name
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

	public function action()
	{
		$this->form_validation->set_rules('title', 'Judul', 'required');

		if ($this->form_validation->run() != false) {
			$data = [
				'title'  => $this->input->post('title', true),
				'author' => $this->input->post('author', true),
				'describtion' => $this->input->post('describtion', true),
				'published_date'   => $this->input->post('published_date', true),
			];

			// For Remove Photo
			if ($this->input->post('remove_photo')) {
				if (file_exists('images/banner/' . $this->input->post('remove_photo')) && $this->input->post('remove_photo')) {
					$this->banner->deleteImage($this->input->post('remove_photo'));
				}

				$data['photo'] = '';
			}

			$id = $this->input->post('id', true);

			if (!empty($_FILES['photo']['name'])) {
				$upload = $this->banner->uploadImage();
				$banner = $this->my->get_by_id($id);

				if (file_exists('images/banner/' . $banner->photo) && $banner->photo) {
					unlink('images/banner/' . $banner->photo);
				}

				$data['photo'] = $upload;
			}

			$this->my->update(['id' => $id], $data);
			$status = true;

			echo json_encode(["status" => $status]);
		}
	}

	public function delete(){
		$id = $this->input->post('id', true);
		$banner = $this->my->get_by_id($id);

		if(file_exists('images/banner/' . $banner->photo) && $banner->photo){
			unlink('images/banner/' . $banner->photo);
			unlink('images/banner/large/' . $banner->photo);
			unlink('images/banner/medium/' . $banner->photo);
			unlink('images/banner/small/' . $banner->photo);
			unlink('images/banner/xsmall/' . $banner->photo);
		}

		$this->my->delete($id);
		echo json_encode(["status" => TRUE]);
	}

	public function bulk_delete()
	{
		$list_id = $this->input->post('id', true);
		
		foreach ($list_id as $id){
			$banner = $this->my->get_by_id($id);
	
			if(file_exists('images/banner/' . $banner->photo) && $banner->photo){
				unlink('images/banner/' . $banner->photo);
				unlink('images/banner/large/' . $banner->photo);
				unlink('images/banner/medium/' . $banner->photo);
				unlink('images/banner/small/' . $banner->photo);
				unlink('images/banner/xsmall/' . $banner->photo);
			}

			$this->my->delete($id);
		}

		echo json_encode(["status" => TRUE]);
	}
}

/* End of file Banner.php */
