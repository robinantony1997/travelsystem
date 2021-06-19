<?php 
session_start();
$id = $_POST['id']??0;
$status = "0";
$message = "";
$redirect = 0;
if($id){
	if( isset($_SESSION['car_1']) && $_SESSION['car_1'] != "" ){
		if($_SESSION['car_1'] != $id){
			if( isset($_SESSION['car_2']) && $_SESSION['car_2'] != "" ){
				if($_SESSION['car_1'] != $id){
					$message = "Maximum 2 compire is allowed remove any one";
					$redirect = 1;
				}else{
					$message = "Already added to compire";
					$redirect = 1;
				}
			}else{
				$_SESSION['car_2'] = $id;
				$message = "Added to compire";
				$redirect = 1;
				$status = "1";
			}
		}else{
			$message = "Already added to compire";
		}
	}else{
		$_SESSION['car_1'] = $id;
		$message = "added to compire";
		$status = "1";
		if( isset($_SESSION['car_2']) && $_SESSION['car_2'] > 0 ){
					$redirect = 1;
		}
	}
}else{
	$message = "invalid action";
}
echo json_encode(['status'=>$status,'message'=>$message,'redirect'=>$redirect]);
?>