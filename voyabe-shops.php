<?php include('dbclasses/db_shop.php');
$shop=new Shop();
include('dbclasses/db_products.php');
$product=new Products();
$shop_id=$_REQUEST['shop_id'];
$shop->selectbyshopid($shop_id);   ?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Best Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
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
				<li class="active"><?php  echo  $shop->shop_name; ?></li>
			</ol>
		</div>
	</div>
	<div class="products">
		<div class="container">
	<div class="col-md-8 products-right">
			<div class="products-right-grid">
					<div class="products-right-grids animated wow slideInRight" data-wow-delay=".5s">
						<!--<div class="sorting">
							<select id="country" onchange="change_country(this.value)" class="frm-field required sect">
								<option value="null">Default sorting</option>
								<option value="null">Sort by popularity</option> 
								<option value="null">Sort by average rating</option>					
								<option value="null">Sort by price</option>								
							</select>
						</div> -->
					
						<div class="clearfix"> </div>
					</div>
					<div class="" data-wow-delay=".5s">
					<?php  if($shop->image!=""){ ?>
						<img src="upload/itemimage/<?php echo $shop->image; ?>" alt=" " class="img-responsive" />
						<?php }else{ ?>
						<img src="images/camera.png" alt=" " class="img-responsive" />
						<?php } ?>
						<div class="products-right-grids-position1">
					
						</div>
		
						<div class="well shopdetails-text">
							<h4 style="font-weight: bold;font-family: Times New Roman", Times, serif;"><?php echo $shop->shop_name;  ?> </h4>
							<?php if($shop->latitude!=""){ ?>
								<p><a style="font-weight: bold;border-radius:  24px;margin-top:10px;" href="showlocation.php?shop_id=<?php echo $shop_id ?>&shop_name=<?php echo $shop->shop_name ?>" name="shop_location" class="btn btn-primary" >Get Shop Location</a></p>
							<?php } ?>
							<ul type="none">
									<?php  if($shop->shop_address!=""){ ?>
									<li>
									<div class="shop-info-details">
											<div class="addess-info">
												<p><i class="fa fa-map-marker"></i> <?php echo $shop->shop_address; ?></p>
											</div>
									</div>
									</li>
									 <?php  }if($shop->mobile!=""){ ?>
									  
									<li><div class="shop-info-details">
									<div class="addess-info"><p><i class="fa fa-mobile"></i>  <?php echo $shop->mobile; ?></p></div>
									</div>
									</li>
									
									  <?php  }if($shop->phone!=""){ ?>
									<li><div class="shop-info-details">
									<div class="address-icon"></div>
									<div class="addess-info"><a href="tel:+91<?php echo $shop->phone; ?>" ><p><i class="fa fa-phone"></i>  <?php echo $shop->phone; ?></p></a></div>
									</div>
									</li>
									
									 <?php  }if($shop->email!=""){ ?>
									<li><div class="shop-info-details">
									<div class="address-icon"></div>
									<div class="addess-info"><a style="color:#000000;" href="mailto:<?php echo $shop->email; ?>" target="_top"> <p><i class="fa fa-envelope"></i> <?php echo $shop->email; ?></p></a></div>
									</div>
									</li>
									
									 <?php  }if($shop->website!=""){ ?>
									<li><div class="shop-info-details">
									<div class="address-icon"></div>
									<div class="addess-info"> <a style="color:#000000; " target="_blank" href="<?php echo $shop->website; ?>" >  <p><i class="fa fa-globe"></i>  <?php echo $shop->website; ?></p></a></div>
									</div>
									</li>
									<?php  } ?>
							</ul>
						
					</div>	
					</div>
				</div>
				
				
	
			</div>
		</div>
		
		<div class="single-related-products">
		<div class="container">
			<h3 class="animated wow slideInUp" data-wow-delay=".5s">Products/Services</h3>
			

			<p class="est animated wow slideInUp" data-wow-delay=".5s"></p>
			<div class="new-collections-grids">
			  <?php $sql1=$product->selectByShop($shop_id);
               while($row1=mysqli_fetch_array($sql1)){
                
            ?> 
                
				<div class="col-md-3 new-collections-grid">
					<div class="new-collections-grid1 animated wow slideInLeft" data-wow-delay=".5s">
						<div class="new-collections-grid1-image">
						<?php if($row1['main_image']!="") { ?>
							<a href="product-details.php?p_id=<?php  echo $row1['product_id']; ?>" class="product-image"><img src="upload/itemimage/<?php echo $row1['main_image']; ?>" alt=" " class="img-responsive"></a>
						<?php } else{ ?>
							<a href="product-details.php?p_id=<?php  echo $row1['product_id']; ?>" class="product-image"><img src="images/camera.png" alt=" " class="img-responsive"></a>
						<?php } ?>
							<div class="new-collections-grid1-image-pos">
								<a href="product-details.php?p_id=<?php  echo $row1['product_id']; ?>">Explore</a>
							</div>
							<div class="new-collections-grid1-right">
							
							</div>
						</div>
						<h4><a href=""><?php  echo $row1['product_name']; ?></a></h4>
							<div class="rating">
									<div class="rating-left">
										<img src="images/2.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="images/2.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="images/2.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="images/2.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="images/1.png" alt=" " class="img-responsive">
									</div>
									<div class="clearfix"> </div>
								</div>
						<div class="new-collections-grid1-left simpleCart_shelfItem">
							        <?php  $actual_price=$row['price'];
$discount=$row['discount']; 
$selling_price = $actual_price - ($actual_price * ($discount / 100));
if($discount!=0){ ?>
							<p><i>&#x20b9;<?php echo $row['price']; ?></i> <span class="item_price">&#x20b9;<?php echo $selling_price; ?></span><!--<a class="item_add" href="#">Add to Wishlist </a>--></p>
<?php }else{ if($actual_price!=0) {?>
<p> <span class="item_price">&#x20b9;<?php echo $row['price']; ?></span><!--<a class="item_add" href="#">Add to Wishlist</a> --></p>
<?php }else{ ?>
<p id="addwish"><!--<a class="item_add" href="#">Add to Wishlist  </a> --></p>
<?php } } ?>
						</div>
					</div>
				</div>
				  <?php } ?>
			
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
		
		</div>
<!-- footer -->
			<?php include('footer.php'); ?>
<!-- //footer -->
</body>
</html>