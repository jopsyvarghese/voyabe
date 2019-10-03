<?php

include_once("database.inc.php");

class Customer_details
{
   var $customer_id;   
   var $name;
   var $mobile; 
   var $email;
   var $password;
    var $address;
    
function Customer_details()
{

$this->database = new Database();

}   

// **********************
// GETTER METHODS
// **********************



function getcustomer_id()
{
return $this->customer_id;
}
function getname()
{
  return $this->name;
}
function getpassword()
{
  return $this->password;
}
function getmobile()
{
  return $this->mobile;
}
function getemail()
{
  return $this->email;
}
function getaddress()
{
  return $this->address;
}

// **********************
// GETTER METHODS
// **********************

function setcustomer_id($val)
{
 $this->customer_id=$val;
}
function setname($val)
{
$this->name= $val;
}

function setpassword($val)
{
$this->password= $val;
}


function setmobile($val)
{
$this->mobile= $val;
}

function setemail($val)
{
$this->email= $val;
}
function setaddress($val)
{
$this->address= $val;
}
function settype_id($val)
{
$this->type_id= $val;
}
#######################################################
//INSERT
#######################################################
function selectCustomerId($username) { //product-view.php, profile_settings2.php
        $sql = "SELECT * from customer_details where email='$username' OR mobile='$username'";
       
    $result=$this->database->query($sql);
$result = $this->database->result;
$row = mysqli_fetch_object($result);
$this->customer_id=$row->customer_id;
    }





function selectb($id){//used in advertisement.php in site
    $sql = "SELECT * from customer_details where customer_id='$id'";
    //echo $sql;
    $result = $this->database->query($sql);
    $result = $this->database->result;
    $row = mysqli_fetch_object($result);
    $this->name = $row->name;
    $this->mobile = $row->mobile;
    $this->email = $row->email;
    }


function insert()
{
    $sql="INSERT INTO customer_details(name,mobile,email) VALUES ( '$this->name','$this->mobile','$this->email')";
    $result = $this->database->query($sql);
    $this->customer_id = mysqli_insert_id($this->database->link);
    return $this->customer_id;
 
}
function selectbyid($id)
{
    $sql = "SELECT * FROM customer_details WHERE customer_id='$id'";
    $result =  $this->database->query($sql);
    $result = $this->database->result;
    $row = mysqli_fetch_object($result);
    $this->customer_id=$row->customer_id;
    $this->name = $row->name; 
    $this->address = $row->address; 
    $this->mobile = $row->mobile; 
    $this->email = $row->email;
    $this->address = $row->address; 
   
   }
###########################################################
//select
###########################################################
function selectAllById($id){

      
    $sql = "SELECT * from customer_details where customer_id='$id'";
    $result = $this->database->query($sql);
    $result = $this->database->result;
    return $result;   
    }
function select() //customerdetails.php
            {
    $sql = "SELECT * from customer_details";
    $result = $this->database->query($sql);
    $result = $this->database->result;
    return $result;
    }

function selectShop(){
        $sql = "SELECT shop_id from shop where customer_id='$this->customer_id'";
        $result = $this->database->query($sql);
        $result = $this->database->result;
        $row = mysqli_fetch_object($result);
        $this->shop_id = $row->shop_id;
    }


// **********************
// DELETE
// **********************


function delete($id)
{
  $sql = "DELETE FROM customer_details WHERE customer_id = $id;";
  $result = $this->database->query($sql);

}


// **********************
// UPDATE
// **********************
function update($id)
{
    $sql = " UPDATE customer_details  SET name ='$this->name',mobile='$this->mobile',email='$this->email'  WHERE customer_id = '$id' ";
     $result = $this->database->query($sql);

}

#####################################
//count
#####################################
function countAll() {
        $sql = "SELECT count(*) as prd_count from customer_details";
    $result = $this->database->query($sql);
        $result = $this->database->result;
       $row=  mysqli_fetch_object($result);
       $this->prd_count=$row->prd_count;
    }
 
function countAllactivityByOrder($i) {
        $sql = "SELECT count(*) as prd_count FROM customer_details where name='$i'";
        $result = $this->database->Query($sql);
        $result = $this->database->result;
        return $result;
    }
 function selectByCustomer($id) {

        $sq = $sql = "SELECT * from customer_details where customer_id='$id'";
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }
  function select1($limit) {
        $sql = "SELECT * FROM customer_details $limit";

        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }  



}
?>
