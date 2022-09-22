<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_schedule extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->helper('url');
		$this->load->model('Admin_schedule_model');
	}

	public function schedule() {
		$this->load->view('include-website/head');
        // $this->load->view('include-website/navbar');
		$this->load->view('schedule_view');
        $this->load->view('include-website/scripts');
		// $this->load->view('include/footer');
	}
}
