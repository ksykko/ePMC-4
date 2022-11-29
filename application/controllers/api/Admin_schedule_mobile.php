<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization');
header('Accept: application/json');
header('Content-Type: application/json;char et=UTF-8');
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

require(APPPATH.'/libraries/RestController.php');

class Admin_schedule_mobile extends RestController
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(['url', 'form']);
        $this->load->library(['form_validation', 'session']);
        $this->load->model('Admin_schedule_model');
    }

    public function sched_data_get()
    {
        //get schedule data
        $sched_data = $this->Admin_schedule_model->get_schedData();

        //get start date
        $start_date = $this->Admin_schedule_model->get_startDate();

        //get date on datetime format
        foreach ($start_date as $date) {
            $startDate[] = array(
                'start_date' => date('Y-m-d', strtotime($date->start_date)),
            );
        }

        for ($i=0; $i < count($startDate); $i++) { 
            $sDate = $startDate[$i]['start_date'];
            for($j=0; $j < count($sched_data); $j++) {
                $response[$sDate][] = array(
                    'schedule_id' => $sched_data[$i]->schedule_id,
                    'doctor_name' => $sched_data[$i]->doctor_name,
                    'specialization' => $sched_data[$i]->specialization,
                    'start_time' => date('H:i:s', strtotime($sched_data[$i]->start_date)),
                    'end_time' => date('H:i:s', strtotime($sched_data[$i]->end_date)),
                );
                break;
            }
        }
        echo json_encode($response);
    }

   

    public function edit_sched_post($id) {
        $update = $this->Admin_schedule_model->get_schedule_tbl($id);

        
    }
}
?>