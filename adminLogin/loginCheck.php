<?php
include '../connection.php';
    

    $username = $_POST['userName'];
    $password = $_POST['pass'];
    
    $result = mysqli_query($con,"SELECT *FROM  login WHERE username = '$username' and pass = '$password' ");

    if(!empty(mysqli_num_rows($result)))
    {
        $_SESSION['admin']=1;
        echo '<script>window.location="../admin/"</script>';	
    }
    else{
        $result = mysqli_query($con,"SELECT *FROM  login WHERE username = '$username' ");
        $result2 = mysqli_query($con,"SELECT *FROM  login WHERE pass = '$password' ");

        if(empty(mysqli_num_rows($result))){
            echo "<p>Invalid User Name! </p>";
        }
        elseif(empty(mysqli_num_rows($result2)))
        {
            echo "<p>Invalid Password </p> ";
        }
    }



?>