<?php
Class Get_slider extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('system/tbl/tbl_slider');

    }

    public function GET_DB()
    {

        $TABLE=$this->tbl_slider->get_table();

        $this->db->select('*');

        $this->db->from($TABLE);

        return $this->db->get()->result_array();

    }




}