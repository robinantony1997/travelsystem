<?php
include "../manager/header.php";
?>
<?php
include '../connection.php';

if(isset($_POST['submit'])) {
    $pw= md5($_POST['password']);
    $manager  = $_SESSION['manager_id']??0;
    

    $sql ="UPDATE  branch SET passwordz = '$pw' WHERE branchID = $manager ";

    $result = $con->query($sql);

    if($result){
        echo '<script>window.location="../manager/"</script>';  
    }
    else {
        echo "Error:".$sql ."". $con->error;
    }



}
$bid  = $_SESSION['manager_id']??0;

?>

<div class="container jumbotron p-6 my-3 ">
    <div class="card">
        <div class="card-header">
            <h5 class="title">CHANGE  PASSWORD</h5>
        </div>
        <div class="card-body">
            <div class="form-group">
                <form action="changePass.php" method="POST" name="form1" id="form1" >
                   
                    <div class="form-group">
                        <label for="inputgroundclearance" class="control-label ">Enter New Password</label>
                            <input type="password" class="form-control" id="getPassword"  required name="password" />
                    </div>
                    <div class="form-group">
                        <label for="inputgroundclearance" class="control-label ">Confirm Password</label>
                            <input type="password" class="form-control" id="getCPassword"  required name="cnfPassword" />
                    </div>
                    
                    <div class="form-group text-center">        
                        <input type="submit" class="btn btn-dark me-2" name="submit" value="submit">
                    </div>
               </form>
            </div> 
        </div>
    </div>

</div>
<?php
include "../manager/footer.php";
?>

