<?php
include "../admin/header.php";
include '../connection.php';

if(isset($_POST['submit'])) {
    $tach= $_POST['tach'];
    $ele = $_POST['ele'];
    $ls = $_POST['leather'];
    $dig= $_POST['dig'];
    $digo = $_POST['digo'];
	$digl=$_POST['digl'];
    $ha=$_POST['ha'];
    $vs=$_POST['vs'];
    $modelName= $_POST['modelName'];
    $varientName = $_POST['variantName'];

    $sql ="INSERT INTO interior (tachometer,electronic,leather,digitalclock,digitalodometer,digitallighter,heightadjustable,ventilated,model_id,varient_id)
    VALUE('$tach','$ele','$ls','$dig','$digo','$digl','$ha','$vs','$modelName','$varientName')";

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
            <h5 class="title">Interior</h5>
        </div>
        <div class="card-body">
            <form action="interior.php" method="POST" name="form1" id="form1" >
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
                                <label for="inputtachomtere" class="control-label " >Tachometer</label>
                                <select class="form-control" id="inputtach" name="tach" required>
                                    <option value="" > select </option>
                                    <option value="yes"> Yes </option>
                                    <option value="no"> No </option>
                                </select>  
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputeas" class="control-label " >Electronic Multi-Tripmeter</label>
                                <select class="form-control" id="inputele" required name="ele">
                                    <option value="" > select </option>
                                    <option value="yes"> Yes </option>
                                    <option value="no"> No </option>
                                </select>      
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputflr" class="control-label " >Leather Seats</label>
                                <select class="form-control" id="inputleather" required name="leather">
                                    <option value="" > select </option>
                                    <option value="yes"> Yes </option>
                                    <option value="no"> No </option>
                                </select>      
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputpower" class="control-label " >Digital Clock</label>
                                <select class="form-control" id="inputdig" required name="dig">
                                    <option value="" > select </option>
                                    <option value="yes"> Yes </option>
                                    <option value="no"> No </option>
                                </select>      
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputpower" class="control-label " >Digital Odometer</label>
                                <select class="form-control" id="inputdigo" required name="digo">
                                    <option value="" > select </option>
                                    <option value="yes"> Yes </option>
                                    <option value="no"> No </option>
                                </select>      
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputpower" class="control-label " >Digital Lighter</label>
                                <select class="form-control" id="inputdigl" required name="digl">
                                    <option value="" > select </option>
                                    <option value="yes"> Yes </option>
                                    <option value="no"> No </option>
                                </select>      
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputpower" class="control-label " >Height Adjustable DriverSeat</label>
                                <select class="form-control" id="inputha" required name="ha">
                                    <option value="" > select </option>
                                    <option value="yes"> Yes </option>
                                    <option value="no"> No </option>
                                </select>      
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputpower" class="control-label " >ventilated Seats</label>
                                <select class="form-control" id="inputvs" required name="vs">
                                    <option value="" > select </option>
                                    <option value="yes"> Yes </option>
                                    <option value="no"> No </option>
                                </select>      
                            </div>
                        </div>

                </div>
                <br>
                <br>
                <div class="text-center">
                    <input type="submit" name="submit"  class="btn btn-primary" value="submit">
                </div>
                <br>
                <br>

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
