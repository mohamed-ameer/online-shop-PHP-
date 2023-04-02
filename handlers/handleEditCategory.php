<?php 
session_start();
require_once '../classes/Category.php';
require_once '../classes/validations/Validator.php';
use validations\Validator;
if(!isset($_SESSION['admin'])){
    header('Location:../login.php');
    die();
}

//1- if form is submitted
if(isset($_POST['submit'])){
//2-read data from the request
    $id = $_GET['id'];
    $type = $_POST['type'];
//3-validation
    $categoryValidator = new Validator;
    $categoryValidator->rules('type',$type,['required','string','max:100']);
    $errors = $categoryValidator->errors;
    $type_error = count($categoryValidator->errors['type']);
    $is_valid = (!$type_error);
//4-if data are valid    
    if($is_valid){
//5-store the data in the database
        $cat = new Category;
        $result = $cat->updateCategory($id,$type);
//6-if stored succssfully
        if($result){    
            header("Location:../addCategory.php?id=$id");
        }else{
            $_SESSION["errors"] = ["db_error"=>["error storing in database"]];
            header("Location:../addCategory.php?id=$id");
        }
    }else{
        $_SESSION["errors"] = $errors;
        header("Location:../addCategory.php?id=$id");
    }
}else{
    header("Location:../index.php");
}
