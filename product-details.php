<?php 
include('dbclasses/db_products.php');
$product=new Products();
include('dbclasses/db_highlights.php');
$highlight=new Highlights(); 
$product_id=$_REQUEST['p_id']; 
$product->selectDetailsById($product_id);
include('dbclasses/db_shop.php');
$shop=new Shop();
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $product->product_name; ?> | local business | Services | Voyabe - Kerala,Bangalore,India</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo $product->product_name; ?> | Price | Features | top rating | Voyabe in Kerala,Bangalore,India  " />
<meta name="Description" content=" <?php echo $product->product_name; ?> with good quality and low price. Enjoy shopping with Voyabe,the new way of shopping in Kerala,Bangalore India.  "/>

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
				 <?php $c_name=$category_obj->selectnameByid($product->category_id); 
	  if($c_name!="Others"){?>
	 <li class="active"><?php echo $c_name; ?></li>
	 <li class="active"><?php echo $product->product_name; ?></li>
	  <?php }else{?>
				<li class="active"><?php echo $product->product_name; ?></li>
	  <?php } ?>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- single -->
	<div class="single">
		<div class="container">

			<div class="col-md-8 single-right">
				<div class="col-md-5 single-right-left animated wow slideInUp" data-wow-delay=".5s">
					<div class="flexslider">
						<ul class="slides">
						<?php if($product->main_image!=""){ ?>
							<li data-thumb="upload/itemimage/<?php echo $product->main_image; ?>">
								<div class="thumb-image"> <img src="upload/itemimage/<?php echo $product->main_image; ?>" data-imagezoom="true" class="img-responsive"> </div>
							</li>
						<?php }else { ?>
							<li data-thumb="images/camera.png">
								<div class="thumb-image"> <img src="upload/itemimage/thumbs/camera_tn.jpeg" data-imagezoom="true" class="img-responsive"> </div>
							</li>
							<?php }
							if($product->image1!=""){ ?>
							<li data-thumb="upload/itemimage/<?php echo $product->image1; ?>">
								 <div class="thumb-image"> <img src="upload/itemimage/thumbs/<?php echo $product->image1; ?>" data-imagezoom="true" class="img-responsive"> </div>
							</li>
							<?php }
							if($product->image2!=""){ ?>
							<li data-thumb="upload/itemimage/<?php echo $product->image2; ?>">
							   <div class="thumb-image"> <img src="upload/itemimage/thumbs/<?php echo $product->image2; ?>" data-imagezoom="true" class="img-responsive"> </div>
							</li> 
							<?php } ?>
						</ul>
					</div>
					<!-- flixslider -->
						<script defer src="js/jquery.flexslider.js"></script>
						<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
						<script>
						// Can also be used with $(document).ready()
						$(window).load(function() {
						  $('.flexslider').flexslider({
							animation: "slide",
							controlNav: "thumbnails"
						  });
						});
						</script>
					<!-- flixslider -->
				</div>
				<div class="col-md-7 single-right-left simpleCart_shelfItem animated wow slideInRight" data-wow-delay=".5s">
					<h3><?php echo $product->product_name; ?></h3>
					<?php if($product->price!=0){ ?>
					<h4><span class="item_price"><?php echo $product->price; ?></span></h4>
					<?php } ?>
				<!--	<div class="rating1">
						<span class="starRating">
							<input id="rating5" type="radio" name="rating" value="5">
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3" checked>
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1">
							<label for="rating1">1</label>
						</span>
					</div>-->
					<div class="description">
						<h5><i>Highlights</i></h5>
						<?php $sql=$highlight->selectByProduct($product_id); 
            while($row=mysqli_fetch_array($sql)){ ?>
						<p><?php echo $row['highlight_caption']; ?></p>
			<?php } ?>
					</div>
					<!--<div class="color-quality">
						<div class="color-quality-left">
							<h5>Color : </h5>
							<ul>
								<li><a href="#"><span></span>Red</a></li>
								<li><a href="#" class="brown"><span></span>Yellow</a></li>
								<li><a href="#" class="purple"><span></span>Purple</a></li>
								<li><a href="#" class="gray"><span></span>Violet</a></li>
							</ul>
						</div>
						<div class="color-quality-right">
							<h5>Quality :</h5>
							<select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
								<option value="null">5 Qty</option>
								<option value="null">6 Qty</option> 
								<option value="null">7 Qty</option>					
								<option value="null">10 Qty</option>								
							</select>
						</div>
						<div class="clearfix"> </div>
					</div> -->
					<div class="occasional">
						<?php $shop_id=$product->shop_id;
							  $shop->selectShopname($shop_id); //fetch shop name by shop id 
							?>
						<p><b>Offered by</b> <a href="voyabe-shops.php?shop_id=<?php echo $shop_id; ?>" class="clickme danger"> <?php echo $shop->shop_name; ?></a></p>
						
						
					
						
						
						
						<div class="clearfix"> </div>
					</div> 
					<div class="occasion-cart">
						<!--<a class="item_add" href="#"></a> -->
					</div>
					
				<!--	<div class="social">
						<div class="social-left">
							<p>Share On :</p>
						</div>
						<div class="social-right">
							<ul class="social-icons">
								<li><a href="#" class="facebook"></a></li>
								<li><a href="#" class="twitter"></a></li>
								<li><a href="#" class="g"></a></li>
								<li><a href="#" class="instagram"></a></li>
							</ul>
						</div>
						<div class="clearfix"> </div>
					</div> -->
				</div>
				<div class="clearfix"> </div>
				<div class="bootstrap-tab animated wow slideInUp" data-wow-delay=".5s">
					<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
						<ul id="myTab" class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Description</a></li>
							<!-- <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Product Reviews</a></li> -->
							
							
						</ul>
						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active bootstrap-tab-text" id="home" aria-labelledby="home-tab">
							
								<p><?php echo $product->description; ?></p>
							</div>
							<div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="profile" aria-labelledby="profile-tab">
								<div class="bootstrap-tab-text-grids">
									<div class="bootstrap-tab-text-grid">
										<!--<div class="bootstrap-tab-text-grid-left">
											<img src="images/4.png" alt=" " class="img-responsive" />
										</div> -->
										<div class="bootstrap-tab-text-grid-right">
											<ul>
												<li><a href="#">Anil</a></li>
												<li><a href="#"><span class="glyphicon glyphicon-share" aria-hidden="true"></span>Reply</a></li>
											</ul>
											<p>Good product</p>
										</div>
										<div class="clearfix"> </div>
									</div>
									<div class="bootstrap-tab-text-grid">
										<!--<div class="bootstrap-tab-text-grid-left">
											<img src="images/5.png" alt=" " class="img-responsive" />
										</div> -->
										<div class="bootstrap-tab-text-grid-right">
											<ul>
												<li><a href="#">Geetha</a></li>
												<li><a href="#"><span class="glyphicon glyphicon-share" aria-hidden="true"></span>Reply</a></li>
											</ul>
											<p>Good product</p>
										</div>
										<div class="clearfix"> </div>
									</div>
									<div class="add-review">
										<h4>add a review</h4>
										<form>
											<input type="text" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
											<input type="email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
											<input type="text" value="Subject" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Subject';}" required="">
											<textarea type="text"  onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
											<input type="submit" value="Send" >
										</form>
									</div>
								</div>
							</div>
								
							<div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="dropdown1" aria-labelledby="dropdown1-tab">
								<p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
							</div>
							<div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="dropdown2" aria-labelledby="dropdown2-tab">
								<p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //single -->
<!-- single-related-products -->
	<div class="single-related-products">
		<div class="container">
			<h3 class="animated wow slideInUp" data-wow-delay=".5s">Similar</h3>
			

			<p class="est animated wow slideInUp" data-wow-delay=".5s"></p>
			<div class="new-collections-grids">
			<?php $product->selectDetailsById($product_id);
				  $cat_id=$product->category_id;
                  $sql1=$product->selectByCategor($cat_id,$product_id);
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
								<a href="product-details.php?p_id=<?php  echo $row1['product_id']; ?>">EXPLORE</a>
							</div>
							<div class="new-collections-grid1-right">
							
							</div>
						</div>
						<h4><a href="single.html"><?php  echo $row1['product_name']; ?></a></h4>
						<!--	<div class="rating">
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
								</div>-->
						<p></p>
						<div class="new-collections-grid1-left simpleCart_shelfItem">
							        <?php  $actual_price=$row1['price'];
$discount=$row1['discount']; 
$selling_price = $actual_price - ($actual_price * ($discount / 100));
if($discount!=0){ ?>
							<p><i>&#x20b9;<?php echo $row1['price']; ?></i> <span class="item_price">&#x20b9;<?php echo $selling_price; ?></span><!--<a class="item_add" href="#">Add to Wishlist </a> --></p>
<?php }else{ if($actual_price!=0) {?>
<p> <span class="item_price">&#x20b9;<?php echo $row1['price']; ?></span><!--<a class="item_add" href="#">Add to Wishlist</a> --></p>
<?php }else{ ?>
<!--<p id="addwish"><a class="item_add" href="#">Add to Wishlist  </a></p> -->
<?php } } ?>
						</div>
					</div>
				</div>
				  <?php } ?>
			
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //single-related-products -->

<?php include_once('footer.php'); ?>
<!-- zooming-effect -->
	<script src="js/imagezoom.js"></script>
<!-- //zooming-effect -->
</body>
</html>