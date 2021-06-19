<?php
include "../user/header.php";
include '../connection.php';

if(isset($_GET["id"]))
{
	$id=$_GET["id"];
    mysqli_query($con,"delete from service WHERE serviceID=$id ");
    //header ("location:variantView.php");
    echo '<script>window.location="../manager/servicesView.php"</script>';

}
$user = $_SESSION['user_id'];
$result=mysqli_query ($con,"SELECT *,s.email as emails,s.name as names, s.dob as dobs, s.contactNumber as contactNumbers FROM service s JOIN variant v ON s.varient_id = v.variant_id JOIN  branch b ON s.branchID=b.branchID JOIN carmodel c ON s.modelName = c.modelID WHERE s.user_id=$user");


	$rowcount=mysqli_num_rows($result);
	if($rowcount >0){
?>
<section class="section" id="trainers">
    <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>My <em>Bookings</em></h2>
                        <img src="../user/assets/images/line-dec.png" alt="">
                    </div>
                </div>
            </div>
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
	</div>
</section>
<?php
	}
include "../user/footer.php";
?>
  <script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
  </script>