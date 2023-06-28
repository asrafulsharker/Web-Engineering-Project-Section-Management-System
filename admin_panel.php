<?php 
    session_start();
    if(!isset($_SESSION['adminloginid']))
    {
        header("location: admin_login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>
<body>
    <div class="header">
        <h1>Welcome <?php echo $_SESSION['adminloginid']?></h1>
        <form action="" method="POST">
        <button name="logout">Logout</button>
        </form>
    </div>




    <?php
        if(isset($_POST['logout']))
        {
            session_destroy();
            header('location: admin_login.php');
        }
    ?>

    
</body>
</html>