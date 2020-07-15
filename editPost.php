<?php

include "database.php";

session_start();

$arLetters = '\x{0621}-\x{063A}\x{0641}-\x{064A}';

if(!isset($_POST['submit']))
{
    header("Location:Post.php?errorInSubmitE");
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
// check product name has no number or no special char
if(!preg_match('/^[a-zA-Z\s]+$/', $_POST['titleEdit']) && !preg_match("/^[$arLetters\s]+$/u", $_POST['titleEdit']))
{
    header("Location:Post.php?errorInProductNameE");
    mysqli_close($con);
    exit();
}
// check product description has no number or no special char
if(!preg_match('/^[a-zA-Z\s]+$/', $_POST['textEdit']) && !preg_match("/^[$arLetters\s]+$/u", $_POST['textEdit']))
{
    header("Location:Post.php?errorInProductDescriptionE");
    mysqli_close($con);
    exit();
}

$id = $_POST['idEdit'];
$title = $_POST['titleEdit'];
$text = $_POST['textEdit'];

$sql = " UPDATE post SET title = '$title' , text = '$text' WHERE id = '$id'  ";

mysqli_query($con,$sql);

header("Location:Post.php?successE");

mysqli_close($con);

exit();


?>