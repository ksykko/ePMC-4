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

    public function get_patient_unique_id($id)
    {
        return $this->db->get_where('patient_schedule', ['un_patient_id' => $id])->row();
    }

    public function get_patient_sched_row($id)
    {
        return $this->db->get_where('patient_schedule', ['un_patient_id' => $id])->row();
    }

    public function get_patient_sched($id)
    {
        return $this->db->get_where('patient_schedule', ['un_patient_id' => $id])->result();
    }

    public function update_patient($id, $info)
    { // update patient info based on patient_id ($id = primary key)
        $this->db->update('patient_record', $info, ['patient_id' => $id]);
    }

    public function update_avatar($id, $avatar)
    { // update patient avatar based on patient_id ($id = primary key)
        $this->db->update('patient_record', $avatar, ['patient_id' => $id]);
    }
    
    public function get_patient_details_row($id)
    {
        return $this->db->get_where('patient_details', ['patient_id' => $id])->row();
    }

    public function get_patient_diagnosis_tbl()
    {
        return $this->db->get('patient_diagnosis');
    }

    public function get_patient_diagnosis_table()
    {
        return $this->db->get('patient_diagnosis')->result();
    }
    
    // public function get_feedback_row($id)
    // {
    //     return $this->db->get_where('clinic_feedback', ['patient_id' => $id])->row();
    // }

    // public function add_feedback($info)
    // { // add patient record=
    //     $this->db->insert('clinic_feedback', $info);

    // }

    // public function update_feedback($id, $info)
    // { // add patient record
    //     $this->db->update('clinic_feedback', $info, ['feedback_id' => $id]);
    // }

    // public function isExists($key,$valkey,$table)
    // {
    //     $this->db->from($table);
    //     $this->db->where($key, $valkey); // WHERE column_name = 'value'
    //     $num = $this->db->count_all_results();
    //     if($num == 0)
    //     {
    //         return FALSE;
    //     }else{
    //         return TRUE;
    //     }
    // }

    // public function isExistsDoctor($key,$valkey,$key2,$valkey2,$table)
    // {
    //     $this->db->from($table);
    //     $this->db->where($key, $valkey); // WHERE column_name = 'value'
    //     $this->db->where($key2, $valkey2); // WHERE column_name = 'value'
    //     $num = $this->db->count_all_results();
    //     if($num == 0)
    //     {
    //         return TRUE;
    //     }else{
    //         return FALSE;
    //     }
    // }

    // public function add_doc_feedback($info)
    // { // add patient record=
    //     $this->db->insert('doctor_feedback', $info);

    // }

    // public function update_doc_feedback($id, $info)
    // { // add patient record
    //     $this->db->update('doctor_feedback', $info, ['user_id' => $id]);
    // }

}
