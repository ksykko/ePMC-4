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
    
    //add appointment
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

    //display patient's appointment
    public function patient_appointment_post() {
        $data=json_decode(file_get_contents('php://input'));

        $patientID=$data->patientID;

        //get patient's appointment by ID
        $p_appointment = $this->Appointment_model->get_patient_appointment($patientID);

        //get date of p_appointment
        foreach ($p_appointment as $p) {
            $date[] = array (
                'date' => date('Y-m-d', strtotime($p->appointment_date)),
            );
        }

        //get appointment details of date
        for ($i=0; $i < count($date); $i++) { 
            $d = $date[$i]['date'];
            for($j=0; $j < count($p_appointment); $j++) {
                $response[$d][] = array(
                    'appointment_id' => $p_appointment[$i]->appointment_id,
                    'patient_id' => $p_appointment[$i]->patient_id,
                    'username' => $p_appointment[$i]->username,
                    'full_name' => $p_appointment[$i]->full_name,
                    'doctor_name' => $p_appointment[$i]->doctor_name,
                    // 'appoint date' => date('Y/m/d', $p_appointment[$i]->appointment_date),
                    'time' => date('H:i:s', strtotime($p_appointment[$i]->appointment_date)),

                    'status' => $p_appointment[$i]->status,
                );
                break;
            }
        }

        echo json_encode($response);
    }

    //display all appointment
    public function appointment_get() {
        $appointment = $this->Appointment_model->get_all_appointment();

        //get date of appointment
        foreach ($appointment as $a) {
            $date[] = array (
                'date' => date('Y-m-d', strtotime($a->appointment_date)),
            );
        }

        //get appointment details of date
        for ($i=0; $i < count($date); $i++) { 
            $d = $date[$i]['date'];
            for($j=0; $j < count($appointment); $j++) {
                $response[$d][] = array(
                    'appointment_id' => $appointment[$i]->appointment_id,
                    'patient_id' => $appointment[$i]->patient_id,
                    'username' => $appointment[$i]->username,
                    'full_name' => $appointment[$i]->full_name,
                    'doctor_name' => $appointment[$i]->doctor_name,
                    'time' => date('H:i:s', strtotime($appointment[$i]->appointment_date)),
                    'status' => $appointment[$i]->status,
                );
                break;
            }
        }
        echo json_encode($response);
    }

    //update status
    public function update_status_post() {
        $data=json_decode(file_get_contents('php://input'));

        $appointmentID=$data->appointmentID;
        $status=$data->status;

        //get row by appointment id
        $row = $this->Appointment_model->get_row_appointment($appointmentID);

        //update status
        if(isset($row)) {
            $response = array(
                'status' => $status,
            );
            $this->Appointment_model->update_status($appointmentID, $response);
        } 
        else {
            $response = array('message' => 'Appointment ID not found');
        }

        echo json_encode($response);

    }

    //delete appointment
    public function delete_appointment_post() {
        $data=json_decode(file_get_contents('php://input'));

        $appointmentID=$data->appointmentID;

        //get row by appointment id
        $row = $this->Appointment_model->get_row_appointment($appointmentID);

        //delete appointment
        if(isset($row)) {
            $this->Appointment_model->delete_appointment($appointmentID);
            $response = array(
                            'message' => 'Appointment deleted',
                            'status' => 5
                        );

        } 
        else {
            $response = array('message' => 'Appointment ID not found');
        }

        echo json_encode($response);
    }
}



?>