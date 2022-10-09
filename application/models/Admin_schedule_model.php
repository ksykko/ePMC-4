<?php

class Admin_schedule_model extends CI_Model {
    public function insertSchedule($data) {
        return $this->db->insert('schedule', $data);
    }

    // public function get_calendar_data($year, $month) {
	// 	$query = $this->db->select('date, doctor_name')->from('schedule')->like('date', "$year-$month", 'after')->get();
	// 	$cal_data = array();
	// 	foreach ($query->result() as $row) {
    //         $calendar_date = date("Y-m-j", strtotime($row->date)); // to remove leading zero from day format
	// 		$cal_data[substr($calendar_date, 8,2)] = $row->doctor_name;
	// 	}
		
	// 	return $cal_data;


        // $cell_data = array();

        // $query = $this->db->get('calendar');

        // if ($query->num_rows() > 0) {

        //     $row = $query->row();

        //     $this->db->select('*');
        //     $this->db->from('calendar');
        //     $this->db->where('year', $year);
        //     $this->db->where('month', $month);
        //     $this->db->where('day', $row->day);


        //     $query = $this->db->get();

        //     foreach ($query->result() as $result) {
        //         $cell_data[$result->day] = $result->data;
        //     }

        // return $cell_data;

        // }
        

	// }
}

?>