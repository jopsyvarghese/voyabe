<?php
include_once("database.inc.php");
class Shop_Image
{
     
   var $shop_image_id;
   var $shop_id;
   var $image;
  
   
   
   
function Shop_Image()
{
	
$this->database = new Database();
} 

// **********************
// GETTER METHODS
// **********************


  
function getshop_image_id()
{
return $this->shop_image_id;
}

function getshop_id()
{
	return $this->shop_id;
}

function getimage()
{
return $this->image;
}

 
// **********************
// SETTER METHODS
// **********************



function setshop_image_id($val)
{
$this->shop_image_id=  $val;
}

function setshop_id($val)
{
$this->shop_id= $val;
}

function setimage($val)
{
$this->image=  $val;
}

 function selectById1($id) {//whishlist.php
 //echo "in function";
        $sql = "SELECT DISTINCT * from shop_image WHERE shop_id='$id' GROUP BY shop_id";
        //echo $sql;
   $result = $this->database->query($sql);
        $result = $this->database->result;
        $row = mysql_fetch_object($result);
  $this->image = $row->image;
    }


function select($id)
{
	$sql = "SELECT * FROM shop_image WHERE shop_image_id= $id";

	$result =  $this->database->query($sql);
	$result = $this->database->result;
	return $result;
}



// **********************
// DELETE
// **********************

function delete($id)
{
	$sql = "DELETE FROM Shop_Image WHERE shop_image_id = $id";
	$result = $this->database->query($sql);

}



// **********************
// INSERT
// **********************

function insert()
{
$sql="INSERT INTO Shop_Image(shop_image_id,shop_id,image) VALUES ( '$this->shop_image_id','$this->shop_id','$this->image')";
	$result = $this->database->query($sql);


}

// **********************
// UPDATE
// **********************

function update($id)
{
$sql="UPDATE shop_image SET shop_id='$this->shop_id',image='$this->image' WHERE shop_image_id= $id";
$result = $this->database->query($sql);
}
// count//

function countAll() {
        $sql = "SELECT count(*) as prd_count from shop_image";
		$result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }
   
}