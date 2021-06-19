<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../manager/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../manager/assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../manager/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../manager/assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../manager/assets/demo/demo.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="black">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          
        </a>
        <a href="#" class="simple-text logo-normal">
          MARUTHI SUZUKI
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="./dashboard.html">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          
          <!--
            <li>
            <a href="./icons.html">
              <i class="now-ui-icons education_atom"></i>
              <p>Icons</p>
            </a>
          </li>
           <li class="active ">
            <a href="./map.html">
              <i class="now-ui-icons location_map-big"></i>

              <p>Maps</p>
            </a>
          </li> -->
          <li class=" dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <i class="now-ui-icons location_map-big"></i> Registration
                  
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">                  
                  <a class="dropdown-item" href="../manager/carmodel.php">CAR</a>
                  <a class="dropdown-item" href="../manager/varient.php">VARIANT</a>
          
                  <a class="dropdown-item" href="../manager/carPics.php">PICTURES</a>
                  <a class="dropdown-item" href="../manager/entertainment.php">ENTERTAINMENT</a>
                  <a class="dropdown-item" href="../manager/exterior.php">EXTERIOR</a>
                  <a class="dropdown-item" href="../manager/safetyReg.php">SAFETY</a>
                  <a class="dropdown-item" href="../manager/capability.php">CAPABILITY</a>
                  <a class="dropdown-item" href="../manager/convenience.php">CONVENIENCE</a>
                  <a class="dropdown-item" href="../manager/dimensions.php">DIEMENSIONS</a>
                  <a class="dropdown-item" href="../manager/interior.php">INTERIOR</a>
                  <a class="dropdown-item" href="../manager/suspension.php">SUSPENSION</a>


                </div>
              </li>
          <li>
          <li class=" dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <i class="now-ui-icons education_atom"></i> Registration View
                  
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="../manager/userView.php">User</a>
                  <a class="dropdown-item" href="../manager/modelview.php">CAR</a>
                  <a class="dropdown-item" href="../manager/variantView.php">VARIANT</a>
                  <a class="dropdown-item" href="../manager/carPicsView.php">PICTURES</a>
                  <a class="dropdown-item" href="../manager/entertainmentView.php">ENTERTAINMENT</a>
                  <a class="dropdown-item" href="../manager/exteriorView.php">EXTERIOR</a>
                  <a class="dropdown-item" href="../manager/safetyRegView.php">SAFETY</a>
                  <a class="dropdown-item" href="../manager/capabilityView.php">CAPABILITY</a>
                  <a class="dropdown-item" href="../manager/convenienceView.php">CONVENIENCE</a>
                  <a class="dropdown-item" href="../manager/dimensionsView.php">DIEMENSIONS</a>
                  <a class="dropdown-item" href="../manager/interiorView.php">INTERIOR</a>
                  <a class="dropdown-item" href="../manager/suspensionView.php">SUSPENSION</a>
                </div>
              </li>
              
              <li class=" dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <i class="now-ui-icons education_atom"></i> USER
                  
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="../manager/complaintView.php">COMPLAINT</a>
                  <a class="dropdown-item" href="../manager/feedBackView.php">FEED BACK</a>
                  <a class="dropdown-item" href="../manager/servicesView.php">SERVICES</a>
                 
                </div>
              </li>
          <li class=" dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <i class="now-ui-icons education_atom"></i> BOOKING STATUS
                  
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="../manager/bookingView.php">CAR BOOK</a>
                  <a class="dropdown-item" href="../manager/testView.php">TEST DRIVE</a>
                 
                </div>
              </li>
        
          <li class=" dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <i class="now-ui-icons education_atom"></i> REPORT
                  
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="../manager/userReport.php">USER</a>
                  <a class="dropdown-item" href="../manager/modelReport.php">CAR</a>
                  <a class="dropdown-item" href="../manager/varientReport.php">VARIANT</a>
                  <a class="dropdown-item" href="../manager/carPicsReport.php">PICTURES</a>
                  <a class="dropdown-item" href="../manager/entertainmentReport.php">ENTERTAINMENT</a>
                  <a class="dropdown-item" href="../manager/exteriorReport.php">EXTERIOR</a>
                  <a class="dropdown-item" href="../manager/safetyReport.php">SAFETY</a>
                  <a class="dropdown-item" href="../manager/capabilityReport.php">CAPABILITY</a>
                  
                  <a class="dropdown-item" href="../manager/capabilityReport.php">CAPABILITY</a>
                 <!-- <a class="dropdown-item" href="../manager/convenienceReport.php">CONVENIENCE</a>
                  <a class="dropdown-item" href="../manager/interior.php">INTERIOR</a>
                  <a class="dropdown-item" href="../manager/suspension.php">SUSPENSION</a>-->
                </div>
            </li>
        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
        <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo"></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <!-- <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
            </form> -->
            <ul class="navbar-nav">
              
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="../manager/changePass.php">Change Password</a>
                  <a class="dropdown-item" href="../manager/logout.php">Log Out</a>
                </div>
              </li>
              
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">

      </div>
      <footer class="footer">
        <div class=" container-fluid ">
          <nav>
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  © MARUTI SUZUKI INDIA LIMITED
                </a>
              </li>
              <li>
                <a href="https://www.marutisuzuki.com/corporate/about-us">
                  About Us
                </a>
              </li>
              <li>
                <a href="https://www.marutisuzuki.com/corporate/careers">
                  Careers
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by <a href="#" target="_blank">© MARUTI SUZUKI INDIA LIMITED</a>.<a href="" target="_blank"></a>.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../manager/assets/js/core/jquery.min.js"></script>
  <script src="../manager/assets/js/core/popper.min.js"></script>
  <script src="../manager/assets/js/core/bootstrap.min.js"></script>
  <script src="../manager/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Chart JS -->
  <script src="../manager/assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../manager/assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../manager/assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" type="text/javascript" async defer></script>
  <script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
  </script>
  
</body>

</html>