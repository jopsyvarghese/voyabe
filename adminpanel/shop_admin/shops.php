<?php session_start(); ?>
<?php
  error_reporting( 0 );
  include_once("../includes/common_functions.php");
  include_once("../includes/createThumb.php");
  include_once("../../dbclasses/db_shop.php");
  $shop = new Shop();
  $CommonClass= new CommonClass();
  
   if(isset($_REQUEST['add_edit'])) {
	if(isset($_REQUEST['s_id'])){
		$shop->selectbyshopid($_REQUEST['s_id']);
	     }
    if(isset($_REQUEST['add'])) {
        if ($_REQUEST['add'] == 'addshop') {
           if(isset($_FILES['image']['name'])||$_FILES['image']['name']!='')
			{
				$extension = strtolower($CommonClass->getExtension($_FILES['image']['name']));
				
				if($extension=='jpg'|| $extension=='jpeg' || $extension=='gif'|| $extension=='png')
				{	$image_name = date('Y-m-d_H-i-s').'_'.$_FILES["image"]["name"];
					
					move_uploaded_file($_FILES["image"]["tmp_name"],"../../upload/itemimage/".$image_name );
					//CREATE THUMBNAIL
						createThumb("../../upload/itemimage/".$image_name,"../../upload/itemimage/thumbs/",116);
					if(isset($_REQUEST['oldimage1'])){
						unlink("../../upload/itemimage/".$_REQUEST['oldimage']);
						unlink("../../upload/itemimage/thumbs/".$_REQUEST['oldimage']);
					}
					
					$shop->setimage(trim($image_name));
				}
				else
				{
					$message = 'Invalid image format';
				}
			}else{
				if(isset($_REQUEST['oldimage1'])){
					$shop->setimage(trim($_REQUEST['oldimage1']));
				}
			
			}
        $shop->setshop_name($_REQUEST['shop_name']);
        $shop->setshop_address($_REQUEST['shop_address']);
		$shop->setcustomer_id($_SESSION['customer_id']);
        $shop->setmobile($_REQUEST['mobile']);
        $shop->setphone($_REQUEST['phone']);
        $shop->setpincode($_REQUEST['pincode']);
        $shop->setemail($_REQUEST['email']);
        $shop->setwebsite($_REQUEST['website']);
		if($_REQUEST['add_edit']==0){
				$shop->insert();
				
			}
		else{
			$shop->setshop_id($_REQUEST['id']);
			$shop->update();
		}   
echo "<script language=JavaScript>document.location.href='shops.php' </script>";
       }
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
<script type="text/javascript" src="js/modernizr.custom.04022.js"></script>
<!--clock init-->
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
									<!--/sub-heard-part-->
											 <div class="sub-heard-part">
													   <ol class="breadcrumb m-b-0">
															<li><a href="#">Home</a></li>
															<li class="active">Shops</li>
														</ol>
											</div>	
											<!--/sub-heard-part-->	
										<!--/tabs-->
										 <div class="tab-main">
											 <!--/tabs-inner-->
												<div class="tab-inner">
												<?php if(!isset($_REQUEST['add_edit'])){ ?>
												      <div id="tabs" class="tabs">
													            <h2 class="inner-tittle">Shops</h2>
															<div class="graph">
																					<nav>
																						<ul>
																							<li><a href="#section-1" class="icon-shop"><i class="lnr lnr-briefcase"></i> <span>Shop</span></a></li>
																							<!--<li><a href="#" class="icon-cup"><i class="lnr lnr-lighter"></i> <span>Renewal Details</span></a></li>
																							<li><a href="#" class="icon-food"><i class="fa fa-cutlery"></i> <span>Delete Shop Request</span></a></li>-->
																						
																						</ul>
																					</nav>
																					<div class="content tab">
																						<section id="section-1">
																						<a href="?add_edit=0" class="a_demo_four" >Add New Shop</a><br><br>
														  <div class="graph">
															<div class="tables">
												
																<table class="table table-bordered"> 
																<thead> <tr> 
																<th>Sl.No</th> 
																<th>Shop Name</th> 
																<th>Operations</th>
																</tr> </thead>
																<tbody> 
																<?php
														 $count = 1;
														$sql=$shop->selectAllById($_SESSION['customer_id']);//fetch image in asc
													          while($row=mysqli_fetch_array($sql)){
														?>	<tr>
																<th scope="row"><?php echo $count++; ?></th>
																<td><?php echo $row['shop_name'];  ?></td> 
															
																<td>	<?php if($row['map_latitude']=="") {?> <a href="loc.php?shop_id=<?php echo $row['shop_id']; ?>" class="a_demo_four" >Add Shop Location</a><?php } ?><a href="?add_edit=3&s_id=<?php echo $row['shop_id']; ?>" class="a_demo_four" >View</a><br><br><a href="?add_edit=1&s_id=<?php echo $row['shop_id']; ?>" class="a_demo_four">Edit</a><br></td><br>
																</tr>  
															  <?php } ?></tbody> </table> 
															</div>
													</div>
																							
																						</section>
																						<section id="section-2">
																							<div class="mediabox">
																								<i class="fa fa-trophy"></i>
																								<h3>Asparagus Cucumber Cake</h3>
																								<p>Chickweed okra pea winter purslane coriander yarrow sweet pepper radish garlic brussels sprout groundnut summer purslane earthnut pea tomato spring onion azuki bean gourd. </p>
																							</div>
																							<div class="mediabox">
																								<i class="fa fa-coffee"></i>
																								<h3>Magis Kohlrabi Gourd</h3>
																								<p>Chickweed okra pea winter purslane coriander yarrow sweet pepper radish garlic brussels sprout groundnut summer purslane earthnut pea tomato spring onion azuki bean gourd. </p>
																							</div>
																							<div class="mediabox">
																								<i class="fa fa-leaf"></i>
																								<h3>Ricebean Rutabaga</h3>
																								<p>Chickweed okra pea winter purslane coriander yarrow sweet pepper radish garlic brussels sprout groundnut summer purslane earthnut pea tomato spring onion azuki bean gourd. </p>
																							</div>
																						</section>
																						<section id="section-3">
																							<div class="mediabox">
																							<i class="fa fa-leaf"></i>
																								<h3>Noodle Curry</h3>
																								<p>Chickweed okra pea winter purslane coriander yarrow sweet pepper radish garlic brussels sprout groundnut summer purslane earthnut pea tomato spring onion azuki bean gourd. </p>
																							</div>
																							<div class="mediabox">
																							 <i class="fa fa-trophy"></i>
																								<h3>Leek Wasabi</h3>
																								<p>Chickweed okra pea winter purslane coriander yarrow sweet pepper radish garlic brussels sprout groundnut summer purslane earthnut pea tomato spring onion azuki bean gourd. </p>
																							</div>
																							<div class="mediabox">
																								<i class="fa fa-coffee"></i>
																								<h3>Green Tofu Wrap</h3>
																								<p>Chickweed okra pea winter purslane coriander yarrow sweet pepper radish garlic brussels sprout groundnut summer purslane earthnut pea tomato spring onion azuki bean gourd. </p>
																							</div>
																						</section>
																					
																					
																					</div><!-- /content -->
																				</div>
																				<!-- /tabs -->
																				
																			</div>
																			<script src="js/cbpFWTabs.js"></script>
																			<script>
																				new CBPFWTabs( document.getElementById( 'tabs' ) );
																			</script>
																			<?php } else if($_REQUEST['add_edit']==0) { ?>
																				<div class="graph">
																				<div class="tabs">
																					<div class="graph-form">
																	                 <div class="form-body">
																		<form   role="form" method="post" enctype="multipart/form-data">
																		<div class="form-group"> 
																		<label for="exampleInputShopname">Shop</label> 
																		<input type="text" class="form-control"  name="shop_name" id="shop_name" placeholder="Shop Name">
																		</div>
																		<div class="form-group"> 
																		<label for="exampleInputAddress">Address</label> 
																		<input type="text" class="form-control" name="shop_address" id="shop_address" placeholder="Address"> 
																		</div> 
																		<div class="form-group"> 
																		<label for="exampleInputMobile">Mobile</label> 
																		<input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile"> 
																		</div> 
																		<div class="form-group"> 
																		<label for="exampleInputPhone">Phone</label> 
																		<input type="text" class="form-control" name="phone" id="phone" placeholder="Phone"> 
																		</div> 
																		<div class="form-group"> 
																		<label for="exampleInputEmail">Email</label> 
																		<input type="text" class="form-control"  name="email" id="email" placeholder="Email"> 
																		</div> 
																		<div class="form-group"> 
																		<label for="exampleInputWebsite">Website</label> 
																		<input type="text" class="form-control" name="website" id="website" placeholder="Website"> 
																		</div> 
																		<div class="form-group"> 
																		<label for="exampleInputFile">Shop Image</label>
																		<input type="file" id="image" name="image">
																		</div>
																		<button type="submit"  name="add" value="addshop" class="btn btn-default">Submit</button> </form> 
																	              </div>
																			</div>
																		    </div>
																	        </div>
																			<?php }else if($_REQUEST['add_edit']==1)  { ?>
																		<div class="graph">
																				<div class="tabs">
																					<div class="graph-form">
																	                 <div class="form-body">
																		<form   role="form" method="post" enctype="multipart/form-data">
																		<input type="hidden" name="id" value="<?php echo $_REQUEST['s_id'];?>"  />
																		<div class="form-group"> 
																		<label for="exampleInputShop">Shop</label> 
																		<input type="text" class="form-control"  name="shop_name" id="shop_name" value="<?php echo $shop->shop_name; ?>" placeholder="Shop Name"> </div>
																		<div class="form-group"> 
																		<label for="exampleInputAddress">Address</label> 
																		<input type="text" class="form-control" name="shop_address" id="shop_address" value="<?php echo $shop->shop_address; ?>" placeholder="Address"> 
																		</div> 
																	 
																		<div class="form-group"> 
																		<label for="exampleInputMobile">Mobile</label> 
																		<input type="text" class="form-control" name="mobile" id="mobile" value="<?php echo $shop->mobile; ?>" placeholder="Mobile"> 
																		</div> 
																		<div class="form-group"> 
																		<label for="exampleInputPhone">Phone</label> 
																		<input type="text" class="form-control" name="phone" id="phone" value="<?php echo $shop->phone; ?>" placeholder="Phone"> 
																		</div> 
																		<div class="form-group"> 
																		<label for="exampleInputEmail">Email</label> 
																		<input type="text" class="form-control"  name="email" id="email" value="<?php echo $shop->email; ?>" placeholder="Email"> 
																		</div> 
																		<div class="form-group"> 
																		<label for="exampleInputWebsite">Website</label> 
																		<input type="text" class="form-control" name="website"  value="<?php echo $shop->website; ?>" id="website" placeholder="Website"> 
																		</div> 
																		<div class="form-group"> 
																		<label for="exampleInputFile">Shop Image</label>
																		<?php if($shop->image!=''){ ?>
																			<img src="../../upload/itemimage/thumbs/<?php echo $shop->image;?>" width="100" height="100"/>
																			<input type="hidden" name="oldimage" value="<?php echo $shop->image; ?>"/>
																			<?php } ?>
																		<input type="file" class="form-control" name="image" id="image" />
																		
																		</div>
																		<button type="submit"  name="add" value="addshop" class="btn btn-default">Submit</button> </form> 
																	              </div>
																			</div>
																		    </div>
																	        </div>
																	 
																			<?php }else{ ?>
																			
																			        <div class="widget-one">
														<div class="col-md-6 weather-grids widget-shadow">
															<div class="header-top weather">
																<figure class="icons">
																	<canvas id="clear-day" width="64" height="64"></canvas>
																</figure>
																<h4 class="weather">Shop Name :</h4><h4 class="weather"><?php echo $shop->shop_name; ?></h4><br>
																<div class="clearfix"> </div>
															</div>
															<div class="header-top weather">
																<figure class="icons">
																	<canvas id="clear-day" width="64" height="64"></canvas>
																</figure>
																<h4 class="weather">Address :</h4><h4 class="weather"><?php echo $shop->shop_address; ?></h4>
																
																<div class="clearfix"> </div>
															</div>
															<!--	<div class="header-top weather">
																<figure class="icons">
																	<canvas id="clear-day" width="64" height="64"></canvas>
																</figure>
																<h4 class="weather">Pin Code</h4><h4 class="weather"><?php echo $shop->pincode; ?></h4>
																
																<div class="clearfix"> </div>
															</div>-->
															<div class="header-top weather">
																<figure class="icons">
																	<canvas id="clear-day" width="64" height="64"></canvas>
																</figure>
																<h4 class="weather">Mobile :</h4><h4 class="weather"><?php echo $shop->mobile; ?></h4>
																
																<div class="clearfix"> </div>
															</div>
															<div class="header-top weather">
																<figure class="icons">
																	<canvas id="clear-day" width="64" height="64"></canvas>
																</figure>
																<h4 class="weather">Phone :</h4><h4 class="weather"><?php echo $shop->phone; ?></h4>
																
																<div class="clearfix"> </div>
															</div>
															<div class="header-top weather">
																<figure class="icons">
																	<canvas id="clear-day" width="64" height="64"></canvas>
																</figure>
																<h4 class="weather">Email :</h4><h4 class="weather"><?php echo $shop->email; ?></h4>
																
																<div class="clearfix"> </div>
															</div>
															
															<div class="header-top weather">
																<figure class="icons">
																	<canvas id="clear-day" width="64" height="64"></canvas>
																</figure>
																<h4 class="weather">Website :</h4><h4 class="weather"><?php echo $shop->website; ?></h4>
																
																<div class="clearfix"> </div>
															</div>
															
														<!--	<div class="header-top weather">
															<h4 class="weather"> Website :</h4><h4 class="weather"><?php echo $shop->website; ?>
															</h4>-->
																
																<div class="clearfix"> </div>
															</div><div class="header-top weather">
																
																<img src="../../upload/itemimage/thumbs/<?php echo $shop->image; ?>" height="75" width="130" style="float:left; margin:15px 10px 0px 0px;  "/>
																
																<div class="clearfix"> </div>
															</div>
															
														</div>
						
														<div class="clearfix"> </div>
													</div>
																	
																	 
																			<?php  }?>
																 <div class="clearfix"> </div>
														</div>
												</div>
											  <!--//tabs-inner-->
										 </div>	
										<!--//tabs-->
									</div>
								<!--//outer-wp-->
									 <!--footer section start-->
										<footer>
										   <p>&copy 2018 Voyabe . All Rights Reserved | Design by <a href="https://preatech.com" target="_blank">Preatech</a></p>
										</footer>
									<!--footer section end-->
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