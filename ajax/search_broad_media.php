<?php
ob_start();
session_start();
 
include('../includes/connect.php');
include('../includes/conf.php');

$type=$_REQUEST["type"];

extract($_POST);

           if(!empty($task)){
                $sql = "SELECT * FROM tbl_broad_media where 1";
						$sqls='';
						if(!empty($search_broad_status)){
						
						   $sqls.=" AND status='".$search_broad_status."'";
						}
						if(!empty($search_broad_country)){
						
						   $sqls.=" AND id_country ='".$search_broad_country."'";
						}
						if(!empty($search_broad_language)){
						
						   $sqls.=" AND language_id='".$search_broad_language."'";
						}
						if(!empty($search_broad_type)){
						
						   $sqls.=" AND type='".$search_broad_type."'";
						}
						if(!empty($search_broad_publisher)){
						
						   $sqls.=" AND id_publisher='".$search_broad_publisher."'";
						}
						
						if(!empty($search_broad_genre)){
						
						   $sqls.=" AND id_publication_genre='".$search_broad_genre."'";
						}
						if(!empty($search_broad_outlet)){
						
						   $sqls.=" AND mediaOutlet ='".$search_broad_outlet."'";
						}
						
			           
						$sql_count = mysql_fetch_assoc(mysql_query("SELECT count(*) as total FROM tbl_broad_media where 1 $sqls"));
						$sql= $sql.$sqls;	
		
		       }else{
			
						$sql = "SELECT * FROM tbl_broad_media";
			            
						$sql_count = mysql_fetch_assoc(mysql_query("SELECT count(*) as total FROM tbl_broad_media"));
			   }
$sql= $sql." ORDER BY id DESC";			   
$result = mysql_query($sql);
?>  

<div style="overflow:auto; margin-left:0px;" class="row">           
		  
          <table class="table-fill">
			<thead>
			<tr>
				<th class="text-left">Name</th>
				<th class="text-left">Type</th>
				<th class="text-left">Language</th>
				<th class="text-left">Country</th>
				<th class="text-center">Action</th>
			</tr>
			</thead>
			<tbody class="table-hover">
			<?   
	
        if(mysql_num_rows($result)>0){
		while($row = mysql_fetch_assoc($result))
		{ 	 
				//Get Country details
                $country=mysql_fetch_assoc(mysql_query("select name_country from country where id_country=".$row['country_id']));
				
				//Get Language details
                $language=mysql_fetch_assoc(mysql_query("select name from tbl_languages where id=".$row['language_id']));
			
			?>
			<tr>
				<td class="text-left" style="text-align:left">
				<? if($row['status']=='A'){?> 
				<img src="images/greencircle.png" width="14" height="14">
				<?php }else{?>
				<img src="images/redcircle.png" width="14" height="14">
				<?php }?><?=$row['mediaOutlet']?> </td>
				<td class="text-left" style="text-align:left; padding-left:8px"><?=$row['type']?></td>
				<td class="text-left" style="text-align:left; padding-left:8px"><?=$country['name_country']?></td>
				<td class="text-left" style="text-align:left; padding-left:8px"><?=$language['name']?></td>
				<td class="text-left"style="text-align:center">
				<a href="add_broadcast.php?task=edit&id=<?=$row['id']?>" class="slit">Edit</a> 
				| <a href="add_broadcast.php?task=view&id=<?=$row['id']?>" class="slit">View</a> 
				| <a href="javascript:void(0)" onClick="confirm_delete('<?=$row['id']?>','broad_delete')">Delete</a>
				</td>
			</tr>
			<script type="text/javascript">
			$('.slit').on('click', function ( e ) {
					$.fn.custombox( this, {
					effect: 'slit'
				});
				e.preventDefault();
			});
			</script>
			
			<?php $i++;}}else{ echo '<tr><td colspan="6">No Record Found</td></tr>';}

		?>
         
</tbody>
</table>

</div>		  
 <div class="row"> 
		  
		  <div class="result_r">Result = <?=$sql_count['total']?></div>   
		  </div> 