<?php
include "header.php";
?>
<?php
include '../connection.php';

if(isset($_POST['submit'])) {
    $fs= $_POST['fs'];
    $rs = $_POST['rs'];
	$bs=$_POST['bs'];
    $fb=$_POST['fb'];
    $rb= $_POST['rb'];
    $tyres= $_POST['tyres'];
    $st= $_POST['st'];
    $sg= $_POST['sg'];
    $aa= $_POST['aa'];
	$modelName= $_POST['modelName'];
    $varientName = $_POST['variantName'];
    

    $sql ="INSERT INTO suspension (front,rear,brake,frontb,rearb,tyres,steert,steerg,acceleration,model_id,varient_id)
    VALUE('$fs','$rs','$bs','$fb','$rb','$tyres','$st','$sg','$aa','$modelName','$varientName')";

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
            <h5 class="title">Suspension</h5>
        </div>
        <div class="card-body">

            <div class="form-group">
                <form action="suspension.php" method="POST" name="form1" id="form1" >
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
                        <label for="inputFrontSuspension" class="control-label ">Front Suspension</label>
                            <input type="text" class="form-control" id="fs" name="fs" placeholder="" required name="Front Suspension" />
                    </div>
                    <div class="form-group">
                        <label for="inputRearSuspension" class="control-label " >Rear Suspension</label>
                        <input type="text" class="form-control" id="rs" name="rs" placeholder="" required name="Rear Suspension" />
                    </div>
                    <div class="form-group">
                        <label for="inputBrakeSpecification" class="control-label ">Brake Specification</label>
                            <input type="text" class="form-control" id="bs" name="bs" placeholder="" required name="Brake Specification" />
                    </div>
                    <div class="form-group">
                        <label for="inputFrontBrakeType" class="control-label ">Front Brake Type</label>
                            <input type="text" class="form-control" id="fb" name="fb" placeholder="" required name="Front Brake Type" />
                    </div>
                    <div class="form-group">
                        <label for="inputRearBrakeType" class="control-label ">Rear Brake Type</label>
                            <input type="text" class="form-control" id="rb" name="rb" placeholder="" required name="Rear Brake Type" />
                    </div>
                    <div class="form-group">
                        <label for="inputTyres" class="control-label " >Tyres</label>
                            <input type="text" class="form-control" id="tyres" name="tyres" placeholder="" required name="Tyres" />
                    </div>
                    <div class="form-group">
                        <label for="inputSteeringType" class="control-label ">Steering Type</label>
                            <input type="text" class="form-control" id="st" name="st" placeholder="" required name="Steering Type" />
                    </div>
                    <div class="form-group">
                        <label for="inputSteeringGearType" class="control-label ">Steering Gear Type</label>
                            <input type="text" class="form-control" id="sg" name="sg" placeholder="" required name="Steering  GearType" />
                    </div>
                    <div class="form-group">
                        <label for="inputAcceleration" class="control-label ">Acceleration</label>
                            <input type="text" class="form-control" id="aa" name="aa" placeholder="" required name="Acceleration" />
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
