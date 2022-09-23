<?php

class Login_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    public function login($email, $pass)
    {
        $query = $this->db->get_where('tbl_admin', ['email' => $email, 'password' => $pass]);
        return $query->row();

        // $query = $this->db->select('ta.*', 'pr.*')
        //     ->from('tbl_admin ta')
        //     ->join('patient_record pr', 'ta.admin_id = pr.patient_id')
        //     ->where('ta.email', $email)
        //     ->where('ta.password', $pass)
        //     ->get();
        // return $query->row();
    }
}

?>
