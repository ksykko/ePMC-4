<?php

class Patient_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        // initializes database connection
        $this->load->database();
    }

    // get patient row based on patient_id ($id = primary key)
    public function get_patient_row($id)
    {
        return $this->db->get_where('patient_record', ['patient_id' => $id])->row();
    }

    public function update_patient($id, $info)
    { // update patient info based on patient_id ($id = primary key)
        $this->db->update('patient_record', $info, ['patient_id' => $id]);
    }

    public function update_avatar($id, $avatar)
    { // update patient avatar based on patient_id ($id = primary key)
        $this->db->update('patient_record', $avatar, ['patient_id' => $id]);
    }
    
    public function get_patient_lab_reports_row($id)
    {
        return $this->db->get_where('patient_lab_reports', ['patient_id' => $id])->row();
    }
    
}
