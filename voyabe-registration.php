<?php 
include_once("dbclasses/customer_details.php");
$customer = new Customer_details();
include_once("dbclasses/login.php");
$login_obj = new Login();


	if(isset($_REQUEST['submit'])){
		
		     $customer->setname($_REQUEST['name']);
			 $customer->setmobile($_REQUEST['mobile']);
             $login_obj->setmobile($_REQUEST['mobile']);
             $customer->setemail($_REQUEST['email']);
             $login_obj->setemail($_REQUEST['email']);
             $login_obj->settype_id($_REQUEST['type_id']);
             $one_time=1;
             $login_obj->setonetime($one_time);
             $login_obj->setpassword($_REQUEST['password']);
			 $num_rowsUser=$login_obj->check_username($_REQUEST['email'],$_REQUEST['mobile']);
			
			 if($num_rowsUser==0 ){
				 
				
				 $id=$customer->insert();
				 $login_obj->setcustomer_id($id);
				 $login_obj->insert();
				 
			 }
		
			//echo "<script language=JavaScript>document.location.href='voyabe-login.php' </script>";

	}
?>

<!DOCTYPE html>
<html>
<head>
<title></title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="js/jquery.min.js"></script>
<!-- //js -->
<!-- cart -->
	<script src="js/simpleCart.min.js"> </script>
<!-- cart -->
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<!-- for bootstrap working -->
	<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- animation-effect -->
<link href="css/animate.min.css" rel="stylesheet"> 
<script src="js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<!-- //animation-effect -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-122515614-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-122515614-1');
</script>
   <script type="text/javascript">
function Confirm(form){
alert("Thanks for registering with us. Your account will be activated within 24 hours hours once we receive your payment!"); 
form.submit();
}
</script>
</head>
	
<body>
<!-- header -->
<?php include('header.php'); ?>
<!-- //header -->
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Registration</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
			<h3 class="animated wow zoomIn" data-wow-delay=".5s">Registration</h3>
			<p class="est animated wow zoomIn" data-wow-delay=".5s">Please register with us</p>
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form method="POST" action="">
				    <label>Customer Name</label>
					<input type="text" name="name" placeholder="Please enter your name" required=" " >
					<br><label>Mobile</label>
					<input type="text" name="mobile" placeholder=" Please enter your name Mobile" required=" " >
					<br><label>Email</label>
					<input type="text" name="email" placeholder="Please enter your Email" required=" " >
					<br><label>Sign Up As</label>
					<label style="margin:0 0 0 20px;">Seller</label><input type="radio" name="type_id" value="1">
					<label style="margin:0 0 0 20px;">User</label><input type="radio" name="type_id" value="0"><br><br>
					<br><label>Password</label>
					<input type="password" name="password" placeholder="Password" required=" " >
					
					<input type="submit" name="submit" onClick="Confirm(this.form)" >
				</form>
			</div>
		</div>
	</div>
<!-- //login -->
<!-- footer -->
<?php include('footer.php'); ?>
<!-- //footer -->
<script type="text/javascript">
function fun() {
	alert("Invalid User name / Password")
	
};
function func() {
	alert("This user account is disabled, Kindly contact administrator for more details.")
	
};
function funcnotactivate() {
	alert("This user account is not activated, Kindly contact administrator for more details.")
	
};
</script>
</body>
</html>

<?php 

if(isset($_REQUEST["msg"]))
{ 
   if($_REQUEST["msg"]="invalid")
      {
?>     <span style="color:red;font-size:12px;">
                   <script>
					fun();
					</script>
            </span>
<?php
      }
    }

if(isset($_REQUEST["notactivated"]))
{
      if($_REQUEST["notactivated"]="true")
      {
?>
            <span style="color:red;font-size:12px;">
                   <script>
					funcnotactivate();
					</script>
            </span>
<?php
      }
      
      
 
      
}



if(isset($_REQUEST["disable"]))
{
?>
      <span  style="color:red;font-size:12px;">
           <script>
					func();
					</script>  
      </span>
<?php
}
 ?>
