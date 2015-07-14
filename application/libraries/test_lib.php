<?php
class test_lib{

    private $data ;

    private $user_md;

    private $tbl_user ;

    public function __construct()
    {

    }

    public function get_user(){

        $this->tbl_user = new tbl_users();

        $this->user_md = new user_md(
            '*',
            $this->tbl_user->get_table()

        );

       echo "<pre>";

        foreach($this->user_md->all_user() as $row):

            print $this->tbl_user->get_id()." - ".$row[$this->tbl_user->get_id()]."</br>";

            print $this->tbl_user->get_name()." - ".$row[$this->tbl_user->get_name()]."</br>";

        endforeach;




    }


}