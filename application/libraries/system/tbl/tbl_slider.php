<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class tbl_slider
{

    public function get_table()                     {      return $this->Table;                            }

    public function get_id()                        {      return $this->id;                               }

    public function get_text()                      {      return $this->text;                             }

    public function get_title()                     {      return $this->title;                            }

    public function get_image()                      {      return $this->image;                            }

    public function get_display()                   {      return $this->display;                          }

    private $Table   = 'gsa_slider';

    private $id      = 'id';

    private $text    = 'text';

    private $title   = 'title';

    private $image   = 'image';

    private $display = 'display';
}