<?php
require_once 'MySql.php';

class category extends MySql{
    //get all categories
    public function getAllCategories(){
        $query = "SELECT * FROM `categories`";
        $results = $this->connect()->query($query);
        $categories = [];
        if($results->num_rows > 0){
            while($row = $results->fetch_assoc()){
                array_push($categories,$row);
            }
        }
        return $categories;
    }
    //get one category by id
    public function getCategoryById($id){
        $query = "SELECT * FROM `categories` WHERE `category_id`='$id'";
        $result = $this->connect()->query($query);
        $category = null;
        if($result->num_rows == 1){
            $category = $result->fetch_assoc();
        }
        return $category;
    }
    //create new category
    public function createCategory(string $type){
        $type = mysqli_real_escape_string($this->connect(),$type);
        $query = "INSERT INTO `categories`(`type`) 
                  VALUES ('$type')";
        $result = $this->connect()->query($query);
        if($result){
           return true; 
        }
        return false;
    }
    //update - edit
    public function updateCategory($id,$type){
        $query = "UPDATE `categories` SET `type`='$type' WHERE `category_id`='$id'";
        $result = $this->connect()->query($query);
        if($result){
           return true; 
        }
        return false;
    }
    //delete
    public function deleteCategory($id){
        $query = "DELETE FROM `categories` WHERE `category_id`='$id'";
        $result = $this->connect()->query($query);
        if($result){
           return true; 
        }
        return false;
    }
} 

?>