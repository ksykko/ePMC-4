<?php

class Admin_schedule_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();

        // initializes database connection
        $this->load->database();
    }
    public function insertSchedule($data) {
        return $this->db->insert('schedule', $data);
    }

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

    public function delete_schedule($id) {
        return $this->db->delete('schedule', ['schedule_id' => $id]);
    }

    public function update_schedule($id, $info) {     
        return $this->db->update('schedule', $info, ['schedule_id' => $id]);
    }

    public function get_schedule_row($id)
    {
        return $this->db->get_where('schedule', ['schedule_id' => $id])->row();
    }

    //FOR MOBILE
    //get schedule data 
    public function get_schedule()
    {
        $this->db->select('schedule_id, doctor_name, specialization, start_time, end_time, day');
        $this->db->from('schedule');
        $query = $this->db->get();
        return $query->result();
    }
}

?>