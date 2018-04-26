<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
class Order_model extends CI_Model
{
    var $db_mysql;
    var $order_table = 'order';

    public function __construct()
    {
        parent::__construct();
        $this->db_mysql = $this->load->database('mysql', true);
    }

    public function get_order()
    {
        $arr = array(  'order_id' => 'order_id' ,
                       'material_id' => 'material_id',
                       'need_num'  => 'need_num');
        return $this -> db_mysql -> select( $arr )->from($this -> order_table) -> get() ->result_array();
    }

}
?>