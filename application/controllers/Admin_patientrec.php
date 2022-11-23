<?php

use Aws\Textract\TextractClient;
use Aws\Exception\AwsException;

class Admin_patientrec extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        require_once 'vendor/autoload.php';

        $this->load->helper(['url', 'form', 'date', 'string', 'html']);
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
            $data['specialization'] = $this->session->userdata('specialization');

            $this->load->view('include-admin/dashboard-header', $data);
            $this->load->view('include-admin/dashboard-navbar', $data); // admin dashboard not yet done
            $this->load->view('admin-views/admin-patientrec-view', $data); //recent sample
            $this->load->view('include-admin/patientrec-scripts');
        } else {
            redirect('Login/signin');
        }
    }



    // * Patient Record Datatable
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
                    <a class="btn btn-sm btn-light" href=" ' . base_url("Admin_patientrec/view_patient/") . $patient->patient_id . ' " type="button">View</a>
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
                <div class="d-md-flex justify-content-md-center">
                    <button class="btn btn-sm btn-light" type="button" data-bs-toggle="modal" data-bs-target="#edit-diagnosis-' . $diagnosis->id . '">Edit</button>
                </div>
                <button class="btn btn-sm btn-link shadow-none" type="button" data-bs-toggle="modal" data-bs-target="#delete-diagnosis-' . $diagnosis->id . '"><i class="far fa-trash-alt"></i></button>
                
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

            $row = array();
            $row[] = $treatment->p_diagnosis;
            $row[] = $treatment->p_treatment_plan;
            $row[] = '
                <div class="d-md-flex justify-content-md-center">
                    <a class="btn btn-sm btn-light mx-2" type="button" data-bs-toggle="modal" data-bs-target="#view-treatment-' . $treatment->id . '">View</a>
                </div>
                <div class="d-md-flex justify-content-md-center">
                    <button class="btn btn-sm btn-light" type="button" data-bs-toggle="modal" data-bs-target="#edit-treatment-' . $treatment->id . '">Edit</button>
                </div>
                <button class="btn btn-sm btn-link shadow-none" type="button" data-bs-toggle="modal" data-bs-target="#delete-treatment-' . $treatment->id . '"><i class="far fa-trash-alt"></i></button>

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



    // * AJAX Request to check if patient exists
    public function check_name()
    {
        $this->load->model('Admin_model');

        if ($this->Admin_model->patient_exists($_POST['full_name'])) {
            echo '<label id="checkExist" class="text-danger font-monospace" style="font-size:13px">Patient already exists</label>';

            // add invalid class to input
            echo '<script>
            $(document).ready(function(){
                $("#first_name").addClass("invalid");
                $("#middle_name").addClass("invalid");
                $("#last_name").addClass("invalid");
            });
            </script>';
        } else if ($this->Admin_model->arc_patient_exists($_POST['full_name'])) {
            echo '<label id="checkExist" class="text-danger font-monospace" style="font-size:13px">Patient already exists in <a href="' . base_url('Admin_archives') . '" class="text-danger"><u>archives</u></a></label>';

            // add invalid class to input
            echo '<script>
            $(document).ready(function(){
                $("#first_name").addClass("invalid");
                $("#middle_name").addClass("invalid");
                $("#last_name").addClass("invalid");
            });
            </script>';
        }
    }

    public function import_check()
    {
        $this->load->model('Admin_model');

        if ($this->Admin_model->patient_exists($_POST['ext_name'])) {
            echo '<label id="impcheckExist" class="text-danger font-monospace" style="font-size:13px">Patient already exists</label>';

            // add invalid class to input
            echo '<script>
            $(document).ready(function(){
                $("#ext_name").addClass("invalid");
            });
            </script>';
        } else if ($this->Admin_model->arc_patient_exists($_POST['ext_name'])) {
            echo '<label id="impcheckExist" class="text-danger font-monospace" style="font-size:13px">Patient already exists in <a href="' . base_url('Admin_archives') . '" class="text-danger"><u>archives</u></a></label>';

            // add invalid class to input
            echo '<script>
            $(document).ready(function(){
                $("#ext_name").addClass("invalid");
            });
            </script>';
        }
    }



    // * Edit Patient Info
    public function edit_patient($id)
    {
        $data['patient'] = $this->Admin_model->get_patient_row($id);
        $patient = $this->Admin_model->get_patient_row($id);

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

        // insert a row in user_activity table
        $user_id = $this->session->userdata('id');
        $user_type = $this->session->userdata('role');
        $user_activity = 'Edited patient ' . $patient->un_patient_id . '\'s information';

        $this->load->model('Login_model');
        $this->Login_model->user_activity($user_id, $user_type, $user_activity);

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



    // * Delete Patient Record
    public function delete_patient($id)
    {
        $patient = $this->Admin_model->get_patient_row($id);

        $activity = array(
            'activity' => 'A patient record has been deleted in the patient records',
            'module' => 'Patient Records',
            'date_created' => date('Y-m-d H:i:s')
        );

        // insert a row in user_activity table
        $user_id = $this->session->userdata('id');
        $user_type = $this->session->userdata('role');
        $user_activity = 'Deleted patient ' . $patient->un_patient_id . ' in the patient records';

        $this->load->model('Login_model');
        $this->Login_model->user_activity($user_id, $user_type, $user_activity);

        $this->Admin_model->add_activity($activity);
        $this->Admin_model->delete_patient($id);
        $this->session->set_flashdata('message', 'dlt_success');
        redirect('Admin_patientrec/index');
    }


    
    public function view_patient($id)
    {
        if ($this->session->userdata('logged_in')) {

            $data['user_role'] = $this->session->userdata('role');

            if ($data['user_role'] == 'Admin') {
                $data['title'] = 'Admin - Patient Records | ePMC';
            } else {
                $data['title'] = 'Doctor - Patient Records | ePMC';
            }

            $patient = $this->Admin_model->get_patient_row($id);

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

            // insert a row in user_activity table
            $user_id = $this->session->userdata('id');
            $user_type = $this->session->userdata('role');
            $user_activity = 'Viewed patient ' . $patient->un_patient_id . '\'s records';

            $this->load->model('Login_model');
            $this->Login_model->user_activity($user_id, $user_type, $user_activity);


            $this->load->view('include-admin/dashboard-header', $data);
            $this->load->view('include-admin/dashboard-navbar', $data);
            $this->load->view('admin-views/admin-patientrec-view-2', $data);
            $this->load->view('include-admin/patientrec2-scripts');
        } else {
            redirect('Login/signin');
        }
    }

    public function add_patient_validation()
    {

        // concatenate first_name, middle_name, last_name
        $full_name = $this->input->post('first_name') . ' ' . $this->input->post('middle_name') . ' ' . $this->input->post('last_name');

        $check_existing = $this->Admin_model->patient_exists($full_name);
        $check_arc_existing = $this->Admin_model->arc_patient_exists($full_name);


        if ($check_existing == true || $check_arc_existing == true) {
            //$this->dd('existing');
            $this->session->set_flashdata('patient_exists', 'Patient already exists.');
            $this->index();
        } else {
            //$this->dd('success');
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

            $patient = $this->Admin_model->get_patient_row($insert_id);

            // insert a row in user_activity table
            $user_id = $this->session->userdata('id');
            $user_type = $this->session->userdata('role');
            $user_activity = 'Added patient ' . $patient->un_patient_id . ' in the patient records';

            $this->load->model('Login_model');
            $this->Login_model->user_activity($user_id, $user_type, $user_activity);


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
        }
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
                'key'    => 'AKIAV2W63P7NKBUENKEV',
                'secret' => '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',
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
            $birth_date = $ext_data['Birthday:'] = null;
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

        $civil_status = strtolower($ext_data['Civil Status:']);
        if ($civil_status == 'Single' || $civil_status == 'single') {
            $civil_status = 'Single';
        } elseif ($civil_status == 'Married' || $civil_status == 'married') {
            $civil_status = 'Married';
        } elseif ($civil_status == 'Widowed' || $civil_status == 'widowed') {
            $civil_status = 'Widowed';
        } elseif ($civil_status == 'Separated' || $civil_status == 'separated') {
            $civil_status = 'Separated';
        } elseif ($civil_status == 'Divorced' || $civil_status == 'divorced') {
            $civil_status = 'Divorced';
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
            'Civil Status' => $civil_status,
            'Weight' => $weight,
            'Height' => $ext_data['Height:'],
            'Occupation' => $occupation,
            'File' => $ext_data['File'],
        ];

        return $formatted_data;
    }

    public function verify_import()
    {
        $full_name = $this->input->post('name');

        $check_existing = $this->Admin_model->patient_exists($full_name);
        $check_arc_existing = $this->Admin_model->arc_patient_exists($full_name);


        if ($check_existing == true || $check_arc_existing == true) {
            //$this->dd('existing');
            $this->session->set_flashdata('v_patient_exists', true);
            $this->index();
        } else {
            $info = array(
                'first_name' => $full_name,
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

            $patient = $this->Admin_model->get_patient_row($insert_id);

            // insert a row in user_activity table
            $user_id = $this->session->userdata('id');
            $user_type = $this->session->userdata('role');
            $user_activity = 'Imported patient ' . $patient->un_patient_id . ' record';

            $this->load->model('Login_model');
            $this->Login_model->user_activity($user_id, $user_type, $user_activity);

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


            // insert a row in user_activity table
            $user_id = $this->session->userdata('id');
            $user_type = $this->session->userdata('role');
            $user_activity = 'Updated patient ' . $patient->un_patient_id . '\'s health information';

            $this->load->model('Login_model');
            $this->Login_model->user_activity($user_id, $user_type, $user_activity);


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
        $documents = $this->Admin_model->get_patient_documents_count($id);
        $doc_name = $this->input->post('doc_name');

        $config = array(
            'upload_path' => './uploads/' . $id . '/',
            'allowed_types' => 'jpg|jpeg|png|pdf',
            'max_size' => 2048,
            'max_width' => 2048,
            'max_height' => 2048,
            'file_name' => $doc_name . '-' . $documents,
            'file_ext_tolower' => TRUE,
            'overwrite' => TRUE
        );

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $this->form_validation->set_rules('doc_name', 'Document name', 'required', array(
            'required' => 'Please enter a %s.'
        ));

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'error-doc');
            redirect('Admin_patientrec/view_patient/' . $id);
        } else {

            if (!$this->upload->do_upload('doc_file')) {

                $this->session->set_flashdata('error-doc');
                $this->dd($this->upload->display_errors());
                redirect('Admin_patientrec/view_patient/' . $id);
            } else {

                $doc_file = $this->upload->data('file_name');

                $doc_data = array(
                    'patient_id' => $id,
                    'doc_name' => $doc_name,
                    'document' => $doc_file
                );

                $patient = $this->Admin_model->get_patient_row($id);

                // insert a row in user_activity table
                $user_id = $this->session->userdata('id');
                $user_type = $this->session->userdata('role');
                $user_activity = 'Uploaded patient ' . $patient->un_patient_id . ' document';

                $this->load->model('Login_model');
                $this->Login_model->user_activity($user_id, $user_type, $user_activity);


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
        $patient = $this->Admin_model->get_patient_row($id);

        // insert a row in user_activity table
        $user_id = $this->session->userdata('id');
        $user_type = $this->session->userdata('role');
        $user_activity = 'Downloaded a patient ' . $patient->un_patient_id . ' document';

        $this->load->model('Login_model');
        $this->Login_model->user_activity($user_id, $user_type, $user_activity);

        $this->load->helper('download');
        $document = $this->Admin_model->get_patient_document($doc_id);
        //$this->dd($document);
        $file = './uploads/' . $id . '/' . $document->document;
        force_download($file, NULL);
    }

    public function delete_document($id, $doc_id)
    {
        $patient = $this->Admin_model->get_patient_row($id);

        // insert a row in user_activity table
        $user_id = $this->session->userdata('id');
        $user_type = $this->session->userdata('role');
        $user_activity = 'Deleted a patient ' . $patient->un_patient_id . ' document';

        $this->load->model('Login_model');
        $this->Login_model->user_activity($user_id, $user_type, $user_activity);

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
            } else {
                foreach ($patient as $row) {
                    if ($row['p_recent_diagnosis'] == NULL && $row['p_doctor'] == NULL) {
                        $this->Admin_model->update_patient_diagnosis($id, $diagnosis);
                        $this->session->set_flashdata('message', 'success-diagnosis');
                        break;
                    } else {
                        $this->Admin_model->add_patient_diagnosis($diagnosis);
                        $this->session->set_flashdata('message', 'success-diagnosis');
                        break;
                    }
                }
            }

            $patient = $this->Admin_model->get_patient_row($id);

            // insert a row in user_activity table
            $user_id = $this->session->userdata('id');
            $user_type = $this->session->userdata('role');
            $user_activity = 'Added a patient ' . $patient->un_patient_id . ' diagnosis';

            $this->load->model('Login_model');
            $this->Login_model->user_activity($user_id, $user_type, $user_activity);

            $activity = array(
                'activity' => 'A patient diagnosis has been added in the patient records',
                'module' => 'Patient Records',
                'date_created' => date('Y-m-d H:i:s')
            );

            $this->Admin_model->add_activity($activity);

            redirect('Admin_patientrec/view_patient/' . $id);
        }
    }

    // ! wala pa
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

        $patient = $this->Admin_model->get_patient_row($patient_id);

        // insert a row in user_activity table
        $user_id = $this->session->userdata('id');
        $user_type = $this->session->userdata('role');
        $user_activity = 'Deleted a patient ' . $patient->un_patient_id . ' diagnosis';

        $this->load->model('Login_model');
        $this->Login_model->user_activity($user_id, $user_type, $user_activity);

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
            } else {
                foreach ($patient as $row) {
                    if ($row['p_diagnosis'] == NULL && $row['p_treatment_plan'] == NULL) {
                        $this->Admin_model->update_patient_treatment_plan($id, $treatment);
                        $this->session->set_flashdata('message', 'success-treatment');
                        break;
                    } else {
                        $this->Admin_model->add_patient_treatment_plan($treatment);
                        $this->session->set_flashdata('message', 'success-treatment');
                        break;
                    }
                }
            }

            $patient = $this->Admin_model->get_patient_row($id);

            // insert a row in user_activity table
            $user_id = $this->session->userdata('id');
            $user_type = $this->session->userdata('role');
            $user_activity = 'Added a patient ' . $patient->un_patient_id . ' treatment plan';

            $this->load->model('Login_model');
            $this->Login_model->user_activity($user_id, $user_type, $user_activity);


            $activity = array(
                'activity' => 'A patient treatment plan has been added in the patient records',
                'module' => 'Patient Records',
                'date_created' => date('Y-m-d H:i:s')
            );

            $this->Admin_model->add_activity($activity);

            redirect('Admin_patientrec/view_patient/' . $id);
        }
    }

    public function delete_treatment($patient_id, $id)
    {
        $patient = $this->Admin_model->get_patient_row($patient_id);

        // insert a row in user_activity table
        $user_id = $this->session->userdata('id');
        $user_type = $this->session->userdata('role');
        $user_activity = 'Deleted a patient ' . $patient->un_patient_id . ' treatment plan';

        $this->load->model('Login_model');
        $this->Login_model->user_activity($user_id, $user_type, $user_activity);


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
