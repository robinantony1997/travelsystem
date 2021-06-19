<?php
include "../user/header.php";
include '../connection.php';
$branch_id = $_GET['branch_id']??0;
if($branch_id > 0){
    $result=mysqli_query ($con,"SELECT *FROM carmodel where branchid =".$branch_id);
}else{
    $result=mysqli_query ($con,"SELECT *FROM carmodel");
}


?>

    <section class="section" id="trainers">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Featured <em>Cars</em></h2>
                        <img src="../user/assets/images/line-dec.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col-12 text-center">
                <div class="col-lg-8 offset-lg-4">
                        <form method="get">
                            
                                <div class="form-group col-6">
                                <select name="branch_id" class="form-control">
                                     <option value="0">Select One</option>
                                    <?php
                                    $resultss=mysqli_query($con,"SELECT *FROM branch");
                                    while($row=mysqli_fetch_array($resultss))
                                    {
                                    ?>
                                <option value="<?php echo $row['branchID'];?>">
                                    <?php echo $row['branchName']; ?> 
                                </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <br>
                        </form>
                    </div>
            </div>
                      
            <div class="row">
                    
                <?php
                    while($row=mysqli_fetch_array($result)){
                ?>  
                    <div class="col-lg-4">
                        <div class="trainer-item">
                            <div class="image-thumb">
                                <?php echo '<img width="128" height="128"  src="../images/model/'.$row['img'].'";>'?>
                            </div>
                            <div class="down-content">
                                <!-- <span>
                                    <del><sup></sup>RS </del> &nbsp; <sup></sup>RS
                                </span> -->

                                <h4 align="center"> </h4>

                                <p>
                                    <i class="fa fa-dashboard"></i> <?=$row['modelname'] ?> &nbsp;&nbsp;&nbsp;
                                    <i class="fa fa-cube"></i> 1800 cc &nbsp;&nbsp;&nbsp;
                                    <i class="fa fa-cog"></i> <?=$row['cartype'] ?> &nbsp;&nbsp;&nbsp;
                                </p>

                                <ul class="social-icons">
                                    <li><a href="variantList.php?id=<?php echo $row['modelid']?>">+ View Car</a></li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php
                        }
                ?> 
            </div>

            <br>

           
        </div>
    </section>
    
<?php
include "../user/footer.php";

?>