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
        if ($this->session->userdata('logged_in')) { //if logged in
            redirect('Users'); // directory if admin b ao user WALA PA
        }
        else {
            $data['title'] = 'Login | ePMC';
            $this->load->view('include-website/head', $data);
            $this->load->view('include-website/navbar');
            $this->load->view('website-views/login-view');
            $this->load->view('include-website/scripts');
        }
    }

    public function validate() {
        $submit = $this->input->post('login');

        if (isset($submit)){
            $email = $this->input->post('email');
            $pass = $this->input->post('password');

            $this->load->model('Login_model');
            $result = $this->Login_model->login($email, $pass);

            if (isset($result)) {
                // if ($result->status == 0) {
                //     $error = 'Account is not activated yet. Please check your email for activation link.';
                //     $this->session->set_flashdata('error', $error);
                //     redirect('Login/signin');
                // }

                if ($result->role == 'admin') {
                    $sess_data = array(
                        'id' => $result->admin_id,
                        'username' => $result->username,  
                        'first_name' => $result->first_name,
                        'middle_name' => $result->middle_name,
                        'last_name' => $result->last_name,
                        'email' => $result->email,
                        'contact_no' => $result->contact_no,
                        'role' => $result->role,
                        'avatar' => $result->avatar,
                        'logged_in' => TRUE
                    );

                    $this->session->set_userdata($sess_data);
                    redirect('Admin');
                }

                if ($result->role == 'user') {
                    $sess_data = array(
                        'id' => $result->id,
                        'username' => $result->username,
                        'first_name' => $result->first_name,
                        'last_name' => $result->last_name,
                        'role' => $result->role,
                        'avatar' => $result->avatar,
                        'logged_in' => TRUE
                    );

                    $this->session->set_userdata($sess_data);
                    redirect('Users');
                }
            }

            $error = 'Invalid email or password.';
            $this->session->set_flashdata('error', $error);
            redirect('Login/signin');

        }

    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('Login/signin');
    }
   

    private function dd($data){
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
        die();
    }
}
