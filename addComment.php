<?php

include "database.php";

session_start();

if(!isset($_POST['submit']))
{
    header("Location:Worker.php?errorInSubmitC");
    mysqli_close($con);
    exit();
}
if(isset($_COOKIE['role']))
{
  $_SESSION['id'] = $_COOKIE['id'];
  $_SESSION['name'] = $_COOKIE['name'];
  $_SESSION['email'] = $_COOKIE['email'];
  $_SESSION['role'] = $_COOKIE['role'];
}
if(!isset($_SESSION['role']))
{
    header("Location:Home.php");
    mysqli_close($con);
    session_destroy();
    exit();
}

$title = $_POST['titleAdd'];
$text = $_POST['textAdd'];
$sender = $_SESSION['role'];
$dateComment = date('Y-m-d');

$sql = " INSERT INTO comment(title,text,date,sender,status) VALUES('$title','$text','$dateComment','$sender',1) ";

mysqli_query($con,$sql);

header("Location:Comment.php?successC");

mysqli_close($con);

exit();


?>