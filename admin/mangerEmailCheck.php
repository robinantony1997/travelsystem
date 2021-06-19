<?php
include "../connection.php";

$email = $_POST['email'];
$phno = $_POST['phno'];
$id   = $_POST['id']??0;

$result = mysqli_query($con,"SELECT * FROM branch WHERE email = '$email' and branchID != '".$id."'");
$result2 = mysqli_query($con,"SELECT * FROM branch WHERE phno = '$phno' and branchID != '".$id."'");
$dot = mysqli_num_rows($result);
$dot2 = mysqli_num_rows($result2);
$dot > 0 ? $emailStatus =1 : $emailStatus = 0;
$dot2 > 0 ? $phnoStatus =1 : $phnoStatus = 0;

$array = array(
    'email' => $emailStatus,
    'phno' => $phnoStatus
);
    echo json_encode($array);

    
?>