<?php

class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
        $this->load->helper('url', 'form');
    }

    public function index() {
        
        $data['title'] = 'Dashboard';
        $this->load->view('include-website/dashboard-header', $data);
        $this->load->view('admin-panel/admin-dashboard');
        $this->load->view('include-website/scripts');

    }
}
?>