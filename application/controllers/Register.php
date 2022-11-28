<?php

class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(['url', 'form', 'date', 'string', 'html', 'security']);
        $this->load->library(['form_validation', 'session', 'pagination']);
        $this->load->model('Admin_model');
        $this->load->model('Doctors_model');

        // apply xss_clean to all post data

    }

    public function index()
    {
        $data['title'] = 'Register | ePMC';

        $this->load->view('include-website/head', $data);
        $this->load->view('include-website/navbar');
        $this->load->view('website-views/register-view');
        $this->load->view('include-website/footer');
        $this->load->view('include-website/scripts');
    }

    public function register()
    {
        $this->form_validation->set_rules('first_name', 'First Name', 'trim');
        $this->form_validation->set_rules('middle_name', 'Middle Name', 'trim');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim');
        $this->form_validation->set_rules('age', 'Age', 'trim');
        $this->form_validation->set_rules('birth_date', 'Birth Date', 'trim');
        $this->form_validation->set_rules('occupation', 'Occupation', 'trim');
        $this->form_validation->set_rules('address', 'Address', 'trim');
        $this->form_validation->set_rules('cell_no', 'Cell No.', 'trim');
        $this->form_validation->set_rules('tel_no', 'Tel No.', 'trim');
        $this->form_validation->set_rules('email', 'Email', 'trim|is_unique[patient_record.email]');
        $this->form_validation->set_rules('ec_name', 'Emergency Contact Name', 'trim');
        $this->form_validation->set_rules('relationship', 'Relationship', 'trim');
        $this->form_validation->set_rules('ec_contact_no', 'Emergency Contact Cell No.', 'trim');
        $this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]');
        $this->form_validation->set_rules('conf_password', 'Confirm Password', 'trim|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            // error
            $this->session->set_flashdata('error', validation_errors());
            //$this->dd(validation_errors());
            redirect('Register');
        } else {

            $this->security->xss_clean($this->input->post('conf_password'));

            $info = array(
                'first_name' => $this->input->post('first_name'),
                'middle_name' => $this->input->post('middle_name'),
                'last_name' => $this->input->post('last_name'),
                'age' => $this->input->post('age'),
                'birth_date' => $this->input->post('birth_date'),
                'sex' => $this->input->post('sex'),
                'civil_status' => $this->input->post('civil_status'),
                'occupation' => $this->input->post('occupation'),
                'address' => $this->input->post('address'),
                'cell_no' => $this->input->post('cell_no'),
                'tel_no' => $this->input->post('tel_no'),
                'email' => $this->input->post('email'),
                'ec_name' => $this->input->post('ec_name'),
                'relationship' => $this->input->post('relationship'),
                'ec_contact_no' => $this->input->post('ec_contact_no'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'type' => 'registered',
                'role' => 'patient',
                'avatar' => 'default-avatar.png',
                'activation_code' => random_string('alnum', 16),
                'status' => '0',
                'date_created' => date('Y-m-d H:i:s'),
                'last_accessed' => date('Y-m-d H:i:s')
            );

            //$this->dd($info);

            if ($this->security->xss_clean($info)) {

                $insert_id = $this->Admin_model->add_patient($info);

                // create custom patient id based on name initials
                $info['un_patient_id'] = $this->create_patient_id($info['first_name'], $info['middle_name'], $info['last_name'], $insert_id);


                $this->Admin_model->update_patient($insert_id, $info);

                $this->create_folder($insert_id);

                $patientDetails = array(
                    'patient_id' => $insert_id,
                    'height' => '0',
                    'weight' => '0',
                );

                $setId = array(
                    'patient_id' => $insert_id
                );


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
                $this->email->to($info['email']);
                $this->email->subject('ePMC Email Verification');

                $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>ePMC Email Verification</title></head><body>';

                $message .= '<p> Dear ' . $info['first_name'] . ' ' . $info['middle_name'] . ' ' . $info['last_name'] . ',</p>';
                $message .= '<p>Thank you for registering to ePMC. Please click the link below to verify your email address.</p>';
                $message .= '<p><strong><a href="' . base_url('Register/verify_email/' . $info['activation_code']) . '">Verify Email</a></strong></p>';
                $message .= '<p>Thank you!</p>';
                $message .= '<p>ePMC Team</p>';
                $message .= '</body></html>';

                $this->email->message($message);

                if (!$this->email->send()) {
                    show_error($this->email->print_debugger());
                }


                // insert a row in patient_activity table

                $patient = $this->Admin_model->get_patient_row($insert_id);
                $user_id = $patient->patient_id;
                $user_type = $patient->role;
                $user_activity = $patient->un_patient_id . ' has registered.';

                $this->load->model('Login_model');
                $this->Login_model->patient_activity($user_id, $user_type, $user_activity);

                $activity = array(
                    'activity' => 'A new patient has registered.',
                    'module' => 'Patient Records',
                    'date_created' => date('Y-m-d H:i:s')
                );

                $this->Admin_model->add_activity($activity);

                $this->session->set_flashdata('message', 'verify-first');
                $this->Admin_model->add_patient_details($patientDetails);
                $this->Admin_model->add_patient_diagnosis($setId);
                $this->Admin_model->add_patient_lab_reports($setId);
                $this->Admin_model->add_patient_treatment_plan($setId);

                //$this->dd($info);

                redirect('Login/signin');
            }
            else {
                $this->session->set_flashdata('message', 'error');
                redirect('Login/signin');
            }
        }
    }


    public function create_patient_id($first_name, $middle_name, $last_name, $insert_id)
    {
        $first_name = substr($first_name, 0, 1);
        $middle_name = substr($middle_name, 0, 1);
        $last_name = substr($last_name, 0, 1);

        //format $insert_id to 4 digits
        $insert_id = str_pad($insert_id, 4, '0', STR_PAD_LEFT);

        $patient_id = 'PMC' . $first_name . $middle_name . $last_name . '-' . $insert_id;

        return $patient_id;
    }

    public function create_folder($id)
    {
        $folder = './uploads/' . $id;
        if (!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }
        return $folder;
    }

    public function verify()
    {
        $data['title'] = 'Verify | ePMC';

        $this->load->view('include-website/head', $data);
        $this->load->view('include-website/navbar');
        $this->load->view('website-views/verify-view');

        $this->load->view('include-website/scripts');
    }

    public function verify_email($activation_code)
    {
        $user = $this->Admin_model->get_email_code($activation_code);
        if ($user) {
            $this->Admin_model->activate($user->patient_id);
        }
    }

    public function dd($data)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        die();
    }
}
