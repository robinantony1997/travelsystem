


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
        <div class="col-lg-6 mx-auto">
            <div class="card ">
                <div class="card-header">
                    <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                        <!-- Credit card form tabs -->
                        <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                            <li class="nav-item"> <a data-toggle="pill" href="#credit-card" class="nav-link active ">  


                            	<?php
								if( isset($_POST['pay_now']) ){
									$varient_id = $_POST['varient_id'];
									$user_id = $_SESSION['user_id'];
                                    $dob = date('Y-m-d H:i:s',strtotime($_POST['time']));
                                    $status ='pending';
                                    $reference =time();
                                    $sql ="INSERT INTO testdrive (testdate,status,variant_id,user_id,referenceNumber)
                                                VALUES('$dob','$status',$varient_id,$user_id,'$reference')";

                                    $result = $con->query($sql);
									//TEst drive insert code here
                                    if($result){
									   echo "Test driver booked successfully. Our team will contact you soon";
                                    }
                                    else {
                                        echo "Error:".$sql ."". $con->error;
                                    }
    								}
								    ?>

                             </a> </li>
                            
                            
                        </ul>
                    </div> <!-- End -->
                    
                    
                </div>
            </div>
        </div>
    </div>

    <?php
include "../user/foo.php";

?>