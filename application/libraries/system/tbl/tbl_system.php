<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class tbl_system
{

    public function get_table()                     {      return $this->Table;                            }

    public function get_id()                        {      return $this->id;                               }

    public function get_type()                      {      return $this->type;                             }

    public function get_value()                     {      return $this->value;                            }


    private $Table   = 'gsa_system_requirements';

    private $id      = 'id';

    private $type    = 'type';

    private $value   = 'value';

}