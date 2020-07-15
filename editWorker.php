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

if(!isset($_POST['submit']))
{
    header("Location:Worker.php?errorInSubmitE");
    mysqli_close($con);
    exit();
}
else
{
    $id = $_POST['idEdit'];
    $name = mysqli_real_escape_string($con,$_POST['nameEdit']);
    $email = mysqli_real_escape_string($con,$_POST['emailEdit']);

// check worker name has no number or no special char
if(!preg_match('/^[a-zA-Z\s]+$/', $name) && !preg_match("/^[$arLetters\s]+$/u", $name))
{
    header("Location:Worker.php?errorInWorkerNameE");
    mysqli_close($con);
    exit();
}

// check user email duplicate
$sqlEmail = " SELECT * FROM user where email = '$email'";
$resultEmail = mysqli_query($con,$sqlEmail);

// check employee email duplicate
$sqlEmailE = " SELECT * FROM employee where email = '$email' AND id <> '$id' ";
$resultEmailE = mysqli_query($con,$sqlEmailE);

if(mysqli_num_rows($resultEmail) > 0 || mysqli_num_rows($resultEmailE) > 0)
{
    header("Location:Worker.php?errorInEmailDuplicate");
    mysqli_close($con);
    exit();
}


$sql = " UPDATE employee SET name = '$name' , email = '$email' WHERE id = '$id'  ";

mysqli_query($con,$sql);

header("Location:Worker.php?successE");

mysqli_close($con);

exit();

}

?>