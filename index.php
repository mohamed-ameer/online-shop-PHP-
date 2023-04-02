<?php 
session_start();
require_once 'classes/Product.php';
require_once 'classes/helpers/Str.php';
use helpers\Str;

$prod = new Product;
$products = $prod->getAllProducts();
?>
<?php include 'inc/header.php'?>
<?php include 'inc/banner.php'?>



<?php include 'inc/footer.php'?>