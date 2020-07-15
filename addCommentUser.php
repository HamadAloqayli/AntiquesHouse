<?php

include "database.php";

session_start();

if(!isset($_POST['submit']))
{
    header("Location:Home.php?errorInSubmit");
    mysqli_close($con);
    exit();
}

if(!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['title']) || !isset($_POST['text']))
{
    header("Location:Home.php?notFound");
    mysqli_close($con);
    exit();
}
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['title']) || empty($_POST['text']))
{
    header("Location:Home.php?emptyValues");
    mysqli_close($con);
    exit();
}
$name = mysqli_real_escape_string($con,$_POST['name']);
$email = mysqli_real_escape_string($con,$_POST['email']);
$title = mysqli_real_escape_string($con,$_POST['title']);
$text = mysqli_real_escape_string($con,$_POST['text']);
$dateComment = date('Y-m-d');


$arLetters = '\x{0621}-\x{063A}\x{0641}-\x{064A}';
if(!preg_match('/^[a-zA-Z\s]+$/', $name) && !preg_match("/^[$arLetters\s]+$/u", $name))
{
    header("Location:Home.php?errorInName#contact");
    mysqli_close($con);
    exit();
}

if(strlen($title) > 4000 || strlen($text) > 4000)
{
    header("Location:Home.php?longString#contact");
    mysqli_close($con);
    exit();
}

$sql = " INSERT INTO commentuser(name,email,title,text,date,status) VALUES('$name','$email','$title','$text','$dateComment',1) ";

mysqli_query($con,$sql);

header("Location:Home.php?successSent#contact");

mysqli_close($con);

exit();


?>