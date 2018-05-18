<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Entity\Material;

class Mate extends MY_Controller {

    public $materialRepository;

	public function __construct(){
		parent::__construct();
        $this->load->library('form_validation');
		$this->materialRepository = $this->em->getRepository('Entity\Material');
	}

    public function query(){
        $this->load->view("material");
    }

    public function queryGet_material(){
        $materiallAll = $this->materialRepository->findAll();
        $result = array();
        foreach ($materiallAll as $key => $val){
            $result[$key]['name']        = $val->getMaterialName();
            $result[$key]['des']         = $val->getMaterialDes();
            $result[$key]['unique_code'] = $val->getMaterialId();
            $result[$key]['price']       = $val->getMaterialPrice();
            $result[$key]['num']         = $val->getMaterialNum();
        }
        echo json_encode(array("data"=>$result));
    }

    public function add_material(){
        $data['unique_code'] = $this->materialRepository->getnewID();
        $this->load->view("add_material",$data);
	}

	public function addNew(){
        self::Chkdata();
        if ($this->form_validation->run() == false){
            $data['title'] = "data too long,plz simplify";
            $this->load->view("public/error",$data);
        }else{
            $material = new Material();
            $material->setMaterialName($this->input->post('name'));
            $material->setMaterialDes($this->input->post('des'));
            $material->setMaterialPrice($this->input->post('price'));
            $material->setMaterialNum($this->input->post('num'));

            $this->em->persist( $material );
            $this->em->flush();
            $this->load->view("public/success");
        }
	}

	public function del_material(){
		$del_str = trim($this->input->post('del_str'));
		$del_item = array_filter(explode(",",$del_str));
		foreach($del_item as $v){
            $material = $this->materialRepository->find( $v );
            $this->em->remove( $material );
            $this->em->flush();
		}
        $this->load->view("public/success");
	}

	public function upd_material(){
		$data['upd_unCode'] = $this->uri->segment("3");
        $material = $this->materialRepository->find( $data['upd_unCode'] );
        $data['info']['name']  = $material->getMaterialName();
        $data['info']['des']   = $material->getMaterialDes();
        $data['info']['price'] = $material->getMaterialPrice();
        $data['info']['num']   = $material->getMaterialNum();
        $this->load->view("upd_material",$data);
	}

	public function UpdMaterial(){
        self::Chkdata();
        if ($this->form_validation->run() == false){
            $data['title'] = "data too long,plz simplify";
            $this->load->view("public/error",$data);
        }else{
            $material = $this->materialRepository->find( $this->input->post('unique_code') );
            if (!$material) {
                throw $this->createNotFoundException('No material found for id '.$this->input->post('unique_code'));
            }
            $material->setMaterialName($this->input->post('name'));
            $material->setMaterialDes($this->input->post('des'));
            $material->setMaterialPrice($this->input->post('price'));
            $material->setMaterialNum($this->input->post('num'));

            $this->em->flush();
        }
        $this->load->view("public/success");
	}

	private function Chkdata(){
        $this->form_validation->set_rules('name','name','max_length[50]');
        $this->form_validation->set_rules('des','des','max_length[200]');
        $this->form_validation->set_rules('price','price','max_length[8]');
        $this->form_validation->set_rules('num','num','max_length[8]');

        if(!is_numeric($this->input->post('price'))){
            $data['title'] = "the price you entered is not even a number !";
            $this->load->view("public/error",$data);
        }
        if(!is_numeric($this->input->post('num'))){
            $data['title'] = "the number in stock you entered is not even a number !";
            $this->load->view("public/error",$data);
        }
	}
}

?>
