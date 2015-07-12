<?php
Class Validation_cafe extends CI_Model
{
    private $ID;

    function __construct($ID = null)
    {
        parent::__construct();

        $this->ID = $ID;

    }

    public function get_validation_id()
    {

        $table = new tbl_cafe();

        $this->db->select(array($table->get_id()));

        $this->db->from($table->get_table());

        $this->db->where(array($table->get_id() => $this->ID));

        $this->db->limit(1);

        $method_array = new method_array($this->db->get()->result_array());

        return $method_array->array_shift();
    }
}