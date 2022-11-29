<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(['url', 'form', 'security']);
        $this->load->library(['form_validation', 'session']);
        $this->load->model('Login_model');
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
            $this->load->view('include-website/footer');
            $this->load->view('include-website/scripts');
        }
    }

    public function forgot_password()
    {
        $this->session->sess_destroy();
        if ($this->session->userdata('logged_in')) { //if logged in
            redirect('Users'); // directory if admin b ao user WALA PA
        } else {
            $data['title'] = 'Forgot Password | ePMC';
            $this->load->view('include-website/head', $data);
            $this->load->view('include-website/navbar');
            $this->load->view('website-views/forgot-password-view');
            $this->load->view('include-website/footer');
            $this->load->view('include-website/scripts');
        }
    }

    public function reset_password()
    {
        $submit = $this->input->post('continue');

        if (isset($submit)) {

            $email = $this->security->xss_clean($this->input->post('email'));

            $this->load->model('Login_model');
            $result = $this->Login_model->reset_password($email);


            if (isset($result)) {

                // send an email to the user
                $this->load->library('email');
                $config_email = array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'ssl://smtp.googlemail.com',
                    'smtp_port' => 465,
                    'smtp_user' => $this->config->item('email'), //Active gmail
                    'smtp_pass' => $this->config->item('password'), //Password
                    'mailtype' => 'html',
                    'starttls' => TRUE,
                    'newline' => "\r\n",
                    'charset' => $this->config->item('charset'),
                    'wordwrap' => TRUE
                );
                $this->email->initialize($config_email);


                $this->email->set_mailtype('html');
                $this->email->from($this->config->item('bot_email'), 'ePMC');
                $this->email->to($result->email);
                $this->email->subject('Reset Password');

                if ($result->role == 'patient' || $result->role == 'Patient') {
                    

                    $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>ePMC Email Verification</title></head><body>';
                    $message .= '<h1>Reset Password</h1>';
                    $message .= '<p>Hi ' . $result->first_name . ' ' . $result->middle_name . ' ' . $result->last_name . ',</p>';
                    $message .= '<p>Click the link below to reset your password.</p>';
                    $message .= '<p><a href="' . base_url('Login/reset_password_form/') . $result->patient_id . '/' . $result->role . '">Reset Password</a></p>';
                    $message .= '<p>Thank you!</p>';
                    $message .= '<p>ePMC Team</p>';
                    $message .= '</body></html>';

                    
                    $this->email->message($message);

                    if ($this->email->send()) {

                        // insert a row in patient_activity table
                        //$this->dd('Email sent');
                        $user_id = $result->patient_id;
                        $user_type = $result->role;
                        $user_activity = $result->un_patient_id . ' ' . $result->first_name . ' ' . $result->last_name . ' requested to reset password.';

                        $this->Login_model->patient_activity($user_id, $user_type, $user_activity);


                        $activity = array(
                            'activity' => 'A patient requested to reset password.',
                            'module' => 'Reset Password',
                            'date_created' => date('Y-m-d H:i:s')
                        );

                        $this->load->model('Admin_model');

                        $this->Admin_model->add_activity($activity);
                        
                        
                    } else {

                        $this->session->set_flashdata('error-email', 'An error occured while sending the email. Please try again.');
                        redirect('Login/forgot_password');

                    }

                } else {


                    $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>ePMC Email Verification</title></head><body>';
                    $message .= '<h1>Reset Password</h1>';
                    $message .= '<p>Hi ' . $result->first_name . ' ' . $result->middle_name . ' ' . $result->last_name . ',</p>';
                    $message .= '<p>Click the link below to reset your password.</p>';
                    $message .= '<p><a href="' . base_url('Login/reset_password_form/') . $result->user_id . '/' . $result->role . '">Reset Password</a></p>';
                    $message .= '<p>Thank you!</p>';
                    $message .= '<p>ePMC Team</p>';
                    $message .= '</body></html>';


                    $this->email->message($message);

                    if ($this->email->send()) {

                        $user_id = $result->user_id;
                        $user_type = $result->role;
                        $user_activity = $user_type . ' ' . $result->first_name . ' ' . $result->last_name . ' requested to reset password.';

                        $this->Login_model->user_activity($user_id, $user_type, $user_activity);

                        $activity = array(
                            'activity' => 'A user requested to reset password.',
                            'module' => 'Reset Password',
                            'date_created' => date('Y-m-d H:i:s')
                        );

                        $this->load->model('Admin_model');
                        $this->Admin_model->add_activity($activity);
                    } else {

                        $this->session->set_flashdata('error-email', 'An error occured while sending the email. Please try again.');
                        redirect('Login/forgot_password');
                    }
                }

                $this->session->set_flashdata('success', 'An email has been sent to your email address. Please check your email to reset your password.');
                redirect('Login/forgot_password');


            } else {

                $this->session->set_flashdata('error', 'Patient ID / Email address not found.');
                redirect('Login/forgot_password');
            }
        }
    }


    public function reset_password_form($id, $role)
    {
        if ($role == 'patient' || $role == 'Patient') {

            $this->load->model('Admin_model');
            $user = $this->Admin_model->get_patient_row($id);
            $data['id'] = $user->patient_id;
            $data['role'] = $user->role;
        }
        else {

            $this->load->model('Admin_model');
            $user = $this->Admin_model->get_useracc_row($id);
            $data['id'] = $user->user_id;
            $data['role'] = $user->role;
        }


        $this->session->sess_destroy();
        if ($this->session->userdata('logged_in')) { //if logged in
            redirect('Users'); // directory if admin b ao user WALA PA
        } else {
            $data['title'] = 'Reset Password | ePMC';
            $this->load->view('include-website/head', $data);
            $this->load->view('include-website/navbar');
            $this->load->view('website-views/reset-password-view', $data);
            $this->load->view('include-website/footer');
            $this->load->view('include-website/scripts');
        }
    }

    public function validate_password($id, $role)
    {
        $this->load->model('Admin_model');
        if ($role == 'patient' || $role == 'Patient') {

            $user = $this->Admin_model->get_patient_row($id);
        }
        else {

            $user = $this->Admin_model->get_useracc_row($id);
        }


        $submit = $this->input->post('continue');

        if (isset($submit)) {

            $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]', 
                array(
                    'required' => 'Please enter your new password.',
                    'min_length' => 'Password must be at least 8 characters long.'
                )
            );
            $this->form_validation->set_rules('conf_password', 'Confirm Password', 'trim|matches[password]');

            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('error', validation_errors());
                redirect('Login/reset_password_form/' . $id . '/' . $role);
            } else {

                $password = $this->security->xss_clean($this->input->post('password'));
                $this->security->xss_clean($this->input->post('conf_password'));


                $info['password'] = password_hash($password, PASSWORD_DEFAULT);


                if ($role == 'patient' || $role == 'Patient') {

                    $this->Admin_model->update_patient($id, $info);

                    $user_id = $user->patient_id;
                    $user_type = $user->role;
                    $user_activity = $user->un_patient_id . ' ' . $user->first_name . ' ' . $user->last_name . ' reset password.';

                    $this->Login_model->patient_activity($user_id, $user_type, $user_activity);

                    $activity = array(
                        'activity' => 'A patient reset password.',
                        'module' => 'Reset Password',
                        'date_created' => date('Y-m-d H:i:s')
                    );

                    $this->load->model('Admin_model');
                    $this->Admin_model->add_activity($activity);
                }
                else {

                    $this->Admin_model->edit_useracc($id, $info);

                    $user_id = $user->user_id;
                    $user_type = $user->role;
                    $user_activity = $user->first_name . ' ' . $user->last_name . ' reset password.';

                    $this->Login_model->user_activity($user_id, $user_type, $user_activity);

                    $activity = array(
                        'activity' => 'A user reset password.',
                        'module' => 'Reset Password',
                        'date_created' => date('Y-m-d H:i:s')
                    );

                    $this->load->model('Admin_model');
                    $this->Admin_model->add_activity($activity);
                }

                $this->session->set_flashdata('success', 'changed-password');
                redirect('Login/signin');
            }
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
            //$this->dd($result);


            if (isset($result)) {
                if ($result->status == '0') {
                    $error = 'Account is not activated yet. Please check your email for activation link.';
                    $this->session->set_flashdata('error', $error);
                    redirect('Login/signin');
                }

                if ($result->role == 'patient' || $result->role == 'Patient') {
                    $sess_data = array(
                        'id' => $result->patient_id,
                        'full_name' => $result->full_name,
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
                        'logged_in' => TRUE
                    );

                    // insert a row in user_activity table
                    $this->Login_model->patient_activity($result->patient_id, $result->role, 'Logged in');

                    $this->session->set_userdata($sess_data);
                    redirect('Users');
                }
                if ($result->role == 'Doctor' || $result->role == 'doctor') {
                    $sess_data = array(
                        'id' => $result->user_id,
                        'full_name' => $result->first_name . ' ' . $result->middle_name . ' ' . $result->last_name,
                        'email' => $result->email,
                        'contact_no' => $result->contact_no,
                        'role' => $result->role,
                        'avatar' => $result->avatar,
                        'specialization' => $result->specialization,
                        'gender' => $result->gender,
                        'birth_date' => $result->birth_date,
                        'logged_in' => TRUE
                    );

                    // insert a row in user_activity table
                    $this->Login_model->user_activity($result->user_id, $result->role, 'Logged in');

                    $this->session->set_userdata($sess_data);
                    redirect('Doctors');
                }
                if ($result->role == 'Admin' || $result->role == 'admin') {
                    $sess_data = array(
                        'id' => $result->user_id,
                        'full_name' => $result->first_name . ' ' . $result->middle_name . ' ' . $result->last_name,
                        'first_name' => $result->first_name,
                        'middle_name' => $result->middle_name,
                        'last_name' => $result->last_name,
                        'specialization' => $result->specialization,
                        'uname' => $result->username,
                        'email' => $result->email,
                        'role' => $result->role,
                        'avatar' => $result->avatar,
                        'gender' => $result->gender,
                        'birth_date' => $result->birth_date,
                        'contact_no' => $result->contact_no,
                        'logged_in' => TRUE
                    );

                    $this->session->set_userdata($sess_data);
                    //$this->dd($result->specialization);


                    // insert a row in user_activity table
                    $this->Login_model->user_activity($result->user_id, $result->role, 'Logged in');

                    if ($result->specialization == 'Pharmacy Assistant' || $result->specialization == 'pharmacy assistant') {
                        redirect('PharmacyAssistant');
                    } else {
                        redirect('Admin');
                    }

                    redirect('Admin');
                }
            }

            $error = 'Invalid username or password';
            $this->session->set_flashdata('error', $error);
            redirect('Login/signin');
        }
    }

    public function logout()
    {
        if ($this->session->userdata('role') == 'patient' || $this->session->userdata('role') == 'Patient') {
            $this->Login_model->patient_activity($this->session->userdata('id'), $this->session->userdata('role'), 'Logged out');
        } else {
            $this->Login_model->user_activity($this->session->userdata('id'), $this->session->userdata('role'), 'Logged out');
        }

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
