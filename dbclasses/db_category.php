<?php

include_once("database.inc.php");

class Category {

    var $category_id;
    var $category_name;
    var $image;
    var $maincategory_id;
	var $main_category_name;

    function Category() {

        $this->database = new Database();
    }

// **********************
// GETTER METHODS
// **********************



    function getcategory_id() {
        return $this->category_id;
    }

    function getcategory_name() {
        return $this->category_name;
    }

    function getimage() {
        return $this->image;
    }

    function getmaincategory_id() {
        return $this->maincategory_id;
    }

// **********************
// SETTER METHODS
// **********************



    function setcategory_id($val) {
        $this->category_id = $val;
    }

    function setmaincategory_id($val) {
        $this->maincategory_id = $val;
    }

    function setcategory_name($val) {

        $this->category_name = $val;
    }

    function setimage($val) {
        $this->image = $val;
    }

    function db_fetchrows($result) {
        $this->row = mysqli_fetch_object($result);
        return $this->row;
    }

    function select($id) {
        $sql = "SELECT * FROM Category WHERE category_id = $id";

        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

    function selectById($id) {//used in category.php
        $sql = "SELECT * FROM category WHERE category_id = '$id'";
        //echo $sql;
        $result = $this->database->query($sql);
        $result = $this->database->result;
        $row = mysqli_fetch_object($result);
        $this->category_name = $row->category_name;
        $this->maincategory_id = $row->maincategory_id;
        $this->image = $row->image;
    }

		  function selectnameByid($id) {//used in category.php
        $sql = "SELECT * FROM category  WHERE category.category_id = '$id'";
		$result = $this->database->query($sql);
        $result = $this->database->result;
         $row = mysqli_fetch_object($result);
		   $this->category_name = $row->category_name;
		   return $this->category_name;
		  }
	
	 function selectByname($name) {//used in category.php
        $sql = "SELECT category_id FROM category WHERE category_name = '$name'";
        //echo $sql;
        $result = $this->database->query($sql);
        $result = $this->database->result;
        $this->num_rows = $this->database->db_countRows($result);
			if ($this->num_rows==0) //check the case of the password
 			{
				return 0;
			}
			else
			{
	    $row = mysqli_fetch_object($result);
        $this->category_id = $row->category_id;
        return $this->category_id;
				
			}
		   		
       
    }
    
    
    	function selectcatprdall(){
		
	    $sql = "SELECT category_name FROM category UNION SELECT product_name FROM products UNION SELECT shop_name FROM shop ";
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;	
		
	}
	
    
    
    
    
    function selectall() { //used in category.php
        $sql = "SELECT category_name FROM category UNION SELECT product_name FROM products ";
        //echo $sql;
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

    function selectcategory() {
        $sql = "SELECT * from category ORDER By category_name ASC";
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

    function selectbymaincat($id) {
        $sql = "SELECT * FROM category WHERE maincategory_id = $id";
//echo $sql;
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

// **********************
// DELETE
// **********************

    function delete($id) {//used in category.php
        $sql = "DELETE FROM Category WHERE category_id = $id;";
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

    function insert() {//used in category.php
        $sql = "INSERT INTO Category(category_name,image)VALUES ('$this->category_name','$this->image')";
        echo $sql;
        $result = $this->database->query($sql);
    }

    function insertid() {
        $sql = "INSERT INTO category(category_name,image,maincategory_id) VALUES ( '$this->category_name','$this->image','$this->maincategory_id')";
////echo $sql;
        $result = $this->database->query($sql);
        $this->category_id = mysqli_insert_id($this->database->link);
        return $this->category_id;
    }

    function countAllCategory() {
        $sql = "SELECT count(*) as prd_count FROM category ";
        //echo $sql;
        $result = $this->database->Query($sql);
        $result = $this->database->result;
        return $result;
    }

    function selectByCategoryId($id) {
        $sql = "SELECT  category.category_id,category.category_name,category.image,main_category.maincategory_name from main_category join category ON category.maincategory_id=main_category.maincategory_id WHERE category_name='$id'";
        echo $sql;
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

    function countAllactivityByOrder($i) {
        $sql = "SELECT count(*) as prd_count FROM category where category_name='$i'";
        $result = $this->database->Query($sql);
        $result = $this->database->result;
        return $result;
    }

// **********************
// UPDATE
// **********************

    function update() { //used in category.php
        $sql = " UPDATE Category  SET category_name = '$this->category_name',image = '$this->image',maincategory_id='$this->maincategory_id' WHERE category_id = '$this->category_id' ";
        echo $sql;
        $result = $this->database->query($sql);
    }

    function updateid() {//used in category.php
        $sql = " UPDATE category  SET  maincategory_id = '$this->maincategory_id',category_name = '$this->category_name'  WHERE category_id = '$this->category_id' ";
echo $sql;
        $result = $this->database->query($sql);
    }

#####################################
//count
#####################################

    function countAll() {
        $sql = "SELECT count(*) as prd_count from Category";
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

    function selectallcategory() {
        $sql = "SELECT  category.category_id,category.category_name,category.image,main_category.maincategory_name from main_category join category ON category.maincategory_id=main_category.maincategory_id order by  category_id ";
////echo $sql;
        $result = $this->database->Query($sql);
        $result = $this->database->result;
        return $result;
    }

}

?>
 