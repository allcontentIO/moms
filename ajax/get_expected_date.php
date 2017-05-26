<?php
ob_start();
session_start();
 
include('../includes/connect.php');



		$sql = mysql_fetch_assoc(mysql_query("SELECT expected_date,expected_day FROM publication where name_publication_en='".$_REQUEST['id_publication']."'"));
		
          		
        if(trim($sql['expected_date']) != "")  
		{
		    echo "Expected Date_".trim($sql['expected_date']);
		}
		else
		{
        	echo "Expected Days_".trim($sql['expected_day']);
        } 
?> 
    