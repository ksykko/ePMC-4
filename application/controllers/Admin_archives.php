<?php

class Admin_archives extends CI_Controller
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

            $id = $this->session->userdata('admin_id');

            $data['user_role'] = $this->session->userdata('role');

            if ($data['user_role'] == 'Admin') {
                $data['title'] = 'Admin - Archived Records | ePMC';
            } else {
                $data['title'] = 'Doctor - Archived Records | ePMC';
            }

            $data['patient'] = $this->Admin_model->get_arc_patient_row($id);
            $data['specialization'] = $this->session->userdata('specialization');
            $data['patients'] = $this->Admin_model->get_arc_patient_table();


            $this->load->view('include-admin/dashboard-header', $data);
            $this->load->view('include-admin/dashboard-navbar', $data);
            $this->load->view('admin-views/admin-archives-view', $data);
            $this->load->view('include-admin/archives-scripts');
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

        $patients = $this->Admin_model->get_arc_patient_record();

        $data = array();
        $no = 0;
        foreach ($patients->result() as $patient) {

            $sql_last_accessed = mysql_to_unix($patient->last_accessed);
            $last_accessed = unix_to_human($sql_last_accessed, FALSE);

            $no++;
            // $editId = 'edit-patient-' . $patient->patient_id;
            $row = array();
            $row[] = $patient->un_patient_id;
            $row[] = '
        
                <img class="rounded-circle me-2" width="50" height="50" src="' . base_url('/assets/img/profile-avatars/') . $patient->avatar . '" /> ' . $patient->first_name . ' ' . $patient->middle_name . ' ' . $patient->last_name . '

            ';
            $row[] = $last_accessed;
            $row[] = '
                <td class="text-center" colspan="1"> 
                    <button class="btn btn-sm btn-info mx-2" type="button" data-bs-toggle="modal" data-bs-target="#restore-patient-' . $patient->patient_id . '"><i class="fas me-xl-2 fa-undo-alt"></i><span class="d-none d-xl-inline-block">Restore</span></button>
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
}
