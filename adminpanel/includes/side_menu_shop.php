<?php 
  
  include_once("../../dbclasses/customer_details.php");
  $customer = new Customer_details();
  include_once("../../dbclasses/db_shop.php");
  $shop = new Shop();
  include_once("../../dbclasses/db_products.php");
  $product = new Products();
  $customer->selectbyid($_SESSION['customer_id']); 
?>	
	<!--/sidebar-menu-->
				<div class="sidebar-menu">
					<header class="logo">
					<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="http://www.voyabe.com/"> <span id="logo"> <h1>back to website</h1></span> 
					<!--<img id="logo" src="" alt="Logo"/>--> 
				  </a> 
				</header>
			<div style="border-top:0px solid rgba(69, 74, 84, 0.7)"></div>
			<!--/down-->
							<div class="down">	
									  <a href=""><img src="images/profile.png"></a>
									  <a href=""><span class=" name-caret"><?php echo $customer->name; ?></span></a>
									 <ul>
									<li><a class="tooltips" href="profile.php"><span>Profile</span><i class="lnr lnr-user"></i></a></li>
										<li><a class="tooltips" href="Change_password.php"><span>Settings</span><i class="lnr lnr-cog"></i></a></li>
										<li><a class="tooltips" href="logout.php"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>
										</ul>
									</div>
							   <!--//down-->
                           <div class="menu">
									<ul id="menu" >
										<li><a href="dashboard.php"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
										 <li id="menu-academico" ><a href="#"><i class="fa fa-table"></i> <span>My Shops</span> <span class="fa fa-angle-right" style="float: right"></span></a>
										   <ul id="menu-academico-sub" >
										    <?php $shop_counts = $shop->countAllById($_SESSION['customer_id']);  
										       if($shop_counts==0){ ?>
										      <a href="shops.php">Add New Shop</a>  
										   <?php }else{
										      $shop_details = $shop->selectAllById($_SESSION['customer_id']);  
											while ($row = mysqli_fetch_array($shop_details )) {
											?>
											<li id="menu-academico-avaliacoes" ><a href="shops.php"><?php echo $row['shop_name']; ?></a></li>
											<?php }} ?>
										  </ul>
										</li>
										 <li id="menu-academico" ><a href="#"><i class="fa fa-file-text-o"></i> <span>My Products</span> <span class="fa fa-angle-right" style="float: right"></span></a>
											 <ul id="menu-academico-sub" >
								        <?php $shop_counts = $shop->countAllById($_SESSION['customer_id']);   
								          if($shop_counts==0){ ?>
										      <a href="shops.php">Add New Shop</a>  
										   <?php }else{
										  $shop_details = $shop->selectAllById($_SESSION['customer_id']);
										while ($row = mysqli_fetch_array($shop_details )) {
										?>
							                   <li id="menu-academico-avaliacoes" ><a href="products.php?shop_id=<?php echo $row['shop_id']; ?>"><?php echo $row['shop_name']; ?></a></li>
										<?php } } ?>
											  </ul>
										 </li>
									<li><a href="test.php"><i class="lnr lnr-pencil"></i> <span>Todays Deal</span></a></li>
									<li id="menu-academico" ><a href="test.php"><i class="lnr lnr-book"></i> <span>Advertisement</span></span></a>
									 </li>
									 <li><a href="test.php"><i class="lnr lnr-envelope"></i> <span>Customer Reviews</span></a>
									 </li>
							        
								  </ul>
								</div>
							  </div>