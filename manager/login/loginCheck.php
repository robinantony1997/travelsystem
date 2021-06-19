<?php
session_start();
include '../../connection.php';
    

    $username = $_POST['userName'];
    $password = MD5($_POST['pass']);
    
    $result = mysqli_query($con,"SELECT *FROM  branch WHERE email = '$username' and passwordz = '$password' ");
    $row=mysqli_fetch_array($result);
   
    if(!empty(mysqli_num_rows($result)))
    {
        $_SESSION['manager_id']=$row['branchID'];
     
        echo '<script>window.location="../"</script>';	
    }
    else{
        $result = mysqli_query($con,"SELECT *FROM  branch WHERE email = '$username' ");
        $result2 = mysqli_query($con,"SELECT *FROM  branch WHERE passwordz = '$password' ");
        if(empty(mysqli_num_rows($result))){
            echo "<p>Invalid User Name! </p>";
        }
        else if(empty(mysqli_num_rows($result2)))
        {
            echo "<p>Invalid Password </p> ";
        }
    }



?>