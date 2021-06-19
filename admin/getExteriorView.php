<?php
include '../connection.php';

if(isset($_POST['variant_id'])) {
    $id = $_POST["variant_id"];

    $carResult=mysqli_query ($con,"SELECT *FROM exterior e,variant v WHERE e.varient_id=v.variant_id AND e.varient_id = $id");
	$rowcount=mysqli_num_rows($carResult);
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
                        <th> foglightfont </th>
                        <th>Adjustable Headlights </th>
                        <th> foglightnear </th>
                        <th> powerantenna </th>
                            
                            <th> Rain Sensing Wiper </th>
                            <th>Wheel Covers </th>
                            <th> Sun roof </th>
                            <th> Options </th>
                    </tr>
                    <?php
                        while($row=mysqli_fetch_array($carResult))
                        {
                            ?>
                            <tr align="center">
                                <td><?= $row['foglightfont'] ?></td>
                                <td><?= $row['electric_adjustableseat'] ?></td>	
                                <td><?= $row['foglightnear'] ?></td>	
                                <td><?= $row['powerantenna'] ?></td>
                                <td><?= $row['rain'] ?></td>
                                <td><?= $row['wheel'] ?></td>
                                <td><?= $row['sun'] ?></td>	
                                
                            
                                <td>
                                    <a onclick="return confirm('are you sure. you want to delete this.?')" href="exteriorView.php?id=<?=$row['exterior_id'] ?>">Delete</a>
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

