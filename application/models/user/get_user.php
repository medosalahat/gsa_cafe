<?php
Class get_user extends CI_Model
{

    private $data;

    private $table;


    function __construct($data = null , $table = null)
    {
        parent::__construct();

        $this->data = $data;

        $this->table = $table;

    }

    public function get_id(){

        $tbl = new tbl_users();

        $this->db->select($tbl->get_id());

        $this->db->where(array($tbl->get_id_fb()=>$this->data));

        $this->db->from($tbl->get_table());

        $method_array = new method_array($this->db->get()->result_array());

        return $method_array->array_shift_double();
    }

    public function get_id_user($where = null){

        $this->db->select(array($this->data));

        $this->db->from($this->table);

        $this->db->where(array($where));

        $method_array = new method_array($this->db->get()->result_array());

        return $method_array->array_shift();

    }

    public function check_user_exists()
    {

        $table = new tbl_users();

        //$this->db->select(array($table->get_id(),$table->get_name(),$table->get_image()));

        $this->db->select(array($table->get_id()));

        $this->db->from($table->get_table());

        $this->db->where(array($table->get_id_fb()=>$this->data,$table->get_level()=>4));

        if ($this->db->get()->num_rows() > 0) {

            return true;
        }
        else{

            return false;
        }

    }

    public function register_new_user(){


        $this->db->insert($this->table, $this->data);

        return $this->db->affected_rows();


    }




}