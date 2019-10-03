<?php
include_once('dbclasses/db_maincategory.php');
$main_cat_obj=new Maincategory();
include_once('dbclasses/db_products.php');
$product=new Products();
include_once('dbclasses/db_category.php');
$cat_obj=new Category();
include_once('dbclasses/db_shop.php');
$shop=new Shop();
$main_cat_id=$_REQUEST['main_cat_id'];
$main_cat_obj->selectid($main_cat_id);

?>
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
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
    

<!-- collections -->
<h1 id="producthead"><center><?php echo $main_cat_obj->maincategory_name;?></center></h1>
<div class="new-collections">

<div class="container-fluid">
				<?php 
				$sql= $cat_obj->selectbymaincat($main_cat_id);//fetch image in asc
				while($row = mysqli_fetch_array($sql)){
					 $cat_id = $row['category_id'];
					 $name=$category_obj->selectnameByid($cat_id);
					  $sql1=$product->selectProductsByCat($cat_id);
					  $num_rows = mysqli_num_rows($sql1);
						 $num_rows=$product->database->db_countRows($sql1);
						   if($num_rows!=0 ){
				?>
	<div class="row" style="margin-bottom:5px;">
		<div class="MultiCarousel carousel-items" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
	
		<h2 id="producthead"><?php echo $name; ?></h2>
		
		<a class="productlink"  href="" onClick="window.location.href = 'voyabe-products.php?category_id=<?php  echo $cat_id; ?>'; return true;" ><font color="#0079df">View All</font></a>

            <div class="MultiCarousel-inner">
			<?php
				 while($row1=mysqli_fetch_array($sql1)){
				?>
			
                <div class="item">
                    <div class="pad15 rowitem">
					
					 <div class="hovereffect">
        <img class="img-responsive" src="upload/itemimage/<?php  echo $row1['main_image']; ?>" alt="">
		  <p><font color="#cc0000" style="font-family:Decorative; size:20;"><?php echo $row1['product_name']; ?></font></p>
			  <p><font color="#0079df" style="text-transform:uppercase"><?php $shop->selectShopname($row1['shop_id']);echo $shop->shop_name; ?></font></p>			
				
        <div class="overlay">
           
           <a class="info" onClick="window.location.href ='product-details.php?p_id=<?php  echo $row1['product_id']; ?>'; return true;" href="product-details.php?p_id=<?php  echo $row1['product_id']; ?>">Explore</a>
        </div>
    </div>            
                    </div>
                </div>
				 <?php } ?>
				
            </div>
			
			<button class="btn btn-primary leftLst"><</button>
            <button class="btn btn-primary rightLst">></button>
        </div>
		
	</div>
					  <?php } } ?>
</div>
</div>



<!-- //banner-bottom -->
   

<!-- new-timer -->

<!-- //new-timer 
<!-- collections-bottom -->
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


            if (bodyWidth >= 1100) {
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