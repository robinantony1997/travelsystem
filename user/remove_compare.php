<?php 
session_start();
$id = $_POST['id']??0;
$status = "0";
$message = "";
$redirect = 0;
if($id){
	$sess = "car_".$id;
	if( isset($_SESSION[$sess]) ){
		$_SESSION[$sess] = "";
	}
	$status = "1";
	$message = "Removed from compire";
}else{
	$message = "invalid action";
}
echo json_encode(['status'=>$status,'message'=>$message,'redirect'=>$redirect]);
?>