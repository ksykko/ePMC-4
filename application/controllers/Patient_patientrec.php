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
        $this->load->library("pagination");
    }

    public function index()
    {
        if ($this->session->userdata('logged_in')) { //if logged in

            $data['title'] = 'Patient | ePMC';
            $id = $this->session->userdata('id');

            // $data['user_name'] = $this->session->userdata('full_name');
            // $data['user_role'] = $this->session->userdata('role');
            // $data['user_age'] = $this->session->userdata('age');
            // $data['user_birthday'] = $this->session->userdata('birth_date');
            // $data['user_sex'] = $this->session->userdata('sex');
            // $data['user_occupation'] = $this->session->userdata('occupation');
            // $data['user_contact_no'] = $this->session->userdata('cell_no');
            // $data['user_address'] = $this->session->userdata('address');

            $data['patient'] = $this->Patient_model->get_patient_row($id);
            $data['healthinfo'] = $this->Patient_model->get_patient_details_row($id);
            // $data['diagnoses'] = $this->Patient_model->get_patient_diagnosis_table();
            // $data['patients'] = $this->Admin_model->get_patient_table();
            $data['patient_id'] = $id;
            $data['user_role'] = $this->session->userdata('role');

            $data['patient_details'] = $this->Patient_model->get_patient_details_row($id);
            $this->load->view('include-admin/dashboard-header', $data);
            $this->load->view('include-admin/dashboard-navbar', $data);
            $this->load->view('patient-views/patient-patientrec-view', $data);
            $this->load->view('include-admin/patient-scripts');
        } else {
            redirect('Login/signin');
        }
    }

    public function diag_dt()
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

    public function edit_patient($id)
    {
        $data['patient'] = $this->Admin_model->get_patient_row($id);

        $this->form_validation->set_rules('first_name', 'First name', 'required|regex_match[/^([a-z ])+$/i]', array(
            'required' => 'Please enter patient\'s %s.'
        ));

        $this->form_validation->set_rules('middle_name', 'Middle name', 'required|regex_match[/^([a-z ])+$/i]', array(
            'required' => 'Please enter patient\'s %s.'
        ));

        $this->form_validation->set_rules('last_name', 'Last name', 'required|regex_match[/^([a-z ])+$/i]', array(
            'required' => 'Please enter patient\'s %s.'
        ));

        $this->form_validation->set_rules('age', 'Age', 'required|numeric|is_natural_no_zero', array(
            'required' => 'Please enter patient\'s %s.',
            'numeric' => 'Please enter a valid %s.'
        ));

        $this->form_validation->set_rules('birth_date', 'Birthdate', 'required', array(
            'required' => 'Please enter patient\'s %s.'
        ));

        $this->form_validation->set_rules('sex', 'Sex', 'required', array(
            'required' => 'Please enter patient\'s %s.'
        ));

        $this->form_validation->set_rules('occupation', 'Occupation', 'required', array(
            'required' => 'Please enter patient\'s %s.'
        ));

        $this->form_validation->set_rules('address', 'Address', 'required', array(
            'required' => 'Please enter an %s.'
        ));

        $this->form_validation->set_rules('cell_no', 'Cellphone #', 'required|numeric|min_length[11]', array(
            'required' => 'Please enter patient\'s %s.',
            'numeric' => 'Please enter a valid %s.'
        ));

        $this->form_validation->set_rules('tel_no', 'Telephone #', 'required|numeric|min_length[7]', array(
            'required' => 'Please enter patient\'s %s.',
            'numeric' => 'Please enter a valid %s.'
        ));

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email', array(
            'required' => 'Please enter patient\'s %s.',
            'valid_email' => 'Please enter a valid %s.'
        ));

        $this->form_validation->set_rules('ec_name', 'Emergency contact name', 'required|regex_match[/^([a-z ])+$/i]', array(
            'required' => 'Please enter an %s.'
        ));

        $this->form_validation->set_rules('relationship', 'Emergency contact relationship', 'required', array(
            'required' => 'Please enter patient\'s %s.'
        ));

        $this->form_validation->set_rules('ec_contact_no', 'Emergency contact #', 'required|numeric|min_length[11]', array(
            'required' => 'Please enter an %s.',
            'numeric' => 'Please enter a valid %s.'
        ));


        if ($this->form_validation->run() == FALSE) {

            $this->index();
            // echo "
            // <script>
            //     $(window).load(function(){
            //         $('#modal-1').modal('show');
            //     });
            // </script>
            // ";
        } else {
            //$addPatient = $this->input->post('addPatient');

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

            $this->session->set_flashdata('message', 'success-edit-patient-PI');
            $this->Admin_model->edit_patient_PI($id, $info);
            redirect('Patient_patientrec');
        }
    }


    // PATIENT RECORD VIEW INDIVIDUAL

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
                $this->session->set_flashdata('error-upload', $this->upload->display_errors());
                redirect('Patient_patientrec');
            }
        } else {
            $img_name = $this->upload->data('file_name');
        }

        $avatar = array(
            'avatar' => $img_name
        );

        $this->Admin_model->update_avatar($id, $avatar);
        $this->session->set_flashdata('message', 'success-profilepic');
        redirect('Patient_patientrec');
    }

    public function logout()
    {
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
