<?php

// Kết nối đến cơ sở dữ liệu
@include 'config.php';

session_start();

// Nếu người dùng gửi mật khẩu cũ và mật khẩu mới
if (isset($_POST['old_password']) && isset($_POST['new_password'])) {
    // Lấy mật khẩu cũ và mật khẩu mới từ biến POST
    $oldPassword = $_POST['old_password'];
    $newPassword = $_POST['new_password'];

    // lấy maakt khẩu cũ của người dùng này
    $userId = $_SESSION['user_id'];
    $query = "SELECT password FROM user_form WHERE id = $userId";
    $result = mysqli_query($conn, $query); // thuc thi query tu database va tra ket qua 
    $row = mysqli_fetch_assoc($result);   // ket qua duoc tra ve theo hang
    $currentHashedPassword = $row['password'];

    // Kiểm tra mật khẩu cũ đúng hay sai
    if (md5($oldPassword) == $currentHashedPassword) {
        // Mật khẩu cũ đúng, tiến hành mã hóa mật khẩu mới và cập nhật vào cơ sở dữ liệu
        $newHashedPassword = md5($newPassword);
        $query = "UPDATE user_form SET password = '$newHashedPassword' WHERE id = $userId";
        mysqli_query($conn, $query);

        // Thông báo thành công
        echo "Thay đổi mật khẩu thành công";
    } else {
        // Mật khẩu cũ sai, thông báo lỗi
        echo "Mật khẩu cũ không đúng";
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
    <h1>Change Password</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label for="old_password">Old password: </label>
        <input type="password" id="old_password" name="old_password" required>
        <br>
        <label for="new_password">New Password:</label>
        <input type="password" id="new_password" name="new_password" required>
        <br>
        <br>
        <input type="submit" value="Change password">
        <a href="login.php">Back to Login</a>
    </form>
</body>
</html>