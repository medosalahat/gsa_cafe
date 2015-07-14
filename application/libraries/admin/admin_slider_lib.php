<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class admin_slider_lib
{
    private $CI;

    private $data;

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->model('admin/slider/admin_slider_md');
    }

    public function render_slider_json_encode()
    {
        $tbl = new tbl_slider();

        $md = new admin_slider_md($tbl->get_table(),'*',null);

        echo json_encode($md->get());
    }

    public function delete_slider(){

        $tbl = new tbl_slider();

        $method_url = new method_url('id');

        $id = $method_url->post();

        $md = new admin_slider_md($tbl->get_table(), null, array($tbl->get_id() => $id));

        $md->delete();
    }

    public function change_slider_status(){

        $tbl = new tbl_slider();

        $method_url = new method_url('id');

        $id = $method_url->post();

        $method_url = new method_url('status');

        $status = $method_url->post();

        $md = new cafe_md($tbl->get_table(), array($tbl->get_display() => $status), array($tbl->get_id() => $id));

        $md->change();
    }

    public function add_slider_info(){

        $tbl = new tbl_slider();

        $method_url = new method_url('add_' . $tbl->get_title());

        if (($method_url->is_set_method_post() and $method_url->is_set_method_post())){$this->data=true;}else{die();}

        $title = $method_url->post();


        $method_url = new method_url('add_' . $tbl->get_text());

        if (($method_url->is_set_method_post() and $method_url->is_set_method_post())){$this->data = true;}else{die();}

        $text = $method_url->post();

        $md = new admin_slider_md($tbl->get_table(),
            array(
                $tbl->get_title() => $title,
                $tbl->get_text() => $text,
                $tbl->get_image()=>'test_image.jp',
                $tbl->get_display()=>0
            )
            , null);


        if ($md->add()) {

            echo json_encode(array('valid' => true, 'message' => 'Done :)'));
        } else {
            echo json_encode(array('valid' => false, 'message' => 'error save :)'));
        }


    }

    public function change_image_slider(){


        $tbl = new tbl_slider();

        $method_url = new method_url('upload_' . $tbl->get_id());

        $id = $method_url->post();

        $this->CI->load->library('system/image/upload_image');

        $md = new admin_slider_md($tbl->get_table(), array($tbl->get_image()), array($tbl->get_id() => $id));

        $old = $md->get_is_exists();

        if (!empty($old)) {

            $lib = new upload_image('upload_file', 'include/img/slider/');

            $data = $lib->move_file();

            $md = new cafe_md($tbl->get_table(), array($tbl->get_image() => $data['file']), array($tbl->get_id() => $id));

            if ($md->change()) {

                $lib = new upload_image($old);

                if ($lib->remove_file()) {

                    echo json_encode(array('valid' => true, 'message' => 'Done :)'));

                } else {

                    echo json_encode(array('valid' => true, 'message' => 'Done :) without remove old'));
                }
            } else {

                echo json_encode(array('valid' => false, 'message' => 'Error :('));

            }

        } else {

            echo json_encode(array('valid' => false, 'message' => 'Error :('));

        }


    }


}