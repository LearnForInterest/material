<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
class Product_model extends CI_Model
{
    var $db_mysql;
    var $product_table = 'product';

    public function __construct()
    {
        parent::__construct();
        $this-> db_mysql = $this->load->database('mysql',true);
    }

    public function get_product()
    {
        $arr = array("product_id" => "prod_id" ,
                     "customer"   => "customer"   ,
                     "desprition" => "desprition" ,
                     "total_price"=> "total_price");
        return $this -> db_mysql -> select( $arr )->from($this -> product_table) ->get()->result_array();
    }

    public function get_product_id()
    {
        $arr = array("new_pid" => "max(prod_id)+1 as new_pid");
        return $this -> db_mysql -> select( $arr )->from($this -> product_table) ->get()->row_array();
    }

    public function addNewProduct($argv)
    {
        $argv['total_price'] = (float) $argv['total_price'];
        $data = array( 'prod_id' => $this->input->post('product_id') ,
                       'customer' => $this->input->post('customer') ,
                       'desprition' => $this->input->post('des') ,
                       'total_price' =>  $argv['total_price']);
        return $this->db_mysql->insert($this -> product_table,$data);
    }
}

?>