<?php
include '../connection.php';

if(isset($_POST['variant_id'])) {
    $id = $_POST["variant_id"];

    $carResult=mysqli_query ($con,"SELECT *FROM car_pics c,variant v,carmodel m WHERE v.variant_id=c.variant_id AND v.model_id = m.modelid AND c.variant_id = $id");
	$rowcount=mysqli_num_rows($carResult);
    //echo "SELECT *FROM car_pics c,variant v,carmodel m WHERE v.variant_id=c.variant_id ,v.model_id = m.model_id AND c.variant_id = $id";
	if($rowcount >0){
?>
<div class="container jumbotron p-3 my-3 ">
    <div class="card">
        <div class="card-header">
            <h5 class="title">Model</h5>
        </div>
        <div class="card-body">
            <table class="table table-stripped,table table-hover" >


                    <tr align="center">
                        <!-- <th> Modal </th>
                        <th> Variant </th> -->
                        <th> Image </th>
                            <th> Options </th>
                    </tr>
                    <?php
                    while($row=mysqli_fetch_array($carResult))
                    {
                        ?>
                        <tr align="center">
                        
                            <!-- <td><?php echo $row['modelname']?></td>
                            <td><?php echo $row['variant_name']?></td> -->
                            <td><?php echo '<img width="200" height="150" src="../images/variant/'.$row['pics'].'";>'?></td>	
                            <td>
                                <a href='carPics.php?id=<?php echo $row['car_id']?>'>Edit</a> | 
                                <a onclick="return confirm('are you sure. you want to delete this.?')" href="carPicsView.php?id=<?=$row['car_id'] ?>&image=<?= $row['pics'] ?> ">Delete</a>
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

