<?php if(!isset($_SESSION)){
   if(session_status()!=PHP_SESSION_ACTIVE) session_start();
} ?>
 <?php
  error_reporting( 0 );
include("../../dbclasses/login.php");
    $login_obj = new Login();
 
   if (isset($_REQUEST['update'])) {
        if ($_REQUEST['update'] == 'changepassword') {
			
			if($_REQUEST['new_p']==$_REQUEST['confirm'])
			$password=md5($_REQUEST['new_p']);
		echo $password; 
			$login_obj->setpassword($password);
			$login_obj->updatePass($_SESSION['customer_id']);
		}else{
			
		 	
		}
		  }
      
  ?>
<!DOCTYPE HTML>
<html>
<head>
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<script src="js/jquery-1.10.2.min.js"></script>
<!--clock init-->
<script src="js/css3clock.js"></script>
<!--Easy Pie Chart-->
<!--skycons-icons-->
<script src="js/skycons.js"></script>
<!--//skycons-icons-->
</head> 
<body>
 <div class="page-container">
   <!--/content-inner-->
	<div class="left-content">
	   <div class="inner-content">
		<!-- header-starts -->
			<?php include('header.php'); ?>
						<!-- //header-ends -->
							<!--//outer-wp-->
								<div class="outter-wp">
								 				<div class="forms-inner">
																		<div class="set-3">
																				<div class="graph-2 general">
																					<h3 class="inner-tittle two">Password Settings</h3>
																						<div class="grid-1">
																						   <form class="form-horizontal" method="POST">
																									<div class="form-group">
																										<label class="col-md-2 control-label">New Password</label>
																										<div class="col-md-8">
																											<div class="input-group">							
																												<span class="input-group-addon">
																													<i class="fa fa-address-book"></i>
																												</span>
																												<input type="text" class="form-control1 icon" id="new_p" name="new_p" >
																											</div>
																										</div>
																									</div>
																									<div class="form-group">
																										<label class="col-md-2 control-label">Confirm Password</label>
																										<div class="col-md-8">
																											<div class="input-group">
																												<span class="input-group-addon">
																													<i class="fa fa-wpforms"></i>
																												</span>
																												<input type="text" class="form-control1 icon" id="confirm"  name="confirm" >
																											</div>
																										</div>
																									</div>
																									
																							<button type="submit"  name="update" value="changepassword" class="btn btn-default">Submit</button>
																								</form>
																						</div>
																				</div>
																			</div>
																																						
																		</div>
																	<!--//forms-inner-->
																</div> 
														<!--//forms-->											   
												</div>
											<!--//outer-wp-->
									 <!--footer section start-->
										<footer>
										   <p>&copy 2018 Voyabe . All Rights Reserved | Design by <a href="http://preatech.com/" target="_blank">Preatech</a></p>
										</footer>
									<!--footer section end-->
								</div>
							</div>
				<!--//content-inner-->
			<!--/sidebar-menu-->
				<?php include('../includes/side_menu_shop.php'); ?>
							  <div class="clearfix"></div>		
							</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>

<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
</body>
</html>