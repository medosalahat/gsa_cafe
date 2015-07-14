<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller
{
    private $page;

    private $data;

    public function __construct()
    {
        parent::__construct();

        $session = new ses_system();

        if(!$session->get_is_login()){

            $url = new method_url('admin/login');

            $url->redirect_link();
        }

         $this->page = new render_admin();
    }

    public function index()
    {

         $this->page->render_index();

    }

    public function logout(){

        $session = new ses_system();

        $session->unset_is_login();

        $url = new method_url('admin/login');

        $url->redirect_link();

    }

    public function cafe(){

        $this->page->render_cafe();
    }

    public function get_cafe(){

        $this->load->library('admin/admin_cafe_lib');

        $lib = new admin_cafe_lib();

        $lib->render_cafe_json_encode();

    }

    public function change_cafe_status(){

        $this->load->library('admin/admin_cafe_lib');

        $lib = new admin_cafe_lib();

        $lib->change_status();


    }

    public function change_cafe_main_page(){

        $this->load->library('admin/admin_cafe_lib');

        $lib = new admin_cafe_lib();

        $lib->change_main_page();

    }

    public function delete_cafe(){

        $this->load->library('admin/admin_cafe_lib');

        $lib = new admin_cafe_lib();

        $lib->delete_cafe();

    }

    public function change_image_cafe(){

        $this->load->library('admin/admin_cafe_lib');

        $lib = new admin_cafe_lib();

        $lib->change_image_cafe();
    }

    public function update_cafe_info(){

        $this->load->library('admin/admin_cafe_lib');

        $lib = new admin_cafe_lib();

        $lib->update_cafe_info();
    }

    public function new_cafe_info(){

        $this->load->library('admin/admin_cafe_lib');

        $lib = new admin_cafe_lib();

        $lib->new_cafe_info();

    }

    public function get_cafe_gallery(){

        $this->load->library('admin/admin_cafe_lib');

        $lib = new admin_cafe_lib();

        $lib->get_cafe_gallery();

    }

    public function change_status_gallery(){

        $this->load->library('admin/admin_cafe_lib');

        $lib = new admin_cafe_lib();

        $lib->change_status_gallery();

    }

    public function delete_image_gallery_cafe(){

        $this->load->library('admin/admin_cafe_lib');

        $lib = new admin_cafe_lib();

        $lib->delete_image_gallery_cafe();

    }

    public function new_image_gallery(){

        $this->load->library('admin/admin_cafe_lib');

        $lib = new admin_cafe_lib();

        $lib->new_image_gallery();

    }


    public function blog(){

        $this->page->render_blog();
    }

    public function get_blog(){

        $this->load->library('admin/admin_blog_lib');

        $lib = new admin_blog_lib();

        $lib->render_blog_json_encode();


    }

    public function change_blog_status(){

        $this->load->library('admin/admin_blog_lib');

        $lib = new admin_blog_lib();

        $lib->change_blog_status();

    }

    public function change_blog_main_page(){

        $this->load->library('admin/admin_blog_lib');

        $lib = new admin_blog_lib();

        $lib->change_blog_main_page();

    }

    public function delete_blog(){

        $this->load->library('admin/admin_blog_lib');

        $lib = new admin_blog_lib();

        $lib->delete_blog();

}

    public function update_blog_info(){

        $this->load->library('admin/admin_blog_lib');

        $lib = new admin_blog_lib();

        $lib->update_blog_info();

    }

    public function change_image_blog(){

        $this->load->library('admin/admin_blog_lib');

        $lib = new admin_blog_lib();

        $lib->change_image_blog();

    }

    public function add_blog_info(){

        $this->load->library('admin/admin_blog_lib');

        $lib = new admin_blog_lib();

        $lib->add_blog_info();

    }



    public function contact_us(){

        $this->page->render_contact_us();
    }

    public function get_contact_us(){

        $this->load->library('admin/admin_contact_us_lib');

        $lib = new admin_contact_us_lib();

        $lib->render_contact_us_json_encode();


    }

    public function delete_contact_us(){

        $this->load->library('admin/admin_contact_us_lib');

        $lib = new admin_contact_us_lib();

        $lib->delete_contact_us();
    }


    public function slider(){

        $this->page->render_slider();
    }

    public function get_slider(){

        $this->load->library('admin/admin_slider_lib');

        $lib = new admin_slider_lib();

        $lib->render_slider_json_encode();

    }

    public function change_slider_status(){

        $this->load->library('admin/admin_slider_lib');

        $lib = new admin_slider_lib();

        $lib->change_slider_status();

    }

    public function add_slider_info(){

        $this->load->library('admin/admin_slider_lib');

        $lib = new admin_slider_lib();

        $lib->add_slider_info();

    }

    public function delete_slider(){

        $this->load->library('admin/admin_slider_lib');

        $lib = new admin_slider_lib();

        $lib->delete_slider();
    }

    public function change_image_slider(){

        $this->load->library('admin/admin_slider_lib');

        $lib = new admin_slider_lib();

        $lib->change_image_slider();
    }


    public function system(){

        $this->page->render_system();

    }

    public function get_system(){

        $this->load->library('admin/admin_system_lib');

        $lib = new admin_system_lib();

        $lib->render_system_json_encode();
    }
    public function update_system_info(){

        $this->load->library('admin/admin_system_lib');

        $lib = new admin_system_lib();

        $lib->update_system_info();

    }
}