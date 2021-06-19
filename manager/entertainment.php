
<?php 
include "../manager/header.php";
include '../connection.php';

if(isset($_POST['submit'])) {
    $modelName= $_POST['modelName'];
    $varientName = $_POST['variantName'];
    $dvd= $_POST['dvd'];
    $radio = $_POST['radio'];
    $speaker= $_POST['speaker'];
	$usb= $_POST['usb'];
	$blutooth= $_POST['blutooth'];
	$touch= $_POST['touch'];
    

    $sql ="INSERT INTO entertainment (dvd_player,radio_player,speaker,usb_auxilaryin,blutooth,touchscreen,model_id,varient_id)
    VALUE('$dvd','$radio','$speaker','$usb','$blutooth','$touch',$modelName,$varientName)";

    $result = $con->query($sql);

    if($result){
    echo "new Recoed created"; 
    echo '<script>window.location="../manager/entertainment.php"</script>';
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
            <h5 class="title">Entertainment</h5>
        </div>
        <div class="card-body">
            <form action="#" method="POST" name="form1" id="form1" >
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
                            <select  required required class="form-control" id="getVariant" name="variantName">
                            <option value="0">Select One</option>
                            </select>
                    </div>            
                
                
                <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="inputdvdplayer" class="control-label " >DVD Player </label>
                            <select  required class="form-control" id="inputdvdplayer" name="dvd" required>
                                <option value="" > select </option>
                                <option value="yes"> Yes </option>
                                <option value="no"> No </option>
                            </select>  
                                </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="inputradioplayer" class="control-label " >Radio Player </label>
                            <select  required class="form-control" id="inputradioplayer" name="radio">
                                <option value="" > select </option>
                                <option value="yes"> Yes </option>
                                <option value="no"> No </option>
                            
                            </select>      
                                </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="inputradiospeaker" class="control-label " >Speaker </label>
                            <select  required class="form-control" id="inputspeaker" name="speaker">
                                <option value="" > select </option>
                                <option value="yes"> Yes </option>
                                <option value="no"> No </option>
                            
                            </select>      
                                </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="inputradiousb" class="control-label " >Usb And Auxilary Input</label>
                            <select  required class="form-control" id="inputusb" name="usb">
                                <option value="" > select </option>
                                <option value="yes"> Yes </option>
                                <option value="no"> No </option>
                            
                            </select>      
                                </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="inputblutooth" class="control-label " >Blutooth Connectivity</label>
                            <select  required class="form-control" id="inputblutooth" name="blutooth">
                                <option value="" > select </option>
                                <option value="yes"> Yes </option>
                                <option value="no"> No </option>
                            
                            </select>      
                                </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="inputtouch" class="control-label " >Touch Screen</label>
                            <select  required class="form-control" id="inputtouch" name="touch">
                                <option value="" > select </option>
                                <option value="yes"> Yes </option>
                                <option value="no"> No </option>
                            
                            </select>      
                                </div>
                        </div>
                        <br>
                    </div>
                    <div class="form-group text-center">
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
