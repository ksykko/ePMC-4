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
        $this->session->sess_destroy();
        if ($this->session->userdata('logged_in')) { //if logged in
            redirect('Users'); // directory if admin b ao user WALA PA
        } else {
            $data['title'] = 'Login | ePMC';
            $this->load->view('include-website/head', $data);
            $this->load->view('include-website/navbar');
            $this->load->view('website-views/login-view');
            $this->load->view('include-website/scripts');
        }
    }

    public function validate()
    {
        $submit = $this->input->post('login');

        if (isset($submit)) {
            $email = $this->input->post('email');
            $pass = $this->input->post('password');

            $this->load->model('Login_model');
            $result = $this->Login_model->login($email, $pass);

            // var_dump($result);
            // die();

            if (isset($result)) {
                // if ($result->status == 0) {
                //     $error = 'Account is not activated yet. Please check your email for activation link.';
                //     $this->session->set_flashdata('error', $error);
                //     redirect('Login/signin');
                // }

                if ($result->role == 'patient') {
                    $sess_data = array(
                        'id' => $result->patient_id,
                        'full_name' => $result->first_name .' '. $result->middle_name . ' ' . $result->last_name,
                        'age' => $result->age,
                        'birth_date' => $result->birth_date,
                        'sex' => $result->sex,
                        'occupation' => $result->occupation,
                        'address' => $result->address,
                        'cell_no' => $result->cell_no,
                        'tel_no' => $result->tel_no,
                        'email' => $result->email,
                        'ec_name' => $result->ec_name,
                        'relationship' => $result->relationship,
                        'ec_contact_no' => $result->ec_contact_no,
                        'password' => $result->password,
                        'role' => $result->role,
                        'avatar' => $result->avatar,
                        'logged_in' => TRUE
                    );

                    $this->session->set_userdata($sess_data);
                    redirect('Patient');
                }

                elseif ($result->role == 'Doctor') {
                    $sess_data = array(
                        'id' => $result->user_id,
                        'full_name' => $result->first_name . ' ' . $result->middle_name . ' ' . $result->last_name,
                        'email' => $result->email,
                        'contact_no' => $result->contact_no,
                        'role' => $result->role,
                        'avatar' => $result->avatar,
                        'specialization' => $result->specialization,
                        'logged_in' => TRUE
                    );

                    $this->session->set_userdata($sess_data);
                    redirect('Doctors');
                }
                
                else {
                    $sess_data = array(
                        'id' => $result->admin_id,
                        'full_name' => $result->full_name,
                        'email' => $result->email,
                        'role' => $result->role,
                        'logged_in' => TRUE
                    );

                    $this->session->set_userdata($sess_data);
                    redirect('Admin');
                }
            }
            else {
                $error = 'Invalid email or password.';
                $this->session->set_flashdata('error', $error);
                redirect('Login/signin');
            }

            // $error = 'Invalid email or password.';
            // $this->session->set_flashdata('error', $error);
            // redirect('Login/signin');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Login/signin');
    }


    private function dd($data)
    {
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
        die();
    }
}
