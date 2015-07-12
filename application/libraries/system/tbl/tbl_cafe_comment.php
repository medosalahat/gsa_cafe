<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class tbl_cafe_comment
{

    public function get_table()                     {      return $this->Table;                            }

    public function get_id()                        {      return $this->id;                               }

    public function get_id_cafe()                   {      return $this->id_cafe;                          }

    public function get_id_user()                   {      return $this->id_user;                          }

    public function get_comment()                   {      return $this->comment;                          }

    public function get_date_in()                   {      return $this->date_in;                          }



    private $Table          = 'gsa_cafe_comment';

    private $id             = 'id';

    private $id_user        = 'id_user';

    private $id_cafe        = 'id_cafe';

    private $comment        = 'comment';

    private $date_in        = 'date_in';


}