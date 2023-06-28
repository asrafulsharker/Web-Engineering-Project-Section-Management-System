<?php

require("connection.php");

function image_upload($img){
    $tmp_loc = $img['tmp_name'];
    $new_name = random_int(11111,99999).$img['name'];

    $new_loc = UPLOAD_SRC.$new_name;
    if(!move_uploaded_file($tmp_loc,$new_loc)){
        header("location: teacher.php?alert=img_upload");
        exit;
    }else{
       return $new_name;
    };
}

function image_remove($img){
    if(!unlink(UPLOAD_SRC.$img)){
        header("Location: teacher.php?alert=img_rem_fail");
        exit;
    }
}



if(isset($_POST['addteacher']))
{
    foreach($_POST as $key => $value){
        $_POST[$key] = mysqli_real_escape_string($con,$value);
    }

    $imgpath = image_upload($_FILES['t_image']);

    $query="INSERT INTO `teacher`(`t_name`, `t_dept`,`t_c_name`, `t_email`, `t_phone`, `t_image`) 
        VALUES ('$_POST[t_name]','$_POST[t_dept]','$_POST[t_c_name]','$_POST[t_email]','$_POST[t_phone]','$imgpath')";
    if(mysqli_query($con,$query)){
        header("location: teacher.php?success=added");
    }
    else{
        header("location: teacher.php?alert=add_failed");
    }
}

if(isset($_GET['rem']) && $_GET['rem']>0)
{
    $query="SELECT * FROM `teacher` WHERE `id`='$_GET[rem]'";
    $result=mysqli_query($con,$query);
    $fetch=mysqli_fetch_assoc($result);

    image_remove($fetch['t_image']);
    $query="DELETE FROM `teacher` WHERE `id`='$_GET[rem]'";
    if(mysqli_query($con,$query)){
        header("location: teacher.php?success=removed");
    }else{
        header("location: teacher.php?alert=remove_failed");
        }
}

if(isset($_POST['editteacher']))
{
    foreach($_POST as $key => $value){
        $_POST[$key] = mysqli_real_escape_string($con,$value);
    }
    if(file_exists($_FILES['t_image']['tmp_name']) || is_uploaded_file($_FILES['t_image']['tmp_name']))
    {
        $query="SELECT * FROM `teacher` WHERE `id`='$_POST[editpid]'";
        $result=mysqli_query($con,$query);
        $fetch=mysqli_fetch_assoc($result);
        image_remove($fetch['t_image']);

        $imgpath = image_upload($_FILES['t_image']);
        $update="UPDATE `teacher` SET `t_name`='$_POST[t_name]',`t_dept`='$_POST[t_dept]',`t_c_name`='$_POST[t_c_name]',`t_email`='$_POST[t_email]',`t_phone`='$_POST[t_phone]',`t_image`='$imgpath' WHERE `id`='$_POST[editpid]'";
    }
    else{
        $update="UPDATE `teacher` SET `t_name`='$_POST[t_name]',`t_dept`='$_POST[t_dept]',`t_c_name`='$_POST[t_c_name]',`t_email`='$_POST[t_email]',`t_phone`='$_POST[t_phone]' WHERE `id`='$_POST[editpid]'";

    }
    if(mysqli_query($con,$update)){
        header("location: teacher.php?success=updated");
    }else{
        header("location: teacher.php?alert=update_failed");
    }
}
?>