<?php

class Admin_appointment_reqs extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url', 'form');
        $this->load->helper('url');
		$this->load->library(['form_validation', 'session', 'pagination']);
        $this->load->model('Admin_model');
        $this->load->model('Patient_model');
        $this->load->library("pagination");
    }

    public function index()
    {
        if ($this->session->userdata('logged_in')) { //if logged in

            $id = $this->session->userdata('admin_id');

            $data['user_role'] = $this->session->userdata('role');
            $data['specialization'] = $this->session->userdata('specialization');

            if ($data['user_role'] == 'Admin') {
                $data['title'] = 'Admin - Schedule | ePMC';
            } else {
                $data['title'] = 'Doctor - Schedule | ePMC';
            }
            
            $data['specialization'] = $this->session->userdata('specialization');
            $data['schedule'] = $this->Patient_model->get_sched_row($id);
            $data['schedules'] = $this->Patient_model->get_sched_appointment();

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
            $schedule->status;
            $no++;
            // $editId = 'edit-patient-' . $patient->patient_id;
            $row = array();
            $row[] = $schedule->un_patient_id;
            $row[] = $schedule->patient_name;
            $row[] = 'Dr. ' . $schedule->doctor_name;
            $row[] = $schedule->date;
            $row[] = $schedule->status;
            $row[] = '
            <div class="d-md-flex justify-content-md-center">
                <button class="btn btn-sm btn-light" type="button" data-bs-toggle="modal" data-bs-target="#edit-appointment-' . $schedule->schedule_id . '">Edit</button>
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
        echo json_encode($output);
    }

    public function update_appointment($id)
    {   
        $schedule = $this->Patient_model->get_sched_row($id);

        
        $this->form_validation->set_rules('status', 'Status', 'required', 
            array('required' => 'Please select a status'));
        
        if ($this->form_validation->run() == FALSE)
        {   
            $this->session->set_flashdata('message','update_failed');
            $this->index();
        }
        else
        {   
            echo 'tamaaaaa';
            $updateAppointment = $this->input->post('editAppointment');
            if ($this->input->post('status') == 'Confirmed'){
                $color = '008000';
            } 
            elseif ($this->input->post('status') == 'Cancelled'){
                $color = 'ff0000';
            }
            else {
                $color = 'b8a70f';
            }
            if (isset($updateAppointment))
            {
                $info = array(
                    'status' => $this->input->post('status'),
                    'color' => $color
                );
            }

            $activity = array(
                'activity' => 'A patient has been restored from the archives',
                'module' => 'Archives',
                'date_created' => date('Y-m-d H:i:s')
            );

            // insert a row in user_activity table
            $user_id = $this->session->userdata('id');
            $user_type = $this->session->userdata('role');
            $user_activity = 'Updated ' . $schedule->un_patient_id . ' appointment status';

            $this->load->model('Login_model');
            $this->Login_model->user_activity($user_id, $user_type, $user_activity);

            
            $this->Admin_model->add_activity($activity);
            $this->session->set_flashdata('message', 'success');
            $this->Patient_model->update_appointment_db($id, $info);
            redirect('Admin_appointment_reqs/index');
        }

    }

    public function dd($data)
    {
        echo "<pre>";
        die(var_dump($data));
        echo "</pre>";
    }
}



