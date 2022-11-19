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

            $id = $this->session->userdata('admin_id');
            $data['user_role'] = $this->session->userdata('role');
            $data['user_specialization'] = $this->session->userdata('specialization');

            $data['title'] = 'Inventory';
            $data['product'] = $this->Admin_model->get_inventory_row($id);
            $data['products'] = $this->Admin_model->get_inventory_table();
            
            
            $this->load->view('include-admin/dashboard-header', $data);
            $this->load->view('include-admin/dashboard-navbar', $data);
            $this->load->view('admin-views/inventory-view', $data);
            $this->load->view('include-admin/inventory-scripts');
        } else {
            redirect('Login/signin');
        }
    }

    public function datatable()
    {
        // Datatables Variables
        $draw = intval($this->input->get("draw"));

        $products = $this->Admin_model->get_inventory_tbl();

        $data = array();
        $no = 0;
        foreach ($products->result() as $product) {

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = '<strong>' . $product->prod_name . '</strong><br>' . $product->prod_dosage .'';
            $row[] = $product->prod_desc;
            $row[] = ($product->stock_in)+($product->stock_out);
            $row[] = $product->stock_in;
            $row[] = $product->stock_out;
            $row[] = 
            '
            <div class="d-md-flex justify-content-md-center">
                <button class="btn btn-light btn-sm mx-2 product-view-modal-btn" data-bs-toggle="modal" data-bs-target="#product-view-modal-'.$product->item_id.'" type="button" data-id=" '. $product->item_id .'" data-prod_name=" ' . $product->prod_name . '" data-prod_dosage="' . $product->prod_dosage . '" data-prod_desc="' . $product->prod_desc . '" data-quantity="' . ($product->stock_in) + ($product->stock_out) . '" data-stock_in="' . $product->stock_in . '" data-stock_out="' . $product->stock_out . '" data-prod_name_title="' . $product->prod_name . '">View</button>
            </div>

            <!-- Edit btn change all from view modal btn -->
            <div class="d-md-flex justify-content-md-center">
                <button class="btn btn-light btn-sm mx-2 product-edit-modal-btn" data-bs-toggle="modal" data-bs-target="#product-edit-modal-'.$product->item_id.'" type="button" data-id="' . $product->item_id . '" data-prod_name="' . $product->prod_name . '" data-prod_dosage="' . $product->prod_dosage . '" data-prod_desc="' . $product->prod_desc . '" data-quantity="' . ($product->stock_in) + ($product->stock_out) . '" data-stock_in="' . $product->stock_in . '" data-stock_out="' . $product->stock_out . '" data-prod_name_title="' . $product->prod_name . '">Edit</button>
            </div>

            <a class="btn btn-link btn-sm btn-delete" data-bs-toggle="modal" data-bs-target="#delete-dialog-' . $product->item_id . ' "><i class="far fa-trash-alt"></i></a>
            ';
            
            $data[] = $row;

        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $products->num_rows(),
            "recordsFiltered" => $products->num_rows(),
            "data" => $data
        );
        echo json_encode($output);
    }

    public function add_product_validation()
    {
        $this->form_validation->set_rules('prod_name', 'Product name', 'required|regex_match[/^([a-z ])+$/i]', array(
            'required' => 'Please enter your %s.'
        ));

        $this->form_validation->set_rules('prod_dosage', 'Product Dosage', 'required|numeric', array(
            'required' => 'Please enter your %s.',
            'numeric' => 'Please enter a valid %s.'
        ));

        $this->form_validation->set_rules('prod_desc', 'Product Description', 'required', array(
            'required' => 'Please enter your %s.'
        ));

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
            $this->session->set_flashdata('message', 'add_failed');
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

            $activity = array(
                'activity' => 'A new product has been added in the inventory',
                'module' => 'Inventory',
                'date_created' => date('Y-m-d H:i:s')
            );
    
            $this->Admin_model->add_activity($activity);

            $this->session->set_flashdata('message', 'success');
            $this->Admin_model->add_product($info);
            redirect('Admin_inventory');

            // <div class="alert alert-warning alert-dismissible fade show" role="alert">
            //     <strong>Holy guacamole!</strong> You should check in on some of those fields below.
            //     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            // </div>
        }
    }

    public function update_product($id)
    {   
        $data['product'] = $this->Admin_model->get_inventory_row($id);

        $this->form_validation->set_rules('prod_name', 'Product name', 'required|regex_match[/^([a-z ])+$/i]', array(
            'required' => 'Please enter your %s.'
        ));

        $this->form_validation->set_rules('prod_dosage', 'Product Dosage', 'required', array(
            'required' => 'Please enter your %s.'
        ));

        $this->form_validation->set_rules('prod_desc', 'Product Description', 'required', array(
            'required' => 'Please enter your %s.'
        ));

        $this->form_validation->set_rules('quantity', 'Quantity');

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
            $this->session->set_flashdata('message', 'edit_failed');
            $this->index();
        }
        else
        {   
           
            $updateProduct = $this->input->post('updateProduct');
            if (isset($updateProduct))
            {
                $info = array(
                    'prod_name' => $this->input->post('prod_name'),
                    'prod_dosage' => $this->input->post('prod_dosage'),
                    'prod_desc' => $this->input->post('prod_desc'),
                    'stock_in' => $this->input->post('stock_in'),
                    'stock_out' => $this->input->post('stock_out')
                );
            }

            $activity = array(
                'activity' => 'A product has been updated in the inventory',
                'module' => 'Inventory',
                'date_created' => date('Y-m-d H:i:s')
            );
    
            $this->Admin_model->add_activity($activity);
            $this->session->set_flashdata('message', 'edit_prod_success');
            $this->Admin_model->update_product($id, $info);
            redirect('Admin_inventory/index');  
        }
        // $data['products'] = $this->Admin_model->get_inventory_row($id);
        // $updateProduct = $this->input->post('updateProduct');
        // if (isset($updateProduct)) {
        //     $id = $this->input->post('item_id');
        //     $info = array(
        //         'prod_name' => $this->input->post('prod_name'),
        //         'prod_dosage' => $this->input->post('prod_dosage'),
        //         'prod_desc' => $this->input->post('prod_desc'),
        //         'stock_in' => $this->input->post('stock_in'),
        //         'stock_out' => $this->input->post('stock_out')
        //     );
        //     $this->session->set_flashdata('success', 'Product successfully updated.');
        //     $this->Admin_model->update_product($id, $info);
        //     redirect('Admin_inventory');        
        // }
    }

    public function view_product($id)
    {
        $data['products'] = $this->Admin_model->get_inventory_row($id);
    }

    public function delete_product($id)
    {   
        $activity = array(
            'activity' => 'A product has been deleted in the inventory',
            'module' => 'Inventory',
            'date_created' => date('Y-m-d H:i:s')
        );

        $this->Admin_model->add_activity($activity);
        $this->session->set_flashdata('message', 'dlt_success');
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