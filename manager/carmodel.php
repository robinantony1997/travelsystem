
<?php
include "../manager/header.php";
include '../connection.php';

$mname=$cartype=$branchID=$mfyear=$id='';
$img ='Choose image';
if( isset($_GET['id']) ){
    $id = $_GET['id'];
    $result=mysqli_query ($con,"SELECT * FROM carmodel WHERE modelid=$id");
	    $row=mysqli_fetch_array($result);
        $mname =   $row['modelname'];
        $cartype = $row['cartype'];
        $mfyear = $row['mfyear'];
        $img  = $row['img'];
        $branchID  = $_SESSION['manager_id']??0;

}
$branchID  = $_SESSION['manager_id']??0;
if(isset($_POST['submit'])) {
    $modelID = $_POST['modelID'];
    $mname= $_POST['modelName'];
    $cartype = $_POST['carType'];
	$myear=$_POST['manufacturDate'];
    $branchID=$_POST['branchName'];
        
    if($modelID != ''){
        if(isset($_FILES['image']) && !empty($_FILES['image']['name'])){
            $image = $_FILES["image"]['name'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $imgCheck =$_POST['imgCheck'];
            unlink("../images/model/".$imgCheck);
            $moved = move_uploaded_file($file_tmp,"../images/model/".$image);
            mysqli_query($con,"UPDATE carmodel SET modelname='$mname',cartype='$cartype',mfyear='$myear',img='$image' WHERE modelid =$modelID");
            //header("Location:../manager/modelView.php");
            echo '<script>window.location="../manager/modelView.php"</script>';

        }
        else{
            mysqli_query($con,"UPDATE carmodel SET modelname='$mname',cartype='$cartype',mfyear='$myear' WHERE modelid =$modelID");
            //header("Location:../manager/modelView.php");
            echo '<script>window.location="../manager/modelView.php"</script>';

        }
    }
    else{
        $image = $_FILES["image"]['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $moved = move_uploaded_file($file_tmp,"../images/model/".$image);

        $sql ="INSERT INTO carmodel (modelname,cartype,mfyear,img,branchID)VALUE('$mname','$cartype','$myear','$image','$branchID')";

        $result = $con->query($sql);

        if($result){
            echo "new Recoed created";
               
       
            }
           else {
               echo "Error:".$sql ."". $con->error;
            }
       
        //header("Location:../manager/carmodel.php");
        echo '<script>window.location="../manager/carmodel.php"</script>';

    }

   	


}

?>

<div class="container jumbotron p-3 my-3 ">
    <div class="card">
        <div class="card-header">
            <h5 class="title">Model</h5>
        </div>
        <div class="card-body">
            <div class="form-group">
                <form action="carmodel.php" method="POST" name="form1" id="form1" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" id="inputModelID" value="<?=  $id ?>" name="modelID" placeholder="" required />
                    <input type="hidden" class="form-control" id="inputImage" value="<?=  $img ?>" name="imgCheck" placeholder="" required />
                    <div class="form-group" style="display: none;">
                        <label for="inputBranchName" class="control-label " >Branch  </label>
                            <select required class="form-control" id="inputBranchName" name="branchName">
                                <option value="0">Select One</option>
                                    <?php
                                    $result=mysqli_query($con,"SELECT *FROM branch");
                                    while($row=mysqli_fetch_array($result))
                                    {
                                    ?>
                                <option value="<?php echo $row['branchID'];?>" <?php if ($branchID==$row['branchID'] ) echo "selected" ?>>
                                    <?php echo $row['branchName']; ?> 
                                </option>
                                    <?php
                                    }
                                    ?>
                            </select>
                        </div>
                    <div class="form-group">
                        <label for="inputbranchName" class="control-label " >MODEL NAME </label>
                            <input type="text" class="form-control" value="<?= $mname ?>" id="inputbranchName" name="modelName" placeholder="" required />
                        </div>
                    
                        <label for="inputCarType" class="control-label ">Image </label>
                        
                        <div class="custom-file">
                            <input type="file" onchange="return fileValidation()" accept="image/x-png,image/gif,image/jpeg" class="custom-file-input"  name="image" id="inputGroupFile">
                            <label class="custom-file-label"  name="image" for="inputGroupFile"  aria-describedby="inputGroupFileAddon"><?=$img ?></label>
                        </div>
                        <div id="show"></div>
                        
                    <div class="form-group">
                        <label for="inputCarType" class="control-label ">Transmission</label>
                            <input type="text" class="form-control" onkeypress="return isNumericKey(event)" value="<?= $cartype ?>" id="inputCarType" name="carType" placeholder="" required  />
                        </div>
                    <div class="form-group">
                        <label for="inputManufacturDate" class="control-label ">MANUFACTURING YEAR</label>
                            <input type="text" class="form-control numberonly" value="<?= $mfyear ?>" id="inputManufacturDate" name="manufacturDate" placeholder="" required  />
                        </div>
                    <div class="text-center">
                    <input type="submit" name="submit"  class="btn btn-dark me-2" value="submit">
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
$('#inputGroupFile').change(function() {
  //$('#title').val(this.value ? this.value.match(/([\w-_]+)(?=\.)/)[0] : '');
  $('.custom-file-label').html(this.files && this.files.length ? this.files[0].name : '');

})
</script>
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