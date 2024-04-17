<?php
@include 'config.php'; 
session_start();

if(!isset($_SESSION['admin_name'])){
    header('location:update.php');
}

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$id = $_GET['id'];

$update = "UPDATE user_form SET name='$name', email='$email', password='$password' WHERE id=$id";

$result = mysqli_query($conn, $update);
if(mysqli_query($conn, $update)){
    header('location:checkuserdb.php');
}

?>
