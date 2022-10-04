<?php

class Web extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
        $this->load->helper('url', 'form');
    }

    public function index() {
        
        $data['title'] = 'ePMC | Pagtakhan Medical Clinic';
        $this->load->view('include-website/head', $data);
        $this->load->view('include-website/navbar');
        $this->load->view('website-views/home-view');
        $this->load->view('include-website/scripts');

    }
}

?>