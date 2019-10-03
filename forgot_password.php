<?php 
include_once("dbclasses/login.php");
include_once("utils/ForgotManager.php");
$RandomPasswordManager=new RandomPasswordManager();
$login=new Login();
if((isset($_REQUEST['submit'])) ){
     $username=$_REQUEST['email'];
     $val=$login->check($username);
	 if($val!=0){
		    $randompassword=$login->random_password();
			$login->setPassword(md5($randompassword));
			$login->updatePass($username);
			$RandomPasswordManager->send_new_email($username,$randompassword);
			  } 
			  header('location:index.php');
      }  ?>
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
      <script type="text/javascript">
function Confirm(form){
alert("We have sent you a password.Please check your mail!"); 
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
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Voyabe-Forgot Password</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
			<h3 class="animated wow zoomIn" data-wow-delay=".5s">Forgot Password</h3>
		
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form method="POST" action="">
					<input type="text" name="email" placeholder="Mobile/Email" required=" " >
					<input type="submit" name="submit" value="Save"  onClick="Confirm(this.form)">
				</form>
			</div>
			<h4 class="animated wow slideInUp" data-wow-delay=".5s">You want to business with us/Sell your products with us</h4>
			<p class="animated wow slideInUp" data-wow-delay=".5s"><a href="register.php">Please Register</a><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
		</div>
	</div>
<!-- //login -->
<!-- footer -->
<?php include('footer.php'); ?>
<!-- //footer -->

</body>
</html>




