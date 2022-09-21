<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(['url', 'form']);
        $this->load->library(['form_validation', 'session']);
    }

    public function signin()
    {
        
        $data['title'] = 'Login | ePMC';
        $this->load->view('include-website/head', $data);
        $this->load->view('include-website/navbar');
        $this->load->view('website-views/login-view');
        $this->load->view('include-website/scripts');
        
    }
}
?>