<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller
{
    private $page;

    public function __construct()
    {
        parent::__construct();

        $session = new ses_system();

        if($session->get_is_login()){

            $url = new method_url('admin/home');

            $url->redirect_link();
        }

         $this->page = new render_admin();
    }

    public function index()
    {
          $this->page->render_login();
    }

    public function do_login(){


        $this->page = new function_user('email' , 'password');

        $this->page->fun_login();


    }





}