<?php

    class Appointment_model extends CI_Model {
        public function __construct() {
            parent::__construct();
    
            // initializes database connection
            $this->load->database();
        }

        //check if datetime exist
        public function get_patient_date($date) {
            $query = $this->db->get_where('appointment', ['appointment_date' => $date]);
            return $query->row();
        }

        //add appointment
        public function add_appointment($data) {
            $this->db->insert('appointment', $data);
            $insert_id = $this->db->insert_id();
            return $insert_id;
        }

        //get row by patient id
        public function get_patient_appointment($patientID) {
            $query = $this->db->get_where('appointment', ['patient_id' => $patientID]);
            return $query->result();
        }

        //get all appointment
        public function get_all_appointment() {
            $query = $this->db->get('appointment');
            return $query->result();
        }

        //update status 
        public function update_status($appointmentID, $response) {
            // $this->db->get_where('appointment', ['appointment_id' => $appointmentID]);
            // $this->db->update('status', $response);
            $this->db->update('appointment', $response, ['appointment_id' => $appointmentID]);
        }   

        //get row by appointment id
        public function get_row_appointment($appointmentID) {
            $query = $this->db->get_where('appointment', ['appointment_id' => $appointmentID]);
            return $query->row();
        }

        //delete appointment
        public function delete_appointment($appointmentID) {
            $this->db->delete('appointment', ['appointment_id' => $appointmentID]);
        }
        
    }

?>