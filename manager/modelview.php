<?php
include "../manager/header.php";
include '../connection.php';

if(isset($_GET["id"]))
{
	$id=$_GET["id"];
    $image=$_GET["image"];
    unlink("../images/model/".$image);
    mysqli_query($con,"delete from carmodel where modelid=$id ");
    //header ("location:modelView.php");
    echo '<script>window.location="../manager/modelView.php"</script>';

}
$branchID  = $_SESSION['manager_id']??0;
?>

?>
<div class="container jumbotron p-3 my-3" style="display: none;">
    <div class="card">
        <div class="card-header">
            <h5 class="title">Branch</h5>
        </div>
        <div class="card-body">
            <div class="form-group">
                        <label for="getBranch" class="control-label " >Branch </label>
                            <select required class="form-control" id="getBranch" name="branchName">
                                <option value="0">Select One</option>
                                    <?php
                                    $result=mysqli_query($con,"SELECT *FROM branch");
                                    while($row=mysqli_fetch_array($result))
                                    {
                                    ?>
                                <option <?=($branchID==$row['branchID'])?'selected':''?> value="<?php echo $row['branchID'];?>" >
                                    <?php echo $row['branchName']; ?> 
                                </option>
                                    <?php
                                    }
                                    ?>
                            </select>
            </div>
        </div>
    </div>
</div>

<div id="holder"></div>
  



<?php
include "../manager/footer.php";
?>

<script>
$(document).ready(function(){
    $("#getBranch").trigger("change");
});
$("#getBranch").change(function(e){ 
    e.preventDefault();
    var branch = $("#getBranch").val();
    $.ajax(
            {
                type:"POST",
                url: "getModel.php",
                data: {branchID:branch},
                dataType: "html",
                success: function (data) {
                  $("#holder").html(data);
                },
                error:function(er){
                  console.log(er);
                }
             
            }
        );

  });

</script>