<?php
include "../manager/header.php";
include '../connection.php';

if(isset($_GET["id"]))
{
	$id=$_GET["id"];
    mysqli_query($con,"delete from service WHERE serviceID=$id ");
    //header ("location:variantView.php");
    echo '<script>window.location="../manager/servicesView.php"</script>';

}
$manager = $_SESSION['manager_id'];
$sql ="SELECT *,s.email as emails,s.name as names, s.dob as dobs, s.contactNumber as contactNumbers FROM service s JOIN variant v ON s.varient_id = v.variant_id JOIN  branch b ON s.branchID=b.branchID JOIN carmodel c ON s.modelName = c.modelID WHERE s.branchID=$manager";
//echo $sql;exit;
$result=mysqli_query ($con,$sql);
	$rowcount=mysqli_num_rows($result);
	if($rowcount >0){
?>

		<div class="container jumbotron p-3 my-3 ">
		    <div class="card">
		        <div class="card-header">
		            <h5 class="title">Car Booking</h5>
		        </div>
		        <div class="card-body">
		        	<div class="table-responsive-md" style="overflow-x: scroll;">
					  <table class="table" id="myTable">
					    <thead>
					        <th> Branch </th>
		                    <th> Model </th>
		                    <th> Variant </th>
		                    <th> Customer Name </th>
		                    <th> Car Number </th>
		                    <th>  Email </th>
		                    <th> Service Date></th>
		                    <th> Contact Number </th>
		                    <th> Suggetion </th>
		                    <th> Options </th>
		                    
		                </thead>
		                <tbody>
			                <?php
	                        while($row=mysqli_fetch_array($result))
	                        {
	                            ?>
	                            <tr>
	                                <td><?= $row['branchName'] ?></td>
	                                <td><?= $row['modelname'] ?></td>	
	                                <td><?= $row['variant_name'] ?></td>	
	                                <td><?= $row['names'] ?></td>
	                                <td><?= $row['carNumber'] ?></td>
	                                <td><?= $row['emails'] ?></td>
	                                <td><?= $row['dobs'] ?></td>
									<td><?= $row['contactNumbers'] ?></td>
	                                <td><?= $row['msg'] ?></td>
	                                <td>
	                                    <a onclick="return confirm('are you sure. you want to delete this.?')" href="servicesView.php?id=<?=$row['serviceID'] ?>">Delete</a>
	                                </td>
	                            </tr>
	                    <?php 
	                        }

	                     ?>
	                 </tbody>
					  </table>
				</div>
		        </div>
		    </div>
		</div>

<?php
	}
include "../manager/footer.php";
?>
