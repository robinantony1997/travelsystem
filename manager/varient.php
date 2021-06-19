<?php
include "../manager/header.php";
include '../connection.php';

$modalName =$id=$branchName=$color=$variantName=$price=$engineNumber=$etype=$dis=$mp=$mt=$noc=$gtype=$gbox=$dtype='';
$bid  = $_SESSION['manager_id']??0;
$img='Choose Image';
if( isset($_GET['id']) ){
    $id = $_GET['id'];
    $result=mysqli_query ($con,"SELECT * FROM variant v, carmodel c, branch b WHERE b.branchID=c.branchID AND c.modelid=v.model_id AND variant_id=$id");
	    $row=mysqli_fetch_array($result);
        $bid  = $_SESSION['manager_id']??$row['branchID'];
        $branchName = $row['branchName'];
        $modalName =   $row['model_id'];
        $variantName = $row['variant_name'];
        $price = $row['price'];
        $engineNumber  = $row['engine_number'];
        $etype =   $row['engtype'];
        $dis =  $row['displacement'];
        $mp =  $row['max_power'];
        $mt =   $row['max_torque'];
        $noc = $row['no_cylinder'];
        $gtype = $row['geartype'];
        $gbox = $row['gearbox'];
        $dtype =   $row['drivetype'];
        $img  = $row['pic'];
        $color = $row['color'];

    
}

if(isset($_POST['submit'])) {
    $vID = $_POST['variantID'];
    $modalID = $_POST['modelName'];
    $variantName = $_POST['variantName'];
    $price = $_POST['price'];
    $engineNumber= rand(1111,9999);

    $etype= $_POST['engineType'];
    $dis = $_POST['displacement'];
	$mp=$_POST['maxPower'];
    $mt=$_POST['maxTorque'];
    $noc= $_POST['noOfCylinder'];
    $gtype= $_POST['gearType'];
    $gbox= $_POST['gearBox'];
	$dtype=$_POST['driveType'];
    $color = $_POST['color'];
    
if($vID !=""){
    if(isset($_FILES['image']) && !empty($_FILES['image']['name'])){
        $image = $_FILES["image"]['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        $img = time().".".$ext;
        $imgCheck =$_POST['imgCheck'];
        unlink("../images/pics/".$imgCheck);
        $moved = move_uploaded_file($file_tmp,"../images/pics/".$img);

        mysqli_query($con,"UPDATE variant SET variant_name='$variantName',price='$price',engine_number=$engineNumber,engtype='$etype',displacement='$dis',max_power='$mp',max_torque='$mt',no_cylinder='$noc',geartype='$gtype',gearbox='$gbox',drivetype='$dtype',model_id='$modalID',pic='$img',color='$color' WHERE variant_id=$vID");
        echo '<script>window.location="../manager/variantView.php"</script>';
    }
    else{
        mysqli_query($con,"UPDATE variant SET variant_name='$variantName',price='$price',engine_number=$engineNumber,engtype='$etype',displacement='$dis',max_power='$mp',max_torque='$mt',no_cylinder='$noc',geartype='$gtype',gearbox='$gbox',drivetype='$dtype',model_id='$modalID',color='$color' WHERE variant_id=$vID");

        //header("location:variantView.php");
        echo '<script>window.location="../manager/variantView.php"</script>';
    }
}
else{
    $image = $_FILES["image"]['name'];
    $ext = pathinfo($image, PATHINFO_EXTENSION);
    $img = time().".".$ext;
    $file_tmp = $_FILES['image']['tmp_name'];
    $moved = move_uploaded_file($file_tmp,"../images/pics/".$img);
    echo $moved;
        $sql ="INSERT INTO variant (variant_name,price,engine_number,engtype,displacement,max_power,max_torque,no_cylinder,geartype,gearbox,drivetype,model_id,pic,color)
        VALUE('$variantName','$price',$engineNumber,'$etype','$dis','$mp','$mt',$noc,'$gtype','$gbox','$dtype',$modalID,'$img','$color')";

    $result = $con->query($sql);

    if($result){
    echo "new Recoed created";
    echo '<script>window.location="../manager/varient.php"</script>';
    }
    else {
        echo "Error:".$sql ."". $con->error;
    }
}


}

?>
<div class="container jumbotron p-3 my-3 ">
    <div class="card">
        <div class="card-header">
            <h5 class="title">Variant</h5>
        </div>
        <div class="card-body">
            <div class="form-group">
                <form action="#" method="POST" name="form1" id="form1" enctype="multipart/form-data" >
                    <input type="hidden" class="form-control" id="inputVariantID" value="<?=  $id ?>" name="variantID" placeholder="" required />
                    <input type="hidden" class="form-control" id="inputImage" value="<?=  $img ?>" name="imgCheck" placeholder="" required />
                    <div class="form-group" style="display: none;">
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
                        <label for="inputModalName" class="control-label " >Modal Name </label>
                            <select required class="form-control" id="getModel" name="modelName">
                                <option value="0">Select One</option>
                                    <?php
                                        $result=mysqli_query ($con,"SELECT *FROM carmodel c, branch b where c.branchID = b.branchID AND c.branchID=$bid");
                                    while($row=mysqli_fetch_array($result))
                                    {
                                    ?>
                                <option value="<?php echo $row['modelid'];?>" <?php if ($modalName==$row['modelid'] ) echo "selected" ?>>
                                    <?php echo $row['modelname']; ?> 
                                </option>
                                    <?php
                                    }
                                    ?>
                            </select>
                        </div>
                    <div class="form-group">
                        <label for="inputVariantName" class="control-label " >Variant Name </label>
                            <input type="text" class="form-control" id="inputVariantName" value="<?=  $variantName ?>" name="variantName" placeholder="" required />
                    </div>
                    <div class="form-group">
                        <label for="inputColor" class="control-label " >Colour </label>
                            <input type="text" class="form-control" id="inputColor" value="<?=  $color ?>" name="color" placeholder="" required />
                    </div>
                    <div class="form-group">
                        <label for="inputCarType" class="control-label ">Image </label>            
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" onchange="return fileValidation()" accept="image/x-png,image/gif,image/jpeg" name="image" id="inputGroupFile">
                                    <label class="custom-file-label"  name="image" for="inputGroupFile"  aria-describedby="inputGroupFileAddon"><?=$img ?></label>
                            </div>
                            <div id="show"></div>
                    </div>                
                    <div class="form-group">
                        <label for="inputPrice" class="control-label " > Price </label>
                            <input type="text" class="form-control" id="inputPrice" value="<?= $price ?>" name="price" placeholder="" required  />
                        </div>
                       
                    
                    <div class="form-group">
                        <label for="inputEngineType" class="control-label " >Engine Type </label>
                            <input type="text" class="form-control" onkeypress="return isNumericKey(event)" id="inputEngineType" value="<?= $engineNumber ?>" name="engineType" placeholder="" required />
                        </div>
                    <div class="form-group">
                        <label for="inputDisplacement" class="control-label " > Displacement </label>
                            <input type="text" class="form-control" id="inputDisplacement" value="<?= $etype ?>" name="displacement" placeholder="" required  />
                        </div>
                    <div class="form-group">
                        <label for="inputmaxPower" class="control-label ">Max Power</label>
                            <input type="text" class="form-control" id="inputmaxPower" value="<?= $mp ?>" name="maxPower" placeholder="" required  />
                        </div>
                        <div class="form-group">
                        <label for="inputMaxTorque" class="control-label " > Max Torque </label>
                            <input type="text" class="form-control" id="inputMaxTorque" value="<?= $mt ?>" name="maxTorque" placeholder="" required  />
                        </div>
                    <div class="form-group">
                        <label for="inputNoOfCylinder" class="control-label " >No of Cylinder</label>
                            <input type="text" class="form-control numberonly" id="inputNoOfCylinder" value="<?= $noc ?>" name="noOfCylinder" placeholder="" required  />
                        </div>
                    <div class="form-group">
                        <label for="inputGearType" class="control-label "  >Gear Type </label>
                            <input type="text" class="form-control" id="inputGearType" value="<?= $gtype ?>" name="gearType" placeholder="" required />
                        </div>
                    <div class="form-group">
                        <label for="inputGearBox" class="control-label " > Gear Box </label>
                            <input type="text" class="form-control" id="inputGearBox" value="<?= $gbox ?>" name="gearBox" placeholder="" required  />
                        </div>
                    <div class="form-group">
                        <label for="inputDriveType" class="control-label " >Drive Type</label>
                            <input type="text" class="form-control" id="inputDriveType" value="<?= $dtype ?>" name="driveType" placeholder="" required  />
                        </div>
                    <br>
                    <div class="form-group text-center">
                    <input type="submit" name="submit"  class="btn btn-primary" value="submit">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include "../manager/footer.php";
?>

<script>
  $(".numberonly").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        
        
        //$("#number-error").html("Digits Only").show().fadeOut("slow");
        return false;
    }
   });

   function isNumberKey(evt)
			{
				var charCode = (evt.which) ? evt.which : evt.keyCode;
				if (charCode != 46 && charCode > 31 
				&& (charCode < 48 || charCode > 57))
				return false;
				return true;
			}  
			
			
			function isNumericKey(evt)
			{
				var charCode = (evt.which) ? evt.which : evt.keyCode;
				if (charCode != 46 && charCode > 31 
				&& (charCode < 48 || charCode > 57))
				return true;
				return false;
			} 
</script>

<script>
$('#inputGroupFile').change(function() {
  //$('#title').val(this.value ? this.value.match(/([\w-_]+)(?=\.)/)[0] : '');
  $('.custom-file-label').html(this.files && this.files.length ? this.files[0].name : '');

})
</script>

<script>
        function fileValidation() {
            var fileInput = 
                document.getElementById('inputGroupFile');
              
            var filePath = fileInput.value;
          
            // Allowing file type
            var allowedExtensions = 
                    /(\.jpg|\.jpeg|\.png|\.gif)$/i;
              
            if (!allowedExtensions.exec(filePath)) {
                $("#show").html('Invalid file type');
                fileInput.value = '';
                return false;
            } else{
                $("#show").html('');
            }
        }
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