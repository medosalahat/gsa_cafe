<?php
Class Set_contact extends CI_Model
{

    private $table;

    private $data;

    function __construct($table = null ,$data = null)
    {
        parent::__construct();

        $this->table = $table;

        $this->data = $data;

    }

    public function set_new(){

        $this->db->insert($this->table, $this->data);

        return $this->db->affected_rows();


    }





}