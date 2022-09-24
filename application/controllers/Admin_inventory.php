<?php

class Admin_inventory extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
        $this->load->helper(['url', 'form']);
        $this->load->library(['form_validation', 'session', 'pagination']);
        $this->load->model('Admin_model');
    }

    public function index() {
        
        $data['title'] = 'Inventory';
        $this->load->view('include-admin/dashboard-header', $data);
        $this->load->view('include-admin/dashboard-navbar');
        $this->load->view('admin-views/inventory-view');
        $this->load->view('include-website/scripts');
    }
}
?>