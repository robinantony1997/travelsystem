<?php
include '../connection.php';

if(isset($_POST['variant_id'])) {
    $id = $_POST["variant_id"];

    $carResult=mysqli_query ($con,"SELECT *FROM dimensions e,variant v WHERE e.varient_id=v.variant_id AND e.varient_id = $id");
	$rowcount=mysqli_num_rows($carResult);
	if($rowcount >0){
?>
<div class="container jumbotron p-3 my-3 ">
    <div class="card">
        <div class="card-header">
            <h5 class="title">Dimensions</h5>
        </div>
        <div class="card-body">
            <table class="table table-stripped,table table-hover " >


                    <tr align="center">
                        <!-- <th> Modal </th>
                        <th> Variant </th> -->
                        <th> length</th>
                        <th> width </th>
                        <th>height </th>
                        <th> wheelbase</th>
                        <th> fronttrack </th>
                        <th> reartrack</th>
                        <th> seatingcapacity</th>
                        <th> weight</th>


                            <th> Options </th>
                    </tr>
                    <?php
                    while($row=mysqli_fetch_array($carResult))
                    {
                        ?>
                        <tr align="center">
                            <td><?= $row['length'] ?></td>
                            <td><?= $row['width'] ?></td>	
                            <td><?= $row['height'] ?></td>	
                            <td><?= $row['wheelbase'] ?></td>	
        	
                            <td><?= $row['fronttrack'] ?></td>	
                            <td><?= $row['reartrack'] ?></td>	
                            <td><?= $row['seatingcapacity'] ?></td>	
                            <td><?= $row['weight'] ?></td>	
                            <td>
                                <a onclick="return confirm('are you sure. you want to delete this.?')" href="entertainmentView.php?id=<?=$row['entid'] ?>">Delete</a>
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