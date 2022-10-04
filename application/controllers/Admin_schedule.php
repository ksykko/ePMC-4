<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_schedule extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->database();

		$this->load->model('Admin_schedule_model');
	}

	public function schedule() {
		//Display list of Doctors
		$query = $this->db->get("schedule"); 
        $data['doctors'] = $query->result();

		$data['title'] = 'Schedule';
		$this->load->view('include-website/head');
        // $this->load->view('include-website/navbar');
		$this->load->view('schedule/schedule-header', $data);
		$this->load->view('schedule/schedule-view', $data);
		// $this->load->view('schedule/schedule-footer');
        $this->load->view('include-website/scripts');
		// $this->load->view('include/footer');
	}

	public function addSchedule() {

	}
}
