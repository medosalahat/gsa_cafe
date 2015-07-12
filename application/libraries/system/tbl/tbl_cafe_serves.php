<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class tbl_cafe_serves
{

    public function get_table()                     {      return $this->Table;                            }

    public function get_id()                        {      return $this->id;                               }

    public function get_id_cafe()                   {      return $this->id_cafe;                          }

    public function get_image()                     {      return $this->image;                            }

    public function get_title()                     {      return $this->title;                            }

    public function get_description()               {      return $this->description;                      }

    public function get_status()                    {      return $this->status;                           }


    private $Table          = 'gsa_pages';

    private $id             = 'id';

    private $id_cafe        = 'id_cafe';

    private $image          = 'image';

    private $title          = 'title';

    private $description    = 'description';

    private $status         = 'status';

}