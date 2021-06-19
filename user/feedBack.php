<?php
    include "../user/header.php";
    include '../connection.php';
?>

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

<?php
include "../user/footer.php";

?>