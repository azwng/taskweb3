<?php
@include 'config.php';
session_start();

if(!isset($_SESSION['admin_name'])){
    header('location:edit.php');
}

if (!isset($_GET['id'])) {
    echo "Error: Missing user ID.";
    exit;
}

// lay thong tin tu user co id la id = ?
$userId = intval($_GET['id']);
$edit = "SELECT * FROM user_form WHERE id=$userId";

$result = mysqli_query($conn, $edit);
$row = mysqli_fetch_assoc($result);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check user</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h1>Update account's information</h1>
        <form action="<?php echo "update.php" . "?id=" . $userId; ?>" method="post">
               
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" class="fom-control" name="name" value="<?php echo $row['name']?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" class="fom-control" name="email" value="<?php echo $row['email']?>">
            </div>
            <div class="form-group">
                <label for="password">password</label>
                <input type="text" id="password" class="fom-control" name="password" value="<?php echo $row['password']?>">
            </div>

            <button class="btn btn-success">Update</button>

        </form>

    </div>
    
</body>
</html>


        
