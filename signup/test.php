<?php 
include "../user/header.php";
?>
<br>
<br>
<br>
<br>

<div class="container jumbotron p-3 my-3">
        <form action="userRegistration.php" method="POST" data-toggle="validator" role="form" id="myForm" autocomplete="off">

            <div class="row">
                  <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputFirstName" class="control-label ">First Name</label>
                            <input
                              type="text"
                              class="form-control"
                              onkeypress="return isNumericKey(event)"
                              id="inputFirstName"
                              placeholder=""
                              required
                              pattern="[a-zA-Z0-9]+"
                              name="first_name"
                            />
                        </div>
                  </div>
                  <div class="col-md-6">
                        <div class="form-group">
                                <label for="inputLastName" class="control-label">Last Name</label>
                                <input
                                  type="text"
                                  onkeypress="return isNumericKey(event)"
                                  class="form-control"
                                  id="inputLastName"
                                  placeholder=""
                                  required
                                  name="last_name"
                                />
                        </div>
                  </div>
            </div>
            
            <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                            <label class="control-label" >DOB</label>
                              <div class="input-group-icon">
                                <input type="date" name="dob"  id ="inputDOB" class="form-control" class="name" placeholder="Date of birth" onblur="return checkDOB()" required> <br>           
                                  <p id="p4" style="font-weight: bold;font-size:13px; color: red;"></p>
                              </div>
                      </div>
                  </div>

                  <div class="col-md-6">
                      <div class="form-group">
                              <label for="inpuAadharNumber" class="control-label">Aadhar Number</label>
                              <input
                                type="text"
                                minlength=12
                                maxlength=12
                                class="form-control numberonly"
                                id="inpuAadharNumber"
                                placeholder=""
                                required
                                name="aadhar_number"
                              />
                      </div>
                  </div>
            </div>

            <div class="row">
                  <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputPhoneNumber" class="control-label">Phone Number</label>
                            <input
                              type="text"
                              minlength=10
                              maxlength=10
                              class="form-control numberonly"
                              id="inputPhoneNumber"
                              placeholder=""
                              required
                              name="phone_number"
                            />
                        </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                              <label for="inputPinCode" class="control-label">Pin Code</label>
                              <input
                                type="text"
                                class="form-control numberonly"
                                maxlength=6
                                id="inputPinCode"
                                placeholder=""
                                required
                                name="pin_code"
                              />
                      </div>
                  </div>
            </div>

                    <div class="form-group">
                      <label for="inputEmail" class="control-label">Email</label>
                          <input
                            type="email"
                            class="form-control"
                            id="inputEmail"
                            placeholder=""
                            data-error="Bruh, that email address is invalid"
                            required
                            name="email"
                          />
                      <div class="help-block with-errors"></div>
                    </div>

                            
            <div class="row">
                    <div class="col-sm-6">
                          <div class="form-group">
                            <label for="inputPassword" class="control-label">Password</label>
                                <input
                                  type="password"
                                  data-minlength="6"
                                  class="form-control"
                                  id="inputPassword"
                                  name="password"
                                  placeholder=""
                                  required
                                />
                              
                          </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label for="inputPassword" class="control-label">Confirm Password</label>
                              <input
                                type="password"
                                class="form-control"
                                id="inputPasswordConfirm"
                                data-match="#inputPassword"
                                data-match-error="Whoops, these don't match"
                                placeholder="Confirm"
                                name="confirmPassword"
                                required
                              />
                          <div class="help-block with-errors"></div>
                        </div>
                  </div>
            </div>
            <br>

            <div style="text-align:center; ">
            <a  class="btn btn-primary verifyme" href="#"  >SUBMIT</a>
            </div>
            <br> 

            
     
          <div class="form-group">
            <button type="submit" class="invisible"  name="userRegistration" class="btn btn-primary">Submit</button>
          </div>
        </form>
  </div>

  

    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-body">
            <h5 align="center" class="modal-title">Email Validation</h5>
            <br>
              <div class="container">
                <form id="verifyform" action="#" method="POST">
                  <input type="hidden" value="0" id="otp_id">
                  <input type="text" class="form-control" placeholder="Enter OTP" name="otp" id="otp" required/>
                  <br>
              </div>
              <div class="text-center">
                  <button style="width:90px;" name="otpgenerator" type="submit" class="btn btn-primary "> Verify   </button>
              </div>
            </div>
            </form>
            <div class="modal-footer">
              <button type="button" id="closeVerify" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

      </div>
    </div>
<?php
include "../user/footer.php";

?>
<script>
  $(".numberonly").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        
        
        //$("#number-error").html("Digits Only").show().fadeOut("slow");
        return false;
    }
   });
</script>
<script type="text/javascript">
    							function checkDOB() {
        							var dateString = document.getElementById('inputDOB').value;
        							var myDate = new Date(dateString);
        							var today = new Date();
        							if ((today.getFullYear() - myDate.getFullYear() > 18) && (today.getFullYear() - myDate.getFullYear() < 80)) { 
         				   					$('#p4').hide();
       						 			}
       								else{
           
            							$('#p4').show();
            							$('#p4').text("* Age between 18 years and 80 years ONLY");
           								 $("#inputDOB").focus();
									}
    							}
</script>


<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
<script type="text/javascript">

  $("#inputFirstName,#inputLastName").keypress(function(e){
    var code = ('charCode' in e) ? e.charCode : e.keyCode;
    if (!(code == 32) && // space
      !(code > 47 && code < 58) && // numeric (0-9)
      !(code > 64 && code < 91) && // upper alpha (A-Z)
      !(code > 96 && code < 123)) { // lower alpha (a-z)
      e.preventDefault();
    }
  });
  $("#verifyform").submit(function(e){
    e.preventDefault();
    var otp_id = $("#otp_id").val();
    var otp = $("#otp").val();
    $.ajax(
            {
                type:"POST",
                url: "otp_verify.php",
                data: {otp_id:otp_id,otp:otp},
                dataType: "json",
                success: function (data) {
                  
                   if(data.status == 1){
                    //main form submit
                    $.ajax({
                      url:"userRegistration.php",
                      type:"post",
                      data:new FormData($("#myForm")[0]),
                      processData:false,
                      contentType:false,
                      cache:false,
                      dataType: "json",
                      async:false,
                        success: function(data){
                            if(data.status==1){
                              alert(data.message);
                              window.location.href = '../login/index.php';

                            }else{
                              alert("faild to save");
                            }
                      }
                  });


                   }else{
                     alert("otp not match")
                   }
                },
                error:function(er){
                  console.log(er);
                }
             
            }
        );
  });
  $(".verifyme").click(function(e){ 
    e.preventDefault(); 
    var d = $('#myForm').bootstrapValidator('validate');
    var result = true;
    $('#myForm .form-group').each(function(){
        if($(this).hasClass('has-error')){ 
            result = false;
            
        }
    });
    if( result == true ){
      var email = $("#inputEmail").val();
      $.ajax(
              {
                  type:"POST",
                  url: "otpgenerator.php",
                  data: {email_id:email},
                  dataType: "json",
                  success: function (data) {
                    
                    if(data.status == 1){
                      $("#otp_id").val(data.otp_id);
                      $("#myModal").modal("show");
                    }else{
                      alert("unable to sent otp to your mail id")
                    }
                  },
                  error:function(er){
                    console.log(er);
                  }
              
              }
          );
    }

  });
  $(document).ready(function () {
    $("#myForm")
      .bootstrapValidator({
        message: "This value is not valid",
        feedbackIcons: {
          valid: "glyphicon glyphicon-ok",
          invalid: "glyphicon glyphicon-remove",
          validating: "glyphicon glyphicon-refresh",
        },
        fields: {
          first_name: {
            message: "The first name is not valid",
            validators: {
              notEmpty: {
                message: "The username is required and can't be empty",
              },
              stringLength: {
                min: 2,
                max: 30,
                message:
                  "The first_name must be more than 2 and less than 30 characters long",
              },
            },
          },
          password: {
                validators: {
                    regexp: {
                        regexp: '^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&+=]).*$',
                        message: 'Minimum eight characters, at least one letter, one number and one special character'
                    }
                }
            },
            confirmPassword: {
                validators: {
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    }
                }
            },
          phone_number: {
            message: "The phone number is not valid",
            validators: {
              regexp: {
                regexp: '[6-9]{1}[0-9]{9}',
                message: "Enter a valid Mobile Number"
              },
              notEmpty: {
                message: "The phone number is required and can't be empty",
              },
              stringLength: {
                min: 10,
                max: 10,
                message:
                  "please provide a 10 digit valid phone number",
              },
            },
          },
          pin_code: {
            message: "The pincode is not valid",
            validators: {
              regexp: {
                regexp: '[1-9][0-9]+',
                message: "Enter a valid Pincode of 6 digit"
              },
              notEmpty: {
                message: "The pincode is required and can't be empty",
              },
              stringLength: {
                min: 4,
                max: 6,
                message:
                  "please provide a  digit bw 4 to 6 valid pincode",
              },
            },
          },
          email: {
              validators: {
                  emailAddress: {
                   
                    },
                  regexp: {
                       regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                       message: 'The value is not a valid email address'
                    },
                    },
                  },
          last_name: {
            message: "The last Name is not valid",
            validators: {
              notEmpty: {
                message: "The last name is required and can't be empty",
              },
              stringLength: {
                min: 1,
                max: 20,
                message: "The first_name must be more than 1 and less than 20 characters long",
              },
            },
          },
        },
      })
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

 // $("#myForm").submit();
</script>
