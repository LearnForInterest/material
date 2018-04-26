<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
class Relation_model extends CI_Model
{
    var $db_mysql;
    var $relation_table = 'relation';

    public function __construct()
    {
        parent::__construct();
        $this->db_mysql = $this->load->database('mysql', true);
    }

    public function insert_relation(){
        foreach ($this->input->post('material') as $item) {
            $arr_tmp = array('prod_id' => $this->input->post('product_id') ,
                             'material_id' => $item);
            $data[] = $arr_tmp;
        }
        return $this->db_mysql->insert_batch($this->relation_table,$data);
    }
}

?>