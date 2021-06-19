<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../PHPMailer/vendor/autoload.php';
include '../connection.php';

if(isset($_POST["id"]))
{
	$id=$_POST["id"];

    mysqli_query($con,"UPDATE testdrive SET status='ACCEPTED' WHERE testID=$id ");

    //echo '<script>window.location="../user/servicesView.php"</script>';
        $result=mysqli_query($con,"SELECT *from testdrive t JOIN userregistration u ON t.user_id =u.user_id WHERE testID=$id ");
		$row=mysqli_fetch_array($result);
        $user = $row['first_name'];
        $email_id =   $row['email'];
        $date 	= $row['testDate'];;

        $mail = new PHPMailer(true);
    
        try {
            $mail->SMTPDebug = 0;                                       
            $mail->isSMTP();                                            
            $mail->Host       = 'smtp.gmail.com';                    
            $mail->SMTPAuth   = true;                             
            $mail->Username   = 'otpforfree@gmail.com';                 
            $mail->Password   = 'ellamnallathinu';                        
            $mail->SMTPSecure = 'tls';                              
            $mail->Port       = 587;  
        
            $mail->setFrom('test@gmail.com', 'Car');           
            $mail->addAddress($email_id);
            $mail->addAddress($email_id, $user);

            $mail->AddCC('josmyj19@gmail.com');
            
            $mail->isHTML(true);                                  
            $mail->Subject = 'Test Drive Accepted';
            $mail->Body    = '<p>Hi '.$user.'</p>
            				  <p>Your test drive has been accepted for '.$date.'</p>';
            $mail->AltBody = '';
            $mail->send();
            
        } catch (Exception $e) {
            
        }
        $status = "1";
        $message = "Test drive has been accepted";
        echo json_encode(['status'=>$status,'message'=>$message]);

}
?>