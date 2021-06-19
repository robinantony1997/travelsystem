<?php
include '../connection.php';

if(isset($_POST['branchID'])) {
    $id = $_POST["branchID"];
    $result=mysqli_query ($con,"SELECT *FROM carmodel c, branch b where c.branchID = b.branchID AND c.branchID=$id");

    ?>
    <option value="0">Select One</option>
<?php

        while($row=mysqli_fetch_array($result)){
?>
            <option value="<?php echo $row['modelid'];?> ">
                <?php echo $row['modelname']; ?> 
            </option>
<?php
        }
}
?>