<?php
Class get_system_requirements extends CI_Model
{
    function __construct()
    {
        parent::__construct();

    }

    public function get_name_site()
    {

        $table = new tbl_system();

        $this->db->select('*');

        $this->db->from($table->get_table());

        $this->db->where(array($table->get_type()=>'name_system'));

        $method_array = new method_array($this->db->get()->result_array());

        return $method_array->array_shift();

    }

    public function get_information()
    {

        $table = new tbl_system();

        $this->db->select('*');

        $this->db->from($table->get_table());

        $this->db->where(array($table->get_type()=>'Information_footer'));

        $method_array = new method_array($this->db->get()->result_array());

        return $method_array->array_shift();

    }
    public function get_full_information()
    {

        $table = new tbl_system();

        $this->db->select('*');

        $this->db->from($table->get_table());

        $this->db->where(array($table->get_type()=>'full_information'));

        $method_array = new method_array($this->db->get()->result_array());

        return $method_array->array_shift();

    }

    public function get_about_us()
    {

        $table = new tbl_system();

        $this->db->select('*');

        $this->db->from($table->get_table());

        $this->db->where(array($table->get_type()=>'About_Us'));

        $method_array = new method_array($this->db->get()->result_array());

        return $method_array->array_shift();

    }

    public function get_name_system_short()
    {

        $table = new tbl_system();

        $this->db->select($table->get_value());

        $this->db->from($table->get_table());

        $this->db->where(array($table->get_type()=>'Name_system_short'));

        $method_array = new method_array($this->db->get()->result_array());

        return $method_array->array_shift_double();

    }

    public function get_about_us_page(){

        $table = new tbl_system();

        $this->db->select($table->get_value());

        $this->db->from($table->get_table());

        $this->db->where(array($table->get_type()=>'about_us_page'));

        $method_array = new method_array($this->db->get()->result_array());

        return $method_array->array_shift_double();

    }




}