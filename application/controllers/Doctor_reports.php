<?php
class Doctor_reports extends CI_Controller 
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

            //$id = $this->session->userdata('admin_id');

            $data['title'] = 'Admin - Patient Records | ePMC';

            $data['user_role'] = $this->session->userdata('role');
            $data['specialization'] = $this->session->userdata('specialization');

            // stock items chart
            $data['stock_products'] = $this->get_stocks();
            $data['stock_in'] = $this->get_stockIn();
            $data['stock_out'] = $this->get_stockOut();

            // bmi chart
            $data['bmi_data'] = $this->bmi_chart_js();

            // insertions / deletions chart
            $data['recent_days'] = $this->recent_days();
            $data['recent_data'] = $this->recent_data();
            $data['recent_deleted'] = $this->recent_deleted();


            $data['monthly_added'] = $this->monthly_added();


            $this->load->view('include-admin/dashboard-header', $data);
            $this->load->view('include-admin/dashboard-navbar', $data); // admin dashboard not yet done
            $this->load->view('doctor-views/doctor-reports', $data); //recent sample
            $this->load->view('include-admin/report-scripts');
        } else {
            redirect('Login/signin');
        }
    }

    // ApexCharts
    public function get_stocks()
    {
        $this->load->model('Charts_model');
        $stock_products = $this->Charts_model->get_stockprod();
        //$this->dd($stock_products);

        // store stock products in array
        $stock_products_arr = array();
        foreach ($stock_products as $stock_product) {
            $stock_products_arr[] = $stock_product->prod_name;
        }

        //$this->dd($stock_products_arr);
        
        return json_encode($stock_products_arr);
        
    }

    public function get_stockIn() 
    {
        $this->load->model('Charts_model');
        $stock_in = $this->Charts_model->get_stockIn();

        // store stock_in in array
        $stock_in_arr = array();
        foreach ($stock_in as $stock_in) {
            $stock_in_arr[] = $stock_in->stock_in;
        }

        return json_encode($stock_in_arr);
    }

    public function get_stockOut()
    {
        $this->load->model('Charts_model');
        $stock_out = $this->Charts_model->get_stockOut();

        // store stock_out in array
        $stock_out_arr = array();
        foreach ($stock_out as $stock_out) {
            $stock_out_arr[] = $stock_out->stock_out;
        }

        return json_encode($stock_out_arr);
    }

    public function recent_days()
    {
        $this->load->model('Charts_model');

        // make array of past 7 days from today eg. Mon, Tue, ..
        $days = array();
        for ($i = 0; $i < 7; $i++) {
            $days[] = date('D', strtotime("-$i days"));
        }    
        // reverse array
        $days = array_reverse($days);
        return json_encode($days);
    }

    public function recent_data()
    {
        $this->load->model('Charts_model');
        $data = $this->Charts_model->recent_added();

        return json_encode($data);
    }

    public function recent_deleted()
    {
        $this->load->model('Charts_model');
        $data = $this->Charts_model->recent_deleted();

        return json_encode($data);
    }

    public function monthly_added()
    {
        $this->load->model('Charts_model');
        $data = $this->Charts_model->monthly_added();

        // make months array
        $months = array();
        for ($i = 0; $i < 12; $i++) {
            $months[] = date('M', strtotime("-$i months"));
        }
       // $this->dd($months);

        return json_encode($data);
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

    public function dd($data)
    {
        echo "<pre>";
        die(var_dump($data));
        echo "</pre>";
    }

    
}

?>