<?php 
session_start();
if(!isset($_SESSION['admin'])){
    header('Location:login.php');
}
require_once 'classes/Product.php';
require_once 'classes/Category.php';
$id = $_GET['id'];
$prod = new Product;
$product = $prod->getProductById($id);
$cat = new Category;
$categories = $cat->getAllCategories();
?>
<?php include './inc/header.php'?>

<div class="container my-5 w-75">
    <form method='post' action='handlers/handleEditProduct.php?id=<?php echo $product['id'] ?>'>
    <div class="mb-3">
        <label for="product-name" class="form-label">Product Name</label>
        <input name='name' value="<?php echo $product['name']?>" type="text" class="form-control" id="product-name" placeholder="Enter product name">
    </div>
    <div class="mb-3">
        <label for="product-description" class="form-label">Product Description</label>
        <textarea name='description' class="form-control" id="product-description" rows="3" placeholder="Enter product description"><?php echo $product['description']?></textarea>
    </div>
    <div class="mb-3">
        <label for="product-category" class="form-label">Product Category</label>
        <select class="form-select" name="category" id="product-category">
        <option value="">Select a category</option>
        <?php if(isset($categories)){?>   
        <?php foreach($categories as $key => $value) {  ?>  
            <?php if($value['type'] == $product['category']){?>
            <option value="<?php echo $value['type']?>" selected><?php echo $value['type']?></option>
            <?php }else{?>
            <option value="<?php echo $value['type']?>"><?php echo $value['type']?></option>
            <?php }?>
        <?php } ?>
        <?php }?>
        </select>
    </div>
    <div class="mb-3">
        <label for="product-price" class="form-label">Product Price</label>
        <div class="input-group">
        <span class="input-group-text">$</span>
        <input name='price' value="<?php echo $product['price']?>" type="text" class="form-control" id="product-price" placeholder="Enter product price">
        </div>
    </div>
    <input name='submit' type="submit" class="btn btn-primary" value="Edit"/>
    </form>
</div>
<?php include './inc/footer.php'?>