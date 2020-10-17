<?php
	
	$con = 0;
	if($con == 0)  /// for local server
	{
		//Database Connection
		$host = "localhost";
		$user = "moms";
		$pass = "chngeme";
		$conn = mysql_connect($host,$user,$pass);
		mysql_select_db("moms");
		///////////////////////////////////////////////
	}
	
	define("RECORD_PER_PAGE",10);
	define("PAGE_LINKS_PER_PAGE", 4); 

	
	
?>
