<?php
Class Get_comment_md extends CI_Model
{

    function __construct( )
    {
        parent::__construct();

    }

    public function get_number_comment()
    {

        $table = new tbl_cafe_comment();

        $this->db->select('count('.$table->get_id().') counter');

        $this->db->from($table->get_table());

        $method_array = new method_array($this->db->get()->result_array());

        return $method_array->array_shift_double();

    }

}