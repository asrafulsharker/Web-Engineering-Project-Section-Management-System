<?php
    require("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fontawesome.com/reases/v5.15.1/css/all.css">
    <link rel="stylesheet" href="./assets/css/main1.css">
    <title>Admin Login</title>
</head>
<body>

<div class="input_form">
    <h2>
        Admin Pannel Login
    </h2>
    <form action="" method="POST" class="login_form_input">
        <div class="input-field">
        <i class="fas fa-user"></i>
    <input type="text" placeholder="User name.." name="adminname"> 
        </div>

        <div class="input-field">
        <i class="fas fa-lock"></i>
    <input type="password" placeholder="Password.." name="adminpass">
        </div>
        <button type="submit" name="signin">Sign In</button>
        
        <div class="extra">
            <a href="#">Don't have access ? Contact with admin.</a>
        </div>
        <button type="submit" class="go_tohome" name=""><a href="index.php">Go to Home</a></button>
    </form>
</div>


<?php 

if(isset($_POST['signin']))
{
    $query="SELECT * FROM `admin` WHERE `admin_name`='$_POST[adminname]' AND `admin_password`='$_POST[adminpass]'";
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result)==1)
    {
        session_start();
        $_SESSION['adminloginid']=$_POST['adminname'];
        header("location: admin.php");
    }
    else{
        echo"<script>alert('Incorrect Password or username')</script>";
    }
}


?>
    
</body>
</html>