<?php 
session_start();

require_once 'classes/Product.php';
$id = $_GET['id'];
$prod = new Product;
$product = $prod->getProductById($id);
?>
<?php include './inc/header.php'?>
<?php if(isset($product)){?>        
    <div class="container my-5">
      <div class="my-2">
        <a href="index.php" class="btn btn-dark"> << back home</a>
      </div>  
      <div class="row">
        <div class="col-lg-6">
            <?php if(file_exists('images/'.$product['img'])){?>
                <img src="images/<?php echo $product['img'] ?>" alt="Product Image" class="img-fluid">
            <?php }else{?>
                <img src="https://via.placeholder.com/400x400.png?text=Product+Image" alt="Product Image" class="img-fluid">
            <?php }?> 
        </div>
        <div class="col-lg-6">
          <h1 class="mb-4"><?php echo $product['name'] ?></h1>
          <p class="lead"><?php echo $product['description'] ?></p>
          <p class="mb-4">category: <?php echo $product['category']  ?></p>
          <p class="mb-4">Price: $<?php echo $product['price']  ?></p>
          <form>
            <div class="mb-3">
              <label for="quantity" class="form-label">Quantity:</label>
              <input type="number" class="form-control" id="quantity" min="1" max="10" product="1">
            </div>
            <a class="btn btn-primary">Add to Cart</a>
            <?php if(isset($_SESSION['admin'])){?>
            <a href="editProduct.php?id=<?php echo $product['id'] ?>" class="btn btn-warning">edit</a>
            <a href="handlers/handleDeleteProduct.php?id=<?php echo $product['id'] ?>" class="btn btn-danger">delete</a>
            <?php }?>  
          </form>
        </div>
      </div>
    </div>
<?php }else{?>
    <h1>there is no product with id <?php echo $id?></h1>    
<?php }?>

<?php include './inc/footer.php'?>