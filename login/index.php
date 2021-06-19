<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login V8</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="../login/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="../login/vendor/bootstrap/css/bootstrap.min.css"
    />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="../login/fonts/font-awesome-4.7.0/css/font-awesome.min.css"
    />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="../login/vendor/animate/animate.css"
    />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="../login/vendor/css-hamburgers/hamburgers.min.css"
    />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="../login/vendor/animsition/css/animsition.min.css"
    />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="../login/vendor/select2/select2.min.css"
    />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="../login/vendor/daterangepicker/daterangepicker.css"
    />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../login/css/util.css" />
    <link rel="stylesheet" type="text/css" href="../login/css/main.css" />
    <!--===============================================================================================-->
  </head>
  <body>
    <div class="limiter">
      <div class="container-login100">
        <div class="wrap-login100">
          <form method="post"
            id="verifyLogin"
            class="login100-form validate-form p-l-55 p-r-55 p-t-178"
          >
            <span class="login100-form-title"> Sign In </span>

            <div
              class="wrap-input100 validate-input m-b-16"
              data-validate="Please enter username"
            >
              <input
                class="input100"
                type="text"
                name="email"
                required
                id="verifyEmail"
                placeholder="Username"
              />
              <span class="focus-input100"></span>
            </div>

            <div
              class="wrap-input100 validate-input"
              data-validate="Please enter password"
            >
              <input
                class="input100"
                type="password"
                name="pass"
                required
                id="verifyPass"
                placeholder="Password"
              />
              <span class="focus-input100"></span>
            </div>

            <div class="text-right p-t-13 p-b-23">
              <span class="txt1"> Forgot </span>

              <a href="../login/forget.php" class="txt2">  Password? </a>
            </div>

            <div class="container-login100-form-btn">
              <button type="submit" class="login100-form-btn">Sign in</button>
            </div>

            <div class="flex-col-c p-t-170 p-b-40">
              <span class="txt1 p-b-9"> Don’t have an account? </span>

              <a href="../signup/test.php" class="txt3"> Sign up now </a>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!--===============================================================================================-->
    <script src="../login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="../login/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
  <script src="https://unpkg.com/@popperjs/core@2"></script>
  
    <script src="../login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="../login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="../login/vendor/daterangepicker/moment.min.js"></script>
    <script src="../login/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="../login/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="../login/js/main.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
      $("#verifyLogin").submit(function (e) {
        e.preventDefault(); 
        const email = $("#verifyEmail").val();
        const password = $("#verifyPass").val();

        $.ajax({
          type: "POST",
          url: "loginCheck.php",
          data: { email: email, password: password },
          dataType: "html",
          success: function (data) {
            if(data==1){
              window.location.href='../user/index.php';
            }else{
              swal(data);
            }
          },
          error: function (er) {
            console.log(er);
          },
        });
      });
    </script>
  </body>
</html>
