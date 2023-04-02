<?php 
session_start();
if(!isset($_SESSION['admin'])){
    header('Location:login.php');
}
require_once 'classes/Category.php';
$cat = new Category;
$categories = $cat->getAllCategories();
?>
<?php include './inc/header.php'?>

<div class="container my-5 w-75">
    <?php if(isset($_SESSION["errors"]["db_error"])){?>
    <?php foreach($_SESSION["errors"]["db_error"] as $error){ ?>
        <div class="alert alert-danger" role="alert">
        <?php echo $error ?>
        </div>
    <?php } ?>
    <?php } ?>
    <form method='post' action='handlers/handleAddProduct.php' enctype="multipart/form-data">
    <div class="mb-3">
        <label for="product-name" class="form-label">Product Name</label>
        <input name='name' value="<?php echo isset($_SESSION["formdata"]['name'])? $_SESSION["formdata"]['name'] : ""?>" type="text" class="form-control" id="product-name" placeholder="Enter product name">
    </div>
    <?php if(isset($_SESSION["errors"])){?>
    <?php foreach($_SESSION["errors"]["name"] as $error){ ?>
        <div class="alert alert-danger" role="alert">
        <?php echo $error ?>
        </div>
    <?php } ?>
    <?php } ?>
    <div class="mb-3">
        <label for="product-description" class="form-label">Product Description</label>
        <textarea name='description' class="form-control" id="product-description" rows="3" placeholder="Enter product description"><?php echo isset($_SESSION["formdata"]['description'])? $_SESSION["formdata"]['description'] :""?></textarea>
    </div>
    <?php if(isset($_SESSION["errors"])){?>
    <?php foreach($_SESSION["errors"]["description"] as $error){ ?>
        <div class="alert alert-danger" role="alert">
        <?php echo $error ?>
        </div>
    <?php } ?>
    <?php } ?>
    <div class="mb-3">
        <label for="product-category" class="form-label">Product Category</label>
        <select class="form-select" name="category" id="product-category">
        <option value="" selected>Select a category</option>
        <?php if(isset($categories)){?>   
        <?php foreach($categories as $key => $value) {  ?>  
            <option value="<?php echo $value['type']?>"><?php echo $value['type']?></option>
        <?php } ?>
        <?php }?>
        </select>
    </div>
    <?php if(isset($_SESSION["errors"])){?>
    <?php foreach($_SESSION["errors"]["category"] as $error){ ?>
        <div class="alert alert-danger" role="alert">
        <?php echo $error ?>
        </div>
    <?php } ?>
    <?php } ?>
    <div class="mb-3">
        <label for="product-price" class="form-label">Product Price</label>
        <div class="input-group">
        <span class="input-group-text">$</span>
        <input name='price' value="<?php echo isset($_SESSION["formdata"]['price'])? $_SESSION["formdata"]['price'] :""?>" type="text" class="form-control" id="product-price" placeholder="Enter product price">
        </div>
    </div>
    <?php if(isset($_SESSION["errors"])){?>
    <?php foreach($_SESSION["errors"]["price"] as $error){ ?>
        <div class="alert alert-danger" role="alert">
        <?php echo $error ?>
        </div>
    <?php } ?>
    <?php } ?>
    <div class="mb-3">
        <label for="product-image" class="form-label">Product Image</label>
        <input name='img' type="file" class="form-control" id="product-image">
    </div>
    <?php if(isset($_SESSION["errors"])){?>
    <?php foreach($_SESSION["errors"]["img"] as $error){ ?>
        <div class="alert alert-danger" role="alert">
        <?php echo $error ?>
        </div>
    <?php } ?>
    <?php } ?>
    <input name='submit' type="submit" class="btn btn-primary" value="Add Product"/>
    </form>
</div>
<?php 
unset($_SESSION['errors']);
unset($_SESSION['formdata']);
?>


<?php include './inc/footer.php'?>