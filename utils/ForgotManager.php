<?php
require_once('PHPMailer_5.2.4/class.phpmailer.php');
$mail = new PHPMailer(); 
class RandomPasswordManager {

	function send_new_email($username,$password){
			echo $username;
		$mail = new PHPMailer(); // defaults to using php "mail()"

   	    $mail->SMTPDebug  = 3;
		$mail->IsSMTP(); // telling the class to use SMTP
		$mail->Host       = "mail.preatech.com";  
		$mail->SMTPAuth   = true;
		$mail->Username   = 'info@voyabe.com';
		$mail->Password   = 'voyabe@123';
		$mail->SMTPSecure = 'tls';               
		$mail->Port       = 587;  
		
			
$mail->SetFrom('info@preatech.com', 'Voyabe');//From address with name of the mail


$mail->AddAddress($username, "Voyabe");
		$mail->Subject    = "Voyabe.com Password reset";
		$body="<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
<title>Voyabe Forgot Password</title>
<link rel='stylesheet' type='text/css' href='http://voyabe.com/css/style.css' />
</head>
<body>
<div style='width:890px; float:left; height:auto; padding:20px 20px 30px 20px; background:#ffe7fe; '>
<div style='width:650px; margin:0 auto; height:auto;  height:auto; '>
<div style='width:650px; float:left; padding-top:30px; padding-bottom:15px; height:auto;  height:auto; '>
<img src='http://voyabe.com/images/voyabe.png' width='320' alt=''  />
</div>
<div style='width:620px; float:left; height:auto; padding:15px; height:auto; background:#FFFFFF; '>
<p style='font-family:Calibri; padding:0px 0px 10px 0px; margin:0; font-size:15px;'></p>
<p style='font-family:Calibri; padding:0px 0px 15px 0px; margin:0; font-size:15px;'>
    	<div class='col-sm-12' style='min-height:300px;'>
Please find your login details below : 
        <div class='col-sm-12 cust-vr'>
        
        
        <h4>Login Details</h4></div>
        <div class='col-sm-12 det-cu'>
         <div class='form-group input-group'>
                                URL : 'http://www.voyabe.com/login.php'
                            </div>
        <div class='form-group input-group'>
                                Username : ".$username."
                            </div>
                            <div class='form-group input-group'>
                                Temporary Password : ".$password."
                            </div>
                           
        </div>
        </div>
        </div>
<div style='width:591px; margin-top:5px; height:auto; border:1px #e1e1e1 solid; padding:0;  float:left;'>

</div>


<div style='clear:both;'></div>
</div>
</div>
<div style='clear:both;'></div>
</div>
</div>

</body>
</html>

";

		$mail->MsgHTML($body);
		$mail->Send();
		
	}
}

?>