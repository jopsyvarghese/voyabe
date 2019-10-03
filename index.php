<?php
include_once('dbclasses/db_products.php');
$product=new Products();
include_once('dbclasses/db_shop.php');
$shop=new Shop();
include_once('dbclasses/db-advertisment.php');
$advertisment=new advertisment();
?>

<!-- header -->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Best Offers,Local Search,Shops near me,online shopping site - Voyabe</title>
<!-- for-mobile-apps -->
<meta name="p:domain_verify" content="3d8126fccd73471c07393a9a39d68d0a"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Best shops and offers near me,deals online,local business,services,grocery,moblies,household supplies,automobiles,online shopping site in Kerala,Bangalore and other places in India.">
<meta name="Description" content=" Voyabe,the new way of shopping is an online information providing platform for mobiles,automobiles,fashion,household applience,organic products,Restaurants,Bakery,Electronics and more in India.Voyabe displays products and services with best offers near you."/>
	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script > addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
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
<script  src="js/bootstrap-3.1.1.min.js"></script>
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
<style>
.header {
  padding:3px;
  background: white;
  color: #f1f1f1;
}
</style><link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
.MultiCarousel { float: left; overflow: hidden; padding: 1px; width: 100%; position:relative; }
    .MultiCarousel .MultiCarousel-inner { transition: 1s ease all; float: left; }
        .MultiCarousel .MultiCarousel-inner .item { float: left;}
        .MultiCarousel .MultiCarousel-inner .item > div { text-align: center; padding:10px; margin:5px; background:#FFFFFF; color:#666;}
    .MultiCarousel .leftLst, .MultiCarousel .rightLst { position:absolute; border-radius:50%;top:calc(50% - 20px); }
    .MultiCarousel .leftLst { left:0; }
    .MultiCarousel .rightLst { right:0; }
    
        .MultiCarousel .leftLst.over, .MultiCarousel .rightLst.over { pointer-events: none; background:#ccc; }
</style>
<?php include_once('header.php'); ?>
</head>

	
<body>
<div class="container-fluid" style="padding-left: 0px;padding-right:0px;margin-top:10px;">
     <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
       <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
   
     
      <div class="item">
       <a href="https://www.voyabe.com/voyabe-shops.php?shop_id=123"><img src="images/AUTO-BANNER1.jpg" alt="" style="width:100%;"></a>
      </div>

      <div class="item">
       <a href="https://www.voyabe.com/voyabe-shops.php?shop_id=78"> <img src="images/car-wash.jpg" alt="" style="width:100%;"></a>
      </div>
      
      <div class="item active">
      <a href="https://www.voyabe.com/voyabe-shops.php?shop_id=131"> <img src="images/pattaya.jpg" alt="" style="width:100%;"></a>
      </div>
      
      <div class="item">
       <a href="https://voyabe.com/voyabe-shops.php?shop_id=117"> <img src="images/big-banner.jpg" alt="" style="width:100%;"></a>
      </div>
    
      <div class="item">
      <a href="https://www.voyabe.com/voyabe-shops.php?shop_id=93"> <img src="images/sunitha gold.jpg" alt="" style="width:100%;"></a>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
    
<!-- //banner -->
	<div class="banner-bottom">
		<div class="container"> 
                     <div class="col-md-12">
			<div class="banner-bottom-grids">
			 
                  
			<div class="banner-bottom-grid-left animated wow slideInLeft" data-wow-delay=".5s">
				<div class="banner-bottom-grid-left-grid1">
				
							<a href="https://voyabe.com/voyabe-shops.php?shop_id=212"><img src="images/Optic Gallery.png" alt="ayarin gold and diamonds" class="img-responsive" /></a>
						</div>
							<div class="banner-bottom-grid-left-grid1">
							<a href="https://www.voyabe.com/voyabe-shops.php?shop_id=223"><img src="images/Mummys kitchenn.png" alt="mummys kitchen" class="img-responsive" /></a>
						</div>
						
					</div>
				<div class="banner-bottom-grid-left1 animated wow slideInUp" data-wow-delay=".5s">
					<div class="banner-bottom-grid-left-grid1">
							<a href="http://preatech.com/"><img src="images/preatech banner.png" alt="preatech" class="img-responsive" /></a>
						</div>
						
				
					<div class="banner-bottom-grid-left-grid1">
							<a href="https://voyabe.com/voyabe-shops.php?shop_id=226"><img src="images/DJ Krins banner.png" alt="dj krins" class="img-responsive" /></a>
						</div>
						
					
				</div>
			
				   <div class="banner-bottom-grid-right animated wow slideInRight" data-wow-delay=".5s">
				<div class="banner-bottom-grid-left-grid1">
				
							<a href="https://voyabe.com/voyabe-shops.php?shop_id=233"><img src="images//Ammas Bakers.png" alt="ammas bakery" class="img-responsive" /></a>
						</div>
							<div class="banner-bottom-grid-left-grid1">
							<a href="https://voyabe.com/voyabe-shops.php?shop_id=250"><img src="images/Cochin drivers & travels.png" alt="kottaram organic products" class="img-responsive" /></a>
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
    <h1 style="font-family:'Lato', sans-serif;; color: #FFFFFF;" align="center" >Best Deals</h1>
    <h2 align="center">Best offers on product and Services</h2><br>
<div class="container-fluid">
	<div class="row" style="margin-bottom:5px;">
			<?php 
            $sql=$product->selectdistinctProducts1();//fetch image in asc
			$row=mysqli_fetch_array($sql);
			 $main_cat_id=$row['maincategory_id'];
			if (count($row)) {?>
		<div class="MultiCarousel carousel-items"  data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
	
			
		<h2 id="producthead">Best on Mobiles</h2>
		
        <a  href="" class="productlink" onClick="window.location.href = 'product-categories.php?main_cat_id=<?php  echo $main_cat_id; ?>'; return true;" ><font color="#0079df">View All</font></a>
        
            <div class="MultiCarousel-inner">
			
			
				<?php	
				$i=1;
              	while($row=mysqli_fetch_array($sql)){
				  $main_cat_id=$row['maincategory_id'];
				  $i++;
              	?>
                <div class="item">
                    <div class="pad15 rowitem">
					
					 <div class="hovereffect">
        <img class="img-responsive" src="upload/itemimage/<?php  echo $row['main_image']; ?>" alt="mobile series<?php echo $i; ?>">
		  <p><font color="#cc0000" style="font-family:Decorative; size:20;"><?php echo $row['product_name']; ?></font></p>
			  <p><font color="#0079df" style="text-transform:uppercase"><?php $shop->selectShopname($row['shop_id']);echo $shop->shop_name; ?></font></p>			
				
        <div class="overlay">
           
           <a class="info" onClick="window.location.href = 'product-details.php?p_id=<?php  echo $row['product_id']; ?>'; return true;" href="product-details.php?p_id=<?php  echo $row['product_id']; ?>">Explore</a>
        </div>
    </div>
				  
                        
                    </div>
                </div>
				
				<?php
				}
				?>
            </div>
			
			<button class="btn btn-primary leftLst"><</button>
            <button class="btn btn-primary rightLst">></button>
        </div>
		
	</div>
	<?php
	}
	?>
	
		<div class="row" style="margin-bottom:5px;">
	
		<div class="MultiCarousel carousel-items" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
		<?php 
		$sql = $product->selectdistinctProducts2();//fetch image in asc
		$row = mysqli_fetch_array($sql);
		 $main_cat_id=$row['maincategory_id'];
		if (count($row)) {?>
		
		<h2 id="producthead">Automobiles</h2>
			
            <a  href="" class="productlink" onClick="window.location.href = 'product-categories.php?main_cat_id=<?php  echo $main_cat_id; ?>'; return true;" ><font color="#0079df">View All</font></a>
            
            <div class="MultiCarousel-inner">
			
			
			<?php
              while($row=mysqli_fetch_array($sql)){
				 $main_cat_id=$row['maincategory_id'];
              ?>
                <div class="item">
                    <div class="pad15 rowitem">
					
					 <div class="hovereffect">
        <img class="img-responsive" src="upload/itemimage/<?php  echo $row['main_image']; ?>" alt="voyabe automobile<?php echo $i; ?>">
		  <p><font color="#cc0000" style="font-family:Decorative; size:20;"><?php echo $row['product_name']; ?></font></p>
			  <p><font color="#0079df" style="text-transform:uppercase"><?php $shop->selectShopname($row['shop_id']);echo $shop->shop_name; ?></font></p>			
				
         <div class="overlay">
           
           <a class="info" onClick="window.location.href = 'product-details.php?p_id=<?php  echo $row['product_id']; ?>'; return true;" href="product-details.php?p_id=<?php  echo $row['product_id']; ?>">Explore</a>
        </div>
    </div>
				  
                        
                    </div>
                </div>
				
				<?php
				}
				?>
            </div>
			
			<button class="btn btn-primary leftLst"><</button>
            <button class="btn btn-primary rightLst">></button>
        </div>
		
	</div>
	<?php
		}
	?>
	
    
   <!-------------------------------------------------------------------------->
 <!--	<div class="row" style="margin-top:5px;margin-bottom:5px;">
	 <div id="myCarousel1" class="carousel slide" data-ride="carousel">
    

    <!-- Wrapper for slides -->
    <!-- <div class="carousel-inner" >

      <div class="item active">
	  
        <img src="images/adv/SJR stores bannerrrr.png"  style="width:100%;height:220px;">
        <div class="carousel-caption">
        
        </div>
      </div>

      <div class="item">
         <img src="images/adv/universal mobiles.png"  style="width:100%;height:220px;">
        <div class="carousel-caption">
          
        </div>
      </div>
    
    
    </div> -->

    <!-- Left and right controls -->
    <!-- <a class="left carousel-control" href="#myCarousel1" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel1" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
	
	
	
	
	
	</div> -->
	<!---------------------------------------------------------------------------------->
	
		<div class="row" style="margin-bottom:5px;">
	
		<div class="MultiCarousel carousel-items" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
		<?php 
		$sql=$product->selectdistinctProducts3();//fetch image in asc
		$row = mysqli_fetch_array($sql);
		$main_cat_id=$row['maincategory_id'];
		if (count($row)) {?>
		<h2 id="producthead">Home,Kitchen & Pets</h2>
		
        <a  href="" class="productlink" onClick="window.location.href = 'product-categories.php?main_cat_id=<?php  echo $main_cat_id; ?>'; return true;" ><font color="#0079df">View All</font></a>
        
            <div class="MultiCarousel-inner">
			
			
			<?php
              while($row=mysqli_fetch_array($sql)){
				$main_cat_id=$row['maincategory_id'];
              ?>
                <div class="item">
                    <div class="pad15 rowitem">
					
					 <div class="hovereffect">
        <img class="img-responsive" src="upload/itemimage/<?php  echo $row['main_image']; ?>" alt="voyabe household supplies<?php echo $i; ?>">
		  <p><font color="#cc0000" style="font-family:Decorative; size:20;"><?php echo $row['product_name']; ?></font></p>
			  <p><font color="#0079df" style="text-transform:uppercase"><?php $shop->selectShopname($row['shop_id']);echo $shop->shop_name; ?></font></p>			
				
        <div class="overlay">
           
           <a class="info" onClick="window.location.href = 'product-details.php?p_id=<?php  echo $row['product_id']; ?>'; return true;" href="product-details.php?p_id=<?php  echo $row['product_id']; ?>">Explore</a>
        </div>
    </div>
				  
                        
                    </div>
                </div>
				
				<?php
				}
				?>
            </div>
			
			<button class="btn btn-primary leftLst"><</button>
            <button class="btn btn-primary rightLst">></button>
        </div>
		
	</div>
	
	<?php
	}
	?>
		<div class="row" style="margin-bottom:5px;">
	
		<div class="MultiCarousel carousel-items" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
		<?php 
		$sql = $product->selectdistinctProducts4();//fetch image in asc
		$row = mysqli_fetch_array($sql);
		$main_cat_id=$row['maincategory_id'];
		if (count($row)) {?>
		<h2 id="producthead">Restaurants & Bakery</h2>
		
        <a class="productlink"  href="" onClick="window.location.href = 'product-categories.php?main_cat_id=<?php  echo $main_cat_id; ?>'; return true;" ><font color="#0079df">View All</font></a>
        
            <div class="MultiCarousel-inner">
			<?php
              while($row=mysqli_fetch_array($sql)){
				  $main_cat_id=$row['maincategory_id'];
              ?>
                <div class="item">
                    <div class="pad15 rowitem">
					
					 <div class="hovereffect">
        <img class="img-responsive" src="upload/itemimage/<?php  echo $row['main_image']; ?>" alt="voyabe restaurents and bakery<?php echo $i; ?>">
		  <p><font color="#cc0000" style="font-family:Decorative; size:20;"><?php echo $row['product_name']; ?></font></p>
			  <p><font color="#0079df" style="text-transform:uppercase"><?php $shop->selectShopname($row['shop_id']);echo $shop->shop_name; ?></font></p>			
				
        <div class="overlay">
           
           <a class="info"  onclick="window.location.href = 'product-details.php?p_id=<?php  echo $row['product_id']; ?>'; return true;" href="product-details.php?p_id=<?php  echo $row['product_id']; ?>">Explore</a>
        </div>
    </div>
				  
                        
                    </div>
                </div>
				
				<?php
				}
				?>
            </div>
			
			<button class="btn btn-primary leftLst"><</button>
            <button class="btn btn-primary rightLst">></button>
        </div>
		
	</div>
	
<?php
	}
?>


 <!-------------------------------------------------------------------------->
<!--	<div class="row" style="margin-top:5px;margin-bottom:5px;"> -->
<!-- <div id="myCarousel2" class="carousel slide" data-ride="carousel"> -->
    

    <!-- Wrapper for slides -->
   <!-- <div class="carousel-inner" >

         <div class="item">
         <img src="images/big-banner.jpg"  style="width:100%;height:220px;">
        <div class="carousel-caption">
          
        </div>
      </div>
    
      <div class="item">
        <img src="images/banner-gold.jpg"  style="width:100%;height:220px;">
        <div class="carousel-caption">
          
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
     <!--<a class="left carousel-control" href="#myCarousel2" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel2" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
	
	
	
	
	
	</div>
	<!---------------------------------------------------------------------------------->
	
	
		<div class="row">
	
		<div class="MultiCarousel carousel-items" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
	<?php 
	$sql=$product->selectdistinctProducts5();//fetch image in asc
		$row = mysqli_fetch_array($sql);
	 	$main_cat_id=$row['maincategory_id'];
		if (count($row)) {?>
		<h2 id="producthead">Anything On Hire</h2>
        
		<a class="productlink"  href="" onClick="window.location.href = 'product-categories.php?main_cat_id=<?php  echo $main_cat_id; ?>'; return true;" ><font color="#0079df">View All</font></a>
        
            <div class="MultiCarousel-inner">
			
			
			<?php
              while($row=mysqli_fetch_array($sql)){
				  $main_cat_id=$row['maincategory_id'];
              ?>
                <div class="item">
                    <div class="pad15 rowitem">
					
					 <div class="hovereffect">
        <img class="img-responsive" src="upload/itemimage/<?php  echo $row['main_image']; ?>" alt="voyabe organic products<?php echo $i; ?>">
		  <p><font color="#cc0000" style="font-family:Decorative; size:20;"><?php echo $row['product_name']; ?></font></p>
			  <p><font color="#0079df" style="text-transform:uppercase"><?php $shop->selectShopname($row['shop_id']);echo $shop->shop_name; ?></font></p>			
				
        <div class="overlay">
           
           <a class="info" onClick="window.location.href = 'product-details.php?p_id=<?php  echo $row['product_id']; ?>'; return true;" href="product-details.php?p_id=<?php  echo $row['product_id']; ?>">Explore</a>
        </div>
    </div>
				  
                        
                    </div>
                </div>
				
				<?php
				}
				?>
            </div>
			
			<button class="btn btn-primary leftLst"><</button>
            <button class="btn btn-primary rightLst">></button>
        </div>
		
	</div>
		
	
<?php
}
?>

	
</div>
</div>



<!-- //banner-bottom -->
   

<!-- new-timer -->

<!-- //new-timer 
<!-- collections-bottom -
	<div class="collections-bottom">
		<div class="container">
			<div class="newsletter animated wow slideInUp" data-wow-delay=".5s">
				<h3>Want to Sell with us</h3>
				<p>Fill up the details. We will get back to you in 24 hours</p>
				<form action="enquiry.php">
				    <input type="text"  name="name" placeholder="Enter your name" required>
					<input type="text"  name="mobile" placeholder="Enter your mobile" required>
					<input type="text"  name="email" placeholder="Enter your email" required>
				    <input type="submit" value="Join Us" >
					</form>
			</div>
		</div>
	</div>-->
    
    <div class="collections-bottom">
		<div class="container">
			<div class="newsletter animated wow slideInUp collection-bottom-form well" data-wow-delay=".5s">
				<h3>Want to Sell with us</h3>
				<p>Fill up the details. We will get back to you in 24 hours</p>
				<div class="row" style="margin: 30px;">
					<div class="col-sm-2"></div>
					<div class="col-sm-3">
								<form action="enquiry.php">
									<input type="text" class="collection-input" name="name" placeholder="Enter your name" required>
					</div>
					<div class="col-sm-3">
									<input type="text" class="collection-input"  name="mobile" placeholder="Enter your mobile" required>
					</div>
					<div class="col-sm-3">
									<input type="text" class="collection-input"  name="email" placeholder="Enter your email" required>
					</div>
					<div class="col-sm-1"></div>			
					
				</div>
						<input type="submit" style="border-radius: 25px;" value="Join Us" >
								</form>
			
		</div>
	</div>
</div>

<!-- //collections-bottom -->
<?php include_once('footer.php'); ?>

</body>
</html>
<script>
$(document).ready(function () {
    var itemsMainDiv = ('.MultiCarousel');
    var itemsDiv = ('.MultiCarousel-inner');
    var itemWidth = "";

    $('.leftLst, .rightLst').click(function () {
        var condition = $(this).hasClass("leftLst");
        if (condition)
            click(0, this);
        else
            click(1, this)
    });

    ResCarouselSize();




    $(window).resize(function () {
        ResCarouselSize();
    });

    //this function define the size of the items
    function ResCarouselSize() {
        var incno = 0;
        var dataItems = ("data-items");
        var itemClass = ('.item');
        var id = 0;
        var btnParentSb = '';
        var itemsSplit = '';
        var sampwidth = $(itemsMainDiv).width();
        var bodyWidth = $('body').width();
        $(itemsDiv).each(function () {
            id = id + 1;
            var itemNumbers = $(this).find(itemClass).length;
            btnParentSb = $(this).parent().attr(dataItems);
            itemsSplit = btnParentSb.split(',');
            $(this).parent().attr("id", "MultiCarousel" + id);


            if (bodyWidth >= 1000) {
                incno = itemsSplit[3];
                itemWidth = sampwidth / incno;
            }
            else if (bodyWidth >= 992) {
                incno = itemsSplit[2];
                itemWidth = sampwidth / incno;
            }
            else if (bodyWidth >= 768) {
                incno = itemsSplit[1];
                itemWidth = sampwidth / incno;
            }
            else {
                incno = itemsSplit[0];
                itemWidth = sampwidth / incno;
            }
            $(this).css({ 'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers });
            $(this).find(itemClass).each(function () {
                $(this).outerWidth(itemWidth);
            });

            $(".leftLst").addClass("over");
            $(".rightLst").removeClass("over");

        });
    }


    //this function used to move the items
    function ResCarousel(e, el, s) {
        var leftBtn = ('.leftLst');
        var rightBtn = ('.rightLst');
        var translateXval = '';
        var divStyle = $(el + ' ' + itemsDiv).css('transform');
        var values = divStyle.match(/-?[\d\.]+/g);
        var xds = Math.abs(values[4]);
        if (e == 0) {
            translateXval = parseInt(xds) - parseInt(itemWidth * s);
            $(el + ' ' + rightBtn).removeClass("over");

            if (translateXval <= itemWidth / 2) {
                translateXval = 0;
                $(el + ' ' + leftBtn).addClass("over");
            }
        }
        else if (e == 1) {
            var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
            translateXval = parseInt(xds) + parseInt(itemWidth * s);
            $(el + ' ' + leftBtn).removeClass("over");

            if (translateXval >= itemsCondition - itemWidth / 2) {
                translateXval = itemsCondition;
                $(el + ' ' + rightBtn).addClass("over");
            }
        }
        $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
    }

    //It is used to get some elements from btn
    function click(ell, ee) {
        var Parent = "#" + $(ee).parent().attr("id");
        var slide = $(Parent).attr("data-slide");
        ResCarousel(ell, Parent, slide);
    }

});
</script>