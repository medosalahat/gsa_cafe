<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class system_requirements_lib
{
    private $CI ;

    public function __construct()
    {
        $this->CI = &get_instance();

    }

    public function get_name_site(){

        $models = new get_system_requirements();

        return $models->get_name_site();

    }

    public function get_information(){

        $models = new get_system_requirements();

        return $models->get_information();
    }
    public function get_full_information(){

        $models = new get_system_requirements();

        return $models->get_full_information();
    }

    public function get_about_us(){

        $models = new get_system_requirements();

        return $models->get_about_us();
    }



    public function get_name_system_short(){

        $models = new get_system_requirements();

        return $models->get_name_system_short();

    }

    public function get_about_us_page(){

        $models = new get_system_requirements();

        return $models->get_about_us_page();

    }
}