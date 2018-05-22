<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Order extends MY_Controller {
    public function __construct(){
        parent::__construct();
        $this->ordersheetRepository = $this->em->getRepository('Entity\Ordersheet');
        $this->materialRepository = $this->em->getRepository('Entity\Material');
    }

    public function query(){
        $this->load->view("order");
    }

    public function queryGet_order(){
        $orderAll = $this->ordersheetRepository->findAll();
        $result = array();
        foreach ($orderAll as $key => $val){
            $result[$key]['order_id']        = $val->getOrderId();
            $result[$key]['material_id']     = $val->getMaterialId();
            $result[$key]['need_num']        = $val->getNeedNum();
        }
        echo json_encode(array("data"=>$result));
    }

    public function add_order(){
        $data['order_id'] = $this->ordersheetRepository->getnewID();
        $this->load->view("add_order",$data);
    }

    public function addNew(){
        self::Chkdata();
        $material = $this->materialRepository->find( $this->input->post('material_id') );
        if( is_null($material) ){
            $data['title'] = "we don't have this kind of material.Plz add some orders!";
            $this->load->view("public/error",$data);
        }
        $ordersheet = new Entity\Ordersheet();
        $ordersheet->setOrderId($this->input->post('order_id'));
        $ordersheet->setMaterialId($this->input->post('material_id'));
        $ordersheet->setNeedNum($this->input->post('num'));
        $this->em->persist( $ordersheet );
        $this->em->flush();

        $tmp = $material->getMaterialNum() + $this->input->post('num');
        $material->setMaterialNum($tmp);
        $this->em->flush();

        $this->load->view("public/success");
    }

    private function Chkdata(){
        if(!is_numeric($this->input->post('material_id'))){
            $data['title'] = "the material id you entered is not even a number !";
            $this->load->view("public/error",$data);
        }
        if(!is_numeric($this->input->post('num'))){
            $data['title'] = "the number in stock you entered is not even a number !";
            $this->load->view("public/error",$data);
        }
    }
}

?>