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
        // original
    
        // $query1 = $this->db->get_where('patient_record', ['email' => $email, 'password' => $pass]);
        // $query2 = $this->db->get_where('user_accounts', ['email' => $email, 'password' => $pass]);
        // $query3 = $this->db->get_where('patient_record', ['un_patient_id' => $email, 'password' => $pass]);

        // if ($query1->num_rows() > 0) {
        //     return $query1->row();
        // } else if ($query2->num_rows() > 0) {
        //     return $query2->row();
        // } else if ($query3->num_rows() > 0) {
        //     return $query3->row();
        // } 

        
        // login with email and password_verify
        $query1 = $this->db->get_where('patient_record', ['email' => $email]);
        $query2 = $this->db->get_where('user_accounts', ['email' => $email]);
        $query3 = $this->db->get_where('patient_record', ['un_patient_id' => $email]);

        if ($query1->num_rows() > 0) {
            $row = $query1->row();
            if (password_verify($pass, $row->password)) {
                return $row;
            }
        } else if ($query2->num_rows() > 0) {
            $row = $query2->row();
            if (password_verify($pass, $row->password)) {
                return $row;
            }
        } else if ($query3->num_rows() > 0) {
            $row = $query3->row();
            if (password_verify($pass, $row->password)) {
                return $row;
            }
        }

        






        // $query = $this->db->get_where('patient_record', ['email' => $email, 'password' => password_verify($pass, PASSWORD_DEFAULT)]);

        // if ($query->num_rows() > 0) {
        //     return $query->row();
        // } else {
        //     $query = $this->db->get_where('user_accounts', ['email' => $email, 'password' => password_verify($pass, PASSWORD_DEFAULT)]);

        //     if ($query->num_rows() > 0) {
        //         return $query->row();
        //     } else {
        //         $query = $this->db->get_where('patient_record', ['un_patient_id' => $email, 'password' => password_verify($pass, PASSWORD_DEFAULT)]);

        //         if ($query->num_rows() > 0) {
        //             return $query->row();
        //         }
        //     }
        // }


        // login for bcrypt

        // $this->db->select('*');
        // $this->db->where('email', $email);
        // $this->db->from('patient_record');
        // $query = $this->db->get();


        // if ($query->num_rows() === 1) 
        // {
        //     $result = $query->row();
             
        //     if (password_verify($pass, $result->password))
        //     {
        //         //$this->dd('password verified');
        //         // return row_array($result);
        //         //$this->dd($result);
        //         return $result;
        //     }
        //     else
        //     {
        //         //$this->dd('Password is incorrect');
        //         return false;
        //     }
        // }

        // $this->db->select('*');
        // $this->db->where('email', $email);
        // $this->db->from('user_accounts');
        // $query = $this->db->get();

        // if ($query->num_rows() === 1) 
        // {
        //     $result = $query->row();
             
        //     if (password_verify($pass, $result->password))
        //     {
        //         //$this->dd('password verified');
        //         return $result;
        //     }
        // }

        // $this->db->select('*');
        // $this->db->where('un_patient_id', $email);
        // $this->db->from('patient_record');
        // $query = $this->db->get();

        // if ($query->num_rows() === 1) 
        // {
        //     $result = $query->row();
             
        //     if (password_verify($pass, $result->password))
        //     {
        //         //$this->dd('password verified');
        //         return $result;
        //     }
        // }

    }

    public function reset_password($cred) 
    {
        // look for email or un_patient_id in patient_record and user_accounts
        $query1 = $this->db->get_where('patient_record', ['email' => $cred]);
        $query2 = $this->db->get_where('user_accounts', ['email' => $cred]);
        $query3 = $this->db->get_where('patient_record', ['un_patient_id' => $cred]);

        if ($query1->num_rows() > 0) {
           
            return $query1->row();
        } else if ($query2->num_rows() > 0) {
            return $query2->row();
        } else if ($query3->num_rows() > 0) {
            return $query3->row();
        } 
    }

    public function user_activity($user_id, $user_type, $activity)
    {

        $data = array(
            'user_id' => $user_id,
            'user_type' => $user_type,
            'activity' => $activity,
            'date' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('user_activity', $data);
    }

    public function patient_activity($user_id, $user_type, $activity)
    {
        $data = array(
            'patient_id' => $user_id,
            'user_type' => $user_type,
            'activity' => $activity,
            'date' => date('Y-m-d H:i:s')
        );

        $this->db->insert('patient_activity', $data);
    }

    public function dd ($data)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        die();
    }
}

?>
