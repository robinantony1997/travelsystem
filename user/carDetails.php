<?php
include "../user/master.php";
if(isset($_GET['id'])) {
    $vid = $_GET["id"];

    $result=mysqli_query ($con,"SELECT *FROM variant WHERE variant_id =$vid");
    $pics=mysqli_query ($con,"SELECT *FROM car_pics  WHERE variant_id = $vid");
    $picsT=mysqli_query ($con,"SELECT *FROM car_pics  WHERE variant_id = $vid");
    $res = mysqli_query ($con,"SELECT * FROM `entertainment` e JOIN variant v ON v.variant_id = e.varient_id JOIN capability cap ON cap.varient_id = v.variant_id JOIN carmodel c ON c.modelid = v.model_id JOIN convenience con ON con.varient_id = v.variant_id JOIN dimensions d ON d.varient_id =v.variant_id JOIN exterior ex ON ex.varient_id = v.variant_id JOIN interior i ON i.varient_id= v.variant_id JOIN safety s ON s.variant_id = v.variant_id JOIN suspension su ON su.varient_id = v.variant_id  WHERE v.variant_id=$vid");
}
?>
 <style>
     .book-btn{
        background-color: #AD1C1B;
        padding: 10px 15px;
        border-radius: 25px;
        color: #fffe;
        font-size: 80%;
        font-family: Helvetica;
     }
     .book-btn:hover{
        background-color: #cd2a29;
        color: #fffe;
     }
 </style>   
    <br>
            <br> <br>
            <br>
    <section class="section" id="trainers">
        <div class="container">
        <br>
        <br>
        <?php while($row=mysqli_fetch_array($result)){ ?>

            <div class="box_wrapper"><h1><?= $row['variant_name']?> : (Rs  29.75 - 37.22 Lakh*)</h1></div>
            <?php } ?>
				    <div class="single-top"> 	
		  				<div class="lsidebar span_1_of_s">
					   		<div id="container">
						   	    <div id="products_example">
                                    <div id="products">
                                        <div class="slides_container">
                                        <?php while($row=mysqli_fetch_array($pics)){ ?>
                                            <a href="#" target="_blank"><?= '<img  alt=" " height=210px width=560px src="../images/variant/'.$row['pics'].'";/>'?></a>
                                            
                                        <?php } ?>    
                                        </div>
                                        <ul class="pagination">
                                        <?php 
                                        $variant_id = "";
                                        while($rows=mysqli_fetch_array($picsT)){ 
                                            $variant_id = $rows['variant_id'];
                                            ?>
                                            
                                            <li><a href="#"><?= '<img src="../images/variant/'.$rows['pics'].'";/>'?></a></li>
                                        <?php } ?>  
                                        </ul>
                                    </div>
						        </div>
					        </div>
					    </div>
                        <div class="lsidebar span_1_of_s text-center" style="padding:150px 20px;">
                        <?php
                        $url2= $url = "../login/index.php";
                        if( isset($_SESSION['user_id']) ){
                            $url = "payment.php?id=".  $variant_id;
                            $url2 = "book_a_test_drive.php?id=".$variant_id;
                        } 
                        ?>
                        <a href="<?=$url?>" class="btn btn-primary book-btn">Book Now</a>
                        <a href="<?=$url2?>" class="btn btn-primary book-btn">Book Test Drive</a>
                        <a href="#" class="btn btn-primary book-btn add_to_compare" data-v-id="<?=$variant_id?>">Compare</a>
                                        </div>
                    </div>
            </div>
        </div>
    </section>
    <!-- ***** Fleet Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <br>
            <br>

                <div class="row" id="tabs">
                <div class="col-lg-4">
                    <ul>
                    <li><a href='#tabs-1'><i class="fa fa-cog"></i> Vehicle Specs</a></li>
                    <li><a href='#tabs-2'><i class="fa fa-info-circle"></i> Vehicle Description</a></li>
                    <li><a href='#tabs-3'><i class="fa fa-plus-circle"></i> Vehicle Extras</a></li>
                    <li><a href='#tabs-5'><i class="fa fa-automobile"></i> safety Details</a></li>
                    <li><a href='#tabs-4'><i class="fa fa-phone"></i> Contact Details</a></li>
                    

                    </ul>
                </div>
                <div class="col-lg-8">
                         <?php while($ro=mysqli_fetch_array($res)){ ?>

                    <section class='tabs-content' style="width: 100%;">
                    <article id='tabs-1'>
                        <h4>Vehicle Specifications</h4>

                        <div class="row">
                        <div class="col-sm-6">
                                <label>Type</label>
                        
                                <p><?= $ro['engtype']?></p>
                        </div>

                        <div class="col-sm-6">
                                <label>Price</label>
                        
                                <p><?= $ro['price']?></p>

                        </div>

                        <div class="col-sm-6">
                                <label> Model</label>
                        
                                <p><?= $ro['modelname']?></p>
                        </div>

                        <div class="col-sm-6">
                                <label>First registration</label>
                        
                                <p><?= $ro['mfyear']?></p>

                        </div>

                        <div class="col-sm-6">
                                <label>Mileage</label>
                        
                                <p><?= $ro['mileage']?></p>
                        </div>

                        <div class="col-sm-6">
                                <label>Fuel</label>
                        
                                <p><?= $ro['fueltype']?></p>
                        </div>

                        <div class="col-sm-6">
                                <label>Engine size</label>
                        
                                <p><?= $ro['displacement']?></p>
                        </div>

                        <div class="col-sm-6">
                                <label>Max Power</label>
                        
                                <p><?= $ro['max_power']?></p>
                        </div>


                        <div class="col-sm-6">
                                <label>Gearbox</label>
                        
                                <p><?= $ro['geartype']?></p>

                        </div>

                        <div class="col-sm-6">
                                <label>Number of Cylinder</label>
                        
                                <p><?= $ro['no_cylinder']?></p>
                        </div>

                        <div class="col-sm-6">
                                <label>Torque</label>
                        
                                <p><?= $ro['max_torque']?></p>

                        </div>
                        <div class="col-sm-6">
                                <label>Drive Type</label>
                        
                                <p><?= $ro['drivetype']?></p>

                        </div>

                        <div class="col-sm-6">
                                <label>Color</label>
                        
                                <p><?= $ro['color']?></p>

                        </div>
                        </div>
                    </article>
                    <article id='tabs-2'>
                        <h4>Vehicle Description</h4>
                        
                        <p>- Colour coded bumpers <br> - Break assist <br> - Antilock Breaking System <br> - Central locking - remote <br> - Passenger airbag <br> - Electric windows <br> - Rear head rests <br> - Radio <br> - CD player <br> - Ideal first car <br> - Warranty <br> - High level brake light <br> Maruti Suzuki is India's largest carmaker. The Maruti Suzuki line-up comprises hatchbacks, sedans, MPVs and an SUV.Today, Maruti Suzuki has about 19 active models in the market. This company has discontinued several of its existing models over the years because of improvements in design and so on. Some of the famous models discontinued by the company include the Maruti 800, Maruti 1000, Esteem, Zen, Versa, Zen Estilo and Ritz, among others.</p> 
                    </article>

                    <article id='tabs-3'>
                        <h4>Vehicle Extras</h4>
                        <h5 style="color:Tomato;">INTERIOR</h5>
                        <div class="row">
                            <div class="col-sm-6">
                            <label>Tachometer</label>
                                <p><?= $ro['tachometer']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Electronic Multi-Tripmeter</label>
                                <p><?= $ro['electronic']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Leather Seats </label>
                                <p><?= $ro['leather']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Digital Clock </label>
                                <p><?= $ro['digitalclock']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Digital Odometer</label>
                                <p><?= $ro['digitalodometer']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Digital Lighter</label>
                                <p><?= $ro['digitallighter']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Height Adjustable DriverSeat</label>
                                <p><?= $ro['heightadjustable']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>ventilated Seats</label>
                                <p><?= $ro['ventilated']?></p>
                            </div>
                       
                            <h5 style="color:Tomato;">EXTERIOR</h5>
                            <div class="row">   
                            <div class="col-sm-6">
                                <label>Fog light front</label>
                                <p><?= $ro['foglightfont']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Adjustable Headlights<</label>
                                <p><?= $ro['electric_adjustableseat']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Fog light rear </label>
                                <p><?= $ro['foglightnear']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Power Antenna </label>
                                <p><?= $ro['powerantenna']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Rain Sensing Wiper</label>
                                <p><?= $ro['rain']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Wheel Covers</label>
                                <p><?= $ro['wheel']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Sun roof</label>
                                <p><?= $ro['sun']?></p>
                            </div>
                            </div>
                           
                            <h5 style="color:Tomato;">DIMENSIONS</h5>
                            <div class="row">
                            <div class="col-sm-6">
                                <label>Length</label>
                                <p><?= $ro['length']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Width</label>
                                <p><?= $ro['width']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Height</label>
                                <p><?= $ro['height']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Wheelbase</label>
                                <p><?= $ro['wheelbase']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Fronttrack</label>
                                <p><?= $ro['fronttrack']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Reartrack</label>
                                <p><?= $ro['reartrack']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Seatingcapacity</label>
                                <p><?= $ro['seatingcapacity']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>weight</label>
                                <p><?= $ro['weight']?></p>
                            </div>
                            </div>
                          
                            <h5 style="color:Tomato;">CAPABILITY</h5>
                      
                            <div class="row">   
                            <div class="col-sm-6">
                            <label>Ground Clearance</label>
                                <p><?= $ro['groundcl']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Approach Angle</label>
                                <p><?= $ro['approach']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Departure Angle </label>
                                <p><?= $ro['depature']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Rampover Angle </label>
                                <p><?= $ro['rampover']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Water Wading Depth</label>
                                <p><?= $ro['water']?></p>
                            </div>
                            </div>
                            <h5 style="color:Tomato;">ENTERTAINMENT</h5>
                        <br>
                        <div class="row">   
                            <div class="col-sm-6">
                           
                        
                                <label>DVD Player </label>
                                <p><?= $ro['dvd_player']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Radio Player </label>
                                <p><?= $ro['radio_player']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Speaker</label>
                                <p><?= $ro['speaker']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Usb And Auxilary Input </label>
                                <p><?= $ro['usb_auxilaryin']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Blutooth Connectivity</label>
                                <p><?= $ro['blutooth']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Touch Screen</label>
                                <p><?= $ro['touchscreen']?></p>
                            </div>
                            
                            </div>

                            <h5 style="color:Tomato;">CONVENIENCE</h5>
                        <br>
                        <div class="row">   
                            <div class="col-sm-6">
                           
                        
                                <label>Power Steering </label>
                                <p><?= $ro['powerst']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Power Windows-Front</label>
                                <p><?= $ro['pwf']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Power Windows-Rear</label>
                                <p><?= $ro['pwr']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Air Conditions </label>
                                <p><?= $ro['aircondition']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Heater</label>
                                <p><?= $ro['heater']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Adjustable Steering</label>
                                <p><?= $ro['adjustablesteer']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Air Quality Control </label>
                                <p><?= $ro['airquality']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Remote Climate Control</label>
                                <p><?= $ro['remoteclimate']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Low Fuel WarningLight</label>
                                <p><?= $ro['lowfuel']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Trunk Light</label>
                                <p><?= $ro['trunk']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label> Remote Horn $ Light Control</label>
                                <p><?= $ro['remote']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Vanity Mirror</label>
                                <p><?= $ro['vanity']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Cruise Control</label>
                                <p><?= $ro['cruise']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Seat Lumber Support</label>
                                <p><?= $ro['seatlumber']?></p>
                            </div>
                            </div>
                            <h5 style="color:Tomato;">SUSPENSION</h5>
                        <br>
                        <div class="row">   
                            <div class="col-sm-6">
                            <label>Front Suspension</label>
                                <p><?= $ro['front']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Rear Suspension</label>
                                <p><?= $ro['rear']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Brake Specification </label>
                                <p><?= $ro['brake']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Front Brake Type </label>
                                <p><?= $ro['frontb']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Rear Brake Type</label>
                                <p><?= $ro['rearb']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Tyres</label>
                                <p><?= $ro['tyres']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Steering Type</label>
                                <p><?= $ro['steert']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Steering Gear Type</label>
                                <p><?= $ro['steerg']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Acceleration</label>
                                <p><?= $ro['acceleration']?></p>
                            </div>
                         </div>                                              
                    </article> 
                    <article id='tabs-5'>
                    <h4 style="color:Tomato;">SAFETY</h4>
                        <br>
                        <div class="row">   
                            <div class="col-sm-6">
                           
                        
                            <label>ABS</label>
                                <p><?= $ro['antilock_breakingstm']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Break assist</label>
                                <p><?= $ro['brakeassist']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Centrel Locking System </label>
                                <p><?= $ro['centrellockstm']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>No Of Airbags </label>
                                <p><?= $ro['airbags']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Day Night Rear view</label>
                                <p><?= $ro['daynight_rearviewmirror']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Passenger Side View Mirror</label>
                                <p><?= $ro['passengersidemirror']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Xenon head lamp</label>
                                <p><?= $ro['xenonheadlamp']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Halogen head lamp</label>
                                <p><?= $ro['halogenheadlamp']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Rear Seat Belt</label>
                                <p><?= $ro['rearseatbelt']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Seat Belt Warning </label>
                                <p><?= $ro['seatbeltwarning']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Door Hazard Warning</label>
                                <p><?= $ro['doorajarwarning']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Side Impact Beams </label>
                                <p><?= $ro['sideimpactbeams']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Adjustable Seat </label>
                                <p><?= $ro['adjustableseat']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Vehicle Control stability </label>
                                <p><?= $ro['vehiclecntrl']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Engine immobilizer</label>
                                <p><?= $ro['engineimmobilizer']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Crash sensor</label>
                                <p><?= $ro['crashsensor']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Electronic Break Distribution </label>
                                <p><?= $ro['color']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Rear camera</label>
                                <p><?= $ro['rearcamera']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Blind Spot Monitor</label>
                                <p><?= $ro['blindspot']?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Hill assist</label>
                                <p><?= $ro['hillassist']?></p>
                            </div>    
                      </div>      
                    </article>          
                            
                    <article id='tabs-4'>
                        <h4>Contact Details</h4>

                        <div class="row">   
                            <div class="col-sm-6">
                                <label>Name</label>

                                <p>Anish John</p>
                            </div>
                            <div class="col-sm-6">
                                <label>Phone</label>

                                <p>123-456-789 </p>
                            </div>
                            <div class="col-sm-6">
                                <label>Mobile phone</label>
                                <p>9447211324</p>
                            </div>
                            <div class="col-sm-6">
                                <label>Email</label>
                                <p><a href="#">Anish@carsales.com</a></p>
                            </div>
                        </div>
                    </article>
                    </section>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <form role="form" method="post" action="../user/testDriveConfirm.php" >
            <input type="hidden" name="varient_id" value="<?=$_GET['id']?>">
            <div class="form-group"> <label for="username">
                    <h6>Date</h6>
                </label> <input type="date" name="date" placeholder="" required class="form-control "> </div>
            <div class="form-group"> <label for="username">
                    <h6>Time</h6>
                </label> <input type="time" name="time" placeholder="" required class="form-control "> </div>
            
            
            <div class="card-footer"> <button type="submit" name="pay_now" value="1" class="subscribe btn btn-primary btn-block shadow-sm"> Confirm Test Drive </button>
        </form>
      </div>
      
    </div>

  </div>
</div>
    <?php
include "../user/footer.php";

?>
<script src="../user/js/slides.min.jquery.js"></script>


<script>
		$(function(){
			$('#products').slides({
				preload: true,
				preloadImage: 'img/loading.gif',
				effect: 'slide, fade',
				crossfade: true,
				slideSpeed: 350,
				fadeSpeed: 500,
				generateNextPrev: true,
				generatePagination: false
			});
		});
	</script>

<script type="text/javascript">
        $(document).ready(function() {
            $(".dropdown img.flag").addClass("flagvisibility");

            $(".dropdown dt a").click(function() {
                $(".dropdown dd ul").toggle();
            });
                        
            $(".dropdown dd ul li a").click(function() {
                var text = $(this).html();
                $(".dropdown dt a span").html(text);
                $(".dropdown dd ul").hide();
                $("#result").html("Selected value is: " + getSelectedValue("sample"));
            });
                        
            function getSelectedValue(id) {
                return $("#" + id).find("dt a span.value").html();
            }

            $(document).bind('click', function(e) {
                var $clicked = $(e.target);
                if (! $clicked.parents().hasClass("dropdown"))
                    $(".dropdown dd ul").hide();
            });


            $("#flagSwitcher").click(function() {
                $(".dropdown img.flag").toggleClass("flagvisibility");
            });
        });

        $(".add_to_compare").click(function(){
            $.ajax(
            {
                type:"POST",
                url: "../user/add_to_compare.php",
                data: {id: $(this).attr("data-v-id")},
                dataType: "json",
                success: function (data) {
                    if(data.status == 1){
                        if(data.redirect == 1){
                            window.location.href = "../user/compire.php";
                        }else{
                            alert(data.message);
                        }
                    }else{
                        alert(data.message);
                        if(data.redirect == 1){
                            window.location.href = "../user/compire.php";
                        }
                    }
                }
             
            }
        );

        });

    </script>