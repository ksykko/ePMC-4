<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization');
header('Accept: application/json');
header('Content-Type: application/json;char et=UTF-8');
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

require(APPPATH.'/libraries/RestController.php');

class Admin_dashboard extends RestController
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(['url', 'form']);
        $this->load->library(['form_validation', 'session']);
        $this->load->model('Admin_model');
    }

    public function total_get() {
        $result=$this->Admin_model->get_inventory_table_contents();
        $sum_stockin = 0;
        $sum_stockout = 0;
        foreach ($result as $product) {
            $sum_stockin += $product->stock_in;
            $sum_stockout += $product->stock_out;
        }
            $total_inventory = $sum_stockin + $sum_stockout;

        $response[] = array(
                    'id'=>1,
                    'inventory'=>$total_inventory,
                    'users'=>$this->Admin_model->get_useracc_count(),
                    'patient'=>$this->Admin_model->get_patient_count(),
                    'new_patient'=>$this->Admin_model->get_nUser_count(),
                    );
        
        echo json_encode($response);
    }
    public function recent_get() {
        $response = array("recentact"=>$this->Admin_model->get_recent_act());
        echo json_encode($response);
    }
}
?>