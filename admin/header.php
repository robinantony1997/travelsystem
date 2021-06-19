<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../admin/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../admin/assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../admin/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../admin/assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../admin/assets/demo/demo.css" rel="stylesheet" />
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
          <!-- <li>
            <a href="./icons.html">
              <i class="now-ui-icons education_atom"></i>
              <p>Icons</p>
            </a>
          </li> -->
          <!-- <li class="active ">
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
				  <a class="dropdown-item" href="../admin/branchReg.php">Branch</a>
                  <a class="dropdown-item" href="../admin/carmodel.php">CAR</a>
                  <a class="dropdown-item" href="../admin/varient.php">VARIANT</a>
          
                  <a class="dropdown-item" href="../admin/carPics.php">PICTURES</a>
                  <a class="dropdown-item" href="../admin/entertainment.php">ENTERTAINMENT</a>
                  <a class="dropdown-item" href="../admin/exterior.php">EXTERIOR</a>
                  <a class="dropdown-item" href="../admin/safetyReg.php">SAFETY</a>
                  <a class="dropdown-item" href="../admin/capability.php">CAPABILITY</a>
                  <a class="dropdown-item" href="../admin/convenience.php">CONVENIENCE</a>
                  <a class="dropdown-item" href="../admin/dimensions.php">DIEMENSIONS</a>
                  <a class="dropdown-item" href="../admin/interior.php">INTERIOR</a>
                  <a class="dropdown-item" href="../admin/suspension.php">SUSPENSION</a>


                </div>
              </li>
          <li>
          <li class=" dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <i class="now-ui-icons education_atom"></i> Registration View
                  
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="../admin/userView.php">User</a>
				          <a class="dropdown-item" href="../admin/branchView.php">Branch</a>
                  <a class="dropdown-item" href="../admin/modelview.php">CAR</a>
                  <a class="dropdown-item" href="../admin/variantView.php">VARIANT</a>
                  <a class="dropdown-item" href="../admin/carPicsView.php">PICTURES</a>
                  <a class="dropdown-item" href="../admin/entertainmentView.php">ENTERTAINMENT</a>
                  <a class="dropdown-item" href="../admin/exteriorView.php">EXTERIOR</a>
                  <a class="dropdown-item" href="../admin/safetyRegView.php">SAFETY</a>
                  <a class="dropdown-item" href="../admin/capabilityView.php">CAPABILITY</a>
                  <a class="dropdown-item" href="../admin/convenienceView.php">CONVENIENCE</a>
                  <a class="dropdown-item" href="../admin/dimensionsView.php">DIEMENSIONS</a>
                  <a class="dropdown-item" href="../admin/interiorView.php">INTERIOR</a>
                  <a class="dropdown-item" href="../admin/suspensionView.php">SUSPENSION</a>
                </div>
              </li>
              <li class=" dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <i class="now-ui-icons education_atom"></i> BOOKING STATUS
                  
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="../admin/bookingView.php">CAR BOOK</a>
                  <a class="dropdown-item" href="../admin/testView.php">TEST DRIVE</a>
                 
                </div>
              </li>
          <li class=" dropdown ">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <i class="now-ui-icons education_atom"></i> REPORT
                  
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="../admin/branchReport.php">Branch</a>
                  <a class="dropdown-item" href="../admin/modelReport.php">CAR</a>
                  <a class="dropdown-item" href="../admin/varientReport.php">VARIANT</a>
                  <a class="dropdown-item" href="../admin/carPicsReport.php">PICTURES</a>
                  <a class="dropdown-item" href="../admin/entertainmentReport.php">ENTERTAINMENT</a>
                  <a class="dropdown-item" href="../admin/exteriorReport.php">EXTERIOR</a>
                  <a class="dropdown-item" href="../admin/safetyReport.php">SAFETY</a>
                  <a class="dropdown-item" href="../admin/capabilityReport.php">CAPABILITY</a>
                  <a class="dropdown-item" href="../admin/userReport.php">User</a>
                  <a class="dropdown-item" href="../admin/capabilityReport.php">CAPABILITY</a>
                 <!-- <a class="dropdown-item" href="../admin/convenienceReport.php">CONVENIENCE</a>
                  <a class="dropdown-item" href="../admin/interior.php">INTERIOR</a>
                  <a class="dropdown-item" href="../admin/suspension.php">SUSPENSION</a>-->
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
              <!-- <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons media-2_sound-wave"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li> -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="logout.php">Log Out</a>
                </div>
              </li>
             <!--  <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li> -->
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">