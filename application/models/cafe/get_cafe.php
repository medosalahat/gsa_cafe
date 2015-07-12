<?php
Class Get_cafe extends CI_Model
{
    private $ID;

    private $table;

    private $data;

    function __construct($ID = null,$table = null ,$data = null)
    {
        parent::__construct();

        $this->ID = $ID;

        $this->table = $table;

        $this->data = $data;

    }

    public function get_limit_five()
    {

        $table = new tbl_cafe();

        $this->db->select('*');

        $this->db->from($table->get_table());

        $this->db->where(array(
            $table->get_main_page()=>1,
            $table->get_status()=>1
        ));

        $this->db->limit(9);

        return $this->db->get()->result_array();

    }

    public function get_all()
    {

        $table = new tbl_cafe();

        $this->db->select('*');

        $this->db->from($table->get_table());

        $this->db->where(array($table->get_status()=>1));

        $this->db->limit(9);

        return $this->db->get()->result_array();

    }

    public function get_this_cafe()
    {

        $table = new tbl_cafe();

        $this->db->select('*');

        $this->db->from($table->get_table());

        $this->db->where(array($table->get_id()=>$this->ID));

        $this->db->limit(1);

        $method_array = new method_array($this->db->get()->result_array());

        return $method_array->array_shift();

    }

    public function get_cafe_gallery()
    {

        $table = new tbl_cafe_gallery();

        $this->db->select('*');

        $this->db->from($table->get_table());

        $this->db->where(array($table->get_id_cafe()=>$this->ID,$table->get_status()=>1));

        return $this->db->get()->result_array();

    }

    public function get_cafe_comment()
    {

        $table = new tbl_cafe_comment();

        $tbl_users = new tbl_users();

        $this->db->select(

            array(

                $table->get_id_user(),

                "( select ".$tbl_users->get_id_fb()." from ".$tbl_users->get_table()." where ".$tbl_users->get_id()." = ".$table->get_id_user()." ) ".$tbl_users->get_id_fb(),

                "( select ".$tbl_users->get_name()." from ".$tbl_users->get_table()." where ".$tbl_users->get_id()." = ".$table->get_id_user()." ) ".$tbl_users->get_name(),

                "( select ".$tbl_users->get_image()." from ".$tbl_users->get_table()." where ".$tbl_users->get_id()." = ".$table->get_id_user()." ) ".$tbl_users->get_image(),

                $table->get_comment(),
            )
        );

        $this->db->from($table->get_table());

        $this->db->where(array($table->get_id_cafe()=>$this->ID));

        return $this->db->get()->result_array();

    }

    public function set_new_comment(){

        $this->db->insert($this->table, $this->data);

        return $this->db->affected_rows();


    }





}