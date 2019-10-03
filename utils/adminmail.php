<?php
require_once('PHPMailer_5.2.4/class.phpmailer.php');
class AdminMail {
	

	function send_email($name,$mobile,$email){
		

	$mail = new PHPMailer(); // defaults to using php "mail()"

		
		$email=$email;
		
		$mail->SMTPDebug  = 3;
		$mail->IsSMTP(); // telling the class to use SMTP
		$mail->Host       = "mail.preatech.com";  
		$mail->SMTPAuth   = true;
		$mail->Username   = 'info@voyabe.com';
		$mail->Password   = 'voyabe@123';
		$mail->SMTPSecure = 'tls';               
		$mail->Port       = 587;              
		
		$mail->AddAddress('info@voyabe.com', 'Voyabe');
		
		$mail->AddReplyTo($email,"Voyabe");
		$mail->Subject    = "Enquiry Details";
		$body='
		<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>Joining Business Request</title>

   
    <link href="css/bootstrap.min.css" rel="stylesheet">

      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
   
 
  </head>
  <body style="margin:0; padding:0;">
  
  <div style="width:80%; margin:0 auto; ">
   <div style="folat:left; width:100%; margin:0 auto;">   
      <div style="float:left;width:20%; margin-top:25px;">
     <a href="index.html"> <img src="http://voyabe.com/images/voyabe.png" style="cursor: pointer;width:100px;"></a>
      </div>
      <div style="float:right;width:80%; text-align:center; margin-top:18px;">
       <h2 style="color:#f1f1f1;     background-color: #207fbf;
    padding: 10px;    font-size: 17px; font-family:raleway; ">Enquiry Details</h2>
      </div>
   </div>
 
   
   <div style=" float:left; width:100%;">
   <div style=" width:100%;float:left;     border-top: 1px solid #ccc; border-bottom: 1px solid #ccc;
    padding: 27px 0;
    margin-top: -6px;">
    
    
   
    <table width="100%" border="0" style="">
  <tr>
    <td style="background-color:#207fbf; padding:5px 15px; color:#fff; width:30%;font-family:raleway;font-size:14px;">Name</td>
    <td style="background-color:#f1f1f1; padding:5px 15px; color:#333;font-family:raleway;font-size:14px;">'.$name.'</td>
  </tr>
  
  <tr>
    <td style="background-color:#207fbf; padding:5px 15px; color:#fff; width:30%; font-family:raleway;font-size:14px;">Email</td>
    <td style="background-color:#f1f1f1; padding:5px 15px; color:#333 ;font-family:raleway;font-size:14px;">'.$email.'</td>
  </tr>
  <tr>
    <td style="background-color:#207fbf; padding:5px 15px; color:#fff; width:30%;font-family:raleway;font-size:14px;">Phone number</td>
    <td style="background-color:#f1f1f1; padding:5px 15px; color:#333;font-family:raleway;font-size:14px;">'.$mobile.'</td>
  </tr>
  
  </table>

  
 
 
   
   <div style="float:left;width:100%;background-color:#207fbf;     padding-top: 15px; text-align:center;
    padding-bottom: 15px;">
      <ul style="padding:0; margin:0;padding-left: 12px;">
      <li style="display:inline;font-size: 12px;color:#fff;    border-right: 1px solid #fff;
    padding: 0px 6px;"><a href=http://www.voyabe.com/" style="color:#fff; text-decoration:none;font-family:raleway;font-size:13px;">Home</a></li>
      <li style="display:inline;font-size: 12px;color:#fff;    border-right: 1px solid #fff;
    padding: 0px 6px;"><a href="http://www.voyabe.com/" style="color:#fff; text-decoration:none;font-family:raleway;font-size:14px;" >About</a></li>
      
   
      <li style="display:inline;font-size: 12px;color:#fff;    border-right: 1px solid #fff;
    padding: 0px 6px;"><a href="http://www.voyabe.com/" style="color:#fff; text-decoration:none;font-family:raleway;font-size:14px;">Contact Us</a></li>
      </ul>
      </div><!--footer-->
	   <div style=" text-align:center; padding:10px; width:100%; float:left;">
   <p><a href="http://www.voyabe.com/" style="color:#333; text-decoration:none;font-family:raleway;font-size:14px;">Voyabe</a></p>
   </div>

  </div><!--wrapper-->
</div>

   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
  </body>
</html>
';
		$mail->MsgHTML($body);
		$mail->Send();
		echo "Sucessfully saved";
		
	}
}

?>