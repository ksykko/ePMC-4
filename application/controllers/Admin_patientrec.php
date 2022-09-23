<?php

class Admin_patientrec extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(['url', 'form']);
        $this->load->library(['form_validation', 'session', 'pagination']);
        $this->load->model('Admin_model');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in')) { //if logged in
            $page_config = array(
                'base_url' => site_url('Admin_patientrec/index'),
                'total_rows' => $this->Admin_model->get_patient_count(), // get total number of patients 
                'num_links' => 3,
                'per_page' => 5,
    
                'full_tag_open' => '<div class="d-flex justify-content-center"><ul class="pagination">',
                'full_tag_close' => '</ul></div>',
    
                'first_link' => FALSE,
                'last_link' => FALSE,
    
                'next_link' => '&raquo;',
                'next_tag_open' => '<li class="page-item">',
                'next_tag_close' => '</li>',
    
                'prev_link' => '&laquo;',
                'prev_tag_open' => '<li class="page-item">',
                'prev_tag_close' => '</li>',
    
                'cur_tag_open' => '<li class="page-item active"><span class="page-link">',
                'cur_tag_close' => '</span></li>',
    
                'num_tag_open' => '<li class="page-item">',
                'num_tag_close' => '</li>',
    
                'attributes' => ['class' => 'page-link']
    
            );
    
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $this->pagination->initialize($page_config);
    
            $id = $this->session->userdata('patient_id');
    
            $data['title'] = 'Admin - Patient Records | ePMC';
            $data['patient'] = $this->Admin_model->get_patient_row($id);
            $data['patients'] = $this->Admin_model->get_patient_table($page_config['per_page'], $page);
           
            $this->load->view('include-website/head', $data);
            $this->load->view('admin-views/admin-patientrec-view', $data);
            //$this->load->view('include-website/navbar'); // admin dashboard not yet done
            $this->load->view('include-admin/scripts');
        } else {
            redirect('Login/signin');
        }
        
    }

    public function add_patient()
    {
    }

    public function edit_patient()
    {
    }

    public function delete_patient()
    {
    }

    public function view_patient()
    {
    }

    // public function patient_records()
    // { // pagination
    //     $page_config = array(
    //         'base_url' => site_url('Admin_patientrec/patient_records'),
    //         'total_rows' => $this->Admin_patientrec_model->get_patient_count(), // get total number of patients 
    //         'num_links' => 3,
    //         'per_page' => 5,

    //         'full_tag_open' => '<div class="d-flex justify-content-center"><ul class="pagination">',
    //         'full_tag_close' => '</ul></div>',

    //         'first_link' => FALSE,
    //         'last_link' => FALSE,

    //         'next_link' => '&raquo;',
    //         'next_tag_open' => '<li class="page-item">',
    //         'next_tag_close' => '</li>',

    //         'prev_link' => '&laquo;',
    //         'prev_tag_open' => '<li class="page-item">',
    //         'prev_tag_close' => '</li>',

    //         'cur_tag_open' => '<li class="page-item active"><span class="page-link">',
    //         'cur_tag_close' => '</span></li>',

    //         'num_tag_open' => '<li class="page-item">',
    //         'num_tag_close' => '</li>',

    //         'attributes' => ['class' => 'page-link']

    //     );

    //     $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    //     $this->pagination->initialize($page_config);

    //     $id = $this->session->userdata('patient_id');

    //     $data['title'] = 'Admin - Patient Records | ePMC';
    //     $data['patient'] = $this->Admin_patientrec_model->get_patient_row($id);
    //     $data['patients'] = $this->Admin_patientrec_model->get_patient_table($page_config['per_page'], $page);
    //     $this->load->view('include/head', $data);
    //     $this->load->view('admin-views/admin-patientrec-view', $data);
    //     //$this->load->view('');
    // }



    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Login/signin');
    }
}
