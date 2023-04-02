<?php
session_start();
if(!isset($_SESSION['admin'])){
    header('Location:../login.php');
    die();
}
unset($_SESSION['admin']);
header('Location:../login.php');
