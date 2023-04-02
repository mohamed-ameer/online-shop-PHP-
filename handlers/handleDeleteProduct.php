<?php 
session_start();
require_once '../classes/Product.php';
if(!isset($_SESSION['admin'])){
    header('Location:../login.php');
    die();
}

$id = $_GET['id'];
$prod = new Product;
//delete the product from db and the image file from images folder
$product = $prod->getProductById($id);
$img = $product['img'];
$imgpath = '../images/'.$img;
$result = $prod->deleteProduct($id);
if($result){    
    unlink( $imgpath );
    header("Location:../index.php");
}
  