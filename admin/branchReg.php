
<?php
include "../admin/header.php";
include '../connection.php';

$branchName=$managerName=$phno=$email=$pass=$id='';
if( isset($_GET['id']) ){
    $id = $_GET['id'];
    $result=mysqli_query ($con,"SELECT * FROM branch WHERE branchID=$id");
	    $row=mysqli_fetch_array($result);
        $branchName =   $row['branchName'];
        $managerName = $row['managerName'];
        $email = $row['email'];
        $phno = $row['phno'];
        $pass  = $row['passwordz'];
}
if(isset($_POST['submit'])) {
    $branchID = $_POST['branchID'];
    $branchName= $_POST['branchName'];
    $managerName = $_POST['managerName'];
	$pass=md5($_POST['pass']);
    $email=$_POST['email'];
	$phno=$_POST['phno'];
    


    if($branchID != ''){
        echo $branchID;
        mysqli_query($con,"UPDATE branch SET branchName='$branchName',managerName='$managerName',passwordz='$pass',email='$email',phno='$phno' WHERE branchID =$branchID");
        echo '<script>window.location="../admin/branchView.php"</script>';
    }
    else{

        $sql ="INSERT INTO branch (branchName,managerName,phno,email,passwordz)VALUE('$branchName','$managerName','$phno','$email','$pass')";

        $result = $con->query($sql);

        if($result){
            echo "new Recoed created";              
            echo '<script>window.location="../admin/branchReg.php"</script>';
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
            <h5 class="title">Branches</h5>
        </div>
        <div class="card-body">
            <div class="form-group">
                <form action="branchReg.php" method="POST" name="form1" id="form1">
                    <input type="hidden" class="form-control" id="inputModelID" value="<?=  $id ?>" name="branchID" placeholder="" required />

                    <div class="form-group">
                        <label for="inputBranchName" class="control-label " >Branch Name </label>
                            <input type="text" class="form-control" onkeypress="return isNumericKey(event)" value="<?= $branchName ?>" id="inputBranchName" name="branchName" placeholder="" required />
                        </div>                     
                    <div class="form-group">
                        <label for="inputmanagerName" class="control-label ">Manager Name</label>
                            <input type="text" class="form-control" value="<?= $managerName ?>" onkeypress="return isNumericKey(event)" id="inputmanagerName" name="managerName" placeholder="" required  />
                        </div>
                    <div class="form-group">
                        <label for="inputEmail" class="control-label " >Email </label>
                            <input type="email" class="form-control" value="<?= $email ?>" id="inputEmail" name="email" placeholder="" required />
                        </div>
                        <div id="showEmail"> </div>
                    <div class="form-group">
                        <label for="inputPassword" class="control-label " >Password </label>
                            <input type="password" class="form-control" value="<?= $pass ?>" id="inputPassword" name="pass" placeholder="" required />
                        </div>  
                    <div class="form-group">
                        <label for="inputPhno" class="control-label ">Phone Number</label>
                            <input type="text" minlength="10" maxlength="10" class="form-control numberonly" value="<?= $phno ?>" id="inputPhno" name="phno" placeholder="" required  />
                            <div id="showPhno"></div>
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
include "../admin/footer.php";
?>

<script>
$('#inputEmail,#inputPhno').change(function(e) {
    e.preventDefault(); 
        const email = $("#inputEmail").val();
        const phno = $("#inputPhno").val();
        $.ajax({
          type: "POST",
          url: "mangerEmailCheck.php",
          data: { email: email,phno:phno,id:'<?=$id?>'},
          dataType: "json",
          success: function (data) {
          
            data.email == 1 ? $("#showEmail").html('Email ID already Exist') : $("#showEmail").html('');
            data.phno == 1 ? $("#showPhno").html('Phone Number already Exist') :  $("#showPhno").html('');
          },
          error: function (er) {
            console.log(er);
          },
        });
      });
</script>
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
