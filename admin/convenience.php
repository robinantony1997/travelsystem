<?php
include "../admin/header.php";
include '../connection.php';

if(isset($_POST['submit'])) {
    $ps= $_POST['ps'];
    $pwf = $_POST['pwf'];
    $pwr = $_POST['pwr'];
    $ac= $_POST['ac'];
    $heater = $_POST['heater'];
	$as=$_POST['as'];
    $aq=$_POST['aq'];
    $rc=$_POST['rc'];
    $lf= $_POST['lf'];
    $tl = $_POST['tl'];
    $rh = $_POST['rh'];
    $vm= $_POST['vm'];
    $cc = $_POST['cc'];
	$sl=$_POST['sl'];
    $modelName= $_POST['modelName'];
    $varientName = $_POST['variantName'];

    $sql ="INSERT INTO convenience (powerst,pwf,pwr,aircondition,heater,adjustablesteer,airquality,remoteclimate,lowfuel,trunk,remote,vanity,cruise,seatlumber,model_id,varient_id)
    VALUE('$ps','$pwf','$pwr','$ac','$heater','$as','$aq','$rc','$lf','$tl','$rh','$vm','$cc','$sl','$modelName','$varientName')";

    $result = $con->query($sql);

    if($result){
    echo "new Recoed created";
    //header("location:exterior.php");

    }
    else {
        echo "Error:".$sql ."". $con->error;
    }



}

?>

<div class="container jumbotron p-3 my-3 ">
    <div class="card">
        <div class="card-header">
            <h5 class="title">Convenience</h5>
        </div>
        <div class="card-body">

            <form action="convenience.php" method="POST" name="form1" id="form1" >
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
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputps" class="control-label " >Power Steering</label>
                                <select class="form-control" id="ps" name="ps" required>
                                    <option value="" > select </option>
                                    <option value="yes"> Yes </option>
                                    <option value="no"> No </option>
                                </select>  
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputpwf" class="control-label " >Power Windows-Front</label>
                                <select class="form-control" id="inputpwf" required name="pwf">
                                    <option value="" > select </option>
                                    <option value="yes"> Yes </option>
                                    <option value="no"> No </option>
                                </select>      
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputflr" class="control-label " >Power Windows-Rear</label>
                                <select class="form-control" id="inputpwr" required name="pwr">
                                    <option value="" > select </option>
                                    <option value="yes"> Yes </option>
                                    <option value="no"> No </option>
                                </select>      
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputac" class="control-label " >Air Conditions</label>
                                <select class="form-control" id="inputac" required name="ac">
                                    <option value="" > select </option>
                                    <option value="yes"> Yes </option>
                                    <option value="no"> No </option>         
                                </select>      
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputheater" class="control-label " >Heater</label>
                                <select class="form-control" id="heater" required name="heater">
                                    <option value="" > select </option>
                                    <option value="yes"> Yes </option>
                                    <option value="no"> No </option>
                                </select>      
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputas" class="control-label " >Adjustable Steering</label>
                                <select class="form-control" id="as" required name="as">
                                    <option value="" > select </option>
                                    <option value="yes"> Yes </option>
                                    <option value="no"> No </option>      
                                </select>      
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputaq" class="control-label " >Air Quality Control</label>
                                <select class="form-control" id="aq" required name="aq">
                                    <option value="" > select </option>
                                    <option value="yes"> Yes </option>
                                    <option value="no"> No </option>
                                </select>      
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputrc" class="control-label " >Remote Climate Control</label>
                                <select class="form-control" id="inputrc" required name="rc">
                                    <option value="" > select </option>
                                    <option value="yes"> Yes </option>
                                    <option value="no"> No </option>
                                </select>      
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputlf" class="control-label " >Low Fuel WarningLight</label>
                                <select class="form-control" id="inputlf" required name="lf">
                                    <option value="" > select </option>
                                    <option value="yes"> Yes </option>
                                    <option value="no"> No </option>       
                                </select>      
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputtl" class="control-label " >Trunk Light</label>
                                <select class="form-control" id="inputtl" required name="tl">
                                    <option value="" > select </option>
                                    <option value="yes"> Yes </option>
                                    <option value="no"> No </option>  
                                </select>      
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputrh" class="control-label " >  Remote Horn $ Light Control</label>
                                <select class="form-control" id="inputrh" required name="rh">
                                    <option value="" > select </option>
                                    <option value="yes"> Yes </option>
                                    <option value="no"> No </option>
                                </select>      
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputvm" class="control-label " >Vanity Mirror</label>
                                <select class="form-control" id="inputvm" required name="vm">
                                    <option value="" > select </option>
                                    <option value="yes"> Yes </option>
                                    <option value="no"> No </option>
                                </select>      
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputcc" class="control-label " >Cruise Control</label>
                                <select class="form-control" id="inputcc" required name="cc">
                                    <option value="" > select </option>
                                    <option value="yes"> Yes </option>
                                    <option value="no"> No </option>
                                </select>      
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputsl" class="control-label " >Seat Lumber Support</label>
                                <select class="form-control" id="inputsl" required name="sl">
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
