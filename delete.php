<?php
@include 'config.php';
session_start();

// lay du lieu id can xoa
$userId = $_SESSION['user_id'];
$delete = "DELETE FROM user_form WHERE id=$userId";
mysqli_query($conn,$delete);
echo "<h1> Delete Successfully! </h1>";

// back lai ve trang check user
header("Location: checkuserdb.php");

?>