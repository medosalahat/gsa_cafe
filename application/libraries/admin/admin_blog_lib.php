<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class admin_blog_lib
{
    private $CI;

    private $data;

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->model('admin/blog/blog_md');

    }

    public function render_blog_json_encode()
    {
        $tbl = new tbl_blog();

        $md = new blog_md($tbl->get_table(),'*',null);

        echo json_encode($md->get());
    }

    public function change_blog_status(){

        $tbl = new tbl_blog();

        $method_url = new method_url('id');

        $id = $method_url->post();

        $method_url = new method_url('status');

        $status = $method_url->post();

        $md = new cafe_md($tbl->get_table(), array($tbl->get_status() => $status), array($tbl->get_id() => $id));

        $md->change();

    }

    public function change_blog_main_page(){

        $tbl = new tbl_blog();

        $method_url = new method_url('id');

        $id = $method_url->post();

        $method_url = new method_url('status');

        $status = $method_url->post();

        $md = new cafe_md($tbl->get_table(), array($tbl->get_main_page() => $status), array($tbl->get_id() => $id));

        $md->change();


    }

    public function delete_blog(){

        $tbl = new tbl_blog();

        $method_url = new method_url('id');

        $id = $method_url->post();

        $md = new cafe_md($tbl->get_table(), null, array($tbl->get_id() => $id));

        $md->delete();
    }

    public function update_blog_info(){

        $tbl = new tbl_blog();

        $method_url = new method_url('edit_' . $tbl->get_id());

        $id = $method_url->post();

        if (($method_url->is_set_method_post() and $method_url->is_set_method_post())) {
            $this->data = true;
        } else {
            die();
        }

        $md = new cafe_md($tbl->get_table(), array($tbl->get_id()), array($tbl->get_id() => $id));

        $row = $md->get_is_exists();

        if (!empty($row)) {

            $method_url = new method_url('edit_' . $tbl->get_text());

            if (($method_url->is_set_method_post() and $method_url->is_set_method_post())) {
                $this->data = true;
            } else {
                die();
            }

            $text = $method_url->post();


            $method_url = new method_url('edit_' . $tbl->get_title());

            if (($method_url->is_set_method_post() and $method_url->is_set_method_post())) {
                $this->data = true;
            } else {
                die();
            }

            $title = $method_url->post();

            $md = new cafe_md($tbl->get_table(),
                array(
                    $tbl->get_text() => $text,
                    $tbl->get_title() => $title,
                )
                , array($tbl->get_id() => $id));


            if ($md->change()) {

                echo json_encode(array('valid' => true, 'message' => 'Done :)'));
            } else {
                echo json_encode(array('valid' => false, 'message' => 'No Updated :)'));
            }

        } else {
            echo json_encode(array('valid' => false, 'message' => 'id dose not exists :)'));
        }
    }

    public function change_image_blog(){


        $tbl = new tbl_blog();

        $method_url = new method_url('upload_' . $tbl->get_id());

        $id = $method_url->post();

        $this->CI->load->library('system/image/upload_image');

        $md = new cafe_md($tbl->get_table(), array($tbl->get_image()), array($tbl->get_id() => $id));

        $old = $md->get_is_exists();

        if (!empty($old)) {

            $lib = new upload_image('upload_file', 'include/image_blog/');

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

    public function add_blog_info(){

        $tbl = new tbl_blog();

        $session = new ses_system();


        $method_url = new method_url('add_' . $tbl->get_text());

        if (($method_url->is_set_method_post() and $method_url->is_set_method_post())) {
            $this->data = true;
        } else {
            die();
        }

        $get_text = $method_url->post();

        $method_url = new method_url('add_' . $tbl->get_title());

        if (($method_url->is_set_method_post() and $method_url->is_set_method_post())) {
            $this->data = true;
        } else {
            die();
        }

        $get_title = $method_url->post();

        $md = new cafe_md($tbl->get_table(),
            array(
                $tbl->get_text() => $get_text,
                $tbl->get_title() => $get_title,
                $tbl->get_status()=>1,
                $tbl->get_date_in()=>$session->get_datetime(),
                $tbl->get_image()=>'test'
            )
            , null);


        if ($md->add()) {

            echo json_encode(array('valid' => true, 'message' => 'Done :)'));
        } else {
            echo json_encode(array('valid' => false, 'message' => 'error save :)'));
        }
    }


}