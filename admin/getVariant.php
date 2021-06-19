<?php
include '../connection.php';

if(isset($_POST['model_id'])) {
    $id = $_POST["model_id"];

    $variantResult=mysqli_query ($con,"SELECT *FROM variant v,carmodel c WHERE v.model_id=c.modelid AND v.model_id = $id");
	$rowcount=mysqli_num_rows($variantResult);
	

	if($rowcount >0){
?>
<div class="container  jumbotron p-4 my-1 ">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title">Variant</h5>
			</div>
			<div class="card-body">
				<table  class="table table-stripped table-hover">


					<tr>
					<th> Variant </th>
					<th> Image </th>
					<th> Color </th>
					<th> Price </th>
					<th> Engine Number </th>
					<th> Engine Type </th>
					<th> Displacement</th>
					<th> Max Power</th>
					<th> Max Torque </th>
					<th> No of Cylinder </th>
					<th> Gear Type </th>
					<th> Gear Box </th>
					<th> Drive Type </th>
						<th> Options </th>
					</tr>
					<?php
					while($row=mysqli_fetch_array($variantResult))
					{
						
						echo"<tr>";
						?>
							<td><?php echo $row['variant_name']?></td>
							<td><?='<img   src="../images/pics/'.$row['pic'].'";>'?></td>
							<td><?php echo $row['color']?></td>
							<td><?php echo $row['price']?></td>
							<td><?php echo $row['engine_number']?></td>
							<td><?php echo $row['engtype']?></td>
							<td><?php echo $row['displacement']?></td>
							<td><?php echo $row['max_power']?></td>
							<td><?php echo $row['max_torque']?></td>
							<td><?php echo $row['no_cylinder']?></td>
							<td><?php echo $row['geartype']?></td>
							<td><?php echo $row['gearbox']?></td>
							<td><?php echo $row['drivetype']?></td>
							<td>
								<a href='varient.php?id=<?php echo $row['variant_id']?>'>Edit</a> | 
								<a onclick="return confirm('are you sure. you want to delete this.?')" href='variantView.php?id=<?php echo $row['variant_id']?>'>Delete</a>
							</td>
						<?php 
							echo "</tr>";
							
					}

					?>
				</table>
			</div>
		</div>

</div>
<?php
	}   
}
?>

