<?php
namespace validations;
require_once 'ValidationInterface.php';
require_once 'Email.php';
require_once 'Max.php';
require_once 'Numeric.php';
require_once 'Required.php';
require_once 'RequiredImage.php';
require_once 'Image.php';
require_once 'Str.php';
/* 
use validations\ValidationInterface; 
we can use ValidationInterface directly without  use validations\ValidationInterface;
because they are in the same box(namesace)
*/
class Validator{
    public $errors = [];
    public $errors_of_onefield = [];
    public function makeValidation(ValidationInterface $validationObject){
        return $validationObject->validate();
    }
    public function rules($name,$value,array $rules){
        foreach($rules as $rule){
            if($rule == 'required'){
                $error = $this->makeValidation(new Required($name,$value));
            }
            else if($rule == 'required-image'){
                $error = $this->makeValidation(new RequiredImage($name,$value));
            }
            else if($rule == 'image'){
                $error = $this->makeValidation(new Image($name,$value));
            }
            else if($rule == 'string'){
                $error = $this->makeValidation(new Str($name,$value));
            }
            else if($rule == 'email'){
                $error = $this->makeValidation(new Email($name,$value));
            }
            else if($rule == 'max:100'){
                $error = $this->makeValidation(new Max($name,$value));
            }
            else if($rule == 'numeric'){
                $error = $this->makeValidation(new Numeric($name,$value));
            }

            if($error != ''){
                // array_push($this->errors,$error);
                array_push($this->errors_of_onefield,$error);
            }
        }
        $this->errors[$name]=$this->errors_of_onefield;
        $this->errors_of_onefield=[];
    }

}