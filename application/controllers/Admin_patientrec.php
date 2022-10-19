<?php

class Admin_patientrec extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(['url', 'form', 'date', 'string']);
        $this->load->library(['form_validation', 'session', 'pagination']);
        $this->load->model('Admin_model');
        $this->load->model('Doctors_model');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in')) { //if logged in

            $id = $this->session->userdata('admin_id');

            $data['title'] = 'Admin - Patient Records | ePMC';
            $data['patient'] = $this->Admin_model->get_patient_row($id);
            $data['patients'] = $this->Admin_model->get_patient_table();


            $this->load->view('include-admin/dashboard-header', $data);
            $this->load->view('include-admin/dashboard-navbar', $data); // admin dashboard not yet done
            $this->load->view('admin-views/admin-patientrec-view', $data); //recent sample
            $this->load->view('include-admin/patientrec-scripts');
        } else {
            redirect('Login/signin');
        }
    }

    public function datatable()
    {
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $patients = $this->Admin_model->get_patient_tbl();

        $data = array();
        $no = 0;
        foreach ($patients->result() as $patient) {

            $no++;
            // $editId = 'edit-patient-' . $patient->patient_id;
            $row = array();
            $row[] = $no;
            $row[] = $patient->first_name . ' ' . $patient->middle_name . ' ' . $patient->last_name;
            $row[] = $patient->last_checkup;
            $row[] = '
                <td class="text-center" colspan="1"> 
                    <a class="btn btn-sm btn-light mx-2" href=" ' . base_url("Admin_patientrec/view_patient/") . $patient->patient_id . ' " type="button">View</a>
                    <button class="btn btn-sm btn-light mx-2" type="button" data-bs-toggle="modal" data-bs-target="#edit-patient-' . $patient->patient_id . '">Edit</button>
                    <button class="btn btn-sm btn-link mx-2 shadow-none" type="button" data-bs-toggle="modal" data-bs-target="#delete-dialog-' . $patient->patient_id . ' "><i class="far fa-trash-alt"></i></button> 
                </td>
            ';
            $data[] = $row;
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $patients->num_rows(),
            "recordsFiltered" => $patients->num_rows(),
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

            $this->session->set_flashdata('message', 'success');
            $this->Admin_model->add_patient($info);
            redirect('Admin_patientrec');
        }
    }

    public function delete_patient($id)
    {

        $this->Admin_model->delete_patient($id);
        $this->session->set_flashdata('message', 'dlt_success');
        redirect('Admin_patientrec/index');
    }

    public function view_patient($id)
    {
        $data['title'] = 'Admin - Patient Records | ePMC';
        $data['patient'] = $this->Admin_model->get_patient_row($id);
        $data['healthinfo'] = $this->Admin_model->get_patient_details_row($id);
        // $data['patients'] = $this->Admin_model->get_patient_table();
        $data['patient_id'] = $id;
        $data['doctors'] = $this->Doctors_model->get_all_doctors();

        $this->load->view('include-admin/dashboard-header', $data);
        $this->load->view('include-admin/dashboard-navbar', $data);
        $this->load->view('admin-views/admin-patientrec-view-2', $data);
        $this->load->view('include-admin/dashboard-scripts');
    }

    public function add_patient_validation()
    {
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
                'password' => $this->input->post('birth_date'),
                'role' => 'patient',
                'avatar' => 'default-avatar.png',
                'last_checkup' => date('Y-m-d H:i:s'),
                'activation_code' => random_string('alnum', 16),
                'status' => '0',
                'date_created' => date('Y-m-d H:i:s')
            );

            $insert_id = $this->Admin_model->add_patient($info);

            $patientDetails = array(
                'patient_id' => $insert_id,
            );

            $this->session->set_flashdata('message', 'success');
            $this->Admin_model->add_patient_details($patientDetails);
            $this->Admin_model->add_patient_diagnosis($patientDetails);
            $this->Admin_model->add_patient_lab_reports($patientDetails);
            $this->Admin_model->add_patient_treatment_plan($patientDetails);
            redirect('Admin_patientrec');
        }
    }


    // PATIENT RECORD VIEW INDIVIDUAL

    public function update_health_info($id)
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

        $this->form_validation->set_rules('bp_systolic', 'Systolic', 'required|numeric', array(
            'numeric' => 'Please enter a valid %s.'
        ));

        $this->form_validation->set_rules('bp_diastolic', 'Diastolic', 'required|numeric', array(
            'numeric' => 'Please enter a valid %s.'
        ));

        $this->form_validation->set_rules('pulse_rate', 'Pulse rate', 'required|numeric', array(
            'numeric' => 'Please enter a valid %s.'
        ));

        $this->form_validation->set_rules('height', 'Height', 'required|numeric', array(
            'numeric' => 'Please enter a valid %s.'
        ));

        $this->form_validation->set_rules('weight', 'Weight', 'required|numeric', array(
            'numeric' => 'Please enter a valid %s.'
        ));

        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('error-profilepic', $this->upload->display_errors());
            $this->session->set_flashdata('error', validation_errors());
            redirect('Admin_patientrec/view_patient/' . $id);
        } else 
        {
            if (!$this->upload->do_upload('avatar'))
            {
                if ($patient->avatar == 'default-avatar.png') {
                    $img_name = 'default-avatar.png';
                } else {
                    $img_name = $this->upload->data('file_name') . '.' . $fileExt;
                }
            } else {
                $img_name = $this->upload->data('file_name');
                
            }
            
            // Convert ISO 8601 datetime-local input format to MySQL datetime format
            $consul_next = date('Y-m-d\TH:i:s', strtotime($this->input->post('consul_next')));
            $formatted_consul = date('Y-m-d H:i:s', strtotime($consul_next));
            
            $avatar = array(
                'avatar' => $img_name
            );
            $this->Admin_model->update_avatar($id, $avatar);

            $health_info = array(
                'blood_type' => $this->input->post('blood_type'),
                'bp_systolic' => $this->input->post('bp_systolic'),
                'bp_diastolic' => $this->input->post('bp_diastolic'),
                'pulse_rate' => $this->input->post('pulse_rate'),
                'height' => $this->input->post('height'),
                'weight' => $this->input->post('weight'),
                'prescription' => $this->input->post('prescription'),
                'consul_next' => $formatted_consul,
                'objectives' => $this->input->post('objectives'),
                'symptoms' => $this->input->post('symptoms')
            );

            

            $this->Admin_model->update_patient_details($id, $health_info);
            $this->session->set_flashdata('message', 'success-healthinfo');
            redirect('Admin_patientrec/view_patient/' . $id);
        }
    }

    public function add_diagnosis($id)
    {
        $patient = $this->Admin_model->get_patient_row($id);

        $this->form_validation->set_rules('p_recent_diagnosis', 'Diagnosis', 'required', array(
            'required' => '%s cannot be empty.'
        ));
        
        $this->form_validation->set_rules('p_doctor', 'Doctor', 'required', array(
            'required' => 'Please select a %s.'
        ));

        
        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('error', validation_errors());
            redirect('Admin_patientrec/view_patient/' . $id);
        } else 
        {
            $diagnosis = array(
                'patient_id' => $id,
                'p_recent_diagnosis' => $this->input->post('p_recent_diagnosis'),
                'p_doctor' => $this->input->post('p_doctor')
                //'date_created' => date('Y-m-d H:i:s')
            );

            // $diagnosis = array(
            //     'patient_id' => $id,
            //     'p_recent_diagnosis' => $this->input->post('p_recent_diagnosis'),
            //     'p_doctor' => $this->input->post('p_doctor')
            //     //'date_created' => date('Y-m-d H:i:s')
            // );

            // if ($patient->patient_id && $patient->p_recent_diagnosis == NULL) 
            // {
            //     $this->Admin_model->update_patient_diagnosis($id, $diagnosis);
            //     $this->session->set_flashdata('message', 'success-diagnosis');
            //     redirect('Admin_patientrec/view_patient/' . $id);
            // } else 
            // {
            //     $this->Admin_model->add_patient_diagnosis($diagnosis);
            //     $this->session->set_flashdata('message', 'success-diagnosis');
            //     redirect('Admin_patientrec/view_patient/' . $id);
            // }

            $this->Admin_model->add_patient_diagnosis($diagnosis);
            $this->session->set_flashdata('message', 'success-diagnosis');
            redirect('Admin_patientrec/view_patient/' . $id);
        }

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
