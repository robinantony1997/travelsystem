<?php
include "../admin/header.php";
include '../connection.php';
if(isset($_GET["id"]))
{
	$id=$_GET["id"];
    mysqli_query($con,"delete from testdrive where testID=$id ");

    echo '<script>window.location="../admin/testView.php"</script>';

}
$result=mysqli_query ($con,"SELECT * FROM `testdrive` b join variant v on v.variant_id=b.variant_id join carmodel c on c.modelid=v.model_id join branch br on br.branchID=c.branchID join userregistration u on u.user_id=b.user_id");
	$rowcount=mysqli_num_rows($result);
	if($rowcount >0){
?>




<style>
	.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
		<div class="container jumbotron p-3 my-3 ">
		    <div class="card">
		        <div class="card-header">
		            <h5 class="title">Test Ride</h5>
		        </div>
		        <div class="card-body">
		        	<div class="table-responsive-md">
					  <table class="table" id="myTable">
					    <thead>
					    	<th> Reference Number </th>
		                    <th> Model </th>
		                    <th> Variant </th>
		                    <th> Customer Name </th>
		                    <th> Test Date </th>
		                    <th> Status </th>
		                    <th> Options </th>
		                    
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
                                <td><?= $row['first_name'] ?></td>
                                <td><?= $row['testDate'] ?></td>
                                <td id="d-<?=$row['testID']?>">
                                	<?php if($row['status']=="pending") { ?>
                                	<label class="switch">
									  <input class="driveAccept" data-id="<?=$row['testID']?>" value="1" type="checkbox" <?php echo ($row['status']=="ACCEPTED")?'checked':'' ?>>
									  <span class="slider round"></span>
									</label>
								<?php }else{
									echo "ACCEPTED";
								} ?>
									
								</td>
                               
                                <td>
                                    <a onclick="return confirm('are you sure. you want to delete this.?')" href="testView.php?id=<?=$row['testID'] ?>">Delete</a>
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
include "../admin/footer.php";
?>
<script>
	$(".driveAccept").click(function(){
		var testID = $(this).attr("data-id");
		//alert(testID);
		$.ajax(
            {
                type:"POST",
                url: "../manager/testDriveApproval.php",
                data: {id: testID},
                dataType: "json",
                success: function (data) {
                   if(data.status == 1) {
                   		$("#d-"+testID).html("ACCEPTED");
                   }
                }
             
            }
        );

	});
</script>
