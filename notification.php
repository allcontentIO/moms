<?php 
ob_start();
session_start();
set_time_limit(0); 
include('includes/connect.php');
include('includes/conf.php');


$sql="SELECT * FROM publication_issue iss join publication pub ON iss.id_publication = pub.id_publication where publication_status = '1' order by iss.id_publication";


$qr = mysql_query($sql);


$cur_date = "";
$d = date('Y-m-d');
//echo $d;
//$d = '2015-01-22';

$array_ids = array();

if ($qr) {
   //print_r($query);exit;


while($query = mysql_fetch_array($qr)){


	
	if($query['id_frequency'] == '1')
	{
		
		$d1 = strtotime($d);
		$d2 = strtotime($query['email_freq1']);
		
		if($d1 > $d2 || $query['email_freq1'] =="")
		{
		    //echo "1";
			
			array_push($array_ids,$query['id_publication_issue']);
		    //$subject = str_replace("#ticket_id#", $arrFields["ticket_id"], $subject);   
         	mysql_query("update publication_issue set email_freq1 = '$d' where id_publication_issue = '".$query['id_publication_issue']."'");
		
		}
		
   }
   else
   if($query['id_frequency'] == '2')
   {
       
        $timestamp = strtotime($d);
		$day = date('l', $timestamp);
		//echo $day;
		
		$d1 = strtotime($d);
		$d2 = strtotime($query['email_freq2']);
		
		
		
		
		if($d1 > $d2 || $query['email_freq2'] =="")
		{
			
			if($day == $query['expected_day'])
			{
				 
			//echo "2";
			array_push($array_ids,$query['id_publication_issue']);
			mysql_query("update publication_issue set email_freq2 = '$d' where id_publication_issue = '".$query['id_publication_issue']."'");
			
			}
		}
		
	    //echo $day;
   
   }
   else
   if($query['id_frequency'] == '3')
   {
   
      	$d1 = strtotime($d);
		$d2 = strtotime($query['email_freq3']);
		
		if($d1 > $d2 || $query['email_freq3'] =="")
		{
			$timestamp = strtotime(date('Y-m-d'));
			$day = date('l', $timestamp);
		   
			$days = explode(',',$query['expected_day']);
		   
			  if(in_array($day,$days))
			  {
			  
				//echo "3";
				array_push($array_ids,$query['id_publication_issue']);
			    mysql_query("update publication_issue set email_freq3 = '$d' where id_publication_issue = '".$query['id_publication_issue']."'");
			  }
	  }
   
   }
   else
   if($query['id_frequency'] == '4')
   {
    
	  
	 $d1 = strtotime($d);
	 $d2 = strtotime($query['email_freq4']);
		
	 if($d1 > $d2 || $query['email_freq4'] =="")
	 { 
	  
 
	 $get_d = explode('-',$query['expected_date']); 
	 $new_date = date('Y-m')."-".$get_d[2];
      
	 echo $d." ".$new_date;
	  	
			 if($d == $new_date)
			 { 
						//echo "4";
						array_push($array_ids,$query['id_publication_issue']);
						mysql_query("update publication_issue set email_freq4 = '$d' where id_publication_issue = '".$query['id_publication_issue']."'");
			 
			 
			 }
	  
	  
	  
	
     }
   }
   else
   if($query['id_frequency'] == '5')
   {
   
		 $d1 = strtotime($d);
		 $d2 = strtotime($query['email_freq5']);
		 
		if($query['email_freq5'] =="")
		{ 
			if($d == $query['expected_date'])
			{
				$d = date('Y-m-d', strtotime("+2 months", strtotime($query['expected_date'])));
				
				//echo "5";
				array_push($array_ids,$query['id_publication_issue']);
				mysql_query("update publication_issue set email_freq5 = '$d' where id_publication_issue = '".$query['id_publication_issue']."'");
			}
		}
		else
		{
		
		   
		   if($d == $query['email_freq5'])
			{
				$d = date('Y-m-d', strtotime("+2 months", strtotime($query['email_freq5'])));
				
				//echo "5";
				array_push($array_ids,$query['id_publication_issue']);
				mysql_query("update publication_issue set email_freq5 = '$d' where id_publication_issue = '".$query['id_publication_issue']."'");
			}
		}
	   
   
   
   
   // mysql_query("update publication set email_freq5 = '$d' where id_publication_issue = '".$query['id_publication_issue']."'");
   }
   else
   if($query['id_frequency'] == '6')
   {
   
    // mysql_query("update publication set email_freq6 = '".$query['expected_day']."' where id_publication_issue = '".$query['id_publication_issue']."'");
   
		$d1 = strtotime($d);
		$d2 = strtotime($query['email_freq6']);
	  
		if($query['email_freq6'] =="")
		{ 
			if($d == $query['expected_date'])
			{
				$d = date('Y-m-d', strtotime("+3 months", strtotime($query['expected_date'])));
				//echo "6";
				array_push($array_ids,$query['id_publication_issue']);
				mysql_query("update publication_issue set email_freq6 = '$d' where id_publication_issue = '".$query['id_publication_issue']."'");
			}
		}
		else
		{
		   if($d == $query['email_freq6'])
			{
				$d = date('Y-m-d', strtotime("+3 months", strtotime($query['email_freq6'])));
				
				//echo "6";
				array_push($array_ids,$query['id_publication_issue']);
				mysql_query("update publication_issue set email_freq6 = '$d' where id_publication_issue = '".$query['id_publication_issue']."'");
			}
		}
   
   
   }
   else
   if($query['id_frequency'] == '7')
   {
   
    	 $d1 = strtotime($d);
		 $d2 = strtotime($query['email_freq7']);
		 
		if($query['email_freq7'] =="")
		{ 
			if($d == $query['expected_date'])
			{
				$d = date('Y-m-d', strtotime("+2 year", strtotime($query['expected_date'])));
				
				echo "7";
				array_push($array_ids,$query['id_publication_issue']);
				mysql_query("update publication_issue set email_freq7 = '$d' where id_publication_issue = '".$query['id_publication_issue']."'");
			}
		}
		else
		{
		   if($d == $query['email_freq7'])
			{
				$d = date('Y-m-d', strtotime("+2 year", strtotime($query['email_freq7'])));
				
				echo "7";
				array_push($array_ids,$query['id_publication_issue']);	
				mysql_query("update publication_issue set email_freq7 = '$d' where id_publication_issue = '".$query['id_publication_issue']."'");
			}
		}
	   
   }
   else
   if($query['id_frequency'] == '8')
   {
      
	  
	 $d1 = strtotime($d);
	 $d2 = strtotime($query['email_freq8']);
		
	 if($d1 > $d2 || $query['email_freq8'] =="")
	 { 
	  
	 $get_d = explode('-',$query['expected_date']); 
	 $new_date = date('Y')."-".$get_d[1]."-".$get_d[2];
	 
	  
			 if($d == $new_date)
			 { 
					
				echo "8";
				array_push($array_ids,$query['id_publication_issue']);
				mysql_query("update publication_issue set email_freq8 = '$d' where id_publication_issue = '".$query['id_publication_issue']."'");
					 
			 }
	  
	  
	  
	
     }
   }
   else
   if($query['id_frequency'] == '9')
   {
      
	  
		$timestamp = strtotime($d);
		$day = date('l', $timestamp);
		
		
		$d1 = strtotime(date('Y-m-d'));
		$d2 = strtotime($query['email_freq2']);
		
		$inc = '0';
		
		$upd = $d."_".$inc;
		
		
		
			if($query['email_freq9'] == "")
			{
			    
				$dd = $d."_".$inc;
				$exp = explode('_',$dd);
			}
			else
			{
				$exp = explode('_',$query['email_freq9']);
			}
			
		
			
			if($day == $query['expected_day'])
			{
				 
			
			$inc = $exp[1] + 1;
		
			$upd = $d."_".$inc;	 
			mysql_query("update publication_issue set email_freq9 = '$upd' where id_publication_issue = '".$query['id_publication_issue']."'");	 
				 
				if(($exp[1] % 2) == 0)	 
				{	 
					echo "9";
					array_push($array_ids,$query['id_publication_issue']);
					
					mysql_query("update publication_issue set email_freq9 = '$upd' where id_publication_issue = '".$query['id_publication_issue']."'");
				}
			}
		
   }
  
   }
    
   //echo "<pre>";	
   //print_r($array_ids);
   $str = implode(',',$array_ids);
   //echo $str;
   
   $get_data = mysql_query("SELECT * FROM publication_issue iss join publication pub ON iss.id_publication = pub.id_publication where  iss.id_publication_issue IN ($str) order by iss.id_publication");
   
 
   $num_rows = mysql_num_rows($get_data);
   
   $tbl = "";
   
   $tbl .= "<table border='1' style='width:90%'>
			  <tr>
				 <th style='width:10%'><strong>Sr No.</strong></th>
				 <th style='width:40%'><strong>Outlet Name</strong></th>
				 <th style='width:40%'><strong>Delivery</strong></th>
			  </tr>";
   $i = 1;
   while($row = mysql_fetch_array($get_data))
   {
   
     if($row['id_frequency'] == '1')
	 { 
		 $day = date('Y-m-d');
     }
	 else
	 {
	   
		if($row['expected_date'] != "0000-00-00")
		{ 
			$day = $row['expected_date']; 
		}
		else
		{
			$day = $row['expected_day']; 
		}
	 }
	
	 if(!empty($row['del_method']))
	 {
	     $delivery = $row['del_method'];
	 }
	 else
	 {
		 $delivery = "N/A";
	 }
	
	
		
   	$tbl .= "<tr><td>".$i."</td><td>".$row['name_publication_en']."</td><td>".$delivery."</td></tr>";   
  
    $i++;
   }
   
   $tbl .= "</table>";
   
   /*echo "<br>";
   echo $tbl;*/
   
   if($num_rows > 0)
   {
   // $to = $query['email'];
	$to = 'dubaibizniz@gmail.com';
	$subject  = "Notification:Your expected date crossed";
	$msg .= "Hello Administrator,
	<br /><br />
	Please check following list of issues:<br />";
	$msg .= $tbl; 
	
	$msg .= "<br /><br />Thanks,<br />Media Outlet Management System";

    $headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= "From: $from \r\n"."Reply-To: $to \r\n"; 

    //echo $msg;
   
    //$subject = str_replace("#ticket_id#", $arrFields["ticket_id"], $subject);   
   
   
    if(mail($to, $subject, $msg,$headers))
    {
        echo "Mail Sent Successfully"; 
    }
    else
    {
        echo "Err"; 
    }
   
   }
   
}





?>