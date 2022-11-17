<?php

use Aws\Textract\TextractClient;
use Aws\Exception\AwsException;

class Admin_patientrec extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        require_once 'vendor/autoload.php';

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
            $data['user_role'] = $this->session->userdata('role');
            $data['user_specialization'] = $this->session->userdata('specialization');

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

            $dt = new DateTime($patient->date_created);
            $date_added = $dt->format('Y-m-d');
            $row = array();
            $row[] = $patient->un_patient_id;
            $row[] = $patient->first_name . ' ' . $patient->middle_name . ' ' . $patient->last_name;
            $row[] = $date_added;
            $row[] = $patient->type;
            $row[] = '
                <td class="text-center" colspan="1"> 
                    <a class="btn btn-sm btn-light mx-2" href=" ' . base_url("Admin_patientrec/view_patient/") . $patient->patient_id . ' " type="button">View</a>
                    <button class="btn btn-sm btn-link shadow-none" type="button" data-bs-toggle="modal" data-bs-target="#delete-dialog-' . $patient->patient_id . ' "><i class="far fa-trash-alt"></i></button> 
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

    public function diag_dt($id)
    {
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));


        $diagnoses = $this->Admin_model->get_diagnosis_tbl($id);

        $data = array();

        foreach ($diagnoses->result() as $diagnosis) {


            $diag_date = unix_to_human(mysql_to_unix($diagnosis->p_diag_date));
            // format data to eg 01/01/2021 12:00 AM
            $dt = new DateTime($diag_date);
            $date_added = $dt->format('m/d/y h:i A');

            $row = array();
            $row[] = $date_added;
            $row[] = $diagnosis->p_recent_diagnosis;
            $row[] = $diagnosis->p_doctor;
            $row[] = '
                <td class="text-center" colspan="1">
                    <a class="btn btn-sm btn-light mx-2" type="button" data-bs-toggle="modal" data-bs-target="#view-diagnosis-' . $diagnosis->id . '">View</a>
                    <button class="btn btn-sm btn-light" type="button" data-bs-toggle="modal" data-bs-target="#edit-diagnosis-' . $diagnosis->id . '">Edit</button>
                    <button class="btn btn-sm btn-link shadow-none" type="button" data-bs-toggle="modal" data-bs-target="#delete-diagnosis-' . $diagnosis->id . '"><i class="far fa-trash-alt"></i></button>
                </td>
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

    public function treatment_dt($id)
    {
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $treatments = $this->Admin_model->get_treatment_tbl($id);
        $data = array();

        foreach ($treatments->result() as $treatment) {

            $row = array();
            $row[] = $treatment->p_diagnosis;
            $row[] = $treatment->p_treatment_plan;
            $row[] = '
            <td class="text-center" colspan="1">
                <a class="btn btn-sm btn-light mx-2" type="button" data-bs-toggle="modal" data-bs-target="#view-treatment-' . $treatment->id . '">View</a>
                <button class="btn btn-sm btn-light" type="button" data-bs-toggle="modal" data-bs-target="#edit-treatment-' . $treatment->id . '">Edit</button>
                <button class="btn btn-sm btn-link shadow-none" type="button" data-bs-toggle="modal" data-bs-target="#delete-treatment-' . $treatment->id . '"><i class="far fa-trash-alt"></i></button>
            </td>
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

    public function consul_dt($id)
    {
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));


        $diagnoses = $this->Admin_model->get_diagnosis_tbl($id);


        $data = array();

        foreach ($diagnoses->result() as $diagnosis) {


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

    public function check_name()
    {
        $this->load->model('Admin_model');

        //var_dump($_POST['full_name']);

        if ($this->Admin_model->is_patient_exists($_POST['full_name'])) {
            echo '<label id="checkExist" class="text-danger font-monospace" style="font-size:13px">Record already exists</label>';

            // add invalid class to input
            echo '<script>
            $(document).ready(function(){
                $("#first_name").addClass("invalid");
                $("#middle_name").addClass("invalid");
                $("#last_name").addClass("invalid");
            });
            </script>';
        }
        // } else {
        //     echo '<label class="text-success font-monospace" style="font-size:13px"><svg class="ms-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor">
        //     <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
        //     <path d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM371.8 211.8C382.7 200.9 382.7 183.1 371.8 172.2C360.9 161.3 343.1 161.3 332.2 172.2L224 280.4L179.8 236.2C168.9 225.3 151.1 225.3 140.2 236.2C129.3 247.1 129.3 264.9 140.2 275.8L204.2 339.8C215.1 350.7 232.9 350.7 243.8 339.8L371.8 211.8z"></path>
        //     </svg> Record available</label>';

        //     echo '<script>
        //     $(document).ready(function(){
        //         $("#first_name").addClass("valid");
        //         $("#middle_name").addClass("valid");
        //         $("#last_name").addClass("valid");
        //     });
        //     </script>';
        // }
    }

    public function edit_patient($id)
    {
        $data['patient'] = $this->Admin_model->get_patient_row($id);

        // $this->form_validation->set_rules('age', 'Age', 'required|numeric|is_natural_no_zero', array(
        //     'required' => 'Please enter patient\'s %s.',
        //     'numeric' => 'Please enter a valid %s.'
        // ));

        // $this->form_validation->set_rules('birth_date', 'Birthdate', 'required', array(
        //     'required' => 'Please enter patient\'s %s.'
        // ));

        // $this->form_validation->set_rules('sex', 'Sex', 'required', array(
        //     'required' => 'Please enter patient\'s %s.'
        // ));

        // $this->form_validation->set_rules('occupation', 'Occupation', 'required', array(
        //     'required' => 'Please enter patient\'s %s.'
        // ));

        // $this->form_validation->set_rules('address', 'Address', 'required', array(
        //     'required' => 'Please enter an %s.'
        // ));

        // $this->form_validation->set_rules('cell_no', 'Cellphone #', 'required|numeric|min_length[11]', array(
        //     'required' => 'Please enter patient\'s %s.',
        //     'numeric' => 'Please enter a valid %s.'
        // ));

        // $this->form_validation->set_rules('tel_no', 'Telephone #', 'required|numeric|min_length[7]', array(
        //     'required' => 'Please enter patient\'s %s.',
        //     'numeric' => 'Please enter a valid %s.'
        // ));

        // $this->form_validation->set_rules('email', 'Email', 'required|valid_email', array(
        //     'required' => 'Please enter patient\'s %s.',
        //     'valid_email' => 'Please enter a valid %s.'
        // ));

        // $this->form_validation->set_rules('ec_name', 'Emergency contact name', 'required|regex_match[/^([a-z ])+$/i]', array(
        //     'required' => 'Please enter an %s.'
        // ));

        // $this->form_validation->set_rules('relationship', 'Emergency contact relationship', 'required', array(
        //     'required' => 'Please enter patient\'s %s.'
        // ));

        // $this->form_validation->set_rules('ec_contact_no', 'Emergency contact #', 'required|numeric|min_length[11]', array(
        //     'required' => 'Please enter an %s.',
        //     'numeric' => 'Please enter a valid %s.'
        // ));


        // if ($this->form_validation->run() == FALSE) {

        //     $this->index();
        //     // echo "
        //     // <script>
        //     //     $(window).load(function(){
        //     //         $('#modal-1').modal('show');
        //     //     });
        //     // </script>
        //     // ";
        // } else {
        //$addPatient = $this->input->post('addPatient');

        $info = array(
            'first_name' => $this->input->post('first_name'),
            'middle_name' => $this->input->post('middle_name'),
            'last_name' => $this->input->post('last_name'),
            'age' => $this->input->post('age'),
            'birth_date' => $this->input->post('birth_date'),
            'sex' => $this->input->post('sex'),
            'civil_status' => $this->input->post('civil_status'),
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

        $activity = array(
            'activity' => 'A patient record has been updated in the patient records',
            'module' => 'Patient Records',
            'date_created' => date('Y-m-d H:i:s')
        );

        $this->Admin_model->add_activity($activity);

        $this->session->set_flashdata('message', 'success-edit-patient-PI');
        $this->Admin_model->edit_patient_PI($id, $info);
        redirect('Admin_patientrec/view_patient/' . $id);
        //}
    }

    public function delete_patient($id)
    {
        $activity = array(
            'activity' => 'A patient record has been deleted in the patient records',
            'module' => 'Patient Records',
            'date_created' => date('Y-m-d H:i:s')
        );

        $this->Admin_model->add_activity($activity);
        $this->Admin_model->delete_patient($id);
        $this->session->set_flashdata('message', 'dlt_success');
        redirect('Admin_patientrec/index');
    }

    public function view_patient($id)
    {
        $data['title'] = 'Admin - Patient Records | ePMC';
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

        $this->load->view('include-admin/dashboard-header', $data);
        $this->load->view('include-admin/dashboard-navbar', $data);
        $this->load->view('admin-views/admin-patientrec-view-2', $data);
        $this->load->view('include-admin/patientrec2-scripts');
    }

    public function add_patient_validation()
    {
        // $this->form_validation->set_rules('first_name', 'First name', 'required|regex_match[/^([a-z ])+$/i]', array(
        //     'required' => 'Please enter patient\'s %s.'
        // ));

        // $this->form_validation->set_rules('middle_name', 'Middle name', 'required|regex_match[/^([a-z ])+$/i]', array(
        //     'required' => 'Please enter patient\'s %s.'
        // ));

        // $this->form_validation->set_rules('last_name', 'Last name', 'required|regex_match[/^([a-z ])+$/i]', array(
        //     'required' => 'Please enter patient\'s %s.'
        // ));

        // $this->form_validation->set_rules('age', 'Age', 'required|numeric|is_natural_no_zero', array(
        //     'required' => 'Please enter patient\'s %s.',
        //     'numeric' => 'Please enter a valid %s.'
        // ));

        // $this->form_validation->set_rules('birth_date', 'Birthdate', 'required', array(
        //     'required' => 'Please enter patient\'s %s.'
        // ));

        // $this->form_validation->set_rules('sex', 'Sex', 'required', array(
        //     'required' => 'Please enter patient\'s %s.'
        // ));

        // $this->form_validation->set_rules('occupation', 'Occupation', 'required', array(
        //     'required' => 'Please enter patient\'s %s.'
        // ));

        // $this->form_validation->set_rules('address', 'Address', 'required', array(
        //     'required' => 'Please enter an %s.'
        // ));

        // $this->form_validation->set_rules('cell_no', 'Cellphone #', 'required|numeric|min_length[11]', array(
        //     'required' => 'Please enter patient\'s %s.',
        //     'numeric' => 'Please enter a valid %s.'
        // ));

        // $this->form_validation->set_rules('tel_no', 'Telephone #', 'required|numeric|min_length[7]', array(
        //     'required' => 'Please enter patient\'s %s.',
        //     'numeric' => 'Please enter a valid %s.'
        // ));

        // $this->form_validation->set_rules('email', 'Email', 'required|valid_email', array(
        //     'required' => 'Please enter patient\'s %s.',
        //     'valid_email' => 'Please enter a valid %s.'
        // ));

        // $this->form_validation->set_rules('ec_name', 'Emergency contact name', 'required|regex_match[/^([a-z ])+$/i]', array(
        //     'required' => 'Please enter an %s.'
        // ));

        // $this->form_validation->set_rules('relationship', 'Emergency contact relationship', 'required', array(
        //     'required' => 'Please enter patient\'s %s.'
        // ));

        // $this->form_validation->set_rules('ec_contact_no', 'Emergency contact #', 'required|numeric|min_length[11]', array(
        //     'required' => 'Please enter an %s.',
        //     'numeric' => 'Please enter a valid %s.'
        // ));


        // if ($this->form_validation->run() == FALSE) {

        //     $this->index();
        //     // echo "
        //     // <script>
        //     //     $(window).load(function(){
        //     //         $('#modal-1').modal('show');
        //     //     });
        //     // </script>
        //     // ";
        // } else {
        //$addPatient = $this->input->post('addPatient');

        $info = array(
            'first_name' => $this->input->post('first_name'),
            'middle_name' => $this->input->post('middle_name'),
            'last_name' => $this->input->post('last_name'),
            'age' => $this->input->post('age'),
            'birth_date' => $this->input->post('birth_date'),
            'sex' => $this->input->post('sex'),
            'civil_status' => $this->input->post('civil_status'),
            'occupation' => $this->input->post('occupation'),
            'address' => $this->input->post('address'),
            'cell_no' => $this->input->post('cell_no'),
            'tel_no' => $this->input->post('tel_no'),
            'email' => $this->input->post('email'),
            'ec_name' => $this->input->post('ec_name'),
            'relationship' => $this->input->post('relationship'),
            'ec_contact_no' => $this->input->post('ec_contact_no'),
            'password' => $this->input->post('birth_date'),
            'type' => 'added',
            'role' => 'patient',
            'avatar' => 'default-avatar.png',
            'last_checkup' => date('Y-m-d H:i:s'),
            'activation_code' => random_string('alnum', 16),
            'status' => '0',
            'date_created' => date('Y-m-d H:i:s')
        );

        $insert_id = $this->Admin_model->add_patient($info);

        // create custom patient id based on name initials
        $info['un_patient_id'] = $this->create_patient_id($info['first_name'], $info['middle_name'], $info['last_name'], $insert_id);

        // if birthdate is empty, set password to default value 0000-00-00
        if ($info['birth_date'] == '') {
            $info['password'] = '0000-00-00';
        }

        // update patient
        $update = $this->Admin_model->update_patient($insert_id, $info);
        //$this->dd($update);

        $this->create_folder($insert_id);

        $patientDetails = array(
            'patient_id' => $insert_id,
            'height' => '0',
            'weight' => '0',
        );

        $setId = array(
            'patient_id' => $insert_id
        );

        $activity = array(
            'activity' => 'A new patient record has been added in the patient records',
            'module' => 'Patient Records',
            'date_created' => date('Y-m-d H:i:s')
        );

        $this->Admin_model->add_activity($activity);

        $this->session->set_flashdata('message', 'success');
        $this->Admin_model->add_patient_details($patientDetails);
        $this->Admin_model->add_patient_diagnosis($setId);
        $this->Admin_model->add_patient_lab_reports($setId);
        $this->Admin_model->add_patient_treatment_plan($setId);

        if ($this->session->userdata('role') == 'Admin') {
            redirect('Admin_patientrec');
        } else {
            redirect('Doctor_patientrec');
        }
        //}
    }

    public function create_patient_id($first_name, $middle_name, $last_name, $insert_id)
    {
        $first_name = substr($first_name, 0, 1);
        $middle_name = substr($middle_name, 0, 1);
        $last_name = substr($last_name, 0, 1);

        //format $insert_id to 4 digits
        $insert_id = str_pad($insert_id, 4, '0', STR_PAD_LEFT);

        $patient_id = 'PMC' . $first_name . $middle_name . $last_name . '-' . $insert_id;

        return $patient_id;
    }

    public function aws_textract_ocr()
    {

        $img_config = array(
            'upload_path' => './assets/img/patientrec-imports/',
            'allowed_types' => 'jpg|jpeg|png',
            'file_name' => 'patientrec-imports-',
            'max_size' => 10000,
        );

        $this->load->library('upload', $img_config);
        $this->upload->initialize($img_config);



        if (!$this->upload->do_upload('importPatientrec')) {
            $this->session->set_flashdata('error-import', $this->upload->display_errors());
            redirect('Admin_patientrec');
        }
        if ($this->upload->data('file_name')) {
            $import = $this->upload->data('file_name');
            $image_path = 'assets/img/patientrec-imports/' . $import;
            $image_content = file_get_contents($image_path);
        }
        //$image_content = file_get_contents('assets/img/patientrec-imports/patientrec-imports-1.jpg'); // TESTING

        $textractClient = new TextractClient([
            'version' => 'latest',
            'region' => 'ap-southeast-1',
            'credentials' => [
                'key'    => 'AKIAWZWT4IZV267Q567H',
                'secret' => '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'
            ]
        ]);

        $result = $textractClient->analyzeDocument([
            'Document' => [ // REQUIRED
                'Bytes' => $image_content
            ],
            'FeatureTypes' => ['QUERIES'], // REQUIRED
            'QueriesConfig' => [
                'Queries' => [ // REQUIRED
                    [
                        'Text' => 'Name:'
                    ],
                    [
                        'Text' => 'Mobile No.:'
                    ],
                    [
                        'Text' => 'Address:'
                    ],
                    [
                        'Text' => 'Tel. No.:'
                    ],
                    [
                        'Text' => 'Birthday:'
                    ],
                    [
                        'Text' => 'Age:'
                    ],
                    [
                        'Text' => 'Sex:'
                    ],
                    [
                        'Text' => 'Civil Status:'
                    ],
                    [
                        'Text' => 'Weight:'
                    ],
                    [
                        'Text' => 'Height:'
                    ],
                    [
                        'Text' => 'Occupation:'
                    ],
                ],
            ],
        ]);

        $blocks = $result->get('Blocks');

        // Loop through the blocks and check if key "BlockType" => "QUERY_RESULT"
        foreach ($blocks as $array) {
            foreach ($array as $key => $value) // $array = ['BlockTypes], ['Geometry'], ['Relationships'], etc.
            {
                if ($key == 'Query') {
                    foreach ($value as $key2 => $value2) {
                        if ($key2 == 'Text') {
                            //echo $value2 . '<br>';
                            $ext_data[$value2] = '';
                        }
                    }
                }

                // if the last $array['BlockType'] == 'QUERY' and this $array['BlockType'] == 'QUERY_RESULT', then get the text
                if ($value == 'QUERY') {
                    $prev = true;
                    continue;
                }

                if (isset($prev) && $value == 'QUERY_RESULT') {
                    //echo $array['Text'] . '<br>';
                    $ext_data[$value2] = $array['Text'];
                }
            }
        }

        $ext_data['File'] = $import;

        $ext_data = $this->format_import($ext_data);
        //$this->dd($ext_data);



        $this->session->set_flashdata('success-import', $ext_data);
        redirect('Admin_patientrec');
    }

    public function format_import($ext_data)
    {
        // format extracted data
        $name = ucwords(strtolower($ext_data['Name:']));

        // if birth_date is null then set to null
        if ($ext_data['Birthday:'] == '') {
            $ext_data['Birthday:'] = null;
        } else {
            $birth_date = date('Y-m-d', strtotime($ext_data['Birthday:']));
        }
        $occupation = ucwords(strtolower($ext_data['Occupation:']));

        $sex = strtolower($ext_data['Sex:']);
        if ($sex == 'Male' || $sex == 'M' || $sex == 'm' || $sex == 'male') {
            $sex = 'Male';
        } elseif ($sex == 'Female' || $sex == 'F' || $sex == 'f' || $sex == 'female') {
            $sex = 'Female';
        }

        $address = ucwords(strtolower($ext_data['Address:']));

        // convert lbs to kg
        if (str_contains($ext_data['Weight:'], 'lbs')) {
            $weight = (int) filter_var($ext_data['Weight:'], FILTER_SANITIZE_NUMBER_INT);
            $weight = $weight * 0.453592;
            $weight = round($weight);
        }
        // if empty, set to null
        elseif ($ext_data['Weight:'] == '') {
            $weight = null;
        } else {
            $weight = (int) filter_var($ext_data['Weight:'], FILTER_SANITIZE_NUMBER_INT);
        }

        $formatted_data = [
            'Name' => $name,
            'Mobile No.' => $ext_data['Mobile No.:'],
            'Address' => $address,
            'Tel. No.' => $ext_data['Tel. No.:'],
            'Birthday' => $birth_date,
            'Age' => $ext_data['Age:'],
            'Sex' => $sex,
            'Civil Status' => $ext_data['Civil Status:'],
            'Weight' => $weight,
            'Height' => $ext_data['Height:'],
            'Occupation' => $occupation,
            'File' => $ext_data['File'],
        ];

        //$this->dd($formatted_data);W
        return $formatted_data;
    }

    public function verify_import()
    {

        // if ($this->form_validation->run() == FALSE) {
        //     $this->session->set_flashdata('error-import', validation_errors());
        //     $this->dd(validation_errors());
        //     redirect('Admin_patientrec');
        // } else {
        //$submit = $this->input->post('save_verified');

        //if (isset($submit)) {

        $info = array(
            'first_name' => $this->input->post('name'),
            'cell_no' => $this->input->post('mobile_no'),
            'address' => $this->input->post('address'),
            'tel_no' => $this->input->post('tel_no'),
            'birth_date' => $this->input->post('birthday'),
            'age' => $this->input->post('age'),
            'sex' => $this->input->post('sex'),
            'civil_status' => $this->input->post('civil_status'),
            'occupation' => $this->input->post('occupation'),
            'password' => $this->input->post('birthday'),
            'type' => 'import',
            'role' => 'patient',
            'avatar' => 'default-avatar.png',
            'activation_code' => random_string('alnum', 16),
            'status' => '0',
            'date_created' => date('Y-m-d H:i:s')
        );
        //}

        $insert_id = $this->Admin_model->add_patient($info);

        // create custom patient id based on name initials
        $info['un_patient_id'] = $this->create_imp_patient_id($info['first_name'], $insert_id);

        // if birthdate is empty, set password to default value 0000-00-00
        if ($info['birth_date'] == '') {
            $info['password'] = '0000-00-00';
        }

        $this->Admin_model->update_patient($insert_id, $info);


        $patientDetails = array(
            'patient_id' => $insert_id,
            'height' => $this->input->post('height'),
            'weight' => $this->input->post('weight'),
        );

        // Create a folder for the patient and move the file to the folder
        $this->create_folder($insert_id);

        $file = $this->input->post('file');

        $new_file = $this->copy_file($file, $insert_id);

        $documents = array(
            'patient_id' => $insert_id,
            'doc_name' => 'Imported File',
            'document' => $new_file,
        );

        $setId = array(
            'patient_id' => $insert_id,
        );

        $activity = array(
            'activity' => 'A new patient record has been imported in the patient records',
            'module' => 'Patient Records',
            'date_created' => date('Y-m-d H:i:s')
        );

        $this->Admin_model->add_activity($activity);

        $this->session->set_flashdata('message', 'import-success');
        $this->Admin_model->add_patient_details($patientDetails);
        $this->Admin_model->add_patient_diagnosis($setId);
        $this->Admin_model->add_patient_lab_reports($documents);
        $this->Admin_model->add_patient_treatment_plan($setId);

        if ($this->session->userdata('role') == 'Admin') {
            redirect('Admin_patientrec');
        } else {
            redirect('Doctor_patientrec');
        }
    }

    public function create_imp_patient_id($setId, $insert_id)
    {
        $name = explode(' ', $setId);
        // format $insert_id to 4 digits
        $insert_id = sprintf('%04d', $insert_id);

        $patient_id = 'PMC' . $name[0][0] . $name[1][0] . '-' . $insert_id;

        return $patient_id;
    }

    public function create_folder($id)
    {
        $folder = './uploads/' . $id;
        if (!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }
        return $folder;
    }

    public function copy_file($file, $id)
    {
        $file_path = 'assets/img/patientrec-imports/' . $file;
        $file_ext = pathinfo($file, PATHINFO_EXTENSION);
        $new_file = 'import-' . $id . '.' . $file_ext;
        $new_path = 'uploads/' . $id . '/' . $new_file;

        // copy file to patient folder
        copy($file_path, $new_path);

        // delete file from patientrec-imports folder
        $check = unlink($file_path);

        if ($check) {
            return $new_file;
        } else {
            return false;
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

        $this->form_validation->set_rules('bp_systolic', 'Systolic', 'numeric', array(
            'numeric' => 'Please enter a valid %s.'
        ));

        $this->form_validation->set_rules('bp_diastolic', 'Diastolic', 'numeric', array(
            'numeric' => 'Please enter a valid %s.'
        ));

        $this->form_validation->set_rules('pulse_rate', 'Pulse rate', 'numeric', array(
            'numeric' => 'Please enter a valid %s.'
        ));

        $this->form_validation->set_rules('height', 'Height', 'numeric', array(
            'numeric' => 'Please enter a valid %s.'
        ));

        $this->form_validation->set_rules('weight', 'Weight', 'numeric', array(
            'numeric' => 'Please enter a valid %s.'
        ));

        if ($this->form_validation->run() == FALSE) {
            $errors = array(
                'img_errors' => $this->upload->display_errors(),
                'info_errors' => validation_errors()
            );
            $this->session->set_flashdata('error', $errors);
            redirect('Admin_patientrec/view_patient/' . $id);
        } else {

            if (!$this->upload->do_upload('avatar')) {
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

            $activity = array(
                'activity' => 'A patient record has been updated in the patient records',
                'module' => 'Patient Records',
                'date_created' => date('Y-m-d H:i:s')
            );

            $this->Admin_model->add_activity($activity);

            $this->Admin_model->update_patient_details($id, $health_info);
            $this->session->set_flashdata('message', 'success-healthinfo');
            redirect('Admin_patientrec/view_patient/' . $id);
        }
    }

    public  function add_document($id)
    {
        $documents = $this->Admin_model->get_patient_documents_array($id);

        $config = array(
            'upload_path' => './uploads/' . $id . '/',
            'allowed_types' => 'jpg|jpeg|png|pdf',
            'max_size' => 2048,
            'max_width' => 2048,
            'max_height' => 2048,
            'file_name' => 'patient-doc-' . $id,
            'file_ext_tolower' => TRUE,
            'overwrite' => TRUE
        );

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $this->form_validation->set_rules('doc_name', 'Document name', 'required', array(
            'required' => 'Please enter a %s.'
        ));

        if ($this->form_validation->run() == FALSE) {
            $error = array(
                'doc_errors' => validation_errors()
            );

            $this->session->set_flashdata('error-doc', 'error');
            redirect('Admin_patientrec/view_patient/' . $id);
        } else {

            if (!$this->upload->do_upload('doc_file')) {

                $this->session->set_flashdata('error-doc');
                redirect('Admin_patientrec/view_patient/' . $id);
            } else {
                $doc_name = $this->input->post('doc_name');
                $doc_file = $this->upload->data('file_name');

                $doc_data = array(
                    'doc_name' => $doc_name,
                    'document' => $doc_file
                );

                // if (empty($documents)) {
                //     $this->Admin_model->add_patient_document($id, $doc_data);
                //     $this->session->set_flashdata('message', 'success-doc');
                //     redirect('Admin_patientrec/view_patient/' . $id);
                // } else {
                //     $this->Admin_model->update_patient_document($id, $doc_data);
                //     $this->session->set_flashdata('message', 'success-doc');
                //     redirect('Admin_patientrec/view_patient/' . $id);
                // }

                $activity = array(
                    'activity' => 'A patient document has been added in the patient records',
                    'module' => 'Patient Records',
                    'date_created' => date('Y-m-d H:i:s')
                );

                $this->Admin_model->add_activity($activity);

                $this->Admin_model->add_patient_lab_reports($doc_data);
                $this->session->set_flashdata('message', 'success-doc');
                redirect('Admin_patientrec/view_patient/' . $id);
            }
        }
    }

    public function download_document($id, $doc_id)
    {
        $this->load->helper('download');
        $document = $this->Admin_model->get_patient_document($doc_id);
        //$this->dd($document);
        $file = './uploads/' . $id . '/' . $document->document;
        force_download($file, NULL);
    }

    public function delete_document($id, $doc_id)
    {
        $activity = array(
            'activity' => 'A patient document has been deleted in the patient records',
            'module' => 'Patient Records',
            'date_created' => date('Y-m-d H:i:s')
        );

        $this->Admin_model->add_activity($activity);
        $this->Admin_model->delete_patient_document($doc_id);
        $this->session->set_flashdata('message', 'success-doc-delete');
        redirect('Admin_patientrec/view_patient/' . $id);
    }

    public function add_diagnosis($id)
    {
        $patient = $this->Admin_model->get_patient_diagnosis_resultArr($id);

        $this->form_validation->set_rules('p_recent_diagnosis', 'Diagnosis', 'required', array(
            'required' => '%s cannot be empty.'
        ));

        $this->form_validation->set_rules('p_doctor', 'Doctor', 'required', array(
            'required' => 'Please select a %s.'
        ));


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'input-error');
            redirect('Admin_patientrec/view_patient/' . $id);
        } else {

            $diagnosis = array(
                'patient_id' => $id,
                'p_recent_diagnosis' => $this->input->post('p_recent_diagnosis'),
                'p_doctor' => $this->input->post('p_doctor'),
                'p_diag_date' => date('Y-m-d H:i')
            );

            if ($patient == NULL) {
                $this->Admin_model->add_patient_diagnosis($diagnosis);
                $this->session->set_flashdata('message', 'success-diagnosis');
                redirect('Admin_patientrec/view_patient/' . $id);
            }

            foreach ($patient as $row) {
                if ($row['p_recent_diagnosis'] == NULL && $row['p_doctor'] == NULL) {
                    $this->Admin_model->update_patient_diagnosis($id, $diagnosis);
                    $this->session->set_flashdata('message', 'success-diagnosis');
                    redirect('Admin_patientrec/view_patient/' . $id);
                } else {
                    $this->Admin_model->add_patient_diagnosis($diagnosis);
                    $this->session->set_flashdata('message', 'success-diagnosis');
                    redirect('Admin_patientrec/view_patient/' . $id);
                }
            }

            $activity = array(
                'activity' => 'A patient diagnosis has been added in the patient records',
                'module' => 'Patient Records',
                'date_created' => date('Y-m-d H:i:s')
            );

            $this->Admin_model->add_activity($activity);
        }
    }

    public function edit_diagnosis($id)
    {
    }

    public function delete_diagnosis($patient_id, $id)
    {
        $activity = array(
            'activity' => 'A patient diagnosis has been deleted in the patient records',
            'module' => 'Patient Records',
            'date_created' => date('Y-m-d H:i:s')
        );

        $this->Admin_model->add_activity($activity);
        $this->Admin_model->delete_patient_diagnosis($id);
        $this->session->set_flashdata('message', 'success-dlt-diagnosis');
        redirect('Admin_patientrec/view_patient/' . $patient_id);
    }

    public function add_treatment($id)
    {
        $patient = $this->Admin_model->get_patient_treatment_resultArr($id);

        $this->form_validation->set_rules('p_diagnosis', 'Diagnosis', 'required', array(
            'required' => '%s cannot be empty.'
        ));

        $this->form_validation->set_rules('p_treatment_plan', 'Treatment Plan', 'required', array(
            'required' => '%s cannot be empty.'
        ));


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'error-treatment');
            redirect('Admin_patientrec/view_patient/' . $id);
        } else {


            $treatment = array(
                'patient_id' => $id,
                'p_diagnosis' => $this->input->post('p_diagnosis'),
                'p_treatment_plan' => $this->input->post('p_treatment_plan')
            );

            if ($patient == NULL) {
                $this->Admin_model->add_patient_treatment_plan($treatment);
                $this->session->set_flashdata('message', 'success-diagnosis');
                redirect('Admin_patientrec/view_patient/' . $id);
            }

            foreach ($patient as $row) {
                if ($row['p_diagnosis'] == NULL && $row['p_treatment_plan'] == NULL) {
                    $this->Admin_model->update_patient_treatment_plan($id, $treatment);
                    $this->session->set_flashdata('message', 'success-treatment');
                    redirect('Admin_patientrec/view_patient/' . $id);
                } else {
                    $this->Admin_model->add_patient_treatment_plan($treatment);
                    $this->session->set_flashdata('message', 'success-treatment');
                    redirect('Admin_patientrec/view_patient/' . $id);
                }
            }

            $activity = array(
                'activity' => 'A patient treatment plan has been added in the patient records',
                'module' => 'Patient Records',
                'date_created' => date('Y-m-d H:i:s')
            );

            $this->Admin_model->add_activity($activity);
        }
    }

    public function delete_treatment($patient_id, $id)
    {
        $activity = array(
            'activity' => 'A patient treatment plan has been deleted in the patient records',
            'module' => 'Patient Records',
            'date_created' => date('Y-m-d H:i:s')
        );

        $this->Admin_model->add_activity($activity);
        $this->Admin_model->delete_patient_treatment($id);
        $this->session->set_flashdata('message', 'success-dlt-treatment');
        redirect('Admin_patientrec/view_patient/' . $patient_id);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Login/signin');
    }

    public function dd($data)
    {
        echo "<pre>";
        die(var_dump($data));
        echo "</pre>";
    }
}
