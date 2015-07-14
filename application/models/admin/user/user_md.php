<?php
Class user_md extends CI_Model
{

    private $data;

    private $table;


    function __construct($data = null , $table = null)
    {
        parent::__construct();

        $this->data = $data;

        $this->table = $table;
    }

    public function get_exists($where = null){

        $this->db->select($this->data);

        $this->db->where($where);

        $this->db->from($this->table);

        $method_array = new method_array($this->db->get()->result_array());

        return $method_array->array_shift();

    }

    public function get_all_user(){

        $this->db->select($this->data);

        $this->db->from($this->table);

        $method_array = new method_array($this->db->get()->result_array());

        return $method_array->array_shift_double();


    }

    public function all_user(){

        $this->db->select($this->data);

        $this->db->from($this->table);

        return $this->db->get()->result_array();

    }
}