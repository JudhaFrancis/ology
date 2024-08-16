<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event extends CI_Controller
{

	var $table = 'event';
	var $tableJoin = 'category';
	var $id = 'id';
	var $select = ['event.*', 'category.category_name AS category'];
	var $column_order = ['event.id', 'event.event_type', 'category.category_name',];
	var $column_search = ['event.title', 'event.event_type', 'category.category_name',];
	

	public function __construct()
	{
		parent::__construct();
		$this->load->model('my_model', 'my', true);
		$this->load->model('event_model', 'event', true);
		$this->load->model('menu_model', 'menu', true);
		$this->load->model('category_model', 'category', true);	
	}

	public function ajax_list()
	{
		$list = $this->my->get_datatables($this->tableJoin, $this->select);
		$data = [];
		foreach ($list as $li) {
			$row = [];
			$row[] = '<input type="checkbox" class="data-check" value="' . $li->id . '">';
			$row[] = $li->event_type;

			$row[] =
				'<a class="btn btn-sm btn-warning text-white" href="#" 
			title="Edit" onclick="edit_event(' . "'" . $li->id . "'" . ')">
			   <i class="fa fa-pencil-alt mr-1"></i> Edit</a>
   
			   <a class="btn btn-sm btn-danger" href="#" 
			   title="Delete" onclick="delete_event(' . "'" . $li->id . "'" . ')">
			   <i class="fa fa-trash mr-1"></i> Delete</a>';
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

	public function action()
{
    // Set validation rules
    $this->form_validation->set_rules('event_type', 'Event', 'trim|required');
    $this->form_validation->set_rules('id_category', 'Category', 'required');

    if ($this->form_validation->run() == false) {
        // Prepare data for view
        $data['title'] = 'Edit Posting';
        $data['form_action'] = base_url("back/event/action");
        $data['menu'] = $this->menu->getMenu();
        $data['category'] = $this->category->getCategory(); // Fetch categories
        $this->load->view('back/pages/article/event', $data);
    } else {
        $data = [
            'event_type' => $this->input->post('event_type', true),
            'id_category' => $this->input->post('id_category', true),
        ];

        $id = $this->input->post('id', true);

        if (!empty($id)) {
            // Update
            $this->my->update(['id' => $id], $data);
            $status = true;
        } else {
            // Insert
            $this->my->save($data);
            $status = true;
        }

        echo json_encode(["status" => $status]);
    }
}


	public function delete(){
		$this->my->delete($this->input->post('id', true));
		echo json_encode(["status" => TRUE]);
	}
}
