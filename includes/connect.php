<?php
	
	$con = 0;
	if($con == 0)  /// for local server
	{
		//Database Connection
		$host = "localhost";
		$user = "emediasearch";
		$pass = "iw2blm";
		$conn = mysql_connect($host,$user,$pass);
		mysql_select_db("emediasearch");
		///////////////////////////////////////////////
	}
	
	define("RECORD_PER_PAGE",10);
	define("PAGE_LINKS_PER_PAGE", 4); 

	
	
?>
