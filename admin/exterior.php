<?php
include "../admin/header.php";
include '../connection.php';

if(isset($_POST['submit'])) {
    $modelName= $_POST['modelName'];
    $varientName = $_POST['variantName'];
    $eas = $_POST['eas'];
    $flf= $_POST['flf'];
    $eas = $_POST['eas'];
	$flr=$_POST['flr'];
    $power=$_POST['power'];
    $rain=$_POST['rain'];
    $wheel=$_POST['wheel'];
    $sun=$_POST['sun'];

    $sql ="INSERT INTO exterior (foglightfont,electric_adjustableseat,foglightnear,powerantenna,model_id,varient_id,rain,wheel,sun)
    VALUE('$flf','$eas','$flr','$power',$modelName,$varientName,'$rain','$wheel','$sun')";

    $result = $con->query($sql);

    if($result){
    echo "new Recoed created";
    //header("location:exterior.php");
    echo '<script>window.location="../admin/exterior.php"</script>';

    }
    else {
        echo "Error:".$sql ."". $con->error;
    }



}

?>


<div class="container jumbotron p-3 my-3 ">
    <div class="card">
        <div class="card-header">
            <h5 class="title">EXTERIOR</h5>
        </div>
        <div class="card-body">
            <form action="#" method="POST" name="form1" id="form1" >
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
                            <select required class="form-control" id="getVariant" name="variantName" required>
                            <option value="">Select One</option>
                            </select>
                    </div>            
                
                <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                            <label for="inputflf" class="control-label " >FOG LIGHT FRONT </label>
                            <select class="form-control" id="inputflf" name="flf" required>
                                <option value="" > select </option>
                                <option value="yes"> Yes </option>
                                <option value="no"> No </option>
                            </select>  
                                </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                            <label for="inputeas" class="control-label " >ADJUSTABLE HEADLIGHTS</label>
                            <select class="form-control" id="inputeas" required name="eas">
                                <option value="" > select </option>
                                <option value="yes"> Yes </option>
                                <option value="no"> No </option>
                            
                            </select>      
                                </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                            <label for="inputflr" class="control-label " >FOG LIGHT REAR </label>
                            <select class="form-control" id="inputflr" required name="flr">
                                <option value="" > select </option>
                                <option value="yes"> Yes </option>
                                <option value="no"> No </option>
                            
                            </select>      
                                </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                            <label for="inputpower" class="control-label " >POWER ANTENNA</label>
                            <select class="form-control" id="inputpower" required name="power">
                                <option value="" > select </option>
                                <option value="yes"> Yes </option>
                                <option value="no"> No </option>
                            
                            </select>      
                                </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                            <label for="inputrain" class="control-label " >Rain Sensing Wiper</label>
                            <select class="form-control" id="inputrain" required name="rain">
                                <option value="" > select </option>
                                <option value="yes"> Yes </option>
                                <option value="no"> No </option>
                            
                            </select>      
                                </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                            <label for="inputwheel" class="control-label " >Wheel Covers</label>
                            <select class="form-control" id="inputwheel" required name="wheel">
                                <option value="" > select </option>
                                <option value="yes"> Yes </option>
                                <option value="no"> No </option>
                            
                            </select>      
                                </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                            <label for="inputsun" class="control-label " >Sun roof</label>
                            <select class="form-control" id="inputsun" required name="sun">
                                <option value="" > select </option>
                                <option value="yes"> Yes </option>
                                <option value="no"> No </option>
                            
                            </select>      
                                </div>
                        </div>
                        <br>
                </div>
                <div class="text-center">
                    <input type="submit" name="submit"  class="btn btn-primary" value="submit">
                </div>

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
