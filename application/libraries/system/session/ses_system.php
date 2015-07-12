<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class ses_system
{
    private $CI ;

    public function __construct()
    {
        $this->CI = &get_instance();



    }

    public function get_date()
    {
        return  date('Y-m-d');
    }
    public function get_datetime(){

        return date('Y-m-d  H:i:s');
    }

    public function set_current_url($url){

        $this->CI->session->set_userdata('current_url',$url);

    }

    public function get_current_url(){

        return $this->CI->session->userdata('current_url');

    }

    public function set_id_user($id){

        $this->CI->session->set_userdata('id_fb',$id);

    }

    public function get_id_user(){

        return $this->CI->session->userdata('id_fb');

    }

    function get_ip_address()
    {
        return $this->CI->input->ip_address();
    }

}