<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class admin_system_lib
{
    private $CI;

    private $data;

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->model('admin/system/admin_md');
    }

    public function render_system_json_encode()
    {
        $tbl = new tbl_system();

        $md = new admin_md($tbl->get_table(),'*',null);

        echo json_encode($md->get());
    }

    public function update_system_info(){

        $tbl = new tbl_system();

        $method_url = new method_url('edit_' . $tbl->get_id());

        if (($method_url->is_set_method_post() and $method_url->is_set_method_post())){$this->data=true;}else{die();}

        $get_id = $method_url->post();


        $method_url = new method_url('edit_' . $tbl->get_type());

        if (($method_url->is_set_method_post() and $method_url->is_set_method_post())){$this->data = true;}else{die();}

        $get_type = $method_url->post();


        $method_url = new method_url('edit_' . $tbl->get_value());

        if (($method_url->is_set_method_post() and $method_url->is_set_method_post())){$this->data = true;}else{die();}

        $get_value = $method_url->post();


        $md = new admin_md($tbl->get_table(),
            array(
                $tbl->get_value() => $get_value,
            )
            , array($tbl->get_id()=>$get_id));


        if ($md->change()) {

            echo json_encode(array('valid' => true, 'message' => 'Done :)'));
        } else {
            echo json_encode(array('valid' => false, 'message' => 'error save :)'));
        }



    }


}