<?php
include '../connection.php';
include "../manager/header.php";
if(isset($_GET["id"]))
{
	$id=$_GET["id"];
    $image=$_GET["image"];
    unlink("../images/variant/".$image);
    mysqli_query($con,"delete from car_pics where car_id=$id ");
    echo '<script>window.location="../manager/carPicsView.php"</script>';
}
$branchID  = $_SESSION['manager_id']??0;
?>
<div class="container jumbotron p-3 my-3 ">
    <div class="card">
        <div class="card-header">
            <h5 class="title">Pictures</h5>
        </div>
        <div class="card-body">
            <form action="carPics.php" method="POST" name="pic" id="getPic" enctype="multipart/form-data">
                <input type="hidden" class="form-control" id="inputModelID" value="<?=  $id ?>" name="carID" placeholder="" required />
                <input type="hidden" class="form-control" id="inputImage" value="<?=  $img ?>" name="imgCheck" placeholder="" required />
                <div class="form-group" style="display: none;">
                            <label for="getBranch" class="control-label " >Branch </label>
                                <select required class="form-control" id="getBranch" name="branchName">
                                    <option value="0">Select One</option>
                                        <?php
                                        $result=mysqli_query($con,"SELECT *FROM branch");
                                        while($row=mysqli_fetch_array($result))
                                        {
                                        ?>
                                    <option  <?=($branchID==$row['branchID'])?'selected':''?> value="<?php echo $row['branchID'];?>"  >
                                        <?php echo $row['branchName']; ?> 
                                    </option>
                                        <?php
                                        }
                                        ?>
                                </select>
                </div>
            <div class="form-group">
                        <label for="getModel" class="control-label " >Modal Name </label>
                            <select required class="form-control" id="getModel" name="modelName">                                
                            </select>
            </div>
                <div class="form-group">
                        <label for="getVariant" class="control-label " > Variant </label>
                            <select required class="form-control" id="getVariant" name="variantName">
                            </select>
                    </div> 
                
                    <div id="holder"></div>
            </form>
        </div>
    </div>
</div>

<?php
include "../manager/footer.php";
?>

<script>
$(document).ready(function(){
    $("#getBranch").trigger("change");
});
$("#getModel").change(function(e){ 
    e.preventDefault();
    var model = $("#getModel").val();
    $.ajax(
            {
                type:"POST",
                url: "getVar.php",
                data: {model_id:model},
                dataType: "html",
                success: function (data) {
                  $("#getVariant").html(data);
                },
                error:function(er){
                  console.log(er);
                }
             
            }
        );

  });

</script>

<script>

$("#getBranch").change(function(e){ 
    e.preventDefault();
    var branch = $("#getBranch").val();
    $.ajax(
            {
                type:"POST",
                url: "getMod.php",
                data: {branchID:branch},
                dataType: "html",
                success: function (data) {
                  $("#getModel").html(data);
                },
                error:function(er){
                  console.log(er);
                }
             
            }
        );

  });

$("#getModel").change(function(e){ 
    e.preventDefault();
    var model = $("#getModel").val();
    $.ajax(
            {
                type:"POST",
                url: "getVar.php",
                data: {model_id:model},
                dataType: "html",
                success: function (data) {
                  $("#getVariant").html(data);
                },
                error:function(er){
                  console.log(er);
                }
             
            }
        );

  });


$("#getVariant").change(function(e){ 
    e.preventDefault();
    var variant = $("#getVariant").val();
    $.ajax(
            {
                type:"POST",
                url: "getCarPics.php",
                data: {variant_id:variant},
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