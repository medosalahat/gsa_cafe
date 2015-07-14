<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Site extends CI_Controller
{
    private $page;

    private $data ;

    public function __construct()
    {
        parent::__construct();

        $this->page = new render_page();
    }

    public function index(){

        $this->page->render_index();
    }

    public function cafe(){

        $this->page->render_cafe();

    }

    public function all_cafe(){

        $this->page->render_all_cafe();

    }

    public function about_us(){

        $this->page->render_about_us();

    }

    public function contact(){

        $this->page->render_contact();

    }

    public function new_user(){

        $login = new user_lib();

        $this->set_data($login->get_login());

        $register  = new user_lib($this->get_data());

        if($register->register_new_user()){

            $session = new ses_system();

            $user = $this->get_data();

            $session->set_id_user($user['id']);

            $session = new ses_system();

            $method_url =new method_url( $session->get_current_url());

            $method_url->redirect_link();
        }
        else{

            $this->get_logout();
        }
    }

    public function get_blog(){

        $this->page->render_this_blog();
    }

    public function blog(){

        $this->page->render_blog();
    }

    public function get_login(){

        $login = new user_lib();

        $session = new ses_system();

        $this->set_data($login->get_login());

        $user = $this->get_data();

        $method = new method_array($user , 'id');

        if($method->index_exists()){

            $login = new user_lib($user['id']);

            $session->set_id_user($user['id']);

            if($login->check_user_exists()){

                $method_url =new method_url(site_url());

                $method_url->redirect_link();
            }
            else{

                $method_url =new method_url('site/new_user/?');

                $method_url->redirect_link();
            }

        }
        else{

            $method_url =new method_url( $session->get_current_url());

            $method_url->redirect_link();

        }

    }

    public function get_logout(){

        $login = new user_lib();

        $login->logout();

        $session = new ses_system();

        $method_url =new method_url( $session->get_current_url());

        $method_url->redirect_link();

    }

    private function set_data( $data ){

        $this->data = $data;
    }

    private function get_data(){

        return $this->data;
    }

    public function set_new_comment(){

        $cafe = new cafe_lib();

        $cafe->set_new_comment();


    }

    public function send_contact(){

        $lib = new contact_lib();

        $lib->set_new_contact();

    }





}