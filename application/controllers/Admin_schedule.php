<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_schedule extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
		$this->load->helper('url', 'form');
		$this->load->library(['form_validation', 'session', 'pagination']);
		$this->load->model('Admin_schedule_model', 'schedModel');
		$this->load->model('Doctors_model');
		$this->load->database();
		
	}

	//schedule page
	public function index() { 
		//Get doctors list from schedule table
		$data['doctors'] = $this->schedModel->get_unique_docnames();
		
		

		//Get doctors list from user accounts
		$data['user_role'] = $this->session->userdata('role');
		$data['user_specialization'] = $this->session->userdata('specialization'); 
		$data['doctorname'] = $this->Doctors_model->get_all_doctors();

		//Get Schedule Data
		$data['sunday'] = $this->schedModel->get_sunday_sched($data);
		$data['monday'] = $this->schedModel->get_monday_sched($data);
		$data['tuesday'] = $this->schedModel->get_tuesday_sched($data);
		$data['wednesday'] = $this->schedModel->get_wednesday_sched($data);
		$data['thursday'] = $this->schedModel->get_thursday_sched($data);
		$data['friday'] = $this->schedModel->get_friday_sched($data);
		$data['saturday'] = $this->schedModel->get_saturday_sched($data);

		// Display views
		$data['title'] = 'Schedule';
		$this->load->view('include-admin/dashboard-header', $data);
        $this->load->view('include-admin/dashboard-navbar', $data);
		$this->load->view('admin-views/schedule-view', $data);
		$this->load->view('include-admin/dashboard-scripts');
		$this->load->view('schedule/schedule-scripts');
	}

	public function addSchedule() {
		//Form Validation
		$this->form_validation->set_rules('doctor_name', 'doctor', 'required', array(
            'required' => 'Choose a %s.'
        ));
		$this->form_validation->set_rules('specialization', 'specialization', 'required|regex_match[/^([a-z ])+$/i]', array(
            'required' => 'Enter the %s of the doctor.'
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
		}
		else {
			$schedData = array ( 
				'doctor_name' => $this->input->post('doctor_name'), 
				'specialization' => $this->input->post('specialization'),
				'start_time' => $this->input->post('start_time'),
				'end_time' => $this->input->post('end_time'),
				'sun' => $this->input->post('day1'),
				'mon' => $this->input->post('day2'),
				'tue' => $this->input->post('day3'),
				'wed' => $this->input->post('day4'),
				'thurs' => $this->input->post('day5'),
				'fri' => $this->input->post('day6'),
				'sat' => $this->input->post('day7'),
				'theme' => $this->input->post('color')
        	);

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
			$this->schedModel->insertSchedule($schedData);
			redirect('Admin_schedule');
			
			// echo "<script type='text/javascript'>alert('Schedule Added Succesfully!');window.location = ('Admin_schedule') </script>";
		}
	}

}