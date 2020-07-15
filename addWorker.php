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
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin')
{
    header("Location:Home.php");
    mysqli_close($con);
    session_destroy();
    exit();
}
// check if admin did not submit
if(!isset($_POST['submit']))
{
    header("Location:Worker.php?errorInSubmit");
    mysqli_close($con);
    exit();
}
else
{
    $name = mysqli_real_escape_string($con,$_POST['nameAdd']);
    $email = mysqli_real_escape_string($con,$_POST['emailAdd']);
    $pass = mysqli_real_escape_string($con,$_POST['passwordAdd']);

// check worker name has no number or no special char
if(!preg_match('/^[a-zA-Z\s]+$/', $name) && !preg_match("/^[$arLetters\s]+$/u", $name))
{
    header("Location:Worker.php?errorInName");
    mysqli_close($con);
    exit();
}
// check user email duplicate
$sqlEmail = " SELECT * FROM user where email = '$email'";
$resultEmail = mysqli_query($con,$sqlEmail);

// check employee email duplicate
$sqlEmailE = " SELECT * FROM employee where email = '$email'";
$resultEmailE = mysqli_query($con,$sqlEmailE);

if(mysqli_num_rows($resultEmail) > 0 || mysqli_num_rows($resultEmailE) > 0)
{
    header("Location:Worker.php?errorInEmailDuplicate");
    mysqli_close($con);
    exit();
}
// check password length
$lengthOfPassword = strlen($pass);

    if($lengthOfPassword < 3)
    {
        header("Location:Worker.php?errorInPassword");
        mysqli_close($con);
        exit();
    }

    $hashedPassword = password_hash($pass,PASSWORD_DEFAULT);

    $sql = " INSERT INTO employee(name,email,password,role) VALUES('$name','$email','$hashedPassword','worker') ";
    
    mysqli_query($con,$sql);
    header("Location:Worker.php?success");
    mysqli_close($con);
    exit();
    
}
    
?>