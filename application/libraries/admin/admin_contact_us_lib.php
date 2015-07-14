<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class admin_contact_us_lib
{
    private $CI;

    private $data;

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->model('admin/contact_us/contact_us_md');

    }

    public function render_contact_us_json_encode()
    {
        $tbl = new tbl_contact_us();

        $md = new contact_us_md($tbl->get_table(),'*',null);

        echo json_encode($md->get());
    }



    public function delete_contact_us(){

        $tbl = new tbl_contact_us();

        $method_url = new method_url('id');

        $id = $method_url->post();

        $md = new contact_us_md($tbl->get_table(), null, array($tbl->get_id() => $id));

        $md->delete();
    }


}