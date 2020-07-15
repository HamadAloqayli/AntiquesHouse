<?php

include "database.php";
$empId = $_SESSION['id'];

$sql_ChangeStatus = " UPDATE orderr SET status = 2 WHERE $empId = Eid AND status = 1";

$result_ChangeStatus = mysqli_query($con,$sql_ChangeStatus);


?>