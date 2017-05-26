<?php
ob_start();
session_start();
 
include('includes/connect.php');
include('includes/conf.php');
include('includes/head.php');
$task= $_REQUEST['task'];

$getid=explode('?_',$_REQUEST['id_publisher']);
$id= $getid[0];
if(!empty($id))
{
$publisher = mysql_query("SELECT * FROM publisher WHERE id_publisher='".$id."'");
$row =  mysql_fetch_array($publisher);
} 

if($task=='view'){
?>

<div id="modal" class="modal-example-content">
        <div class="modal-example-header">
            <button type="button" class="close" onClick="$.fn.custombox('close');">&times;</button>
            <h4><?=!empty($id)?'View ':''?>Publisher Details</h4>
        </div>
        <div class="modal-example-body">
        <p>
           <div class="row">
           

             <div class="col-md-12">
             <div class="col-md-3">Status:</div>
				  <div class="col-md-5"><?=($row['status']=='A')?'Active':'Inactive'?></div>
				  <div class="col-md-2">&nbsp;</div>
              </div>
			  
			  <div class="col-md-12">
				  <div class="col-md-3">Name:</div>
				  <div class="col-md-5"><?=$row['name_publisher_en']?></div> 	
				  <div class="col-md-2">&nbsp;</div>  
              </div>
 
 
			  
			  
			  <div class="col-md-12">
			  <?php
			        //Get Country details
				    $country=mysql_fetch_assoc(mysql_query("select name_country from country where id_country=".$row['id_country']));
				    
			  ?>
                  <div class="col-md-3">Country:</div>
				  <div class="col-md-5"><?=$country['name_country']?></div>	 
				  <div class="col-md-2">&nbsp;</div>   
              </div>
			  
			  
				
			 <div class="col-md-12"> 	   
				   <div class="col-md-3">Phone:</div>
				   <div class="col-md-5"><?=$row['phone']?></div>
				   <div class="col-md-2">&nbsp;</div> 	  
              </div>
			  
			  
			   <div class="col-md-12"> 	   
				  <div class="col-md-3">Email:</div>
				  <div class="col-md-5"><?=$row['email']?></div>
				  <div class="col-md-2">&nbsp;</div>	  	  
              </div>
			  
			    
			  <div class="col-md-12">
			      <div class="col-md-3">Fax:</div>
				  <div class="col-md-5"><?=!empty($row['fax'])?$row['fax']:'N/A'?></div>
				  <div class="col-md-2">&nbsp;</div>
              </div>
			  
			  
			   <div class="col-md-12">
			      <div class="col-md-3">Url:</div>
				  <div class="col-md-5"><a href="<?=$row['url']?>" target="_blank"><?=$row['url']?></a></div>
				  <div class="col-md-2">&nbsp;</div>
              </div>
			  
			   
              </div>
                  
                  </p>
        </div>
    </div>



<? }else{?>


<div id="modal" class="modal-example-content">
        <div class="modal-example-header">
            <button type="button" class="close" onClick="$.fn.custombox('close');">&times;</button>
            <h4><?=!empty($id)?'Edit ':''?>Publisher Details</h4>
        </div>
        <div class="modal-example-body">
        <p>
           <div class="row">
            <form action="" method="post" id="publisher_frm" enctype="multipart/form-data">
			<input type="hidden" name="id_publisher" value="<?=$row['id_publisher']?>">
		    <input type="hidden" name="actionfunction" id="actionfunction" value="showData">
			<input type="hidden" name="page" id="page" value="1">
             
            
			 
             
             <fieldset class="col-md-6">
			 <label>Status <span style="color:#FF0000">*</span></label>
              <select name="status" id="publisher_status">
			      <option value="">Status</option>
			  	  <option value="A" <? if($row['status']=='A')echo 'Selected'?>>Active</option>
			  	  <option value="I" <? if($row['status']=='I')echo 'Selected'?>>Inactive</option>
			  </select>
              </fieldset>
			  
			  <fieldset class="col-md-6">
			  <label>Publisher Name <span style="color:#FF0000">*</span></label>
			  <input type="text" name="name_publisher_en" id="name_publisher_en" value="<?=$row['name_publisher_en']?>" placeholder="Publisher Name">
              </fieldset>
			  
			    
              <fieldset class="col-md-6">
			  <label>Country <span style="color:#FF0000">*</span></label>
			  <?php
			  //Get Country details
				$country=mysql_query("select * from country ORDER BY name_country ASC");
			  ?>
              <select name="id_country" id="publisher_id_country">
			  <option value="">--Select Country--</option>
			     <?php while($getCountry=mysql_fetch_assoc($country)){?>
					<option value="<?=$getCountry['id_country']?>" <? if($row['id_country']==$getCountry['id_country'])echo 'Selected'?>><?=$getCountry['name_country']?></option>
					<?php }?>
			  
			  </select>
              </fieldset>
              
               
              
				
			
				
				
				<fieldset class="col-md-6">
				<label>URL</label>
                <input type="text" name="url" id="publisher_url" value="<?=$row['url']?>" placeholder="URL">
                </fieldset>
				
				
				<fieldset class="col-md-6">
				<label>Phone <span style="color:#FF0000">*</span></label>
                <input type="text" name="phone" id="publisher_phone" onKeyPress="return isnum(event);"  value="<?=$row['phone']?>" placeholder="Phone" maxlength="15">
                </fieldset>
				
				
				<fieldset class="col-md-6">
				<label>Email <span style="color:#FF0000">*</span></label>
                <input type="text" name="email" id="publisher_email" value="<?=$row['email']?>" placeholder="Email">
                </fieldset>
				
				
				<fieldset class="col-md-6">
				<label>Fax </label>
                <input type="text" name="fax" value="<?=$row['fax']?>" placeholder="fax">
                </fieldset>
			    
		 
				    <fieldset class="col-md-4">
					<label>&nbsp;</label>
				<?php if(!empty($id)){?>
                 <input type="button" name="<?=(!empty($id))?'publisher_update':'publisher_submit'?>" value="<?=(!empty($id))?'Update':'Submit'?>" id="submit" class="button" onclick="publisher_validation('publisher_update')">
				 <?php }else{ ?>
				   <input type="button" name="<?=(!empty($id))?'publisher_update':'publisher_submit'?>" value="<?=(!empty($id))?'Update':'Submit'?>" id="submit" class="button" onclick="publisher_validation('publisher_submit')">
				 <?php } ?>
                  </fieldset>
				  
				  
				  
                  </form>
              </div>
                  
                  </p>
        </div>
    </div>
<?php }?>