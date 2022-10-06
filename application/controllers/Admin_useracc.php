<?php

class Admin_useracc extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
        
        $this->load->helper('url', 'form', 'date', 'string');
        $this->load->library(['form_validation', 'session', 'pagination']);
        $this->load->model('Admin_model');
    }

    public function index() {
        if ($this->session->userdata('logged_in')) { //if logged in
            $page_config = array(
                'base_url' => site_url('Admin_useracc/index'),
                'total_rows' => $this->Admin_model->get_useracc_count(), // get total number of patients 
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

            $data['user'] = $this->Admin_model->get_useracc_row($id);
            $data['users'] = $this->Admin_model->get_useracc_table($page_config['per_page'], $page);
            
            $data['title'] = 'User Account';
            $this->load->view('include-admin/dashboard-header', $data);
            $this->load->view('include-admin/dashboard-navbar', $data);
            $this->load->view('admin-views/useraccounts-view', $data);
            $this->load->view('include-admin/dashboard-scripts');
        } else {
            redirect('Login/signin');
        }
    }

    public function add_useracc_validation() {
        $this->form_validation->set_rules('first_name', 'First name', 'required|regex_match[/^([a-z ])+$/i]', array(
            'required' => 'Please enter user\'s %s.'
        ));

        $this->form_validation->set_rules('middle_name', 'Middle name', 'required|regex_match[/^([a-z ])+$/i]', array(
            'required' => 'Please enter user\'s %s.'
        ));

        $this->form_validation->set_rules('last_name', 'Last name', 'required|regex_match[/^([a-z ])+$/i]', array(
            'required' => 'Please enter user\'s %s.'
        ));

        $this->form_validation->set_rules('username', 'Username', 'required|regex_match[/^([a-z ])+$/i]', array(
            'required' => 'Please enter user\'s %s.'
        ));

        $this->form_validation->set_rules('password', 'Password', 'min_length[8]|max_length[12]', array(
            'min_length' => 'The %s field must be at least %s characters in length.',
            'max_length' => 'The %s field must be at most %s characters in length.'
        ));
        $this->form_validation->set_rules('conf_password', 'Confirm password', 'matches[password]', array(
            'matches' => 'The %s field does not match the %s field.'
        ));

        $this->form_validation->set_rules('role', 'Role', 'required', array(
            'required' => 'Please enter user\'s %s.'
        ));

        $this->form_validation->set_rules('specialization', 'Specialization', 'required', array(
            'required' => 'Please enter user\'s %s.'
        ));

        $this->form_validation->set_rules('birth_date', 'Birthdate', 'required', array(
            'required' => 'Please enter user\'s %s.'
        ));

        $this->form_validation->set_rules('gender', 'Gender', 'required', array(
            'required' => 'Please enter user\'s %s.'
        ));

        $this->form_validation->set_rules('contact_no', 'Contact #', 'required|numeric|min_length[11]', array(
            'required' => 'Please enter user\'s %s.',
            'numeric' => 'Please enter a valid %s.'
        ));

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email', array(
            'required' => 'Please enter user\'s %s.',
            'valid_email' => 'Please enter a valid %s.'
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
            $addUser = $this->input->post('addUser');

            if (isset($addUser))
            {
                $info = array(
                    'first_name' => $this->input->post('first_name'),
                    'middle_name' => $this->input->post('middle_name'),
                    'last_name' => $this->input->post('last_name'),
                    'username' => $this->input->post('username'),
                    'password' => $this->input->post('password'),
                    'role' => $this->input->post('role'),
                    'specialization' => $this->input->post('specialization'),
                    'birth_date' => $this->input->post('birth_date'),
                    'gender' => $this->input->post('gender'),
                    'contact_no' => $this->input->post('contact_no'),
                    'email' => $this->input->post('email'),
                    'date_created' => date('Y-m-d H:i:s')
                );
            }

            $this->session->set_flashdata('success', 'User account successfully added.');
            $this->Admin_model->add_useracc($info);
            redirect('Admin_useracc');

            // <div class="alert alert-warning alert-dismissible fade show" role="alert">
            //     <strong>Holy guacamole!</strong> You should check in on some of those fields below.
            //     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            // </div>
        }

    }

    public function delete_useracc($id) {
        $this->Admin_model->delete_useracc($id);
        redirect('Admin_useracc/index');
    }
}
?>