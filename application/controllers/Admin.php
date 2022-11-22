<?php
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(['url', 'form', 'html']);
        $this->load->library(['form_validation', 'session', 'pagination']);
        $this->load->model('Admin_model');
        $this->load->library("pagination");
    }

    public function index()
    {
        if ($this->session->userdata('logged_in')) { //if logged in

            $data['title'] = 'Admin | ePMC';
            $id = $this->session->userdata('id');
            $data ['user'] = $this->Admin_model->get_useracc_row($id);

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

            //$this->dd($this->session->userdata());

            $this->load->view('include-admin/dashboard-header', $data);
            $this->load->view('include-admin/dashboard-navbar');
            $this->load->view('admin-views/admin-dashboard-reports-view', $data);
            //$this->load->view('admin-views/admin-dashboard', $data);
            $this->load->view('include-admin/dashboard-scripts');
        } else {
            redirect('Login/signin');
        }
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

    public function weekly_added_patients()
    {
    }

    public function edit_useracc($id)
    {
        $data['user'] = $this->Admin_model->get_useracc_row($id);
        //$this->dd($data);

        // $this->form_validation->set_rules('user_id', 'User id');

        // $this->form_validation->set_rules('edt_first_name', 'First name', 'required|regex_match[/^([a-z ])+$/i]', array(
        //     'required' => 'Please enter user\'s %s.'
        // ));

        // $this->form_validation->set_rules('edt_last_name', 'Last name', 'required|regex_match[/^([a-z ])+$/i]', array(
        //     'required' => 'Please enter user\'s %s.'
        // ));

        // $this->form_validation->set_rules('edt_username', 'Username', 'required|regex_match[/^([a-z ])+$/i]', array(
        //     'required' => 'Please enter user\'s %s.'
        // ));

        // $this->form_validation->set_rules('edt_role', 'Role', 'required', array(
        //     'required' => 'Please enter user\'s %s.'
        // ));

        // $this->form_validation->set_rules('edt_specialization', 'Specialization');

        // $this->form_validation->set_rules('edt_birth_date', 'Birthdate', 'required', array(
        //     'required' => 'Please enter user\'s %s.'
        // ));

        // $this->form_validation->set_rules('edt_contact_no', 'Contact #', 'required|numeric|min_length[11]', array(
        //     'required' => 'Please enter user\'s %s.',
        //     'numeric' => 'Please enter a valid %s.'
        // ));

        // $this->form_validation->set_rules('edt_email', 'Email', 'required|valid_email', array(
        //     'required' => 'Please enter user\'s %s.',
        //     'valid_email' => 'Please enter a valid %s.'
        // ));

        // if ($this->form_validation->run() == FALSE) {
        //     $modal_no = $this->input->post('modal_no');
        //     $this->session->set_flashdata('edit_failed', $modal_no);
        //     $this->index();
        // } else {
        // $editUser = $this->input->post('editUser');
        // if (isset($editUser)) {
        $info = array(
            'first_name' => $this->input->post('first_name'),
            'middle_name' => $this->input->post('middle_name'),
            'last_name' => $this->input->post('last_name'),
            'username' => $this->input->post('username'),
            'birth_date' => $this->input->post('birth_date'),
            'contact_no' => $this->input->post('cell_no'),
            'email' => $this->input->post('email')
        );

        //$this->dd($info);

        $activity = array(
            'activity' => 'A user\'s account has been updated in the user accounts',
            'module' => 'User Accounts',
            'date_created' => date('Y-m-d H:i:s')
        );

        $this->Admin_model->add_activity($activity);
        $this->session->set_flashdata('message', 'edit_user_success');
        $this->Admin_model->edit_useracc($id, $info);
        redirect('Admin/index');

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

    public function dd($data)
    {
        echo "<pre>";
        die(var_dump($data));
        echo "</pre>";
    }
}
