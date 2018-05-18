<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends MY_Controller {

    public $productRepository;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->productRepository  = $this->em->getRepository('Entity\Product');
        $this->materialRepository = $this->em->getRepository('Entity\Material');
        $this->relationRepository = $this->em->getRepository('Entity\Relation');
    }

    public function query()
    {
        $this->load->view("product");
    }

    public function queryGet_product()
    {
        $productAll = $this->productRepository->findAll();
        $result = array();
        foreach ($productAll as $key => $val){
            $result[$key]['prod_id']     = $val->getProductId();
            $result[$key]['customer']    = $val->getProductCustomer();
            $result[$key]['desprition']  = $val->getProductDes();
            $result[$key]['total_price'] = $val->getProductTotalPrice();
        }
        echo json_encode(array("data"=>$result));
    }

    public function add_product()
    {
        $data['product_id'] = $this->productRepository->getnewID();
        $data['mate_name']  = $this->materialRepository->getallMaterialName();
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
            $data['minus_materialInStockbackinfo'] = isset($date['material']) ? $this->materialRepository->minusMaterialInStock($date['material']) : '1';

            if($data['minus_materialInStockbackinfo'] === -1){
                $data['title'] = "material is not enough ,plz add some meterial first!";
                $this->load->view("public/error",$data);
            }

            foreach ($date['material'] as $v){
                $relation = new Entity\Relation();
                $relation->setRelationMatId($v);
                $relation->setRelationProId($this->input->post('product_id'));

                $this->em->persist( $relation );
                $this->em->flush();
            }

            $data['total_price'] = isset($date['material']) ? $this->materialRepository->getTotalPrice($date['material']) : '0';
            $data['total_price'] = (float) $data['total_price'];

            $product = new Entity\Product();
            $product->setProductCustomer($this->input->post('customer'));
            $product->setProductDes($this->input->post('des'));
            $product->setProductTotalPrice($data['total_price']);
            $this->em->persist( $product );
            $this->em->flush();

            $this->load->view("public/success",$data);

        }
    }

    private function Chkdata(){
        $this->form_validation->set_rules('customer','customer','max_length[200]');
        $this->form_validation->set_rules('des','des','max_length[200]');
    }
}

?>