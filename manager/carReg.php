<?php
include "../manager/header.php";
?>

<div class="container jumbotron p-3 my-3 ">
    <div class="card">
        <div class="card-header">
            <h5 class="title">CAR DETAILS</h5>
        </div>
        <div class="card-body">
            <div class="form-group">
                <form action="#" method="POST" name="form1" id="form1" >
                    
                    <div class="form-group">
                        <label for="inputVariantName" class="control-label " >Variant Name </label>
                            <input type="text" class="form-control" id="inputVariantName" name="variantName" placeholder="" required />
                        </div>
                    <div class="form-group">
                        <label for="inputPrice" class="control-label "> Price </label>
                            <input type="text" class="form-control" id="inputPrice" name="price" placeholder="" required  />
                        </div>
                    
                    <div class="form-group">
                        <label for="inputEngineType" class="control-label " >Engine Type </label>
                            <input type="text" class="form-control" id="inputEngineType" name="engineType" placeholder="" required />
                        </div>
                    <div class="form-group">
                        <label for="inputDisplacement" class="control-label "> Displacement </label>
                            <input type="text" class="form-control" id="inputDisplacement" name="displacement" placeholder="" required  />
                        </div>
                    <div class="form-group">
                        <label for="inputmaxPower" class="control-label ">Max Power</label>
                            <input type="text" class="form-control" id="inputmaxPower" name="maxPower" placeholder="" required  />
                        </div>
                        <div class="form-group">
                        <label for="inputMaxTorque" class="control-label "> Max Torque </label>
                            <input type="text" class="form-control" id="inputMaxTorque" name="maxTorque" placeholder="" required  />
                        </div>
                    <div class="form-group">
                        <label for="inputNoOfCylinder" class="control-label ">No of Cylinder</label>
                            <input type="text" class="form-control" id="inputNoOfCylinder" name="noOfCylinder" placeholder="" required  />
                        </div>
                    <div class="form-group">
                        <label for="inputGearType" class="control-label " >Gear Type </label>
                            <input type="text" class="form-control" id="inputGearType" name="gearType" placeholder="" required />
                        </div>
                    <div class="form-group">
                        <label for="inputGearBox" class="control-label "> Gear Box </label>
                            <input type="text" class="form-control" id="inputGearBox" name="gearBox" placeholder="" required  />
                        </div>
                    <div class="form-group">
                        <label for="inputDriveType" class="control-label ">Drive Type</label>
                            <input type="text" class="form-control" id="inputDriveType" name="driveType" placeholder="" required  />
                        </div>
                    <br>
                    <div class="form-group text-center">
                    <input type="submit" name="submit"  class="btn btn-primary" value="submit">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>

</div>

<?php
include "../manager/footer.php";
?>