<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class contact_lib
{
    private $CI ;

    private $ID ;

    private $data;

    public function __construct($ID = null)
    {
        $this->CI = &get_instance();

        $this->ID = $ID;
    }

    public function set_new_contact(){

        $this->data = false;

        $method_url = new method_url('name');

        if(($method_url->is_set_method_post() and $method_url->is_set_method_post()))
        { $this->data = true; }else  {$this->data =false;echo json_encode(array('valid'=>'error name input !!!!'));die(); }

        $method_url = new method_url('email');

        if(($method_url->is_set_method_post() and $method_url->is_set_method_post()))
        { $this->data = true; }else  {$this->data =false;echo json_encode(array('valid'=>'error email input !!!!'));die(); }


        $method_url = new method_url('mobile');

        if(($method_url->is_set_method_post() and $method_url->is_set_method_post()))
        { $this->data = true; }else  {$this->data =false;echo json_encode(array('valid'=>'error mobile input !!!!'));die(); }

        $method_url = new method_url('message');

        if(($method_url->is_set_method_post() and $method_url->is_set_method_post()))
        { $this->data = true; }else  {$this->data =false;echo json_encode(array('valid'=>'error message input !!!!'));die(); }


        if($this->data){

            $table = new tbl_contact_us();

            $session = new ses_system();

            $method_url = new method_url('name');

            $name = $method_url->post();

            $method_url = new method_url('email');

            $email = $method_url->post();

            $method_url = new method_url('mobile');

            $mobile = $method_url->post();

            $method_url = new method_url('message');

            $message = $method_url->post();


            $models = new set_contact($table->get_table(),array(
                $table->get_name()=>$name,
                $table->get_email()=>$email,
                $table->get_mobile()=>$mobile,
                $table->get_message()=>$message,
                $table->get_ip()=>$session->get_ip_address()
            ));

           echo json_encode( array ( 'valid' => $models->set_new() ) );

        }
        else{
            echo json_encode(array('valid'=>'error input !!!!'));
        }


    }
}