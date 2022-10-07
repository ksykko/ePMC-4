<?php

class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        // initializes database connection
        $this->load->database();
    }

    var $table = "patient_record";
    var $select_column = array("patient_id", "first_name", "middle_name", "last_name", "last_checkup");
    var $order_column = array("patient_id", "first_name", "middle_name", "last_name", "last_checkup", null);
    function make_query()
    {
        $this->db->select($this->select_column);
        $this->db->from($this->table);
        if (isset($_POST["search"]["value"])) {
            $this->db->like("first_name", $_POST["search"]["value"]);
            $this->db->or_like("last_name", $_POST["search"]["value"]);
        }
        if (isset($_POST["order"])) {
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('id', 'DESC');
        }
    }
    function make_datatables()
    {
        $this->make_query();
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    function get_filtered_data()
    {
        $this->make_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function get_all_data()
    {
        $this->db->select("*");
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }


    // for pagination
    public function get_patient_table($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->order_by('patient_id', 'DESC');
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

    public function delete_patient($id)
    { // delete patient based on patient_id ($id = primary key)
        $this->db->delete('patient_record', ['patient_id' => $id]);
    }

    public function add_patient($info)
    { // add patient record
        $this->db->insert('patient_record', $info);
    }

    // for inventory pagination
    public function get_inventory_table($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->order_by('item_id');
        return $this->db->get('inventory')->result();
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
}
