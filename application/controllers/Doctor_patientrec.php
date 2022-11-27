<?php
class Doctor_patientrec extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(['url', 'form', 'date', 'string']);
        $this->load->library(['form_validation', 'session', 'pagination']);
        $this->load->model('Admin_model');
        $this->load->model('Doctors_model');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in')) { //if logged in

            $id = $this->session->userdata('user_id');

            $data['title'] = 'Doctor - Patient Records | ePMC';
            $data['patient'] = $this->Admin_model->get_patient_row($id);
            $data['patients'] = $this->Admin_model->get_patient_table();
            $data['user_role'] = $this->session->userdata('role');
            $data['specialization'] = $this->session->userdata('specialization');

            $this->load->view('include-admin/dashboard-header', $data);
            $this->load->view('include-admin/dashboard-navbar', $data); // admin dashboard not yet done
            $this->load->view('doctor-views/doctor-patientrec', $data); //recent sample
            $this->load->view('include-admin/patientrec-scripts');
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

        $patients = $this->Admin_model->get_patient_tbl();

        $data = array();
        $no = 0;
        foreach ($patients->result() as $patient) {

            $no++;
            $dt = new DateTime($patient->date_created);
            $date_added = $dt->format('Y-m-d');

            $row = array();
      
            $row[] = '
            
                <img class="rounded-circle me-2" width="50" height="50" src="' . base_url('/assets/img/profile-avatars/') . $patient->avatar . '" /> '. $patient->first_name . ' ' . $patient->middle_name . ' ' . $patient->last_name .'
        
            ';
            $row[] = '<td class="align-middle">'. $date_added .'</td>' ;
            $row[] = $patient->type;
            $row[] = '
                <td class="text-center" colspan="1"> 
                    <a class="btn btn-sm btn-light mx-2" href=" ' . base_url("Admin_patientrec/view_patient/") . $patient->patient_id . ' " type="button">View</a>
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

    public function diag_dt($id)
    {
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));


        $diagnoses = $this->Admin_model->get_diagnosis_tbl($id);

        $data = array();

        foreach ($diagnoses->result() as $diagnosis) {

            if ($diagnosis->p_diag_date == null || $diagnosis->p_diag_date == '0000-00-00 00:00:00') {
                continue;
            }

            $diag_date = unix_to_human(mysql_to_unix($diagnosis->p_diag_date));

            $row = array();
            $row[] = $diag_date;
            $row[] = $diagnosis->p_recent_diagnosis;
            $row[] = $diagnosis->p_doctor;
            $row[] = '
                <td class="text-center" colspan="1">
                    <a class="btn btn-sm btn-light mx-2" type="button" data-bs-toggle="modal" data-bs-target="#view-diagnosis-' . $diagnosis->id . '">View</a>
                    <button class="btn btn-sm btn-light" type="button" data-bs-toggle="modal" data-bs-target="#edit-diagnosis-' . $diagnosis->id . '">Edit</button>
                    <button class="btn btn-sm btn-link shadow-none" type="button" data-bs-toggle="modal" data-bs-target="#delete-diagnosis-' . $diagnosis->id . '"><i class="far fa-trash-alt"></i></button>
                </td>
            ';

            $data[] = $row;
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $diagnoses->num_rows(),
            "recordsFiltered" => $diagnoses->num_rows(),
            "data" => $data
        );
        echo json_encode($output);
    }

    public function treatment_dt($id)
    {
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $treatments = $this->Admin_model->get_treatment_tbl($id);
        $data = array();

        foreach ($treatments->result() as $treatment) {

            if ($treatment->p_diagnosis == '' || $treatment->p_diagnosis == null) {
                continue;
            }

            $row = array();
            $row[] = $treatment->p_diagnosis;
            $row[] = $treatment->p_treatment_plan;
            $row[] = '
            <td class="text-center" colspan="1">
                <a class="btn btn-sm btn-light mx-2" type="button" data-bs-toggle="modal" data-bs-target="#view-treatment-' . $treatment->id . '">View</a>
                <button class="btn btn-sm btn-light" type="button" data-bs-toggle="modal" data-bs-target="#edit-treatment-' . $treatment->id . '">Edit</button>
                <button class="btn btn-sm btn-link shadow-none" type="button" data-bs-toggle="modal" data-bs-target="#delete-treatment-' . $treatment->id . '"><i class="far fa-trash-alt"></i></button>
            </td>
        ';

            $data[] = $row;
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $treatments->num_rows(),
            "recordsFiltered" => $treatments->num_rows(),
            "data" => $data
        );
        echo json_encode($output);
    }
}
