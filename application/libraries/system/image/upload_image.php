<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class upload_image
{
    private  $index ;

    private  $path ;

    public function __construct( $index = null , $path = null )
    {
        $this->CI = &get_instance();

        $this->index = $index ;

        $this->path = $path ;

    }

    public function GetTypeFile()
    {
        return $_FILES[$this->index]["type"];
    }

    public function GetErrorFile()
    {
        if ($_FILES[$this->index]["error"] > 0) {
            return $_FILES[$this->index]["error"];
        }
        return true;
    }

    public function GetNameFile()
    {
        return $_FILES[$this->index]["name"];
    }
    public function GetTempName()
    {
        return $_FILES[$this->index]["tmp_name"];
    }

    public function pathFileUpload()
    {
        return $this->GetPathFile().$this->RenameFile();
    }
    public function RenameFile()
    {
        $temp = explode(".",$this->GetNameFile($this->index));

        return md5(rand(1,99999)) . '.' .end($temp);
    }


    public function GetPathFile()
    {
        return $this->path;
    }

    public function move_file()
    {

        if($this->GetErrorFile() != true)
        {
            return $this->GetErrorFile();
        }

        if (!file_exists($this->GetPathFile())) {

            mkdir($this->GetPathFile(), 0777, true);

        }

        $path = $this->pathFileUpload();

        if ( move_uploaded_file($this->GetTempName(),$path)) {

            return array('file'=>$path);
        }
        return false;
    }

    public function remove_file(){

        if(file_exists($this->index))
        {return unlink($this->index);}
        else{
            return true;
        }
    }
}
