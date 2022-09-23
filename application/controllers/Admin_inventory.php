<?php

class Admin_inventory extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
        $this->load->helper('url', 'form');
    }

    public function index() {
        
        $data['title'] = 'Dashboard';
        $this->load->view('include-website/dashboard-header', $data);
        $this->load->view('admin-panel/inventory-view');
        $this->load->view('include-website/scripts');

    }
}
?>