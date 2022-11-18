<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization');
header('Accept: application/json');
header('Content-Type: application/json;char et=UTF-8');
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

require(APPPATH.'/libraries/RestController.php');

class Admin_patientrec_mobile extends RestController
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(['url', 'form']);
        $this->load->library(['form_validation', 'session']);
        $this->load->model('Admin_model');
    }

    public function total_get() {
        $response[] = array('id'=>1,
                            'patient'=>$this->Admin_model->get_patient_count());
        echo json_encode($response);
    }

    public function patients_get() {
        // $response[] = array('records'=>$this->Admin_model->get_patient_table());
        $result=$this->Admin_model->get_patient_fullname();
        foreach($result as $fullname) {
            $response[] = array('id'=>$fullname->patient_id,
                                'pt_fullname'=>$fullname->first_name . ' ' . $fullname->middle_name . ' ' . $fullname->last_name,
                                'image'=>'http://192.168.2.115/epmc-4/assets/img/profile-avatars/'.$fullname->avatar);
        }
        echo json_encode($response);
    }

    public function ptinfo_post(){
        $data=json_decode(file_get_contents('php://input'));
        
    }
}
?>