<?php

include_once("database.inc.php");

class Shop {

    var $shop_id;
    var $shop_name;
    var $shop_address;
    var $mobile;
    var $phone;
    var $email;
    var $pincode;
    var $website;
    var $map_latitude;
    var $map_longitude;
    var $customer_id;
    var $image;

    function Shop() {

        $this->database = new Database();
    }

// **********************
// GETTER METHODS
// **********************




    function getshop_id() {
        return $this->shop_id;
    }

    function getshop_name() {
        return $this->shop_name;
    }

    function getshop_address() {
        return $this->shop_address;
    }

    function getmobile() {
        return $this->mobile;
    }

    function getwebsite() {
        return $this->website;
    }

    function getpincode() {
        return $this->pincode;
    }

    function getphone() {
        return $this->phone;
    }

    function getmap_latitude() {
        return $this->map_latitude;
    }

    function getmap_longitude() {
        return $this->map_longitude;
    }

    function getcustomer_id() {
        return $this->customer_id;
    }

// **********************
// SETTER METHODS
// **********************



    function setshop_id($val) {
        $this->shop_id = $val;
    }

  
    function setshop_name($val) {
        $this->shop_name = $val;
    }

    function setshop_address($val) {
        $this->shop_address = $val;
    }

    function setmobile($val) {
        $this->mobile = $val;
    }

    function setemail($val) {
        $this->email = $val;
    }

    function setwebsite($val) {
        $this->website = $val;
    }

    function setpincode($val) {
        $this->pincode = $val;
    }

    function setphone($val) {
        $this->phone = $val;
    }
      function setimage($val) {
        $this->image = $val;
    }

    function setmap_latitude($val) {
        $this->map_latitude = $val;
    }

    function setmap_longitude($val) {
        $this->map_longitude = $val;
    }

    function setcustomer_id($val) {
        $this->customer_id = $val;
    }

    function db_fetchrows($result) {
        $this->row = mysqli_fetch_object($result);
        return $this->row;
    }
function selectShopname($id) //product-view.php ,shop-details.php
{
    $sql = "SELECT * FROM shop WHERE shop_id= '$id'";
//echo "fhhfdhfdhfdh".$sql;
    $result = $this->database->query($sql);
        $result = $this->database->result;
        $row = mysqli_fetch_object($result);
  $this->shop_name = $row->shop_name;
  $this->map_latitude = $row->map_latitude;
  $this->map_longitude = $row->map_longitude;
  
}

	 function updatelocation($id) {
        $sql = "UPDATE shop SET map_latitude='$this->map_latitude',map_longitude='$this->map_longitude' WHERE shop_id='$id'";
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }
	




function selectShopid($name) //product-view.php ,shop-details.php
{
    $sql = "SELECT shop_id FROM shop WHERE shop_name= '$name'";
    $result = $this->database->query($sql);
        $result = $this->database->result;
        $row = mysqli_fetch_object($result);
        $this->shop_id = $row->shop_id;
        return $this->shop_id ;

  
}

function selectbyshopid($id) { //search-product.php , shop_details.php
        $sql = "SELECT * FROM shop   WHERE shop_id='$id'";
       
            $result = $this->database->query($sql);
            $result = $this->database->result;
            $row = mysqli_fetch_object($result);
            $this->shop_id = $row->shop_id;
            $this->shop_name = $row->shop_name;
            $this->shop_address = $row->shop_address;
            $this->mobile = $row->mobile;
            $this->phone = $row->phone; 
            $this->email = $row->email;
            $this->website = $row->website;
            $this->pincode = $row->pincode;
            $this->image = $row->image;
			$this->latitude = $row->map_latitude;
			$this->longitude = $row->map_latitude;
            
    }



    function select($id) {
        $sql = "SELECT * FROM shop WHERE shop_id= $id";

        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

    function select1($limit) {
        $sql = "SELECT * FROM shop $limit";

        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

    function countAllById($id) {
        $sql = "SELECT count(*) as prd_count FROM shop where customer_id='$id'";
        $result = $this->database->Query($sql);
        $result = $this->database->result;
         $row = mysqli_fetch_object($result);
        $this->prd_count = $row->prd_count;
        return $this->prd_count;
    }

    function selectAllById($id) {


        $sql = "SELECT * FROM shop WHERE customer_id= $id";
        $result = $this->database->query($sql);
        $result = $this->database->result;
         return $result;
    }

    function selectbyid($id) {
        $sql = "SELECT shop.shop_id,shop.shop_name,shop.shop_address,shop.mobile,shop.email,shop.website,shop.map_latitude,shop.map_longitude,products.product_name,products.product_id
FROM  shop JOIN products ON products.shop_id=shop.shop_id
  WHERE products.product_id='$id'";
        ////echo $sql;
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

    

    function update() {
        $sql = "UPDATE shop SET shop_name='$this->shop_name',shop_address='$this->shop_address',mobile='$this->mobile',pincode='$this->pincode',email='$this->email',website='$this->website',image='$this->image' WHERE shop_id='$this->shop_id'";
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

// **********************
// DELETE
// **********************

    function delete($id) {
        $sql = "DELETE FROM shop WHERE shop_id = $id";
        $result = $this->database->query($sql);
    }

// **********************
// INSERT
// **********************

    function insert() {
        $sql1 = "INSERT INTO shop(shop_name,shop_address,mobile,email,website,phone,pincode,image,customer_id) VALUES ('$this->shop_name','$this->shop_address','$this->mobile','$this->email','$this->website','$this->phone','$this->pincode','$this->image','$this->customer_id')";
		$result = $this->database->query($sql1);
        $shop_id = mysqli_insert_id($this->database->link);
        return $shop_id;
    }

  


    function countAll() {//dashboard.php(superadminpanel)
        $sql = "SELECT count(*) as prd_count from Shop";
        $result = $this->database->query($sql);
        $result = $this->database->result;
        $row = mysqli_fetch_object($result);
        $this->prd_count = $row->prd_count;
    }

    function selectByCustomer($i) {

        $sq = $sql = "SELECT * from shop where shop_name='$i'";
        ////echo $sql;
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

    function selectall() {//shopdetails.php
        $sql = "SELECT * FROM shop ";

        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

}

?>