<?php
include '../connection.php';
include "../manager/header.php";
$result=mysqli_query ($con,"SELECT *FROM carmodel");

if(isset($_GET["id"]))
{
	$id=$_GET["id"];
    $image=$_GET["image"];
    unlink("../images/model/".$image);
    mysqli_query($con,"delete from carmodel where modelid=$id ");
    //header ("location:modelView.php");
    echo '<script>window.location="../manager/modelView.php"</script>';

}
?>
<div class="container  jumbotron p-4 my-1 ">
<div class="container jumbotron p-3 my-3 ">
    <div class="card">
        <div class="card-header">
            <h5 class="title">Model</h5>
        </div>
        <div class="card-body">
            <div id="hello">
                <table class="table table-stripped,table table-hover" >


                    <tr align="center">
                        <th> Modal Name </th>
                        <th> Image </th>
                        <th> CAR TYPE </th>
                        <th> MANUFACTURING YEAR </th>
                    </tr>
                    <?php
                        while($row=mysqli_fetch_array($result)){
                            
                            echo"<tr>";
                            ?>
                                <td align="center"><?php echo $row['modelname']?></td>
                                <td align="center"><?php echo '<img width="200" height="100" src="../images/model/'.$row['img'].'";>'?></td>
                                <td align="center"><?php echo $row['cartype']?></td>
                                <td align="center"><?php echo $row['mfyear']?></td>
                                
                            <?php 
                                echo "</tr>";
                                
                        }

                    ?>
                </table>
            </div>
            <div class="col-xs-12 text-center">
                <input type="button" class="btn btn-secondary" value="Print" onclick="codespeedy()">
            </div>
        </div>
    </div>
</div>
<?php
include "../manager/footer.php";
?>
<script type="text/javascript">
        
        function codespeedy(){
          var print_div = document.getElementById("hello");
    var print_area = window.open();
    print_area.document.write(print_div.innerHTML);
    print_area.document.close();
    print_area.focus();
    print_area.print();
    print_area.close();
    // This is the code print a particular div element
        }
</script>