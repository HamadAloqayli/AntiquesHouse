
<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'mydb';

$con = mysqli_connect($host,$user,$pass,$db);

if (mysqli_connect_errno()) {

    die("failed to connect ". mysqli_connect_error() );
}


?>