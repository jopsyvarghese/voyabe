<?php
/******************************************************************************
*
* Filename:     logincheck.php
*
* Description:  admin home page.
*
* Author:       GinsB
*

******************************************************************************/

session_start();

require_once ("dbclasses/login.php");

$login_obj=new Login();

$password =md5($_REQUEST['password']);
$adminarr=$login_obj->login2($_REQUEST['username'],$password);

    if($adminarr[0]==0){
         $login_obj->redirect("login.php?msg=invalid");   
           }
       else{
            $_SESSION['login_id'] = $adminarr[0];
			$_SESSION['type_id'] = $adminarr[4];
            $_SESSION['customer_id'] = $adminarr[5];
            $one_time = $adminarr[7];
      if($one_time=='0'){
    if($_SESSION['type_id']==1)
        {
	       $login_obj->redirect("adminpanel/shop_admin/dashboard.php");   
        }else{
		$login_obj->redirect("index.php"); 
	    }
      }else{
        $login_obj->redirect("voyabe-login.php?notactivated=true");    
      }
 }






?>


