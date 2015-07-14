<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class ses_system
{
    private $CI ;

    private $data ;

    public function __construct($data = null)
    {
        $this->CI = &get_instance();

        $this->data = $data;



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

    public function set_is_login(){

        $_SESSION["SYSTEM"] = true;
    }

    public function get_is_login(){

        if(isset($_SESSION["SYSTEM"])){

            if($_SESSION["SYSTEM"])
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else{
            return false;
        }

    }

    public function set_id($id){

        $_SESSION["id_user"] = $id;
    }

    public function get_id(){

        if(isset($_SESSION["id_user"])){

            return $_SESSION["id_user"];
        }
        else{
            return false;
        }


    }

    function unset_is_login()
    {

        $_SESSION["SYSTEM"] =false;

    }

    public function set_id_user($id){

        $this->CI->session->set_userdata('id_fb',$id);

    }

    public function get_id_user(){

        return $this->CI->session->userdata('id_fb');

    }

    function unset_is_id()
    {

        $this->CI->session->unset_userdata('id_fb');

    }

    function get_ip_address()
    {
        return $this->CI->input->ip_address();
    }

}