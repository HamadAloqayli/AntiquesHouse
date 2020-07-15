<?php

include "database.php";

session_start();

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

if(!isset($_GET['readComment']))
{
    header("Location:Comment.php");
    mysqli_close($con);
    exit();
}
if($_SESSION['role'] == 'admin')
{
  $sender = 'worker';
}
if($_SESSION['role'] == 'worker')
{
  $sender = "admin";
}
$sql = " UPDATE comment SET status = 0 WHERE sender = '$sender' ";

mysqli_query($con,$sql);

header("Location:Comment.php");

mysqli_close($con);

exit();

?>