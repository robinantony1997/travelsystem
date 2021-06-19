<?php session_start(); 
include '../connection.php';
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="../user/assets/css/bootstrap.min.css">
</head>
<body style="margin: 50px 25px;">
<style>
	@media print {
	  #printPageButton {
	    display: none;
	  }
	}
</style>
<?php
if( isset($_POST['pay_now']) ){
	$varient_id = $_POST['varient_id'];
	$user_id = $_SESSION['user_id'];
	$amount = 2000;
    $dob = date('Y-m-d H:i:s');
    $reference = time();

    $sql ="INSERT INTO booking (order_date,amount,referenceNumber,variant_id,user_id)
    VALUE('$dob',$amount,'$reference',$varient_id,$user_id)";

    $result = $con->query($sql);

    if($result){
        $results=mysqli_query ($con,"SELECT *FROM branch b,carmodel c, variant v,booking bk, userregistration u WHERE b.branchid=c.branchid AND c.modelid=v.model_id AND bk.user_id=u.user_id AND v.variant_id = $varient_id AND bk.user_id=$user_id");
        
        $row=mysqli_fetch_array($results);
        $firstName =$row['first_name'];
        $lastName =$row['last_name'];
        $model =$row['modelname'];
        $variant =$row['variant_name'];    
        $amount =$row['amount'];    
        $reference =$row['referenceNumber'];
  

    }
    else {
        echo "Error:".$sql ."". $con->error;
    }
    ?>
    <div class="container" style="padding: 25px 10px; border: 1px solid #000;">
    	<div class="col-xs-12 text-center">
    		<h4>Invoice</h4>
    	</div>
        <table class="table table-stripped table-condensed">
            <tr>
                <td>Refrence Number</td>
                <td>: <?= $reference ?> </td>
            </tr>
        	<tr>
        		<td>Model Name</td>
        		<td>: <?= $model ?> </td>
        	</tr>
        	<tr>
        		<td>Varient Name</td>
        		<td>: <?= $variant ?> </td>
        	</tr>
            <tr>
                <td>Customer Name</td>
                <td>: <?= $firstName ?> <?= $lastName ?> </td>
            </tr>
        	<tr>
        		<td>Payed Amount</td>
        		<td>: <?= $amount ?> RS-</td>
        	</tr>
        	<tr>
        		<td>Date</td>
        		<td>: <?=date('d-M-Y')?></td>
        	</tr>
        	<tr>
        		<td colspan="2" class="text-center">
        			<p>If you have any doubt in this invoice. Feel free to contact us</p>
        		</td>
        	</tr>
        </table>
        <div class="col-xs-12 text-center" id="printPageButton">
        	<button type="button" class="btn btn-primary" onclick="window.print();">Print</button>
        	<a href="../user/index.php" class="btn btn-warning">Go home</a>
        </div>
    </div>
    <?php
}

?>
<script src="../user/assets/js/jquery-2.1.0.min.js"></script>
<script src="../user/assets/js/bootstrap.min.js"></script>
<script>
	
</script>
</body>
</html>