<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class method_array
{
    private $CI;

    private $index;

    private $array;

    public function __construct($array = null , $index = null)
    {
        $this->CI = &get_instance();

        $this->index = $index ;

        $this->array = $array ;

    }
    public function index_exists(){

        return array_key_exists($this->index , $this->array);

    }
    public function array_shift(){

        return array_shift($this->array);

    }
    public function array_shift_double(){

        return array_shift(array_shift($this->array));

    }

    public function split_on() {

        return substr($this->array, 0 , $this->index);;

    }

    public function array_empty($array = null){

        return !empty($array);
    }

}