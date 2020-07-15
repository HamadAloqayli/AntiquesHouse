<?php

include "database.php";

session_start();

$arLetters = '\x{0621}-\x{063A}\x{0641}-\x{064A}';

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
// check if employee did not submit or if submit file has an error or it is empty
if(!isset($_POST['submit']) || $_FILES['imageAdd']['error'] != 0 || empty($_FILES['imageAdd']['name']))
{
    header("Location:Post.php?errorInSubmitOrUpload");
    mysqli_close($con);
    exit();
}
// check product name has no number or no special char
if(!preg_match('/^[a-zA-Z\s]+$/', $_POST['titleAdd']) && !preg_match("/^[$arLetters\s]+$/u", $_POST['titleAdd']))
{
    header("Location:Post.php?errorInProductName");
    mysqli_close($con);
    exit();
}
// check product description has no number or no special char
if(!preg_match('/^[a-zA-Z\s]+$/', $_POST['descriptionAdd']) && !preg_match("/^[$arLetters\s]+$/u", $_POST['descriptionAdd']))
{
    header("Location:Post.php?errorInProductDescription");
    mysqli_close($con);
    exit();
}
// check product price has only numbers
if(!preg_match('/^[0-9]+$/', $_POST['priceAdd']))
{
    header("Location:Post.php?errorInProductPrice");
    mysqli_close($con);
    exit();
}

$img = $_FILES['imageAdd']['name'];
$target="savedImg/".basename($_FILES['imageAdd']['name']);
$title = $_POST['titleAdd'];
$text = $_POST['descriptionAdd'];
$type = $_POST['typeAdd'];
$price = $_POST['priceAdd'];


$sqlAddPost = " INSERT INTO post(image,title,text,category,price) VALUES('$img','$title','$text','$type','$price') ";

mysqli_query($con,$sqlAddPost);

move_uploaded_file($_FILES['imageAdd']['tmp_name'],$target);

header("Location:Post.php?success");

mysqli_close($con);

exit();

?>