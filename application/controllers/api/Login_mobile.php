<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization');
header('Accept: application/json');
header('Content-Type: application/json;char et=UTF-8');
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

require(APPPATH.'/libraries/RestController.php');

class Login_mobile extends RestController
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(['url', 'form', 'date', 'string', 'html', 'security']);
        $this->load->library(['form_validation', 'session']);
        $this->load->model('Login_model');
    }
    
    public function validation_post() {
        $data=json_decode(file_get_contents('php://input'));
        
        $email=$data->email;
        $pass=$data->pass;

        $result = $this->Login_model->login($email,$pass);
        //login as admin
        if (isset($result)){
            if ($result->status == '0') {
                $response[] = array('status'=>$result->status);
            } else {
                $verification_code = random_string('numeric', 4);

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
                $this->email->subject('ePMC Mobile Login Verification');
                
                if ($result->role == 'patient' || $result->role == 'Patient') {
                    $response[] = array("role" => $result->role,
                                        'patient_id'=>$result->patient_id, 
                                        'full_name' => $result->first_name . ' ' .  $result->last_name,
                                        'username' => $result->un_patient_id, 
                                        'email' => $result->email,
                                        'pass' => $result->password,
                                        'contact_no'=>$result->cell_no,
                                        'status'=>$result->status,
                                        'verification_code'=>$verification_code,
                                        'nav'=>'PatientNavbar'
                    );
                } else if ($result->role == "Doctor") {
                    $response[] = array("role" => $result->role,  
                                        'doctor_id' => $result->user_id, 
                                        'full_name' => $result->first_name . ' ' .  $result->last_name,
                                        'email' => $result->email,
                                        'username'=>$result->username,
                                        'pass' => $result->password,
                                        'contact_no'=>$result->contact_no,
                                        'verification_code'=>$verification_code,
                                        'nav'=>'DoctorNavbar'
                    );
                } else if ($result->role == "Admin") {
                    $response[] = array("role" => $result->role, //index[0]                                
                                        'admin_id' => $result->user_id, 
                                        'full_name' => $result->first_name . ' ' .  $result->last_name,
                                        'email' => $result->email,
                                        'username'=>$result->username,
                                        'pass' => $result->password,
                                        'contact_no'=>$result->contact_no,
                                        'verification_code'=>$verification_code,
                                        'nav'=>'AdminNavbar'
                    );
                }
                $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>ePMC Mobile Login Verification</title></head><body>';
                $message .= '<h1>Mobile Login Verification</h1>';
                $message .= '<p>Hi ' . $result->first_name . ' ' . $result->middle_name . ' ' . $result->last_name . ',</p>';
                $message .= '<p>This is your Login Verification Code: '.$verification_code.'</p>';
                $message .= '<p>If this request did not come from you, change your account password immediately to prevent further unauthorized access.</p>';
                $message .= '<p>Thank you!</p>';
                $message .= '<p>ePMC Team</p>';
                $message .= '</body></html>';

                $this->email->message($message);

                if (!$this->email->send()) {
                    show_error($this->email->print_debugger());   
                } 
            }
        }
         //invalid credentials
        else {
            $response[] = null;
        }

        echo json_encode($response);
        
    }
}
?>