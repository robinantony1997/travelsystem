<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../PHPMailer/vendor/autoload.php';

include "../connection.php";

    $email_id = $_POST['email_id'];
    $exist_check = mysqli_query($con,"SELECT *FROM  userregistration WHERE email='$email_id'");
    $rowcount=mysqli_num_rows($exist_check);
    if($rowcount >0){
        $otp = rand(1111,9999);

        mysqli_query($con,"INSERT INTO otp(otp_value) values('$otp')");

        $id = $con->insert_id;
        
        //send mail otp
        if($id){
            $mail = new PHPMailer(true);
    
            try {
                $mail->SMTPDebug = 0;                                       
                $mail->isSMTP();                                            
                $mail->Host       = 'smtp.gmail.com';                    
                $mail->SMTPAuth   = true;                             
                $mail->Username   = 'ash.test.php@gmail.com';                 
                $mail->Password   = 'P@$$word';                        
                $mail->SMTPSecure = 'tls';                              
                $mail->Port       = 587;  
            
                $mail->setFrom('test@gmail.com', 'Car');           
                $mail->addAddress($email_id);
                $mail->addAddress($email_id, 'Suith');
                
                $mail->isHTML(true);                                  
                $mail->Subject = 'OTP';
                $mail->Body    = 'Otp for verifying your account is '.$otp;
                $mail->AltBody = '';
                $mail->send();
                $array = array(
                    'status' => 1,
                    'otp_id' => $id,
                    'email' => $email_id
                );
                echo json_encode($array);
            } catch (Exception $e) {
                $array = array(
                    'status' => 0,
                    'otp_id' => $id
                );
                echo json_encode($array);
            }
        }


    }else{
        echo json_encode(['status'=>0,'message'=>'invalid email id provided']);
    }

?>