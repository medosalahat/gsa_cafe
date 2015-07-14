<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Test extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();


        $lib = new test_lib();

        $lib->get_user();


    }

    public function index(){

    }

}