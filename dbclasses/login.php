<?php



include_once("database.inc.php");


class Login
{
   var $login_id;   
   
   var $mobile; 
   var $email;
   var $password;
   var $type_id;
   var $one_time;
   var $last_login;
   
function Login()
{

$this->database = new Database();

}   

// **********************
// GETTER METHODS
// **********************



function getlogin_id()
{
return $this->login_id;
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

function gettype_id()
{
	return $this->type_id;
}
function getlast_login()
{
  return $this->last_login;
}

// **********************
// GETTER METHODS
// **********************

function setlogin_id($val)
{
$this->login_id =  $val;
}


function setpassword($val)
{
$this->password= $val;
}


function setmobile($val)
{
$this->mobile=  $val;
}
function setcustomer_id($val)
{
    
$this->customer_id=  $val;
}

function setemail($val)
{
$this->email= $val;
}
function settype_id($val)
{
$this->type_id= $val;
}
function setlast_login($val)
{
$this->last_login= $val;
}
function setonetime($val){
 $this->one_time= $val;   
    
}
#######################################################
//INSERT
#######################################################
function login2($username,$userpass)
{

$sql =  "SELECT * FROM login WHERE (email='$username' OR mobile='$username') and password='".$userpass."' ";
$this->result=$this->database->db_selectData($sql);

			$this->num_rows = $this->database->db_countRows($this->result);
			$this->row = $this->database->db_fetchrow($this->result);
      if ($this->num_rows==0) //check the case of the password
      {
        return 0;
      }
      else
      {
        $sql = " UPDATE login SET  lastlogin=ADDTIME( NOW( ) ,  '05:30:00' ) WHERE username= '$username'";

                                $this->database->query($sql);
        return $this->row ;
        
      }
    }
function selectByemail($username) {  //logincheck.php
        $sql = "SELECT * from login WHERE (email='$username' OR mobile='$username')";
        //echo $sql;
   $result =  $this->database->query($sql);
  $result = $this->database->result;
  $row = mysqli_fetch_object($result);
   //$this->customer_id=$row->customer_id;
   // $this->username = $row->username; 
  //$this->customer_id=$row->customer_id;
    $this->type_id= $row->type_id; 
    }


function updateInProfileView($id)
{
$sql = " UPDATE login  SET mobile= '$this->mobile', email= '$this->email', last_login=now() WHERE mobile='$id' OR email='$id' ";
//echo $sql;
$result = $this->database->query($sql);

}


   function check_username($email,$mobile)  //sign-up.php
{

$sql =  "SELECT count(*) as ucount FROM login WHERE (email='$email' OR mobile='$mobile') ";
$result=$this->database->query($sql);
$result = $this->database->result;
$row = mysqli_fetch_object($result);
return $row->ucount;

} 
 function check_username1($username,$password,$id)  //sign-up.php
{

$sql =  "SELECT count(*) as ucount FROM login WHERE (email='$username' OR mobile='$username') AND password = '$password' AND type_id='$id' ";
//echo $sql;
$result=$this->database->query($sql);
$result = $this->database->result;
$row = mysqli_fetch_object($result);
return $row->ucount;

} 
 function checkType($email,$mobile)  //sign-up.php
{

$sql =  "SELECT * FROM login WHERE (email='$email' OR mobile='$mobile')  ";
//echo $sql;
$result=$this->database->query($sql);
$result = $this->database->result;
$row = mysqli_fetch_object($result);
return $row->type_id;

} 

function random_password() {
		$length = 8;
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
		$password = substr( str_shuffle( $chars ), 0, $length );
		return $password;
	}


function check($username) //menu1.php
{

$sql =  "SELECT count(*) as ucount FROM login WHERE email='$username'  AND type_id=1";
$result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;

} 

function insert() //sign-up
{
   $passwordenc=md5($this->password); 
$sql="INSERT INTO login(mobile,email,password,type_id,customer_id,last_login,one_time)VALUES ('$this->mobile','$this->email','$passwordenc','$this->type_id','$this->customer_id',now(),'$this->one_time')";

	$result = $this->database->query($sql);
$this->login_id = mysqli_insert_id($this->database->link);
return $this->login_id;
}

###########################################################
//select
###########################################################

function select() {
        $sql = "SELECT * from login";
		$result = $this->database->query($sql);
        $result = $this->database->result;
         return $result;
    }
function selectbyid($id) {
        $sql = "SELECT * from login where customer_id='$id'";
        //echo $sql;
    $result = $this->database->query($sql);
    $result = $this->database->result;
       $row=mysqli_fetch_object($result);
       $this->password=$row->password;
    }
function countbyid($password,$id) {
        $sql = "SELECT count(*) as prd_count from login where password='$password' and email='$id' or mobile='$id'";
        //echo $sql;
    $result = $this->database->query($sql);
        $result = $this->database->result;
       $row = mysqli_fetch_object($result);
   //$this->customer_id=$row->customer_id;
    $this->prd_count = $row->prd_count; 
    return $this->prd_count;
    }

function updatePass($id)
{
$sql="UPDATE login  SET  password= '$this->password',last_login= '$this->last_login'  WHERE customer_id='$id'";
echo $sql;
$result = $this->database->query($sql);
$result = $this->database->result;
}
 function selectbyusername()
{
  $sql = "SELECT  login.password from login  join shop on login.email =shop.email or login.mobile=shop.mobile";
//echo $sql;
  $result =  $this->database->query($sql);
  $result = $this->database->result;
  $row = mysql_fetch_object($result);
   //$this->customer_id=$row->customer_id;
   // $this->username = $row->username; 
    $this->password= $row->password; 
  
   
   }
   function selectbyname()
{
  $sql = "SELECT  login.password from login  join customer_details on login.email =customer_details.email or login.mobile=customer_details.mobile";
//echo $sql;
  $result =  $this->database->query($sql);
  $result = $this->database->result;
  $row = mysqli_fetch_object($result);
   //$this->customer_id=$row->customer_id;
   // $this->username = $row->username; 
    $this->password= $row->password; 
  
   
   }



// **********************
// DELETE
// **********************


function delete($id)
{
	$sql = "DELETE FROM login WHERE login_id = $id;";
	$result = $this->database->query($sql);

}


// **********************
// UPDATE
// **********************

function update($id)
{
$sql = " UPDATE login  SET  password = '$this->password',mobile= '$this->mobile,email= '$this->email,type_id= '$this->type_id',last_login=now() WHERE customer_id = '$id' ";
$result = $this->database->query($sql);

}
function updatebyid($reg,$id)
{
$sql = " UPDATE login set password='$reg' WHERE customer_id = '$id' ";
//echo $sql;
$result = $this->database->query($sql);
 $result = $this->database->result;
        return $result;

}
#####################################
//count
#####################################
function countAll() {
        $sql = "SELECT count(*) as prd_count from login";
		$result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }




    function redirect($url)
  { 
  
    echo "<script language=JavaScript>document.location.href='" . $url . "' </script>";
         
  
  } 


function selectId(){
  $sql = "SELECT email FROM login WHERE login_id = $id;";

  $result =  $this->database->query($sql);
  $result = $this->database->result;
  return $result;  
}
function GeneratePassword($username)
{

  $sql = " UPDATE login SET  password = '$this->password',onetime=1 WHERE email = '$username' or mobile='$username' ";

  $result = $this->database->query($sql);



}
       
        function loginn($username,$userpass)
  {
        
      $sql="select * from login where (email='$username' OR mobile='$username') and password='".$userpass."'";

			$result = $this->database->query($sql);
			$result = $this->database->result;$this->num_rows = $this->database->db_countRows($result);
			if ($this->num_rows==0) //check the case of the password
 			{
				return 0;
			}
			else
			{
				$sql = " UPDATE login SET  last_login=ADDTIME( NOW( ) ,  '05:30:00' ) WHERE email= '$username' or mobile='$username'";

                                $this->database->query($sql);
				return $result;
				
			}   

  }
  
}
?>
