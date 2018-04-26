<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model("product_model");
        $this->load->model("material_model");
        $this->load->model("relation_model");
    }

    public function query()
    {
        $this->load->view("product");
    }

    public function queryGet_product()
    {
        $result=$this->product_model->get_product();
        echo json_encode(array("data"=>$result));
    }

    public function add_product()
    {
        $data['product_id']=$this->product_model->get_product_id();
        $data['mate_name']=$this->material_model->get_allMaterialName();
        $this->load->view("add_product",$data);
    }

    public function addNew()
    {
        self::Chkdata();

        if ($this->form_validation->run() == false){
            $data['title'] = "data too long,plz simplify";
            $this->load->view("public/error",$data);
        }else{
            $date['material'] = $this->input->post('material');
            $data['minus_materialInStockbackinfo'] = isset($date['material']) ? $this->material_model->minusMaterialInStock($date['material']) : '1';

            if($data['minus_materialInStockbackinfo'] === -1){
                $data['title'] = "material is not enough ,plz add some meterial first!";
                $this->load->view("public/error",$data);
            }

            $data['relation_backinfo'] = isset($date['material']) ? $this->relation_model->insert_relation() : '1';
            $data['total_price'] = isset($date['material']) ? $this->material_model->getTotalPrice($date['material']) : '0';
            $data['add_backinfo'] = $this->product_model->addNewProduct($data['total_price']);

            if($data['add_backinfo'] == 1 && $data['relation_backinfo'] > 0 && $data['minus_materialInStockbackinfo'] > 0 && $data['minus_materialInStockbackinfo']){
                $this->load->view("public/success",$data);
            }elseif($data['add_backinfo'] == 0 || $data['relation_backinfo'] == 0 || $data['minus_materialInStockbackinfo'] == 0 || !$data['minus_materialInStockbackinfo']){
                $this->load->view("public/error",$data);
            }
        }
    }

    private function Chkdata(){
        $this->form_validation->set_rules('customer','customer','max_length[200]');
        $this->form_validation->set_rules('des','des','max_length[200]');
    }
}

?>