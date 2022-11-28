<?php
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(['url', 'form', 'html', 'security']);
        $this->load->library(['form_validation', 'session', 'pagination']);
        $this->load->model('Admin_model');
        $this->load->library("pagination");
    }

    public function index()
    {
        if ($this->session->userdata('logged_in')) { //if logged in

            $data['title'] = 'Admin | ePMC';
            $id = $this->session->userdata('id');
            $data['user'] = $this->Admin_model->get_useracc_row($id);

            $data['admin_id'] = $id;
            $data['user_name'] = $this->session->userdata('full_name');
            $data['user_role'] = $this->session->userdata('role');
            $data['specialization'] = $this->session->userdata('specialization');


            $data['product'] = $this->Admin_model->get_inventory_row($id);
            $data['inventory_stocks'] = $this->Admin_model->get_inventory_table_contents();
            $data['users_count'] = $this->Admin_model->get_useracc_count();
            $data['patient_count'] = $this->Admin_model->get_patient_count();
            $data['new_patient_count'] = $this->Admin_model->get_nUser_count();


            $data['chart_data'] = $this->ageRange_chart();
            $data['gender_data'] = $this->gender_chart();
            $data['staff_data'] = $this->staff_chart();


            $this->load->view('include-admin/dashboard-header', $data);
            $this->load->view('include-admin/dashboard-navbar');
            $this->load->view('admin-views/admin-dashboard-reports-view', $data);
            //$this->load->view('admin-views/admin-dashboard', $data);
            $this->load->view('include-admin/dashboard-scripts', $data);
        } else {
            redirect('Login/signin');
        }
    }

    public function audit_log()
    {
        if ($this->session->userdata('logged_in')) { //if logged in

            $data['title'] = 'Admin - Audit Log | ePMC';
            $id = $this->session->userdata('id');
            $data['user'] = $this->Admin_model->get_useracc_row($id);

            $data['admin_id'] = $id;
            $data['user_name'] = $this->session->userdata('full_name');
            $data['user_role'] = $this->session->userdata('role');
            $data['specialization'] = $this->session->userdata('specialization');


            $this->load->view('include-admin/dashboard-header', $data);
            $this->load->view('include-admin/dashboard-navbar');
            $this->load->view('admin-views/admin-audit-log', $data);
            $this->load->view('include-admin/audit-log-scripts', $data);
        } else {
            redirect('Login/signin');
        }
    }

    public function audit_log_dt()
    {
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $activities = $this->Admin_model->get_audit_log();

        $data = array();
        $no = 0;

        foreach ($activities->result() as $activity) {

            $user = $this->Admin_model->get_useracc_row($activity->user_id);
            $no++;
            $dt = new DateTime($activity->date);
            $date = $dt->format('F j, Y g:i A');

            $row = array();

            $row[] = '
            
                <img class="rounded-circle me-2" width="50" height="50" src="' . base_url('/assets/img/profile-avatars/') . $user->avatar . '" /> ' . $user->first_name . ' ' . $user->last_name . '
            
            ';
            $row[] = $activity->user_type;
            $row[] = $activity->activity;
            $row[] = $date;

            $data[] = $row;
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $activities->num_rows(),
            "recordsFiltered" => $activities->num_rows(),
            "data" => $data
        );
        echo json_encode($output);
    }

    public function patient_audit_dt()
    {
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $activities = $this->Admin_model->get_patient_audit();

        $data = array();
        $no = 0;

        foreach ($activities->result() as $activity) {

            $user = $this->Admin_model->get_patient_row($activity->patient_id);
            $no++;
            $dt = new DateTime($activity->date);
            $date = $dt->format('F j, Y g:i A');

            $row = array();

            $row[] = '
            
                <img class="rounded-circle me-2" width="50" height="50" src="' . base_url('/assets/img/profile-avatars/') . $user->avatar . '" /> ' . $user->un_patient_id . '
            
            ';
            $row[] = ucfirst($activity->user_type);
            $row[] = $activity->activity;
            $row[] = $date;

            $data[] = $row;
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $activities->num_rows(),
            "recordsFiltered" => $activities->num_rows(),
            "data" => $data
        );
        echo json_encode($output);
    }


    public function datatable()
    {
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $activity = $this->Admin_model->get_activity_tbl();
        $data = array();


        foreach ($activity->result() as $recent_act) {

            $dt = new DateTime($recent_act->date_created);
            $date_created = $dt->format('m/d/y h:i A');


            $row = array();
            $row[] = $recent_act->activity;
            $row[] = $date_created;

            $data[] = $row;
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $activity->num_rows(),
            "recordsFiltered" => $activity->num_rows(),
            "data" => $data
        );
        echo json_encode($output);
    }


    public function ageRange_chart()
    {
        // get age range data from database
        $this->load->model('Charts_model');
        $query = $this->Charts_model->get_age_range();

        // create array to store age range data
        $age_range = [
            '0-10' => 0,
            '11-20' => 0,
            '21-30' => 0,
            '31-40' => 0,
            '41-50' => 0,
            '51-60' => 0,
            '61-70' => 0,
            '71-80' => 0,
            '81-90' => 0,
            '91-100' => 0,
        ];

        // loop through the data and store in array
        foreach ($query as $row) {
            //count the number of patients in each age range

            // age range 0-10
            if ($row->age >= 0 && $row->age <= 10) {
                $age_range['0-10'] = $age_range['0-10'] + 1;
            }
            // age range 11-20
            if ($row->age >= 11 && $row->age <= 20) {
                $age_range['11-20'] = $age_range['11-20'] + 1;
            }
            // age range 21-30
            if ($row->age >= 21 && $row->age <= 30) {
                $age_range['21-30'] = $age_range['21-30'] + 1;
            }
            // age range 31-40
            if ($row->age >= 31 && $row->age <= 40) {
                $age_range['31-40'] = $age_range['31-40'] + 1;
            }
            // age range 41-50
            if ($row->age >= 41 && $row->age <= 50) {
                $age_range['41-50'] = $age_range['41-50'] + 1;
            }
            // age range 51-60
            if ($row->age >= 51 && $row->age <= 60) {
                $age_range['51-60'] = $age_range['51-60'] + 1;
            }
            // age range 61-70
            if ($row->age >= 61 && $row->age <= 70) {
                $age_range['61-70'] = $age_range['61-70'] + 1;
            }
            // age range 71-80
            if ($row->age >= 71 && $row->age <= 80) {
                $age_range['71-80'] = $age_range['71-80'] + 1;
            }
            // age range 81-90
            if ($row->age >= 81 && $row->age <= 90) {
                $age_range['81-90'] = $age_range['81-90'] + 1;
            }
            // age range 91-100
            if ($row->age >= 91 && $row->age <= 100) {
                $age_range['91-100'] = $age_range['91-100'] + 1;
            }
        }

        return $age_range['chart_data'] = json_encode($age_range);
    }

    public function gender_chart()
    {
        // get no. gender data from database
        $this->load->model('Charts_model');
        $query = $this->Charts_model->get_gender_data();
        //$this->dd($query);

        // var_dump($query);
        // die();
        // store data in array
        $gender_data = [
            'male' => 0,
            'female' => 0,
        ];

        // loop through the data and store in array
        foreach ($query as $row) {
            if ($row->sex == 'Male') {
                $gender_data['male'] = $gender_data['male'] + 1;
            } else {
                $gender_data['female'] = $gender_data['female'] + 1;
            }
        }

        return $gender_data['chart_data'] = json_encode($gender_data);
    }

    public function staff_chart()
    {
        $this->load->model('Charts_model');
        $staff = $this->Charts_model->get_staff_count();


        $staff_data = [
            'admin' => 0,
            'genman' => 0,
            'pharma' => 0,
            'sec' => 0,
            'nurse' => 0,
            'intmed' => 0,
            'fammed' => 0,
            'obgyne' => 0,
            'ortho' => 0,
        ];

        // loop through the data and store in array
        foreach ($staff as $rows) {
            if ($rows->specialization == '') {
                $staff_data['admin'] = $staff_data['admin'] + 1;
            } else if ($rows->specialization == 'General Manager') {
                $staff_data['genman'] = $staff_data['genman'] + 1;
            } else if ($rows->specialization == 'Pharmacy Assistant') {
                $staff_data['pharma'] = $staff_data['pharma'] + 1;
            } else if ($rows->specialization == 'Secretary') {
                $staff_data['sec'] = $staff_data['sec'] + 1;
            } else if ($rows->specialization == 'Nurse') {
                $staff_data['nurse'] = $staff_data['nurse'] + 1;
            } else if ($rows->specialization == 'Internal Medicine') {
                $staff_data['intmed'] = $staff_data['intmed'] + 1;
            } else if ($rows->specialization == 'Family Medicine') {
                $staff_data['fammed'] = $staff_data['fammed'] + 1;
            } else if ($rows->specialization == 'Obstetrics and Gynecology') {
                $staff_data['obgyne'] = $staff_data['obgyne'] + 1;
            } else if ($rows->specialization == 'Orthopedics') {
                $staff_data['ortho'] = $staff_data['ortho'] + 1;
            }
        }

        return json_encode($staff_data);
    }

    public function user_activity()
    {
        $this->load->model('Charts_model');
        $user_activity = $this->Charts_model->get_user_activity();
        $user_activity_data = [
            'login' => 0,
            'logout' => 0,
        ];

        foreach ($user_activity as $row) {
            if ($row->activity == 'Logged in') {
                $user_activity_data['login'] = $user_activity_data['login'] + 1;
            } else {
                $user_activity_data['logout'] = $user_activity_data['logout'] + 1;
            }
        }

        // x-axis data for the chart
        // 1hr time interval from 00:00 to 23:00
        $time = [
            '00:00',
            '01:00',
            '02:00',
            '03:00',
            '04:00',
            '05:00',
            '06:00',
            '07:00',
            '08:00',
            '09:00',
            '10:00',
            '11:00',
            '12:00',
            '13:00',
            '14:00',
            '15:00',
            '16:00',
            '17:00',
            '18:00',
            '19:00',
            '20:00',
            '21:00',
            '22:00',
            '23:00',
        ];

        return json_encode($user_activity_data);
    }

    public function edit_useracc($id)
    {
        $data['user'] = $this->Admin_model->get_useracc_row($id);

        $this->form_validation->set_rules('first_name', 'First Name', 'trim');
        $this->form_validation->set_rules('middle_name', 'Middle Name', 'trim');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim');
        $this->form_validation->set_rules('username', 'Username', 'trim');
        $this->form_validation->set_rules('cell_no', 'Cellphone Number', 'trim');
        $this->form_validation->set_rules('email', 'Email', 'trim');


        if ($this->form_validation->run() == FALSE) {
            $this->dd($this->session->set_flashdata('error', validation_errors()));
        } else {

            $first_name = $this->security->xss_clean($this->input->post('first_name'));
            $middle_name = $this->security->xss_clean($this->input->post('middle_name'));
            $last_name = $this->security->xss_clean($this->input->post('last_name'));
            $username = $this->security->xss_clean($this->input->post('username'));
            $cell_no = $this->security->xss_clean($this->input->post('cell_no'));
            $email = $this->security->xss_clean($this->input->post('email'));


            $info = array(
                'first_name' => $first_name,
                'middle_name' => $middle_name,
                'last_name' => $last_name,
                'username' => $username,
                'birth_date' => $this->input->post('birth_date'),
                'contact_no' => $cell_no,
                'email' => $email,
            );

            //$this->dd($info);

            // insert a row in user_activity table
            $user_id = $this->session->userdata('id');
            $user_type = $this->session->userdata('role');
            $user_activity = 'Edited personal information';

            $this->load->model('Login_model');
            $this->Login_model->user_activity($user_id, $user_type, $user_activity);


            $activity = array(
                'activity' => 'A user\'s account has been updated in the user accounts',
                'module' => 'User Accounts',
                'date_created' => date('Y-m-d H:i:s')
            );

            $this->Admin_model->add_activity($activity);
            $this->session->set_flashdata('message', 'edit-user-success');
            $this->Admin_model->edit_useracc($id, $info);
            redirect('Admin/index');
        }
    }

    public function update_photo($id)
    {
        $user = $this->Admin_model->get_useracc_row($id);

        //$this->dd('test');

        $img_config = array(
            'upload_path' => './assets/img/profile-avatars/',
            'allowed_types' => 'jpg|jpeg|png',
            'max_size' => 2048,
            'max_width' => 2048,
            'max_height' => 2048,
            'file_name' => 'user-avatar-' . $id,
            'file_ext_tolower' => TRUE,
            'overwrite' => TRUE
        );

        $submit = $this->input->post('change-photo');

        if (isset($submit)) {
            $this->load->library('upload', $img_config);
            $this->upload->initialize($img_config);
            $fileExt = pathinfo($user->avatar, PATHINFO_EXTENSION);

            if (!$this->upload->do_upload('avatar')) {
                if ($user->avatar == 'default-avatar.png') {

                    $img_name = 'default-avatar.png';
                    $this->session->set_flashdata('error-upload', $this->upload->display_errors());
                    redirect('Admin');
                } else {
                    $img_name = $this->upload->data('file_name') . '.' . $fileExt;
                    $this->session->set_flashdata('error-upload', $this->upload->display_errors());
                    redirect('Admin');
                }
            } else {
                $img_name = $this->upload->data('file_name');
            }

            // insert a row in user_activity table
            $user_id = $this->session->userdata('id');
            $user_type = $this->session->userdata('role');
            $user_activity = 'Updated profile picture';

            $this->load->model('Login_model');
            $this->Login_model->user_activity($user_id, $user_type, $user_activity);

            $avatar = array(
                'avatar' => $img_name
            );

            $this->Admin_model->update_user_avatar($id, $avatar);

            $this->session->set_flashdata('message', 'success-update-avatar');
            redirect('Admin');
        }
    }

    public function change_password($id)
    {

        $this->form_validation->set_rules('password', 'Old Password', 'required|trim|callback_check_old_pass');
        $this->form_validation->set_rules('new_password', 'New Password', 'required|trim|min_length[8]');
        $this->form_validation->set_rules('conf_password', 'Confirm Password', 'required|matches[new_password]');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('error', 'error-change-pass');
            redirect('Admin');
        } else {

            $new_password = $this->security->xss_clean($this->input->post('new_password'));

            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            $data['password'] = $hashed_password;

            //$this->dd($data);

            $this->Admin_model->edit_useracc($id, $data);

            $this->session->set_flashdata('message', 'success-change-pass');
            redirect('Admin');
        }
    }

    public function check_old_pass($old_pass)
    {
        $id = $this->session->userdata('id');
        $user = $this->Admin_model->get_useracc_row($id);

        //$this->dd($patient->password);

        if (password_verify($old_pass, $user->password)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('check_old_pass', 'The {field} is incorrect');
            return FALSE;
        }
    }

    public function dd($data)
    {
        echo "<pre>";
        die(var_dump($data));
        echo "</pre>";
    }
}
