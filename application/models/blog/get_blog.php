<?php
Class Get_blog extends CI_Model
{
    private $ID ;

    function __construct($ID = null)
    {
        parent::__construct();

        $this->load->library('system/tbl/tbl_blog');

        $this->ID = $ID ;

    }

    public function get_limit_five()
    {

        $table = new tbl_blog();

        $session = new ses_system();

        $this->db->select('*');

        $this->db->from($table->get_table());

        $this->db->where(array(
            $table->get_status()=>1,
            $table->get_date_in()=>$session->get_date()
        ));

        $this->db->limit(5);

        return $this->db->get()->result_array();

    }

    public function get_all_blog(){

        $table = new tbl_blog();

        $this->db->select('*');

        $this->db->from($table->get_table());

        $this->db->where(array($table->get_status()=>1));

        return $this->db->get()->result_array();


    }

    public function get_this_blog()
    {

        $table = new tbl_blog();

        $this->db->select('*');

        $this->db->from($table->get_table());

        $this->db->where(array($table->get_id()=>$this->ID));

        $this->db->limit(1);

        $method_array = new method_array($this->db->get()->result_array());

        return $method_array->array_shift();

    }




}