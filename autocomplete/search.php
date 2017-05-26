<?php
ob_start(); session_start();

include_once("../../../includes/connect.php");

//sleep( 3 );
// no term passed - just exit early with no response
if (empty($_GET['term'])) exit ;
$q = strtolower($_GET["term"]);
// remove slashes if they were magically added
if (get_magic_quotes_gpc()) $q = stripslashes($q);



$query=mysql_query("select * from tbl_customers where concat(first_name,' ',last_name) like '%".$q."%' or email like '%".$q."%' or mobile_number like '%".$q."%' or landline_number like '%".$q."%'");
$result = array();
while($res_cust=mysql_fetch_array($query))
{
	$customer=$res_cust['id'].' '.$res_cust['first_name'].' '.$res_cust['last_name'];
	//$customer=$res_cust['first_name'].' '.$res_cust['last_name'];
	array_push($result,$customer);
}




// json_encode is available in PHP 5.2 and above, or you can install a PECL module in earlier versions
echo json_encode($result);

?>