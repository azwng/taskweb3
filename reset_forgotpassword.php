<?php

// Kết nối đến cơ sở dữ liệu
@include 'config.php';

session_start();


// Nếu người dùng gửi mật khẩu cũ và mật khẩu mới
if ( isset($_SESSION['email']) && isset($_POST['newpassword']) && isset($_POST['confirm_newpassword'])) {
    // Lấy mật khẩu cũ và mật khẩu mới từ biến POST
    $newpassword = $_POST['newpassword'];
    $confirm_newpassword = $_POST['confirm_newpassword'];

    $email = $_SESSION['email'];

    // Kiểm tra 2 mat khau co trung nhau khong
    if ($newpassword == $confirm_newpassword) {
        // Mật khẩu cũ đúng, tiến hành mã hóa mật khẩu mới và cập nhật vào cơ sở dữ liệu
        $Hashnewpassword = md5($newpassword);
        $query = "UPDATE user_form SET password = '$Hashnewpassword' WHERE email = '$email'";
        mysqli_query($conn, $query);

        // Thông báo thành công
        echo "Password changed successfully";
    } else {
        // Mật khẩu cũ sai, thông báo lỗi
        echo "Not matched! Retype!";
    }
    
}

// Đóng kết nối cơ sở dữ liệu
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Change Password</title>
</head>
<body>
    <h1>Change NEW PASSWORD:</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label for="newpassword">Change new password: </label>
        <input type="password" id="newpassword" name="newpassword" required>
        <br>
        <label for="confirm_newpassword">New Password:</label>
        <input type="password" id="confirm_newpassword" name="confirm_newpassword" required>
        <br>
        <br>
        <input type="submit" value="Change new password">
        <a href="login.php">Back to Login</a>
    </form>
</body>
</html>