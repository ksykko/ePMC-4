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
            $this->load->view('admin-views/admin-patientrec-view', $data);
            $this->load->view('include-admin/dashboard-scripts');
        } else {
            redirect('Login/signin');
        }
        
    }

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
        $this->form_validation->set_rules('full_name', 'Full name', 'required|regex_match[/^([a-z ])+$/i]', array(
            'required' => 'Please enter patient\'s %s.'
        ));

        $this->form_validation->set_rules(array('age', 'Age', 'required|numeric|is_natural_no_zero', array(
            'required' => 'Please enter patient\'s %s.',
            'numeric' => 'Please enter a valid %s.'
        )));

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

       
        if ($this->form_validation->run() == FALSE)
        {
            // echo '
            // <script type="text/javascript"> 
            //     $(document).ready(function(){
            //     $("#modal-1").modal("show");
            //     });
            // </script>
            // ';
            $this->index();
        }
        else
        {
            $addPatient = $this->input->post('addPatient');

            if (isset($addPatient))
            {
                $info = array(
                    'full_name' => $this->input->post('full_name'),
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
            }

            $this->session->set_flashdata('success', 'Patient successfully added.');
            $this->Admin_model->add_patient($info);
            redirect('Admin_patientrec');

            // <div class="alert alert-warning alert-dismissible fade show" role="alert">
            //     <strong>Holy guacamole!</strong> You should check in on some of those fields below.
            //     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            // </div>

            
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
