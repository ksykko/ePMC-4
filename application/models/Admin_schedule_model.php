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

    public function get_sunday_sched() {
        return $this->db->order_by('start_time', 'end_time')->get_where('schedule', ['sun' => 'Sun'])->result();
    }

    public function get_monday_sched() {
        return $this->db->order_by('start_time', 'end_time')->get_where('schedule', ['mon' => 'Mon'])->result();
    }

    public function get_tuesday_sched() {
        return $this->db->order_by('start_time', 'end_time')->get_where('schedule', ['tue' => 'Tue'])->result();
    }

    public function get_wednesday_sched() {
        return $this->db->order_by('start_time', 'end_time')->get_where('schedule', ['wed' => 'Wed'])->result();
    }

    public function get_thursday_sched() {
        return $this->db->order_by('start_time', 'end_time')->get_where('schedule', ['thurs' => 'Thurs'])->result();
    }

    public function get_friday_sched() {
        return $this->db->order_by('start_time', 'end_time')->get_where('schedule', ['fri' => 'Fri'])->result();
    }

    public function get_saturday_sched() {
        return $this->db->order_by('start_time', 'end_time')->get_where('schedule', ['sat' => 'Sat'])->result();
    }
}

?>