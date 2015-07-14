<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class dashboard
{
    private $CI;

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->model('admin/cafe/comment/get_comment_md');

        $this->CI->load->model('admin/cafe/cafe_md');

        $this->CI->load->model('admin/user/user_md');

        $this->CI->load->model('admin/slider/slider_md');

    }

    public function get_cafe(){

        $md = new cafe_md();

        return $md->get_all_cafe();
    }

    public function get_new_comment_cafe(){

        $md = new get_comment_md();

        return $md->get_number_comment();

    }

    public function get_user(){

        $tbl = new tbl_users();

        $md = new user_md('count('.$tbl->get_id().') counter',$tbl->get_table());

        return $md->get_all_user();
    }

    public function get_slider(){

        $tbl = new tbl_slider();

        $md = new slider_md('count('.$tbl->get_id().') counter',$tbl->get_table());

        return $md->get_slider();


    }




}