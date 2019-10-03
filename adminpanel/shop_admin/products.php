<?php if(!isset($_SESSION)){
    session_start();
} ?>
 error_reporting( 0 );
<?php
include("../../dbclasses/db_maincategory.php");
include("../../dbclasses/db_category.php");
include("../../dbclasses/db_sub_category.php");
include_once("../includes/common_functions.php");
include_once("../includes/createThumb.php");
include_once("../../dbclasses/db_products.php");
include("../../dbclasses/db_highlights.php");
include("../../dbclasses/db_brand.php");
$brand_obj = new Brand();
$h_obj=new Highlights();
$product_obj = new Products();
$maincat_obj = new Maincategory();
$category = new Category();
$subcat_obj = new Sub_Category();
$CommonClass = new CommonClass();
$highlight_obj = new Highlights();
if(isset($_REQUEST['shop_id'])){
	
	 $shop_id=$_REQUEST['shop_id'];
}
if (isset($_REQUEST['add_edit'])) {
    if (isset($_REQUEST['p_id'])) {
        $product_obj->selectbyproductid($_REQUEST['p_id']);
    }
    if (isset($_REQUEST['add'])) {
       
		
           if(isset($_FILES['main_image']['name'])||$_FILES['main_image']['name']!='')
			{
				$extension = strtolower($CommonClass->getExtension($_FILES['main_image']['name']));
				
				if($extension=='jpg'|| $extension=='jpeg' || $extension=='gif'|| $extension=='png')
				{	$image_name = date('Y-m-d_H-i-s').'_'.$_FILES["main_image"]["name"];
					
					move_uploaded_file($_FILES["main_image"]["tmp_name"],"../../upload/itemimage/".$image_name );
					//CREATE THUMBNAIL
					createThumb("../../upload/itemimage/".$image_name,"../../upload/itemimage/thumbs/",116);
					if(isset($_REQUEST['oldimage1'])){
						unlink("../../upload/itemimage/".$_REQUEST['oldimage']);
						unlink("../../upload/itemimage/thumbs/".$_REQUEST['oldimage']);
					}
					
					$product_obj->setmain_image(trim($image_name));
				}
				else
				{
					$message = 'Invalid image format';
				}
			}else{
				if(isset($_REQUEST['oldmainimage'])){
					$product_obj->setimage1(trim($_REQUEST['oldimage1']));
				}
			
			}
		  if(isset($_FILES['image1']['name'])||$_FILES['image1']['name']!='')
			{
				$extension = strtolower($CommonClass->getExtension($_FILES['image1']['name']));
				
				if($extension=='jpg'|| $extension=='jpeg' || $extension=='gif'|| $extension=='png')
				{	$image_name = date('Y-m-d_H-i-s').'_'.$_FILES["image1"]["name"];
					
					move_uploaded_file($_FILES["image1"]["tmp_name"],"../../upload/itemimage/".$image_name );
					//CREATE THUMBNAIL
					createThumb("../../upload/itemimage/".$image_name,"../../upload/itemimage/thumbs/",116);
					if(isset($_REQUEST['oldimage1'])){
						unlink("../../upload/itemimage/".$_REQUEST['oldimage']);
						unlink("../../upload/itemimage/thumbs/".$_REQUEST['oldimage']);
					}
					
					$product_obj->setimage1(trim($image_name));
				}
				else
				{
					$message = 'Invalid image format';
				}
			}else{
				if(isset($_REQUEST['oldimage1'])){
					$product_obj->setimage1(trim($_REQUEST['oldimage1']));
				}
			
			}
			
			  if(isset($_FILES['image2']['name'])||$_FILES['image2']['name']!='')
			{
				$extension = strtolower($CommonClass->getExtension($_FILES['image2']['name']));
				
				if($extension=='jpg'|| $extension=='jpeg' || $extension=='gif'|| $extension=='png')
				{	$image_name = date('Y-m-d_H-i-s').'_'.$_FILES["image2"]["name"];
					
					move_uploaded_file($_FILES["image2"]["tmp_name"],"../../upload/itemimage/".$image_name );
					//CREATE THUMBNAIL
					createThumb("../../upload/itemimage/".$image_name,"../../upload/itemimage/thumbs/",116);
					if(isset($_REQUEST['oldimage1'])){
						unlink("../../upload/itemimage/".$_REQUEST['oldimage']);
						unlink("../../upload/itemimage/thumbs/".$_REQUEST['oldimage']);
					}
					
					$product_obj->setimage2(trim($image_name));
				}
				else
				{
					$message = 'Invalid image format';
				}
			}else{
				if(isset($_REQUEST['oldimage2'])){
					$product_obj->setimage2(trim($_REQUEST['oldimage2']));
				}
			
			}
		if(isset($_FILES['image3']['name'])||$_FILES['image3']['name']!='')
			{
				$extension = strtolower($CommonClass->getExtension($_FILES['image3']['name']));
				
				if($extension=='jpg'|| $extension=='jpeg' || $extension=='gif'|| $extension=='png')
				{	$image_name = date('Y-m-d_H-i-s').'_'.$_FILES["image3"]["name"];
					
					move_uploaded_file($_FILES["image3"]["tmp_name"],"../../upload/itemimage/".$image_name );
					//CREATE THUMBNAIL
					createThumb("../../upload/itemimage/".$image_name,"../../upload/itemimage/thumbs/",116);
					if(isset($_REQUEST['oldimage1'])){
						unlink("../../upload/itemimage/".$_REQUEST['oldimage']);
						unlink("../../upload/itemimage/thumbs/".$_REQUEST['oldimage']);
					}
					
					$product_obj->setimage3(trim($image_name));
				}
				else
				{
					$message = 'Invalid image format';
				}
			}else{
				if(isset($_REQUEST['oldimage3'])){
					$product_obj->setimage(trim($_REQUEST['oldimage3']));
				}
			
			}
		
        $product_obj->setproduct_name($_REQUEST['product_name']);
        $product_obj->setmaincategory_id($_REQUEST['main_category']);
        $product_obj->setcategory_id($_REQUEST['category_id']);
		if(isset($_REQUEST['sub_cat_id'])){
        $product_obj->setsub_category_id($_REQUEST['sub_cat_id']);
		}
		if(isset($_REQUEST['brand_id'])){
        $product_obj->setbrand_id($_REQUEST['brand_id']);
		}
        $product_obj->setdescription($_REQUEST['description']);
        $product_obj->setprice($_REQUEST['price']);
        $product_obj->setshop_id($_REQUEST['shop_id']);
        $s_id=$_REQUEST['shop_id'];
        
        foreach($_REQUEST['highlights'] as $highlight) {
            $h_obj->setproduct_id($product_id);
            $h_obj->sethighlight_caption($highlight);
            $h_obj->insert();
        }  
       if ($_REQUEST['add'] == 'addproduct') {
	  $product_id = $product_obj->insert();
        }else{
			$product_obj->update($_REQUEST['p_id']);
		}
        unset($_REQUEST['add_edit']);
	echo "<script language=JavaScript>document.location.href='products.php?shop_id='$s_id' </script>";
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
        <!--js -->
        <script src="js/jquery.nicescroll.js"></script>
        
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
		<style>
		.input_fields_wrap{
max-width: 350px;
}
.input_fields_wrap input[type=text]{
 width:100%;
 margin:2px 0;
}
		</style>
    </head> 
    <body>
        <div class="container-fluid">

            <div class="page-container">
                <!--/content-inner-->
                <div class="left-content">
                    <div class="inner-content">
                        <!-- header-starts -->
<?php include('header.php'); ?>
                        <!-- //header-ends -->
                        <!--//outer-wp-->
                        <div class="row" style="height: 100%">
                            <div class="col-sm-12">
                                <div class="outter-wp">
                                    <!--/sub-heard-part-->
                                    <div class="sub-heard-part">
                                        <ol class="breadcrumb m-b-0">
                                            <li><a href="#">Home</a></li>
                                            <li class="active">products</li>
                                        </ol>
                                    </div>	
                                    <!--/sub-heard-part-->	
                                    <!--/tabs-->


                                    <div class="tab-main">
                                        <!--/tabs-inner-->


                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="tab-inner">
<?php if (!isset($_REQUEST['add_edit'])) { ?>
                                                        <div id="tabs" class="tabs">
                                                            <h2 class="inner-tittle">products</h2>
                                                            <div class="graph">
                                                                <nav>

                                                                    <ul>
                                                                        <li><a href="#section-1" class="icon-product"><i class="lnr lnr-briefcase"></i> <span>product</span></a></li>
                                                                       <!-- <li><a href="#" class="icon-cup"><i class="lnr lnr-lighter"></i> <span>Renewal Details</span></a></li>-->
                                                                        <li></li>

                                                                    </ul>
                                                                </nav>
                                                                <div class="content tab">
                                                                    <section id="section-1">
                                                                        <a href="?add_edit=0&shop_id=<?php echo $shop_id; ?>"" class="a_demo_four" >Add New product</a><br><br>
                                                                        <div class="graph">
                                                                            <div class="tables">

                                                                                <table class="table table-bordered"> 
                                                                                    <thead> <tr> 
                                                                                            <th>Sl.No</th> 
                                                                                            <th>product Name</th> 
                                                                                            <th>Price</th> 
																							<th>Operations</th> 
																							</tr> </thead>
                                                                                    <tbody> 
    <?php
    $count = 1;
    $sql = $product_obj->selectByShop($shop_id); //fetch image in asc
    while ($row = mysqli_fetch_array($sql)) {
        ?>	<tr>
                                                                                                <th scope="row"><?php echo $count++; ?></th>
                                                                                                <td><?php echo $row['product_name']; ?></td> 
                                                                                                <td><?php echo $row['price']; ?></td>
																								<td><a href="?add_edit=3&p_id=<?php echo $row['product_id']; ?>" class="a_demo_four" >View</a><a href="?add_edit=1&p_id=<?php echo $row['product_id']; ?>&shop_id=<?php echo $row['shop_id']; ?>" class="a_demo_four">Edit</a></td>
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
                                                            new CBPFWTabs(document.getElementById('tabs'));
                                                        </script>
<?php } else if ($_REQUEST['add_edit'] == 0) { ?>
                                                        <div class="graph">
                                                            <div class="tabs">
                                                                <div class="graph-form">
                                                                    <div class="form-body">
                                                                        <form   role="form" method="post" enctype="multipart/form-data">
															 <input type="hidden" name="id" value="<?php echo $shop_id; ?>"  />
                                                                            <table class="table">
                                                                                <tbody>
                                                                                    <tr>
                                                                                <label for="exampleInputEmail1">Product Name</label> 

                                                                                <input type="text" class="form-control"  name="product_name" id="product_name" placeholder="Product Name">

                                                                                </tr>
                                                                                <tr>
                                                                                <label for="selector1" >Main Category Name</label>
																				<?php $main_cats = $maincat_obj->selectall(); ?>
                                                                                <select  name="main_category" onChange="showCategory(this);" class="form-control1">
                                                                                    <option>Click here to select</option>
																				<?php while ($row = mysqli_fetch_array($main_cats)) { ?>
                                                                                        <option value="<?php echo $row['maincategory_id']; ?>"><?php echo $row['maincategory_name']; ?></option>
																				<?php } ?>
                                                                                </select>
                                                                                
                                                                                
                                                                                <div id="output1"  class="form-group">
                                                                                    <label for="selector1" >Category Name</label>
                                                                                </div>
                                                                              <div id="output2" class="form-group">
                                                                                    <label for="selector1" >Sub Category Name</label>
                                                                                </div>
                                                                                <div id="output3" class="form-group">
                                                                                    <label for="selector1" >Brand</label>
                                                                                </div>
                                                                                <button type="button" class="add_field_button">Add Highlights</button>
																				<button type="button" class="remove_field_button">Remove Field</button>
																				<div class="input_fields_wrap">
																				<input type="text" name="highlights[]" class="field-long" />
																				<input type="text" name="highlights[]" class="field-long" />
																				<input type="text" name="highlights[]" class="field-long" />
																				</div>
                                                                                <div class="form-group"> 
                                                                                    <tr>
																		<label>Product Description</label>
																		<textarea class="form form-control" name="description" rows="5" cols="30"></textarea>
                            
                                                                                </div> 
																				
                                                                                <div class="form-group"> 
                                                                                    <label for="exampleInputPassword1">Price</label> 
                                                                                    <input type="text" class="form-control" name="price" id="price" placeholder="Price"> 
                                                                                </div> 
                                                                                <div class="form-group"> 
                                                                                    <label for="exampleInputPassword1">Upload Main Image</label> 
                                                                                    <input type="file" name="main_image"  class="form-control"  id="main_image" /> 
                                                                                </div> 
                                                                                <div class="form-group"> 
                                                                                    <label for="exampleInputPassword1">Image1</label> 
                                                                                    <input type="file" name="image1"  class="form-control"  id="image1" />
                                                                                </div> 
                                                                                <div class="form-group"> 
                                                                                    <label for="exampleInputPassword1">Image2</label> 
                                                                                    <input type="file" name="image2"  class="form-control"  id="image2" /> 
                                                                                </div> 
                                                                                <div class="form-group"> 
                                                                                    <label for="exampleInputFile">Image3</label>
                                                                                    <input type="file" name="image3"  class="form-control"  id="image3" />
                                                                                </div>
                                                                                <button type="submit"  name="add" value="addproduct" class="btn btn-default">Submit</button> 

                                                                                </tbody>
                                                                            </table>
                                                                        </form> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
<?php } else if ($_REQUEST['add_edit'] == 1) { ?>
                                                        <div class="graph">
                                                            <div class="tabs">
                                                                <div class="graph-form">
                                                                    <div class="form-body">
                                                                        <form   role="form" method="post" enctype="multipart/form-data">
                                                                            <input type="hidden" name="id" value="<?php echo $_REQUEST['shop_id']; ?>"  />
																			<input type="hidden" name="id" value="<?php echo $_REQUEST['p_id']; ?>"  />
                                                                            <div class="form-group"> 
                                                                                <label for="exampleInputEmail1">product</label> 
                                                                                <input type="text" class="form-control"  name="product_name" id="product_name" value="<?php echo $product_obj->product_name; ?>" placeholder="Email"> </div>
                                                                            <div class="form-group"> 
                                                                                <label for="exampleInputPassword1">Main Category Name</label> 
                                                                                <?php 
																					$main_cats = $maincat_obj->selectall();  
																					$main_cats_selected = $product_obj->maincategory_id;
																				?>
																<select name="main_category" onChange="showCategory(this);" class="form-control1" required>
                                    
                        <?php   while($row = mysqli_fetch_array($main_cats)) { 
                                    if($row['maincategory_id'] == $main_cats_selected) { ?>
                                        <option value="<?php echo $row['maincategory_id']; ?>" selected><?php echo $row['maincategory_name']; ?></option>
                        <?php       } else { ?>
                                        <option value="<?php echo $row['maincategory_id']; ?>" ><?php echo $row['maincategory_name']; ?></option>
                        <?php       }
                                }
                        ?>
                                </select> 
                                                                            </div> 
                                                                                <div id="output1">
                                                                                <label for="exampleInputPassword1"> Category Name</label> 
                                                                               <?php 
                                        $cats = $category->selectcategory();  
                                        $cats_selected = $product_obj->category_id;
                        ?>
							<select name="category_id" onChange="showCategory(this);" class="form-control1" required>
                                    
                        <?php   while($row = mysqli_fetch_array($cats)) { 
                                    if($row['category_id'] == $cats_selected) { ?>
                                        <option value="<?php echo $row['category_id']; ?>" selected><?php echo $row['category_name']; ?></option>
                        <?php       } else { ?>
                                        <option value="<?php echo $row['category_id']; ?>" ><?php echo $row['category_name']; ?></option>
                        <?php       }
                                }
                        ?>
                                </select> 
                                  
										   </div> 
										       <?php 
                                        $sub_cats = $subcat_obj->selectall();  
                                        $sub_cats_selected = $product_obj->sub_category_id;
										if($sub_cats_selected!=0){
                        ?>
                                                                            <div id="output2"> 
                                                                                <label for="exampleInputPassword1">Sub Categorey Name</label> 
                                                                           
                                        <select name="sub_cat_id" onchange="showBrand(this); " class="form-control1" required>
                                    
                        <?php           while($row = mysqli_fetch_array($sub_cats)) { 
                                            if($row['sub_category_id'] == $sub_cats_selected) { ?>
                                                <option value="<?php echo $row['sub_category_id']; ?>" selected><?php echo $row['sub_category_name']; ?></option>
                        <?php               } else { ?>
                                                <option value="<?php echo $row['sub_category_id']; ?>" ><?php echo $row['sub_category_name']; ?></option>
                        <?php               }
                                        }
                        ?>
                                                                            </div> 
																			
										<?php } ?>
										
										
										                                               <?php 
                                        $brands = $brand_obj->selectall();  
                                        $brands_selected = $product_obj->brand_id;
										if($brands_selected!=0){
                        ?>
                                                                             <div id="output3"> 
                                                                                <label for="exampleInputPassword1">Brand</label> 
                                
                                        <select name="brand_id" onchange="showBrand(this); showSpecification(this);" class="form-control1" required>
                                    
                        <?php           while($row = mysql_fetch_array($brands)) { 
                                            if($row['brand_id'] == $brands_selected) { ?>
                                                <option value="<?php echo $row['brand_id']; ?>" selected><?php echo $row['brand_name']; ?></option>
                        <?php               } else { ?>
                                                <option value="<?php echo $row['brand_id']; ?>" ><?php echo $row['brand_name']; ?></option>
                        <?php               }
                                        }
                        ?>
                                        </select>
										</div>
										<?php } ?>								
									
																					<div class="form-group"> 
                                                                                <label for="exampleInputPassword1">Description</label> 
                                                                                <textarea class="form form-control" name="description" rows="5" cols="30" ><?php echo $product_obj->description; ?></textarea>	
                                                                            </div> 
																				
																				
																				
																				<div class="form-group"> 
                                                                                <label for="exampleInputPassword1">Price</label> 
                                                                                <input type="text" class="form-control" name="price"  value="<?php echo $product_obj->price; ?>" id="website" placeholder="Password"> 
                                                                            </div> 
                                                                            <div class="form-group"> 
                                                                                <label for="exampleInputFile">Main Image</label>
																		<?php if ($product_obj->main_image != '') { ?>								
																			<img src="../../upload/itemimage/thumbs/<?php echo $product_obj->main_image; ?>" width="100" height="100"/>
                                                                                    <input type="hidden" name="oldmain_image" value="<?php echo $product_obj->main_image; ?>"/>
																						<?php } ?>
                                                                                <input type="file" class="form-control" name="main_image" id="main_image" />

                                                                            </div>
																			   <div class="form-group"> 
                                                                                <label for="exampleInputFile">Image1</label>
																		<?php if ($product_obj->image1 != '') { ?>								
																			<img src="../../upload/itemimage/thumbs/<?php echo $product_obj->image1; ?>" width="100" height="100"/>
                                                                                    <input type="hidden" name="oldimage1" value="<?php echo $product_obj->image1; ?>"/>
																						<?php } ?>
                                                                                <input type="file" class="form-control" name="image1" id="image1" />

                                                                            </div>
																			   <div class="form-group"> 
                                                                                <label for="exampleInputFile">Image2</label>
																		<?php if ($product_obj->image2 != '') { ?>								
																			<img src="../../upload/itemimage/thumbs/<?php echo $product_obj->image2; ?>" width="100" height="100"/>
                                                                                    <input type="hidden" name="oldimage2" value="<?php echo $product_obj->image2; ?>"/>
																						<?php } ?>
                                                                                <input type="file" class="form-control" name="image2" id="image2" />

                                                                            </div>
																			   <div class="form-group"> 
                                                                                <label for="exampleInputFile">Image3</label>
																		<?php if ($product_obj->image3 != '') { ?>								
																			<img src="../../upload/itemimage/thumbs/<?php echo $product_obj->image3; ?>" width="100" height="100"/>
                                                                                    <input type="hidden" name="oldimage3" value="<?php echo $product_obj->image3; ?>"/>
																						<?php } ?>
                                                                                <input type="file" class="form-control" name="image3" id="image3" />

                                                                            </div>
                                                                            <button type="submit"  name="add" value="editproduct" class="btn btn-default">Submit</button> </form> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                                            <?php } else { ?>



                                                        <div class="container">						
                                                            <div class="widget-one">
                                                                <div class="col-md-12 weather-grids widget-shadow">
                                                                    <table class="table">
                                                                        <div class="header-top weather">
                                                                            <figure class="icons">
                                                                                <canvas id="clear-day" width="64" height="64"></canvas>
                                                                            </figure>
                                                                            <h4 class="weather">product Name</h4><h4 class="weather"><?php echo $product_obj->product_name; ?></h4><br>
                                                                            <div class="clearfix"> </div>
                                                                        </div>
                                                                        <div class="header-top weather">
                                                                            <figure class="icons">
                                                                                <canvas id="clear-day" width="64" height="64"></canvas>
                                                                            </figure>
                                                                            <h4 class="weather">Address</h4><h4 class="weather"><?php echo $product_obj->product_address; ?></h4>

                                                                            <div class="clearfix"> </div>
                                                                        </div>
                                                                        <div class="header-top weather">
                                                                            <figure class="icons">
                                                                                <canvas id="clear-day" width="64" height="64"></canvas>
                                                                            </figure>
                                                                            <h4 class="weather">Pin Code</h4><h4 class="weather"><?php echo $product_obj->pincode; ?></h4>

                                                                            <div class="clearfix"> </div>
                                                                        </div>
                                                                        <div class="header-top weather">
                                                                            <figure class="icons">
                                                                                <canvas id="clear-day" width="64" height="64"></canvas>
                                                                            </figure>
                                                                            <h4 class="weather">Mobile :</h4><h4 class="weather"><?php echo $product_obj->mobile; ?></h4>

                                                                            <div class="clearfix"> </div>
                                                                        </div>
                                                                        <div class="header-top weather">
                                                                            <figure class="icons">
                                                                                <canvas id="clear-day" width="64" height="64"></canvas>
                                                                            </figure>
                                                                            <h4 class="weather">Phone :</h4><h4 class="weather"><?php echo $product_obj->phone; ?></h4>

                                                                            <div class="clearfix"> </div>
                                                                        </div>
                                                                        <div class="header-top weather">
                                                                            <figure class="icons">
                                                                                <canvas id="clear-day" width="64" height="64"></canvas>
                                                                            </figure>
                                                                            <h4 class="weather">Email:</h4><h4 class="weather"><?php echo $product_obj->email; ?></h4>

                                                                            <div class="clearfix"> </div>
                                                                        </div>
                                                                        <div class="header-top weather">

                                                                            <h4 class="weather">Website :</h4><h4 class="weather"><?php echo $product_obj->website; ?></h4>

                                                                            <div class="clearfix"> </div>
                                                                        </div><div class="header-top weather">

                                                                            <img src="../../upload/itemimage/thumbs/<?php echo $product_obj->image; ?>" height="75" width="130" style="float:left; margin:15px 10px 0px 0px;  "/>

                                                                            <div class="clearfix"> </div>
                                                                        </div>

                                                                <div>

                                                                <div class="clearfix"> </div>
                                                            </div>

                                                        


<?php } ?>
                                                    <div class="clearfix"> </div>
                                                </div>
                                            </div>
                                            <!--//tabs-inner-->
                                        </div>	
                                    </div>
                                </div>
                                <!--//tabs-->
                            </div>
                        </div>
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
                        $("#menu span").css({"position": "absolute"});
                    }
                    else
                    {
                        $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
                        setTimeout(function() {
                            $("#menu span").css({"position": "relative"});
                        }, 400);
                    }

                    toggle = !toggle;
                });
            </script>

            <script>
                $(document).ready(function() {
                    $('#dataTables-example').dataTable();
                });
            </script>
<script>
var max_fields      = 10;
var wrapper         = $(".input_fields_wrap"); 
var add_button      = $(".add_field_button");
var remove_button   = $(".remove_field_button");

$(add_button).click(function(e){
	e.preventDefault();
	var total_fields = wrapper[0].childNodes.length;
	if(total_fields < max_fields){
		$(wrapper).append('<input type="text" name="highlights[]" class="field-long" />');
	}
});
$(remove_button).click(function(e){
	e.preventDefault();
	var total_fields = wrapper[0].childNodes.length;
	if(total_fields>1){
		wrapper[0].childNodes[total_fields-1].remove();
	}
});
</script>
            <script>


                function showCategory(sel) {
                    var maincategory_id = sel.options[sel.selectedIndex].value;
                    $("#output1").html("");
                    $("#output2").html("");
                    $("#output3").html("");
                    $("#output4").html("");
                    if (maincategory_id.length > 0) {

                        $.ajax({
                            type: "POST",
                            url: "dropdownlist.php",
                            data: "maincategory_id=" + maincategory_id,
                            cache: false,
                            beforeSend: function() {
                                $('#output1').html('<img src="images/loader.gif" alt="" width="24" height="24">');
                            },
                            success: function(html) {
                                $("#output1").html(html);
                            }
                        });
                    }
                }
                function showSubCat(sel) {
                    var category_id = sel.options[sel.selectedIndex].value;
                    if (category_id.length > 0) {
                        $.ajax({
                            type: "POST",
                            url: "dropdownlist.php",
                            data: "category_id=" + category_id,
                            cache: false,
                            beforeSend: function() {
                                $('#output2').html('<img src="images/loader.gif" alt="" width="24" height="24">');
                            },
                            success: function(html) {
                                $("#output2").html(html);
                            }
                        });
                    } else {
                        $("#output2").html("");
                    }
                }
                function showBrand(sel) {
                    var subcat_id = sel.options[sel.selectedIndex].value;
                    if (subcat_id.length > 0) {
                        $.ajax({
                            type: "POST",
                            url: "dropdownlist.php",
                            data: "subcat_id=" + subcat_id,
                            cache: false,
                            beforeSend: function() {
                                $('#output3').html('<img src="images/loader.gif" alt="" width="24" height="24">');
                            },
                            success: function(html) {
                                $("#output3").html(html);
                            }
                        });
                    } else {
                        $("#output3").html("");
                    }
                }
                function showSpecification(sel) {
                    var sub_category_id = sel.options[sel.selectedIndex].value;
                    if (sub_category_id.length > 0) {
                        $.ajax({
                            type: "POST",
                            url: "dropdownlist.php",
                            data: "sub_category_id=" + sub_category_id,
                            cache: false,
                            beforeSend: function() {
                                $('#output4').html('<img src="../images/loader.gif" alt="" width="24" height="24">');
                            },
                            success: function(html) {
                                $("#output4").html(html);
                            }
                        });
                    } else {
                        $("#output4").html("");
                    }
                }


            </script>


        </div>
    </body>
</html>