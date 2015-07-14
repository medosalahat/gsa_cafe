<?php
Class admin_md extends CI_Model
{
    private $tbl;

    private $data;

    private $where;

    function __construct($tbl = null , $data = null,$where = null )
    {
        parent::__construct();

        $this->tbl = $tbl;

        $this->where = $where ;

        $this->data = $data;

    }

    public function get_is_exists(){

        $this->db->select($this->data);

        $this->db->from($this->tbl);

        $this->db->where($this->where);

        $method_array = new method_array($this->db->get()->result_array());

        return $method_array->array_shift_double();

    }


    public function change(){

        $this->db->where($this->where);

        $this->db->update($this->tbl, $this->data);

        return $this->db->affected_rows();

    }

    public function delete(){

        $this->db->where($this->where);

        $this->db->delete($this->tbl);

        return $this->db->affected_rows();

    }

    public function add(){

        $this->db->insert($this->tbl, $this->data);

        $insert_id = $this->db->insert_id();

        $this->db->trans_complete();

        return $insert_id;

    }
    public function get_where(){

        $this->db->select($this->data);

        $this->db->from($this->tbl);

        $this->db->where($this->where);

        return $this->db->get()->result_array();

    }

    public function get(){

        $this->db->select($this->data);

        $this->db->from($this->tbl);

        return $this->db->get()->result_array();

    }

}