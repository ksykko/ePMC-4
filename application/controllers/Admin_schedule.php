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
		// $data['title'] = 'Schedule';
		$this->load->view('include-website/head');
        // $this->load->view('include-website/navbar');
		$this->load->view('schedule/schedule-header');
		$this->load->view('schedule/schedule-view');
		// $this->load->view('schedule/schedule-footer');
        $this->load->view('include-website/scripts');
		// $this->load->view('include/footer');
	}

	public function addSchedule() {

	}
}
