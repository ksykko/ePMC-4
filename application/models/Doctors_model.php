<?php

class Doctors_model extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();

        // initializes database connection
        $this->load->database();
    }

    public function get_all_doctors()
    {
        return $this->db->get_where('user_accounts', ['role' => 'Doctor'])->result();
    }

}


?>