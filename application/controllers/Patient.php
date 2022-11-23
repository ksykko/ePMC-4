<?php
class Patient extends CI_Controller {
    public function __construct() {
        parent::__construct();

        $this->load->helper(['url', 'form']);
        $this->load->library(['form_validation', 'session', 'pagination']);
        $this->load->model('Patient_model');
        $this->load->model('Admin_model');
        $this->load->model('Doctors_model');
        $this->load->library("pagination");
    }

    public function index() 
    {   
        if ($this->session->userdata('logged_in')) { //if logged in

            $data['title'] = 'Patient | ePMC';
            $id = $this->session->userdata('id');

            $data['user_name'] = $this->session->userdata('full_name');
            $data['user_role'] = $this->session->userdata('role');
            $data['user_age'] = $this->session->userdata('age');
            $data['user_birthday'] = $this->session->userdata('birth_date');
            $data['user_sex'] = $this->session->userdata('sex');
            $data['user_occupation'] = $this->session->userdata('occupation');
            $data['user_contact_no'] = $this->session->userdata('cell_no');
            $data['user_address'] = $this->session->userdata('address');

            $data['feedback'] = $this->Patient_model->get_feedback_row($id);
            $data['patient'] = $this->Patient_model->get_patient_row($id);
            $data['patient_details'] = $this->Patient_model->get_patient_details_row($id);

            $data['doctorname'] = $this->Doctors_model->get_all_doctors();


            $this->load->view('include-admin/dashboard-header', $data);
            $this->load->view('include-admin/dashboard-navbar', $data);
            $this->load->view('patient-views/patient-dashboard', $data);
            $this->load->view('include-admin/patient-scripts');
        }
        else {
            redirect('Login/signin');
        }
    }

    public function datatable()
    {
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $id = $this->session->userdata('id');
        $diagnosis = $this->Patient_model->get_patient_diagnosis_tbl();
        $data = array();
        foreach ($diagnosis->result() as $recent_diagnosis) {
            if ($id == $recent_diagnosis->patient_id) {
                $row = array();
                $row[] = $recent_diagnosis->p_diag_date;
                $row[] = $recent_diagnosis->p_doctor;
                
                $data[] = $row;    
            }
            
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $diagnosis->num_rows(),
            "recordsFiltered" => $diagnosis->num_rows(),
            "data" => $data
        );
        echo json_encode($output);
    }

    public function add_feedback_validation()
    { 
        $id = $this->input->post('patient_id');
        $data['feedback'] = $this->Patient_model->get_feedback_row($id);

        $this->form_validation->set_rules('rating_description', 'Rating Description', 'required', array(
			'required' => 'Choose a %s.'
		));

        $this->form_validation->set_rules('rating', 'Rating');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('message', 'failed');
            $this->index();

        }

        else {
            
            $addFeedback = $this->input->post('addFeedback'); 

            if (isset($addFeedback))
            {   
                $id = $this->input->post('patient_id');

                $insert_info = array(
                    'patient_id' => $this->input->post('patient_id'),
                    'rating' => $this->input->post('rating'),
                    'rating_description' => $this->input->post('rating_description')
                );

                $update_info = array(
                    'rating' => $this->input->post('rating'),
                    'rating_description' => $this->input->post('rating_description')
                );

                $check = $this->Patient_model->isExists('patient_id',$id,'clinic_feedback');
            }

            if($check) {
                $activity = array(
                    'activity' => 'A new feedback has been added in the patient satisfaction survey.',
                    'module' => 'Dashboard',
                    'date_created' => date('Y-m-d H:i:s')
                );
        
                $this->Admin_model->add_activity($activity);
    
                $this->session->set_flashdata('message', 'success_update');
                $this->Patient_model->update_feedback($id, $update_info);
            }
            else
            {
                $activity = array(
                    'activity' => 'A new feedback has been added in the patient satisfaction survey.',
                    'module' => 'Dashboard',
                    'date_created' => date('Y-m-d H:i:s')
                );
        
                $this->Admin_model->add_activity($activity);
    
                $this->session->set_flashdata('message', 'success');
                $this->Patient_model->add_feedback($insert_info);
            }

            redirect('Patient');
        }
    }

    public function add_doc_feedback_validation()
    { 

        $this->form_validation->set_rules('rating_description', 'Rating Description', 'required', array(
			'required' => 'Choose a %s.'
		));

        $this->form_validation->set_rules('star', 'Rating');


        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('message', 'failed');
            $this->index();

        }

        else {

            $result = $this->input->post('doctor_name')	;
			$result_explode = explode('|', $result);
			$doctor_name = $result_explode[0];
			$user_id = $result_explode[1];
            
            $addDoctorFeedback = $this->input->post('addDoctorFeedback'); 

            if (isset($addDoctorFeedback))
            {   
                $id = $this->input->post('patient_id');

                $insert_info = array(
                    'patient_id' => $this->input->post('patient_id'),
                    'user_id' => $user_id,
                    'doctor_name' => $doctor_name,
                    'rating' => $this->input->post('star'),
                    'rating_description' => $this->input->post('rating_description')
                );

                $update_info = array(
                    'patient_id' => $this->input->post('patient_id'),
                    'doctor_name' => $doctor_name,
                    'rating' => $this->input->post('star'),
                    'rating_description' => $this->input->post('rating_description')
                );

                $check = $this->Patient_model->isExistsDoctor('patient_id',$id,'user_id',$user_id,'doctor_feedback');
            }

            if($check) {
                $activity = array(
                    'activity' => 'A new feedback has been added in the patient satisfaction survey.',
                    'module' => 'Dashboard',
                    'date_created' => date('Y-m-d H:i:s')
                );
        
                $this->Admin_model->add_activity($activity);
    
                $this->session->set_flashdata('message', 'success');
                $this->Patient_model->add_doc_feedback($insert_info);
            }
            else
            {

                $activity = array(
                    'activity' => 'A new feedback has been added in the patient satisfaction survey.',
                    'module' => 'Dashboard',
                    'date_created' => date('Y-m-d H:i:s')
                );
        
                $this->Admin_model->add_activity($activity);
    
                $this->session->set_flashdata('message', 'success_update');
                $this->Patient_model->update_doc_feedback($user_id, $update_info);
            }

            redirect('Patient');
        }
    }
}
?>
