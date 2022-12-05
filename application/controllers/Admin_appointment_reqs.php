<?php

class Admin_appointment_reqs extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();


        $this->load->helper(['url', 'form', 'date', 'string']);
        $this->load->library(['form_validation', 'session', 'pagination']);
        $this->load->model('Admin_model');
        $this->load->model('Patient_model');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in')) { //if logged in

            $id = $this->session->userdata('admin_id');

            $data['user_role'] = $this->session->userdata('role');

            if ($data['user_role'] == 'Admin') {
                $data['title'] = 'Admin - Archived Records | ePMC';
            } else {
                $data['title'] = 'Doctor - Archived Records | ePMC';
            }
            
            $data['specialization'] = $this->session->userdata('specialization');

            $this->load->view('include-admin/dashboard-header', $data);
            $this->load->view('include-admin/dashboard-navbar', $data);
            $this->load->view('admin-views/schedule-requests', $data);
            $this->load->view('include-admin/patient-sched-scripts');
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

        $schedules = $this->Patient_model->get_patient_sched_table();

        $data = array();
        $no = 0;
        foreach ($schedules->result() as $schedule) {

            $no++;
            // $editId = 'edit-patient-' . $patient->patient_id;
            $row = array();
            $row[] = $schedule->un_patient_id;
            $row[] = $schedule->patient_name;
            $row[] = 'Dr. ' . $schedule->doctor_name;
            $row[] = $schedule->date;
            $row[] = '
            <div class="d-md-flex justify-content-md-center">
                <button class="btn btn-sm btn-light" type="button" data-bs-toggle="modal" data-bs-target="#edit-diagnosis-' . $schedule->schedule_id . '">Edit</button>
            </div>
            ';
            $data[] = $row;
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $schedules->num_rows(),
            "recordsFiltered" => $schedules->num_rows(),
            "data" => $data
        );

        $this->dd($output);
        
        echo json_encode($output);
    }

    public function restore_patient($id)
    {
        $patient = $this->Admin_model->get_arc_patient_row($id);

        $activity = array(
            'activity' => 'A patient has been restored from the archives',
            'module' => 'Archives',
            'date_created' => date('Y-m-d H:i:s')
        );

        // insert a row in user_activity table
        $user_id = $this->session->userdata('id');
        $user_type = $this->session->userdata('role');
        $user_activity = 'Restored patient ' . $patient->un_patient_id . ' from the archives';

        $this->load->model('Login_model');
        $this->Login_model->user_activity($user_id, $user_type, $user_activity);

        $this->Admin_model->restore_patient($id);
        $this->Admin_model->add_activity($activity);
        $this->session->set_flashdata('message', 'rstr_success');
        redirect('Admin_archives');
    }

    public function dd($data)
    {
        echo "<pre>";
        die(var_dump($data));
        echo "</pre>";
    }
}
