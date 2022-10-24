<?php
class Patient extends CI_Controller {
    public function __construct() {
        parent::__construct();

        $this->load->helper(['url', 'form']);
        $this->load->library(['form_validation', 'session', 'pagination']);
        $this->load->model('Patient_model');
        $this->load->library("pagination");
    }

    public function index() 
    {   
        if ($this->session->userdata('logged_in')) { //if logged in

            $data['title'] = 'Patient | ePMC';
            $id = $this->session->userdata('id');

            $data['user_name'] = $this->session->userdata('full_name');
            $data['user_role'] = $this->session->userdata('role');
            $data['user_age'] = $this->session->userdata('age');
            $data['user_birthday'] = $this->session->userdata('birth_date');
            $data['user_sex'] = $this->session->userdata('sex');
            $data['user_occupation'] = $this->session->userdata('occupation');
            $data['user_contact_no'] = $this->session->userdata('cell_no');
            $data['user_address'] = $this->session->userdata('address');

            $data['patient_details'] = $this->Patient_model->get_patient_details_row($id);  

            $this->load->view('include-admin/dashboard-header', $data);
            $this->load->view('include-admin/dashboard-navbar', $data);
            $this->load->view('patient-views/patient-dashboard', $data);
            $this->load->view('include-admin/patient-scripts');
        }
        else {
            redirect('Login/signin');
        }
    }

    public function datatable()
    {
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $id = $this->session->userdata('id');
        $diagnosis = $this->Patient_model->get_patient_diagnosis_tbl();
        $data = array();
        foreach ($diagnosis->result() as $recent_diagnosis) {
            if ($id == $recent_diagnosis->patient_id) {
                $row = array();
                $row[] = $recent_diagnosis->p_diag_date;
                $row[] = $recent_diagnosis->p_recent_diagnosis;
                $row[] = $recent_diagnosis->p_doctor;
                
                $data[] = $row;    
            }
            
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $diagnosis->num_rows(),
            "recordsFiltered" => $diagnosis->num_rows(),
            "data" => $data
        );
        echo json_encode($output);
    }
}
?>
