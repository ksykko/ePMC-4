<?php

use Google\Service\AndroidPublisher\Variant;

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

    public function get_patient_fullname()
    {
        $this->db->select("patient_id,first_name,middle_name,last_name,avatar");
        $this->db->from('patient_record');
        $query = $this->db->get();
        return $query->result();
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

    public function update_user_avatar($id, $avatar)
    { // update patient avatar based on patient_id ($id = primary key)
        $this->db->update('user_accounts', $avatar, ['user_id' => $id]);
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

        $documents = $this->get_patient_documents($id);
        foreach ($documents as $row) {
            $this->db->insert('arc_patient_lab_report', $row);
        }

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
    {   // add patient record
        // add mysqli_real_escape_string to prevent sql injection
        $connection = $this->db->conn_id;
        $info['first_name'] = mysqli_real_escape_string($connection, $info['first_name']);

        //$this->dd($info['first_name']);

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

    public function get_patient_record_details()
    {
        $this->db->select('');
        $this->db->from('patient_record');
        $this->db->join('patient_details', 'patient_details.patient_id = patient_record.patient_id');
        $query = $this->db->get();
        return $query->result();
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

    // count the number of rows with the same patient_id
    public function get_patient_documents_count($id)
    {
        $this->db->where('patient_id', $id);
        $this->db->from('patient_lab_reports');
        return $this->db->count_all_results();
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


    // Start of Recent Activity 
    public function add_activity($info)
    {
        $this->db->insert('recent_activity', $info);
    }

    public function get_activity_tbl()
    {
        return $this->db->order_by('date_created', 'DESC')->get('recent_activity');
        // return $this->db->get('recent_activity');0
    }

    public function get_recent_act()
    {
        $this->db->select("recent_id,activity");
        $this->db->from('recent_activity');
        $query = $this->db->get();
        return $query->result();
    }

    // End of Recent Activity 

    // check if patient exists
    public function patient_exists($name)
    {
        $this->db->select('CONCAT(first_name, " ", middle_name, " ", last_name) AS full_name');
        $this->db->from('patient_record');
        $query = $this->db->get();

        // loop through the result and check if the name exists
        foreach ($query->result() as $row) {
            if ($row->full_name == $name) {
                //$this->dd(true);
                return true;
            }
        }

        $this->db->select('CONCAT(first_name, " ", last_name) AS full_name');
        $this->db->from('patient_record');
        $query = $this->db->get();

        foreach ($query->result() as $row) {
            if ($row->full_name == $name) {
                return true;
            }
        }

        $this->db->select('first_name');
        $this->db->from('patient_record');
        $query = $this->db->get();

        foreach ($query->result() as $row) {
            if ($row->first_name == $name) {
                return true;
            }
        }

        return false;
    }

    public function arc_patient_exists($name)
    {
        $this->db->select('CONCAT(first_name, " ", middle_name, " ", last_name) AS full_name');
        $this->db->from('arc_patient_record',);
        $query = $this->db->get();

        // loop through the result and check if the name exists
        foreach ($query->result() as $row) {
            if ($row->full_name == $name) {
                return true;
            }
        }

        $this->db->select('CONCAT(first_name, " ", last_name) AS full_name');
        $this->db->from('arc_patient_record');
        $query = $this->db->get();

        foreach ($query->result() as $row) {
            if ($row->full_name == $name) {
                return true;
            }
        }

        $this->db->select('first_name');
        $this->db->from('arc_patient_record');
        $query = $this->db->get();

        foreach ($query->result() as $row) {
            if ($row->first_name == $name) {
                return true;
            }
        }
        return false;
    }

    public function dd($data)
    {
        echo "<pre>";
        die(var_dump($data));
        echo "</pre>";
    }
}
