<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class blog_lib
{
    private $CI ;

    private $ID;

    public function __construct($ID = null)
    {
        $this->CI = &get_instance();

        $this->ID = $ID;

    }

    public function get_main_blog(){

        $models = new Get_blog();

        return $models->get_limit_five();

    }

    public function get_all_blog(){

        $models = new Get_blog();

        return $models->get_all_blog();
    }

    public function check_is_set_id(){

        $models = new validation_blog($this->ID);

        $table = new tbl_blog();

        $array = new method_array($models->get_validation_id() , $table->get_id());

        return $array->index_exists();
    }

    public function get_this_blog(){

        $models = new Get_blog($this->ID);

        return $models->get_this_blog();


    }
}