<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class render_admin
{
    private $CI;

    private $temp;

    private $data;

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->library('admin/dashboard');
    }

    public function render_cafe(){

        $this->header(' Cafe');

        $this->temp =new template_admin_render('admin/cafe' , 'columns');

        $this->temp->render_page();

        $this->footer();

        $this->temp->render();

    }

    public function render_blog(){

        $this->header(' blog');

        $this->temp =new template_admin_render('admin/blog' , 'columns');

        $this->temp->render_page();

        $this->footer();

        $this->temp->render();

    }

    public function render_system(){

        $this->header(' System');

        $this->temp =new template_admin_render('admin/system' , 'columns');

        $this->temp->render_page();

        $this->footer();

        $this->temp->render();

    }

    public function render_contact_us(){

        $this->header(' Contact us');

        $this->temp =new template_admin_render('admin/contact_us' , 'columns');

        $this->temp->render_page();

        $this->footer();

        $this->temp->render();

    }

    public function render_slider(){

        $this->header(' slider');

        $this->temp =new template_admin_render('admin/slider' , 'columns');

        $this->temp->render_page();

        $this->footer();

        $this->temp->render();

    }

    public function render_login(){

        $this->temp =new template_admin_render('admin/login' , 'columns');

        $system = new system_requirements_lib();

        $this->temp->title($system->get_name_system_short().' Login Page');

        $this->temp->set_data($system->get_name_site(),'name_site');

        $this->temp->render_page();

        $this->footer();

        $this->temp->render();

    }

    public function render_index(){

        $this->header(' Dashboard');

        $this->temp =new template_admin_render('admin/index' , 'columns');

        $lib = new dashboard();

        $this->temp->set_data($lib->get_new_comment_cafe(),'get_new_comment');

        $this->temp->set_data($lib->get_user(),'get_user');

        $this->temp->set_data($lib->get_cafe(),'get_cafe');

        $this->temp->set_data($lib->get_slider(),'get_slider');

        $this->temp->render_page();

        $this->footer();

        $this->temp->render();

    }

    private function header($name_page = null){

        $this->temp = new template_admin_render('admin/menu','headers');

        $system = new system_requirements_lib();

        $this->temp->title($system->get_name_system_short().$name_page);

        $this->temp->set_data($system->get_name_site(),'name_site');

        $this->temp->render_page();

    }

    private function footer(){


        $this->temp = new template_admin_render('admin/footer','footers');

        $system = new system_requirements_lib();

        $this->temp->set_data($system->get_name_site(),'name_site');

        $this->temp->render_page();

    }
}