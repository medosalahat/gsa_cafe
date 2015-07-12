<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class tbl_serves
{

    public function get_table()                     {      return $this->Table;                            }

    public function get_id()                        {      return $this->id;                               }

    public function get_name()                      {      return $this->name_serves;                      }

    public function get_type()                      {      return $this->type_serves;                      }

    public function get_status()                    {      return $this->status;                           }


    private $Table          = 'gsa_serves';

    private $id             = 'id';

    private $name_serves    = 'name_serves';

    private $type_serves    = 'type_serves';

    private $status         = 'status';

}