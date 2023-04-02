<?php
namespace validations;
require_once 'ValidationInterface.php';
/* 
use validations\ValidationInterface; 
we can use ValidationInterface directly without  use validations\ValidationInterface;
because they are in the same box(namesace)
*/
class Required implements ValidationInterface{
    private $name;
    private $value;
    public function __construct($name,$value){
        $this->name = $name;
        $this->value = $value;
    }
    public function validate(){
        if(strlen($this->value) == 0){
            return "$this->name is required";
        }
        return '';
    }
}