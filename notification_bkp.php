<?php 
ob_start();
session_start();
 
include('includes/connect.php');
include('includes/conf.php');


$sql="SELECT * FROM publication_issue iss join publication pub ON iss.id_publication = pub.id_publication where 1 and pub.expected_date  = DATE_ADD(CURDATE(), INTERVAL 0 DAY) and iss.publication_status=0 order by iss.id_publication";
$query = mysql_fetch_array(mysql_query($sql));

print_r($query);exit;



if ($query) {
    
	$to = $query['email'];
	//$to = 'sourabhs@custom-soft.com';
	$subject= "Notification:Your expected date crossed";
	$message= "Hello ".$query['name_publication_en'].",
	<br /><br />
	This is to inform you that you have exceeded your expected date i.e. ".date('d-m-Y',strtotime($query['expected_date'])).".<br /><br />Thanks,<br />Media Outlet Management System";

    $headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= "From: $from \r\n"."Reply-To: $to \r\n"; 

   
   
    //$subject = str_replace("#ticket_id#", $arrFields["ticket_id"], $subject);   
   
   
    if(mail($to, $subject, $message,$headers))
    {
        return true;
    }
    else
    {
        return false;
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
	This is to inform you that you have exceeded your expected date i.e. ".date('d-m-Y',strtotime($query['expected_date'])).".";
*/

}





?>