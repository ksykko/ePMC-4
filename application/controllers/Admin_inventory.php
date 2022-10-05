<?php

class Admin_inventory extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
        $this->load->helper(['url', 'form']);
        $this->load->library(['form_validation', 'session', 'pagination']);
        $this->load->model('Admin_model');
        $this->load->library("pagination");
    }

    public function index() {
        if ($this->session->userdata('logged_in')) { //if logged in
            $page_config = array(
                'base_url' => site_url('Admin_inventory/index'),
                'total_rows' => $this->Admin_model->get_inventory_count(), // get total number of patients 
                'num_links' => 3,
                'per_page' => 10,

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

            $id = $this->session->userdata('admin_id');

            $data['product'] = $this->Admin_model->get_inventory_row($id);
            $data['products'] = $this->Admin_model->get_inventory_table($page_config['per_page'], $page);
            
            $data['title'] = 'Inventory';
            $this->load->view('include-admin/dashboard-header', $data);
            $this->load->view('include-admin/dashboard-navbar', $data);
            $this->load->view('admin-views/inventory-view', $data);
            $this->load->view('include-admin/dashboard-scripts');
        } else {
            redirect('Login/signin');
        }
    }

    public function add_product_validation()
    {
        $this->form_validation->set_rules('prod_name', 'Product name', 'required|regex_match[/^([a-z ])+$/i]', array(
            'required' => 'Please enter your %s.'
        ));

        $this->form_validation->set_rules('prod_dosage', 'Product Dosage', 'required', array(
            'required' => 'Please enter your %s.'
        ));

        $this->form_validation->set_rules(array('prod_desc', 'Product Description', 'required', array(
            'required' => 'Please enter your %s.'
        )));

        $this->form_validation->set_rules('stock_in', 'Stock In', 'required|numeric', array(
            'required' => 'Please enter your %s.',
            'numeric' => 'Please enter a valid %s.'
        ));

        $this->form_validation->set_rules('stock_out', 'Stock Out', 'required|numeric', array(
            'required' => 'Please enter your %s.',
            'numeric' => 'Please enter a valid %s.'
        ));
       
        if ($this->form_validation->run() == FALSE)
        {
            $this->index();
        }
        else
        {
            $addProduct = $this->input->post('addProduct');

            if (isset($addProduct))
            {
                $info = array(
                    'prod_name' => $this->input->post('prod_name'),
                    'prod_dosage' => $this->input->post('prod_dosage'),
                    'prod_desc' => $this->input->post('prod_desc'),
                    'stock_in' => $this->input->post('stock_in'),
                    'stock_out' => $this->input->post('stock_out'),
                    'prod_date' => date('Y-m-d H:i:s')
                );
            }

            $this->session->set_flashdata('success', 'Product successfully added.');
            $this->Admin_model->add_product($info);
            redirect('Admin_inventory');

            // <div class="alert alert-warning alert-dismissible fade show" role="alert">
            //     <strong>Holy guacamole!</strong> You should check in on some of those fields below.
            //     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            // </div>

            
        }

    }

    public function edit_product($id)
    {
        $data['products'] = $this->Admin_model->get_inventory_row($id);
    }

    public function view_product($id)
    {
        $data['products'] = $this->Admin_model->get_inventory_row($id);
    }

    public function delete_product($id)
    {
        $this->Admin_model->delete_product($id);
        redirect('Admin_inventory/index');
    }

    private function dd($data)
    {
        echo "<pre>";
        die(var_dump($data));
        echo "</pre>";
    }
    
}
?>