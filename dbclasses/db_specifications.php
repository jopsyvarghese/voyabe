<?php

include_once("database.inc.php");

class specifications {

    var $specification_id;
    var $sub_category_id;
    var $specification_name;

    function specifications() {

        $this->database = new Database();
    }

// **********************
// GETTER METHODS
// **********************



    function getspecification_id() {
        return $this->specification_id;
    }

    function getsub_category_id() {
        return $this->sub_category_id;
    }

    function getspecification_name() {
        return $this->specification_name;
    }

// **********************
// GETTER METHODS
// **********************

    function setspecification_id($val) {
        $this->specification_id = $val;
    }

    function setsub_category_id($val) {
        $this->sub_category_id = $val;
    }

    function setspecification_name($val) {
        $this->specification_name = $val;
    }

#######################################################
//INSERT
#######################################################
function selectBySubCatId($id) { //used in dropdownlist.php
    $sql = "SELECT * from specifications where sub_category_id='$id'";
    //echo $sql;
    $result = $this->database->query($sql);
    $result = $this->database->result;
    return $result;
}
    function insert() {
        $sql = "INSERT INTO specifications(sub_category_id,specification_name)VALUES ('$this->sub_category_id','$this->specification_name')";
        //echo $sql;
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

###########################################################
//select
###########################################################

    function select() {
        $sql = "SELECT * from specifications where specification_id='$id'";
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }
      function selectAll() {
        $sql = "SELECT * from specifications";
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }


    function selectByJoin() {
        $sql = "SELECT * from specifications join sub_category on specifications.sub_category_id=sub_category.sub_category_id";
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

// **********************
// DELETE
// **********************


    function delete($id) {
        $sql = "DELETE FROM specifications WHERE specification_id ='$id'";
        $result = $this->database->query($sql);
    }

// **********************
// UPDATE
// **********************

    function update($id) {
        $sql = " UPDATE specifications  SET sub_category_id = '$this->sub_category_id',specification_name = '$this->specification_name' WHERE specification_id= '$id' ";
        $result = $this->database->query($sql);
    }

#####################################
//count
#####################################

    function countAll() {
        $sql = "SELECT count(*) as prd_count from specifications";
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

}

?>
