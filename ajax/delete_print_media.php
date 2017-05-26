<?php
ob_start();
session_start();
$limit = 10;
$adjacent = 3;
include('../includes/connect.php');
include('../includes/conf.php');
$task=$_REQUEST["task"];
extract($_POST);


	$Printmedia=mysql_fetch_assoc(mysql_query("select logo,rate_sheet from publication where id_publication=".$_REQUEST['id']));
	 
	 unset($Printmedia['logo']);
	 unset($Printmedia['rate']);
	

	
	 $sql_update = mysql_query("delete from publication WHERE `id_publication`='".$_REQUEST['id']."'");
	 
	 $msg='del_succ';

    
	
	 

		 
	




if(isset($_REQUEST['actionfunction']) && $_REQUEST['actionfunction']!=''){
$actionfunction = $_REQUEST['actionfunction'];
  
   call_user_func($actionfunction,$_REQUEST,$con,$limit,$adjacent);
}
function showData($data,$con,$limit,$adjacent){

  			
		    if(!empty($_REQUEST['task'])){
			
	
		                $sql = "SELECT * FROM publication where 1";
						$sqls='';
						
						if($_REQUEST[search_status] == '0' || $_REQUEST[search_status] == '1'){
						    
						   $sqls.=" AND active='".$_REQUEST[search_status]."'";
						}
						if(!empty($_REQUEST[search_country])){
						
						   $sqls.=" AND country ='".$_REQUEST[search_country]."'";
						}
						if(!empty($_REQUEST[search_language])){
						
						   $sqls.=" AND language='".$_REQUEST[search_language]."'";
						}
						if(!empty($_REQUEST[search_type])){
						   if($_REQUEST[search_type]!='All'){
						   $sqls.=" AND id_publication_type='".$_REQUEST[search_type]."'";
						   }
						}
						if(!empty($_REQUEST[type])){
						   if($_REQUEST[type]!='All'){
						   $sqls.=" AND id_publication_type='".$_REQUEST[type]."'";
						   }
						}
						if(!empty($_REQUEST[search_frequency])){
						
						   $sqls.=" AND id_frequency='".$_REQUEST[search_frequency]."'";
						}
						if(!empty($_REQUEST[search_outlet])){
						
						   $sqls.=" AND name_publication_en ='".$_REQUEST[search_outlet]."'";
						}
						if(!empty($_REQUEST[search_print_publisher])){
						
						   $sqls.=" AND distribution ='".$_REQUEST[search_print_publisher]."'";
						}
						
						
		
		       }

  $page = $data['page'];
   if($page==1){
   $start = 0;  
  }
  else{
  $start = ($page-1)*$limit;
  }
  $sql = "SELECT * FROM publication  where 1 and id_publication_type IN (1,2) $sqls";
  
  //echo $sql;
  
  $rows  = mysql_query($sql);
  $rows  = mysql_num_rows($rows);
  //$c  = mysql_num_rows($rows);
  
  $sql = "SELECT * FROM publication   where 1 and id_publication_type IN (1,2) $sqls ORDER BY id_publication DESC limit $start,$limit";
  //echo $sql;
  $data = mysql_query($sql);
  	   

        echo "<h3 style='color:green;' align='center'> Record deleted succesfully.</h3>";
		echo "<br>";
 
  
 

   
	   
	  
 

     if($_SESSION['moms_uid'] == '1' && $_SESSION['moms_type'] == "super_admin")
	 {
	   $str='<div style="overflow:auto; margin-left:0px;" class="row"><table class="table-fill">
			<thead>
			<tr>
				<th class="text-left">Name</th>
				<th class="text-left">Type</th>
				<th class="text-left">Frequency</th>
				<th class="text-left">Country</th>
				<th class="text-left">Delivery Method</th>
				<th class="text-left">Expected Date/Day</th>
				<th class="text-center" style="width:85px">Action</th>
			</tr>
			</thead>';
	 }
	 else
	 if($_SESSION['moms_uid'] == '1' && $_SESSION['moms_type'] == "admin")
	 {
	 $str='<div style="overflow:auto; margin-left:0px;" class="row"><table class="table-fill">
			<thead>
			<tr>
				<th class="text-left">Name</th>
				<th class="text-left">Type</th>
				<th class="text-left">Frequency</th>
				<th class="text-left">Country</th>
				<th class="text-left">Delivery Method</th>
				<th class="text-left">Expected Date/Day</th>
				<th class="text-center" style="width:85px">Action</th>
			</tr>
			</thead>';
	 }
	 if($_SESSION['moms_uid'] == '1')
	 {
	 $str='<div style="overflow:auto; margin-left:0px;" class="row"><table class="table-fill">
			<thead>
			<tr>
				<th class="text-left">Name</th>
				<th class="text-left">Type</th>
				<th class="text-left">Frequency</th>
				<th class="text-left">Country</th>
				<th class="text-left">Delivery Method</th>
				<th class="text-left">Expected Date/Day</th>
				<th class="text-center" style="width:85px">Action</th>
			</tr>
			</thead>';
	 }
     else
	  
	   if($_SESSION['moms_type'] == "super_admin")
	   {
	        $str='<div style="overflow:auto; margin-left:0px;" class="row"><table class="table-fill">
			<thead>
			<tr>
				<th class="text-left">Name</th>
				<th class="text-left">Type</th>
				<th class="text-left">Frequency</th>
				<th class="text-left">Country</th>
				<th class="text-left">Delivery Method</th>
				<th class="text-left">Expected Date/Day</th>
				<th class="text-center" style="width:85px">Action</th>
			</tr>
			</thead>';
	   
	   }
	   else
	   if($_SESSION['moms_type'] == "admin")
	   {
	       $str='<div style="overflow:auto; margin-left:0px;" class="row"><table class="table-fill">
			<thead>
			<tr>
				<th class="text-left">Name</th>
				<th class="text-left">Type</th>
				<th class="text-left">Frequency</th>
				<th class="text-left">Country</th>
				<th class="text-left">Delivery Method</th>
				<th class="text-left">Expected Date/Day</th>
				
			</tr>
			</thead>';
	   
	   }
	   
	   
	   
	   
	   

	   
	   		
  if(mysql_num_rows($data)>0){
   while( $row = mysql_fetch_array($data)){
                //Get frequency name
				$frequency=mysql_fetch_assoc(mysql_query("select name_frequency from frequency where id_frequency=".$row['id_frequency']));
				
				
				//Get Country details
                $country=mysql_fetch_assoc(mysql_query("select name_country from country where id_country=".$row['country']));
				
				//Get Type details
				
				
				$get_type=mysql_fetch_assoc(mysql_query("select name_publication_type_en from publication_type where id_publication_type=".$row['id_publication_type']));
       if($row['active']=='1')
	   {
          $img = "images/greencircle.png";
       } 
	   else
	   {
	      $img = "images/redcircle.png";
	   }
	   
	   if($row['active']=='1')
	   {
	     $status = "Active";
	   }
	   else
	   {
	     $status = "Inactive";
	   }
	   $delivery_method= !empty($row['del_method'])?$row['del_method']:'N/A';
	   
	   if(!empty($row['expected_date']) && $row['expected_date']!='0000-00-00'){
	   			$expected_date= date('d-m-Y',strtotime($row['expected_date']));
	   }
	   elseif(!empty($row['expected_day'])){
	            $expected_date= $row['expected_day'];
	   }else{
	            $expected_date= 'N/A';
	   }
	   
	   
       
			$edit_link = "<a href='add_print_media.php?task=edit&id=".$row['id_publication']."' class='slit'><img src='images/Edit_2.png' width='18' height='18'></a>";
			
			
			$del_link = "<a href='javascript:void(0)' onClick='confirm_delete(".$row['id_publication'].",0)'><img src='images/Delete_2.png' width='18' height='18'></a>";
	    
	   if($_SESSION['moms_uid'] == '1' && $_SESSION['moms_type'] == "super_admin")
	 {
	    $str.="<tr><td class='text-left' style='text-align:left'><img src='$img' width='14' height='14'><a href='add_print_media.php?task=view&id=".$row['id_publication']."' id='".$row['id_publication']."' class='slit'>".$row['name_publication_en']."</a></td><td class='text-left' style='text-align:left; padding-left:10px'>".$get_type['name_publication_type_en']."</td>
<td class='text-left' style='text-align:left; padding-left:10px'>".$frequency['name_frequency']."</td><td class='text-left' style='text-align:left; padding-left:10px'>".$country['name_country']."</td><td class='text-left' style='text-align:left; padding-left:10px'>".$delivery_method."</td><td class='text-left' style='text-align:left; padding-left:10px'>".$expected_date."</td><td class='text-left' style='text-align:center'>".$edit_link."|".$del_link."</td></tr>";
	 }
	 else
	 if($_SESSION['moms_uid'] == '1' && $_SESSION['moms_type'] == "admin")
	 {
	  $str.="<tr><td class='text-left' style='text-align:left'><img src='$img' width='14' height='14'><a href='add_print_media.php?task=view&id=".$row['id_publication']."' id='".$row['id_publication']."' class='slit'> ".$row['name_publication_en']."</a></td><td class='text-left' style='text-align:left; padding-left:10px'>".$get_type['name_publication_type_en']."</td>
<td class='text-left' style='text-align:left; padding-left:10px'>".$frequency['name_frequency']."</td><td class='text-left' style='text-align:left; padding-left:10px'>".$country['name_country']."</td><td class='text-left' style='text-align:left; padding-left:10px'>".$delivery_method."</td><td class='text-left' style='text-align:left; padding-left:10px'>".$expected_date."</td><td class='text-left' style='text-align:center'>".$del_link."</td></tr>";
	 }
	 else
	 if($_SESSION['moms_uid'] == '1')
	 {
	  $str.="<tr><td class='text-left' style='text-align:left'><img src='$img' width='14' height='14'><a href='add_print_media.php?task=view&id=".$row['id_publication']."' id='".$row['id_publication']."' class='slit'>".$row['name_publication_en']."</a></td><td class='text-left' style='text-align:left; padding-left:10px'>".$get_type['name_publication_type_en']."</td>
<td class='text-left' style='text-align:left; padding-left:10px'>".$frequency['name_frequency']."</td><td class='text-left' style='text-align:left; padding-left:10px'>".$country['name_country']."</td><td class='text-left' style='text-align:left; padding-left:10px'>".$delivery_method."</td><td class='text-left' style='text-align:left; padding-left:10px'>".$expected_date."</td><td class='text-left' style='text-align:center'>".$del_link."</td></tr>";
	 }
     else
	  
	   if($_SESSION['moms_type'] == "super_admin")
	   {
	   $str.="<tr><td class='text-left' style='text-align:left'><img src='$img' width='14' height='14'><a href='add_print_media.php?task=view&id=".$row['id_publication']."' id='".$row['id_publication']."' class='slit'>".$row['name_publication_en']."</a></td><td class='text-left' style='text-align:left; padding-left:10px'>".$get_type['name_publication_type_en']."</td>
<td class='text-left' style='text-align:left; padding-left:10px'>".$frequency['name_frequency']."</td><td class='text-left' style='text-align:left; padding-left:10px'>".$country['name_country']."</td><td class='text-left' style='text-align:left; padding-left:10px'>".$delivery_method."</td><td class='text-left' style='text-align:left; padding-left:10px'>".$expected_date."</td><td class='text-left' style='text-align:center'>".$edit_link."</td></tr>";
	   
	   }
	   else
	   if($_SESSION['moms_type'] == "admin")
	   {
	  		$str.="<tr><td class='text-left' style='text-align:left'><img src='$img' width='14' height='14'><a href='add_print_media.php?task=view&id=".$row['id_publication']."' id='".$row['id_publication']."' class='slit'> ".$row['name_publication_en']."</a></td><td class='text-left' style='text-align:left; padding-left:10px'>".$get_type['name_publication_type_en']."</td>
<td class='text-left' style='text-align:left; padding-left:10px'>".$frequency['name_frequency']."</td><td class='text-left' style='text-align:left; padding-left:10px'>".$country['name_country']."</td><td class='text-left' style='text-align:left; padding-left:10px'>".$delivery_method."</td><td class='text-left' style='text-align:left; padding-left:10px'>".$expected_date."</td></tr>";

	   } 
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
    $str .= "<tr><td colspan='6'>No Record Found</td></tr>";
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
			$prev_.= "<a class='page-numbers' onclick=\"filter_type('$click','$prev')\" style='cursor:pointer'>previous</a>";
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
					$pagination.= "<a class='page-numbers' onclick=\"filter_type('$click','$counter')\" style='cursor:pointer'>$counter</a>";					
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
						$pagination.= "<a class='page-numbers' onclick=\"filter_type('$click','$counter')\" style='cursor:pointer'>$counter</a>";					
				}
			$last.= "<a class='page-numbers'  onclick=\"filter_type('$click','$lastpage')\" style='cursor:pointer'>Last</a>";			
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
						$pagination.= "<a class='page-numbers' onclick=\"filter_type('$click','$counter')\" style='cursor:pointer'>$counter</a>";					
				}
				$last.= "<a class='page-numbers'  onclick=\"filter_type('$click','$lastpage')\" style='cursor:pointer'>Last</a>";			
			}
			//close to end; only hide early pages
			else
			{
			    $first.= "<a class='page-numbers' onclick=\"filter_type('$click','1')\" style='cursor:pointer'>First</a>";	
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"active\"><a>$counter</a></span>";
					else
						$pagination.= "<a class='page-numbers' onclick=\"filter_type('$click','$counter')\" style='cursor:pointer'>$counter</a>";					
				}
				$last='';
			}
            
			}
		if ($page < $counter - 1) 
			$next_.= "<a class='page-numbers'  onclick=\"filter_type('$click','$next')\" style='cursor:pointer'>next</a>";
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