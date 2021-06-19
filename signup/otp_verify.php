<?php
include "../connection.php";

$otp_id = $_POST['otp_id'];
$otp = $_POST['otp'];
//echo "SELECT * FROM otp WHERE id = $otp_id and otp_value=$otp";
$result = mysqli_query($con,"SELECT * FROM otp WHERE otp_id = $otp_id and otp_value='".$otp."' ");
$dot = mysqli_num_rows($result);

if( $dot>0 ){
    $array = array(
        'status' => 1
    );

    mysqli_query($con,"DELETE FROM otp WHERE otp_id=$otp_id");
    
}
else{
    $array = array(
        'status' => 0
    );
    
}

echo json_encode($array);

?>