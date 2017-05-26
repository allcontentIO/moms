<?php 
ob_start();
session_start();
 
include('includes/connect.php');
include('includes/conf.php');


$sql="SELECT * FROM publication_issue iss join publication pub ON iss.id_publication = pub.id_publication where 1 and iss.id_publication_issue = '420521' order by iss.id_publication";
$query = mysql_fetch_array(mysql_query($sql));


$cur_date = "";
$d = date('Y-m-d');




if ($query) {
   //print_r($query);exit;

	
	if($query['id_frequency'] == '1')
	{
		
		$d1 = strtotime(date('Y-m-d'));
		$d2 = strtotime($query['email_freq1']);
		
		if($d1 > $d2 || $query['email_freq1'] =="")
		{
		    echo "1";
			mysql_query("update publication_issue set email_freq1 = '$d' where id_publication_issue = '".$query['id_publication_issue']."'");
		}
		
		
   }
   else
   if($query['id_frequency'] == '2')
   {
       
        $timestamp = strtotime(date('Y-m-d'));
		$day = date('l', $timestamp);
		
		
		$d1 = strtotime(date('Y-m-d'));
		$d2 = strtotime($query['email_freq2']);
		
		if($d1 > $d2 || $query['email_freq2'] =="")
		{
			
			if($day == $query['expected_day'])
			{
				 
			echo "2";
			
			mysql_query("update publication_issue set email_freq2 = '$d' where id_publication_issue = '".$query['id_publication_issue']."'");
			
			}
		}
		
	    //echo $day;
   
   }
   else
   if($query['id_frequency'] == '3')
   {
   
      	$d1 = strtotime(date('Y-m-d'));
		$d2 = strtotime($query['email_freq3']);
		
		if($d1 > $d2 || $query['email_freq3'] =="")
		{
			$timestamp = strtotime(date('Y-m-d'));
			$day = date('l', $timestamp);
		   
			$days = explode(',',$query['expected_day']);
		   
			  if(in_array($day,$days))
			  {
			  
				echo "3";
				mysql_query("update publication_issue set email_freq3 = '$d' where id_publication_issue = '".$query['id_publication_issue']."'");
			  }
	  }
   
   }
   else
   if($query['id_frequency'] == '4')
   {
      
	  
	 $d1 = strtotime(date('Y-m-d'));
	 $d2 = strtotime($query['email_freq3']);
		
	 if($d1 > $d2 || $query['email_freq3'] =="")
	 { 
	  
	 $get_d = explode('-',$query['expected_day']); 
	 $new_date = $get_d[2]."-".date('m-Y');
	 
	  
			 if($d == $new_date)
			 { 
						echo "4";
						
						mysql_query("update publication_issue set email_freq4 = '$d' where id_publication_issue = '".$query['id_publication_issue']."'");
			 
			 
			 }
	  
	  
	  
	
     }
   }
   else
   if($query['id_frequency'] == '5')
   {
   
		 $d1 = strtotime(date('Y-m-d'));
		 $d2 = strtotime($query['email_freq5']);
		 
		if($query['email_freq5'] =="")
		{ 
			if($d == $query['expected_date'])
			{
				$d = date('Y-m-d', strtotime("+2 months", strtotime($query['expected_date'])));
				
				echo "5";
				mysql_query("update publication_issue set email_freq5 = '$d' where id_publication_issue = '".$query['id_publication_issue']."'");
			}
		}
		else
		{
		   if($d == $query['email_freq5'])
			{
				$d = date('Y-m-d', strtotime("+2 months", strtotime($query['email_freq5'])));
				
				echo "5";
				mysql_query("update publication_issue set email_freq5 = '$d' where id_publication_issue = '".$query['id_publication_issue']."'");
			}
		}
	   
   
   
   
    mysql_query("update publication set email_freq5 = '$d' where id_publication_issue = '".$query['id_publication_issue']."'");
   }
   else
   if($query['id_frequency'] == '6')
   {
   
    // mysql_query("update publication set email_freq6 = '".$query['expected_day']."' where id_publication_issue = '".$query['id_publication_issue']."'");
   
		$d1 = strtotime(date('Y-m-d'));
		$d2 = strtotime($query['email_freq6']);
	  
		if($query['email_freq6'] =="")
		{ 
			if($d == $query['expected_date'])
			{
				$d = date('Y-m-d', strtotime("+3 months", strtotime($query['expected_date'])));
				echo "6";
				
				mysql_query("update publication_issue set email_freq6 = '$d' where id_publication_issue = '".$query['id_publication_issue']."'");
			}
		}
		else
		{
		   if($d == $query['email_freq6'])
			{
				$d = date('Y-m-d', strtotime("+3 months", strtotime($query['email_freq6'])));
				
				echo "6";
				mysql_query("update publication_issue set email_freq6 = '$d' where id_publication_issue = '".$query['id_publication_issue']."'");
			}
		}
   
   
   }
   else
   if($query['id_frequency'] == '7')
   {
   
    	 $d1 = strtotime(date('Y-m-d'));
		 $d2 = strtotime($query['email_freq7']);
		 
		if($query['email_freq7'] =="")
		{ 
			if($d == $query['expected_date'])
			{
				$d = date('Y-m-d', strtotime("+2 year", strtotime($query['expected_date'])));
				
				echo "7";
				mysql_query("update publication_issue set email_freq7 = '$d' where id_publication_issue = '".$query['id_publication_issue']."'");
			}
		}
		else
		{
		   if($d == $query['email_freq7'])
			{
				$d = date('Y-m-d', strtotime("+2 year", strtotime($query['email_freq7'])));
				
				echo "7";
				mysql_query("update publication_issue set email_freq7 = '$d' where id_publication_issue = '".$query['id_publication_issue']."'");
			}
		}
	   
   }
   else
   if($query['id_frequency'] == '8')
   {
      
	  
	 $d1 = strtotime(date('Y-m-d'));
	 $d2 = strtotime($query['email_freq3']);
		
	 if($d1 > $d2 || $query['email_freq3'] =="")
	 { 
	  
	 $get_d = explode('-',$query['expected_day']); 
	 $new_date = $get_d[2]."-".$get_d[1]."-".date('Y');
	 
	  
			 if($d == $new_date)
			 { 
					
			 echo "8";
				 
			 }
	  
	  
	  
	
     }
   }
   else
   if($query['id_frequency'] == '9')
   {
      
	  
		$timestamp = strtotime(date('Y-m-d'));
		$day = date('l', $timestamp);
		
		
		$d1 = strtotime(date('Y-m-d'));
		$d2 = strtotime($query['email_freq2']);
		
		$inc = '0';
		
		$upd = $d."_".$inc;
		
		if($d1 > $d2 || $query['email_freq9'] =="")
		{
			
			if($query['email_freq9'] == "")
			{
			    
				$dd = $d."_".$inc;
				$exp = explode($dd);
			}
			else
			{
				$exp = explode($query['email_freq9']);
			}
			
			if($day == $query['expected_day'] && ($exp[1] % 2) == 0)
			{
				 
			$inc = $exp[1] + 1;
		
			$upd = $d."_".$inc;
			
			
			echo "9";
			
			mysql_query("update publication_issue set email_freq9 = '$upd' where id_publication_issue = '".$query['id_publication_issue']."'");
			
			}
		}
   }


/*	require("phpmailer/class.phpmailer.php");
	
	$mail = new PHPMailer();
	$mail->IsSMTP();    // set mailer to use SMTP
	$mail->From = $_SITENAME;    //From Address -- CHANGE --
	$mail->FromName = $_SITENAME;    //From Name -- CHANGE --
	$mail->AddAddress($query['email'], "User");    //To Address -- CHANGE --
	$mail->AddBcc("sourabhs@custom-soft.com", "User");    //To Address -- CHANGE --
	$mail->IsHTML(false);    // set email format to HTML
	$mail->Subject = "Notification:Your expected date crossed";
	$mail->Body    = "Hello ".$query['name_publication_en'].",
	<br /><br />
	This is to inform you that you have exceeded your expected date i.e. ".date('Y-m-d',strtotime($query['expected_date'])).".";
*/

}





?>