<?php

class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();

        $this->load->helper(['url', 'form']);
        $this->load->library(['form_validation', 'session', 'pagination']);
        $this->load->model('Admin_model');
        $this->load->library("pagination");
    }

    public function index() 
    {   
        if ($this->session->userdata('logged_in')) { //if logged in

            $data['title'] = 'Admin | ePMC';
            $id = $this->session->userdata('admin_id');

            $data['product'] = $this->Admin_model->get_inventory_row($id);
            $data['inventory_stocks'] = $this->Admin_model->get_inventory_table_contents();
            // $data['users_count'] = $this->Admin_model->get_user_count();
            // $data['patient_count'] = $this->Admin_model->get_patient_count();
            // $data['new_patient_count'] = $this->Admin_model->get_nUser_count();

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