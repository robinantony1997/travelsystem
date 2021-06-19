<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Maruti Suzuki</title>

    <link rel="stylesheet" type="text/css" href="../user/assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../user/assets/css/font-awesome.css">

    <link rel="stylesheet" href="../user/assets/css/style.css">

      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


    <!-- payment -->
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
<link href='https://use.fontawesome.com/releases/v5.8.1/css/all.css'>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

<!-- PROFILE -->
<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css'>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js'></script>

  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo"> Maruti<em> Suzuki 

                            
                        </em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="../user/index.php" class="active">Home</a></li>
                            <li><a href="home.php">CARS</a></li>
                            <li><a href="compire.php">COMPARE</a></li>
                            <?php if( isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0 ){ ?>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">My Activity</a>
                              
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="userBookingView.php">CAR BOOK</a>
                                    <a class="dropdown-item" href="userTestRideView.php">TEST RIDE</a>
                                    <a class="dropdown-item" href="userServices.php">SERVICES</a>
                                    <a class="dropdown-item" href="userComplaints.php">COMPLAINTS</a>
                                    <a class="dropdown-item" href="userFeedBack.php">FEED BACK</a>
                                </div>
                            </li>
                            <li><a href="../user/service.php" class="active"> SERVICES</a></li>

                            <li><a href="../user/Complaints.php" class="active">COMPLAINT</a></li>
                            <li><a href="../user/feed.php" class="active">FEED BACK</a></li>
                        <?php } ?>
                            
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About</a>
                              
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="https://www.marutisuzuki.com/corporate/about-us">About Us</a>
                                   
                                </div>
                            </li>
                            <?php if( isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0 ){ ?>
                                <li><a href="../user/logout.php">Logout </a></li> 
                                <?php }else{ ?> 
                                    <li><a href="../login/index.php">Login</a></li> 
                                    <li><a href="../signup/test.php">Sign Up</a></li> 
                                <?php } ?>
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->