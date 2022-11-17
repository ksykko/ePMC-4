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

        $this->load->helper(['url', 'form']);
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
            if ($result->role == "Admin") {
                $response = array("role" => $result->role, //index[0]                                
                                    'admin_id' => $result->user_id, 
                                    'full_name' => $result->first_name . ' ' .  $result->last_name,
                                    'specialization' => $result->specialization,
                                    'email' => $result->email,
                                    'pass' => $result->password,
                                    'bday' => $result->birth_date,
                                    'gender' => $result->gender,
                                    'avatar' => $result->avatar
                );
            }
            else if ($result->role == "Doctor") {
                $response = array("role" => $result->role,  
                );
            } 
            else if ($result->role == "patient") {
                $response = array("role" => $result->role,  
                );
            }
        }
         //invalid credentials
        else {
            $response = array('role' => 'Invalid');
        }
       
       

        echo json_encode($response);
    }
}
?>