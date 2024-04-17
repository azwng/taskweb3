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
        <h1>Account List</h1><a href="admin_page.php" class="btn btn-info">Back to home</a>  <br>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Change</th>
            </tr>

        </thead>
        
        <?php
        @include 'config.php';
        session_start();

        if(!isset($_SESSION['admin_name'])){
            header('location:checkuserdb.php');
        }

 
        $query = "SELECT * FROM user_form ORDER BY name, email, password";
        $result = mysqli_query($conn,$query);

        while($r = mysqli_fetch_assoc($result)){
        ?>
            <!-- echo $r['name'] . "-" . $r['email'] . "-" . $r['password']; -->
            <tr>
                <th><?php echo $r['name'];?></th>
                <th><?php echo $r['email'];?></th>
                <th><?php echo $r['password'];?></th>
                <th><a href="edit.php?id=<?php echo $r['id'];?>" class="btn btn-info">Edit</a>  <a onclick="return confirm('Delete this account?');" href="delete.php?sid=<?php echo $r['id'];?>" class="btn btn-warning">Delete</a></th>

            </tr>
        <?php    
        }
        ?>
        
    </table>
    </div>
    
</body>
</html>


        
