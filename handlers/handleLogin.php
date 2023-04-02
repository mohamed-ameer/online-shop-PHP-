<?php
session_start();
require_once '../classes/admin.php';
require_once '../classes/validations/Validator.php';

use validations\Validator;

//1- if form is submitted
if(isset($_POST['submit'])){
//2-read data from the request
    $email = $_POST['email'];
    $password = $_POST['password'];
//3-validation
    $authValidator = new Validator;
    $authValidator->rules('email',$email,['required','email']);
    $authValidator->rules('password',$password,['required']);
    //errors  
    $errors = $authValidator->errors;
    $email_error = count($authValidator->errors['email']);
    $password_error= count($authValidator->errors['password']);
    $is_valid = (!$email_error && !$password_error);

//4-if data are valid    
    if($is_valid){
//5-attempt the authentication
        $admin = new Admin;
        $result = $admin->attempt($email,sha1($password));
//6-if attempt succssfully
        if($result !== null){
            $_SESSION["admin"] = $result;
            header('Location:../index.php');
        }else{            
            $_SESSION["errors"] = ["db_error"=>["email or password are not correct"]];
            $_SESSION["formdata"] = $email;
            header('Location:../login.php');
        }
    }else{
        $_SESSION["errors"] = $errors;
        $_SESSION["formdata"] = $email;
        header('Location:../login.php');
    }
}else{
    header('Location:../login.php');
}
