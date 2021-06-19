<?php
include '../connection.php';
include "../admin/header.php";
if(isset($_GET["id"]))
{
	$id=$_GET["id"];
    mysqli_query($con,"delete from capability where cid=$id ");
    //header ("location:exteriorView.php");
    echo '<script>window.location="../admin/capabilityView.php"</script>';

}
?>
<div class="container jumbotron p-3 my-3 ">
    <div class="card">
        <div class="card-header">
            <h5 class="title">Capability</h5>
        </div>
        <div class="card-body">
            <form action="exteriorView.php" method="POST" name="pic" id="getPic">
            <div class="form-group">
                        <label for="inputBranchlName" class="control-label " >Branch  </label>
                            <select required class="form-control" id="getBranch" name="branchName">
                                <option value="0">Select One</option>
                                    <?php
                                    $result=mysqli_query($con,"SELECT *FROM branch");
                                    while($row=mysqli_fetch_array($result))
                                    {
                                    ?>
                                <option value="<?php echo $row['branchID'];?>">
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
                                <option value="">Select One</option>
                                    
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
include "../admin/footer.php";
?>

<script>

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

$("#getVariant").change(function(e){ 
    e.preventDefault();
    var variant = $("#getVariant").val();
    $.ajax(
            {
                type:"POST",
                url: "getCapability.php",
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
</script>
