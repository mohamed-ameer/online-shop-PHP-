<?php 
session_start();
require_once '../classes/Product.php';
if(!isset($_SESSION['admin'])){
    header('Location:../login.php');
    die();
}

//1- if form is submitted
if(isset($_POST['submit'])){
//2-read data from the request
    $id = $_GET['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $price = $_POST['price'];

//3-validation
    $errors = [];


//4-if data are valid    
    if(true){
//5-store the data in the database
        $data = [
            'name'=>$name,
            'description'=>$description,
            'category'=>$category,
            'price'=>$price,
        ];
        $prod = new Product;
        $result = $prod->updateProduct($id,$data);
//6-if stored succssfully
        if($result){    
            header("Location:../show.php?id=$id");
        }else{

        }
    }else{

    }
}else{
    header("Location:../index.php");
}
