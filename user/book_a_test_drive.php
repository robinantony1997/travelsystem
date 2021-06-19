<?php
include "../user/header.php";
include '../connection.php';
?>
<div class="container py-5">
    <!-- For demo purpose -->
    <div class="row mb-4">
        <div class="col-lg-8 mx-auto text-center">
            <br><br><br><br><br><br>
            
        </div>
    </div> <!-- End -->
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card ">
                <div class="card-header bg-white">
                    <div class=" pt-4 pl-2 pr-2 pb-2">
                        <!-- Credit card form tabs -->
                        <ul role="tablist" class="nav  nav-pills rounded nav-fill mb-3" style="padding: 0px 50px;">
                            <li class="nav-item"> <a data-toggle="pill" href="#credit-card" class="nav-link active ">  Enter Details </a> </li>
                            
                            
                        </ul>
                    </div> <!-- End -->
                    <!-- Credit card form content -->
                    <div class="tab-content">
                        <!-- credit card info-->
                        <div id="credit-card" class="tab-pane fade show active pt-6" style="padding: 0px 50px;">
                            <form role="form" method="post" action="../user/testDriveConfirm.php" >
                                <input type="hidden" name="varient_id" value="<?=$_GET['id']?>">
                                <div class="form-group"> <label for="username">
                                        <h6>Date</h6>
                                    </label> <input type="date" name="date" placeholder="" required class="form-control "> </div>
                                <div class="form-group"> <label for="username">
                                        <h6>Time</h6>
                                    </label> <input type="time" name="time" placeholder="" required class="form-control "> </div>
                                
                                
                                <div class=""> <button type="submit" name="pay_now" value="1" class="subscribe btn btn-primary btn-block shadow-sm"> Confirm Test Drive </button>
                            </form>
                            <br><br>
                        </div>
                    </div> <!-- End -->
                    
                </div>
            </div>
        </div>
    </div>

    <?php
include "../user/foo.php";

?>