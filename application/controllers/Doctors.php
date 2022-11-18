<?php 

class Doctors extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(['url', 'form', 'html']);
        $this->load->library(['form_validation', 'session', 'pagination']);
        $this->load->model('Doctors_model');
        $this->load->model('Admin_model');

    }

    public function index()
    {
        if ($this->session->userdata('logged_in')) { //if logged in

            $data['title'] = 'Doctors Dashboard | ePMC';
            $id = $this->session->userdata('id');

            $data['full_name'] = $this->session->userdata('full_name');
            $data['user_role'] = $this->session->userdata('role');
            $data['user_specialization'] = $this->session->userdata('specialization');
            $data['avatar'] = $this->session->userdata('avatar');
            $data['specialization'] = $this->session->userdata('specialization');
            $data['product'] = $this->Admin_model->get_inventory_row($id);
            $data['inventory_stocks'] = $this->Admin_model->get_inventory_table_contents();
            $data['users_count'] = $this->Admin_model->get_useracc_count();
            $data['patient_count'] = $this->Admin_model->get_patient_count();
            $data['new_patient_count'] = $this->Admin_model->get_nUser_count();

            // Chart Data
            $data['chart_data'] = $this->ageRange_chart_js(); // fetch age range data for chart
            $data['bmi_data'] = $this->bmi_chart_js(); // fetch bmi data for chart
            

            $this->load->view('include-admin/dashboard-header', $data);
            $this->load->view('include-admin/dashboard-navbar');
            $this->load->view('admin-views/doctor-dashboard-view', $data);
            //$this->load->view('admin-views/admin-dashboard', $data);
            $this->load->view('include-admin/dashboard-scripts');
        }
        else {
            redirect('Login/signin');
        }
    }

    public function ageRange_chart_js()
    {
        // get age range data from database
        $this->load->model('Charts_model');
        $query = $this->Charts_model->get_age_range();

        // create array to store age range data
        $age_range = [
            '0-10' => 0,
            '11-20' => 0,
            '21-30' => 0,
            '31-40' => 0,
            '41-50' => 0,
            '51-60' => 0,
            '61-70' => 0,
            '71-80' => 0,
            '81-90' => 0,
            '91-100' => 0,
        ];

        // loop through the data and store in array
        foreach ($query as $row) {
            //count the number of patients in each age range

            // age range 0-10
            if ($row->age >= 0 && $row->age <= 10) {
                $age_range['0-10'] = $age_range['0-10'] + 1;
            }
            // age range 11-20
            if ($row->age >= 11 && $row->age <= 20) {
                $age_range['11-20'] = $age_range['11-20'] + 1;
            }
            // age range 21-30
            if ($row->age >= 21 && $row->age <= 30) {
                $age_range['21-30'] = $age_range['21-30'] + 1;
            }
            // age range 31-40
            if ($row->age >= 31 && $row->age <= 40) {
                $age_range['31-40'] = $age_range['31-40'] + 1;
            }
            // age range 41-50
            if ($row->age >= 41 && $row->age <= 50) {
                $age_range['41-50'] = $age_range['41-50'] + 1;
            }
            // age range 51-60
            if ($row->age >= 51 && $row->age <= 60) {
                $age_range['51-60'] = $age_range['51-60'] + 1;
            }
            // age range 61-70
            if ($row->age >= 61 && $row->age <= 70) {
                $age_range['61-70'] = $age_range['61-70'] + 1;
            }
            // age range 71-80
            if ($row->age >= 71 && $row->age <= 80) {
                $age_range['71-80'] = $age_range['71-80'] + 1;
            }
            // age range 81-90
            if ($row->age >= 81 && $row->age <= 90) {
                $age_range['81-90'] = $age_range['81-90'] + 1;
            }
            // age range 91-100
            if ($row->age >= 91 && $row->age <= 100) {
                $age_range['91-100'] = $age_range['91-100'] + 1;
            }
        }

        return $age_range['chart_data'] = json_encode($age_range);
    }

    public function bmi_chart_js() 
    {
        // fetch height and weight data from database
        $this->load->model('Charts_model');
        $query = $this->Charts_model->get_bmi_data();

        // create array to store bmi data
        $bmi_data = [
            'underweight' => 0,
            'normal' => 0,
            'overweight' => 0,
            'obese' => 0,
        ];

        // loop through the data and store in array
        foreach ($query as $row) {

            // convert height and weight datatype to float
            $height = (float)$row->height;
            $weight = (float)$row->weight;

            // skips the patient if height or weight is 0
            if ($height == 0 || $weight == 0 || $height == null || $weight == null) {
                continue;
            }
            
            // calculate bmi
            $bmi = ($weight / $height / $height) * 10000;

            // count the number of patients in each bmi category
            if ($bmi < 18.5) {
                $bmi_data['underweight'] = $bmi_data['underweight'] + 1;
            }
            if ($bmi >= 18.5 && $bmi <= 24.9) {
                $bmi_data['normal'] = $bmi_data['normal'] + 1;
            }
            if ($bmi >= 25 && $bmi <= 29.9) {
                $bmi_data['overweight'] = $bmi_data['overweight'] + 1;
            }
            if ($bmi >= 30) {
                $bmi_data['obese'] = $bmi_data['obese'] + 1;
            }
        }

        // var_dump($bmi_data);
        // die();
        return $bmi_data['chart_data'] = json_encode($bmi_data);
    }
}