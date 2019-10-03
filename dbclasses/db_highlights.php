<?php
include_once("database.inc.php");

class Highlights

{
   var $highlight_id;   
   var $product_id;
   var $highlight_caption;
  
 
function Highlights
()
{
	
$this->database = new Database();
} 

// **********************
// GETTER METHODS
// **********************


  
function gethighlight_id
()
{
return $this->highlight_id
;
}
function getproduct_id()
{
	return $this->product_id;
}
function gethighlight_caption()
{
	return $this->highlight_caption;
}

// **********************
// SETTER METHODS
// **********************



function sethighlight_id($val)
{
$this->highlight_id= $val;
}

function setproduct_id($val)
{
   
$this->product_id=  $val;
}

function sethighlight_caption($val)
{
$this->highlight_caption= $val;
}
/*.................SELECT...............*/

function select($id)
{
	$sql = "SELECT * FROM highlights WHERE highlight_id= $id";

	$result =  $this->database->query($sql);
	$result = $this->database->result;
	return $result;
}

function selectByProduct($id){ //product_view.php
	$sql = "SELECT * FROM highlights WHERE product_id= $id";

	$result =  $this->database->query($sql);
	$result = $this->database->result;
	return $result;
}

// **********************
// DELETE
// **********************

function delete($id)
{
	$sql = "DELETE FROM highlights WHERE highlight_id = $id;";
	$result = $this->database->query($sql);
$result = $this->database->result;
	return $result;
}

/*..................INSERT................*/

function insert()
{
$sql="INSERT INTO highlights(highlight_id,product_id,highlight_caption)VALUES ( '$this->highlight_id','$this->product_id','$this->highlight_caption')";
	$result = $this->database->query($sql);
}

    

// **********************
// UPDATE
// **********************

function update($id)
{
$sql = " UPDATE highlights SET  highlight_id= '$this->highlight_id',product_id = '$this->product_id',highlight_caption = '$this->highlight_caption' WHERE highlight_id= '$id' ";
$result = $this->database->query($sql);

}

#####################################
//count
#####################################
function countAll() {
        $sql = "SELECT count(*) as prd_count from highlights";
		$result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

}
?>
 