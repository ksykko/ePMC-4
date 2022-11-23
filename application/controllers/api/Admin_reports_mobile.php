<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization');
header('Accept: application/json');
header('Content-Type: application/json;char et=UTF-8');
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

require(APPPATH.'/libraries/RestController.php');

class Admin_reports_mobile extends RestController
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(['url', 'form']);
        $this->load->library(['form_validation', 'session']);
        $this->load->database();
        $this->load->model('Charts_model');
    }

    //START of age range
    public function age_range_get() {
        // get age range data from database
        $query = $this->Charts_model->get_age_range();

        // create array to store age range data
        $age_range = [
            '0-10' => 0,
            '11-20' => 0,
            '21-30' => 0,
            '31-40' => 0,
            '41-50' => 0,
            '51-60' => 0,
            '61-70' => 0,
            '71-80' => 0,
            '81-90' => 0,
            '91-100' => 0,
        ];

        // loop through the data and store in array
        foreach ($query as $row) {
            //count the number of patients in each age range

            // age range 0-10
            if ($row->age >= 0 && $row->age <= 10) {
                $age_range['0-10'] = $age_range['0-10'] + 1;
            }
            // age range 11-20
            if ($row->age >= 11 && $row->age <= 20) {
                $age_range['11-20'] = $age_range['11-20'] + 1;
            }
            // age range 21-30
            if ($row->age >= 21 && $row->age <= 30) {
                $age_range['21-30'] = $age_range['21-30'] + 1;
            }
            // age range 31-40
            if ($row->age >= 31 && $row->age <= 40) {
                $age_range['31-40'] = $age_range['31-40'] + 1;
            }
            // age range 41-50
            if ($row->age >= 41 && $row->age <= 50) {
                $age_range['41-50'] = $age_range['41-50'] + 1;
            }
            // age range 51-60
            if ($row->age >= 51 && $row->age <= 60) {
                $age_range['51-60'] = $age_range['51-60'] + 1;
            }
            // age range 61-70
            if ($row->age >= 61 && $row->age <= 70) {
                $age_range['61-70'] = $age_range['61-70'] + 1;
            }
            // age range 71-80
            if ($row->age >= 71 && $row->age <= 80) {
                $age_range['71-80'] = $age_range['71-80'] + 1;
            }
            // age range 81-90
            if ($row->age >= 81 && $row->age <= 90) {
                $age_range['81-90'] = $age_range['81-90'] + 1;
            }
            // age range 91-100
            if ($row->age >= 91 && $row->age <= 100) {
                $age_range['91-100'] = $age_range['91-100'] + 1;
            }
        }
        $xval = array_keys($age_range);
        $yval = array_values($age_range);

        foreach(array_combine($xval, $yval) as $x => $y) {
            $response[] = array(
                'x' => $x,
                'y' => $y
            );
        }

        echo json_encode($response);

    }
    //END of age range

    // START of bmi
    public function bmi_get()
    {
        $result = $this->Charts_model->get_bmi_data();

        // create array to store bmi data
        $bmi_data = [
            'underweight' => 0,
            'normal' => 0,
            'overweight' => 0,
            'obese' => 0,
        ];

        // loop through the data and store in array
        foreach ($result as $row) {

            // convert height and weight datatype to float
            $height = (float)$row->height;
            $weight = (float)$row->weight;

            // skips the patient if height or weight is 0
            if ($height == 0 || $weight == 0 || $height == null || $weight == null) {
                continue;
            }
            
            // calculate bmi
            $bmi = ($weight / $height / $height) * 10000;

            // count the number of patients in each bmi category
            if ($bmi < 18.5) {
                $bmi_data['underweight'] = $bmi_data['underweight'] + 1;
            }
            if ($bmi >= 18.5 && $bmi <= 24.9) {
                $bmi_data['normal'] = $bmi_data['normal'] + 1;
            }
            if ($bmi >= 25 && $bmi <= 29.9) {
                $bmi_data['overweight'] = $bmi_data['overweight'] + 1;
            }
            if ($bmi >= 30) {
                $bmi_data['obese'] = $bmi_data['obese'] + 1;
            }
        }

        $xval = array_keys($bmi_data);
        $yval = array_values($bmi_data);

        foreach(array_combine($xval, $yval) as $x => $y) {
            $response[] = array(
                'x' => $x,
                'y' => $y
            );
        }
        
        echo json_encode($response);
    }
    //END of bmi


    //START of Overall Patient Satisfaction
        //code here
    //END of Overall Patient Satisfaction

    //START of Insertion vs Deletion of Patients
    public function ins_patient_get() {
        //get recent day and the past 6 days
        $days = array();
        for ($i = 0; $i < 7; $i++) {
            $days[] = date('D', strtotime("-$i days"));
        }    
        $days = array_reverse($days);

        //value of insertion for the past 7 days
        $added = $this->Charts_model->recent_added();


        foreach(array_combine($days, $added) as $day => $add) {
            $response[] = array(
                'x' => $day,
                'y' => $add
            );
        }
        echo json_encode($response);
    }

    public function del_patient_get() {
        //get recent day and the past 6 days
        $days = array();
        for ($i = 0; $i < 7; $i++) {
            $days[] = date('D', strtotime("-$i days"));
        }    
        $days = array_reverse($days);
        
        //value of deletion(archived) for the past 7 days
        $deleted = $this->Charts_model->recent_deleted();


        foreach(array_combine($days, $deleted) as $day => $del) {
            $response[] = array(
                'x' => $day,
                'y' => $del
            );
        }
        echo json_encode($response);
    }
    //END of Insertion vs Deletion of Patients


    //START of Doctor's Treatment Plan
        //code here
    //END of Doctor's Treatment Plan

    
    //START of Stock Items
    public function stockin_get() {
        $result=$this->Charts_model->get_stock();
        foreach($result as $stockIn) {
            $response[] = array('x'=>$stockIn->prod_name,
                                'y'=>(int)$stockIn->stock_in,);
        }
        
        echo json_encode($response);
    }
    public function stockout_get() {
        $result=$this->Charts_model->get_stock();
        foreach($result as $stockOut) {
            $response[] = array('x'=>$stockOut->prod_name,
                                'y'=>(int)$stockOut->stock_out,);
        }
        echo json_encode($response);
    }
    // END of Stock Items

    
}
?>