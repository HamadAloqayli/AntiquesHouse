<?php

include "database.php";

session_start();

if(!isset($_GET['dWorker']))
{
    header('Location:Worker.php');
    exit();
}
if(isset($_COOKIE['role']))
{
  $_SESSION['id'] = $_COOKIE['id'];
  $_SESSION['name'] = $_COOKIE['name'];
  $_SESSION['email'] = $_COOKIE['email'];
  $_SESSION['role'] = $_COOKIE['role'];
}
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin')
{
    header("Location:Home.php");
    mysqli_close($con);
    session_destroy();
    exit();
}

$delWor = $_GET['dWorker'];

$sql = " DELETE FROM employee WHERE id = '$delWor' ";

mysqli_query($con,$sql);

header("Location:Worker.php?successD");

mysqli_close($con);

exit();

?>