<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class render_page
{
    private $CI ;

    private $temp ;

    private $data ;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    private function header($name_page = null){

        $this->temp = new template_render('template/menu','header');

        $system = new system_requirements_lib();

        $this->temp->title($system->get_name_system_short().$name_page);

        $this->temp->set_data($system->get_name_site(),'name_site');

        $this->temp->set_data($this->is_login(),'is_login');

        $this->temp->set_data($this->get_link_login_facebook(),'link_login');

        $this->temp->render_page();

    }

    private function slider(){

        $this->temp = new template_render('template/slider','slider');

        $slider = new slider_lib();

        $this->temp->set_data($slider->get_slider(),'slider');

        $this->temp->render_page();

    }

    private function footer(){

        $system = new system_requirements_lib();

        $this->temp = new template_render('template/footer','footer');

        $this->temp->set_data($system->get_information(),'Information_footer');

        $this->temp->set_data($system->get_about_us(),'About_Us');

        $this->temp->render_page();
    }

    private function tab(){

        $system = new system_requirements_lib();

        $blog = new blog_lib();

        $this->temp = new template_render('template/tab','tab');

        $this->temp->set_data($system->get_about_us(),'About_Us');

        $this->temp->set_data($blog->get_main_blog(),'blog');

        $this->temp->render_page();
    }

    public function render_index(){

        $this->header('Home Page');

        $this->slider();

        $cafe = new cafe_lib();

        //$this->temp = new template_render('template/index','column');

        //$this->temp->render_page();

        $this->temp = new template_render('template/service','service');

        $this->temp->set_data($cafe->get_main_cafe(),'cafe');

        $this->temp->render_page();

        $this->tab();

        $this->footer();

        $this->temp->render();

    }

    public function render_all_cafe(){

        $this->header('our cafe');

        $cafe = new cafe_lib();

        $this->temp = new template_render('template/all_cafe','column');

        $this->temp->set_data($cafe->get_all_cafe(),'cafe');

        $this->temp->render_page();

        $this->tab();

        $this->footer();

        $this->temp->render();

    }

    public function render_this_blog(){

        $method_url = new method_url('id');

        if($method_url->is_set_method_get() and $method_url->empty_method_get()){

            $lib = new blog_lib($method_url->get());

            if($lib->check_is_set_id()){

                $this->set_data($lib->get_this_blog());

                $name = $this->get_data();

                $table = new tbl_blog();

                $this->header($name[$table->get_title()]);

                $this->temp = new template_render('template/single_blog','column');

                $this->temp->set_data($lib->get_this_blog(),'blog');

                $this->temp->render_page();

                $this->tab();

                $this->footer();

                $this->temp->render();

            }
            else{

                show_404('errors/error_general',false);
            }

        }
        else{

            show_404('errors/error_general',false);

        }
    }

    public function render_cafe(){

        $method_url = new method_url('id');

        if($method_url->is_set_method_get() and $method_url->empty_method_get()){

             $lib = new cafe_lib($method_url->get());

            if($lib->check_is_set_id()){

                $this->set_data($lib->get_this_cafe());

                $name = $this->get_data();

                $table = new tbl_cafe();

                $this->header($name[$table->get_name()]);

                $this->temp = new template_render('template/single_cafe','column');

                $this->temp->set_data($lib->get_this_cafe(),'cafe');

                $this->temp->set_data($lib->get_cafe_gallery(),'cafe_gallery');

                $this->temp->set_data($lib->get_cafe_comment(),'cafe_comment');

                $this->temp->set_data($this->is_login(),'is_login');

                $this->temp->set_data($this->get_link_login_facebook(),'link_login');

                $this->temp->render_page();

                $this->tab();

                $this->footer();

                $this->temp->render();

            }
            else{

                show_404('errors/error_general',false);
            }
        }
        else
        {
            show_404('errors/error_general',false);
        }
    }

    public function is_login(){

        $login = new user_lib();

       return $login->is_login();
    }

    public function get_link_login_facebook(){

        $login = new user_lib();

       return $login->get_link_login_facebook();
    }

    public function render_about_us(){

        $this->header('About Us');

        $this->slider();

        $this->temp = new template_render('template/about_us','column');

        $lib = new system_requirements_lib();

        $this->temp->set_data($lib->get_name_site(),'Name_site');

        $this->temp->set_data($lib->get_about_us_page(),'about_us');

        $this->temp->render_page();

        $this->tab();

        $this->footer();

        $this->temp->render();

    }

    public function render_blog(){

        $this->header('blog');

        $blog = new blog_lib();

        $this->temp = new template_render('template/blog','column');

        $this->temp->set_data($blog->get_all_blog(),'blog');

        $this->temp->render_page();

        $this->footer();

        $this->temp->render();


    }

    public function render_contact(){



        $this->header('Contact Us');

        $this->slider();

        $this->temp = new template_render('template/contact','column');

        $lib = new system_requirements_lib();

        $this->temp->set_data($lib->get_name_site(),'Name_site');

        $this->temp->set_data($lib->get_about_us(),'About_Us');

        $this->temp->set_data($lib->get_full_information(),'Information_footer');

        $this->temp->render_page();

        $this->tab();

        $this->footer();

        $this->temp->render();

    }

    private function set_data($data){

        $this->data = $data;

    }

    private function get_data(){

        return $this->data;
    }
}