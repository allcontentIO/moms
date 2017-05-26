<?php
ob_start(); session_start();

include("includes/connect.php");

//sleep( 3 );
// no term passed - just exit early with no response
if (empty($_GET['term'])) exit ;
$q = strtolower($_GET["term"]);
// remove slashes if they were magically added

if($q)
{
	$query=mysql_query("select id,mediaOutlet from tbl_broad_media mediaOutlet LIKE  '%".$q."%' ORDER BY mediaOutlet ASC ");
	//echo "select distinct(cate_name) from tbl_category where status = 'A' and cate_name LIKE  '%".$q."%'";
	$result = array();
	while($res_cust=mysql_fetch_array($query))
	{
		$customer=$res_cust['mediaOutlet'];
		array_push($result,$customer);
	}
}



echo json_encode($result);

?>