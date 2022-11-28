<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization');
header('Accept: application/json');
header('Content-Type: application/json;char et=UTF-8');
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

require(APPPATH.'/libraries/RestController.php');

class Register_mobile extends RestController
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(['url', 'form', 'date', 'string', 'html', 'security']);
        $this->load->library(['form_validation', 'session']);
        $this->load->model('Admin_model');
    }
    
    public function register_post() {
        $data=json_decode(file_get_contents('php://input'));
        
        //personal info
        $firstName=$data->firstName;
        $middleName=$data->middleName;
        $surname=$data->surname;
        $age=$data->age;
        $bday=$data->bday;
        $sex=$data->sex;
        $civilStatus=$data->civilStatus;
        $occupation=$data->occupation;
        $address=$data->address;

        //contact info
        $contactNum=$data->contactNum;
        $telephoneNum=$data->telephoneNum;
        $email=$data->email;

        //emergency contact
        $emerContactName=$data->emerContactName;
        $relationship=$data->relationship;
        $emerContactNum=$data->emerContactNum;

        //account info
        $password=$data->password;

        //check if email exist 
        $check = $this->Admin_model->get_patient_email($email);

        // foreach ($check as $c) {
            if(isset($check)) {
                $response = array('message' => 'Email already exist');
            } 
            else {
                $response = array(
                    'first_name' => $firstName,
                    'middle_name' => $middleName,
                    'last_name' => $surname,
                    'age' => $age,
                    'birth_date' => $bday,
                    'sex' => $sex,
                    'civil_status' => $civilStatus,
                    'occupation' => $occupation,
                    'address' => $address,
                    'cell_no' => $contactNum,
                    'tel_no' => $telephoneNum,
                    'email' => $email,
                    'ec_name' => $emerContactName,
                    'relationship' => $relationship,
                    'ec_contact_no' => $emerContactNum,
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'type' => 'unverified',
                    'role' => 'patient',
                    'avatar' => 'default-avatar.png',
                    'last_checkup' => date('Y-m-d H:i:s'),
                    'activation_code' => random_string('alnum', 16),
                    'status' => '0',
                    'date_created' => date('Y-m-d H:i:s')
                );
        
                //add patient record
                $patient_id = $this->Admin_model->add_patient($response);
                
                //custom patient id based on the name initials
                $response['un_patient_id'] = $this->create_patient_id($response['first_name'], $response['middle_name'], $response['last_name'], $patient_id);
        
                $this->Admin_model->update_patient($patient_id, $response);
        
                $this->create_folder($patient_id);

                $patientDetails = array(
                    'patient_id' => $patient_id,
                    'height' => '0',
                    'weight' => '0',
                );
    
                $setId = array(
                    'patient_id' => $patient_id
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
                $this->email->to($email);
                $this->email->subject('ePMC Email Verification');
    
                $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>ePMC Email Verification</title></head><body>';
    
                $message .= '<p> Dear ' . $response['first_name'] . ' ' . $response['middle_name'] . ' ' . $response['last_name'] . ',</p>';
                $message .= '<p>Thank you for registering to ePMC. Please click the link below to verify your email address.</p>';
                $message .= '<p><strong><a href="' . base_url('Register/verify_email/' . $response['activation_code']) . '">Verify Email</a></strong></p>';
                $message .= '<p>Thank you!</p>';
                $message .= '<p>ePMC Team</p>';
                $message .= '</body></html>';
    
                $this->email->message($message);
    
                if (!$this->email->send()) {
                    show_error($this->email->print_debugger());
                }

                $this->Admin_model->add_patient_details($patientDetails);
                $this->Admin_model->add_patient_diagnosis($setId);
                $this->Admin_model->add_patient_lab_reports($setId);
                $this->Admin_model->add_patient_treatment_plan($setId);

            }
        // }

        

        echo json_encode($response);
    }

    public function create_patient_id($first_name, $middle_name, $last_name, $insert_id)
    {
        $first_name = substr($first_name, 0, 1);
        $middle_name = substr($middle_name, 0, 1);
        $last_name = substr($last_name, 0, 1);

        //combine name 
        $name = $first_name.$middle_name.$last_name;

        //convert name to uppercase
        $name = strtoupper($name);

        //format $insert_id to 4 digits
        $insert_id = str_pad($insert_id, 4, '0', STR_PAD_LEFT);

        $patient_id = 'PMC' . $name . '-' . $insert_id;

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
?>