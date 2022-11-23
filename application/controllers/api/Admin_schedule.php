<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization');
header('Accept: application/json');
header('Content-Type: application/json;char et=UTF-8');
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

require(APPPATH.'/libraries/RestController.php');

class Admin_schedule extends RestController
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(['url', 'form']);
        $this->load->library(['form_validation', 'session']);
        $this->load->model('Admin_schedule_model');
    }

    //Monday Schedule
    public function mon_schedData_get() {
        //gets data from schedule table
        $schedule=$this->Admin_schedule_model->get_schedule();

        //get monday schedule data and store in array
        foreach ($schedule as $sched) {
            if ($sched->day == 'Mon') {
                $response[] = array(
                    'day' => $sched->day,
                    'schedule_id' => $sched->schedule_id,
                    'doctor_name' => $sched->doctor_name,
                    'specialization' => $sched->specialization,
                    'start_time' => date("h:i A", strtotime($sched->start_time)),
                    'end_time' => date("h:i A", strtotime($sched->end_time)),
                );
            }
        }
        echo json_encode($response);
    }

    // Tuesday Schedule
    public function tue_schedData_get() {
        $schedule=$this->Admin_schedule_model->get_schedule();

        foreach ($schedule as $sched) {
            if ($sched->day == 'Tue') {
                $response[] = array(
                    'day' => $sched->day,
                    'schedule_id' => $sched->schedule_id,
                    'doctor_name' => $sched->doctor_name,
                    'specialization' => $sched->specialization,
                    'start_time' => date("h:i A", strtotime($sched->start_time)),
                    'end_time' => date("h:i A", strtotime($sched->end_time)),
                );
            }
        }
        echo json_encode($response);
    }

    // Wednesday Schedule
    public function wed_schedData_get() {
        $schedule=$this->Admin_schedule_model->get_schedule();

        foreach ($schedule as $sched) {
            if ($sched->day == 'Wed') {
                $response[] = array(
                    'day' => $sched->day,
                    'schedule_id' => $sched->schedule_id,
                    'doctor_name' => $sched->doctor_name,
                    'specialization' => $sched->specialization,
                    'start_time' => date("h:i A", strtotime($sched->start_time)),
                    'end_time' => date("h:i A", strtotime($sched->end_time)),
                );
            }
        }
        echo json_encode($response);
    }

    // Thursday Schedule
    public function thu_schedData_get() {
        $schedule=$this->Admin_schedule_model->get_schedule();

        foreach ($schedule as $sched) {
            if ($sched->day == 'Thurs') {
                $response[] = array(
                    'day' => $sched->day,
                    'schedule_id' => $sched->schedule_id,
                    'doctor_name' => $sched->doctor_name,
                    'specialization' => $sched->specialization,
                    'start_time' => date("h:i A", strtotime($sched->start_time)),
                    'end_time' => date("h:i A", strtotime($sched->end_time)),
                );
            }
        }
        echo json_encode($response);
    }

    // Friday Schedule
    public function fri_schedData_get() {
        $schedule=$this->Admin_schedule_model->get_schedule();

        foreach ($schedule as $sched) {
            if ($sched->day == 'Fri') {
                $response[] = array(
                    'day' => $sched->day,
                    'schedule_id' => $sched->schedule_id,
                    'doctor_name' => $sched->doctor_name,
                    'specialization' => $sched->specialization,
                    'start_time' => date("h:i A", strtotime($sched->start_time)),
                    'end_time' => date("h:i A", strtotime($sched->end_time)),
                );
            }
        }
        echo json_encode($response);
    }

    // Saturday Schedule
    public function sat_schedData_get() {
        $schedule=$this->Admin_schedule_model->get_schedule();

        foreach ($schedule as $sched) {
            if ($sched->day == 'Sat') {
                $response[] = array(
                    'day' => $sched->day,
                    'schedule_id' => $sched->schedule_id,
                    'doctor_name' => $sched->doctor_name,
                    'specialization' => $sched->specialization,
                    'start_time' => date("h:i A", strtotime($sched->start_time)),
                    'end_time' => date("h:i A", strtotime($sched->end_time)),
                );
            }
        }
        echo json_encode($response);
    }

    public function edit_sched_post($id) {
        $update = $this->Admin_schedule_model->get_schedule_tbl($id);

        
    }



    // public function ptinfo_post(){
    //     $data=json_decode(file_get_contents('php://input'));
        
    // }
}
?>