<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Autocomplete</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<?php
 mysql_connect("Localhost","root","root");
 mysql_select_db("test_csv");
 $sql="select name from user_info";
 $result=mysql_query($sql); 
?>
<script>
$(function() {
var availableTags = [
<?php
while($row=mysql_fetch_assoc($result))
{
 echo'"';
 echo $row['name'];
 echo'",';
}
?>
];
$( "#tags" ).autocomplete({
source: availableTags
});
});
$(function() {
var available = [
<?php
 $sql="select email from user_info";
 $result=mysql_query($sql); 
while($row=mysql_fetch_assoc($result))
{
 echo'"';
 echo $row['email'];
 echo'",';
}
?>
];
$( "#mytag" ).autocomplete({
source: available
});
});
</script>
</head>
<body>
<div class="ui-widget">
<label for="tags">User Names: </label>
<input id="tags">
</div>
<br>
<br>
<br>
&nbsp;&nbsp;<div class="ui-widget">
<label for="mytag">E-Mail: </label>
<input id="mytag">
</div>
</body>
</html>