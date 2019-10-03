<?php

include_once("database.inc.php");

class advertisment
{
   var $adv_id;   
   var $shop_id;
   var $caption; 
   var $description;
   var $adv_image;
    var $status;
    var $position;
    
    function advertisment()
{

$this->database = new Database();

} 
// **********************
// GETTER METHODS
// *********************

function getadv_id()
{
return $this->adv_id;
}

function getshop_id()
{
return $this->shop_id;
}
function getcaption()
{
return $this->caption;
}
function getdescription()
{
return $this->description;
}
function getadv_image()
{
return $this->adv_image;
}
function getstatus()
{
return $this->status;
}
function getposition()
{
return $this->position;
}

// **********************
// SETTER METHODS
// **********************

function setadv_id($val)
{
 $this->adv_id=$val;
}
function setshop_id($val)
{
 $this->shop_id=$val;
}
function setcaption($val)
{
 $this->caption=$val;
}
function setdescription($val)
{
 $this->description=$val;
}
function setadv_image($val)
{
 $this->adv_image=$val;
}
function setstatus($val)
{
 $this->status=$val;
}
function setposition($val)
{
 $this->position=$val;
}

##########################
//INSERT
##########################
function insert()
{
 
    $sql="INSERT INTO advertisment(adv_id,shop_id,caption,description,adv_image,status,position) VALUES ('$this->adv_id','$this->shop_id','$this->caption','$this->description','$this->adv_image','$this->status','$this->position')";
    $result = $this->database->query($sql);
    $this->adv_id = mysqli_insert_id($this->database->link);
    return $this->adv_id;
 
}
function select() 
            {
    $sql = "SELECT * from advertisment";
    $result = $this->database->query($sql);
    $result = $this->database->result;
    return $result;
    }

}