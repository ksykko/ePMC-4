<?php

class Users_model extends CI_Model {
    public function __construct() {
        parent :: __construct();
        
        $this->load->database();
    }

    public function get_user_table($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->order_by('id', 'ASC');
        return $this->db->get('tbl_admin')->result();
    }

    public function get_user_row($id) {
        return $this->db->get_where('tbl_admin', ['admin_id' => $id])->row();
    }

    public function get_user_count() {
        return $this->db->count_all('tbl_admin');
    }

    public function update_user_settings($id, $info) {
        $this->db->update('tbl_admin', $info, ['admin_id' => $id]);
    }

    public function update_user($id, $info) {
        $this->db->update('tbl_admin', $info, ['admin_id' => $id]);
    }

    public function delete_user($id) {
        $this->db->delete('tbl_admin', ['admin_id' => $id]);
    }
    
}

?>