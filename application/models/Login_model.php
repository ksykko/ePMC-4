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
        $query3 = $this->db->get_where('user_accounts', ['email' => $email, 'password' => $pass]);
        $query4 = $this->db->get_where('patient_record', ['un_patient_id' => $email, 'password' => $pass]);
        //$query4 = $this->db->get_where('patient_record', ['cell_no' => $email, 'password' => $pass]);

        if ($query1->num_rows() > 0) {
            return $query1->row();
        } else if ($query2->num_rows() > 0) {
            return $query2->row();
        } else if ($query3->num_rows() > 0) {
            return $query3->row();
        } else if ($query4->num_rows() > 0) {
            return $query4->row();
        } else {
            return false;
        }
    }
}

?>
