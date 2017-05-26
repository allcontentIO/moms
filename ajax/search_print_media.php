<?php
ob_start();
session_start();
 
include('../includes/connect.php');

$task=$_REQUEST["task"];


extract($_POST);
		    if(!empty($task)){
		                $sql = "SELECT * FROM publication where 1";
						$sqls='';
						
						if($search_status=='0' || $search_status=='1'){
						
						   $sqls.=" AND active='".$search_status."'";
						}
						if(!empty($search_country)){
						
						   $sqls.=" AND country ='".$search_country."'";
						}
						if(!empty($search_language)){
						
						   $sqls.=" AND language='".$search_language."'";
						}
						if(!empty($search_type)){
						
						   $sqls.=" AND id_publication_type='".$search_type."'";
						}
						if(!empty($search_frequency)){
						
						   $sqls.=" AND id_frequency='".$search_frequency."'";
						}
						if(!empty($search_outlet)){
						
						   $sqls.=" AND id_publication ='".$search_outlet."'";
						}
						if(!empty($search_print_publisher)){
						
						   $sqls.=" AND distribution ='".$search_print_publisher."'";
						}
						
						
						$sql_count = mysql_fetch_assoc(mysql_query("SELECT count(*) as total FROM publication where 1 $sqls"));
						
						$sql= $sql.$sqls." LIMIT 0,10";
		
		       }else{
			
						$sql = "SELECT * FROM publication LIMIT 0,10";
			            
						$sql_count = mysql_fetch_assoc(mysql_query("SELECT count(*) as total FROM (
    SELECT id_publication FROM publication LIMIT 0, 10
)  publication"));
			   }

$result = mysql_query($sql);
?> 
           
          <div class="row" style="overflow:auto;">
		  <table class="table-fill">
			<thead>
			<tr>
				<th class="text-left">Name</th>
				<th class="text-left">Type</th>
				<th class="text-left">Frequency</th>
				<th class="text-left">Country</th>
				<th class="text-left"style="text-align:center">Action</th>
			</tr>
			</thead>
			<tbody class="table-hover">
			<?   
	      
        if(mysql_num_rows($result)>0){
		while($row = mysql_fetch_assoc($result))

		{     //Get frequency name
				$frequency=mysql_fetch_assoc(mysql_query("select name_frequency from frequency where id_frequency=".$row['id_frequency']));
				
				
				//Get Country details
                $country=mysql_fetch_assoc(mysql_query("select name_country from country where id_country=".$row['country']));
				
				//Get Type details
				
				
				$get_type=mysql_fetch_assoc(mysql_query("select name_publication_type_en from publication_type where id_publication_type=".$row['id_publication_type']));
			
			?>
			<tr>
				<td class="text-left" style="text-align:left">
				<? if($row['active']=='1'){?> 
				<img src="images/greencircle.png" width="14" height="14">
				<?php }else{?>
				<img src="images/redcircle.png" width="14" height="14">
				<?php }?><?=$row['name_publication_en']?>
				</td>
				<td class="text-left"><?=$get_type['name_publication_type_en']?></td>
				<td class="text-left"><?=$frequency['name_frequency']?></td>
				<td class="text-left"><?=$country['name_country']?></td>
				<td class="text-left"style="text-align:center">
				
				<a href="add_print_media.php?task=edit&id=<?=$row['id_publication']?>" class="slit">Edit</a> <?php }else{?>
				 | <a href="add_print_media.php?task=view&id=<?=$row['id_publication']?>" class="slit">View</a>
				 | <a href="javascript:void(0)" onClick="confirm_delete('<?=$row['id_publication']?>','delete')">Delete</a>
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