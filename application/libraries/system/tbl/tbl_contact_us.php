<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class tbl_contact_us
{

    public function get_table()                     {      return $this->Table;                            }

    public function get_id()                        {      return $this->id;                               }

    public function get_name()                     {      return $this->name;                            }

    public function get_mobile()                      {      return $this->mobile;                             }

    public function get_email()                     {      return $this->email;                            }

    public function get_message()                 {      return $this->message;                        }

    public function get_ip()                   {      return $this->ip;                          }



    private $Table          = 'gsa_contact_us';

    private $id             = 'id';

    private $name        = 'name';

    private $mobile        = 'mobile';

    private $email        = 'email';

    private $message       = 'message';

    private $ip      = 'ip';

}