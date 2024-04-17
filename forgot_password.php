<?php

// 
@include 'config.php';

if(isset($_POST['email'])){
    $email = $_POST['email'];

    // kiem tra email co hop le
    $query = "SELECT * FROM user_form WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    
    // kiem tra thanh cong
    if(mysqli_num_rows($result)>0){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        // neu co ket qua tra ve thi chuyen sang trang nhap lai mat khau
        $_SESSION['email'] = $email;
        header('location:reset_forgotpassword.php');
    
    } else {
        echo "Email khong ton tai.";
    }
}
?>


<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Change Password</title>
</head>
<body>
    <h1>Forgot Password</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label for="email">Email: </label>
        <input type="email" id="email" name="email" required>
        <input type="submit" name="submit" value="submit" class="form-btn">
    </form>
</body>
</html>