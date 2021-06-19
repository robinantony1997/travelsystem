<?php
include '../connection.php';

if(isset($_POST['variant_id'])) {
    $id = $_POST["variant_id"];

    $carResult=mysqli_query ($con,"SELECT *FROM capability e,variant v WHERE e.varient_id=v.variant_id AND e.varient_id = $id");
	$rowcount=mysqli_num_rows($carResult);
	if($rowcount >0){
?>
<div class="container jumbotron p-3 my-3 ">
    <div class="card">
        <div class="card-header">
            <h5 class="title">Capability</h5>
        </div>
        <div class="card-body">
            <table class="table table-stripped,table table-hover" >


                    <tr align="center">
                        <th> Ground Clearance  </th>
                        <th> Approach Angle </th>
                        <th> Departure Angle </th>
                        <th> Rampover Angle </th>
                        <th> Water Wading Depth </th>
                            <th> Options </th>
                    </tr>
                    <?php
                        while($row=mysqli_fetch_array($carResult))
                        {
                            ?>
                            <tr align="center">
                                <td><?= $row['groundcl'] ?></td>
                                <td><?= $row['approach'] ?></td>	
                                <td><?= $row['depature'] ?></td>	
                                <td><?= $row['rampover'] ?></td>	
                                <td><?= $row['water'] ?></td>
                                <td>
                                    <a onclick="return confirm('are you sure. you want to delete this.?')" href="capabilityView.php?id=<?=$row['cid'] ?>">Delete</a>
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

