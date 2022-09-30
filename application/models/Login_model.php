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
        $query1 = $this->db->get_where('tbl_admin', ['email' => $email, 'password' => $pass]);
        $query2 = $this->db->get_where('patient_record', ['email' => $email, 'password' => $pass]);

        if ($query1->num_rows() > 0) {
            return $query1->row();
        } else if ($query2->num_rows() > 0) {
            return $query2->row();
        } else {
            return null;
        }
        //return $query->row();

        // $query = $this->db->select('ta.*', 'pr.*')
        //     ->from('tbl_admin ta')
        //     ->join('patient_record pr', 'ta.admin_id = pr.patient_id')
        //     ->where('ta.email', $email)
        //     ->where('ta.password', $pass)
        //     ->get();
        // return $query->row();

        // $this->db->select('tbl_admin.email', 'tbl_admin.password');
        // $this->db->from('tbl_admin');
        // $this->db->join('patient_record', 'tbl_admin.admin_id = patient_record.patient_id');
        // $this->db->where('tbl_admin.email', $email);
        // $this->db->where('tbl_admin.password', $pass);
        // $query = $this->db->get();
        // return $query->row();


    }
}

?>
