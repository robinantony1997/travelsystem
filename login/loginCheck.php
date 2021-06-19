<?php
session_start();
include '../connection.php';

    $email = $_POST['email'];
    $password = md5($_POST['password']);
    
    $result = mysqli_query($con,"SELECT *FROM  userregistration WHERE email = '$email' and passwordz = '$password'");
    $row=mysqli_fetch_array($result);
   
    if(!empty(mysqli_num_rows($result))){
        $_SESSION['user_id'] = $row['user_id'];
        echo 1;
    }else{
        $result = mysqli_query($con,"SELECT *FROM  userregistration WHERE email = '$email' ");
        $result2 = mysqli_query($con,"SELECT *FROM  userregistration WHERE passwordz = '$password' ");
        if(empty(mysqli_num_rows($result))){
            echo "Invalid Email";
        }elseif(empty(mysqli_num_rows($result2))){
            echo "Invalid Password";
        }
    }



?>
