<?php

class Patient_patientrec extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(['url', 'form', 'date', 'string']);
        $this->load->library(['form_validation', 'session', 'pagination']);
        $this->load->model('Patient_model');
        $this->load->model('Admin_model');
        $this->load->model('Doctors_model');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in')) { //if logged in

            $data['title'] = 'Patient | ePMC';
            $id = $this->session->userdata('id');

            $data['patient'] = $this->Admin_model->get_patient_row($id);
            $data['healthinfo'] = $this->Admin_model->get_patient_details_row($id);
            $data['diagnoses'] = $this->Admin_model->get_diagnosis_table();
            $data['treatments'] = $this->Admin_model->get_treatment_table();
            // $data['patients'] = $this->Admin_model->get_patient_table();

            $data['documents'] = $this->Admin_model->get_patient_documents($id);
            //$this->dd($data['documents']);
            $data['patient_id'] = $id;
            $data['doctors'] = $this->Doctors_model->get_all_doctors();
            //$this->dd($data['doctors']);
            $data['user_role'] = $this->session->userdata('role');
            $data['specialization'] = $this->session->userdata('specialization');


            $data['patient_details'] = $this->Patient_model->get_patient_details_row($id);
            $this->load->view('include-admin/dashboard-header', $data);
            $this->load->view('include-admin/dashboard-navbar', $data);
            $this->load->view('patient-views/patient-patientrec-view', $data);
            $this->load->view('include-admin/patient-scripts');
        } else {
            redirect('Login/signin');
        }
    }



    // * Diagnoses Datatable
    public function diag_dt($id)
    {
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));


        $diagnoses = $this->Admin_model->get_diagnosis_tbl($id);

        $data = array();

        foreach ($diagnoses->result() as $diagnosis) {

            if ($diagnosis->p_diag_date == null || $diagnosis->p_diag_date == '0000-00-00 00:00:00') {
                continue;
            }

            $diag_date = unix_to_human(mysql_to_unix($diagnosis->p_diag_date));
            // format data to eg 01/01/2021 12:00 AM
            $dt = new DateTime($diag_date);
            $date_added = $dt->format('m/d/y h:i A');

            $row = array();
            $row[] = $date_added;
            $row[] = $diagnosis->p_recent_diagnosis;
            $row[] = $diagnosis->p_doctor;
            $row[] = '
                <div class="d-md-flex justify-content-md-center">
                    <a class="btn btn-sm btn-light mx-2" type="button" data-bs-toggle="modal" data-bs-target="#view-diagnosis-' . $diagnosis->id . '">View</a>

                </div>                
            ';
            $data[] = $row;
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $diagnoses->num_rows(),
            "recordsFiltered" => $diagnoses->num_rows(),
            "data" => $data
        );
        echo json_encode($output);
    }



    // * Treatment Plan Datatable
    public function treatment_dt($id)
    {
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $treatments = $this->Admin_model->get_treatment_tbl($id);
        $data = array();

        foreach ($treatments->result() as $treatment) {

            if ($treatment->p_diagnosis == '' || $treatment->p_diagnosis == null) {
                continue;
            }

            $row = array();
            $row[] = $treatment->p_diagnosis;
            $row[] = $treatment->p_treatment_plan;
            $row[] = '
                <div class="d-md-flex justify-content-md-center">
                    <a class="btn btn-sm btn-light mx-2" type="button" data-bs-toggle="modal" data-bs-target="#view-treatment-' . $treatment->id . '">View</a>
                </div>
            ';
            $data[] = $row;
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $treatments->num_rows(),
            "recordsFiltered" => $treatments->num_rows(),
            "data" => $data
        );
        echo json_encode($output);
    }



    // * Consultation History Datatable
    public function consul_dt($id)
    {
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));


        $diagnoses = $this->Admin_model->get_diagnosis_tbl($id);


        $data = array();

        foreach ($diagnoses->result() as $diagnosis) {

            if ($diagnosis->p_diag_date == null || $diagnosis->p_diag_date == '0000-00-00 00:00:00') {
                continue;
            }

            $diag_date = unix_to_human(mysql_to_unix($diagnosis->p_diag_date));
            $dt = new DateTime($diag_date);
            $conul_date = $dt->format('m/d/y h:i A');

            $row = array();
            $row[] = $conul_date;
            $row[] = $diagnosis->p_doctor;

            $data[] = $row;
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $diagnoses->num_rows(),
            "recordsFiltered" => $diagnoses->num_rows(),
            "data" => $data
        );
        echo json_encode($output);
    }



    public function edit_patient($id)
    {
        $data['patient'] = $this->Admin_model->get_patient_row($id);

        $info = array(
            'first_name' => $this->input->post('first_name'),
            'middle_name' => $this->input->post('middle_name'),
            'last_name' => $this->input->post('last_name'),
            'age' => $this->input->post('age'),
            'birth_date' => $this->input->post('birth_date'),
            'sex' => $this->input->post('sex'),
            'occupation' => $this->input->post('occupation'),
            'address' => $this->input->post('address'),
            'cell_no' => $this->input->post('cell_no'),
            'tel_no' => $this->input->post('tel_no'),
            'email' => $this->input->post('email'),
            'ec_name' => $this->input->post('ec_name'),
            'relationship' => $this->input->post('relationship'),
            'ec_contact_no' => $this->input->post('ec_contact_no'),
            'last_accessed' => date('Y-m-d H:i:s')
        );

        // insert a row in user_activity table
        $user_id = $this->session->userdata('id');
        $user_type = $this->session->userdata('role');
        $user_activity = 'Updated profile';

        $this->load->model('Login_model');
        $this->Login_model->patient_activity($user_id, $user_type, $user_activity);


        $activity = array(
            'activity' => 'A patient record has been updated in the patient records',
            'module' => 'Patient Records',
            'date_created' => date('Y-m-d H:i:s')
        );

        $this->Admin_model->add_activity($activity);

        $this->session->set_flashdata('message', 'success-edit-patient-PI');
        $this->Admin_model->edit_patient_PI($id, $info);
        redirect('Patient_patientrec');
    }



    public function update_profilepic($id)
    {
        $patient = $this->Admin_model->get_patient_row($id);

        $img_config = array(
            'upload_path' => './assets/img/profile-avatars/',
            'allowed_types' => 'jpg|jpeg|png',
            'max_size' => 2048,
            'max_width' => 2048,
            'max_height' => 2048,
            'file_name' => 'patient-avatar-' . $id,
            'file_ext_tolower' => TRUE,
            'overwrite' => TRUE
        );

        $this->load->library('upload', $img_config);
        $this->upload->initialize($img_config);
        $fileExt = pathinfo($patient->avatar, PATHINFO_EXTENSION);


        if (!$this->upload->do_upload('avatar')) {
            if ($patient->avatar == 'default-avatar.png') {
                $img_name = 'default-avatar.png';
            } else {
                $img_name = $this->upload->data('file_name') . '.' . $fileExt;
                //set flashdata validation error

                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('Patient_patientrec');
            }
        } else {
            $img_name = $this->upload->data('file_name');
        }

        $avatar = array(
            'avatar' => $img_name
        );

        // insert a row in user_activity table
        $user_id = $this->session->userdata('id');
        $user_type = $this->session->userdata('role');
        $user_activity = 'Updated profile picture';

        $this->load->model('Login_model');
        $this->Login_model->patient_activity($user_id, $user_type, $user_activity);

        $activity = array(
            'activity' => 'A patient record profile pic has been updated in the patient records',
            'module' => 'Patient Records',
            'date_created' => date('Y-m-d H:i:s')
        );

        $this->Admin_model->add_activity($activity);

        $this->Admin_model->update_avatar($id, $avatar);
        $this->session->set_flashdata('message', 'success-profilepic');
        redirect('Patient_patientrec');
    }


    public function change_password($id)
    {

        $this->form_validation->set_rules('password', 'Old Password', 'required|trim|callback_check_old_pass');
        $this->form_validation->set_rules('new_password', 'New Password', 'required|trim|min_length[8]');
        $this->form_validation->set_rules('conf_password', 'Confirm Password', 'required|matches[new_password]');

        if ($this->form_validation->run() == FALSE) {
            
            $this->session->set_flashdata('error', 'error-change-pass');
            redirect('Patient_patientrec');

        } else {

            $new_password = $this->security->xss_clean($this->input->post('new_password'));

            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            
            $data['password'] = $hashed_password;

            //$this->dd($data);

            $this->Admin_model->update_patient($id, $data);

            $this->session->set_flashdata('message', 'success-change-pass');
            redirect('Patient_patientrec');
            
        }
    }

    public function check_old_pass($old_pass)
    {
        $id = $this->session->userdata('id');
        $patient = $this->Admin_model->get_patient_row($id);

        //$this->dd($patient->password);

        if (password_verify($old_pass, $patient->password)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('check_old_pass', 'The {field} is incorrect');
            return FALSE;
        }
    }

    public function logout()
    {
        $user_id = $this->session->userdata('id');
        $user_type = $this->session->userdata('role');
        $user_activity = 'Logged out';

        $this->load->model('Login_model');
        $this->Login_model->patient_activity($user_id, $user_type, $user_activity);


        $this->session->sess_destroy();
        redirect('Login/signin');
    }

    private function dd($data)
    {
        echo "<pre>";
        die(var_dump($data));
        echo "</pre>";
    }
}
