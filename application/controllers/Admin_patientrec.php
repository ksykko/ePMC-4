<?php

class Admin_patientrec extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(['url', 'form', 'date', 'string']);
        $this->load->library(['form_validation', 'session', 'pagination']);
        $this->load->model('Admin_model');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in')) { //if logged in
            $page_config = array(
                'base_url' => site_url('Admin_patientrec/index'),
                'total_rows' => $this->Admin_model->get_patient_count(), // get total number of patients 
                'num_links' => 3,
                'per_page' => 10,

                'full_tag_open' => '<div class="d-flex justify-content-center"><ul class="pagination">',
                'full_tag_close' => '</ul></div>',

                'first_link' => FALSE,
                'last_link' => FALSE,

                'next_link' => '&raquo;',
                'next_tag_open' => '<li class="page-item">',
                'next_tag_close' => '</li>',

                'prev_link' => '&laquo;',
                'prev_tag_open' => '<li class="page-item">',
                'prev_tag_close' => '</li>',

                'cur_tag_open' => '<li class="page-item active"><span class="page-link">',
                'cur_tag_close' => '</span></li>',

                'num_tag_open' => '<li class="page-item">',
                'num_tag_close' => '</li>',

                'attributes' => ['class' => 'page-link']

            );

            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $this->pagination->initialize($page_config);

            $id = $this->session->userdata('admin_id');

            $data['title'] = 'Admin - Patient Records | ePMC';
            $data['patient'] = $this->Admin_model->get_patient_row($id);
            $data['patients'] = $this->Admin_model->get_patient_table($page_config['per_page'], $page);


            $this->load->view('include-admin/dashboard-header', $data);
            $this->load->view('include-admin/dashboard-navbar', $data); // admin dashboard not yet done
            $this->load->view('admin-views/admin-patientrec-view', $data); //recent sample
            $this->load->view('include-admin/dashboard-scripts');
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



            // $data[] = array(
            //     $r->patient_id,
            //     $r->first_name . ' ' . $r->middle_name . ' ' . $r->last_name,
            //     $r->last_checkup,
            //     $r

            // );
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $patient->first_name . ' ' . $patient->middle_name . ' ' . $patient->last_name;
            $row[] = $patient->last_checkup;
            $row[] = '
                <td class="text-center" colspan="1"> 
                    <a class="btn btn-light mx-2" href=" ' . base_url("Admin_patientrec/view_patient/") . $patient->patient_id . ' " type="button">View</a>
                    <button class="btn btn-light mx-2" type="button">Edit</button>
                    <button class="btn btn-link mx-2 shadow-none" type="button" data-bs-toggle="modal" data-bs-target="#delete-dialog-' . $patient->patient_id . ' "><i class="far fa-trash-alt"></i></button> 
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
        exit();
    }

    // public function datatable()
    // {
    //     $list = $this->Admin_model->get_patient_tbl();
    //     $draw = intval($this->input->get("draw"));
    //     $start = intval($this->input->get("start"));
    //     $data = array();
    //     $no = 0;
    //     foreach ($list as $patient) {
    //         $no++;
    //         $row = array();
    //         $row[] = $no;
    //         $row[] = $patient->first_name . ' ' . $patient->middle_name . ' ' . $patient->last_name;
    //         $row[] = $patient->last_checkup;
    //         $data[] = $row;
    //     }

    //     $output = array(
    //         "draw" => $_POST['draw'],
    //         "recordsTotal" => $list->num_rows(),
    //         "recordsFiltered" => $list->num_rows(),
    //         "data" => $data,
    //     );
    //     //output to json format
    //     echo json_encode($output);
    // }

    // public function datatable()
    // {
    //     $fetch_data = $this->Admin_model->make_datatables();
    //     $data = array();
    //     foreach ($fetch_data as $row) {
    //         $sub_array = array();
    //         $sub_array[] = $row->patient_id;
    //         $sub_array[] = $row->first_name . ' ' . $row->middle_name . ' ' . $row->last_name;
    //         $sub_array[] = $row->last_checkup;
    //         $data[] = $sub_array;
    //     }

    //     $output = array(
    //         "draw" => intval($_POST["draw"]),
    //         "recordsTotal" => $this->Admin_model->get_all_data(),
    //         "recordsFiltered" => $this->Admin_model->get_filtered_data(),
    //         "data" => $data
    //     );
    //     echo json_encode($output);
    // }


    public function edit_patient()
    {
    }

    public function delete_patient($id)
    {
        $this->Admin_model->delete_patient($id);
        redirect('Admin_patientrec/index');
    }

    public function view_patient($id)
    {
        $data['title'] = 'Admin - Patient Records | ePMC';
        $data['patient'] = $this->Admin_model->get_patient_row($id);
        // $data['patients'] = $this->Admin_model->get_patient_table();
        $data['patient_id'] = $id;

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
                'activation_code' => random_string('alnum', 16),
                'status' => '0',
                'date_created' => date('Y-m-d H:i:s')
            );

            $this->session->set_flashdata('message', 'success');
            $this->Admin_model->add_patient($info);
            redirect('Admin_patientrec');

            // <div class="alert alert-warning alert-dismissible fade show" role="alert">
            //     <strong>Holy guacamole!</strong> You should check in on some of those fields below.
            //     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            // </div>


        }
    }


    // PATIENT RECORD VIEW INDIVIDUAL

    public function update_avatar()
    {

        $img_config = array(
            'upload_path' => './assets/img/profile-avatars/',
            'allowed_types' => 'jpg|jpeg|png',
            'max_size' => 2048,
            'max_width' => 1024,
            'max_height' => 768,
            'file_name' => $this->input->post('patient_id'),
            'overwrite' => TRUE
        );

        $this->load->library('upload', $img_config);
        $this->upload->initialize($img_config);

        if (!$this->upload->do_upload('avatar')) {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('Admin_patientrec');
        } else {
            $data = array('upload_data' => $this->upload->data());
            $avatar = $data['upload_data']['file_name'];
            $patient_id = $this->input->post('patient_id');

            $this->Admin_model->update_avatar($avatar, $patient_id);
            $this->session->set_flashdata('success', 'Avatar successfully updated.');
            redirect('Admin_patientrec');
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
