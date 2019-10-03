<?php
class Database
 { // Class : begin
 
	var $host;  	//Hostname, Server
	var $password; 	//Passwort MySQL
	var $user; 		//User MySQL
	var $database; 	//Databasename MySQL
	var $link;
	var $query;
	var $result;
	
	function Database()
	{ 
		
				
		$this->host = "localhost";                  //          <<---------
		$this->password = "";           //          <<---------
		$this->user = "root";                   //          <<---------
		$this->database = "preat0pa_voyabe";           //          <<---------
		$this->rows = 0;
 
 
		// **********************************************
	} 
	
	function OpenLink()
	{

		$this->link = mysqli_connect($this->host,$this->user,$this->password) ;//or die (print "Class Database: Error while connecting to DB (link)")
	} 
	
	 function getLink()
    {
        $con = mysqli_connect($this->host,$this->user,$this->password);
        return $con;
    }
	
	
	function SelectDB()
	{ 
	
		mysqli_select_db($this->link,$this->database); //or die (print "Class Database: Error while selecting DB");
	
	} 
	
	
	function CloseDB()
	{
		mysqli_close();
	} 
	
	function Query($query)
	{ 
		$this->OpenLink();
		$this->SelectDB();
		$this->query = $query;
		//echo $query;
     	$this->result = mysqli_query($this->link,$query);
		
		//or die(header('location:error.php'));	
		//or die (mysql_errno().'-'.mysql_error());	
		/*if(ereg("SELECT",$query))
		{
			//$this->rows = mysql_num_rows($this->result);
			$this->rows = mysql_fetch_row($this->result);
		}*/
		//$this->rows = mysql_fetch_array($this->result);
		return mysqli_errno($this->link);exit;		
		$this->CloseDB();
	} 
	
	///////////////////////////Added by Nisha 20/2/2010//////////////////////////////
	function db_selectData($query)
	{
	$this->OpenLink();
	$this->SelectDB();
	$this->query=$query;
	$this->result= mysqli_query($this->link,$this->query);
	return $this->result;
	
	}
	function db_countRows($res)
	{
	$this->numrows = mysqli_num_rows($res);
	return $this->numrows;
	}
	
	
	function db_fetchrows($result)
	{
	$this->row = mysqli_fetch_array($result);
	return $this->row;
	}
	
	function db_fetchrow($result)
	{
	$this->row = mysqli_fetch_row($result);
	return $this->row;
	}

	function db_rowsAffected()
	{
	$this->affectedrow=mysqli_affected_rows();
	return $this->affectedrow;
	}
  
 } // Class : end
 ?>