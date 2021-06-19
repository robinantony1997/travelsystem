<?php
include "../user/header.php";
include '../connection.php';

if(isset($_GET["id"]))
{
	$id=$_GET["id"];
    mysqli_query($con,"delete from complaint WHERE complaintID=$id ");
    //header ("location:variantView.php");
    echo '<script>window.location="../manager/complainView.php"</script>';

}
$user = $_SESSION['user_id'];
$result=mysqli_query ($con,"SELECT *FROM feedback s JOIN variant v ON s.varient_id = v.variant_id  WHERE s.user_id=$user");


	$rowcount=mysqli_num_rows($result);
	if($rowcount >0){
?>
<section class="section" id="trainers">
    <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>My <em>FeedBack</em></h2>
                        <img src="../user/assets/images/line-dec.png" alt="">
                    </div>
                </div>
            </div>
		<div class="container jumbotron p-3 my-3 ">
		    <div class="card">
		        <div class="card-header">
		            <h5 class="title">Complaints</h5>
		        </div>
		        <div class="card-body">
		        	<div class="table-responsive-md" style="overflow-x: scroll;">
					  <table class="table" id="myTable">
					    <thead>
		                    <th> Variant </th>
		                    <th> Customer Name </th>
		                    <th> Contact Number </th>
		                    <th>  Messeage </th>
		                    
		                </thead>
		                <tbody>
			                <?php
	                        while($row=mysqli_fetch_array($result))
	                        {
	                            ?>
	                            <tr>
	                                <td><?= $row['variant_name'] ?></td>	
	                                <td><?= $row['name'] ?></td>
									<td><?= $row['contactNumber'] ?></td>
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