<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->helper('url');
		// $this->load->model('Admin_schedule_model');
	}

	public function home() {
		// $this->load->view('include/header_sched');
		$this->load->view('home_view');
		// $this->load->view('include/footer');
	}
}
