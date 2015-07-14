<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class tbl_cafe_serves
{

    public function get_table()                     {      return $this->Table;                            }

    public function get_id()                        {      return $this->id;                               }

    public function get_id_cafe()                   {      return $this->id_cafe;                          }

    public function get_id_serves()                 {      return $this->id_serves;                        }

    public function get_status()                    {      return $this->status;                           }


    private $Table          = 'gsa_cafe_serves';

    private $id             = 'id';

    private $id_cafe        = 'id_cafe';

    private $id_serves      = 'id_serves';

    private $status         = 'status';


}