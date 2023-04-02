<?php
session_start();
require_once '../classes/Product.php';
require_once '../classes/helpers/Image.php';
require_once '../classes/validations/Validator.php';
use helpers\Image;
use validations\Validator;
if(!isset($_SESSION['admin'])){
    header('Location:../login.php');
    die();
}
//1- if form is submitted
if(isset($_POST['submit'])){
//2-read data from the request
    $name = $_POST['name'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    //image data
    $img = $_FILES['img'];
    // $img_name = $img['name'];
    // $img_tmp_name = $img['tmp_name'];
    // $img_extension = pathinfo($img_name)['extension'];
    // $img_new_name = uniqid() . '.' . $img_extension;
//3-validation
    $insertProductValidator = new Validator;
    $insertProductValidator->rules('name',$name,['required','string','max:100']);
    $insertProductValidator->rules('description',$description,['required','string']);
    $insertProductValidator->rules('category',$category,['required']);
    $insertProductValidator->rules('price',$price,['required','numeric']);    
    $insertProductValidator->rules('img',$img,['required-image','image']);  
    //errors  
    $errors = $insertProductValidator->errors;
    $name_error = count($insertProductValidator->errors['name']);
    $description_error= count($insertProductValidator->errors['description']);
    $category_error= count($insertProductValidator->errors['category']);
    $price_error= count($insertProductValidator->errors['price']);
    $img_error= count($insertProductValidator->errors['img']);
    $is_valid = (!$name_error && !$description_error && !$category_error && !$price_error && !$img_error );


//4-if data are valid    
    if($is_valid){
        $image = new Image($img);
//5-store the data in the database
        $data = [
            'name'=>$name,
            'description'=>$description,
            'category'=>$category,
            'price'=>$price,
            // 'img'=>$img_new_name,
            'img'=>$image->new_name,
        ];
        $prod = new Product;
        $result = $prod->createProduct($data);
//6-if stored succssfully
        if($result){
            //upload image
            // move_uploaded_file($img_tmp_name,'../images/' . $img_new_name);
            $image->upload();
            header('Location:../index.php');
        }else{            
            $formdata=[
                'name'=>$name,
                'description'=>$description,
                'price'=>$price
            ];
            $_SESSION["errors"] = ["db_error"=>["error storing in database"]];
            $_SESSION["formdata"] = $formdata;
            header('Location:../addProduct.php');
        }
    }else{
        $formdata=[
            'name'=>$name,
            'description'=>$description,
            'price'=>$price
        ];
        $_SESSION["errors"] = $errors;
        $_SESSION["formdata"] = $formdata;
        header('Location:../addProduct.php');
    }
}else{
    header('Location:../addProduct.php');
}


?>
