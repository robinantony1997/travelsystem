<?php
include '../connection.php';

if(isset($_POST['branchID'])) {
    $id = $_POST["branchID"];
    $result=mysqli_query ($con,"SELECT *FROM carmodel c, branch b where c.branchID = b.branchID AND c.branchID=$id");
    $rowcount=mysqli_num_rows($result);
	

	if($rowcount >0){
?>
            <div class="container  jumbotron p-4 my-1 ">
            <div class="container jumbotron p-3 my-3 ">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">Model</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-stripped,table table-hover" id="myTable" >

                            <thead>
                                <tr align="center">
                                    <th> Modal </th>
                                    <th> Image </th>
                                    <th> Transmission </th>
                                    <th> Manufacturing year </th>
                                        <th> Options </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                while($row=mysqli_fetch_array($result)){
                                    
                                    echo"<tr>";
                                    ?>
                                        <td align="center"><?php echo $row['modelname']?></td>
                                        <td align="center"><?php echo '<img width="200" height="100" src="../images/model/'.$row['img'].'";>'?></td>
                                        <td align="center"><?php echo $row['cartype']?></td>
                                        <td align="center"><?php echo $row['mfyear']?></td>

                                        <td align="center">
                                            <a href='carmodel.php?id=<?php echo $row['modelid']?>'>Edit</a> | 
                                            <a onclick="return confirm('are you sure. you want to delete this.?')" href="modelView.php?id=<?=$row['modelid'] ?>&image=<?= $row['img'] ?> ">Delete</a>
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
