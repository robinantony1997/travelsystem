<?php
include '../connection.php';

if(isset($_POST['submit'])) {
    $firstName= $_POST['firstName'];
    $lastName = $_POST['lastName'];
	$email=$_POST['email'];
    $query=$_POST['query'];
    

    $sql ="INSERT INTO contactSupport (firstName,lastName,email,query)
    VALUE('$firstName','$lastName','$email','$query')";

    $result = $con->query($sql);

    if($result){
    echo "new Recoed created"; 
    
    }
    else {
        echo "Error:".$sql ."". $con->error;
    }



}

?>