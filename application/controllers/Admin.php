<?php

class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();

        $this->load->helper(['url', 'form']);
        $this->load->library(['form_validation', 'session', 'pagination']);
        $this->load->model('Admin_model');
    }

    public function index() 
    {
        if ($this->session->userdata('logged_in')) { //if logged in
            $data['title'] = 'Admin | ePMC';
            $this->load->view('include-admin/dashboard-header', $data);
            $this->load->view('include-admin/dashboard-navbar');
            $this->load->view('admin-views/admin-dashboard', $data);
            $this->load->view('include-admin/dashboard-scripts');
        }
        else {
            redirect('Login/signin');
        }
    }
}


?>