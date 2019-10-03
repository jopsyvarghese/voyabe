<?php

include_once("database.inc.php");

class Maincategory
{
   var $maincategory_id;   
   var $maincategory_name;
   var $image;
  
  
   
function Maincategory()
{
	
$this->database = new Database();
} 

// **********************
// GETTER METHODS
// **********************


  
function getmaincategory_id()
{
return $this->maincategory_id;
}
function getmaincategory_name()
{
	return $this->maincategory_name;
}
function getimage()
{
	return $this->image;
}

 
// **********************
// SETTER METHODS
// **********************



function setmaincategory_id($val)
{
$this->maincategory_id =  $val;
}

function setmaincategory_name($val)
{
   
$this->maincategory_name=  $val;
}

function setimage($val)
{
$this->image= $val;
//echo "...........................<br>".$this->image;
}

 function db_fetchrows($result) {
        $this->row = mysqli_fetch_object($result);
        return $this->row;
    }
function select($id)
{
	$sql = "SELECT * FROM main_category WHERE maincategory_id = $id";

	$result =  $this->database->query($sql);
	$result = $this->database->result;
	return $result;
}


function selectall()
{
	$sql = "SELECT * FROM main_category order by maincategory_name ASC";
	$result =  $this->database->query($sql);
	$result = $this->database->result;
	return $result;
}
function selectByCategoryId($id) {
        $sql = "SELECT * FROM main_category WHERE maincategory_name='$id'";
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }
 function selectallcategory($limit) {
        $sql = "SELECT * FROM main_category $limit";
//echo $sql;
        $result = $this->database->Query($sql);
        $result = $this->database->result;
        return $result;
    }

// **********************
// DELETE
// **********************

function delete($id)//used in main_category.php
{
	$sql = "DELETE FROM main_category WHERE maincategory_id = $id";
	$result = $this->database->query($sql);

}

function insert()
{
$sql="INSERT INTO main_category(maincategory_name,image)VALUES ( '$this->maincategory_name','$this->image')";
echo '.....'.$sql;	
$result = $this->database->query($sql);
	return $result;
}

  function insertid() {

        $sql = "INSERT INTO  main_category(maincategory_name,image) VALUES('$this->maincategory_name','$this->image')";
       // echo $sql;
        $result = $this->database->query($sql);
        $this->maincategory_id = mysqli_insert_id($this->database->link);
    } 

// **********************
// UPDATE
// **********************

    function updateid() {

    	$sql = " UPDATE main_category SET maincategory_name = '$this->maincategory_name',image = '$this->image' WHERE maincategory_id='$this->maincategory_id' ";
       
       // echo $sql;
        $result = $this->database->Query($sql);
        $result = $this->database->result;
        return $result;

    }

function update($id)//used in main_category.php
{
$sql = " UPDATE main_category SET maincategory_name = '$this->maincategory_name',image='$this->image' WHERE maincategory_id = '$id' ";
 //echo $sql."....".$this->image;
$result = $this->database->query($sql);
return $result;
}
function updatebymainname($id)
{
$sql = " UPDATE main_category SET maincategory_name = '$this->maincategory_name'  WHERE maincategory_id = '$id' ";

$result = $this->database->query($sql);
return $result;
}
#####################################
//count
#####################################
function countAll() {
        $sql = "SELECT count(*) as prd_count from main_category";
        //echo $sql;
		$result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

function countAllactivityByOrder($i) {
        $sql = "SELECT count(*) as prd_count FROM main_category where maincategory_name='$i'";
        $result = $this->database->Query($sql);
        $result = $this->database->result;
        return $result;
    }


function selectid($id) {//used in main_category page at add section

        $sql = "SELECT * FROM main_category where maincategory_id='$id'";
        $result = $this->database->Query($sql);
        $result = $this->database->result;
        $row = mysqli_fetch_object($result);
        $this->maincategory_name = $row->maincategory_name;
        $this->image = $row->image;
    }
}
?>
 