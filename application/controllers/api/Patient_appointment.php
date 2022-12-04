<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization');
header('Accept: application/json');
header('Content-Type: application/json;char et=UTF-8');
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

require(APPPATH.'/libraries/RestController.php');

class Patient_appointment extends RestController
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(['url', 'form', 'date', 'string', 'html', 'security']);
        $this->load->library(['form_validation', 'session']);
        $this->load->model('Appointment_model');
    }
    
    public function add_appointment_post() {
        $data=json_decode(file_get_contents('php://input'));
        
        $patientID=$data->patientID;
        $username=$data->username;
        $fullName=$data->fullName;
        $doctorName=$data->doctorName;
        $selectDate=$data->selectDate;
        $selectTime=$data->selectTime;

        //combine date and time
        $date = $selectDate . ' ' . $selectTime . ':00';

        //check if date exist 
        $check = $this->Appointment_model->get_patient_date($date);

        //save in database
        if(isset($check)) {
            $response = array('message' => 'Date already exist');
        } 
        else {
            $response = array(
                'patient_id' => $patientID,
                'username' => $username,
                'full_name' => $fullName,
                'doctor_name' => $doctorName,
                'appointment_date' => $date,
                'status' => 0
            );
            $this->Appointment_model->add_appointment($response);
        }

        echo json_encode($response);
    }


}
?>