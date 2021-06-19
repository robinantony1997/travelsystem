<?php
include '../connection.php';

if(isset($_POST['variant_id'])) {
    $id = $_POST["variant_id"];

    $carResult=mysqli_query ($con,"SELECT *FROM safety e,variant v WHERE e.variant_id=v.variant_id AND e.variant_id = $id");
	$rowcount=mysqli_num_rows($carResult);
	if($rowcount >0){
?>
<div class="container jumbotron p-1 my-1 ">
    <div class="card">
        <div class="card-header">
            <h5 class="title">Model</h5>
        </div>
        <div class="card-body">
            <table class="table table-stripped,table table-hover" >


                    <tr align="center">
                        <th> Antilock Breaking System </th>
                        <th> Break assist </th>
                        <th> Centrel Locking System </th>
                        <th> No Of Airbags </th>
                        <th> Day Night Rear view </th>
                        <th> Passanger Side View Mirro </th>
                        <th> Xenon head lamp </th>
                        <th> Halogen head lamp </th>
                        <th> Rear Seat Belt </th>
                        <!-- <th> Seat Belt Warning </th>
                        <th> Door Ajar Warning </th>
                        <th> Side Impact Beams </th>
                        <th> Adjustable Seat </th>
                        <th> Vehicle Control stability </th>
                        <th> Engine immobilizer </th>
                        <th> Crash sensor </th> -->
                            <th> Options </th>
                    </tr>
                    <?php
                        while($row=mysqli_fetch_array($carResult))
                        {
                            ?>
                            <tr align="center">
                                <td><?= $row['antilock_breakingstm'] ?></td>
                                <td><?= $row['brakeassist'] ?></td>	
                                <td><?= $row['centrellockstm'] ?></td>	
                                <td><?= $row['airbags'] ?></td>
                                <td><?= $row['daynight_rearviewmirror'] ?></td>
                                <td><?= $row['passengersidemirror'] ?></td>	
                                <td><?= $row['xenonheadlamp'] ?></td>	
                                <td><?= $row['halogenheadlamp'] ?></td>
                                <td><?= $row['rearseatbelt'] ?></td>
                                <!-- <td><?= $row['seatbeltwarning'] ?></td>	
                                <td><?= $row['doorajarwarning'] ?></td>	
                                <td><?= $row['sideimpactbeams'] ?></td>
                                <td><?= $row['adjustableseat'] ?></td>
                                <td><?= $row['vehiclecntrl'] ?></td>	
                                <td><?= $row['engineimmobilizer'] ?></td>	
                                <td><?= $row['crashsensor'] ?></td> -->
                                <td>
                                    <a onclick="return confirm('are you sure. you want to delete this.?')" href="safetyRegView.php?id=<?=$row['safeid'] ?>">Delete</a>
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

