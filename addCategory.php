<?php 
session_start();
if(!isset($_SESSION['admin'])){
    header('Location:login.php');
}
require_once 'classes/Category.php';
$id = isset($_GET['id'])?$_GET['id']:null;
$cat = new Category;
$categories = $cat->getAllCategories();
if($id){
    $category = $cat->getCategoryById($id);
}    
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
    <form method='post' action='handlers/handleAddCategory.php'>
    <div class="mb-3">
        <label for="category-name" class="form-label">Category Name</label>
        <input name='type' type="text" class="form-control" id="category-name" placeholder="Enter product name">
    </div>
    <?php if(isset($_SESSION["errors"])){?>
    <?php foreach($_SESSION["errors"]["type"] as $error){ ?>
        <div class="alert alert-danger" role="alert">
        <?php echo $error ?>
        </div>
    <?php } ?>
    <?php } ?>
    <input name='submit' type="submit" class="btn btn-primary" value="Add"/>
    </form>
    <hr>
    <strong>All Categories</strong>
    <?php if(isset($category)){?>
        <form class="my-3" method='post' action='handlers/handleEditCategory.php?id=<?php echo $category['category_id'] ?>'>
        <div class="mb-1">
            <input name='type' value="<?php echo $category['type']?>" type="text" class="form-control" id="category-name" placeholder="Enter product name">
        </div>
        <?php if(isset($_SESSION["errors"])){?>
        <?php foreach($_SESSION["errors"]["type"] as $error){ ?>
            <div class="alert alert-danger" role="alert">
            <?php echo $error ?>
            </div>
        <?php } ?>
        <?php } ?>
        <input name='submit' type="submit" class="btn btn-primary" value="Edit"/>
        <a href="addCategory.php" class="btn btn-secondary">cancel</a>
        </form>

    <?php }?>
    <?php if(isset($categories)){?>   
        <?php foreach($categories as $key => $value) {  ?>  
            <div class="alert alert-light d-flex justify-content-between" role="alert">
                <span>      
                    <?php echo $value['type']?>
                </span>
                <span>
                    <a href="addCategory.php?id=<?php echo $value['category_id'] ?>" class="btn btn-warning">edit</a>
                    <a href="handlers/handleDeleteCategory.php?id=<?php echo $value['category_id'] ?>" class="btn btn-danger">delete</a>
                </span>
            </div>
        <?php } ?>
    <?php }else{?>
        <p>no category found</p>
    <?php }?>
</div>
<?php 
unset($_SESSION['errors']);
?>


<?php include './inc/footer.php'?>