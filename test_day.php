<?php   
     $timestamp = date('Y-m-d');
		
	// $day = date('l', $timestamp);
	 echo date('Y-m-d', strtotime("+2 year", strtotime($timestamp)));
	 
	 $date = strtotime(date("Y-m-d", strtotime($date)) . " +1 month");
		
?>		
		