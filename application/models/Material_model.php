<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
class Material_model extends CI_Model
{
    var $db_mysql;
    var $material_table = 'material';

    public function __construct()
    {
        parent::__construct();
        $this->db_mysql=$this->load->database('mysql',true);
    }

    public function get_material()
    {
        $arr = array("name" => "name" ,
                     "des"   => "des"   ,
                     "unique_code" => "unique_code" ,
                     "price"=> "price",
                     "num"=> "num" );
        return $this -> db_mysql -> select( $arr )->from($this -> material_table) ->get()->result_array();
    }

    public function get_unique_code()
    {
        $arr = array("unique_code" => "max(unique_code)+1 as unique_code");
        return $this -> db_mysql -> select( $arr )->from($this -> material_table) ->get()->row_array();
    }

    public function addNewMaterial()
    {
        $data = array( 'unique_code' => $this->input->post('unique_code') ,
                       'name' => $this->input->post('name') ,
                       'des' => $this->input->post('des') ,
                       'price' => $this->input->post('price') ,
                       'num' => $this->input->post('num') );
        return $this->db_mysql->insert('material',$data);
    }

    public function del_material($doc_key)
    {
        $this->db_mysql->where('unique_code',$doc_key );
        $this->db_mysql->delete('material');
        return $this->db_mysql->affected_rows();
    }

    public function getMaterialInfoByUniCode($unq_code)
    {
        $arr = array("name" => "name" ,
                     "des"   => "des"   ,
                     "price"=> "price",
                     "num"=> "num" );
        return $this -> db_mysql -> select( $arr )->from($this -> material_table) ->get()->result_array();
    }

    public function updMaterial(){
        $data = array(  'name' => $this->input->post('name') ,
                        'des' => $this->input->post('des') ,
                        'price' => $this->input->post('price') ,
                        'num' => $this->input->post('num') );
        $this->db_mysql->where('unique_code',$this->input->post('unique_code') );
        return $this->db_mysql->update('material',$data);
    }

    public function get_allMaterialName(){
        $arr = array(  'name' => 'name' ,
                       'unique_code' => 'unique_code',
                       'des'  => 'des');
        return $this -> db_mysql -> select( $arr )->from($this -> material_table) -> get() ->result_array();
    }

    public function getTotalPrice($argv){
        $arr = array("total_price" => "sum(price) as total_price");
        return $this -> db_mysql -> select( $arr )->from($this -> material_table) ->where_in ( 'unique_code', $argv ) -> get() ->row_array();
    }

    public function minusMaterialInStock($argv){
        $chkResult = self::chkNumInStock($argv);
        if(!$chkResult){
            return -1;
        }
        $min_num = 1;
        $this->db_mysql->set('num',"num-$min_num",false);
        $this->db_mysql->where_in('unique_code',$argv);
        return $this->db_mysql->update($this -> material_table);

    }

    private function chkNumInStock($argv){
        foreach ($argv as $v){
            $arr = array("num" => "num");
            $num_tmp = $this -> db_mysql -> select( $arr )->from($this -> material_table) ->where ( 'unique_code', $v ) -> get() ->row_array();
            if($num_tmp['num'] == 0) return false;
        }
        return true;
    }
}

?>