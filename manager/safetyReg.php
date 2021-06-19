<?php 
include "../manager/header.php";
include '../connection.php';

if(isset($_POST['submit'])) 
{
    $modelName= $_POST['modelName'];
    $varientName = $_POST['variantName'];
    $antilock= $_POST['antilock'];
    $break= $_POST['break'];
    $cls= $_POST['cls'];
    $noa= $_POST['noa'];
    $daynightrearview= $_POST['daynightrearview'];
    $psvm= $_POST['psvm'];
    $xhl= $_POST['xhl'];
    $halogenheadlamp= $_POST['halogenheadlamp'];
    $rsb= $_POST['rsb'];
    $sbw= $_POST['sbw'];
    $daw= $_POST['daw'];
    $sib= $_POST['sib'];
    $adjustableseat= $_POST['adjustableseat'];
    $vcs= $_POST['vcs'];
    $engineim= $_POST['engineim'];
    $crashsensor= $_POST['crashsensor'];
    $ebd= $_POST['ebd'];
    $rearcamera= $_POST['rearcamera'];
    $bsm= $_POST['bsm'];
    $hillassist= $_POST['hillassist'];
    $sql ="INSERT INTO `safety` (`antilock_breakingstm`, `brakeassist`, `centrellockstm`, `airbags`, `daynight_rearviewmirror`, `passengersidemirror`, `xenonheadlamp`, `halogenheadlamp`, `rearseatbelt`, `seatbeltwarning`, `doorajarwarning`, `sideimpactbeams`, `adjustableseat`, `vehiclecntrl`, `engineimmobilizer`, `crashsensor`, `electronicbreakdis`, `rearcamera`, `blindspot`, `hillassist`,`model_id`,`variant_id`) VALUES 
    ('$antilock','$break','$cls','$noa','$daynightrearview','$psvm','$xhl','$halogenheadlamp','$rsb','$sbw','$daw','$sib','$adjustableseat','$vcs','$engineim','$crashsensor','$ebd','$rearcamera','$bsm','$hillassist',$modelName,$varientName)";

    $result = $con->query($sql);

    if($result){
    echo "new Recoed created"; 
    echo '<script>window.location="../manager/safetyReg.php"</script>';
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
            <h5 class="title">Safety</h5>
        </div>
        <div class="card-body">
            <form action="#" method="POST">

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
                                <option value="">Select One</option>
                                    
                            </select>
                        </div>
                    <div class="form-group">
                            <label for="getVariant" class="control-label " > Variant </label>
                                <select  required  required class="form-control" id="getVariant" name="variantName">
                                <option value="">Select One</option>
                                </select>
                        </div>        
                    <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                <label for="inputModalName" class="control-label " > Antilock Breaking System </label>
                                <select  required  class="form-control" id="inputantibreakstm" name="antilock" required>
                                    <option value="" > select </option>
                                    <option value="yes"> Yes </option>
                                    <option value="no"> No </option>
                                </select>  
                                    </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label for="inputModalName" class="control-label " >Break assist </label>
                                <select  required  class="form-control" id="inputbreakassist" name="break">
                                    <option value="" > select </option>
                                    <option value="yes"> Yes </option>
                                    <option value="no"> No </option>
                                
                                </select>      
                                    </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label for="inputModalName" class="control-label " >Centrel Locking System </label>
                                <select  required  class="form-control" id="inputcentrellockingstm" name="cls">
                                    <option value="" > select </option>
                                    <option value="yes"> Yes </option>
                                    <option value="no"> No </option>
                                </select>      
                                    </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label for="inputModalName" class="control-label " >No Of Airbags </label>
                                <select  required  class="form-control" id="inputnoofairbags" name="noa">
                                    <option value="" > select </option>
                                    <option value="yes"> Yes </option>
                                    <option value="no"> No </option>
                                </select>      
                                    </div>
                            </div>
                    </div>
                    <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                <label for="inputModalName" class="control-label " > Day Night Rear view</label>
                                <select  required  class="form-control" id="inputdaynightrearview" name="daynightrearview" required>
                                    <option value="" > select </option>
                                    <option value="yes"> Yes </option>
                                    <option value="no"> No </option>
                                </select>  
                                    </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label for="inputModalName" class="control-label " >Passenger Side View Mirror </label>
                                <select  required  class="form-control" id="inputpassengersideviewmirror" name="psvm">
                                    <option value="" > select </option>
                                    <option value="yes"> Yes </option>
                                    <option value="no"> No </option>
                                </select>      
                                    </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label for="inputModalName" class="control-label " >Xenon head lamp</label>
                                <select  required  class="form-control" id="inputxenonheadlamp" name="xhl">
                                    <option value="" > select </option>
                                    <option value="yes"> Yes </option>
                                    <option value="no"> No </option>
                                </select>      
                                    </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label for="inputModalName" class="control-label " >Halogen head lamp</label>
                                <select  required  class="form-control" id="halogenheadlamp" name="halogenheadlamp">
                                    <option value="" > select </option>
                                    <option value="yes"> Yes </option>
                                    <option value="no"> No </option>
                                </select>      
                                    </div>
                            </div>
                    </div>
                    <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                <label for="inputModalName" class="control-label " > Rear Seat Belt</label>
                                <select  required  class="form-control" id="inputrearseatbelt" name="rsb" required>
                                    <option value="" > select </option>
                                    <option value="yes"> Yes </option>
                                    <option value="no">  No </option>
                                </select>  
                                    </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label for="inputModalName" class="control-label " >Seat Belt Warning </label>
                                <select  required  class="form-control" id="inputseatbeltwarning" name="sbw">
                                    <option value="" > select </option>
                                    <option value="yes"> Yes </option>
                                    <option value="no"> No </option>
                                </select>      
                                    </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label for="inputModalName" class="control-label " >Door Hazard Warning</label>
                                <select  required  class="form-control" id="inputdoorajarwarning" name="daw">
                                    <option value="" > select </option>
                                    <option value="yes"> Yes </option>
                                    <option value="no"> No </option>
                                </select>      
                                    </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label for="inputModalName" class="control-label " >Side Impact Beams</label>
                                <select  required  class="form-control" id="inputsideimpactbeams" name="sib">
                                    <option value="" > select </option>
                                    <option value="yes"> Yes </option>
                                    <option value="no"> No </option>
                                </select>      
                                    </div>
                            </div>
                    </div>
                    <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                <label for="inputModalName" class="control-label " > Adjustable Seat	 </label>
                                <select  required  class="form-control" id="inputadjustableseat" name="adjustableseat" required>
                                    <option value="" > select </option>
                                    <option value="yes"> Yes </option>
                                    <option value="no"> No </option>
                                </select>  
                                    </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label for="inputModalName" class="control-label " >Vehicle Control stability</label>
                                <select  required  class="form-control" id="inputvehiclecntrlstability" name="vcs">
                                    <option value="" > select </option>
                                    <option value="yes"> Yes </option>
                                    <option value="no"> No </option>
                                </select>      
                                    </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label for="inputModalName" class="control-label " >Engine immobilizer</label>
                                <select  required  class="form-control" id="inputengineimmobiizer" name="engineim">
                                    <option value="" > select </option>
                                    <option value="yes"> Yes </option>
                                    <option value="no"> No </option>
                                </select>      
                                    </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label for="inputModalName" class="control-label " >Crash sensor </label>
                                <select  required  class="form-control" id="inputcarsensor" name="crashsensor">
                                    <option value="" > select </option>
                                    <option value="yes"> Yes </option>
                                    <option value="no"> No </option>
                                </select>      
                                    </div>
                            </div>
                    </div>
                    <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                <label for="inputModalName" class="control-label " >Electronic Break Distribution </label>
                                <select  required  class="form-control" id="inputelectricbreakdistribution" name="ebd" required>
                                    <option value="" > select </option>
                                    <option value="yes"> Yes </option>
                                    <option value="no"> No </option>
                                </select>  
                                    </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label for="inputModalName" class="control-label " >Rear camera</label>
                                <select  required  class="form-control" id="inputrearcamera" name="rearcamera">
                                    <option value="" > select </option>
                                    <option value="yes"> Yes </option>
                                    <option value="no"> No </option>
                                </select>      
                                    </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label for="inputModalName" class="control-label " >Blind Spot Monitor</label>
                                <select  required  class="form-control" id="inputbindspotmonitor" name="bsm">
                                    <option value="" > select </option>
                                    <option value="yes"> Yes </option>
                                    <option value="no"> No </option>
                                </select>      
                                    </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label for="inputModalName" class="control-label " >Hill assist</label>
                                <select  required  class="form-control" id="inputhillassist" name="hillassist">
                                    <option value="" > select </option>
                                    <option value="yes"> Yes </option>
                                    <option value="no"> No </option>
                                </select>      
                                    </div>
                            </div>
                    </div>

                    <br>
                    <div class="text-center">
                        <input type="submit" name="submit"  class="btn btn-primary" value="submit">
                    </div>
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
</script>
