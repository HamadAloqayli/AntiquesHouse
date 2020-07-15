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

if(!isset($_GET['readOrder']))
{
    header("Location:Order.php");
    mysqli_close($con);
    exit();
}

$sql = " UPDATE orderr SET status = 3 WHERE status = 2";

mysqli_query($con,$sql);

header("Location:Order.php");

mysqli_close($con);

exit();

?>