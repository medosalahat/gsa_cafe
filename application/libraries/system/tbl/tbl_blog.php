<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class tbl_blog
{

    public function get_table()                     {      return $this->Table;                            }

    public function get_id()                        {      return $this->id;                               }

    public function get_title()                     {      return $this->title;                            }

    public function get_text()                      {      return $this->text;                             }

    public function get_image()                     {      return $this->image;                            }

    public function get_main_page()                 {      return $this->main_page;                        }

    public function get_date_in()                   {      return $this->date_in;                          }

    public function get_status()                    {      return $this->status;                           }


    private $Table          = 'gsa_blog';

    private $id             = 'id';

    private $title        = 'title';

    private $text        = 'text';

    private $image        = 'image';

    private $main_page       = 'main_page';

    private $date_in       = 'date_in';

    private $status       = 'status';

}