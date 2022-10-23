<?php
class Patient extends CI_Controller {
    public function __construct() {
        parent::__construct();

        $this->load->helper(['url', 'form']);
        $this->load->library(['form_validation', 'session']);
        $this->load->model('Patient_model');
    }

    public function index() 
    {   
        if ($this->session->userdata('logged_in')) { //if logged in

            $data['title'] = 'Patient | ePMC';
            $id = $this->session->userdata('patient_id');

            $data['user_name'] = $this->session->userdata('full_name');
            $data['user_role'] = $this->session->userdata('role');
            $data['user_age'] = $this->session->userdata('age');
            $data['user_birthday'] = $this->session->userdata('birth_date');
            $data['user_sex'] = $this->session->userdata('sex');
            $data['user_occupation'] = $this->session->userdata('occupation');
            $data['user_contact_no'] = $this->session->userdata('cell_no');
            $data['user_address'] = $this->session->userdata('address');
            // $data['product'] = $this->Admin_model->get_inventory_row($id);
            // $data['inventory_stocks'] = $this->Admin_model->get_inventory_table_contents();
            // $data['users_count'] = $this->Admin_model->get_useracc_count();
            // $data['patient_count'] = $this->Admin_model->get_patient_count();
            // $data['new_patient_count'] = $this->Admin_model->get_nUser_count();

            $this->load->view('include-admin/dashboard-header', $data);
            $this->load->view('include-admin/dashboard-navbar');
            $this->load->view('patient-views/patient-dashboard', $data);
            $this->load->view('include-admin/dashboard-scripts');
        }
        else {
            redirect('Login/signin');
        }
    }
}


?>
