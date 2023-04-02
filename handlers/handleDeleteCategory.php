<?php 
session_start();
require_once '../classes/Category.php';
if(!isset($_SESSION['admin'])){
    header('Location:../login.php');
    die();
}

$id = $_GET['id'];
$cat = new Category;
$result = $cat->deleteCategory($id);
if($result){    
    header("Location:../addCategory.php");
}
  