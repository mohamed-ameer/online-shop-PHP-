<?php
require_once 'MySql.php';

class Product extends MySql{
    //get all products
    public function getAllProducts(){
        $query = "SELECT * FROM `products`";
        $results = $this->connect()->query($query);
        $products = [];
        if($results->num_rows > 0){
            while($row = $results->fetch_assoc()){
                array_push($products,$row);
            }
        }
        return $products;
    }
    //get one product by id
    public function getProductById($id){
        $query = "SELECT * FROM `products` WHERE `id`='$id'";
        $result = $this->connect()->query($query);
        $product = null;
        if($result->num_rows == 1){
            $product = $result->fetch_assoc();
        }
        return $product;
    }
    //create new product
    public function createProduct(array $data){
        $data['name'] = mysqli_real_escape_string($this->connect(),$data['name']);
        $data['description'] = mysqli_real_escape_string($this->connect(),$data['description']);
        $data['category'] = mysqli_real_escape_string($this->connect(),$data['category']);
        $query = "INSERT INTO `products`(`name`, `description`,`category`, `price`, `img`, `created_at`) 
                  VALUES ('{$data['name']}','{$data['description']}','{$data['category']}','{$data['price']}','{$data['img']}',CURRENT_TIME())";
        $result = $this->connect()->query($query);
        if($result){
           return true; 
        }
        return false;
    }
    //update - edit
    public function updateProduct($id,array $data){
        $query = "UPDATE `products` SET 
        `name`='{$data['name']}',
        `description`='{$data['description']}',
        `category`='{$data['category']}',
        `price`='{$data['price']}'
        WHERE `id`='$id'";
        $result = $this->connect()->query($query);
        if($result){
           return true; 
        }
        return false;
    }
    //delete
    public function deleteProduct($id){
        $query = "DELETE FROM `products` WHERE `id`='$id'";
        $result = $this->connect()->query($query);
        if($result){
           return true; 
        }
        return false;
    }
} 

?>