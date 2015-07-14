<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class function_user
{
    private $CI;

    private $password;

    private $email;

    private $data;

    public function __construct($email = null, $password = null)
    {
        $this->CI = &get_instance();

        $this->password = $password;

        $this->email = $email;
    }

    public function fun_login()
    {

        $method_url = new method_url($this->email);

        if (($method_url->is_set_method_post() and $method_url->is_set_method_post())) {
            $this->data = true;
        } else {
            $this->data = false;
            $this->print_valid(false, 'error input email !!!!');
            die();
        }

        $method_url = new method_url($this->password);

        if (($method_url->is_set_method_post() and $method_url->is_set_method_post())) {
            $this->data = true;
        } else {
            $this->data = false;
            $this->print_valid(false, 'error input password !!!!');
            die();
        }

        if ($this->data) {

            $this->CI->load->model('admin/user/user_md');

            $table = new tbl_users();

            $method_url = new method_url($this->email);

            $this->email = $method_url->post();

            $method_url = new method_url($this->password);

            $this->password = $method_url->get_data_encode_md5($method_url->post());

            $model = new user_md(

                array(
                    $table->get_id(),

                    $table->get_name(),

                    $table->get_image(),

                ),
                $table->get_table()
            );

            $data = $model->get_exists(array(

                $table->get_email() => $this->email,

                $table->get_password() => $this->password

            ));

            $array = new method_array();

            if ($array->array_empty($data)) {


                $array = new method_array($data, $table->get_id());

                if ($array->index_exists()) {

                    $this->print_valid(true,'Welcome '.$data[$table->get_name()]);

                    $session = new ses_system();

                    $session->set_is_login();

                    $session->set_id($data[$table->get_id()]);

                } else {

                    $this->print_valid(false, 'Password or email incorrect  !!!!');

                }

            } else {

                $this->print_valid(false, 'Password or email incorrect  !!!!');


            }

        } else {

            $this->print_valid(false, 'error input  !!!!');
        }
    }

    private function print_valid($valid = null, $message = null)

    {

        echo json_encode(array('valid' => $valid, 'message' => $message));
    }


}