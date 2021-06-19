<?php
include "header.php";
?>
<?php
include '../connection.php';

if(isset($_POST['submit'])) {
    $gc= $_POST['gc'];
    $aa = $_POST['aa'];
	$da=$_POST['da'];
    $ra=$_POST['ra'];
    $ww= $_POST['ww'];
    $modelName= $_POST['modelName'];
    $varientName = $_POST['variantName'];
	
    

    $sql ="INSERT INTO capability (groundcl,approach,depature,rampover,water,model_id,varient_id)
    VALUE('$gc','$aa','$da','$ra','$ww','$modelName','$varientName')";

    $result = $con->query($sql);

    if($result){
    echo "new Recoed created"; 
    
    }
    else {
        echo "Error:".$sql ."". $con->error;
    }



}

?>

<div class="container jumbotron p-3 my-3 ">
    <div class="card">
        <div class="card-header">
            <h5 class="title">Capability</h5>
        </div>
        <div class="card-body">
            <div class="form-group">
                <form action="capability.php" method="POST" name="form1" id="form1" >
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
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="getVariant" class="control-label " > Variant </label>
                            <select required class="form-control" id="getVariant" name="variantName" required>
                                <option value="">Select One</option>
                            </select>
                    </div>  
                    <div class="form-group">
                        <label for="inputgroundclearance" class="control-label ">Ground Clearance</label>
                            <input type="text" class="form-control" id="gc" name="gc" placeholder="" required name="Ground Clearance" />
                    </div>
                    <div class="form-group">
                        <label for="inputapproachangle" class="control-label " >Approach Angle</label>
                            <input type="text" class="form-control" id="aa" name="aa" placeholder="" required name="Approach Angle" />
                    </div>
                    <div class="form-group">
                        <label for="inputdepatureangle" class="control-label ">Departure Angle</label>
                            <input type="text" class="form-control" id="da" name="da" placeholder="" required name="Departure Angle" />
                    </div>
                    <div class="form-group">
                        <label for="inputrampoverangle" class="control-label ">Rampover Angle</label>
                            <input type="text" class="form-control" id="ra" name="ra" placeholder="" required name="Rampover Angle" />
                    </div>
                    <div class="form-group">
                        <label for="inputwaterwadingdepth" class="control-label ">Water Wading Depth</label>
                            <input type="text" class="form-control" id="ww" name="ww" placeholder="" required name="Water Wading Depth" />
                    </div>       
                    <div class="form-group text-center">        
                        <input type="submit" class="btn btn-dark me-2" name="submit" value="submit">
                    </div>
               </form>
            </div> 
        </div>
    </div>

</div>
<?php
include "footer.php";
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
