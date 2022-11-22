<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization');
header('Accept: application/json');
header('Content-Type: application/json;char et=UTF-8');
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

require(APPPATH.'/libraries/RestController.php');

class Admin_reports_mobile extends RestController
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(['url', 'form']);
        $this->load->library(['form_validation', 'session']);
        $this->load->model('Charts_model');
    }
    
    public function stockin_get() {
        $result=$this->Charts_model->get_stock();
        foreach($result as $stockIn) {
            $response[] = array('x'=>$stockIn->prod_name,
                                'y'=>(int)$stockIn->stock_in,);
        }
        
        echo json_encode($response);
    }
    public function stockout_get() {
        $result=$this->Charts_model->get_stock();
        foreach($result as $stockOut) {
            $response[] = array('x'=>$stockOut->prod_name,
                                'y'=>(int)$stockOut->stock_out,);
        }
        echo json_encode($response);
    }
    // END OF stock items chart


    public function ptinfo_post(){
        $data=json_decode(file_get_contents('php://input'));
        
    }
}
?>