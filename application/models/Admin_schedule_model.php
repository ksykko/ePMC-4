<?php

class Admin_schedule_model extends CI_Model {
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
        $data = array($info => 'NULL');
        $this->db->where('schedule_id', $id);        
        $this->db->update('schedule', $data);

        $this->db->insert('schedule', $info);
        // return $this->db->delete('schedule', ['schedule_id' => $id]);
    }

    public function get_schedule_row($id)
    {
        return $this->db->get_where('schedule', ['schedule_id' => $id])->row();
    }
}

?>