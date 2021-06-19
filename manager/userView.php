<?php
include '../connection.php';
include "../manager/header.php";

if(isset($_GET["id"]))
{
	$id=$_GET["id"];
    mysqli_query($con,"delete from userregistration where user_id=$id ");
    echo '<script>window.location="../manager/userView.php"</script>';

}

    $carResult=mysqli_query ($con,"SELECT *FROM userregistration");
	$rowcount=mysqli_num_rows($carResult);
	if($rowcount >0){
?>
<div class="container jumbotron p-3 my-3 ">
    <div class="card">
        <div class="card-header">
            <h5 class="title">Users</h5>
        </div>
        <div class="card-body">
            <table class="table table-responsive table-hover" id="myTable">

                <thead>
                    <tr align="center">
                        <th> Name </th>
                        <th>  DOB </th>
                        <th> Aadhar Number </th>
                        <th> Phone Number </th>
                        <th> Pin Code </th>
                        <th>  Email </th>
                            <th> Options </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($row=mysqli_fetch_array($carResult))
                        {
                            ?>
                            <tr align="center">
                                <td><?= $row['first_name'] ?> <?= $row['last_name'] ?></td>	
                                <td><?= $row['dob'] ?></td>	
                                <td><?= $row['aadhar_number'] ?></td>	
                                <td><?= $row['phone_number'] ?></td>
                                <td><?= $row['pin_code'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td>
                                    <a onclick="return confirm('are you sure. you want to delete this.?')" href="userView.php?id=<?=$row['user_id'] ?>">Delete</a>
                                </td>
                            <?php 
                                echo "</tr>";
                                
                        }

                        ?>
                </tbody>
            </table>
        </div>
                    </div>

</div>
<?php
	}   

?>

<?php
include "../manager/footer.php";
?>