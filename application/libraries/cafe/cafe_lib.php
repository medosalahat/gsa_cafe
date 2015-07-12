<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class cafe_lib
{
    private $CI ;

    private $ID ;

    private $data;

    public function __construct($ID = null)
    {
        $this->CI = &get_instance();

        $this->ID = $ID;

    }

    public function __toString(){

        return (string) $this->check_is_set_id();

    }

    public function get_main_cafe(){

        $models = new Get_cafe();

        return $models->get_limit_five();

    }

    public function get_all_cafe(){

        $models = new Get_cafe();

        return $models->get_all();

    }

    public function check_is_set_id(){

         $models = new validation_cafe($this->ID);

         $table = new tbl_cafe();

         $array = new method_array($models->get_validation_id() , $table->get_id());

        return $array->index_exists();

    }

    public function get_this_cafe(){

        $models = new Get_cafe($this->ID);

        return $models->get_this_cafe();
    }

    public function get_cafe_gallery(){

        $models = new Get_cafe($this->ID);

        return $models->get_cafe_gallery();

    }

    public function get_cafe_comment(){

        $models = new Get_cafe($this->ID);

        return $models->get_cafe_comment();

    }

    public function set_new_comment(){

        $method_url = new method_url('id_cafe');

        $this->data = false;

        if(($method_url->is_set_method_post() and $method_url->is_set_method_post())){
            $this->data = true;
        }
        else{
            $this->data =false;
        }

        $method_url = new method_url('comment');

        if($method_url->is_set_method_post() and $method_url->is_set_method_post()){

            $this->data = true;
        }
        else{
            $this->data = false;
        }

        if($this->data){

            $table = new tbl_cafe_comment();

            $session = new ses_system();

            $method_url = new method_url('id_cafe');

            $id = $method_url->post();

            $method_url = new method_url('comment');

            $comment = $method_url->post();

            $id_user = new user_lib($session->get_id_user());

            $models = new get_cafe(null , $table->get_table(),array(
                $table->get_id_cafe()=>$id,
                $table->get_comment()=>$comment,
                $table->get_id_user()=>$id_user->get_id_user(),
                $table->get_date_in()=>$session->get_datetime()
            ));

           echo json_encode( array ( 'valid' => $models->set_new_comment() ) );

        }
        else{
            echo json_encode(array('valid'=>'error input !!!!'));
        }


    }
}