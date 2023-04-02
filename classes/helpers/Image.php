<?php
namespace helpers;

class Image{
    public $name;
    public $tmp_name;
    public $extension;
    public $new_name;

    public function __construct($img){
        $this->name = $img['name'];
        $this->tmp_name = $img['tmp_name'];
        $this->extension = pathinfo($this->name)['extension'];
        $this->new_name = uniqid() . '.' . $this->extension;
    } 
    public function upload(){
        move_uploaded_file($this->tmp_name,'../images/' . $this->new_name);
    }
}