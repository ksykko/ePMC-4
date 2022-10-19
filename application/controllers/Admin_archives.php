<?php 

class Admin_archives extends CI_Controller {
    public function __construct(){
        parent::__construct();


        $this->load->helper(['url', 'form', 'date', 'string']);
        $this->load->library(['form_validation', 'session', 'pagination']);
        $this->load->model('Admin_model');
        
    }

    public function index()
    {
        if ($this->session->userdata('logged_in')) { //if logged in

            $id = $this->session->userdata('admin_id');

            $data['title'] = 'Admin - Archives | ePMC';
            $data['patient'] = $this->Admin_model->get_arc_patient_row($id);
            $data['patients'] = $this->Admin_model->get_arc_patient_table();


            $this->load->view('include-admin/dashboard-header', $data);
            $this->load->view('include-admin/dashboard-navbar', $data); // admin dashboard not yet done
            $this->load->view('admin-views/admin-archives-view', $data); //recent sample
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

            $no++;
            // $editId = 'edit-patient-' . $patient->patient_id;
            $row = array();
            $row[] = $no;
            $row[] = $patient->first_name . ' ' . $patient->middle_name . ' ' . $patient->last_name;
            $row[] = $patient->last_accessed;
            $row[] = '
                <td class="text-center" colspan="1"> 
                    <button class="btn btn-sm btn-info mx-2" type="button" data-bs-toggle="modal" data-bs-target="#restore-patient-' . $patient->patient_id . '"><i class="fas fa-undo-alt"></i>Restore</button>
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
        $last_accessed = date('Y-m-d H:i:s');

        $this->db->update('arc_patient_record', ['last_accessed' => $last_accessed], ['patient_id' => $id]);
        $this->db->insert('patient_record', $this->Admin_model->get_arc_patient_row($id));
        $this->db->insert('patient_details', $this->Admin_model->get_arc_patient_details_row($id));
        $this->db->insert('patient_diagnosis', $this->Admin_model->get_arc_patient_diagnosis_row($id));
        $this->db->insert('patient_lab_reports', $this->Admin_model->get_arc_patient_lab_reports_row($id));
        $this->db->insert('patient_treatment_plan', $this->Admin_model->get_arc_patient_treatment_plan_row($id));

        $this->db->delete('arc_patient_record', ['patient_id' => $id]);
        $this->db->delete('arc_patient_details', ['patient_id' => $id]);
        $this->db->delete('arc_patient_diagnosis', ['patient_id' => $id]);
        $this->db->delete('arc_patient_lab_reports', ['patient_id' => $id]);
        $this->db->delete('arc_patient_treatment_plan', ['patient_id' => $id]);
        redirect('Admin_archives');
    }
}



?>