<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_schedule extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
		$this->load->helper('url', 'form');
		$this->load->library(['form_validation', 'session', 'pagination']);
		$this->load->model('Admin_schedule_model');
		$this->load->database();
		
	}

	public function schedule() {
		//Display list of Doctors
		$query = $this->db->get("schedule"); 
        $data['doctors'] = $query->result();

		$data['title'] = 'Schedule';
		// $this->load->view('include-website/head');
        // $this->load->view('include-website/navbar');
		// $this->load->view('schedule/schedule-header', $data);
		// $this->load->view('schedule/schedule-view', $data);
		// $this->load->view('schedule/schedule-footer');
        // $this->load->view('include-website/scripts');
		// $this->load->view('include/footer');

		$this->load->view('include-admin/dashboard-header', $data);
        $this->load->view('include-admin/dashboard-navbar', $data);
		// $this->load->view('schedule/schedule-header', $data);
		$this->load->view('admin-views/schedule-view', $data);
		$this->load->view('include-admin/dashboard-scripts');
		$this->load->view('schedule/schedule-scripts');
	}

	public function addSchedule() {
		$data = array( 
            'doctor_name' => $this->input->post('doctor_name'), 
            'specialization' => $this->input->post('specialization'),
			'date' => $this->input->post('date'),
			'start_time' => $this->input->post('start_time'),
			'end_time' => $this->input->post('end_time')
        );

		// var_dump($data);
		$this->load->model('Admin_schedule_model', 'schedModel');
		$this->schedModel->insertSchedule($data);
		echo "<script type='text/javascript'>alert('Schedule Added Succesfully!');window.location = ('Admin_schedule/schedule') </script>";
		// redirect(base_url('schedule'));


		// if($this->input->post('save')) {
		//     $data['doctor_name']=$this->input->post('doctor_name');
		// 	$data['specialization']=$this->input->post('specialization');
		// 	$data['date']=$this->input->post('date');
		// 	$data['start_time']=$this->input->post('start_time');
		// 	$data['end_time']=$this->input->post('end_time');
		// 	$response=$this->schedModel->insertSchedule($data);
		// 	if($response==true){
		// 	        echo "Shedule Saved Successfully";
		// 	}
		// 	else{
		// 			echo "Insert error !";
		// 	}
		// }
	}

	public function fetchSchedule() {
		$sched_data = $this->schedModel->fetchSchedule();
		foreach($sched_data->result_array() as $row) {
			$data[] = array(
				'id' => $row['schedule_id'],
				'doctor_name' => $row['doctor_name'],
				'specialization' => $row['specialization'],
				'date' => $row->date,
				'start_time' => $row['start_time'],
				'end_time' => $row['end_time']
			);
		}
		echo json_encode($data);
	}
}
