<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_schedule extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

        
		$this->load->helper('url', 'form');
        $this->load->helper('url');
		$this->load->library(['form_validation', 'session', 'pagination']);
		$this->load->model('Admin_schedule_model', 'schedModel');
		$this->load->model('Doctors_model');
		$this->load->model('Admin_model');
        $this->load->model('Patient_model');
		$this->load->database();
	}

	//schedule page
	public function index()
	{
		if ($this->session->userdata('logged_in')) {
			//Get doctors list from schedule table
			$data['doctors'] = $this->schedModel->get_unique_docnames();
			$data['user_un_id'] = $this->session->userdata('un_patient_id');

            $data['result'] = $this->Patient_model->get_patient_sched($data['user_un_id']);
            // $this->dd($data['result']);
			
            foreach ($data['result'] as $key => $value) {
                $data['data'][$key]['id'] = $value->schedule_id;
                $data['data'][$key]['title'] = $value->un_patient_id;
                $data['data'][$key]['start'] = $value->date;
                $data['data'][$key]['doctor_name'] = $value->doctor_name;
                $data['data'][$key]['patient_name'] = $value->patient_name;
                $data['data'][$key]['color'] = $value->color;
                $data['data'][$key]['status'] = $value->status;
            }
            
            // $this->dd($data['result']);

            $id = $this->session->userdata('id');
            $un_id = $this->session->userdata('un_patient_id');
            
            $data['user_role'] = $this->session->userdata('role');
            $data['user_age'] = $this->session->userdata('age');
            $data['user_birthday'] = $this->session->userdata('birth_date');
            $data['user_sex'] = $this->session->userdata('sex');
            $data['user_occupation'] = $this->session->userdata('occupation');
            $data['user_contact_no'] = $this->session->userdata('cell_no');
            $data['user_address'] = $this->session->userdata('address');

            $data['patient'] = $this->Patient_model->get_patient_row($id);
            $data['patient_sched'] = $this->Patient_model->get_patient_sched_row($un_id);
            // $data['patient_un_id'] = $this->Patient_model->get_patient_unique_id($un_id);

			if ($data['user_role'] == 'Admin') {
				$data['title'] = 'Admin - Schedule | ePMC';
			} elseif ($data['user_role'] == 'Doctor') {
				$data['title'] = 'Doctor - Schedule | ePMC';
			} else {
				$data['title'] = 'Patient - Schedule | ePMC';
			}
            
			//Get doctors list from user accounts
			$data['specialization'] = $this->session->userdata('specialization');
			$data['doctorname'] = $this->Doctors_model->get_all_doctors();
			$data['patientname'] = $this->Admin_model->get_patient_table();

			//Get Schedule Data
			$id = $this->session->userdata('schedule_id');
			$data['schedule'] = $this->schedModel->get_schedule_row($id);
			$data['schedules'] = $this->schedModel->get_schedule_table();
            // $this->dd($data['p_sched']);


        
            //$data['calendar'] = $this->calendar_week->generate();
			// Display views
			$this->load->view('include-admin/dashboard-header', $data);
			$this->load->view('include-admin/dashboard-navbar', $data);
			$this->load->view('patient-views/patient-schedule', $data);
			$this->load->view('include-admin/dashboard-scripts');
			$this->load->view('schedule/schedule-scripts');
		} else {
			redirect('Login/signin');
		}
	}

	// public function load(){

		
	// 	$event_data = $this->schedModel->fetch_all_event();
	// 	foreach($event_data->result_array() as $row){
	// 		$data[] = array(
	// 			'id' => $row['schedule_id'],
	// 			'title' => $row['title'],
	// 			'start' => $row['start_date'],
	// 			'end' => $row['end_date'],
	// 			'backgroundColor' => $row['color']
	// 		);
	// 	}
	// 	echo json_encode($data);
	// }

	function insert(){
        $un_id = $this->session->userdata('un_patient_id');
        $fname = $this->session->userdata('first_name'); 
        $mname = $this->session->userdata('middle_name'); 
        $lname = $this->session->userdata('last_name'); 

		$this->form_validation->set_rules('doctor_name', 'doctor', 'required', array(
			'required' => 'Choose a %s.'
		));
		$this->form_validation->set_rules('luisp', 'Date');

        $this->form_validation->set_rules('patient_name', 'Patient Name');

        $this->form_validation->set_rules('status', 'Status');
        $this->form_validation->set_rules('color', 'Color');


		// $
		// $this->form_validation->set_rules('days[]', 'day of the week', 'required', array(
		//     'required' => 'Choose at least one %s.'
		// ));

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('message', 'add_failed');
			$this->index();
		} else {
            
			$data = array(
				'un_patient_id' => $un_id,
                'patient_name' => $fname . " " . $mname . " " . $lname ,
				'doctor_name' => $this->input->post('doctor_name'),
				'date' => str_replace('/', '-',$this->input->post('luisp')) . str_replace('/', '-',$this->input->post('jaymiep')) . str_replace('/', '-',$this->input->post('miguelp')) . str_replace('/', '-',$this->input->post('jassh')) . str_replace('/', '-',$this->input->post('defaultdtp')) . ':00',
				'status' => 'Pending',
                'color' => 'b8a70f',
			);

            // echo var_dump($data);

			$this->schedModel->insert_event_patient($data);

			$user_id = $this->session->userdata('un_patient_id');
			$user_type = $this->session->userdata('role');
			$user_activity = 'Added a schedule';

			// $this->load->model('Login_model');

			// $this->Login_model->user_activity($user_id, $user_type, $user_activity);


			// $activity = array(
			// 	'activity' => 'A new schedule has been added in the schedules',
			// 	'module' => 'Schedule',
			// 	'date_created' => date('Y-m-d H:i:s')
			// );

			// $this->Admin_model->add_activity($activity);
			$this->session->set_flashdata('message', 'success');
            
			redirect('Patient_schedule');
		}
	}

	function update() {
		$this->form_validation->set_rules('date', 'start date', 'required', array(
			'required' => 'Choose the %s.'
		));

		

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('message', 'add_failed');
			$this->index();
		} else {

			$data = array(
				'date' => $this->input->post('date'),
				'status' => $this->input->post('color')
			);
			
			$this->schedModel->update_event($data, $this->input->post('id'));
            redirect('Patient_schedule');
		}
	}

	function delete() {

		// $activity = array(
		// 	'activity' => 'A schedule has been deleted in the list',
		// 	'module' => 'Schedule',
		// 	'date_created' => date('Y-m-d H:i:s')
		// );

		// insert a row in user_activity table
		// $user_id = $this->session->userdata('id');
		// $user_type = $this->session->userdata('role');
		// $user_activity = 'Deleted a schedule';

		// $this->load->model('Login_model');
		// $this->Login_model->user_activity($user_id, $user_type, $user_activity);

		// $this->Admin_model->add_activity($activity);
		$this->session->set_flashdata('message', 'dlt_success');
		
		$this->schedModel->delete_event_patient($this->input->post('id'));     
	}
	
    public function dd($data)
    {
        echo "<pre>";
        die(var_dump($data));
        echo "</pre>";
    }

}
