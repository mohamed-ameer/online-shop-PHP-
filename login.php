<?php 
session_start();
if(isset($_SESSION['admin'])){
    header('Location:index.php');
}
?>
<?php include './inc/header.php'?>

<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <?php if(isset($_SESSION["errors"]["db_error"])){?>
                    <?php foreach($_SESSION["errors"]["db_error"] as $error){ ?>
                        <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                        </div>
                    <?php } ?>
                    <?php } ?>
                    <h3 class="card-title text-center">Login</h3>
                    <form method="post" action="handlers/handleLogin.php">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" value="<?php echo isset($_SESSION["formdata"])? $_SESSION["formdata"] :""?>" class="form-control" id="email" placeholder="name@example.com" >
              </div>
            <?php if(isset($_SESSION["errors"]["email"])){?>
            <?php foreach($_SESSION["errors"]["email"] as $error){ ?>
                <div class="alert alert-danger" role="alert">
                <?php echo $error ?>
                </div>
            <?php } ?>
            <?php } ?>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" >
              </div>
            <?php if(isset($_SESSION["errors"]["password"])){?>
            <?php foreach($_SESSION["errors"]["password"] as $error){ ?>
                <div class="alert alert-danger" role="alert">
                <?php echo $error ?>
                </div>
            <?php } ?>
            <?php } ?>
              <div class="d-grid">
                <input type="submit" name="submit" class="btn btn-primary" value="Login">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php 
unset($_SESSION['errors']);
unset($_SESSION['formdata']);
?>
<?php include './inc/footer.php'?>