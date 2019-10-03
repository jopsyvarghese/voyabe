<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$lat = isset($_SESSION["lat"]) ? $_SESSION["lat"] : "";
$long = isset($_SESSION["long"]) ? $_SESSION["long"] : "";
include_once('dbclasses/db_category.php');
include_once('dbclasses/db_maincategory.php');
$main=new Maincategory();
$category_obj=new Category(); 
?>
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
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>

<div class="header" id="myHeader">
 
 <div class="logo-nav">
				<div class="logo-nav-left animated wow zoomIn" data-wow-delay=".5s">
					<a class="smallogo" href="index.php" ><img  alt="voyabe logo" src="images/voyabe.png"   /></a>
				</div>
 </div>
 
 <div class="container-fluid" style="background-color:#4295f4;margin-top:10px;">
 
				<div class="logo-nav-left1">
					<nav class="navbar navbar-default">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header nav_2">
						<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div> 
					<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
						<ul class="nav navbar-nav">
							<li class="active"><a href="index.php" class="act">Home</a></li>	
							<!-- Mega Menu -->
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Category<b class="caret"></b></a>
								<ul class="dropdown-menu multi-column columns-3">
								     <?php $sql=$main->selectall();
									 $i=1;
									while($row=mysqli_fetch_array($sql)){ 
									 if($i<=3) {
									  $i++;
                                 ?>
								 <div class="row" style="padding:15px;">
									<div class="col-sm-4" >
											<ul class="multi-column-dropdown">
												<h6><?php echo $row['maincategory_name']; ?></h6>
												<?php $sql1=$category_obj->selectbymaincat($row['maincategory_id']); 
												while($row1=mysqli_fetch_array($sql1)){   ?>
												<li><a href="voyabe-products.php?category_id=<?php echo $row1['category_id']; ?>"><?php echo $row1['category_name']; ?></a></li>
												<?php } ?>
											</ul>
										</div>
										
										<?php }else{
                                            $i=1;?>
										<div class="clearfix"></div>
									</div>
										  <?php 
                                               }
                                          } ?>
								
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Todays Deal <b class="caret"></b></a>
								<ul class="dropdown-menu multi-column columns-3">
									<div class="row">
										<div class="col-sm-4">
											<ul class="multi-column-dropdown">
												<li>We are working on it!!!</li>
											
											</ul>
										</div>
									
										<div class="col-sm-4">
											<ul class="multi-column-dropdown">
											
										</div>
										<div class="clearfix"></div>
									</div>
								</ul>
							</li>
							
							<li><a href="voyabe-login.php">Login</a></li>

                            <li><a href="setLocation.php">
                                    <?php
                                    if ($lat != "" && $long !="") {
                                        echo $lat . ": " . $long;
                                    } else {
                                        echo "Choose Location";
                                    }
                                    ?><span class="fa fa-map-marker"></span></a></li>
						</ul>
					</div>
					</nav>
				</div>
				

            <!-------------------------------Second header---------------------------------->
           
			
				
					
						<div id="sb-search" class="sb-search">
						
						
							<form method="POST" action="search.php">
								  <datalist  id="categories">
				  
									<?php
									$sresult=$category_obj->selectcatprdall();
									while($row1=mysqli_fetch_array($sresult)){?>
									<option value="<?php echo $row1['category_name'];?>"></option>
									<?php  
									}
									?>				

		                        </datalist>
								<input class="sb-search-input" placeholder="Enter your search term..." list="categories" type="text" name="searchdata" id="searchdata">
								<input class="sb-search-submit" type="submit" >
								<span class="sb-icon-search"> </span>
							</form>
						</div>
					
						<!-- search-scripts -->
						<script src="js/classie.js"></script>
						<script src="js/uisearch.js"></script>
							<script>
								new UISearch( document.getElementById('sb-search' ) );
							</script>
						<!-- //search-scripts -->
					
					
			
				
				
 </div>
           </div> 
            <!-------------------------------Second header---------------------------------->

	
	
	
<!-- //header -->
<script>
window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>