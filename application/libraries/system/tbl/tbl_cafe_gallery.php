<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class tbl_cafe_gallery
{

    public function get_table()                     {      return $this->Table;                            }

    public function get_id()                        {      return $this->id;                               }

    public function get_id_cafe()                   {      return $this->id_cafe;                          }

    public function get_image()                   {      return $this->image;                          }

    public function get_status()                   {      return $this->status;                          }


    private $Table          = 'gsa_cafe_gallery';

    private $id             = 'id';

    private $image        = 'image';

    private $id_cafe     = 'id_cafe';

    private $status       = 'status';

}