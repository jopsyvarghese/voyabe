<?php

include_once("database.inc.php");

class Brand {

    var $brand_id;
    var $brand_name;
    var $brandImage;
    var $sub_category_id;

    function Brand() {

        $this->database = new Database();
    }

// **********************
// GETTER METHODS
// **********************



    function getbrand_id() {
        return $this->brand_id;
    }

    function getbrand_name() {
        return $this->brand_name;
    }

    function getbrandImage() {
        return $this->brandImage;
    }

    function getsub_category_id() {
        return $this->sub_category_id;
    }

// **********************
// GETTER METHODS
// **********************
    function setbrand_id($val) {
        $this->brand_id = $val;
    }

    function setbrand_name($val) {
        $this->brand_name = $val;
    }

    function setbrandImage($val) {
        $this->brandImage = $val;
    }

    function setsub_category_id($val) {
        $this->sub_category_id = $val;
    }

    function db_fetchrows($result) {
        $this->row = mysql_fetch_object($result);
        return $this->row;
    }

#######################################################
//INSERT
#######################################################

    function insert() {//used in brands.php
        $sql = "INSERT INTO brand(brand_name,brandImage,sub_category_id) VALUES ( '$this->brand_name','$this->brandImage','$this->sub_category_id')";
        echo $sql;
        $result = $this->database->query($sql);
        $this->brand_id = mysqli_insert_id($this->database->link);
        return $this->brand_id;
    }

###########################################################
//select
###########################################################

    function selectall() {//used brands.php
        $sql = "SELECT * from brand";
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

// **********************
// DELETE
// **********************


    function delete($id) {//used in brands.php
        $sql = "DELETE FROM brand WHERE brand_id = $id;";
        $result = $this->database->query($sql);
    }

// **********************
// UPDATE
// **********************

    function update() {//used in brands.php
        $sql = " UPDATE brand  SET  brand_name = '$this->brand_name',brandImage = '$this->brandImage',sub_category_id= '$this->sub_category_id'  WHERE brand_id = '$this->brand_id' ";
        $result = $this->database->query($sql);
    }
 function updatebybrandname($id) {//used in brands.php
        
     $sql = " UPDATE brand  SET  brand_name = '$this->brand_name',sub_category_id= '$this->sub_category_id'  WHERE brand_id = '$id' ";
     echo $sql;   
     $result = $this->database->query($sql);
    }
#####################################
//count
#####################################

    function countAll() {
        $sql = "SELECT count(*) as prd_count from brand";
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

    function select($id) {//used in brands.php
        $sql = "SELECT * FROM brand where brand_id='$id'";
        $result = $this->database->Query($sql);
        $result = $this->database->result;
        $row = mysqli_fetch_object($result);
        $this->brand_name = $row->brand_name;
        $this->sub_category_id = $row->sub_category_id;
        $this->brandImage = $row->brandImage;
        $this->brand_id = $row->brand_id;
    }

    function countAllactivityByOrder($i) {
        $sql = "SELECT count(*) as prd_count FROM brand where brand_name='$i'";
        $result = $this->database->Query($sql);
        $result = $this->database->result;
        return $result;
    }

    function countAllCategory() {
        $sql = "SELECT count(*) as prd_count FROM brand ";
        $result = $this->database->Query($sql);
        $result = $this->database->result;
        return $result;
    }

    function selectByCategoryId($id) {
        $sql = "SELECT * FROM brand LEFT JOIN sub_category_info ON brand.sub_category_id=sub_category_info.sub_category_id  WHERE brand_id='$id'";
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

    function selectallcategory() {
        $sql = "SELECT * FROM brand LEFT JOIN sub_category_info ON brand.sub_category_id=sub_category_info.sub_category_id ";

        $result = $this->database->Query($sql);
        $result = $this->database->result;
        return $result;
    }

function selectallBySubcat($id) {//category-item.php
        $sql = "SELECT * from brand where sub_category_id='$id'";
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

 function selectBrandBySubCat($id) { //used in productdetails.php
        $sql = "SELECT * FROM brand WHERE sub_category_id='$id' ";
        // echo $sql;
        $result = $this->database->Query($sql);
        $result = $this->database->result;
        return $result;
    }

}

?>
