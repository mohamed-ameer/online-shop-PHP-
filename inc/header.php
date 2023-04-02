<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- custom style -->
    <link rel="stylesheet" href="css/style.css">
    <title>Online Shop</title>    
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-dark bg-dark fixed-top" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Ecommerce</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-secondary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="products.php">Shop</a>
                    </li>
                    <?php if(isset($_SESSION['admin'])){?>
                    <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="addProduct.php">Add Product</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="addCategory.php">Add Category</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="handlers/handleLogout.php">LogOut</a>
                    </li>              
                    <?php } else {?>
                    <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="login.php">Account</a>
                    </li>
                    <?php } ?>  
                </ul>
            </div>
        </div>
    </nav>
