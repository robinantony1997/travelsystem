<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>©MARUTI SUZUKI INDIA LIMITED</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <!-- contact -->
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css'>

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

    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <video autoplay muted loop id="bg-video">
            <source src="assets/images/video.mp4" type="video/mp4" />
        </video>

        <div class="video-overlay header-text">
            <div class="caption">
                <h6></h6>
               <!-- <h2>Best <em>car dealer</em> in town!</h2> -->
                <div class="main-button">
                    <a href="#">Welcome to MARUTI SUZUKI INDIA LIMITED </a>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

   <!-- ***** Cars Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Featured <em>Cars</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>Experiences fuelled by innovations, forward thinking, and a commitment to bring the very best to Indian roads. From the day the iconic Maruti 800 was launched in 1983, the company has been spearheading a revolution of change. Turning an entire country’s need for driving, into its love for driving.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/product-1-720x480.jpg" alt="">
                        </div>
                        <div class="down-content">
<!--                             <span>
                                <del><sup>$</sup> </del> &nbsp; <sup>$</sup>
                            </span>

                            <h4></h4>

                            <p>
                                <i class="fa fa-dashboard"></i>  &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-cube"></i>  &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-cog"></i>  &nbsp;&nbsp;&nbsp;
                            </p>
 -->
                           <!--  <ul class="social-icons">
                                <li><a href="car-details.html">+ View Car</a></li>
                            </ul> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/product-2-720x480.jpg" alt="">
                        </div>
                        <!-- <div class="down-content">
                            <span>
                                <del><sup>$</sup>11999 </del> &nbsp; <sup>$</sup>11779
                            </span>

                            <h4></h4>

                            <p>
                                
                            </p>

                            <ul class="social-icons">
                                <li><a href="car-details.html">+ View Car</a></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/product-3-720x480.jpg" alt="">
                        </div>
                        <div class="down-content">
                        <!--     <span>
                                <del><sup>$</sup>11999 </del> &nbsp; <sup>$</sup>11779
                            </span>

                            <h4>Lorem ipsum dolor sit amet, consectetur</h4>

                            <p>
                                <i class="fa fa-dashboard"></i> 130 000km &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-cube"></i> 1800 cc &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-cog"></i> Manual &nbsp;&nbsp;&nbsp;
                            </p>

                            <ul class="social-icons">
                                <li><a href="car-details.html">+ View Car</a></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>

            <br>

        </div>
    </section>
    <!-- ***** Cars Ends ***** -->

    

    <!-- ***** Blog Start ***** -->
   
    <!-- ***** Blog End ***** -->

    
    <section>
        <div class="padding">
    <div style="text-align: center"> <i class="mdi mdi-forum"></i> <br>
        <h2 style="color: #666;">Contact Us</h2> <br>
        <p class="text-center" style="color:#444;">Have any Questions? Feel free to contact our Tech Support</p> <br> <button type="submit" class="btn btn-outline-dark ml-sm-2 mb-2" style="border-radius: 50px" data-toggle="modal" data-target="#contact">&emsp;&emsp;Contact Support&emsp;&emsp;</button>
    </div>
    <!--Contact Modal-->
    <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title text-light" id="exampleModalLabel">We would love to hear from you!!</h5> <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body">
                    <form class="form my-3 mr-2 ml-2" action="contactSupport.php" method="POST">
                        <div class="form-row">
                            <div class="form-group col-sm"> <label for="exampleInputEmail1" style="color: #fff;">Enter Name</label> <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name ="firstName" placeholder="First"> </div>
                            <div class="form-group col-sm"> <label class="sm-lbl" for="exampleInputEmail1" style="color:rgba(0, 0, 0, 0); visibility: hidden;">Enter Name</label> <input type="text" name ="lastName" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Last"> </div>
                        </div>
                        <div class="form-group"> <label for="exampleInputEmail1" style="color: #fff;">Enter Email</label> <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder=""> </div>
                        <div class="form-group"> <label for="exampleFormControlTextarea1" style="color: #fff;">Your Query or Question</label> <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name ="query"></textarea> </div>
                        <div class="form-group text-center">        
                            <input type="submit" class="btn btn-outline-light ml-sm-2" style="border-radius: 50px; width:100%;" name="submit" value="submit">
                        </div>
                        <div class="modal-footer"> <button type="button" class="btn btn-outline-light ml-sm-2" style="border-radius: 50px; width:100%;" data-dismiss="modal" aria-label="Close">close</button> </div>
                    </form>
                </div>
                

            </div>

        </div>
    </div>
</div>    </section>
    
    
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>
                        Copyright © 2021 Company Name:
                        -  <a href="#">MARUTI SUZUKI INDIA LIMITED</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/mixitup.js"></script> 
    <script src="assets/js/accordions.js"></script>
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

  </body>
</html>