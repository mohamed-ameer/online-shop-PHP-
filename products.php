<?php 
session_start();
require_once 'classes/Product.php';
require_once 'classes/helpers/Str.php';
use helpers\Str;

$prod = new Product;
$products = $prod->getAllProducts();
?>
<?php include './inc/header.php'?>

<?php if(isset($products)){?> 
    <div class="container ">
        <div class="row m-3">    
        <?php foreach($products as $key => $value) {  ?>  
            <div class="col-s-6 col-md-4">
                <div class="card mb-5">
                <?php if(file_exists('images/'.$value['img'])){?>
                    <a href="show.php?id=<?php echo $value['id'] ?>">
                        <img src="images/<?php echo $value['img'] ?>" class="card-img-top" alt="...">
                    </a>
                <?php }else{?>
                    <a href="show.php?id=<?php echo $value['id'] ?>">
                        <img src="https://via.placeholder.com/400x400.png?text=Product+Image" alt="Product Image" class="img-fluid">
                    </a>
                <?php }?>  
                    <div class="card-body">
                        <small ><?php echo $value['price']  ?> LE.</small>  
                        <h5 class="card-title"><?php echo $value['name'] ?></h5>
                        <p class="card-text"><?php echo Str::limit($value['description']) ?></p>
                        <a href="show.php?id=<?php echo $value['id'] ?>" class="btn btn-primary">show</a>
                        <?php if(isset($_SESSION['admin'])){?>
                        <a href="editProduct.php?id=<?php echo $value['id'] ?>" class="btn btn-warning">edit</a>
                        <a href="handlers/handleDeleteProduct.php?id=<?php echo $value['id'] ?>" class="btn btn-danger">delete</a>
                        <?php }?>    
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div> 
<?php }else{?>
    <p>no product found</p>
<?php }?>

<?php include './inc/footer.php'?>