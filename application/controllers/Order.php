<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Order extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->ordersheetRepository = $this->em->getRepository('Entity\Ordersheet');
    }

    public function query()
    {
        $this->load->view("order");
    }

    public function queryGet_order()
    {
        $orderAll = $this->ordersheetRepository->findAll();
        $result = array();
        foreach ($orderAll as $key => $val){
            $result[$key]['order_id']        = $val->getOrderId();
            $result[$key]['material_id']     = $val->getMaterialId();
            $result[$key]['need_num']        = $val->getNeedNum();
        }
        echo json_encode(array("data"=>$result));
    }

}

?>