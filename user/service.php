<?php
include "../user/header.php";
include '../connection.php';
$user = $_SESSION['user_id'];

if(isset($_POST['submit'])) {
    $user = $_SESSION['user_id'];
    $branchID= $_POST['branchName'];
    $modelName= $_POST['modelName'];
    $variantID= $_POST['variantName'];
    
    $name = $_POST['name'];
    $email = $_POST['email'];

    $contactNumber=$_POST['contactNumber'];
    $msg=$_POST['msg'];
    $carNumber =$_POST['carNumber'];
    $dob =$_POST['dob'];

    $sql ="INSERT INTO service (name,email,contactNumber,msg,carNumber,dob,branchID,modelName,varient_id,user_id)
    VALUE('$name','$email',$contactNumber,'$msg','$carNumber','$dob',$branchID,$modelName,$variantID,$user)";

    

    $result = $con->query($sql);

    if($result){
    echo '<script>window.location="../user/index.php"</script>';
    
    }
    else {
        echo "Error:".$sql ."". $con->error;
    }


}

?>

 <section class="section" id="trainers">
    <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Feed <em>Back</em></h2>
                        <img src="../user/assets/images/line-dec.png" alt="">
                    </div>
                </div>
            </div>
            <div class="container  jumbotron p-3 my-3 "> 
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <form action="service.php" method="POST" name="compaint" >
                                <div class="form-group">
                                    <label for="inputBranchlName" class="control-label " >Branch  </label>
                                        <select required class="form-control" id="getBranch" name="branchName">
                                            <option value="0">Select One</option>
                                                <?php
                                                $result=mysqli_query($con,"SELECT *FROM branch");
                                                while($row=mysqli_fetch_array($result))
                                                {

                                                ?>
                                            <option value="<?php echo $row['branchID'];?>" >
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
                                    <label for="inputNumber" class="control-label " > Car Number </label>
                                        <input type="text" class="form-control" id="inputCarNumber" name="carNumber" required />
                                </div>
                                <div class="form-group">
                                    <label class="control-label" >DOB</label>
                                      <div class="input-group-icon">
                                        <input type="text" autocomplete="no" name="dob"  id ="datepicker" class="form-control" class="name" placeholder="Date of birth" required> <br>           
                                          <p id="p4" style="font-weight: bold;font-size:13px; color: red;"></p>
                                      </div>
                                </div>  
                                <div class="form-group">
                                    <label for="inputVariantName" class="control-label " > Name </label>
                                        <input type="text" class="form-control" id="inputName" name="name" required />
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label " > Email </label>
                                        <input type="text" class="form-control" id="inputEmail" name="email" required />
                                </div>
                                 <div class="form-group">
                                    <label for="inputVariantName" class="control-label " > Contact Number </label>
                                     <input type="text" class="form-control" id="inputContactNumber" name="contactNumber" required />
                                </div>
                             
                                <div class="form-outline">
                                    <label class="form-label" for="textAreaExample3">Message</label>
                                        <textarea class="form-control" name="msg" id="textAreaExample3" rows="2"></textarea>
                                </div>          
                                <br>
                                <div class="text-center">
                                    <input type="submit" name="submit"  class="btn btn-dark me-2" value="submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>      
    </div>
</section>
                      

<?php
include "../user/footer.php";

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
<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>