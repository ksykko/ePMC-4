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

    public function admin_viewpatients_post() {
        $data=json_decode(file_get_contents('php://input'));

        
        $id=$data->id;
        // $id='2';
        $ctr=1;
        $patients[]=$this->Admin_model->get_patientrec_det($id);
        foreach($patients as $patient) {
            // $personal[]=array('id'=>$ctr++,
            //                 'image'=>'http://192.168.2.115/epmc-4/assets/img/profile-avatars/'.$patient->avatar);
            $personal[]=array('id'=>$ctr++,
                            'value'=>'PATIENT NO: '.$patient->un_patient_id);
            $personal[]=array('id'=>$ctr++,
                            'value'=>'Name: '.$patient->first_name.' '.$patient->middle_name.' '.$patient->last_name);
            $personal[]=array('id'=>$ctr++,
                            'value'=>'Age: '.$patient->age.' years old');
            $personal[]=array('id'=>$ctr++,
                            'value'=>'Birthday: '.$patient->birth_date);
            $personal[]=array('id'=>$ctr++,
                            'value'=>'Sex: '.$patient->sex);
            $personal[]=array('id'=>$ctr++,
                            'value'=>'Occupation: '.$patient->occupation);
            $personal[]=array('id'=>$ctr,
                            'value'=>'Address: '.$patient->address);
            $ctr=1;
            $contact[]=array('id'=>$ctr++,
                            'value'=>'Cellphone no: '.$patient->cell_no);
            $contact[]=array('id'=>$ctr++,
                            'value'=>'Telephone no: '.$patient->tel_no);
            $contact[]=array('id'=>$ctr,
                            'value'=>'Email: '.$patient->email);
            $ctr=1;
            $vitals[]=array('id'=>$ctr++,
                            'value'=>'Blood Type: '.$patient->blood_type);
            $vitals[]=array('id'=>$ctr++,
                            'value'=>'Height: '.$patient->height);
            $vitals[]=array('id'=>$ctr,
                            'value'=>'Weight: '.$patient->weight);
            $ctr=1;
            $ec[]=array('id'=>$ctr++,
                            'value'=>'Name: '.$patient->ec_name);
            $ec[]=array('id'=>$ctr++,
                            'value'=>'Relationship: '.$patient->relationship);
            $ec[]=array('id'=>$ctr,
                            'value'=>'Contact no: '.$patient->ec_contact_no);                 
        }
        

        $result[]=array('title'=>'Personal Information',
                        'data'=>$personal);
        $result[]=array('title'=>'Contact Information',
                        'data'=>$contact);
        $result[]=array('title'=>'Vital Signs',
                        'data'=>$vitals);
        $result[]=array('title'=>'Emergency Contact',
                        'data'=>$ec);                                    
        echo json_encode($result);
    }

    public function ptinfo_post(){
        $data=json_decode(file_get_contents('php://input'));
        
    }
}
?>