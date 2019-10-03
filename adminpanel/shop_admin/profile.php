<?php if(!isset($_SESSION)){
   if(session_status()!=PHP_SESSION_ACTIVE) session_start();
} ?>
 <?php
  error_reporting( 0 );
 include_once("../../dbclasses/customer_details.php");
  $customer = new Customer_details();
  $customer->selectbyid($_SESSION['customer_id']); 
   if (isset($_REQUEST['update'])) {
        if ($_REQUEST['update'] == 'updatedetails') {
			$customer->setname($_REQUEST['name']);
			$customer->setmobile($_REQUEST['mobile']);
			$customer->setemail($_REQUEST['email']);
			$customer->update($_SESSION['customer_id']);
		}
		echo "<script language=JavaScript>document.location.href='dashboard.php' </script>";
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
																					<h3 class="inner-tittle two">My Profile</h3>
																						<div class="grid-1">
																						   <form class="form-horizontal" method="POST">
																									<div class="form-group">
																										<label class="col-md-2 control-label">Name</label>
																										<div class="col-md-8">
																											<div class="input-group">							
																												<span class="input-group-addon">
																													<i class="fa fa-address-book"></i>
																												</span>
																												<input type="text" class="form-control1 icon" id="name" name="name" placeholder="Name" value="<?php echo $customer->name; ?>">
																											</div>
																										</div>
																									</div>
																									<div class="form-group">
																										<label class="col-md-2 control-label">Mobile</label>
																										<div class="col-md-8">
																											<div class="input-group">
																												<span class="input-group-addon">
																													<i class="fa fa-wpforms"></i>
																												</span>
																												<input type="text" class="form-control1 icon" id="mobile"  name="mobile" placeholder="Mobile" value="<?php echo $customer->mobile; ?>">
																											</div>
																										</div>
																									</div>
																									<div class="form-group">
																										<label class="col-md-2 control-label">Email Address</label>
																										<div class="col-md-8">
																											<div class="input-group input-icon right">
																												<span class="input-group-addon">
																													<i class="fa fa-wpforms"></i>
																												</span>
																												<input id="email" name="email" class="form-control1 icon" type="text" placeholder="Email Address" value="<?php echo $customer->email; ?>">
																											</div>
																										</div>
																										
																									</div>
																							<button type="submit"  name="update" value="updatedetails" class="btn btn-default">Submit</button>
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