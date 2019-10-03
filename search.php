<?php 
include_once("dbclasses/database.inc.php");
$database = new Database();
$search_item=$_REQUEST['searchdata']; 
 $sql = "SELECT * FROM `products` WHERE `product_name` LIKE '$search_item%'";
 $result = $database->query($sql);
 $result=$database->result;
 $num_rows=$database->db_countRows($result);
 
     if($num_rows!=0){
	  $row = mysqli_fetch_object($result);
       $product_id = $row->product_id;
	   header("location:product-details.php?p_id=$product_id");
	}
	else{
    $sql1 = "SELECT * FROM `category` WHERE `category_name` LIKE '$search_item%'";
    $result1 = $database->query($sql1);
    $result1=$database->result;
     $num_rows=$database->db_countRows($result1);
   if($num_rows!=0){
	   $row1 = mysqli_fetch_object($result1);
        $category_id = $row1->category_id;	
	  header("location:products.php?category_id=$category_id");
    	}else{
    $sql1 = "SELECT * FROM `shop` WHERE `shop_name` LIKE '$search_item%'";
    $result1 = $database->query($sql1);
    $result1=$database->result;
    $num_rows=$database->db_countRows($result1);
     if($num_rows!=0){
	   $row1 = mysqli_fetch_object($result1);
       $shop_id = $row1->shop_id;	
	   header("location:voyabe-shops.php?shop_id=$shop_id");
	  }else{
	      echo "Sorry No Details found. We are working on it. Please try again later!!!!";
	  }
	  
	  
	}

		
	}

?>