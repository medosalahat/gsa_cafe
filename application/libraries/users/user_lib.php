<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class user_lib
{
    private $CI ;

    private $face ;

    private $data ;

    public function __construct($data = null)
    {
        $this->CI = &get_instance();

        $this->face =  new facebook(array(
            'appId' => '256107351210914',
            'secret' => '20ba84b28271506d0f8c58dc03f98a1d',
        ));

        $this->data = $data;

    }

    public function is_login(){

        $user= $this->face->getUser();

        return $user;


    }

    public function get_login(){

        $user= $this->face->getUser();

        if ($user) {
            try {
           return     $data['user_profile'] = $this->face->api('/me');
            } catch (FacebookApiException $e) {
                $user = null;
            }
        }else {
            $this->face->destroySession();
        }

        if ($user) {

         return   $data['logout_url'] = site_url('welcome/logout');

        } else {
          return  $data['login_url'] = $this->face->getLoginUrl(array(
                'redirect_uri' => site_url('site/test'),
                'scope' => array("email",'public_profile')
            ));
        }

    }

    public function get_link_login_facebook(){

        $user= $this->face->getUser();

        $session = new ses_system();

        $session->set_current_url(base_url());

        if ($user) {

            return   $data['logout_url'] = site_url('welcome/logout');

        } else {

            return  $data['login_url'] = $this->face->getLoginUrl(

                array('redirect_uri' => site_url('site/get_login'),
                    'scope' =>
                        array(
                            "email",'public_profile','user_birthday',
                            'user_education_history','user_events',
                            'user_hometown','user_interests','user_likes',
                            'user_location','user_photos')
                )
            );
        }
    }

    public function logout(){

        $this->face->destroySession();
    }

    public function register_new_user(){

        $tbl_user =new tbl_users();

        $session = new ses_system();

        $user = $this->data;

        $data = array(
            $tbl_user->get_id_fb()=>$user['id'],
            $tbl_user->get_birthday()=>$user['birthday'],
            $tbl_user->get_email()=>$user['email'],
            $tbl_user->get_name()=>$user['name'],
            $tbl_user->get_image()=>'graph.facebook.com/'.$user['id'].'/picture',
            $tbl_user->get_level()=>4,
            $tbl_user->get_status()=>1,
            $tbl_user->get_login_ip()=>$session->get_ip_address()
        );

        $models = new get_user($data , $tbl_user->get_table());



        return $models->register_new_user()==true ? true : false;

    }

    public function check_user_exists(){

        $models = new get_user($this->data);

        return $models->check_user_exists()==true ? true : false;


    }

    public function get_id_user(){

        $models = new get_user($this->data);

        return $models->get_id();
    }




}