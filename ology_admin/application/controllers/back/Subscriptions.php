<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subscriptions extends CI_Controller
{

	var $table = 'newsletter';
	var $id = 'id';
	var $tableJoin = '';
	var $column_order = ['', 'name', 'is_active'];
	var $column_search = ['name', 'is_active'];

	public function __construct()
	{
		parent::__construct();
		$this->load->model('my_model', 'my');
		$this->load->model('Email_template_model', 'email');
		$this->load->model('menu_model', 'menu', true);
	}

	public function ajax_list()
	{
		$list = $this->my->get_datatables();
		$data = [];
		$no = 1;

		foreach ($list as $li) {
			$row = [];
			$row[] = $no++;
			$row[] = $li->name;
			$row[] = $li->email_id;
			$status = $li->is_active == "1"
			? '<span class="badge badge-success">ACTIVE</span>'
			: '<span class="badge badge-danger">INACTIVE</span>';
			
			$row[] = $status;
			$row[] = $li->updated_on?date("y-m-d",strtotime($li->updated_on)):'';

			$row[] =
				//  '<a class="btn btn-sm btn-warning text-white" href="#" 
				//  title="Edit" onclick="edit_Subscriptions('."'" . $li->id . "'".')">
				//  <i class="fa fa-pencil-alt mr-1"></i> </a>

				'<a class="btn btn-sm btn-danger" href="#" 
		 title="Delete" onclick="delete_Subscriptions(' . "'" . $li->id . "'" . ')">
		 <i class="fa fa-trash mr-1"></i> </a>';

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
		$this->form_validation->set_rules('name', 'subscriptions', 'trim|required');

		if ($this->form_validation->run() != false) {
			$data = [
				'category_name' 	=> $this->input->post('name', true),
				'slug'				=> slugify($this->input->post('name', true)),
				'is_active'			=> $this->input->post('is_active', true)
			];

			$id = $this->input->post('id', true);

			// For Update
			if (!empty($id)) {
				$this->my->update(['id' => $id], $data);
				$status = true;
			}
			// For Insert
			else {
				$this->my->save($data);
				$status = true;
			}

			echo json_encode(["status" => $status]);
		}
	}

	public function delete()
	{
		$this->my->delete($this->input->post('id', true));
		echo json_encode(["status" => TRUE]);
	}
	public function create_Subscriber()
{
    // Get form input safely
    $input = (object) $this->input->post(null, true);
    // Set validation rules for the form fields
    $this->form_validation->set_rules('email_id', 'Email Id', 'required');
    $this->form_validation->set_rules('name', 'Name', 'required');

    if ($this->form_validation->run() == false) {
        // If validation fails, reload the form with the input and error messages
        $data['title'] = 'Subscriptions';
        $data['form_action'] = base_url("back/Subscriptions/create_Subscriber");
        $data['menu'] = $this->menu->getMenu();
        $data['input'] = $input;
        $this->load->view('back/pages/article/Subscriptions_form_post', $data);
    } else {
        // If validation passes, save the data
        $data = [
            'name'     => $this->input->post('name', true),
            'email_id' => $this->input->post('email_id', true),
        ];

        // Save the subscriber data
        $this->my->save($data);
        $this->session->set_flashdata('success', 'Subscriber Added Successfully.');

        // Redirect after successful save
        redirect(base_url('admin/subscriptions'));
    }
}

}

/* End of file Category.php */
