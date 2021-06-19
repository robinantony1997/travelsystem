<?php
include '../connection.php';

//if(isset($_POST['userRegistration'])) {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $dob = $_POST['dob'];
    $aadharNumber = $_POST['aadhar_number'];
    $pinCode = $_POST['pin_code'];
    $phoneNumber = $_POST['phone_number'];//
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    

    //$image = $_FILES["image"]['name'];
    $sql ="INSERT INTO userregistration (first_name,last_name,dob,aadhar_number,pin_code,phone_number,email,passwordz)
    VALUES('$firstName','$lastName','$dob',$aadharNumber,$pinCode,$phoneNumber,'$email','$password')";

    $result = $con->query($sql);

    if($result){
        $status = "1";
    $message = "new Record created"; 
    
    }
    else {
        $message = "0";
        $message = "Error:".$sql ."". $con->error;
    }
    echo json_encode(array('status'=>$status,'message'=>$message));


//}

?>