<?php
include('db.php');
if($_POST)
{
$q=$_POST['search'];
$sql_res=mysql_query("select id,name from autocomplete where name like '%$q%' order by id LIMIT 5");
while($row=mysql_fetch_array($sql_res))
{
$username=$row['name'];

$b_username=$q;
$final_username = str_ireplace($q, $b_username, $username);

?>

<span class="name"><?php echo $final_username; ?></span>&nbsp;<br/><br/>
</div>
<?php
}
}
?>
