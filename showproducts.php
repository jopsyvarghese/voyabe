<?php
include_once('dbclasses/db_products.php');
$product=new Products();

?>
<!DOCTYPE html>
<html>
<head>
<title>Voyabe</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Best Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="js/jquery.min.js"></script>
<!-- //js -->
<!-- cart -->
<script src="js/simpleCart.min.js"></script>
<!-- cart -->
<!-- for bootstrap working -->
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- timer -->
<link rel="stylesheet" href="css/jquery.countdown.css" />
<!-- //timer -->
<!-- animation-effect -->
<link href="css/animate.min.css" rel="stylesheet"> 
<script src="js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<!-- //animation-effect -->
</head>
	
<body>
<?php include_once('header.php'); ?>
<!-- banner -->

		
		<!--	<div class="banner-info animated wow zoomIn" data-wow-delay=".5s">
				<h3></h3>
				<h4> <span> <i></i></span></h4>
				<div class="wmuSlider example1">
					<div class="wmuSliderWrapper">
						<article style="position: absolute; width: 100%; opacity: 0;"> 
							<div class="banner-wrap">
								<div class="banner-info1">
									<p></p>
								</div>
							</div>
						</article>
						<article style="position: absolute; width: 100%; opacity: 0;"> 
							<div class="banner-wrap">
								<div class="banner-info1">
									<p></p>
								</div>
							</div>
						</article>
						<article style="position: absolute; width: 100%; opacity: 0;"> 
							<div class="banner-wrap">
								<div class="banner-info1">
									<p></p>
								</div>
							</div>
						</article>
					</div>
				</div>
					<script src="js/jquery.wmuSlider.js"></script> 
					<script>
						$('.example1').wmuSlider();         
					</script> 
			</div>-->
            
            
<div class="container-fluid" style="padding-left: 0px;padding-right: 0;">
    
      <div class="thumbnail">
            <a href="#" target="_blank">
              <img class="img-responsive" src="images/AUTO-BANNER1.jpg"  style="width:100%;">
             
            </a>
      </div>
	
		
</div>
    
  
<!-- //banner -->
<!-- banner-bottom -->
	<div class="banner-bottom">
		<div class="container"> 
                     <div class="col-md-12">
			<div class="banner-bottom-grids">
				<div class="banner-bottom-grid-left animated wow slideInLeft" data-wow-delay=".5s">
					<div class="grid">
						<figure class="effect-julia">
							<img src="images/adv/4G.jpg" alt=" " class="img-responsive" />
							<figcaption>
								<h3> <span></span><i> </i></h3>
								<div>
									<a href=""><p>view more</p></a>
									
								</div>
							</figcaption>			
						</figure>
					</div>
				</div>
				<div class="banner-bottom-grid-left1 animated wow slideInUp" data-wow-delay=".5s">
					<div class="banner-bottom-grid-left-grid left1-grid grid-left-grid1">
						<div class="banner-bottom-grid-left-grid1">
							<img src="images/adv/balaji.jpg" alt=" " class="img-responsive" />
						</div>
						<div class="banner-bottom-grid-left1-pos">
							<p></p>
						</div>
					</div>
					<div class="banner-bottom-grid-left-grid left1-grid grid-left-grid1">
						<div class="banner-bottom-grid-left-grid1">
							<img src="images/adv/edappaly.jpg" alt=" " class="img-responsive" />
						</div>
						<div class="banner-bottom-grid-left1-position">
							<div class="banner-bottom-grid-left1-pos1">
								<p></p>
							</div>
						</div>
					</div>
				</div>
				<div class="banner-bottom-grid-right animated wow slideInRight" data-wow-delay=".5s">
					<div class="banner-bottom-grid-left-grid grid-left-grid1">
						<div class="banner-bottom-grid-left-grid1">
							<img src="images/adv/banner4.jpg" alt=" " class="img-responsive" />
						</div>
						<div class="grid-left-grid1-pos">
							<p><span></span></p>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
       </div>
</div>
<!-- //banner-bottom -->
<!-- collections -->
	<div class="new-collections">
		<div class="container">
			<h3 class="animated wow zoomIn" data-wow-delay=".5s">New Arrivals</h3>
			<p class="est animated wow zoomIn" data-wow-delay=".5s"></p>
			<div class="new-collections-grids">
			   <?php $sql=$product->selectAllProducts1();//fetch image in asc
              while($row=mysqli_fetch_array($sql)){
             

              ?>
                            <div class="col-md-4 new-collections-grid" style="margin-top: 30px;">
					<div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
						<div class="new-collections-grid1-image">
						    <?php if($row['main_image']!=""){ ?>
							<a href="product_view.php?p_id=<?php  echo $row['product_id']; ?>" class="product-image"><img src="upload/itemimage/<?php  echo $row['main_image']; ?>" alt=" " class="img-responsive" style="height:200px;" /></a>
							<?php }else{	?>
							<a href="product_view.php?p_id=<?php  echo $row['product_id']; ?>" class="product-image"><img src="images/camera.png" alt=" " class="img-responsive" style="height:280px;"/></a>
							
							<?php } ?>
							<div class="new-collections-grid1-image-pos">
						
						
								<a href="product_view.php?p_id=<?php  echo $row['product_id']; ?>">Quick View</a>
							</div>
								
						</div>
						<h4><a href=""><?php echo $row['product_name']; ?></a></h4>
						<p>	<div class="rating">
									<div class="rating-left">
										<img src="images/2.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="images/2.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="images/2.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="images/2.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="images/2.png" alt=" " class="img-responsive" />
									</div>
									<div class="clearfix"> </div>
								</div></p>
						<div class="new-collections-grid1-left simpleCart_shelfItem">
					
                   <?php  $actual_price=$row['price'];
$discount=$row['discount']; 
$selling_price = $actual_price - ($actual_price * ($discount / 100));
if($discount!=0){ ?>
							<p><i>&#x20b9;<?php echo $row['price']; ?></i> <span class="item_price">&#x20b9;<?php echo $selling_price; ?></span><a class="item_add" href="#">Add to Wishlist </a></p>
<?php }else{ if($actual_price!=0) {?>
<p> <span class="item_price">&#x20b9;<?php echo $row['price']; ?></span><a class="item_add" href="#">Add to Wishlist</a></p>
<?php }else{ ?>
<p id="addwish"><a class="item_add" href="#">Add to Wishlist  </a></p>
<?php } } ?>
						</div>
					</div>
				
				</div>
				
				<?php } ?>
				
		<div class="clearfix"> </div>
			</div>
		</div>
</div>
  
<?php include_once('footer.php'); ?>
</body>
</html>