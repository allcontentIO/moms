<?php
ob_start();
session_start();

include('includes/conf.php');



//include('includes/head.php');
$task= $_REQUEST['task'];
$getid=explode('?_',$_REQUEST['id']);
$id= $getid[0];
if(!empty($id))
{
$Issues = mysql_query("SELECT * FROM publication_issue WHERE id_publication_issue='".$id."'");
$row =  mysql_fetch_array($Issues);
} 


if(!empty($row['id_publication'])){
$sql = mysql_fetch_array(mysql_query("SELECT id_frequency FROM publication where id_publication=".$row['id_publication']));
}


	
	if($sql['id_frequency']==1){//Daily
	     $received_date= date('Y-m-d',strtotime("+1 day"));
	}elseif($sql['id_frequency']==2){//Weekly
	    $received_date= date('Y-m-d',strtotime("+1 week"));
	}elseif($sql['id_frequency']==3){//Weekly
	    $received_date= date('Y-m-d',strtotime("+3 day"));
	}elseif($sql['id_frequency']==4){//Weekly
	    $received_date= date('Y-m-d',strtotime("+1 month"));
	}elseif($sql['id_frequency']==5){//Weekly
	    $received_date= date('Y-m-d',strtotime("+3 month"));
	}elseif($sql['id_frequency']==6){//Weekly
	    $received_date= date('Y-m-d',strtotime("+6 month"));
	}elseif($sql['id_frequency']==7){//Weekly
	    $received_date= date('Y-m-d',strtotime("+1 year"));
	}

?>

<?php
if($task=='view'){
?>


<div id="modal" class="modal-example-content">
        <div class="modal-example-header">
            <button type="button" class="close" onClick="$.fn.custombox('close');">&times;</button>
            <h4><?=!empty($id)?'View ':''?>Issue Details</h4>
        </div>
        <div class="modal-example-body">
        <p>
           <div class="row">
             
			 
			 
			 <div class="col-md-12">
                  <div class="col-md-3">Issue #:</div>
				  <div class="col-md-7"><?=$row['id_issue']?></div>	   
              </div>
			  
			 
			 

             <div class="col-md-12">
			  <?php
			  
			    //Get Country details
				$Name=mysql_fetch_assoc(mysql_query("select id_publication,name_publication_en,expected_date from publication where id_publication=".$row['id_publication']));
				
			  ?>
                  <div class="col-md-3">Name:</div>
				  <div class="col-md-7"><?=$Name['name_publication_en']?></div> 
				   
              </div>
			  
			  
			  
			  <div class="col-md-12">
			      <div class="col-md-3">Received Date:</div>
				  <div class="col-md-7"><?=date('d-m-Y',strtotime($row['received_date']))?></div>	  	   
              </div>
			  
			  
			  <div class="col-md-12">
                  <div class="col-md-3">Received By:</div>
				  <div class="col-md-7"><?=$row['received_by']?></div>	   
              </div>
			  
			  <div class="col-md-12">
			      <div class="col-md-3">Expected Date:</div>
				  <div class="col-md-7"><?=(!empty($Name['expected_date']) && $Name['expected_date']!='0000-00-00 00:00:00')?date('d-m-Y',strtotime($Name['expected_date'])):''?></div>	  	 
			      	  
              </div>
			 
			   <div class="col-md-12">
			      <div class="col-md-3">Scanned Date:</div>
				  <div class="col-md-7"><?=(!empty($row['created']) && $row['created']!='0000-00-00 00:00:00')?date('d-m-Y',strtotime($row['created'])):'';?></div>			  
              </div>
			  
			  
			  <div class="col-md-12">
			      
				  <?php 
			    //Get Scanned by 
				$Scanned=mysql_fetch_assoc(mysql_query("select id_publication,name_publication_en from publication where id_publication=".$row['created_by']));
			      ?>
				    
                  <div class="col-md-3">Scanned By:</div>
				  <div class="col-md-7"><?=$Scanned['name_publication_en']?></div>	  		  
              </div>
			  
			  
			  
			  <div class="col-md-12">
			      <div class="col-md-3">Processed Date:</div>
				  <div class="col-md-7"><?=!empty($row['done_time'])?date('d-m-Y',strtotime($row['done_time'])):''?></div>	  	  
              </div>
			  
			  
			  
			   <div class="col-md-12">
			      <?php
			      //Get Processed by 
				  $Processed=mysql_fetch_assoc(mysql_query("select id_publication,name_publication_en from publication where id_publication=".$row['done_by']));
				  ?>  
                  <div class="col-md-3">Processed By:</div>
				  <div class="col-md-7"><?=$Processed['name_publication_en']?></div>	  	  
              </div>
			  
                 
              </div>
                  
                  </p>
        </div>
    </div>



<?php }else{?>
<style>
.ui-autocomplete { z-index:2147483647 !important; }
</style>
<script>
$(document).ready(function(){
	
	var issue = [
	<?php
    $sql_r=mysql_query("select name_publication_en from publication ORDER BY name_publication_en ASC");
	while($row_r=mysql_fetch_assoc($sql_r))
	{
	 echo'"';
	 echo $row_r['name_publication_en'];
	 echo'",';
	}
	?>
	];
	$as("#search_broad_outlet").autocomplete({
	source: issue
	
	});
	
	$as("#search_broad_outlet").autocomplete( "option", "appendTo", ".eventInsForm" );




});

</script>

<div id="modal" class="modal-example-content">
        <div class="modal-example-header">
            <button type="button" class="close" onClick="$.fn.custombox('close');">&times;</button>
            <h4><?=!empty($id)?'Edit ':''?>Issue Details</h4>
        </div>
        <div class="modal-example-body">
        <p>
           <div class="row">
            <form action="" method="post" onSubmit="return validation_issue()" enctype="multipart/form-data">
			<input type="hidden" name="id_publication_issue" value="<?=$row['id_publication_issue']?>">

              <fieldset class="col-md-12">
			  <label>Name <span style="color:#FF0000">*</span></label>
               <?php
			   $get_name=mysql_fetch_assoc(mysql_query("select id_publication,name_publication_en from publication  where id_publication = '".$row['id_publication']."'"));
			   //echo "select id_publication,name_publication_en from publication id = '".$row['id_publication']."'";
			   ?>
                <!--<select name="id_publication" id="id_publication_issue" onchange="getreceive(this.value)">
					<option value="">--Select Name--</option>
					<?php while($getName=mysql_fetch_assoc($get_name)){?>
					<option value="<?=$getName['id_publication']?>"  <? if($row['id_publication']==$getName['id_publication'])echo 'Selected'?>><?=$getName['name_publication_en']?></option>
					<?php }?>
				</select>-->
				<input type="text" name="search_broad_outlet" id="search_broad_outlet" Placeholder="Media Outlet Name"  onBlur="getreceive(this.value)" value="<?=$get_name['name_publication_en']?>">
                </fieldset>
				
				
                
				
            <fieldset class="col-md-12" style="margin-bottom:14px;">
			   <?php
			   if(!empty($row['id_publication'])){
			   $get_name=mysql_fetch_assoc(mysql_query("select expected_date,expected_day from publication where id_publication=".$row['id_publication']));
			   }
			   ?>
			   <?php if(trim($get_name['expected_date']) != "")  
					{ ?>
						<label id="exp">Expected Date <span style="color:#FF0000">*</span></label><br />
					<?php }
					else
					{ ?>
						<label id="exp">Expected Days <span style="color:#FF0000">*</span></label><br />
					<?php }?>
			   
              
			   <input type="text" class="form_input" readonly="" name="expected_date" value="<?php if(trim($get_name['expected_date']) != "")  
																									{
																										echo trim($get_name['expected_date']);
																									}
																									else
																									{
																										echo trim($get_name['expected_day']);
																									}?>" id="expected_date" style="margin:0">
			   <span style="color:blue; line-height:12px;">Date format: yyyy-mm-dd </span>
               </fieldset>
			   
			   
			
			   <fieldset class="col-md-6">
			   <label>Received Date <span style="color:#FF0000">*</span></label><br />
                <!--<div id="ReceivedDate" style="float:left" class="input-group date" data-date-format="yyyy-mm-dd">
    <input class="form-control" type="text" name="created" id="received_date" value="<?=$received_date?>" id="created_date" placeholder="Received Date" readonly />
    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
			   </div>-->
			   <input type="text" class="form_input" name="received_date" value="<?=$row['received_date']?>" id="received_date" style="margin:0">
			   <span style="color:blue; line-height:12px;">Date format: yyyy-mm-dd </span>
               </fieldset>
			   
			   
			   
			   <fieldset class="col-md-6">
			   <label>Received By <span style="color:#FF0000">*</span></label>
			    <input type="text" name="received_by" id="received_by" value="<?=!empty($row['received_by'])?$row['received_by']:ucfirst($_SESSION['moms_uname'])?>" placeholder="Received By" >
			   </fieldset>
				
				   <?php if(!empty($id)){?>
				<fieldset class="col-md-6">
				<label>Scanned Date <span style="color:#FF0000">*</span></label><br />
               
			   <input type="text" class="form_input" name="created" value="<?=(!empty($row['created']) && $row['created']!='0000-00-00 00:00:00')?date('Y-m-d',strtotime($row['created'])):'';?>" id="scanned_date" style="margin:0">
			  <span style="color:blue; line-height:12px;">Date format: yyyy-mm-dd </span>
               </fieldset>
			   
			   <?php 
			    //Get Scanned by 
				
				if(!empty($row['created_by'])){
				
				$Scanned=mysql_fetch_assoc(mysql_query("select id_publication,name_publication_en from publication where id_publication=".$row['created_by']));
				
				
				
				}
				if(!empty($Scanned['id_publication'])){
			  ?>
			   <fieldset class="col-md-6">
			   <label>Scanned By <span style="color:#FF0000">*</span></label>
			    <input type="text" readonly="" id="scanned_by" value="<?=$Scanned['name_publication_en']?>" placeholder="Scanned By" >
				<input type="hidden" name="scanned_by" value="<?=$Scanned['id_publication']?>" placeholder="Scanned By" >
				 <span style="color:blue; line-height:12px;">&nbsp;</span>
				</fieldset>
			   <?php }else{?>
			   
			    <fieldset class="col-md-6">
				<label>Scanned By <span style="color:#FF0000">*</span></label>
               <?php
			   $get_name=mysql_query("select id_publication,name_publication_en from publication ORDER BY name_publication_en ASC");
			   ?>
                <select name="scanned_by" id="scanned_by">
					<option value="">Name</option>
					<?php while($getName=mysql_fetch_assoc($get_name)){?>
					<option value="<?=$getName['id_publication']?>" ><?=$getName['name_publication_en']?></option>
					<?php }?>
				</select>
				<span style="line-height:12px;">&nbsp;</span>
                </fieldset>
			   
			   <?php }?>
			   
			   
			   <fieldset class="col-md-6" >
			   <label>Processed Date <span style="color:#FF0000">*</span></label>
                <!--<div id="processedDate" style="float:left" class="input-group date" data-date-format="yyyy-mm-dd">
    <input class="form-control" type="text" name="processed_date" id="processed_date" placeholder="Processed Date" readonly value="<?=!empty($row['done_time'])?date('Y-m-d',strtotime($row['done_time'])):''?>" />
    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
			   </div>-->
			   <input type="text" class="form_input" name="done_time" value="<?=!empty($row['done_time'])?date('Y-m-d',strtotime($row['done_time'])):''?>" id="processed_date" style="margin:0">
			   <span style="color:blue; line-height:12px;">Date format: yyyy-mm-dd </span>
               </fieldset>
			   
			   <?php
			   
			    //Get Processed by 
				if(!empty($row['done_by'])){
				$Processed=mysql_fetch_assoc(mysql_query("select id_publication,name_publication_en from publication where id_publication=".$row['done_by']));
				}
				if(!empty($Processed['id_publication'])){
			  ?>
			   <fieldset class="col-md-6">
			   <label>Processed By <span style="color:#FF0000">*</span></label>
			    <input type="text" name="processed_by" value="<?=$Processed['name_publication_en']?>" placeholder="Processed By" >
				<input type="hidden" name="processed_by" id="processed_by" value="<?=$Processed['id_publication']?>">
				<span style="color:blue; line-height:12px;">&nbsp;</span>
				</fieldset>
				
				<?php }else{?>
			   
			    <fieldset class="col-md-6">
				<label>Processed By <span style="color:#FF0000">*</span></label>
               <?php
			   $get_name=mysql_query("select id_publication,name_publication_en from publication ORDER BY name_publication_en ASC");
			   ?>
                <select name="processed_by" id="processed_by">
					<option value="">Name</option>
					<?php while($getName=mysql_fetch_assoc($get_name)){?>
					<option value="<?=$getName['id_publication']?>" ><?=$getName['name_publication_en']?></option>
					<?php }?>
				</select>
				<span style="color:blue; line-height:12px;">&nbsp;</span>
                </fieldset>
			   
			   <?php }?>
				<?php } ?>
				
			                                
                 <fieldset class="col-md-4">
                 <input type="submit" name="<?=(!empty($id))?'issue_update':'issue_submit'?>" value="<?=(!empty($id))?'Update':'Submit'?>" id="submit" class="button">
                  </fieldset>
                  </form>
              </div>
                  
                  </p>
        </div>
    </div>

<?php }?>
