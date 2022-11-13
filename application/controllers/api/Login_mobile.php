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

        $query1 = $this->Login_model->login($email,$pass);

        if($query1) {
            $Message = "Login successful";  
        } else {
            $Message = "Invalid email or password";
        }
        $response[] = array("Message" => $Message);
        echo json_encode($response);
        
        
        
        
        // $r = $this->Login_model->login($email,$password);
        // $this->response($r); 

        // $email=$data->email;
        // $password=$data->password;

        // $email='adminri@gmail.com';
        // $password='admin123';
        
        // echo json_encode($email);

        // if(isset($decodedData)) {
        //     $email = $decodedData['email'];
        //     $password = $decodedData['password'];
        //     echo 'null';
        // }

        // http_response_code(200);
        // if($email && $password){
        //     $json = $this->Login_model->login($email,$password);
        //     if($json){
        //         echo json_encode($json);
        //     } else {
        //         http_response_code(400);
        //         echo json_encode([
        //             'error'=>true,
        //             'message'=>'Invalid email or password.'
        //         ]);
        //     }
        // }
    }
}
?>