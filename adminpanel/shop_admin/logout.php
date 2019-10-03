<?php    session_start();
			unset($_SESSION['login_id']);
			unset($_SESSION['type_id']);
			unset($_SESSION['customer_id']);

echo "<script language=JavaScript>document.location.href='http://www.voyabe.com/' </script>";
?>