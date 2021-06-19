<?php
include '../connection.php';

if(isset($_POST['variant_id'])) {
    $id = $_POST["variant_id"];

    $carResult=mysqli_query ($con,"SELECT *FROM entertainment e,variant v WHERE e.varient_id=v.variant_id AND e.varient_id = $id");
	$rowcount=mysqli_num_rows($carResult);
	if($rowcount >0){
?>
<div class="container jumbotron p-3 my-3 ">
    <div class="card">
        <div class="card-header">
            <h5 class="title">Model</h5>
        </div>
        <div class="card-body">
            <table class="table-responsive-md" id="myTable" >
                <thead>

                    <tr align="center">
                        <!-- <th> Modal </th>
                        <th> Variant </th> -->
                        <th> dvd_player </th>
                        <th> radio_player </th>
                        <th> speaker </th>
                        <th> usb_auxilaryin </th>
                        <th> blutooth </th>
                        <th> touchscreen </th>


                            <th> Options </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($row=mysqli_fetch_array($carResult))
                    {
                        ?>
                        <tr align="center">
                            <td><?= $row['dvd_player'] ?></td>
                            <td><?= $row['radio_player'] ?></td>	
                            <td><?= $row['speaker'] ?></td>	
                            <td><?= $row['usb_auxilaryin'] ?></td>	
                            <td><?= $row['blutooth'] ?></td>	
                            <td><?= $row['touchscreen'] ?></td>	

                            <td>
                                <a onclick="return confirm('are you sure. you want to delete this.?')" href="entertainmentView.php?id=<?=$row['entid'] ?>">Delete</a>
                            </td>
                        <?php 
                            echo "</tr>";
                            
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<?php
	}   
}
?>


<script>
    $(document).ready( function () {
        $('#myTable').DataTable({
            responsive: true
        });
    } );
  </script>