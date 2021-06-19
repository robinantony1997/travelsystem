<?php
include "../manager/header.php";
?>
<?php
include '../connection.php';

if(isset($_POST['submit'])) {
    $length= $_POST['length'];
    $width = $_POST['width'];
	$height=$_POST['height'];
    $wb=$_POST['wb'];
    $front= $_POST['ft'];
    $rear= $_POST['rt'];
    $seat= $_POST['sc'];
	$modelName= $_POST['modelName'];
    $varientName = $_POST['variantName'];
    $weight = $_POST['weight'];

    $sql ="INSERT INTO dimensions (length,width,height,wheelbase,fronttrack,reartrack,seatingcapacity,model_id,varient_id,weight)
    VALUE('$length','$width','$height','$wb','$front','$rear','$seat','$modelName','$varientName','$weight')";

    $result = $con->query($sql);

    if($result){
    echo "new Recoed created"; 
    
    }
    else {
        echo "Error:".$sql ."". $con->error;
    }



}
$bid  = $_SESSION['manager_id']??0;
?>

<div class="container jumbotron p-3 my-3 ">
    <div class="card">
        <div class="card-header">
            <h5 class="title">Dimensions</h5>
        </div>
        <div class="card-body">
            <div class="form-group">
                <form action="dimensions.php" method="POST" name="form1" id="form1" >
                    <div class="form-group" style="display: none;" >
                        <label for="inputBranchlName" class="control-label " >Branch  </label>
                            <select required class="form-control" id="getBranch" name="branchName">
                                <option value="0">Select One</option>
                                    <?php
                                    $result=mysqli_query($con,"SELECT *FROM branch");
                                    while($row=mysqli_fetch_array($result))
                                    {
                                    ?>
                                <option value="<?php echo $row['branchID'];?>" <?php if ($bid==$row['branchID'] ) echo "selected" ?>>
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
                        <label for="inputlength" class="control-label ">Length</label>
                            <input type="text" class="form-control" id="length" name="length" placeholder="" required name="Length" />
                    </div>

                    <div class="form-group">
                        <label for="inputwidth" class="control-label " >Width</label>
                            <input type="text" class="form-control" id="width" name="width" placeholder="" required name="Width" />
                    </div>

                    <div class="form-group">
                        <label for="inputheight" class="control-label ">Height</label>
                            <input type="text" class="form-control" id="height" name="height" placeholder="" required name="Height" />
                    </div>

                    <div class="form-group">
                        <label for="inputwheelbase" class="control-label ">Wheel Base</label>
                            <input type="text" class="form-control" id="wb" name="wb" placeholder="" required name="Wheel_Base" />
                    </div>

                    <div class="form-group">
                        <label for="inputfronttracker" class="control-label ">Front Tracker</label>
                            <input type="text" class="form-control" id="ft" name="ft" placeholder="" required name="Front_Tracker" />
                    </div>

                    <div class="form-group">    
                        <label for="inputreartracker" class="control-label " >Rear Tracker</label>
                            <input type="text" class="form-control" id="rt" name="rt" placeholder="" required name="Rear_Tracker" />
                    </div>

                    <div class="form-group">
                        <label for="inputseatingcapacity" class="control-label ">Seating Capacity</label>
                            <input type="text" class="form-control" id="sc" name="sc" placeholder="" required name="Seating_Capacity" />
                    </div>
                    <div class="form-group">
                        <label for="inputweight" class="control-label ">Weight</label>
                            <input type="text" class="form-control" id="weight" name="weight" placeholder="" required name="weight" />
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
</script>
