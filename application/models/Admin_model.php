<?php

class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        // initializes database connection
        $this->load->database();
    }

    // for pagination
    public function get_patient_table()
    {
        return $this->db->get('patient_record')->result();
    }

    // datatables
    public function get_patient_tbl()
    {
        return $this->db->get('patient_record');
    }

    // get total number of patients
    public function get_patient_count()
    {
        return $this->db->count_all('patient_record');
    }

    // get patient row based on patient_id ($id = primary key)
    public function get_patient_row($id)
    {
        return $this->db->get_where('patient_record', ['patient_id' => $id])->row();
    }

    public function update_patient($id, $info)
    { // update patient info based on patient_id ($id = primary key)
        $this->db->update('patient_record', $info, ['patient_id' => $id]);
    }

    public function update_avatar($id, $avatar)
    { // update patient avatar based on patient_id ($id = primary key)
        $this->db->update('patient_record', $avatar, ['patient_id' => $id]);
    }

    public function delete_patient($id)
    { // delete patient based on patient_id ($id = primary key)
        $this->db->delete('patient_record', ['patient_id' => $id]);
    }

    public function add_patient($info)
    { // add patient record
        $this->db->insert('patient_record', $info);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }




    // for inventory pagination
    public function get_inventory_table()
    {
        return $this->db->get('inventory')->result();
    }

    public function get_inventory_tbl()
    {
        return $this->db->get('inventory');
    }

    // get total number items in the inventory
    public function get_inventory_count()
    {
        return $this->db->count_all('inventory');
    }

    // get stock in and stock out
    public function get_inventory_table_contents()
    {
        $this->db->select("stock_in, stock_out");
        $this->db->from('inventory');
        $query = $this->db->get();
        return $query->result();
    }

    // get product row based on item id ($id = primary key)
    public function get_inventory_row($id)
    {
        return $this->db->get_where('inventory', ['item_id' => $id])->row();
    }

    public function update_product($id, $info)
    { // update product info based on item_id ($id = primary key)
        $this->db->update('inventory', $info, ['item_id' => $id]);
    }

    public function delete_product($id)
    { // delete product based on patient_id ($id = primary key)
        $this->db->delete('inventory', ['item_id' => $id]);
    }

    public function add_product($info)
    { // add patient record
        $this->db->insert('inventory', $info);
    }

    // for user accounts pagination
    public function get_useracc_table($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->order_by('user_id', 'DESC');
        return $this->db->get('user_accounts')->result();
    }

    public function get_nUser_count()
    {   
        $currentDate = "'".date('Y-m-d')."'";
        $sql = "SELECT * FROM `patient_record` WHERE DATE(date_created) = $currentDate;";
        return $this->db->query($sql)->num_rows();
    }


    public function get_useracc_count()
    {
        return $this->db->count_all('user_accounts');
    }

    // get patient row based on patient_id ($id = primary key)
    public function get_useracc_row($id)
    {
        return $this->db->get_where('user_accounts', ['user_id' => $id])->row();
    }

    public function add_useracc($info)
    { // add patient record
        $this->db->insert('user_accounts', $info);
    }

    public function delete_useracc($id)
    { // delete useracc based on user_id ($id = primary key)
        $this->db->delete('user_accounts', ['user_id' => $id]);
    }











    // START OF patient_details table
    public function add_patient_details($info)
    {
        $this->db->insert('patient_details', $info);
    }

    public function update_patient_details($id, $info)
    {
        $this->db->update('patient_details', $info, ['patient_id' => $id]);
    }

    // END OF patient_details table

    // START OF patient_diagnosis table

    public function add_patient_diagnosis($info)
    {
        $this->db->insert('patient_diagnosis', $info);
    }

    // END OF patient_diagnosis table


    // START OF patient_lab_reports table

    public function add_patient_lab_reports($info)
    {
        $this->db->insert('patient_lab_reports', $info);
    }
    
    // END OF patient_lab_reports table



}
