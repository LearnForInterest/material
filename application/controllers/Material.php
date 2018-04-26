<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Material extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->library('form_validation');
		$this->load->model("material_model");
	}

    public function query(){
        $this->load->view("material");
    }

    public function queryGet_material(){
        $result=$this->material_model->get_material();
        echo json_encode(array("data"=>$result));
    }

    public function add_material(){
        $data['unique_code']=$this->material_model->get_unique_code();
        $this->load->view("add_material",$data);
	}

	public function addNew(){
        self::Chkdata();

        if ($this->form_validation->run() == false){
            $data['title'] = "data too long,plz simplify";
            $this->load->view("public/error",$data);
        }else{
            $data['add_backinfo']=$this->material_model->addNewMaterial();
            if($data['add_backinfo'] == 1){
                $this->load->view("public/success",$data);
            }elseif($data['add_backinfo'] == 0){
                $this->load->view("public/error",$data);
            }
        }
	}

	public function del_material(){
		$del_str = trim($this->input->post('del_str'));
		$del_item = array_filter(explode(",",$del_str));
		foreach($del_item as $v){
            $delSucChk  = $this->material_model->del_material($v);
            if($delSucChk == 0){
                $data['title'] = "delete fail";
                $this->load->view("public/error",$data);
			}
		}
        $this->load->view("public/success");
	}

	public function upd_material(){
		$data['upd_unCode'] = $this->uri->segment("3");
        $data['info'] = $this->material_model->getMaterialInfoByUniCode($data['upd_unCode']);
        $this->load->view("upd_material",$data);
	}

	public function UpdMaterial(){
        self::Chkdata();
        if ($this->form_validation->run() == false){
            $data['title'] = "data too long,plz simplify";
            $this->load->view("public/error",$data);
        }else{
            $data['upd_backinfo'] = $this->material_model->updMaterial();
            if($data['upd_backinfo'] == 1){
                $this->load->view("public/success",$data);
            }elseif($data['upd_backinfo'] == 0){
                $this->load->view("public/error",$data);
            }
        }
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
