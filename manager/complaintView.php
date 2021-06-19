<?php
include "../manager/header.php";
include '../connection.php';

if(isset($_GET["id"]))
{
	$id=$_GET["id"];
    mysqli_query($con,"delete from complaint WHERE complaintID=$id ");
    //header ("location:variantView.php");
    echo '<script>window.location="../manager/complaintView.php"</script>';

}
$result=mysqli_query ($con,"SELECT *FROM complaint s JOIN variant v ON s.varient_id = v.variant_id");


	$rowcount=mysqli_num_rows($result);
	if($rowcount >0){
?>

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
		                    <th>  Options </th>
		                    
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
	                                <td>
                                    	<a onclick="return confirm('are you sure. you want to delete this.?')" href="complaintView.php?id=<?=$row['complaintID'] ?>">Delete</a>
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
  <script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
  </script>