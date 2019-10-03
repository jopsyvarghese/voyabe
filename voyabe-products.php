<?php 
include('dbclasses/db_products.php');
$product=new Products();
include_once('dbclasses/db_shop.php');
$shop=new Shop();
include_once('dbclasses/db_maincategory.php');
$main=new Maincategory();
include_once('dbclasses/db_sub_category.php');
$sub=new Sub_Category();
include_once('dbclasses/db_category.php');
$cat_obj=new Category();
$cat_id=$_REQUEST['category_id'];
$cat_obj->selectById($cat_id);
$main->selectid($cat_obj->maincategory_id);
const PRODUCT_COUNT_PAGE = 9;
$link = $product->database->getLink();
?>
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

<style>
    .txtoverflow {
        white-space: nowrap;
        width: 180px;
        overflow: hidden;
        font-size:0.5em;
        text-overflow: "....";
    }
</style>
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
				<li class="active"><?php echo $main->maincategory_name; ?></li>
				<li class="active"><?php echo $cat_obj->category_name; ?></li>
				
				
			</ol>
		</div>
	</div>
	<div class="products">
		<div class="container">
			
				<div class="products-right-grids-bottom">

                    <!--Product listing starts-->
                    <?php
                    if(isset($_GET['page'])){
                        $page = $_GET['page'];
                        $pageNo = ($page*PRODUCT_COUNT_PAGE) - PRODUCT_COUNT_PAGE;
                    }else{
                        $pageNo = 0;
                        $page = 1;
                    }
                    $result = $product->selectProductsByCatPagination($cat_id,$pageNo,PRODUCT_COUNT_PAGE);
					$flag=0;
                    while($row=mysqli_fetch_array($result)){
								$flag=1;?>
                        <div class="col-md-4">
						<div class="new-collections-grid1 products-right-grid1 animated wow slideInUp" data-wow-delay=".5s" style="height:400px;">
							<div class="new-collections-grid1-image">
								<div style="height: 160px;width:100%;">
								<?php if($row['main_image']!=""){ ?>
                                   
								   <a href="product_view.php?p_id=<?php  echo $row['product_id']; ?>" class="product-image"><img style="height:160px;" src="<?php echo 'upload/itemimage/'.$row['main_image'];?>" alt="image" class="img-responsive"></a>
                                <?php }else { ?>
								<a href="product_view.php?p_id=<?php  echo $row['product_id']; ?>" class="product-image"><img style="height:160px;" src="images/camera.png" alt="image" class="img-responsive"></a>
								<?php } ?>
								</div>
								<div class="new-collections-grid1-image-pos products-right-grids-pos">
									<a href="product-details.php?p_id=<?php  echo $row['product_id']; ?>">Explore</a>
								</div>
								<div class="new-collections-grid1-right products-right-grids-pos-right">
								
								</div>
							</div>
							<h4><a href=""><?php echo $row["product_name"];?></a></h4>
								Offered By:<h4><a href="voyabe-shops.php?shop_id=<?php echo $row['shop_id']; ?>" ><font color="#0079df"><?php $shop->selectShopname($row['shop_id']);echo $shop->shop_name; ?></font></a></h4>
								<div class="rating">
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
								</div>
							<div class="simpleCart_shelfItem products-right-grid1-add-cart">
                                     	
                   <?php  $actual_price=$row['price'];
$discount=$row['discount']; 
$selling_price = $actual_price - ($actual_price * ($discount / 100));
if($discount!=0){ ?>
							<p<a class="item_add" href="#"></a>><i >&#2352;&nbsp;<?php echo $row['price']; ?></i> <span class="item_price">&#2352;&nbsp;<?php echo $selling_price; ?></span></p>
<?php }else{ if($actual_price!=0) {?>
<p> <a class="item_add" href="#"></a><span class="item_price">&#2352;&nbsp;<?php echo $row['price']; ?></span></p>
<?php }else{ ?>
<p id="addwish"><a class="item_add" href="#"> </a></p>
<?php } } ?>
                             
							</div>
						</div>
					</div>
                    <?php } ?>
                    <!--Product listing starts-->

                    <div class="clearfix"> </div>
				</div>
				<nav class="numbering animated wow slideInRight" data-wow-delay=".5s">
				  <ul class="pagination paging">
                      <?php

                        $productCount = $product->selectProductsCountByCat($cat_id);
                        if($row = mysqli_fetch_array($productCount)){
                            $count = $row[0];
                            $pageNumber = ceil($count/PRODUCT_COUNT_PAGE);
                        }
                        if($pageNumber>1){
                            ?>
                        <li>
                            <a href="products.php?category_id=<?php echo $cat_id;?>&page=<?php if($page>1)echo $page-1;else echo $page; ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                            <?php
                            for($i=1;$i<=$pageNumber;$i++){
                                ?>
                                <li class="<?php if($page==$i) echo 'active'; ?>"><a href="products.php?category_id=<?php echo $cat_id;?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                      <?php
                            }
                            ?>
                        <li>
                            <a href="products.php?category_id=<?php echo $cat_id;?>&page=<?php if($page>=$pageNumber)echo $page;else echo $page+1; ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    <?php
                        } 
                      ?>
					
				  </ul>
				</nav>
				<?php if($flag==0){
							echo "Sorry No item found,come back later.<br> As we are working hard to add more products and services";
						} ?>
			</div>
			
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- footer -->
	<?php include('footer.php'); ?>		
	
<!-- //footer -->
</body>
</html>