<?php

class PharmacyAssistant extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(['url', 'form', 'html']);
        $this->load->library(['form_validation', 'session', 'pagination']);
        $this->load->model('Admin_model');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in')) { //if logged in

            $data['title'] = 'Pharmacy Assistant Dashboard | ePMC';
            $id = $this->session->userdata('id');

            $data['full_name'] = $this->session->userdata('full_name');
            $data['user_role'] = $this->session->userdata('role');
            $data['avatar'] = $this->session->userdata('avatar');
            $data['specialization'] = $this->session->userdata('specialization');
            $data['contact_no'] = $this->session->userdata('contact_no');

            $data['product'] = $this->Admin_model->get_inventory_row($id);
            $data['inventory_stocks'] = $this->Admin_model->get_inventory_table_contents();
            $data['users_count'] = $this->Admin_model->get_useracc_count();
            $data['patient_count'] = $this->Admin_model->get_patient_count();
            $data['new_patient_count'] = $this->Admin_model->get_nUser_count();

            // stock items chart
            $data['stock_products'] = $this->get_stocks();
            $data['stock_in'] = $this->get_stockIn();
            $data['stock_out'] = $this->get_stockOut();


            $this->load->view('include-admin/dashboard-header', $data);
            $this->load->view('include-admin/dashboard-navbar');
            $this->load->view('admin-views/pharmacy_dashboard', $data);
            //$this->load->view('admin-views/admin-dashboard', $data);
            $this->load->view('include-admin/pharmacy-scripts');
        } else {
            redirect('Login/signin');
        }
    }

    public function datatable()
    {
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $activity = $this->Admin_model->get_activity_tbl();
        $data = array();


        foreach ($activity->result() as $recent_act) {

            $dt = new DateTime($recent_act->date_created);
            $date_created = $dt->format('m/d/y h:i A');


            $row = array();
            $row[] = $recent_act->activity;
            $row[] = $date_created;

            $data[] = $row;
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $activity->num_rows(),
            "recordsFiltered" => $activity->num_rows(),
            "data" => $data
        );
        echo json_encode($output);
    }

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


    
}
