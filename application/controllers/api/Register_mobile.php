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
}
?>