<?php

class Admin_reports extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(['url', 'form', 'date', 'string']);
        $this->load->library(['form_validation', 'session', 'pagination']);
        $this->load->model('Admin_model');
        $this->load->model('Doctors_model');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in')) { //if logged in

            $id = $this->session->userdata('admin_id');

            $data['title'] = 'Admin - Patient Records | ePMC';

            $data['user_role'] = $this->session->userdata('role');

            $this->load->view('include-admin/dashboard-header', $data);
            $this->load->view('include-admin/dashboard-navbar', $data); // admin dashboard not yet done
            $this->load->view('admin-views/admin-reports', $data); //recent sample
            $this->load->view('include-admin/report-scripts');
        } else {
            redirect('Login/signin');
        }
    }

}

?>