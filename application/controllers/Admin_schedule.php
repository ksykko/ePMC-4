<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_schedule extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url', 'form');
		$this->load->library(['form_validation', 'session', 'pagination']);
		$this->load->model('Admin_schedule_model', 'schedModel');
		$this->load->model('Doctors_model');
		$this->load->model('Admin_model');
		$this->load->database();
	}

	//schedule page
	public function index()
	{
		//Get doctors list from schedule table
		$data['doctors'] = $this->schedModel->get_unique_docnames();


		$data['user_role'] = $this->session->userdata('role');

		if ($data['user_role'] == 'Admin') {
			$data['title'] = 'Admin - Schedule | ePMC';
		} 
		elseif ($data['user_role'] == 'Doctor') {
			$data['title'] = 'Doctor - Schedule | ePMC';
		}
		else{
			$data['title'] = 'Patient - Schedule | ePMC';
		}


		//Get doctors list from user accounts
		$data['user_specialization'] = $this->session->userdata('specialization');
		$data['doctorname'] = $this->Doctors_model->get_all_doctors();

		//Get Schedule Data
		$id = $this->session->userdata('schedule_id');
		$data['schedule'] = $this->schedModel->get_schedule_row($id);
		$data['schedules'] = $this->schedModel->get_schedule_table();


		// Display views
		$this->load->view('include-admin/dashboard-header', $data);
		$this->load->view('include-admin/dashboard-navbar', $data);
		$this->load->view('admin-views/schedule-view', $data);
		$this->load->view('include-admin/dashboard-scripts');
		$this->load->view('schedule/schedule-scripts');
	}

	public function addSchedule()
	{
		//Form Validation
		$this->form_validation->set_rules('doctor_name', 'doctor', 'required', array(
			'required' => 'Choose a %s.'
		));
		$this->form_validation->set_rules('start_time', 'start time', 'required', array(
			'required' => 'Choose the %s.'
		));
		$this->form_validation->set_rules('end_time', 'end time', 'required', array(
			'required' => 'Please choose the %s.'
		));
		// $this->form_validation->set_rules('days[]', 'day of the week', 'required', array(
		//     'required' => 'Choose at least one %s.'
		// ));

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('message', 'add_failed');
			$this->index();
		} else {
			// $schedData = array(
			// 	'doctor_name' => $this->input->post('doctor_name'),
			// 	'specialization' => $this->input->post('specialization'),
			// 	'start_time' => $this->input->post('start_time'),
			// 	'end_time' => $this->input->post('end_time'),
			// 	'days' => $this->input->post('days'),
			// 	'theme' => $this->input->post('color')
			// );
			
			$result = $this->input->post('doctor_name')	;
			$result_explode = explode('|', $result);
			$doctor_name = $result_explode[0];
			$user_id = $result_explode[1];
			$specialization = $result_explode[2];

			$days = $this->input->post('day');
			for ($x = 0; $x < count((array)$days); $x++) {
				$schedData = array(
					'user_id' => $user_id,
					'doctor_name' => $doctor_name,
					'specialization' => $specialization,
					'start_time' => $this->input->post('start_time'),
					'end_time' => $this->input->post('end_time'),
					'day' => $days[$x],
					'theme' => $this->input->post('color')
				);
				$this->schedModel->insertSchedule($schedData);
			}
			
			// if ('days[]' == 'Sun') {
			// 	$schedData = array (
			// 		'sun' => $this->input->post('day1')
			// 	);
			// }

			$activity = array(
				'activity' => 'A new schedule has been added in the schedules',
				'module' => 'Schedule',
				'date_created' => date('Y-m-d H:i:s')
			);

			$this->Admin_model->add_activity($activity);
			$this->session->set_flashdata('message', 'success');
			redirect('Admin_schedule');

			// echo "<script type='text/javascript'>alert('Schedule Added Succesfully!');window.location = ('Admin_schedule') </script>";
		}
	}

	public function update_schedule($id)
	{
		//Form Validation
		$this->form_validation->set_rules('doctor_name', 'doctor', 'required', array(
			'required' => 'Choose a %s.'
		));
		$this->form_validation->set_rules('start_time', 'start time', 'required', array(
			'required' => 'Choose the %s.'
		));
		$this->form_validation->set_rules('end_time', 'end time', 'required', array(
			'required' => 'Please choose the %s.'
		));
		// $this->form_validation->set_rules('days[]', 'day of the week', 'required', array(
		//     'required' => 'Choose at least one %s.'
		// ));

		// 'user_id' => $user_id,
		// 			'doctor_name' => $doctor_name,
		// 			'specialization' => $specialization,
		// 			'start_time' => $this->input->post('start_time'),
		// 			'end_time' => $this->input->post('end_time'),
		// 			'theme' => $this->input->post('color')

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('message', 'add_failed');
			$this->index();
		} else {

			$updateSchedule = $this->input->post('updateSchedule');
            if (isset($updateSchedule))
            {
				$result = $this->input->post('doctor_name')	;
				$result_explode = explode('|', $result);
				$doctor_name = $result_explode[0];
				$user_id = $result_explode[1];
				$specialization = $result_explode[2];
				
				$schedData = array(
					'user_id' => $user_id,
					'doctor_name' => $doctor_name,
					'specialization' => $specialization,
					'start_time' => $this->input->post('start_time'),
					'end_time' => $this->input->post('end_time'),
					'theme' => $this->input->post('color')
				);
			}
			// if ('days[]' == 'Sun') {
			// 	$schedData = array (
			// 		'sun' => $this->input->post('day1')
			// 	);
			// }
			$activity = array(
				'activity' => 'A new schedule has been updated in the schedules',
				'module' => 'Schedule',
				'date_created' => date('Y-m-d H:i:s')
			);

			$this->Admin_model->add_activity($activity);


			$this->session->set_flashdata('message', 'success');
			$this->schedModel->update_schedule($id,$schedData);
			redirect('Admin_schedule');

			// echo "<script type='text/javascript'>alert('Schedule Added Succesfully!');window.location = ('Admin_schedule') </script>";
		}
	}

	public function delete_schedule($id)
    {   

        $activity = array(
            'activity' => 'A schedule has been deleted in the list',
            'module' => 'Schedule',
            'date_created' => date('Y-m-d H:i:s')
        );

        $this->Admin_model->add_activity($activity);
        $this->session->set_flashdata('message', 'dlt_success');
        $this->schedModel->delete_schedule($id);
        redirect('Admin_schedule/index');
    }
}
