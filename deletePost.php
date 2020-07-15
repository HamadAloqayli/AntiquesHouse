<?php

include "database.php";

session_start();

if(!isset($_GET['dPost']))
{
    header('Location:Post.php');
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

$delPost = $_GET['dPost'];

$sql = " DELETE FROM post WHERE id = '$delPost' ";

mysqli_query($con,$sql);

header("Location:Post.php?successD");

mysqli_close($con);

exit();

?>