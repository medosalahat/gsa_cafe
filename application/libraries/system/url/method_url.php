<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class method_url
{
    private $CI;

    private $index;

    public function __construct($index = null)
    {
        $this->CI = &get_instance();

        $this->index = $index ;

    }

    public function is_set_method_get( )
    {

        if ( $this->index == null ) {

            return false;

        } else {

            if ( isset($_GET[$this->index]) ) {

                return true;
            }

            return false;

        }

    }

    public function empty_method_get()
    {

        if ( $this->index == null ) {

            return false;

        } else {

            if ( empty($_GET[$this->index]) and $_GET[$this->index] == '') {

                return false;

            } else {

                return true;

            }
        }

    }

    public function get(){

        return $_GET[$this->index];
    }

    public function post(){

        return $_POST[$this->index];

    }

    public function is_set_method_post()
    {


        if ( $this->index == null ) {

            return false;

        } else {

            if ( isset($_POST[$this->index]) ) {

                return true;
            }

            return false;

        }

    }

    public function empty_method_post()
    {

        if ( $this->index == null ) {

            return false;

        } else {

            if ( empty($_POST[$this->index]) and $_POST[$this->index] == '') {

                return false;

            } else {

                return true;

            }
        }

    }

    public function redirect_link(){

        redirect($this->index);
    }

    public function get_data_encode_md5($value = null){

        return md5('GsA'.$value.'2015-12-7');
    }
}