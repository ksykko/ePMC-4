<?php

class Doctors extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(['url', 'form', 'html']);
        $this->load->library(['form_validation', 'session', 'pagination']);
        $this->load->model('Doctors_model');
        $this->load->model('Admin_model');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in')) { //if logged in

            $data['title'] = 'Doctors Dashboard | ePMC';
            $id = $this->session->userdata('id');
            $data['user'] = $this->Admin_model->get_useracc_row($id);

            $data['admin_id'] = $id;
            $data['user_role'] = $this->session->userdata('role');
            $data['specialization'] = $this->session->userdata('specialization');

            $data['product'] = $this->Admin_model->get_inventory_row($id);
            $data['inventory_stocks'] = $this->Admin_model->get_inventory_table_contents();
            $data['users_count'] = $this->Admin_model->get_useracc_count();
            $data['patient_count'] = $this->Admin_model->get_patient_count();
            $data['new_patient_count'] = $this->Admin_model->get_nUser_count();

            // Chart Data
            $data['age_range_data'] = $this->ageRange_chart_js(); // fetch age range data for chart
            $data['bmi_data'] = $this->bmi_chart_js(); // fetch bmi data for chart


            $this->load->view('include-admin/dashboard-header', $data);
            $this->load->view('include-admin/dashboard-navbar');
            $this->load->view('doctor-views/doctor-dashboard-view', $data);
            //$this->load->view('admin-views/admin-dashboard', $data);
            $this->load->view('include-admin/dashboard-scripts');
        } else {
            redirect('Login/signin');
        }
    }

    public function ageRange_chart_js()
    {
        // get age range data from database
        $this->load->model('Charts_model');
        $query = $this->Charts_model->get_age_range();

        // $this->dd($query);

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

        $male_age_range = [
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

        $female_age_range = [
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


        // loop through age range data and separate male and female range
        foreach ($query as $row) {

            if ($row->age >= 0 && $row->age <= 10) {
                if ($row->sex == 'Male') {
                    $male_age_range['0-10']++;
                } else {
                    $female_age_range['0-10']++;
                }
                $age_range['0-10']++;
            }

            if ($row->age >= 11 && $row->age <= 20) {
                if ($row->sex == 'Male') {
                    $male_age_range['11-20']++;
                } else {
                    $female_age_range['11-20']++;
                }
                $age_range['11-20']++;
            }

            if ($row->age >= 21 && $row->age <= 30) {
                if ($row->sex == 'Male') {
                    $male_age_range['21-30']++;
                } else {
                    $female_age_range['21-30']++;
                }
                $age_range['21-30']++;
            }

            if ($row->age >= 31 && $row->age <= 40) {
                if ($row->sex == 'Male') {
                    $male_age_range['31-40']++;
                } else {
                    $female_age_range['31-40']++;
                }
                $age_range['31-40']++;
            }

            if ($row->age >= 41 && $row->age <= 50) {
                if ($row->sex == 'Male') {
                    $male_age_range['41-50']++;
                } else {
                    $female_age_range['41-50']++;
                }
                $age_range['41-50']++;
            }

            if ($row->age >= 51 && $row->age <= 60) {
                if ($row->sex == 'Male') {
                    $male_age_range['51-60']++;
                } else {
                    $female_age_range['51-60']++;
                }
                $age_range['51-60']++;
            }

            if ($row->age >= 61 && $row->age <= 70) {
                if ($row->sex == 'Male') {
                    $male_age_range['61-70']++;
                } else {
                    $female_age_range['61-70']++;
                }
                $age_range['61-70']++;
            }

            if ($row->age >= 71 && $row->age <= 80) {
                if ($row->sex == 'Male') {
                    $male_age_range['71-80']++;
                } else {
                    $female_age_range['71-80']++;
                }
                $age_range['71-80']++;
            }

            if ($row->age >= 81 && $row->age <= 90) {
                if ($row->sex == 'Male') {
                    $male_age_range['81-90']++;
                } else {
                    $female_age_range['81-90']++;
                }
                $age_range['81-90']++;
            }

            if ($row->age >= 91 && $row->age <= 100) {
                if ($row->sex == 'Male') {
                    $male_age_range['91-100']++;
                } else {
                    $female_age_range['91-100']++;
                }
                $age_range['91-100']++;
            }
        }

        $data = [
            'male' => $male_age_range,
            'female' => $female_age_range,
            'total' => $age_range,
        ];

        //$this->dd($data);



        // // loop through the data and store in array
        // foreach ($query as $row) {
        //     //count the number of patients in each age range

        //     // age range 0-10
        //     if ($row->age >= 0 && $row->age <= 10) {
        //         $age_range['0-10'] = $age_range['0-10'] + 1;
        //     }
        //     // age range 11-20
        //     if ($row->age >= 11 && $row->age <= 20) {
        //         $age_range['11-20'] = $age_range['11-20'] + 1;
        //     }
        //     // age range 21-30
        //     if ($row->age >= 21 && $row->age <= 30) {
        //         $age_range['21-30'] = $age_range['21-30'] + 1;
        //     }
        //     // age range 31-40
        //     if ($row->age >= 31 && $row->age <= 40) {
        //         $age_range['31-40'] = $age_range['31-40'] + 1;
        //     }
        //     // age range 41-50
        //     if ($row->age >= 41 && $row->age <= 50) {
        //         $age_range['41-50'] = $age_range['41-50'] + 1;
        //     }
        //     // age range 51-60
        //     if ($row->age >= 51 && $row->age <= 60) {
        //         $age_range['51-60'] = $age_range['51-60'] + 1;
        //     }
        //     // age range 61-70
        //     if ($row->age >= 61 && $row->age <= 70) {
        //         $age_range['61-70'] = $age_range['61-70'] + 1;
        //     }
        //     // age range 71-80
        //     if ($row->age >= 71 && $row->age <= 80) {
        //         $age_range['71-80'] = $age_range['71-80'] + 1;
        //     }
        //     // age range 81-90
        //     if ($row->age >= 81 && $row->age <= 90) {
        //         $age_range['81-90'] = $age_range['81-90'] + 1;
        //     }
        //     // age range 91-100
        //     if ($row->age >= 91 && $row->age <= 100) {
        //         $age_range['91-100'] = $age_range['91-100'] + 1;
        //     }
        // }

        return json_encode($data);
    }

    public function bmi_chart_js()
    {
        // fetch height and weight data from database
        $this->load->model('Charts_model');
        $query = $this->Charts_model->get_bmi_data();

        // create array to store bmi data
        $bmi_data = [
            'underweight' => 0,
            'normal' => 0,
            'overweight' => 0,
            'obese' => 0,
        ];

        // loop through the data and store in array
        foreach ($query as $row) {

            // convert height and weight datatype to float
            $height = (float)$row->height;
            $weight = (float)$row->weight;

            // skips the patient if height or weight is 0
            if ($height == 0 || $weight == 0 || $height == null || $weight == null) {
                continue;
            }

            // calculate bmi
            $bmi = ($weight / $height / $height) * 10000;

            // count the number of patients in each bmi category
            if ($bmi < 18.5) {
                $bmi_data['underweight'] = $bmi_data['underweight'] + 1;
            }
            if ($bmi >= 18.5 && $bmi <= 24.9) {
                $bmi_data['normal'] = $bmi_data['normal'] + 1;
            }
            if ($bmi >= 25 && $bmi <= 29.9) {
                $bmi_data['overweight'] = $bmi_data['overweight'] + 1;
            }
            if ($bmi >= 30) {
                $bmi_data['obese'] = $bmi_data['obese'] + 1;
            }
        }

        // var_dump($bmi_data);
        // die();
        return $bmi_data['chart_data'] = json_encode($bmi_data);
    }

    public function edit_useracc($id)
    {
        $data['user'] = $this->Admin_model->get_useracc_row($id);

        $info = array(
            'first_name' => $this->input->post('first_name'),
            'middle_name' => $this->input->post('middle_name'),
            'last_name' => $this->input->post('last_name'),
            'username' => $this->input->post('username'),
            'birth_date' => $this->input->post('birth_date'),
            'contact_no' => $this->input->post('cell_no'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
        );

        if ($this->security->xss_clean($info)) {

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

            if ($this->session->userdata('specialization') == 'Pharmacy Assistant') {
                redirect('PharmacyAssistant');
            } else {
                redirect('Doctors/index');
            }

            redirect('Doctors/index');
        } else {

            $this->dd('xss clean failed');
        }
    }

    public function update_photo($id)
    {
        $user = $this->Admin_model->get_useracc_row($id);

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

        $this->load->library('upload', $img_config);
        $this->upload->initialize($img_config);
        $fileExt = pathinfo($user->avatar, PATHINFO_EXTENSION);

        if (!$this->upload->do_upload('avatar')) {
            if ($user->avatar == 'default-avatar.png') {

                $img_name = 'default-avatar.png';
                $this->session->set_flashdata('error-upload', $this->upload->display_errors());
                redirect('Doctors');
            } else {
                $img_name = $this->upload->data('file_name') . '.' . $fileExt;
                $this->session->set_flashdata('error-upload', $this->upload->display_errors());
                redirect('Doctors');
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

        if ($this->session->userdata('specialization') == 'Pharmacy Assistant') {
            redirect('PharmacyAssistant');
        } else {
            redirect('Doctors/index');
        }
        redirect('Doctors');
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
