<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class slider_lib
{
    private $CI ;

    public function __construct()
    {

        $this->CI = &get_instance();
    }

    public function get_slider(){

        return $this->CI->get_slider->GET_DB();

    }
}