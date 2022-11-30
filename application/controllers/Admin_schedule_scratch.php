<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_schedule_scratch extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

        
		$this->load->helper('url', 'form');
        $this->load->helper('url');
		$this->load->library(['form_validation', 'session', 'pagination']);
		$this->load->model('Admin_schedule_model', 'schedModel');
		$this->load->model('Doctors_model');
		$this->load->model('Admin_model');
		$this->load->database();
	}

	//schedule page
	public function index()
	{
		if ($this->session->userdata('logged_in')) {
			//Get doctors list from schedule table
			$data['doctors'] = $this->schedModel->get_unique_docnames();
			$data['result'] = $this->db->get("new_schedule")->result();

			
			foreach ($data['result'] as $key => $value) {
				$data['data'][$key]['id'] = $value->schedule_id;
				$data['data'][$key]['title'] = $value->doctor_name;
				$data['data'][$key]['start'] = $value->start_date;
				$data['data'][$key]['end'] = $value->end_date;
				$data['data'][$key]['backgroundColor'] = "#" . $value->color;
			}

			$data['user_role'] = $this->session->userdata('role');

			if ($data['user_role'] == 'Admin') {
				$data['title'] = 'Admin - Schedule | ePMC';
			} elseif ($data['user_role'] == 'Doctor') {
				$data['title'] = 'Doctor - Schedule | ePMC';
			} else {
				$data['title'] = 'Patient - Schedule | ePMC';
			}
            
			//Get doctors list from user accounts
			$data['specialization'] = $this->session->userdata('specialization');
			$data['doctorname'] = $this->Doctors_model->get_all_doctors();

			//Get Schedule Data
			$id = $this->session->userdata('schedule_id');
			$data['schedule'] = $this->schedModel->get_schedule_row($id);
			$data['schedules'] = $this->schedModel->get_schedule_table();


        
            //$data['calendar'] = $this->calendar_week->generate();
			// Display views
			$this->load->view('include-admin/dashboard-header', $data);
			$this->load->view('include-admin/dashboard-navbar', $data);
			$this->load->view('admin-views/schedule-view-scratch', $data);
			$this->load->view('include-admin/dashboard-scripts');
			$this->load->view('schedule/schedule-scripts');
		} else {
			redirect('Login/signin');
		}
	}

	// public function load(){

		
	// 	$event_data = $this->schedModel->fetch_all_event();
	// 	foreach($event_data->result_array() as $row){
	// 		$data[] = array(
	// 			'id' => $row['schedule_id'],
	// 			'title' => $row['title'],
	// 			'start' => $row['start_date'],
	// 			'end' => $row['end_date'],
	// 			'backgroundColor' => $row['color']
	// 		);
	// 	}
	// 	echo json_encode($data);
	// }

	function insert(){
			$this->form_validation->set_rules('doctor_name', 'doctor', 'required', array(
			'required' => 'Choose a %s.'
		));
		$this->form_validation->set_rules('start_date', 'start date', 'required', array(
			'required' => 'Choose the %s.'
		));
		$this->form_validation->set_rules('end_date', 'end date');
		// $this->form_validation->set_rules('days[]', 'day of the week', 'required', array(
		//     'required' => 'Choose at least one %s.'
		// ));

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('message', 'add_failed');
			$this->index();
		} else {

			$result = $this->input->post('doctor_name');
			$result_explode = explode('|', $result);
			$doctor_name = $result_explode[0];
			$user_id = $result_explode[1];
			$specialization = $result_explode[2];

			$data = array(
				'user_id' => $user_id,
				'doctor_name' => $doctor_name,
				'specialization' => $specialization,
				'start_date' => $this->input->post('start_date'),
				'end_date' => $this->input->post('end_date'),
				'color' => $this->input->post('color')
			);

			$this->schedModel->insert_event($data);

			$user_id = $this->session->userdata('id');
			$user_type = $this->session->userdata('role');
			$user_activity = 'Added a schedule';

			$this->load->model('Login_model');
			$this->Login_model->user_activity($user_id, $user_type, $user_activity);

			//try try try
			$activity = array(
				'activity' => 'A new schedule has been added in the schedules',
				'module' => 'Schedule',
				'date_created' => date('Y-m-d H:i:s')
			);

			$this->Admin_model->add_activity($activity);
			$this->session->set_flashdata('message', 'success');
			redirect('Admin_schedule_scratch');
		}
	}

	function update() {
		$this->form_validation->set_rules('start_date', 'start date', 'required', array(
			'required' => 'Choose the %s.'
		));

		$this->form_validation->set_rules('end_date', 'end date');
		

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('message', 'add_failed');
			$this->index();
		} else {

			$data = array(
				'start_date' => $this->input->post('start_date'),
				'end_date' => $this->input->post('end_date'),
				'color' => $this->input->post('color')
			);
			
			$this->schedModel->update_event($data, $this->input->post('id'));
		}
	}

	function delete() {

		$activity = array(
			'activity' => 'A schedule has been deleted in the list',
			'module' => 'Schedule',
			'date_created' => date('Y-m-d H:i:s')
		);

		// insert a row in user_activity table
		$user_id = $this->session->userdata('id');
		$user_type = $this->session->userdata('role');
		$user_activity = 'Deleted a schedule';

		$this->load->model('Login_model');
		$this->Login_model->user_activity($user_id, $user_type, $user_activity);

		$this->Admin_model->add_activity($activity);
		$this->session->set_flashdata('message', 'dlt_success');
		
		$this->schedModel->delete_event($this->input->post('id'));
	
	}

	

	// public function addSchedule()
	// {
	// 	//Form Validation
	// 	$this->form_validation->set_rules('doctor_name', 'doctor', 'required', array(
	// 		'required' => 'Choose a %s.'
	// 	));
	// 	$this->form_validation->set_rules('start_date', 'start date', 'required', array(
	// 		'required' => 'Choose the %s.'
	// 	));
	// 	$this->form_validation->set_rules('end_date', 'end date');
	// 	// $this->form_validation->set_rules('days[]', 'day of the week', 'required', array(
	// 	//     'required' => 'Choose at least one %s.'
	// 	// ));

	// 	if ($this->form_validation->run() == FALSE) {
	// 		$this->session->set_flashdata('message', 'add_failed');
	// 		$this->index();
	// 	} else {
	// 		// $schedData = array(
	// 		// 	'doctor_name' => $this->input->post('doctor_name'),
	// 		// 	'specialization' => $this->input->post('specialization'),
	// 		// 	'start_time' => $this->input->post('start_time'),
	// 		// 	'end_time' => $this->input->post('end_time'),
	// 		// 	'days' => $this->input->post('days'),
	// 		// 	'theme' => $this->input->post('color')
	// 		// );

	// 		$result = $this->input->post('doctor_name');
	// 		$result_explode = explode('|', $result);
	// 		$doctor_name = $result_explode[0];
	// 		$user_id = $result_explode[1];
	// 		$specialization = $result_explode[2];

	// 		$schedData = array(
	// 			'user_id' => $user_id,
	// 			'doctor_name' => $doctor_name,
	// 			'specialization' => $specialization,
	// 			'start_date' => $this->input->post('start_date'),
	// 			'end_date' => $this->input->post('end_date'),
	// 			'color' => $this->input->post('color')
	// 		);
			
	// 		$this->schedModel->insertSchedule($schedData);


	// 		// insert a row in user_activity table
	// 		$user_id = $this->session->userdata('id');
	// 		$user_type = $this->session->userdata('role');
	// 		$user_activity = 'Added a schedule';

	// 		$this->load->model('Login_model');
	// 		$this->Login_model->user_activity($user_id, $user_type, $user_activity);


	// 		$activity = array(
	// 			'activity' => 'A new schedule has been added in the schedules',
	// 			'module' => 'Schedule',
	// 			'date_created' => date('Y-m-d H:i:s')
	// 		);

	// 		$this->Admin_model->add_activity($activity);
	// 		$this->session->set_flashdata('message', 'success');
	// 		redirect('Admin_schedule_scratch');

	// 		// echo "<script type='text/javascript'>alert('Schedule Added Succesfully!');window.location = ('Admin_schedule') </script>";
	// 	}
	// }

	// public function update_schedule($id)
	// {
	// 	//Form Validation
	// 	$this->form_validation->set_rules('doctor_name', 'doctor', 'required', array(
	// 		'required' => 'Choose a %s.'
	// 	));
	// 	$this->form_validation->set_rules('start_time', 'start time', 'required', array(
	// 		'required' => 'Choose the %s.'
	// 	));
	// 	$this->form_validation->set_rules('end_time', 'end time', 'required', array(
	// 		'required' => 'Please choose the %s.'
	// 	));

	// 	if ($this->form_validation->run() == FALSE) {
	// 		$this->session->set_flashdata('message', 'update_failed');
	// 		$this->index();
	// 	} else {

	// 		$updateSchedule = $this->input->post('updateSchedule');

	// 		if (isset($updateSchedule)) {
	// 			$result = $this->input->post('doctor_name');
	// 			$result_explode = explode('|', $result);
	// 			$doctor_name = $result_explode[0];
	// 			$user_id = $result_explode[1];
	// 			$specialization = $result_explode[2];

	// 			$schedData = array(
	// 				'user_id' => $user_id,
	// 				'doctor_name' => $doctor_name,
	// 				'specialization' => $specialization,
	// 				'start_time' => $this->input->post('start_time'),
	// 				'end_time' => $this->input->post('end_time'),
	// 				'day' => $this->input->post('day'),
	// 				'theme' => $this->input->post('color_edit_' . $id)
	// 			);
	// 		}

	// 		// insert a row in user_activity table
	// 		$user_id = $this->session->userdata('id');
	// 		$user_type = $this->session->userdata('role');
	// 		$user_activity = 'Updated a schedule';

	// 		$this->load->model('Login_model');
	// 		$this->Login_model->user_activity($user_id, $user_type, $user_activity);



	// 		$activity = array(
	// 			'activity' => 'A new schedule has been updated in the schedules',
	// 			'module' => 'Schedule',
	// 			'date_created' => date('Y-m-d H:i:s')
	// 		);

	// 		$this->Admin_model->add_activity($activity);


	// 		$this->session->set_flashdata('message', 'update_success');
	// 		$this->schedModel->update_schedule($id, $schedData);
	// 		redirect('Admin_schedule');
	// 	}
	// }

}
