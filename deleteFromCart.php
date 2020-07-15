<?php

include "database.php";

session_start();

if(!isset($_SESSION['id']))
{
    header("Location:Shop.php");
    mysqli_close($con);
    session_destroy();
    exit();
}
if(!isset($_GET['postId']))
{
    header("Location:Shop.php");
    mysqli_close($con);
    session_destroy();
    exit();
}

$empId = $_SESSION['id'];
$postId = $_GET['postId'];

$sql = " DELETE FROM orderr WHERE Eid = '$empId' AND Pid = '$postId' AND status = 1 ";

mysqli_query($con,$sql);
header("Location:Cart.php?sucsses");


mysqli_close($con);


?>