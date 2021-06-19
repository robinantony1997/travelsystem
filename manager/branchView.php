<?php
include '../connection.php';
include "../admin/header.php";
$result=mysqli_query ($con,"SELECT *FROM branch");

if(isset($_GET["id"]))
{
	$id=$_GET["id"];
    mysqli_query($con,"delete from branch where branchID=$id ");
    echo '<script>window.location="../admin/branchView.php"</script>';

}
?>
<div class="container  jumbotron p-4 my-1 ">
<div class="container jumbotron p-3 my-3 ">
    <div class="card">
        <div class="card-header">
            <h5 class="title">Branch</h5>
        </div>
        <div class="card-body">
            <table class="table table-stripped,table table-hover" >


                <tr align="center">
                    <th> Manager </th>
                    <th> Phone </th>
                    <th> Email </th>
                    <th> password </th>
                        <th> Options </th>
                </tr>
                <?php
                    while($row=mysqli_fetch_array($result)){
                        
                        echo"<tr>";
                        ?>
                            <td align="center"><?php echo $row['managerName']?></td>
                            <td align="center"><?php echo $row['phno']?></td>
                            <td align="center"><?php echo $row['email']?></td>
                            <td align="center"><?php echo $row['passwordz']?></td>

                            <td align="center">
                                <a href='branchReg.php?id=<?php echo $row['branchID']?>'>Edit</a> | 
                                <a onclick="return confirm('are you sure. you want to delete this.?')" href="branchView.php?id=<?=$row['branchID'] ?>">Delete</a>
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
include "../admin/footer.php";
?>
