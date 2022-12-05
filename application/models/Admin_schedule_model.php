<?php

class Admin_schedule_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();

        // initializes database connection
        $this->load->database();
    }
    // public function insertSchedule($data) {
    //     return $this->db->insert('schedule', $data);
    // }

    public function get_unique_docnames() {
        $this->db->select('doctor_name');
        $this->db->distinct();
        $this->db->from('schedule');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_schedule_tbl($id) {
        return $this->db->get_where('schedule', ['schedule_id' => $id]);
    }

    public function get_schedule_table()
    {
        return $this->db->get('schedule')->result();
    }

    // public function delete_schedule($id) {
    //     return $this->db->delete('schedule', ['schedule_id' => $id]);
    // }

    // public function update_schedule($id, $info) {     
    //     return $this->db->update('schedule', $info, ['schedule_id' => $id]);
    // }

    public function get_schedule_row($id)
    {
        return $this->db->get_where('schedule', ['schedule_id' => $id])->row();
    }

    function fetch_all_event(){
        $this->db->order_by('schedule_id');
        return $this->db->get('schedule');
    }
    
    function insert_event($data){
        $this->db->insert('schedule', $data);
    }

    function insert_event_patient($data){
        $this->db->insert('patient_schedule', $data);
    }
    
    function update_event($data, $id){
        $this->db->where('schedule_id', $id);
        $this->db->update('schedule', $data);
    }
    
    function delete_event($id){
        $this->db->where('schedule_id', $id);
        $this->db->delete('schedule');
    }

    function delete_event_patient($id){
        $this->db->where('schedule_id', $id);
        $this->db->delete('patient_schedule');
    }

    //FOR MOBILE
    //get schedule data 
    public function get_schedule()
    {
        $this->db->select('schedule_id, doctor_name, specialization, start_date, end_date');
        $this->db->from('schedule');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_schedData()
    {
        $this->db->select('schedule_id, user_id, doctor_name, specialization, start_date, end_date');
        $this->db->from('schedule');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_startDate() {
        $this->db->select('start_date');
        $this->db->from('schedule');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_rowstartDate($start_date) {
        $query = $this->db->get_where('schedule', ['start_date' => $start_date]);
        return $query->row();;
    
    }
}

?>