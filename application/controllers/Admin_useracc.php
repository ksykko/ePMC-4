<?php

class Admin_useracc extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();


        $this->load->helper('url', 'form', 'date', 'string', 'html', 'security');
        $this->load->library(['form_validation', 'session', 'pagination']);
        $this->load->model('Admin_model');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in')) { //if logged in

            $id = $this->session->userdata('admin_id');

            $data['title'] = 'User Accounts';
            $data['user'] = $this->Admin_model->get_useracc_row($id);
            $data['users'] = $this->Admin_model->get_useracc_table();
            $data['user_role'] = $this->session->userdata('role');
            $data['specialization'] = $this->session->userdata('specialization');

            $this->load->view('include-admin/dashboard-header', $data);
            $this->load->view('include-admin/dashboard-navbar', $data);
            $this->load->view('admin-views/useraccounts-view', $data);
            $this->load->view('include-admin/useraccounts-scripts', $data);
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

        $users = $this->Admin_model->get_useracc_tbl();

        $data = array();
        $no = 0;
        foreach ($users->result() as $user) {

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = '
            
                <img class="rounded-circle me-2" width="50" height="50" src="' . base_url('/assets/img/profile-avatars/') . $user->avatar . '" /> ' . $user->first_name . ' ' . $user->last_name . '

            
            ';
            $row[] = ucfirst($user->role);
            $row[] = $user->birth_date;
            $row[] = $user->contact_no;
            $row[] = $user->email;
            $row[] = '
                <td class="text-center" colspan="1">
                
                <button class="btn btn-light btn-sm product-edit-modal-btn" data-bs-toggle="modal" data-bs-target="#user-edit-modal-' . $user->user_id . '" type="button" data-id="' . $user->user_id . '" data-user_firstname="' . $user->first_name . '" data-user_lastname="' . $user->last_name . '" data-user_username="' . $user->username . '" data-user_role="' . $user->role . '" data-user_specialization="' . $user->specialization . '" data-user_birthdate="' . $user->birth_date . '" data-user_contactno="' . $user->contact_no . '" data-user_email="' . $user->email . '">Edit</button>
                <button class="btn btn-link btn-sm shadow-none" type="button" data-bs-toggle="modal" data-bs-target="#delete-dialog-' . $user->user_id . ' "><i class="far fa-trash-alt"></i></button> 
                </td>
            ';
            $data[] = $row;
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $users->num_rows(),
            "recordsFiltered" => $users->num_rows(),
            "data" => $data
        );
        echo json_encode($output);
        // exit();
    }

    public function add_useracc_validation()
    {
        $this->form_validation->set_rules('first_name', 'First name', 'required|regex_match[/^([a-z ])+$/i]', array(
            'required' => 'Please enter user\'s %s.'
        ));

        $this->form_validation->set_rules('last_name', 'Last name', 'required|regex_match[/^([a-z ])+$/i]', array(
            'required' => 'Please enter user\'s %s.'
        ));

        $this->form_validation->set_rules('username', 'Username', 'required|regex_match[/^([a-z ])+$/i]', array(
            'required' => 'Please enter user\'s %s.'
        ));

        $this->form_validation->set_rules('role', 'Role', 'required', array(
            'required' => 'Please enter user\'s %s.'
        ));

        $this->form_validation->set_rules('specialization', 'Specialization');

        $this->form_validation->set_rules('birth_date', 'Birthdate', 'required', array(
            'required' => 'Please enter user\'s %s.'
        ));

        $this->form_validation->set_rules('sex', 'Gender', 'required', array(
            'required' => 'Please enter user\'s %s.'
        ));

        $this->form_validation->set_rules('cell_no', 'Contact #', 'required|numeric|min_length[11]', array(
            'required' => 'Please enter user\'s %s.',
            'numeric' => 'Please enter a valid %s.'
        ));

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email', array(
            'required' => 'Please enter user\'s %s.',
            'valid_email' => 'Please enter a valid %s.'
        ));

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', 'add_failed');
            $this->index();
        } else {
            // $addUser = $this->input->post('addUser');

            $info = array(
                'first_name' => $this->input->post('first_name'),
                'middle_name' => $this->input->post('middle_name'),
                'last_name' => $this->input->post('last_name'),
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('birth_date'), PASSWORD_DEFAULT),
                'role' => $this->input->post('role'),
                'specialization' => $this->input->post('specialization'),
                'birth_date' => $this->input->post('birth_date'),
                'gender' => $this->input->post('sex'),
                'contact_no' => $this->input->post('cell_no'),
                'email' => $this->input->post('email'),
                'avatar' => 'default-avatar.png',
                'date_created' => date('Y-m-d H:i:s')
            );

            if ($this->security->xss_clean($info)) {

                // insert a row in user_activity table
                $user_id = $this->session->userdata('id');
                $user_type = $this->session->userdata('role');
                $user_activity = 'Added a new user account.';

                $this->load->model('Login_model');
                $this->Login_model->user_activity($user_id, $user_type, $user_activity);


                $activity = array(
                    'activity' => 'A new user has been added in the user accounts',
                    'module' => 'User Accounts',
                    'date_created' => date('Y-m-d H:i:s')
                );

                $this->Admin_model->add_activity($activity);
                $this->session->set_flashdata('message', 'success');
                $this->Admin_model->add_useracc($info);


                redirect('Admin_useracc');
            } else {
                $this->session->set_flashdata('message', 'add_failed');
                $this->index();
            }
        }
    }

    public function edit_useracc($id)
    {
        $data['user'] = $this->Admin_model->get_useracc_row($id);

        // $this->form_validation->set_rules('user_id', 'User id');

        $this->form_validation->set_rules('edt_first_name', 'First name', 'required|regex_match[/^([a-z ])+$/i]', array(
            'required' => 'Please enter user\'s %s.'
        ));

        $this->form_validation->set_rules('edt_last_name', 'Last name', 'required|regex_match[/^([a-z ])+$/i]', array(
            'required' => 'Please enter user\'s %s.'
        ));

        $this->form_validation->set_rules('edt_username', 'Username', 'required|regex_match[/^([a-z ])+$/i]', array(
            'required' => 'Please enter user\'s %s.'
        ));

        $this->form_validation->set_rules('edt_role', 'Role', 'required', array(
            'required' => 'Please enter user\'s %s.'
        ));

        $this->form_validation->set_rules('edt_specialization', 'Specialization');

        $this->form_validation->set_rules('edt_birth_date', 'Birthdate', 'required', array(
            'required' => 'Please enter user\'s %s.'
        ));

        $this->form_validation->set_rules('edt_admin_spec', 'Position');

        $this->form_validation->set_rules('edt_birth_date', 'Birthdate', 'required', array(
            'required' => 'Please enter user\'s %s.'
        ));

        $this->form_validation->set_rules('edt_contact_no', 'Contact #', 'required|numeric|min_length[11]', array(
            'required' => 'Please enter user\'s %s.',
            'numeric' => 'Please enter a valid %s.'
        ));

        $this->form_validation->set_rules('edt_email', 'Email', 'required|valid_email', array(
            'required' => 'Please enter user\'s %s.',
            'valid_email' => 'Please enter a valid %s.'
        ));

        if ($this->form_validation->run() == FALSE) {
            $modal_no = $this->input->post('modal_no');
            $this->session->set_flashdata('edit_failed', $modal_no);
            $this->index();
        } else {
            $editUser = $this->input->post('editUser');

            if (isset($editUser)) {
                $info = array(
                    'first_name' => $this->input->post('edt_first_name'),
                    'last_name' => $this->input->post('edt_last_name'),
                    'username' => $this->input->post('edt_username'),
                    'role' => $this->input->post('edt_role'),
                    'specialization' => $this->input->post('edt_specialization'),
                    'birth_date' => $this->input->post('edt_birth_date'),
                    'gender' => $this->input->post('edt_gender'),
                    'contact_no' => $this->input->post('edt_contact_no'),
                    'email' => $this->input->post('edt_email'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                );
            }

            // insert a row in user_activity table
            $user_id = $this->session->userdata('id');
            $user_type = $this->session->userdata('role');
            $user_activity = 'Edited a user account.';

            $this->load->model('Login_model');
            $this->Login_model->user_activity($user_id, $user_type, $user_activity);

            $activity = array(
                'activity' => 'A user\'s account has been updated in the user accounts',
                'module' => 'User Accounts',
                'date_created' => date('Y-m-d H:i:s')
            );

            $this->Admin_model->add_activity($activity);
            $this->session->set_flashdata('message', 'edit_user_success');
            $this->Admin_model->edit_useracc($id, $info);
            redirect('Admin_useracc/index');
        }
        // $data['products'] = $this->Admin_model->get_inventory_row($id);
        // $updateProduct = $this->input->post('updateProduct');
        // if (isset($updateProduct)) {
        //     $id = $this->input->post('item_id');
        //     $info = array(
        //         'prod_name' => $this->input->post('prod_name'),
        //         'prod_dosage' => $this->input->post('prod_dosage'),
        //         'prod_desc' => $this->input->post('prod_desc'),
        //         'stock_in' => $this->input->post('stock_in'),
        //         'stock_out' => $this->input->post('stock_out')
        //     );
        //     $this->session->set_flashdata('success', 'Product successfully updated.');
        //     $this->Admin_model->update_product($id, $info);
        //     redirect('Admin_inventory');        
        // }
    }

    public function reset_password($id)
    {
        $user = $this->Admin_model->get_useracc_row($id);

        $info = array(
            'password' => password_hash($user->birth_date, PASSWORD_DEFAULT)
        );

        $this->Admin_model->edit_useracc($id, $info);

        // insert a row in user_activity table
        $user_id = $this->session->userdata('id');
        $user_type = $this->session->userdata('role');

        $user_activity = 'Reset a user\'s password.';
        $this->load->model('Login_model');
        $this->Login_model->user_activity($user_id, $user_type, $user_activity);

        $activity = array(
            'activity' => 'A user\'s password has been reset.',
            'module' => 'User Accounts',
            'date_created' => date('Y-m-d H:i:s')
        );

        $this->Admin_model->add_activity($activity);
        $this->session->set_flashdata('message', 'reset-password-success');
        redirect('Admin_useracc/index');
    }

    public function delete_useracc($id)
    {
        // insert a row in user_activity table
        $user_id = $this->session->userdata('id');
        $user_type = $this->session->userdata('role');
        $user_activity = 'Deleted a user account.';

        $this->load->model('Login_model');
        $this->Login_model->user_activity($user_id, $user_type, $user_activity);


        $activity = array(
            'activity' => 'A user\'s account has been deleted in the user accounts',
            'module' => 'User Accounts',
            'date_created' => date('Y-m-d H:i:s')
        );

        $this->Admin_model->add_activity($activity);
        $this->session->set_flashdata('message', 'dlt_user_success');
        $this->Admin_model->delete_useracc($id);
        redirect('Admin_useracc/index');
    }

    public function dd($data)
    {
        echo "<pre>";
        die(var_dump($data));
        echo "</pre>";
    }
}
