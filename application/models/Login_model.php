<?php

class Login_model extends CI_Model {
    public function __construct() {
        parent :: __construct();
        
        $this->load->database();
    }

    public function login($email, $pass) {
        $query = $this->db->get_where('tbl_admin', ['email' => $email, 'password' => $pass]);
        return $query->row();
    }
    
}

?>