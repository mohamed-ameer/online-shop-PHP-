<?php
namespace validations;
require_once 'ValidationInterface.php';
/* 
use validations\ValidationInterface; 
we can use ValidationInterface directly without  use validations\ValidationInterface;
because they are in the same box(namesace)
*/
class Str implements ValidationInterface{
    private $name;
    private $value;
    public function __construct($name,$value){
        $this->name = $name;
        $this->value = $value;
    }
    public function validate(){
        if(is_numeric($this->value)){
            return "$this->name must be string";
        }
        return '';
    }
}