<?php

class Admin_schedule_model extends CI_Model {
    public function insertSchedule($data) {
        return $this->db->insert('schedule', $data);
    }

    public function fetchSchedule() {
        $this->db->order_by('id');
        return $this->db->get('schedule');
    }
}

?>