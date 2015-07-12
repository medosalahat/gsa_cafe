<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class template_render
{
    private $CI ;

    private $DATA;

    private $__DIRECTORY;

    private $__FILE_HTML  = 'html';

    private $__FILE_CSS  = 'css';

    private $__FILE_JS  = 'js';

    private $__REGION;

    private $__TITLE;

    private $__active;

    public function __construct( $DIRECTORY = null , $REGION = null , $title = null ,$active = null)
    {
        $this->CI = &get_instance();

        $this->__DIRECTORY = $DIRECTORY;

        $this->__REGION = $REGION;

        $this->__TITLE = $title;

        $this->__active = $active;
    }

    public function render_page()
    {


       // $this->CI->template->write('title',$this->__TITLE);

        $this->CI->template->write_view($this->__GET_REGION(),$this->___GET_VIEW_HTML(),$this->get_data());

        $this->CI->template->write_view($this->__GET_REGION(),$this->__GET_VIEW_CSS(),$this->get_data());

        $this->CI->template->write_view($this->__GET_REGION(),$this->__GET_VIEW_JS(),$this->get_data());


    }
    public function title($title = null){

        $this->CI->template->write('title',$title);
    }

    public function render(){

        $this->CI->template->render();
    }

    public function set_data($DATA,$INDEX){

        $this->DATA[$INDEX] = $DATA;
    }

    public function get_data(){

        return $this->DATA;
    }

    public function __GET_DIRECTORY(){

        return $this->__DIRECTORY;
    }

    public function __GET_REGION(){

        return $this->__REGION;
    }

    public function ___GET_VIEW_HTML(){

        return $this->__GET_DIRECTORY().'/'.$this->__FILE_HTML;
    }

    public function __GET_VIEW_CSS(){

        return $this->__GET_DIRECTORY().'/'.$this->__FILE_CSS;
    }

    public function __GET_VIEW_JS(){

        return $this->__GET_DIRECTORY().'/'.$this->__FILE_JS;
    }





}