<?php
include_once('dbclasses/db_maincategory.php');
$main   =  new Maincategory();
?>

<!-- footer -->
	<div class="footer">
		<div class="container">
		
			<div class="footer-grids">
				<div class="row">
                
                <div class="col-md-6 footer-grid animated wow slideInLeft" data-wow-delay=".6s">
					<h3>Contact Info</h3>
					<ul>
						<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>D-10,Heavenly Plaza, Civil Line Road, Kakkanad.</li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">info@voyabe.com</a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+91 8105394675</li>
					</ul>
				</div>
                
                <div class="col-md-2"></div>
				 <div class="col-md-4 footer-grid animated wow slideInLeft" data-wow-delay=".7s">
					<div class="footer-grid-left">
						<a href="index.php">Home</a>
					</div>
					<div class="footer-grid-left">
						<a href="voyabe-login.php">Login</a>
					</div>
					<div class="footer-grid-left sell">
						<a href="#up">Sell With Us</a>
					</div></br>
					<div class="footer-grid-left">
						<a href="https://www.facebook.com/Voyabe-services-PvtLtd-203939373547591/?modal=admin_todo_tour" title="facebook"><i class="fa fa-facebook-square" style="font-size:25px;color:#FFF"></i></a>
					</div>
					<div class="footer-grid-left">
						<a href="https://twitter.com/ArunSreenivas6"><i class="fa fa-twitter" style="font-size:25px;color:#FFF" title="twitter"></i></a>
					</div>
					<div class="footer-grid-left">
						<a href="https://plus.google.com/114794594330593370714"><i class="fa fa-google-plus" style="font-size:25px;color:#FFF" title="google plus"></i></a>
					</div>
					<div class="clearfix"> </div>
                    
                    
                   
				</div>
				</div>
                
                
			</div>
			
            <div class="footertext">
                <a></a><h4 style"color:#FFF;">Voyabe Top Categories</h4></a>
             						<?php 
									$sql=$main->selectall();
									while($row=mysqli_fetch_array($sql)){ 
                                 	?>
           								 <a  href="product-categories.php?main_cat_id=<?php  echo $row['maincategory_id']; ?>" onClick="window.location.href = 'product-categories.php?main_cat_id=<?php  echo $row['maincategory_id']; ?>'; return true;"> <?php echo $row['maincategory_name']; ?> ||</a> 
            						<?php
									 }
									?>
            </div>
            
			<div class="footer-logo animated wow slideInUp" data-wow-delay=".5s">
				<h2><a href="index.php">Voyabe<span>The New way of Shopping</span></a></h2>
			</div>
			<div class="copy-right animated wow slideInUp" data-wow-delay=".5s">
				<p>&copy 2018 Voyabe. All rights reserved | Design by <a href="http://preatech.com" target="_blank">Preatech</a></p>
			</div>
		</div>
	</div>
<!-- //footer -->