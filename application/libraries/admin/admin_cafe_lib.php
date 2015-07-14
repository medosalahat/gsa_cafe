<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class admin_cafe_lib
{
    private $CI;

    private $data;

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->model('admin/cafe/cafe_md');

    }

    public function render_cafe_json_encode()
    {

        $md = new cafe_md();

        echo json_encode($md->get_cafe());
    }

    public function change_status()
    {

        $tbl = new tbl_cafe();

        $method_url = new method_url('id');

        $id = $method_url->post();

        $method_url = new method_url('status');

        $status = $method_url->post();


        $md = new cafe_md($tbl->get_table(), array($tbl->get_status() => $status), array($tbl->get_id() => $id));

        $md->change();


    }

    public function change_main_page()
    {

        $tbl = new tbl_cafe();

        $method_url = new method_url('id');

        $id = $method_url->post();

        $method_url = new method_url('status');

        $status = $method_url->post();


        $md = new cafe_md($tbl->get_table(), array($tbl->get_main_page() => $status), array($tbl->get_id() => $id));

        $md->change();


    }

    public function delete_cafe()
    {

        $tbl = new tbl_cafe();

        $method_url = new method_url('id');

        $id = $method_url->post();

        $md = new cafe_md($tbl->get_table(), null, array($tbl->get_id() => $id));

        $md->delete();

        $tbl = new tbl_cafe_comment();

        $md = new cafe_md($tbl->get_table(), null, array($tbl->get_id_cafe() => $id));

        $md->delete();

        $tbl = new tbl_cafe_gallery();

        $md = new cafe_md($tbl->get_table(), null, array($tbl->get_id_cafe() => $id));

        $md->delete();

        $tbl = new tbl_cafe_serves();

        $md = new cafe_md($tbl->get_table(), null, array($tbl->get_id_cafe() => $id));

        $md->delete();

    }

    public function change_image_cafe()
    {

        $tbl = new tbl_cafe();

        $method_url = new method_url('upload_' . $tbl->get_id());

        $id = $method_url->post();

        $this->CI->load->library('system/image/upload_image');

        $md = new cafe_md($tbl->get_table(), array($tbl->get_logo()), array($tbl->get_id() => $id));

        $old = $md->get_is_exists();

        if (!empty($old)) {
            $lib = new upload_image('upload_file', 'include/image_cafe/');

            $data = $lib->move_file();

            $md = new cafe_md($tbl->get_table(), array($tbl->get_logo() => $data['file']), array($tbl->get_id() => $id));

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

    public function update_cafe_info()
    {

        $tbl = new tbl_cafe();

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

            $method_url = new method_url('edit_' . $tbl->get_name());

            if (($method_url->is_set_method_post() and $method_url->is_set_method_post())) {
                $this->data = true;
            } else {
                die();
            }

            $name = $method_url->post();

            $method_url = new method_url('edit_' . $tbl->get_description());

            if (($method_url->is_set_method_post() and $method_url->is_set_method_post())) {
                $this->data = true;
            } else {
                die();
            }

            $description = $method_url->post();

            $method_url = new method_url('edit_' . $tbl->get_short_description());

            if (($method_url->is_set_method_post() and $method_url->is_set_method_post())) {
                $this->data = true;
            } else {
                die();
            }

            $short_description = $method_url->post();

            $method_url = new method_url('edit_' . $tbl->get_phone());

            if (($method_url->is_set_method_post() and $method_url->is_set_method_post())) {
                $this->data = true;
            } else {
                die();
            }

            $phone = $method_url->post();

            $method_url = new method_url('edit_' . $tbl->get_mobile());

            if (($method_url->is_set_method_post() and $method_url->is_set_method_post())) {
                $this->data = true;
            } else {
                die();
            }

            $mobile = $method_url->post();

            $method_url = new method_url('edit_' . $tbl->get_mobile_two());

            if (($method_url->is_set_method_post() and $method_url->is_set_method_post())) {
                $this->data = true;
            } else {
                die();
            }

            $mobile_two = $method_url->post();

            $method_url = new method_url('edit_' . $tbl->get_x_map());

            if (($method_url->is_set_method_post() and $method_url->is_set_method_post())) {
                $this->data = true;
            } else {
                die();
            }

            $x_map = $method_url->post();

            $method_url = new method_url('edit_' . $tbl->get_y_map());

            if (($method_url->is_set_method_post() and $method_url->is_set_method_post())) {
                $this->data = true;
            } else {
                die();
            }

            $y_map = $method_url->post();

            $md = new cafe_md($tbl->get_table(),
                array(
                    $tbl->get_name() => $name,
                    $tbl->get_description() => $description,
                    $tbl->get_short_description() => $short_description,
                    $tbl->get_phone() => $phone,
                    $tbl->get_mobile() => $mobile,
                    $tbl->get_mobile_two() => $mobile_two,
                    $tbl->get_x_map() => $x_map,
                    $tbl->get_y_map() => $y_map
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

    public function new_cafe_info()
    {

        $tbl = new tbl_cafe();


        $method_url = new method_url('new_' . $tbl->get_name());

        if (($method_url->is_set_method_post() and $method_url->is_set_method_post())) {
            $this->data = true;
        } else {
            die();
        }

        $name = $method_url->post();

        $method_url = new method_url('new_' . $tbl->get_description());

        if (($method_url->is_set_method_post() and $method_url->is_set_method_post())) {
            $this->data = true;
        } else {
            die();
        }

        $description = $method_url->post();

        $method_url = new method_url('new_' . $tbl->get_short_description());

        if (($method_url->is_set_method_post() and $method_url->is_set_method_post())) {
            $this->data = true;
        } else {
            die();
        }

        $short_description = $method_url->post();

        $method_url = new method_url('new_' . $tbl->get_phone());

        if (($method_url->is_set_method_post() and $method_url->is_set_method_post())) {
            $this->data = true;
        } else {
            die();
        }

        $phone = $method_url->post();

        $method_url = new method_url('new_' . $tbl->get_mobile());

        if (($method_url->is_set_method_post() and $method_url->is_set_method_post())) {
            $this->data = true;
        } else {
            die();
        }

        $mobile = $method_url->post();

        $method_url = new method_url('new_' . $tbl->get_mobile_two());

        if (($method_url->is_set_method_post() and $method_url->is_set_method_post())) {
            $this->data = true;
        } else {
            die();
        }

        $mobile_two = $method_url->post();

        $method_url = new method_url('new_' . $tbl->get_x_map());

        if (($method_url->is_set_method_post() and $method_url->is_set_method_post())) {
            $this->data = true;
        } else {
            die();
        }

        $x_map = $method_url->post();

        $method_url = new method_url('new_' . $tbl->get_y_map());

        if (($method_url->is_set_method_post() and $method_url->is_set_method_post())) {
            $this->data = true;
        } else {
            die();
        }

        $y_map = $method_url->post();

        $method_url = new method_url('new_' . $tbl->get_full_address());

        if (($method_url->is_set_method_post() and $method_url->is_set_method_post())) {
            $this->data = true;
        } else {
            die();
        }

        $full_address = $method_url->post();

        $md = new cafe_md($tbl->get_table(),
            array(
                $tbl->get_name() => $name,
                $tbl->get_description() => $description,
                $tbl->get_full_address() => $full_address,
                $tbl->get_short_description() => $short_description,
                $tbl->get_phone() => $phone,
                $tbl->get_mobile() => $mobile,
                $tbl->get_mobile_two() => $mobile_two,
                $tbl->get_x_map() => $x_map,
                $tbl->get_y_map() => $y_map
            )
            , null);


        if ($md->add()) {

            echo json_encode(array('valid' => true, 'message' => 'Done :)'));
        } else {
            echo json_encode(array('valid' => false, 'message' => 'error save :)'));
        }

    }



    public function get_cafe_gallery(){

        $tbl = new tbl_cafe_gallery();

        $method_url = new method_url('id');

        if (($method_url->is_set_method_post() and $method_url->is_set_method_post())) {
            $this->data = true;
        } else {
            die();
        }

        $id = $method_url->post();

        $md = new cafe_md(
            $tbl->get_table(),
            array(
                $tbl->get_id(),
                $tbl->get_image(),
                $tbl->get_status()
            )
            ,
            array(
                $tbl->get_id_cafe()=>$id
            )
        );

        echo json_encode($md->get_where());
    }

    public function change_status_gallery()
    {

        $tbl = new tbl_cafe_gallery();

        $method_url = new method_url('id');

        $id = $method_url->post();

        $method_url = new method_url('status');

        $status = $method_url->post();

        $md = new cafe_md($tbl->get_table(), array($tbl->get_status() => $status), array($tbl->get_id() => $id));

        $md->change();

    }

    public function delete_image_gallery_cafe(){

        $this->CI->load->library('system/image/upload_image');

        $tbl = new tbl_cafe_gallery();

        $method_url = new method_url('id');

        $id = $method_url->post();

        $md = new cafe_md($tbl->get_table(), array($tbl->get_image()), array($tbl->get_id() => $id));

        $old = $md->get_is_exists();
        if (!empty($old)) {

            $md = new cafe_md($tbl->get_table(), null, array($tbl->get_id() => $id));

            $md->delete();

            $lib = new upload_image($old);

            if ($lib->remove_file()) {

                echo json_encode(array('valid' => true, 'message' => 'Done :)'));

            } else {

                echo json_encode(array('valid' => true, 'message' => 'Done :) without remove old'));
            }
        }
        else{
            echo json_encode(array('valid' => false, 'message' => 'Error :('));
        }


    }

    public function new_image_gallery(){

        $tbl = new tbl_cafe_gallery();

        $method_url = new method_url('slider_' . $tbl->get_id());

        $id = $method_url->post();

        $this->CI->load->library('system/image/upload_image');

        $lib = new upload_image('slider_file', 'include/image_cafe/'.$id."/");

        $data = $lib->move_file();

        $md = new cafe_md($tbl->get_table(), array($tbl->get_image() => $data['file'],$tbl->get_id_cafe()=>$id),null);

        $md->add();

        echo json_encode(array('valid' => false, 'message' => 'done :('));

    }


}