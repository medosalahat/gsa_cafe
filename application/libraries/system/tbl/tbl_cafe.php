<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class tbl_cafe
{

    public function get_table()                     {      return $this->Table;                            }

    public function get_id()                        {      return $this->id;                               }

    public function get_name()                      {      return $this->name;                             }

    public function get_logo()                      {      return $this->logo;                             }

    public function get_description()               {      return $this->description;                      }

    public function get_short_description()         {      return $this->short_description	;              }

    public function get_phone()                     {      return $this->phone	;                          }

    public function get_comment()                   {      return $this->comment;                          }

    public function get_mobile()                    {      return $this->mobile;                           }

    public function get_mobile_two()                {      return $this->mobile_two;                       }

    public function get_x_map()                {      return $this->x_map;                       }

    public function get_y_map()                   {      return $this->y_map;                          }

    public function get_main_page()                 {      return $this->main_page;                        }

    public function get_status()                    {      return $this->status;                           }

    public function get_full_address()              {      return $this->full_address;                     }


    private $Table               = 'gsa_cafe';

    private $id                  = 'id';

    private $name                = 'name';

    private $logo                = 'logo';

    private $description         = 'description';

    private $short_description	 = 'short_description';

    private $mobile	             = 'mobile';

    private $mobile_two	         = 'mobile_two';

    private $x_map	         = 'x_map';

    private $y_map             = 'y_map';

    private $full_address        = 'full_address';

    private $main_page           = 'main_page';

    private $phone	             = 'phone';

    private $comment             = 'comment';

    private $status              = 'status';

}