<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class tbl_users
{

    public function get_table()                     {      return $this->Table;                            }

    public function get_id()                        {      return $this->id;                               }

    public function get_id_fb()                     {      return $this->id_fb;                            }

    public function get_username()                  {      return $this->username;                         }

    public function get_email()                     {      return $this->email;                            }

    public function get_name()                      {      return $this->name;                             }

    public function get_password()                  {      return $this->password;                         }

    public function get_gender()                    {      return $this->gender;                           }

    public function get_birthday()                  {      return $this->birthday;                         }

    public function get_mobile()                    {      return $this->mobile;                           }

    public function get_image()                     {      return $this->image;                            }

    public function get_level()                     {      return $this->level;                            }

    public function get_login_ip()                  {      return $this->last_login;                       }

    public function get_status()                    {      return $this->status;                           }


    private $Table='gsa_users';

    private $id='id';

    private $id_fb='id_fb';

    private $username='username';

    private $email='email';

    private $name='name';

    private $password='password';

    private $gender='gender';

    private $birthday='birthday';

    private $mobile='mobile';

    private $image='image';

    private $level='level';

    private $last_login='last_login_ip';

    private $status='status';

}