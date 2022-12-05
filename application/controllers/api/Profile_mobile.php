<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization');
header('Accept: application/json');
header('Content-Type: application/json;char et=UTF-8');
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

require(APPPATH.'/libraries/RestController.php');

class Profile_mobile extends RestController
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(['url', 'form', 'date', 'string', 'html', 'security']);
        $this->load->library(['form_validation', 'session']);
        $this->load->model('Login_model');
    }
    
    public function profile_post() {
        $data=json_decode(file_get_contents('php://input'));

        $email=$data->email;
        $pass=$data->pass;

        $result = $this->Login_model->login($email,$pass);
        
        if(isset($result)) {
            if ($result->role == 'patient' || $result->role == 'Patient'){
                $response[] = array("role" => $result->role,
                                    'patient_id'=>$result->patient_id, 
                                    'full_name' => ucwords($result->first_name) . ' ' . ucwords($result->middle_name) . ' ' . ucwords($result->last_name),
                                    'username' => $result->un_patient_id, 
                                    'bday'=> $result->birth_date,
                                    'email' => $result->email,
                                    'pass' => $result->password,
                                    'contact_no'=>$result->cell_no,
                                    'avatar'=>'http://192.168.2.115/epmc-4/assets/img/profile-avatars/'.$result->avatar
                );
            } else {
                $response[] = array("role" => $result->role,
                                    'user_id'=>$result->user_id, 
                                    'full_name' => $result->first_name . ' ' . $result->middle_name . ' ' . $result->last_name,
                                    'username' => $result->username, 
                                    'bday'=> $result->birth_date,
                                    'email' => $result->email,
                                    'pass' => $result->password,
                                    'contact_no'=>$result->contact_no,
                                    'avatar'=>'http://192.168.2.115/epmc-4/assets/img/profile-avatars/'.$result->avatar
                );
            }
        }

        else {
            $response[] = null;
        }

        echo json_encode($response);
    }

    public function update_post() {
        $data=json_decode(file_get_contents('php://input'));

        $email=$data->email;
        $pass=$data->pass;

        $result = $this->Login_model->login($email,$pass);

    }

    //patient dashboard
    public function next_consult($email,$pass) {
        $data=json_decode(file_get_contents('php://input'));

        $patient_id=$data->patient_id;

        $result = $this->Login_model->next_consult($patient_id);

        if(isset($result)) {
            $response[] = array('next_consult' => $result->next_consult);
        }

        else {
            $response[] = null;
        }

        echo json_encode($response);
    }
}
?>