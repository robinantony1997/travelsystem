<?php

include '../connection.php';
include "../manager/header.php";
$carID=$id=$mName=$variant=$variantName='';
$img='Choose Image';
$bid  = $_SESSION['manager_id']??0;
if( isset($_GET['id']) ){
    $id = $_GET['id'];
    $result=mysqli_query ($con,"SELECT * FROM car_pics p,carmodel c, variant v,branch b WHERE p.variant_id=v.variant_id AND b.branchID=c.branchID AND v.model_id=c.modelid AND car_id=$id");
	    $row=mysqli_fetch_array($result);
        $mName =   $row['modelid'];
        $bid  = $_SESSION['manager_id']??$row['branchID'];
        $variant = $row['variant_id'];
        $variantName= $row['variant_name'];
        $img  = $row['pics'];
}

if(isset($_POST['submit'])) { 
    $carID = $_POST['carID'];
    $mName = $_POST['modelName'];
    $variant= $_POST['variantName'];
    if($carID != ''){ 
        if(isset($_FILES['image']) && !empty($_FILES['image']['name'])){
            $image = $_FILES["image"]['name'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $ext = pathinfo($image, PATHINFO_EXTENSION);
            $img = time().".".$ext;
            $imgCheck =$_POST['imgCheck'];
            unlink("../images/variant/".$imgCheck);
            $moved = move_uploaded_file($file_tmp,"../images/variant/".$img);
            mysqli_query($con,"UPDATE car_pics SET pics='$img',model_id='$mName',variant_id='$variant' WHERE car_id =$carID");
            //header("Location:../manager/carPicsView.php");
            echo '<script>window.location="../manager/carPicsView.php"</script>';
        }
        else{ 
            mysqli_query($con,"UPDATE car_pics SET model_id='$mName',variant_id='$variant' WHERE car_id =$carID");
            //header("Location:../manager/carPicsView.php");
            echo '<script>window.location="../manager/carPicsView.php"</script>';
        }
    }
    else{ 
        $image = $_FILES["image"]['name'];
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        $img = time().".".$ext;
        $file_tmp = $_FILES['image']['tmp_name'];
        $moved = move_uploaded_file($file_tmp,"../images/variant/".$img);
        mysqli_query($con,"INSERT INTO car_pics (pics,variant_id,model_id)VALUE('$img','$variant','$mName')");
       //header("location:../manager/carPics.php");
       echo '<script>window.location="../manager/carPics.php"</script>';
    }

}
?>
<div class="container  jumbotron p-3 my-3 "> 
    <div class="card">
        <div class="card-header">
            <h5 class="title">Pictures</h5>
        </div>
            <div class="card-body">
                <div class="form-group">
                    <form action="carPics.php" method="POST" name="pic" id="getPic" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="inputModelID" value="<?=  $id ?>" name="carID" placeholder="" required />
                        <input type="hidden" class="form-control" id="inputImage" value="<?=  $img ?>" name="imgCheck" placeholder="" required />
                        <input type="hidden" class="form-control" id="inputVariant" value="<?=  $variant ?>" name="variantCheck" placeholder="" required />
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
                                <option value="<?php echo $row['modelid'];?>" <?php if ($mName==$row['modelid'] ) echo "selected" ?>>
                                    <?php echo $row['modelname']; ?> 
                                </option>
                                    <?php
                                    }
                                    ?>
                            </select>
                        </div>
                        <div class="form-group">
                                <label for="getVariant" class="control-label " > Variant </label>
                                    <select required class="form-control" id="getVariant" name="variantName">
                                    <option value="0">Select One</option>
                                    <?php
                                            $result=mysqli_query($con,"SELECT *FROM variant v,carmodel c WHERE v.model_id=c.modelid AND v.model_id = $mName ");
                                            while($row=mysqli_fetch_array($result))
                                            {
                                            ?>
                                        <option value="<?php echo $row['variant_id'];?>" <?php if ($variant==$row['variant_id'] ) echo "selected" ?>>
                                            <?php echo $row['variant_name']; ?> 
                                        </option>
                                            <?php
                                            }
                                            ?>
                                    </select>
                            </div>            
                        <div class="form-group">
                                <label for="inputCarType" class="control-label ">Image </label>            
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" onchange="return fileValidation()" accept="image/x-png,image/gif,image/jpeg" name="image" id="inputGroupFile">
                                            <label class="custom-file-label"  name="image" for="inputGroupFile"  aria-describedby="inputGroupFileAddon"><?=$img ?></label>
                                    </div>
                                    <div id="show"></div>
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