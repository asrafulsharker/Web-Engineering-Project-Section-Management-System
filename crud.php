<?php

require("connection.php");

function image_upload($img){
    $tmp_loc = $img['tmp_name'];
    $new_name = random_int(11111,99999).$img['name'];

    $new_loc = UPLOAD_SRC.$new_name;
    if(!move_uploaded_file($tmp_loc,$new_loc)){
        header("location: student.php?alert=img_upload");
        exit;
    }else{
       return $new_name;
    };
}

function image_remove($img){
    if(!unlink(UPLOAD_SRC.$img)){
        header("Location: student.php?alert=img_rem_fail");
        exit;
    }
}



if(isset($_POST['addstudent']))
{
    foreach($_POST as $key => $value){
        $_POST[$key] = mysqli_real_escape_string($con,$value);
    }

    $imgpath = image_upload($_FILES['image']);

    $query="INSERT INTO `student`(`name`, `s_id`, `email`, `phone`, `image`) 
        VALUES ('$_POST[name]','$_POST[s_id]','$_POST[email]','$_POST[phone]','$imgpath')";

    if(mysqli_query($con,$query)){
        header("location: student.php?success=added");
    }
    else{
        header("location: student.php?alert=add_failed");
    }
}

if(isset($_GET['rem']) && $_GET['rem']>0)
{
    $query="SELECT * FROM `student` WHERE `id`='$_GET[rem]'";
    $result=mysqli_query($con,$query);
    $fetch=mysqli_fetch_assoc($result);

    image_remove($fetch['image']);
    $query="DELETE FROM `student` WHERE `id`='$_GET[rem]'";
    if(mysqli_query($con,$query)){
        header("location: student.php?success=removed");
    }else{
        header("location: student.php?alert=remove_failed");
        }
}

if(isset($_POST['editstudent']))
{
    foreach($_POST as $key => $value){
        $_POST[$key] = mysqli_real_escape_string($con,$value);
    }
    if(file_exists($_FILES['image']['tmp_name']) || is_uploaded_file($_FILES['image']['tmp_name']))
    {
        $query="SELECT * FROM `student` WHERE `id`='$_POST[editpid]'";
        $result=mysqli_query($con,$query);
        $fetch=mysqli_fetch_assoc($result);
        image_remove($fetch['image']);

        $imgpath = image_upload($_FILES['image']);
        $update="UPDATE `student` SET `name`='$_POST[name]',`s_id`='$_POST[s_id]',`email`='$_POST[email]',`phone`='$_POST[phone]',`image`='$imgpath' WHERE `id`='$_POST[editpid]'";
    }
    else{
        $update="UPDATE `student` SET `name`='$_POST[name]',`s_id`='$_POST[s_id]',`email`='$_POST[email]',`phone`='$_POST[phone]' WHERE `id`='$_POST[editpid]'";

    }
    if(mysqli_query($con,$update)){
        header("location: student.php?success=updated");
    }else{
        header("location: student.php?alert=update_failed");
    }
}
?>