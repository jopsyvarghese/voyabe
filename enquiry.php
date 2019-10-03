<?php
include_once("dbclasses/login.php");
include_once("utils/adminmail.php");
$adminmail=new AdminMail();
    $name=$_REQUEST['name'];
    $mobile=$_REQUEST['mobile'];
    $email=$_REQUEST['email'];
    $adminmail->send_email($name,$mobile,$email);
 	echo "<script language=JavaScript>document.location.href='index.php' </script>";
?>