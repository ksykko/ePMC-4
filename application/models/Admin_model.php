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

        // insert patient record to archive table
        $last_accessed = mdate('%Y-%m-%d %H:%i:%s', now());
        $this->db->update('arc_patient_record', ['last_accessed' => $last_accessed], ['patient_id' => $id]);
        $this->db->insert('arc_patient_record', $this->get_patient_row($id));
        $this->db->insert('arc_patient_details', $this->get_patient_details_row($id));

        // insert all patient diagnosis rows to archive table with same patient_id
        $diagnosis = $this->get_patient_diagnosis_result($id);
        foreach ($diagnosis as $row) {
            $this->db->insert('arc_patient_diagnosis', $row);
        }

        //$this->db->insert('arc_patient_diagnosis', $this->get_patient_diagnosis_row($id));
        $this->db->insert('arc_patient_lab_reports', $this->get_patient_lab_reports_row($id));

        $treatment = $this->get_patient_treatment_plan_result($id);
        foreach ($treatment as $row) {
            $this->db->insert('arc_patient_treatment_plan', $row);
        }

        // delete patient's avatar
        // $avatar = $this->get_patient_row($id)->avatar;
        // if ($avatar != 'default.png') {
        //     unlink(FCPATH . 'assets/img/profile-avatars/' . $avatar);
        // }

        $this->db->delete('patient_record', ['patient_id' => $id]);
        $this->db->delete('patient_details', ['patient_id' => $id]);
        $this->db->delete('patient_diagnosis', ['patient_id' => $id]);
        $this->db->delete('patient_lab_reports', ['patient_id' => $id]);
        $this->db->delete('patient_treatment_plan', ['patient_id' => $id]);
    }

    public function restore_patient($id)
    {
        $last_accessed = mdate('%Y-%m-%d %H:%i:%s', now());
        $this->db->update('arc_patient_record', ['last_accessed' => $last_accessed], ['patient_id' => $id]);
        $this->db->insert('patient_record', $this->Admin_model->get_arc_patient_row($id));
        $this->db->insert('patient_details', $this->Admin_model->get_arc_patient_details_row($id));

        // insert all patient diagnosis rows to archive table with same patient_id
        $diagnosis = $this->get_arc_patient_diagnosis_result($id);
        foreach ($diagnosis as $row) {
            $this->db->insert('patient_diagnosis', $row);
        }

        //$this->db->insert('patient_diagnosis', $this->Admin_model->get_arc_patient_diagnosis_row($id));
        $this->db->insert('patient_lab_reports', $this->Admin_model->get_arc_patient_lab_reports_row($id));

        $treatment = $this->get_arc_patient_treatment_plan_result($id);
        foreach ($treatment as $row) {
            $this->db->insert('patient_treatment_plan', $row);
        }

        $this->db->delete('arc_patient_record', ['patient_id' => $id]);
        $this->db->delete('arc_patient_details', ['patient_id' => $id]);
        $this->db->delete('arc_patient_diagnosis', ['patient_id' => $id]);
        $this->db->delete('arc_patient_lab_reports', ['patient_id' => $id]);
        $this->db->delete('arc_patient_treatment_plan', ['patient_id' => $id]);
    }

    public function add_patient($info)
    { // add patient record
        $this->db->insert('patient_record', $info);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function edit_patient_PI($id, $info)
    { // add patient personal info
        $this->db->update('patient_record', $info, ['patient_id' => $id]);
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
    public function get_useracc_table()
    {
        return $this->db->get('user_accounts')->result();
    }

    public function get_useracc_tbl()
    {
        return $this->db->get('user_accounts');
    }

    public function get_nUser_count()
    {
        $currentDate = "'" . date('Y-m-d') . "'";
        $sql = "SELECT * FROM `patient_record` WHERE DATE(date_created) = $currentDate;";
        return $this->db->query($sql)->num_rows();
        
    }


    public function get_useracc_count()
    {
        return $this->db->count_all('user_accounts');
    }





    // get user row based on user_id ($id = primary key)
    public function get_useracc_row($id)
    {
        return $this->db->get_where('user_accounts', ['user_id' => $id])->row();
    }

    public function get_admin_row($id)
    {
        return $this->db->get_where('tbl_admin', ['admin_id' => $id])->row();
    }






    public function add_useracc($info)
    { // add user account record
        $this->db->insert('user_accounts', $info);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function delete_useracc($id)
    { // delete useracc based on user_id ($id = primary key)
        $this->db->delete('user_accounts', ['user_id' => $id]);
    }

    public function edit_useracc($id, $info)
    { // edit user info based on item_id ($id = primary key)
        $this->db->update('user_accounts', $info, ['user_id' => $id]);
    }


    // START OF ARCHIVES
    public function get_arc_patient_table()
    {
        return $this->db->get('arc_patient_record')->result();
    }

    public function get_arc_patient_record()
    {
        return $this->db->get('arc_patient_record');
    }

    public function get_arc_patient_row($id)
    {
        return $this->db->get_where('arc_patient_record', ['patient_id' => $id])->row();
    }

    public function get_arc_patient_details_row($id)
    {
        return $this->db->get_where('arc_patient_details', ['patient_id' => $id])->row();
    }

    public function get_arc_patient_diagnosis_row($id)
    {
        return $this->db->get_where('arc_patient_diagnosis', ['patient_id' => $id])->row();
    }

    public function get_arc_patient_diagnosis_result($id)
    {
        // return all rows with the same patient_id
        return $this->db->get_where('arc_patient_diagnosis', ['patient_id' => $id])->result();
    }

    public function get_arc_patient_lab_reports_row($id)
    {
        return $this->db->get_where('arc_patient_lab_reports', ['patient_id' => $id])->row();
    }

    public function get_arc_patient_treatment_plan_row($id)
    {
        return $this->db->get_where('arc_patient_treatment_plan', ['patient_id' => $id])->row();
    }

    public function get_arc_patient_treatment_plan_result($id)
    {
        // return all rows with the same patient_id
        return $this->db->get_where('arc_patient_treatment_plan', ['patient_id' => $id])->result();
    }

    // END OF ARCHIVES


    // START OF patient_details table
    public function add_patient_details($info)
    {
        $this->db->insert('patient_details', $info);
    }

    public function get_patient_details_row($id)
    {
        return $this->db->get_where('patient_details', ['patient_id' => $id])->row();
    }


    public function update_patient_details($id, $info)
    {
        $this->db->update('patient_details', $info, ['patient_id' => $id]);
    }

    // END OF patient_details table

    // START OF patient_diagnosis table
    public function get_diagnosis_table()
    {
        return $this->db->get('patient_diagnosis')->result();
    }

    public function get_diagnosis_tbl($id)
    {
        return $this->db->get_where('patient_diagnosis', ['patient_id' => $id]);
        //return $this->db->get('patient_diagnosis');
    }

    public function add_patient_diagnosis($info)
    {
        $this->db->insert('patient_diagnosis', $info);
    }

    public function get_patient_diagnosis_row($id)
    {
        return $this->db->get_where('patient_diagnosis', ['patient_id' => $id])->row();
    }

    public function get_patient_diagnosis_result($id)
    {
        return $this->db->get_where('patient_diagnosis', ['patient_id' => $id])->result();
    }

    public function get_patient_diagnosis_resultArr($id)
    {
        return $this->db->get_where('patient_diagnosis', ['patient_id' => $id])->result_array();
    }

    public function update_patient_diagnosis($id, $info)
    {
        $this->db->update('patient_diagnosis', $info, ['patient_id' => $id]);
    }

    public function delete_patient_diagnosis($id)
    {
        $this->db->delete('patient_diagnosis', ['id' => $id]);
    }
    // END OF patient_diagnosis table


    // START of patient_treatment_plan table
    public function get_treatment_table()
    {
        return $this->db->get('patient_treatment_plan')->result();
    }

    public function get_treatment_tbl($id)
    {
        return $this->db->get_where('patient_treatment_plan', ['patient_id' => $id]);
    }

    public function add_patient_treatment_plan($info)
    {
        $this->db->insert('patient_treatment_plan', $info);
    }

    public function get_patient_treatment_plan_row($id)
    {
        return $this->db->get_where('patient_treatment_plan', ['patient_id' => $id])->row();
    }

    public function get_patient_treatment_plan_result($id)
    {
        return $this->db->get_where('patient_treatment_plan', ['patient_id' => $id])->result();
    }

    public function get_patient_treatment_resultArr($id)
    {
        return $this->db->get_where('patient_treatment_plan', ['patient_id' => $id])->result_array();
    }

    public function update_patient_treatment_plan($id, $info)
    {
        $this->db->update('patient_treatment_plan', $info, ['patient_id' => $id]);
    }

    public function delete_patient_treatment($id)
    {
        $this->db->delete('patient_treatment_plan', ['id' => $id]);
    }
    // END of patient_treatment_plan table



    // START OF patient_lab_reports table
    public function add_patient_lab_reports($info)
    {
        $this->db->insert('patient_lab_reports', $info);
    }

    public function get_patient_documents($id)
    {
        return $this->db->get_where('patient_lab_reports', ['patient_id' => $id])->result();
    }

    public function get_patient_document($id)
    {
        return $this->db->get_where('patient_lab_reports', ['id' => $id])->row();
    }

    public function get_patient_documents_arr($id)
    {
        return $this->db->get_where('patient_lab_reports', ['patient_id' => $id])->result_array();
    }

    public function get_patient_lab_reports_row($id)
    {
        return $this->db->get_where('patient_lab_reports', ['patient_id' => $id])->row();
    }

    public function delete_patient_document($id)
    {
        $this->db->delete('patient_lab_reports', ['id' => $id]);
    }

    public function get_patient_documents_array($id)
    {
        return $this->db->get_where('patient_lab_reports', ['patient_id' => $id])->result_array();
    }
    
    // END OF patient_lab_reports table

    // START OF age range chart
    public function get_age_range()
    {
        // get age from patient_record table
        $this->db->select('age');
        $this->db->from('patient_record');
        $query = $this->db->get();
        $result = $query->result();

        return $result;
    }
    // END OF age range chart

    // START OF bmi data chart
    public function get_bmi_data()
    {
        // get height and weight from patient_details table
        $this->db->select('height, weight');
        $this->db->from('patient_details');
        $query = $this->db->get();
        $result = $query->result();

        return $result;
    }

    // END OF bmi data chart

    // START OF gender data chart
    public function get_gender_data()
    {
        // get gender from patient_records table
        $this->db->select('sex');
        $this->db->from('patient_record');
        $query = $this->db->get();
        $result = $query->result();

        return $result;
    }


    // END OF gender data chart






}
