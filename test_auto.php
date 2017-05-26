<?php
 mysql_connect("192.168.0.27","root","root");
 mysql_select_db("db_moms");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script>
$(function() {

alert('hi');

	var printmedia = [
	<?php
    $sql=mysql_query("select id,mediaOutlet from tbl_broad_media ORDER BY mediaOutlet ASC");
	while($row=mysql_fetch_assoc($sql))
	{
	 echo'"';
	 echo $row['mediaOutlet'];
	 echo'",';
	}
	?>
	];
	
	
	
	$( "#search_outlet" ).autocomplete({
	source: printmedia
	});
});
</script>
</head>

<body>
<input type="text" name="search_outlet" id="search_outlet">

</body>
</html>
