<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_schedule extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
		$this->load->helper('url', 'form');
		$this->load->library(['form_validation', 'session', 'pagination']);
		$this->load->model('Admin_schedule_model', 'schedModel');
		$this->load->database();
		
	}

	public function index($year=FALSE, $month=FALSE) { //index
		//Display list of Doctors
		$query = $this->db->get("schedule"); 
        $data['doctors'] = $query->result();
		
		$data['user_role'] = $this->session->userdata('role');

		//Get Year in DB
		$get_year_db = "SELECT * FROM schedule WHERE year(date)";
		$data['yeardb'] = $this->db->query($get_year_db);
		
		//Display Calendar
		if ($this->uri->segment(3) == FALSE) {
            $year = date('Y');
        } else {
            $year = $this->uri->segment(3);
        }

		$data['year'] = $year; //current year

        if ($this->uri->segment(4) == FALSE) {
            $month = date('m');
        } else {
            $month = $this->uri->segment(4);
        }

        $data['month'] = $month; //current month

		$prefs = array(
			'start_day' => 'sunday',
			'month_type' => 'long',
			'day_type' => 'short',
			'show_other_days' => TRUE,
			'show_next_prev'=>TRUE,
			'next_prev_url'=>base_url().'Admin_schedule/index'
		);
		//template for calendar
		$prefs['template'] = '

        {table_open}<table class="calTable" border="0" cellpadding="0" cellspacing="0" >{/table_open}

        {heading_row_start}<tr>{/heading_row_start}

        {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
        {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
        {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

        {heading_row_end}</tr>{/heading_row_end}

        {week_row_start}<tr class="trWeek">{/week_row_start}
        {week_day_cell}<td>{week_day}</td>{/week_day_cell}
        {week_row_end}</tr>{/week_row_end}

        {cal_row_start}<tr class="trDayrow">{/cal_row_start}
        {cal_cell_start}<td class="tdDaycell" >{/cal_cell_start}
        {cal_cell_start_today}<td class="tdToday">{/cal_cell_start_today}
        {cal_cell_start_other}<td class="other-month otherDays">{/cal_cell_start_other}

        {cal_cell_content}<a href="{content}">{day}</a>{/cal_cell_content}
        {cal_cell_content_today}<div class="highlight"><a href="{content}">{day}</a></div>{/cal_cell_content_today}

        {cal_cell_no_content}{day}{/cal_cell_no_content}
        {cal_cell_no_content_today}<div class="highlight">{day}</div>{/cal_cell_no_content_today}

        {cal_cell_blank}&nbsp;{/cal_cell_blank}

        {cal_cell_other}{day}{/cal_cel_other}

        {cal_cell_end}</td>{/cal_cell_end}
        {cal_cell_end_today}</td>{/cal_cell_end_today}
        {cal_cell_end_other}</td>{/cal_cell_end_other}
        {cal_row_end}</tr>{/cal_row_end}

        {table_close}</table>{/table_close}
		';
		
		$this->load->library('calendar', $prefs);
		// $data = $this->get_calendar_data($year, $month);
		$data['calendar'] = $this->calendar->generate($year, $month, $data);

		
		
		
		
		// Display views
		$data['title'] = 'Schedule';
		$this->load->view('include-admin/dashboard-header', $data);
        $this->load->view('include-admin/dashboard-navbar', $data);
		$this->load->view('admin-views/schedule-view', $data);
		$this->load->view('include-admin/dashboard-scripts');
		$this->load->view('schedule/schedule-scripts');
	}


	// public function get_calendar_data($year, $month) {

    //     $query = $this->db->select('date, doctor_name')->from('schedule')->like('date', "$year-$month", 'after')->get();
	// 	$cal_data = array();
	// 	foreach ($query->result() as $row) {
    //         $calendar_date = date("Y-m-j", strtotime($row->date)); // to remove leading zero from day format
	// 		$cal_data[substr($calendar_date, 8,2)] = $row->doctor_name;
	// 	}
		
	// 	return $cal_data;
    // }

	public function addSchedule() {
		//Form Validation
		$this->form_validation->set_rules('doctor_name', 'Doctor Name', 'required', array(
            'required' => 'Please enter your %s.'
        ));
		$this->form_validation->set_rules('specialization', 'Specialization', 'required|regex_match[/^([a-z ])+$/i]', array(
            'required' => 'Please enter your %s.'
        ));
		$this->form_validation->set_rules('date', 'Date', 'required', array(
            'required' => 'Please enter your %s.'
        ));
		$this->form_validation->set_rules('start_time', 'Time', 'required', array(
            'required' => 'Please enter your %s.'
        ));
		$this->form_validation->set_rules('end_time', 'Time', 'required', array(
            'required' => 'Please enter your %s.'
        ));

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		}
		else {
			$schedData = array( 
            'doctor_name' => $this->input->post('doctor_name'), 
            'specialization' => $this->input->post('specialization'),
			'date' => $this->input->post('date'),
			'start_time' => $this->input->post('start_time'),
			'end_time' => $this->input->post('end_time')
        	);
			$this->schedModel->insertSchedule($schedData);
			redirect('Admin_schedule');
			// echo "<script type='text/javascript'>alert('Schedule Added Succesfully!');window.location = ('Admin_schedule') </script>";
		}

		

		// $this->load->model('Admin_schedule_model', 'schedModel');
		// $this->schedModel->insertSchedule($data);
		// echo "<script type='text/javascript'>alert('Schedule Added Succesfully!');window.location = ('Admin_schedule/schedule') </script>";
	}

}