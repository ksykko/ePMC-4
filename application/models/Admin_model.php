<?php

class Admin_model extends CI_Model {
    public function __construct() {
        parent::__construct();

        // initializes database connection
        $this->load->database();
    }

    // for pagination
    public function get_patient_table($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->order_by('patient_id', 'DESC');
        return $this->db->get('patient_record')->result();
    }

    // get total number of patients
    public function get_patient_count() { 
        return $this->db->count_all('patient_record');
    }

    // get patient row based on patient_id ($id = primary key)
    public function get_patient_row($id) { 
        return $this->db->get_where('patient_record', ['patient_id' => $id])->row();
    }

    public function update_patient($id, $info) { // update patient info based on patient_id ($id = primary key)
        $this->db->update('patient_record', $info, ['patient_id' => $id]);
    }

    public function delete_patient($id) { // delete patient based on patient_id ($id = primary key)
        $this->db->delete('patient_record', ['patient_id' => $id]);
    }

    public function add_patient($info) { // add patient record
        $this->db->insert('patient_record', $info);
    }

    // for inventory pagination
    public function get_inventory_table($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->order_by('item_id');
        return $this->db->get('inventory')->result();
    }

    // get total number items in the inventory
    public function get_inventory_count() { 
        return $this->db->count_all('inventory');
    }

    // get patient row based on patient_id ($id = primary key)
    public function get_inventory_row($id) { 
        return $this->db->get_where('inventory', ['item_id' => $id])->row();
    }

    public function update_product($id, $info) { // update patient info based on patient_id ($id = primary key)
        $this->db->update('inventory', $info, ['item_id' => $id]);
    }

    public function delete_product($id) { // delete patient based on patient_id ($id = primary key)
        $this->db->delete('inventory', ['item_id' => $id]);
    }

    public function add_product($info) { // add patient record
        $this->db->insert('inventory', $info);
    }
}


?>