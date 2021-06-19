<?php
include "../user/header.php";
include '../connection.php';
$user = $_SESSION['user_id'];
$result=mysqli_query ($con,"SELECT * FROM `booking` b join variant v on v.variant_id=b.variant_id join carmodel c on c.modelid=v.model_id join branch br on br.branchID=c.branchID join userregistration u on u.user_id=b.user_id where u.user_id=$user");
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
		            <h5 class="title">CAR</h5>
		        </div>
		        <div class="card-body">
		        	<div class="table-responsive-md">
					  <table class="table" id="myTable">
					    <thead>
					    	<th> Reference Number </th>
		                    <th> Model </th>
		                    <th> Variant </th>
		                    <th> Order Date </th>
		                    <th> Amount </th>
		                    
		                </thead>
		                <tbody>
			                <?php
	                        while($row=mysqli_fetch_array($result))
	                        {
	                            ?>
	                            <tr>
	                                <td><?= $row['referenceNumber'] ?></td>
	                                <td><?= $row['modelname'] ?></td>	
	                                <td><?= $row['variant_name'] ?></td>	
	                                <td><?= $row['order_date'] ?></td>
	                                <td><?= $row['amount'] ?></td>
	                               
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