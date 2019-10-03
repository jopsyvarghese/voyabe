<?php 
include_once("dbclasses/login.php");
$login_obj = new Login();
include_once("dbclasses/customer_details.php");
$customer = new Customer_details(); 

?>
<!DOCTYPE html>
<html>
<head>
<title>Voyabe Login</title>
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

</head>
	
<body>
<!-- header -->
<?php include('header.php'); ?>
<!-- //header -->
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Login Page</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
			<h3 class="animated wow zoomIn" data-wow-delay=".5s">Voyabe Login</h3>
			<p class="est animated wow zoomIn" data-wow-delay=".5s">Please login to continue</p>
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form method="POST" action='logincheck.php'>
					<input type="text" name="username" placeholder="Mobile/Email" required=" " >
					<input type="password" name="password" placeholder="Password" required=" " >
					<div class="forgot">
						<a href="forgot_password.php">Forgot Password?</a>
					</div>
					<input type="submit" value="Login">
				</form>
			</div>
			<h4 class="animated wow slideInUp" data-wow-delay=".5s">New user register here</h4>
			<p class="animated wow slideInUp" data-wow-delay=".5s"><a href="voyabe-registration.php">Please Register</a><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
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
