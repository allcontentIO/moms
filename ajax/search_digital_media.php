<?php
ob_start();
session_start();
 
include('../includes/connect.php');
include('../includes/conf.php');

$task=$_REQUEST["task"];

extract($_POST);

                if(!empty($task)){
                        $sql = "SELECT * FROM tbl_digital_media where 1";
						$sqls='';
						if(!empty($search_digit_status)){
						
						   $sqls.=" AND status='".$search_digit_status."'";
						}
						if(!empty($search_digit_country)){
						
						   $sqls.=" AND id_country ='".$search_digit_country."'";
						}
						if(!empty($search_digit_language)){
						
						   $sqls.=" AND language_id='".$search_digit_language."'";
						}
						if(!empty($search_digit_type)){
						
						   $sqls.=" AND type='".$search_digit_type."'";
						}
						if(!empty($search_digital_outlet)){
						
						   $sqls.=" AND id ='".$search_digital_outlet."'";
						}
						if(!empty($search_publisher)){
						
						   $sqls.=" AND id_publisher ='".$search_publisher."'";
						}
						
			           
						$sql_count = mysql_fetch_assoc(mysql_query("SELECT count(*) as total FROM tbl_digital_media where 1 $sqls"));
						$sql= $sql.$sqls;	
		
		       }else{
			
						$sql = "SELECT * FROM tbl_digital_media";
			            
						$sql_count = mysql_fetch_assoc(mysql_query("SELECT count(*) as total FROM tbl_digital_media"));
			   }

$result = mysql_query($sql);
?> 
<div class="row" style="overflow:auto;">
		  
    	  
          <table class="table-fill">
			<thead>
			<tr>
				<th class="text-left">Name</th>
				<th class="text-left">Type</th>
				<th class="text-left">Language</th>
				<th class="text-left">Country</th>
				<th class="text-left">Rank</th>
				<th class="text-left">Date Harvested</th>
				<th class="text-left">Time Harvested</th>
				<th class="text-left">Action</th>
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
				$languages=mysql_fetch_assoc(mysql_query("select name from tbl_languages where id=".$row['language_id']));
			?>
			<tr>
				<td class="text-left" style="text-align:left">
				<? if($row['status']=='A'){?> 
				<img src="images/greencircle.png" width="14" height="14">
				<?php }else{?>
				<img src="images/redcircle.png" width="14" height="14">
				<?php }?> <?=$row['mediaOutlet']?>
				</td>
				<td class="text-left"><?=$row['type']?></td>
				<td class="text-left"><?=$languages['name']?></td>
				<td class="text-left"><?=$country['name_country']?></td>
				<td class="text-left" style="text-align:center"><?=($row['source_rank']=='11')?'N/A':$row['source_rank']?></td>
				<td class="text-left"><?=date('d-m-Y',strtotime($row['modified_date']))?></td>
				<td class="text-left"><?=date('H:i:s',strtotime($row['modified_date']))?></td>
				<td class="text-left"style="text-align:center">
				<a href="add_digital_media.php?task=edit&id=<?=$row['id']?>" class="slit">Edit</a>
				| <a href="add_digital_media.php?task=view&id=<?=$row['id']?>" class="slit">View</a> 
				| <a href="javascript:void(0)" onClick="confirm_delete('<?=$row['id']?>','digital_delete')">Delete</a>
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
			
			<?php $i++;}}else{ echo '<tr><td colspan="9">No Record Found</td></tr>';}

		?>
         
</tbody>
</table>







          </div>
		  
		  
<div class="row"> 
		  
		  <div class="result_r">Result = <?=$sql_count['total']?></div>   
		  </div>		  