<?php

include_once("database.inc.php");

class Sub_Category {

    var $sub_category_id;
    var $sub_category_name;
    var $image;
    var $maincategory_id;
    var $category_id;

    function Sub_Category() {

        $this->database = new Database();
    }

// **********************
// GETTER METHODS
// **********************



    function getsub_category_id() {
        return $this->sub_category_id;
    }

    function getcategory_id() {
        return $this->category_id;
    }

    function getmaincategory_id() {
        return $this->maincategory_id;
    }

    function getsub_category_name() {
        return $this->sub_category_name;
    }

    function getimage() {
        return $this->image;
    }

// **********************
// SETTER METHODS
// **********************



    function setsub_category_id($val) {
        $this->sub_category_id = $val;
    }

    function setcategory_id($val) {
        $this->category_id = $val;
    }

    function setmaincategory_id($val) {
        $this->maincategory_id = $val;
    }

    function setsub_category_name($val) {
        $this->sub_category_name = $val;
    }

    function setimage($val) {
        $this->image = $val;
    }

    function db_fetchrows($result) {
        $this->row = mysql_fetch_object($result);
        return $this->row;
    }

 function selectByCat($id) {
        $sql = "SELECT * FROM sub_category WHERE category_id = $id"; //get_submenu.php

//echo $sql;
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }





    function select($id) {
        $sql = "SELECT * FROM sub_category WHERE sub_category_id = $id";

//echo $sql;
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

    function selectbyid($id) {//used in sub_category.php
        $sql = "SELECT * FROM Sub_Category WHERE sub_category_id = $id";
        //echo ''.$sql;
        $result = $this->database->query($sql);
        $result = $this->database->result;
        $row = mysql_fetch_object($result);
        $this->sub_category_name = $row->sub_category_name;
        $this->category_id = $row->category_id;
        $this->maincategory_id = $row->maincategory_id;
        $this->image = $row->image;
    }

// **********************
// DELETE
// **********************

    function delete($id) {//used in sub_category.php
        $sql = "DELETE FROM Sub_Category WHERE sub_category_id = $id";
        $result = $this->database->query($sql);
    }

    function countAllCategory() {
        $sql = "SELECT count(*) as prd_count FROM sub_category ";
        $result = $this->database->Query($sql);
        $result = $this->database->result;
        return $result;
    }

// **********************
// INSERT
// **********************

    function insert() {//used in sub_category.php
        $sql = "INSERT INTO Sub_Category(maincategory_id,category_id,sub_category_name,image) VALUES ('$this->maincategory_id','$this->category_id','$this->sub_category_name','$this->image')";
        echo $sql;
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

// **********************
// UPDATE
// **********************

    function update($id) {//used in sub_category.php
        $sql = "UPDATE Sub_Category SET sub_category_name='$this->sub_category_name',category_id='$this->category_id',maincategory_id='$this->maincategory_id',image='$this->image' WHERE sub_category_id = $id";
        $result = $this->database->query($sql);
    }

    function updatebyid($id) {//used in sub_category.php
        $sql = "UPDATE Sub_Category SET sub_category_name='$this->sub_category_name',category_id='$this->category_id',maincategory_id='$this->maincategory_id' WHERE sub_category_id = $id";
        echo $sql;
        $result = $this->database->query($sql);
    }

    function updateid() {
        $sql = " UPDATE sub_category  SET  category_id ='$this->category_id',sub_category_name= '$this->sub_category_name',image= '$this->image',maincategory_id= '$this->maincategory_id' WHERE sub_category_id = '$this->sub_category_id' ";
//echo $sql;
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

// count//

    function countAll() {
        $sql = "SELECT count(*) as prd_count from Sub_Category";
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

    function countSubCategory($mainCatId) {
        $sql = "SELECT count(*) FROM `sub_category` WHERE maincategory_id=".$mainCatId;
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

    function selectallcategory($limit) {
        $sql = "SELECT sub_category.sub_category_id,sub_category.sub_category_name,sub_category.image,main_category.maincategory_name,category.category_name from sub_category JOIN main_category ON sub_category.maincategory_id=main_category.maincategory_id JOIN category ON category.category_id=sub_category.category_id order by sub_category_id $limit";
        //echo $sql;
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

    function countAllactivityByOrder($i) {
        $sql = "SELECT count(*) as prd_count FROM sub_category where sub_category_name='$i'";
        ////echo $sql;
        $result = $this->database->Query($sql);
        $result = $this->database->result;
        return $result;
    }

    function selectByCategoryId($id) {
        $sql = "SELECT sub_category.sub_category_id,sub_category.sub_category_name,sub_category.image,main_category.maincategory_name,category.category_name from sub_category  JOIN main_category ON sub_category.maincategory_id=main_category.maincategory_id  JOIN category ON category.category_id=sub_category.category_id WHERE sub_category_name='$id'";
        //echo $sql;
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

    function selectall() { //used in sub_category.php
        $sql = "SELECT * from sub_category";
        ////echo $sql;
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

}

?>