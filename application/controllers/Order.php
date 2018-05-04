<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Order extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("order_model");
    }

    public function query()
    {
        $this->load->view("order");
    }

    public function queryGet_order()
    {
        $result=$this->order_model->get_order();
        echo json_encode(array("data"=>$result));
    }

}

?>