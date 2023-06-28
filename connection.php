<?php

$con = mysqli_connect("localhost","root","","peony");

if(mysqli_connect_errno()){
    die("Cannot Connect to Database".mysqli_connect_errno());
}

define("UPLOAD_SRC",$_SERVER['DOCUMENT_ROOT']."/peony/uploads/");
define("FETCH_SRC", "http://127.0.0.1/peony/uploads/");
?>