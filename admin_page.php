<?php

@include 'config.php';

session_start();


if(!isset($_SESSION['admin_name'])){
    header('location:admin_page.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin page</title>

    <!-- custom css file link -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">

    <div class="content">
        <h3>Hi, <span>admin</span></h3>
        <h1>Welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
        <p>This is an admin page.</p>
        <a href="login.php" class="btn">Login</a>
        <a href="register.php" class="btn">Register</a>
        <a href="reset_password.php" class="btn">Reset Password</a>
        <a href="logout.php" class="btn">Logout</a>
        <a href="checkuserdb.php" class="btn">Check user</a>
    </div>

    


</div>
    
</body>
</html>