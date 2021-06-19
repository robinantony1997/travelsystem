<?php
include '../connection.php';

if(isset($_POST['model_id'])) {
    $id = $_POST["model_id"];
    $variantResult=mysqli_query ($con,"SELECT *FROM variant v,carmodel c WHERE v.model_id=c.modelid AND v.model_id = $id");
?>
    <option value="0">Select One</option>
<?php

        while($row=mysqli_fetch_array($variantResult)){
?>
            <option value="<?php echo $row['variant_id'];?> ">
                <?php echo $row['variant_name']; ?> 
            </option>
<?php
        }
}
?>