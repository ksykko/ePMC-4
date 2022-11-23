<?php

class Charts_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }


    //  * START OF age range chart
    public function get_age_range()
    {
        // get age and sex from patient_record table
        $this->db->select('age, sex');
        $this->db->from('patient_record');
        $query = $this->db->get();
        $result = $query->result();

        return $result;
    }
    // * END OF age range chart


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
    // * END OF bmi data chart


    // * START OF gender data chart
    public function get_gender_data()
    {
        // get gender from patient_records table
        $this->db->select('sex');
        $this->db->from('patient_record');
        $query = $this->db->get();
        $result = $query->result();

        return $result;
    }
    // * END OF gender data chart


    // * START OF stock items chart
    public function get_stockprod()
    {
        $this->db->select('prod_name')->from('inventory');
        $query = $this->db->get();

        return $query->result();
    }

    public function get_stockIn()
    {
        $this->db->select('stock_in')->from('inventory');
        $query = $this->db->get();

        return $query->result();
    }

    public function get_stockOut()
    {
        $this->db->select('stock_out')->from('inventory');
        $query = $this->db->get();

        return $query->result();
    }
    // * END OF stock items chart


    // * START OF Staff per department chart
    public function get_staff_count()
    {
        // fetch all rows from user_account table
        $this->db->select('specialization');
        $this->db->from('user_accounts');
        $query = $this->db->get();

        return $query->result();
    }
    // * END OF Staff per department chart


    // * for mobile
    public function get_stock()
    {
        $this->db->select("prod_name,stock_in,stock_out");
        $this->db->from('inventory');
        $query = $this->db->get();
        return $query->result();
    }
    // * END OF stock items chart


    // * START OF patient count chart
    public function daily_patientrec()
    {
        // count number of patient_records per day for the past 7 days
        $this->db->select('COUNT(*) AS count, DATE(date_created) AS date_created');
        $this->db->from('patient_record');
        $this->db->where('date_created >= DATE_SUB(NOW(), INTERVAL 7 DAY)');
        $this->db->group_by('date_created');
        $query = $this->db->get();
        $result = $query->result();

        return $result;
    }

    public function total_no_records()
    {
        // count number of patient_records with the same date_created for the past 7 days
        // format date_created to day eg. Mon, Tue, Wed, Thu, Fri, Sat, Sun
        $this->db->select('COUNT(*) AS count, DATE_FORMAT(date_created, "%a") AS date_created');
        $this->db->from('patient_record');
        $this->db->where('date_created >= DATE_SUB(NOW(), INTERVAL 7 DAY)');
        $this->db->group_by('date_created');
        $query = $this->db->get();
        $result = $query->result();

        return $result;
    }

    public function get_total_rows()
    {
        // get total number of patient_records
        $this->db->select('COUNT(*) AS count');
        $this->db->from('patient_record');
        $query = $this->db->get();
        $result = $query->result();

        return $result;
    }

    public function get_arc_rows()
    {
        // get total number of archived patient_records
        $this->db->select('COUNT(*) AS count');
        $this->db->from('arc_patient_record');
        $query = $this->db->get();
        $result = $query->result();

        return $result;
    }

    public function get_user_activity()
    {
        // get total number of user activity
        $this->db->select('COUNT(*) AS count');
        $this->db->from('user_activity');
        $query = $this->db->get();
        $result = $query->result();

        return $result;
    }

    public function recent_added()
    {
        // get number of patient_records added in the past 7 days
        $currentDate = "'" . date('Y-m-d') . "'";
        $sql = "SELECT * FROM `patient_record` WHERE DATE(date_created) = $currentDate;";
        $today = $this->db->query($sql);
        $today = $today->num_rows();

        $sql6 = "SELECT * FROM `patient_record` WHERE DATE(date_created) = DATE_SUB($currentDate, INTERVAL 1 DAY);";
        $today6 = $this->db->query($sql6);
        $today6 = $today6->num_rows();

        // loop query for the past 6 days
        for ($i = 5; $i >= 0; $i--) {
            $sql = "SELECT * FROM `patient_record` WHERE DATE(date_created) = DATE_SUB($currentDate, INTERVAL $i DAY);";
            $query = $this->db->query($sql);
            $query = $query->num_rows();

            $result[] = $query;
        }

        // add today's number of patient_records to the array
        array_push($result, $today);

        return $result;
    }

    public function recent_deleted()
    {
        // get number of patient_records deleted in the past 7 days
        $currentDate = "'" . date('Y-m-d') . "'";

        // loop query for the past 7 days and get number of patient_records deleted and store in array
        for ($i = 6; $i >= 0; $i--) {
            $sql = "SELECT * FROM `arc_patient_record` WHERE DATE(last_accessed) = DATE_SUB($currentDate, INTERVAL $i DAY);";
            $query = $this->db->query($sql);
            $query = $query->num_rows();

            $result[] = $query;
        }

        return $result;

    }

    public function monthly_added()
    {
        // get number of patient_records added monthly

        // get current month
        $currentMonth = "'" . date('Y-m-d') . "'";

        //$this->dd($currentMonth);
         
        // loop query through months and get number of patient_records added and store in array
        // for ($i = 11; $i >= 0; $i--) {
        //     $sql = "SELECT * FROM `patient_record` WHERE DATE(date_created) = DATE_SUB($currentMonth, INTERVAL $i MONTH);";
        //     $query = $this->db->query($sql);
        //     $query = $query->num_rows();

        //     $result[] = $query;
        // }


        // loop query through months if current month matches date_created, get number of patient_records added and store in array
        for ($i = 11; $i >= 0; $i--) {
            $sql = "SELECT * FROM `patient_record` WHERE DATE(date_created) = DATE_SUB($currentMonth, INTERVAL $i MONTH);";
            $query = $this->db->query($sql);
            $query = $query->num_rows();

            $result[] = $query;
        }

        //$this->dd($result);
        return $result;

    }

    public function dd($data)
    {
        echo "<pre>";
        die(var_dump($data));
        echo "</pre>";
    }
}
