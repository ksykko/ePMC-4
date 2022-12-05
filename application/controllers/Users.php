<?php

class Users extends CI_Controller {
    public function __construct() {
        parent :: __construct();
        
        $this->load->helper(['url', 'form']);
        $this->load->library(['form_validation', 'session', 'pagination']);
        $this->load->model('Users_model');
    }

    public function index() {
       if (!$this->session->userdata('logged_in')) {
            redirect('Login/signin');
       }

       if ($this->session->userdata('role') == 'admin') {
            redirect('Admin');
       } elseif ($this->session->userdata('role') == 'patient') {
          
            redirect('Patient');
       }

       $id  = $this->session->userdata('id');
       $data['title'] = 'User';
       $data['active'] = 'profile';
       $data['user'] = $this->Users_model->get_user_row($id);
       $data['user_role'] = $this->session->userdata('role');
       $data['user_name'] = $this->session->userdata('full_name');
       $data['user_specialization'] = $this->session->userdata('specialization');
       $this->load->view('include/header', $data);
       $this->load->view('users_view', $data);
       $this->load->view('include/footer');
    
    }

    // public function schedules() {
    //     $id  = $this->session->userdata('id');
    //     $data['title'] = 'Users Schedule';
    //     $data['active'] = 'schedules';
    //     $data['user'] = $this->User_model->get_user_row($id);
    //     $this->load->view('include/header', $data);
    //     $this->load->view('users_schedule', $data);
    //     $this->load->view('include/footer');

    // }

    // public function update_user_settings(){
    //     $id  = $this->session->userdata('id');
    //     $user = $this->User_model->get_user_row($id);

    //     $img_config = array(
    //         'upload_path' => './assets/img/avatars/',
    //         'allowed_types' => 'gif|jpg|png|jpeg',
    //         'max_size' => 1000,
    //         'max_width' => 2048,
    //         'max_height' => 2048
    //     );

    //     $this->load->library('upload', $img_config);
    //     $this->upload->initialize($img_config);

    //     if ($this->input->post('username') != $user->username) {
    //         $is_unique = 'is_unique[tbl_users.username]';
    //     }
    //     else {
    //         $is_unique = '';
    //     }

    //     $this->form_validation->set_rules('first_name', 'First Name', 'alpha', array(
    //         'alpha' => 'The %s field must contain only alphabets.'
    //     ));
    //     $this->form_validation->set_rules('last_name', 'Last Name', 'alpha', array(
    //         'alpha' => 'The %s field must contain only alphabets.'
    //     ));
    //     $this->form_validation->set_rules('username', 'Username', $is_unique, array(
    //         'is_unique' => 'This %s already exists.'
    //     ));
    //     $this->form_validation->set_rules('contact_no', 'Contact Number', 'numeric', array(
    //         'numeric' => 'This field only accepts numeric characters.'
    //     ));
    //     $this->form_validation->set_rules('password', 'Password', 'min_length[8]|max_length[12]', array(
    //         'min_length' => 'The %s field must be at least %s characters in length.',
    //         'max_length' => 'The %s field must be at most %s characters in length.'
    //     ));
    //     $this->form_validation->set_rules('conf_password', 'Confirm Password', 'matches[password]', array(
    //         'matches' => 'The %s field does not match the %s field.'
    //     ));

    //     // if ($this->upload->do_upload('avatar') == FALSE) {
    //     //     $this->form_validation->set_rules('avatar', 'Avatar');
    //     // }

    //     if ($this->form_validation->run() == FALSE) {
    //         $this->index();
    //     }
    //     else {
    //         // $info = array();
            
            
    //         // if (!empty($img_name)) {
    //         //     $info += ['avatar' => $img_name];
    //         // }  
            
    //         // foreach ($_POST as $key => $value){
    //         //     if(!empty($this->input->post($key))){
    //         //     $info += [$key => $value];
    //         //     }
    //         // }
            
    //         $img_name = (!$this->upload->do_upload('avatar')) ? null : $this->upload->data('file_name');
    //         $info = array (
    //             'first_name' => $this->input->post('first_name'),
    //             'last_name' => $this->input->post('last_name'),
    //             'username' => $this->input->post('username'),
    //             'contact_no' => $this->input->post('contact_no'),
    //             'password' => $this->input->post('password'),
    //             'avatar' => $img_name
    //         );
            
    //         $this->User_model->update_user($id, $info);
    //         redirect('User');
    //     }

    // }

}

?>