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
            <h5 class="title">Model</h5>
        </div>
        <div class="card-body">
            <div id="holder">
            <table class="table table-stripped,table table-hover" >


                <tr align="center">
                    <th> Branch </th>  
                    <th> Manager </th>
                    <th> Phone </th>
                    <th> Email </th>
                    <th> password </th>
                </tr>
                <?php
                    while($row=mysqli_fetch_array($result)){
                        
                        echo"<tr>";
                        ?>
                            <td align="center"><?php echo $row['branchName']?></td>

                            <td align="center"><?php echo $row['managerName']?></td>
                            <td align="center"><?php echo $row['phno']?></td>
                            <td align="center"><?php echo $row['email']?></td>
                            <td align="center"><?php echo $row['passwordz']?></td>

                           
                        <?php 
                            echo "</tr>";
                            
                    }

                ?>
            </table>
                </div>
            <br>
            <div class="col-xs-12 text-center">
                <input type="button" class="btn btn-secondary" value="Print" onclick="codespeedy()">
            </div>
        </div>
    </div>
</div>

<?php
include "../admin/footer.php";
?>
<script type="text/javascript">
        
        function codespeedy(){
          var print_div = document.getElementById("holder");
    var print_area = window.open();
    print_area.document.write(print_div.innerHTML);
    print_area.document.close();
    print_area.focus();
    print_area.print();
    print_area.close();
    // This is the code print a particular div element
        }
</script>