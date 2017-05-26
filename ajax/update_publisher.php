<?php
ob_start();
session_start();
$limit = 10;
$adjacent = 3;
include('../includes/connect.php');
$task=$_REQUEST["task"];
extract($_POST);

	$sql_update = mysql_query("UPDATE publisher  SET  `status` = '".$status."',`name_publisher_en` = '".$name_publisher_en."',`name_publisher_ar` = '".$name_publisher_ar."',`id_country` = '".$id_country."', `url` = '".$url."',`phone` = '".$phone."',`email` = '".$email."',`fax` = '".$fax."',`modified` = '".date('Y-m-d H:i:s')."' WHERE `id_publisher`='".$_POST['id_publisher']."'");


if(isset($_REQUEST['actionfunction']) && $_REQUEST['actionfunction']!=''){
$actionfunction = $_REQUEST['actionfunction'];
  
   call_user_func($actionfunction,$_REQUEST,$con,$limit,$adjacent);
}
function showData($data,$con,$limit,$adjacent){

  			
		      if(!empty($_REQUEST[task])){
                        $sql = "SELECT * FROM publisher where 1";
						$sqls='';
						if(!empty($_REQUEST[search_publisher_status])){
						
						   $sqls.=" AND status='".$_REQUEST[search_publisher_status]."'";
						}
						if(!empty($_REQUEST[search_publisher_country])){
						
						   $sqls.=" AND id_country ='".$_REQUEST[search_publisher_country]."'";
						}
						if(!empty($_REQUEST[search_publisher])){
						
						   $sqls.=" AND id_publisher ='".$_REQUEST[search_publisher]."'";
						}
						
			          
		
		       }
  $page = $data['page'];
   if($page==1){
   $start = 0;  
  }
  else{
  $start = ($page-1)*$limit;
  }
  $sql = "SELECT * FROM publisher  where 1 $sqls";
  
  //echo $sql;
  
  $rows  = mysql_query($sql);
  $rows  = mysql_num_rows($rows);
  //$c  = mysql_num_rows($rows);
  
  $sql = "SELECT * FROM publisher where 1 $sqls ORDER BY id_publisher DESC limit $start,$limit";
  //echo $sql;
  $data = mysql_query($sql);
  
    echo "<h3 style='color:green;' align='center'> Record updated succesfully.</h3>";
		echo "<br>";
  
      if($_SESSION['moms_uid'] == '1' && $_SESSION['moms_type'] == "super_admin")
	 {
	   $str='<div style="overflow:auto; margin-left:0;" class="row"><table class="table-fill">
			<thead>
			<tr>
				<th class="text-left">Name</th>
				<th class="text-left">Country</th>
				<th class="text-left">Email</th>
				<th class="text-left">Telephone</th>
				<th class="text-left">URL</th>
				<th class="text-center">Action<span style="color:#22b5d4">Action</span></th>
			</tr>
			</thead>';
	 }
	 else
	 if($_SESSION['moms_uid'] == '1' && $_SESSION['moms_type'] == "admin")
	 {
	  $str='<div style="overflow:auto; margin-left:0;" class="row"><table class="table-fill">
			<thead>
			<tr>
				<th class="text-left">Name</th>
				<th class="text-left">Country</th>
				<th class="text-left">Email</th>
				<th class="text-left">Telephone</th>
				<th class="text-left">URL</th>
				<th class="text-center">Action<span style="color:#22b5d4">Action</span></th>
			</tr>
			</thead>';
	 
	 }
	 if($_SESSION['moms_uid'] == '1')
	 {
	 	$str='<div style="overflow:auto; margin-left:0;" class="row"><table class="table-fill">
			<thead>
			<tr>
				<th class="text-left">Name</th>
				<th class="text-left">Country</th>
				<th class="text-left">Email</th>
				<th class="text-left">Telephone</th>
				<th class="text-left">URL</th>
				<th class="text-center">Action<span style="color:#22b5d4">Action</span></th>
			</tr>
			</thead>';
	 }
     else
	 if($_SESSION['moms_type'] == "super_admin")
	 {
	  $str='<div style="overflow:auto; margin-left:0;" class="row"><table class="table-fill">
			<thead>
			<tr>
				<th class="text-left">Name</th>
				<th class="text-left">Country</th>
				<th class="text-left">Email</th>
				<th class="text-left">Telephone</th>
				<th class="text-left">URL</th>
				<th class="text-center">Action<span style="color:#22b5d4">Action</span></th>
			</tr>
			</thead>';
	 }
	 else
	 if($_SESSION['moms_type'] == "admin")
	 {
	  $str='<div style="overflow:auto; margin-left:0;" class="row"><table class="table-fill">
			<thead>
			<tr>
				<th class="text-left">Name</th>
				<th class="text-left">Country</th>
				<th class="text-left">Email</th>
				<th class="text-left">Telephone</th>
				<th class="text-left">URL</th>
				<th class="text-center">Action<span style="color:#22b5d4">Action</span></th>
				
			</tr>
			</thead>';
	 
	 }
  
  
  
  
  
  
 
  if(mysql_num_rows($data)>0){
   while( $row = mysql_fetch_array($data)){
                  $country=mysql_fetch_assoc(mysql_query("select name_country from country where id_country=".$row['id_country']));
				
			   
	 
	   if($row['status']=='A')
	   {
          $img = "images/greencircle.png";
       } 
	   else
	   {
	      $img = "images/redcircle.png";
	   }
	   
	   
	   
    
	    $edit_link = "<a href='add_publisher.php?task=edit&id_publisher=".$row['id_publisher']."' class='slit'><img src='images/Edit_2.png' width='18' height='18'></a>";

       	   
	    $del_link = "<a href='javascript:void(0)' onClick='confirm_delete(".$row['id_publisher'].",4)'><img src='images/Delete_2.png' width='18' height='18'></a>";   
		
		$view_link = "<a href='add_publisher.php?task=view&id_publisher=".$row['id_publisher']."' class='slit'><img src='images/view_2.png' width='20' height='20'></a>";  

	   
	   if(empty($row['url']))
	   {
	    $url = "N/A";
	   }
	   else
	   {
	    $url = $row['url'];
	   }
	   
	  if($_SESSION['moms_uid'] == '1' && $_SESSION['moms_type'] == "super_admin")
	 {
	    $str.='<tr><td class="text-left" style="text-align:left"><img src="'.$img.'" width="14" height="14">&nbsp;<a href="view_media.php?id_publisher='.$row['id_publisher'].'" class="slit">'
	  .$row['name_publisher_en'].'</a></td>
				<td class="text-left" style="text-align:left;padding-left:10px;">'.$country['name_country'].'</td>
				<td class="text-left" style="text-align:left;padding-left:10px;">'.$row['email'].'</td>
				<td class="text-left" style="text-align:left;padding-left:10px;">'.$row['phone'].'</td>
				<td class="text-left" style="text-align:left;padding-left:10px;">'.$url.'</td>
				<td class="text-left" style="text-align:left;padding-left:10px;">'.$view_link.'|'.$edit_link.'|'.$del_link.'</td></tr>';
	 }
	 else
	 if($_SESSION['moms_uid'] == '1' && $_SESSION['moms_type'] == "admin")
	 {
	  $str.='<tr><td class="text-left" style="text-align:left"><img src="'.$img.'" width="14" height="14">&nbsp;<a href="view_media.php?id_publisher='.$row['id_publisher'].'" class="slit">'
	  .$row['name_publisher_en'].'</a></td>
				<td class="text-left" style="text-align:left;padding-left:10px;">'.$country['name_country'].'</td>
				<td class="text-left" style="text-align:left;padding-left:10px;">'.$row['email'].'</td>
				<td class="text-left" style="text-align:left;padding-left:10px;">'.$row['phone'].'</td>
				<td class="text-left" style="text-align:left;padding-left:10px;">'.$url.'</td>
				<td class="text-left" style="text-align:left;padding-left:10px;">'.$view_link.'|'.$del_link.'</td></tr>';
	 }
	 else
     if($_SESSION['moms_uid'] == '1')
	 {
	  $str.='<tr><td class="text-left" style="text-align:left"><img src="'.$img.'" width="14" height="14">&nbsp;<a href="view_media.php?id_publisher='.$row['id_publisher'].'" class="slit">'
	  .$row['name_publisher_en'].'</a></td>
				<td class="text-left" style="text-align:left;padding-left:10px;">'.$country['name_country'].'</td>
				<td class="text-left" style="text-align:left;padding-left:10px;">'.$row['email'].'</td>
				<td class="text-left" style="text-align:left;padding-left:10px;">'.$row['phone'].'</td>
				<td class="text-left" style="text-align:left;padding-left:10px;">'.$url.'</td>
				<td class="text-left" style="text-align:left;padding-left:10px;">'.$view_link.'|'.$del_link.'</td></tr>';
	   
	 
	 }
	 else
	 if($_SESSION['moms_type'] == "super_admin")
	 {
	  $str.='<tr><td class="text-left" style="text-align:left"><img src="'.$img.'" width="14" height="14"><a href="view_media.php?id_publisher='.$row['id_publisher'].'" class="slit">'
	  .$row['name_publisher_en'].'</a></td>
				<td class="text-left" style="text-align:left;padding-left:10px;">'.$country['name_country'].'</td>
				<td class="text-left" style="text-align:left;padding-left:10px;">'.$row['email'].'</td>
				<td class="text-left" style="text-align:left;padding-left:10px;">'.$row['phone'].'</td>
				<td class="text-left" style="text-align:left;padding-left:10px;">'.$url.'</td>
				<td class="text-left" style="text-align:left;padding-left:10px;">'.$view_link.'|'.$edit_link.'</td></tr>';
	 }
	 else
	 if($_SESSION['moms_type'] == "admin")
	 {
	  $str.='<tr><td class="text-left" style="text-align:left"><img src="'.$img.'" width="14" height="14">&nbsp;<a href="view_media.php?id_publisher='.$row['id_publisher'].'" class="slit">'
	  .$row['name_publisher_en'].'</a></td>
				<td class="text-left" style="text-align:left;padding-left:10px;">'.$country['name_country'].'</td>
				<td class="text-left" style="text-align:left;padding-left:10px;">'.$row['email'].'</td>
				<td class="text-left" style="text-align:left;padding-left:10px;">'.$row['phone'].'</td>
				<td class="text-left" style="text-align:left;padding-left:10px;">'.$url.'</td>
				<td class="text-left" style="text-align:left;padding-left:10px;">'.$view_link.'</td></tr>';
	 
	 }
	   
	   
	   
	   
	   
     
	  ?>
	  <script type="text/javascript">
			$('.slit').on('click', function ( e ) {
					$.fn.custombox( this, {
					effect: 'slit'
				});
				e.preventDefault();
			});
			</script>
	  <?php
   }
   }else{
    $str .= "<tr><td colspan='9'>No Record Found</td></tr>";
   }
   $str.='</table></div>';
   
echo $str; 
pagination($limit,$adjacent,$rows,$page);  
}
function pagination($limit,$adjacents,$rows,$page){	
 
 if(!empty($_REQUEST['task'])){
    
	
	 $click = $_REQUEST[type];
   
 }
 else
 {
     $click = 'All';
 }
 


	$pagination='';
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$prev_='';
	$first='';
	$lastpage = ceil($rows/$limit);	
	$next_='';
	$last='';
	if($lastpage > 1)
	{	
		
		//previous button
		if ($page > 1) 
			$prev_.= "<a class='page-numbers' onclick=\"publisher_filter_type('$prev')\" style='cursor:pointer'>previous</a>";
		else{
			//$pagination.= "<span class=\"disabled\">previous</span>";	
			}
		
		//pages	
		if ($lastpage < 5 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
		$first='';
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"active\"><a>$counter</a></span>";
				else
					$pagination.= "<a class='page-numbers' onclick=\"publisher_filter_type('$counter')\" style='cursor:pointer'>$counter</a>";					
			}
			$last='';
		}
		elseif($lastpage > 3 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			$first='';
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"active\"><a>$counter</a></span>";
					else
						$pagination.= "<a class='page-numbers' onclick=\"publisher_filter_type('$counter')\" style='cursor:pointer'>$counter</a>";					
				}
			$last.= "<a class='page-numbers'  onclick=\"publisher_filter_type('$click','$lastpage')\" style='cursor:pointer'>Last</a>";			
			}
			
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
		       $first.= "<a class='page-numbers' href=\"?page=1\">First</a>";	
			for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"active\"><a>$counter</a></span>";
					else
						$pagination.= "<a class='page-numbers' onclick=\"publisher_filter_type('$counter')\" style='cursor:pointer'>$counter</a>";					
				}
				$last.= "<a class='page-numbers'  onclick=\"publisher_filter_type('$click','$lastpage')\" style='cursor:pointer'>Last</a>";			
			}
			//close to end; only hide early pages
			else
			{
			    $first.= "<a class='page-numbers' onclick=\"publisher_filter_type('$click','1')\" style='cursor:pointer'>First</a>";	
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"active\"><a>$counter</a></span>";
					else
						$pagination.= "<a class='page-numbers' onclick=\"publisher_filter_type('$counter')\" style='cursor:pointer'>$counter</a>";					
				}
				$last='';
			}
            
			}
		if ($page < $counter - 1) 
			$next_.= "<a class='page-numbers'  onclick=\"publisher_filter_type('$next')\" style='cursor:pointer'>next</a>";
		else{
			//$pagination.= "<span class=\"disabled\">next</span>";
			}
		$pagination = "<div class=\"pagination\">".$first.$prev_.$pagination.$next_.$last;
		//next button
		
		$pagination.= "</div>\n";		
	}

	echo "<br>".$pagination; 
	?> 
	  <div class="row"> 
		  <div class="result_r">Result = <?=$rows?></div>   
	  </div>
	<?php	   
}