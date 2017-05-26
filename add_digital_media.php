<?php
ob_start();
session_start();
 
include('includes/connect.php');
include('includes/conf.php');
include('includes/head.php');
$task= $_REQUEST['task'];

$id=$_REQUEST['id'];
if(!empty($id))
{
$digital_media = mysql_query("SELECT * FROM publication WHERE id_publication='".$_REQUEST['id']."'");
$row =  mysql_fetch_array($digital_media);
} 

if($task=='view'){
?>

<div id="modal" class="modal-example-content">
        <div class="modal-example-header">
            <button type="button" class="close" onClick="$.fn.custombox('close');">&times;</button>
            <h4><?=!empty($id)?'View ':''?>Digital Details</h4>
        </div>
        <div class="modal-example-body">
        <p>
           <div class="row">
           

             <div class="col-md-12">
             <div class="col-md-3">Status:</div>
				  <div class="col-md-5"><?=($row['active']=='1')?'Active':'Inactive'?></div>
				  <div class="col-md-2">
				  <?php if(!empty($row['logo'])){?>
			  		<img src="<?=$row['logo']?>" width="80" height="60" align="right">
			  	  <?php }else{?>
				    <img src="images/no-image.png" width="80" height="60" align="right">
			      <?php }?>
				  </div>
              </div>
			  
			  <div class="col-md-12">
				  <div class="col-md-3">Outlet:</div>
				  <div class="col-md-5"><?=$row['name_publication_en']?></div> 	
				  <div class="col-md-2">&nbsp;</div>  
              </div>
 
 
			  
			  <?php
			   //Get Type details
				$get_type=mysql_fetch_assoc(mysql_query("select * from publication_type where id_publication_type=".$row['id_publication_type']));
			   ?>
			 <div class="col-md-12">
                  <div class="col-md-3">Type:</div>
				  <div class="col-md-5"><?=$get_type['name_publication_type_en']?></div>	  
				  <div class="col-md-2">&nbsp;</div>  
              </div>
			  
			  <div class="col-md-12">
			  <?php
			        //Get Country details
				    $country=mysql_fetch_assoc(mysql_query("select name_country from country where id_country=".$row['country']));
				    //Get Language details
				    //$languages=mysql_fetch_assoc(mysql_query("select name from tbl_languages where name='".$row['language']."'"));
					
					
					
			  ?>
                  <div class="col-md-3">Country:</div>
				  <div class="col-md-5"><?=$country['name_country']?></div>	 
				  <div class="col-md-2">&nbsp;</div>   
              </div>
			  
			  
			  
			  
			  <div class="col-md-12">
				   <div class="col-md-3">Language:</div>
				   <div class="col-md-5"><?=$row['name']?></div>	  
				   <div class="col-md-2">&nbsp;</div> 	  
              </div>
			  
			  
			  <div class="col-md-12">
				  <?php
					//Get Genre details
					$Genre=mysql_fetch_assoc(mysql_query("select name_publication_genre from publication_genre where id_publication_genre=".$row['id_publication_genre']));
					
				  ?>
                  <div class="col-md-3">Genre:</div>
				  <div class="col-md-5"><?=$Genre['name_publication_genre']?></div>	  
				  <div class="col-md-2">&nbsp;</div> 	 	  
              </div>
			  
			  
			  <div class="col-md-12">
				   <div class="col-md-3">Source Rank:</div>
				   <div class="col-md-5"><?=($row['source_rank']=='11')?'n/a':$row['source_rank']?></div>
				   <div class="col-md-2">&nbsp;</div>	  	  
              </div>
			  
			  
			  
			  
			  <div class="col-md-12">
			      <div class="col-md-3">Subscription:</div>
				  <div class="col-md-5"><?=$row['subscription']?></div>
				  <div class="col-md-2">&nbsp;</div>
              </div>
			  
			  
			  <div class="col-md-12">
			  <?php
				$Publisher=mysql_fetch_assoc(mysql_query("select id_publisher,name_publisher_en from publisher where id_publisher=".$row['distribution']));
				?>
				   <div class="col-md-3">Publisher:</div>
				   <div class="col-md-5"><?=$Publisher['name_publisher_en']?></div>
				   <div class="col-md-2">&nbsp;</div>	  	  
              </div>
			  
			  
			  
			  <div class="col-md-12">
			      <div class="col-md-3">Hits/Month:</div>
				  <div class="col-md-5"><?=$row['hits']?></div>
				  <div class="col-md-2">&nbsp;</div>
              </div>
			  
			  
			  <div class="col-md-12">
				  <div class="col-md-3">URL:</div>
				  <div class="col-md-5"><a href="<?=$row['url']?>" target="_blank"><?=$row['url']?></a></div>
				  <div class="col-md-2">&nbsp;</div>
              </div>
			 
				
			 <div class="col-md-12"> 	   
				   <div class="col-md-3">Phone:</div>
				   <div class="col-md-5"><?=$row['telephone']?></div>
				   <div class="col-md-2">&nbsp;</div> 	  
              </div>
			  
			  
			   <div class="col-md-12"> 	   
				  <div class="col-md-3">Email:</div>
				  <div class="col-md-5"><?=$row['email']?></div>
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
            <h4><?=!empty($id)?'Edit ':''?>Digital Media Details</h4>
        </div>
        <div class="modal-example-body">
        <p>
           <div class="row">
		
            <form  method="post" name="digital_frm" id="digital_frm" enctype="multipart/form-data">
			<input type="hidden" name="dig_frm_id" value="<?=$row['id_publication']?>">
			<input type="hidden" name="actionfunction" id="actionfunction" value="showData">
			<input type="hidden" name="page" id="page" value="1">
             
             <fieldset class="col-md-6">
			&nbsp;
              </fieldset>
			  
			  <fieldset class="col-md-6">
			  <?php if(!empty($row['logo'])){?>
			  		<img src="<?=$row['logo']?>" width="80" height="60" align="right">
			  <?php }else{?>
				    <img src="images/no-image.png" width="80" height="60" align="right">
			  <?php }?>
              </fieldset>
             
             <fieldset class="col-md-6">
			 <label>Status <span style="color:#FF0000">*</span></label>
              <select name="status" id="dig_status">
			      <option value="">Status</option>
			  	  <option value="1" <? if($row['active']=='1')echo 'Selected'?>>Active</option>
			  	  <option value="0" <? if($row['active']=='0')echo 'Selected'?>>Inactive</option>
			  </select>
              </fieldset>
			  
			  <fieldset class="col-md-6">
			  <label>Media Outlet Name <span style="color:#FF0000">*</span></label>
			  <input type="text" name="mediaOutlet" id="dig_mediaOutlet" value="<?=$row['name_publication_en']?>" placeholder="Media Outlet Name">
              </fieldset>
			  
			  <fieldset class="col-md-6">
			  <label>Type <span style="color:#FF0000">*</span></label>
			   <?php
			   //Get Type details
				$get_type=mysql_query("select * from publication_type where id_publication_type IN (3,6,7,8,9)");
			   ?>
                <select name="id_publication_type" id="dig_type">
					<option value="">--Select Type--</option>
					<?php while($getType=mysql_fetch_assoc($get_type)){?>
					<option value="<?=$getType['id_publication_type']?>"  <? if($row['id_publication_type']==$getType['id_publication_type'])echo 'Selected'?>><?=$getType['name_publication_type_en']?></option>
					<?php }?>
				</select>
              
				</fieldset>
				
                            
                
              <fieldset class="col-md-6">
			  <label>Country <span style="color:#FF0000">*</span></label>
			  <?php
			  //Get Country details
				$country=mysql_query("select * from country ORDER BY name_country ASC");
			  ?>
              <select name="country_id" id="dig_country_id">
			  <option value="">--Select Country--</option>
			     <?php while($getCountry=mysql_fetch_assoc($country)){?>
					<option value="<?=$getCountry['id_country']?>" <? if($row['country']==$getCountry['id_country'])echo 'Selected'?>><?=$getCountry['name_country']?></option>
					<?php }?>
			  
			  </select>
              </fieldset>
              
               <fieldset class="col-md-6">
			   <label>Language <span style="color:#FF0000">*</span></label>
			 
                <select  name="language_id" id="dig_language_id">
				<option value="">--Select Language--</option>
				    <?php foreach ($lang_arr as $lang){?>
					<option value="<?=$lang?>" <? if($row['language']==$lang)echo 'Selected'?>><?=$lang?></option>
					<?php }?>
				</select>
                </fieldset>
                
               
                                            
                <fieldset class="col-md-6">
				<label>Media Outlet Genre <span style="color:#FF0000">*</span></label>
                <?php
				$Genre=mysql_query("select * from publication_genre Order BY name_publication_genre ASC");
				?>
                <select name="id_publication_genre" id="dig_id_publication_genre">
				<option value="">Media Outlet Genre</option>
				    <?php while($getGenre=mysql_fetch_assoc($Genre)){?>
					<option value="<?=$getGenre['id_publication_genre']?>" <? if($row['id_publication_genre']==$getGenre['id_publication_genre'])echo 'Selected'?>><?=$getGenre['name_publication_genre']?></option>
					<?php }?>
				</select>
               </fieldset>
			   
			   
			   <fieldset class="col-md-6">
			   <label>Source Rank <span style="color:#FF0000">*</span></label>
                <select name="source_rank" id="dig_source_rank">
					<option value="">Source Rank</option>
				    <option value="1" <? if($row['source_rank']=='1')echo 'Selected'?>>1</option>
					<option value="2" <? if($row['source_rank']=='2')echo 'Selected'?>>2</option>
					<option value="3" <? if($row['source_rank']=='3')echo 'Selected'?>>3</option>
					<option value="4" <? if($row['source_rank']=='4')echo 'Selected'?>>4</option>
					<option value="5" <? if($row['source_rank']=='5')echo 'Selected'?>>5</option>
					<option value="6" <? if($row['source_rank']=='6')echo 'Selected'?>>6</option>
					<option value="7" <? if($row['source_rank']=='7')echo 'Selected'?>>7</option>
					<option value="8" <? if($row['source_rank']=='8')echo 'Selected'?>>8</option>
					<option value="9" <? if($row['source_rank']=='9')echo 'Selected'?>>9</option>
					<option value="10" <? if($row['source_rank']=='10')echo 'Selected'?>>10</option>
					<option value="11" <? if($row['source_rank']=='11')echo 'Selected'?>>n/a</option>
				</select>
                </fieldset>
				
				
				<fieldset class="col-md-6">
               <label>Subscription <span style="color:#FF0000">*</span></label>
                <select name="subscription" id="dig_subscription">
					<option value="">--Select Subscription--</option>
				    <option value="Free" <? if($row['subscription']=='Free')echo 'Selected'?>>Free</option>
					<option value="Subscription" <? if($row['subscription']=='Subscription')echo 'Selected'?>>Subscription</option>
					<option value="Partial" <? if($row['subscription']=='Partial')echo 'Selected'?>>Partial Subscription</option>
				</select>
               </fieldset>
			   
			   <? if(!empty($row['logo'])){?>
			    <fieldset class="col-md-6">
				<label>Logo</label>
			    <input type="file" name="logo" placeholder="Logo" style="margin-bottom:0px; padding:2px !important;">
				
				
				
                </fieldset>
				<?php }else{?>
				<fieldset class="col-md-6">
				<label>Logo</label>
			    <input type="file" name="logo" placeholder="Logo" style="padding:2px !important;">
                </fieldset>
				<?php }?>
				
				
				<fieldset class="col-md-6">
			   <label>Publisher <span style="color:#FF0000">*</span></label>
				<?php
				$Publisher=mysql_query("select id_publisher,name_publisher_en from publisher ORDER BY name_publisher_en ASC");
				?>
                <select name="id_publisher" id="dig_id_publisher">
				    <option value="">--Select Publisher--</option>
				    <?php while($getPublisher=mysql_fetch_assoc($Publisher)){?>
					<option value="<?=$getPublisher['id_publisher']?>" <? if($row['distribution']==$getPublisher['id_publisher'])echo 'Selected'?>><?=$getPublisher['name_publisher_en']?></option>
					<? }?>
				</select>
                </fieldset>
			  
			  
			   
				
				
				 <fieldset class="col-md-6">
				 <label>Hits/Month <span style="color:#FF0000">*</span></label>
                <input type="text" onKeyPress="return isnum(event);" name="hits" id="dig_hits" value="<?=$row['hits']?>" placeholder="Hits/Month">
                </fieldset>
				
				
				
				<fieldset class="col-md-6">
				<label>URL</label>
                <input type="text" name="url" id="dig_url" value="<?=$row['url']?>" placeholder="URL">
                </fieldset>
				
				
				<fieldset class="col-md-6">
				<label>Phone <span style="color:#FF0000">*</span></label>
                <input type="text" name="phone" id="dig_phone" onKeyPress="return isnum(event);"  value="<?=$row['telephone']?>" placeholder="Phone" maxlength="15">
                </fieldset>
				
				
				<fieldset class="col-md-6">
				<label>Email <span style="color:#FF0000">*</span></label>
                <input type="text" name="email" id="dig_email" value="<?=$row['email']?>" placeholder="Email">
                </fieldset>
			    
                                            
                  <fieldset class="col-md-6">
				  <label>Date Harvested <span style="color:#FF0000">*</span></label>
                 <input type="text" name="" readonly value="<?=!empty($row['modified_date'])?date('d-m-Y',strtotime($row['modified_date'])):date('d-m-Y')?>" placeholder="Date Harvested">
                  </fieldset>
				  
				    <fieldset class="col-md-6">
					<label>Time Harvested <span style="color:#FF0000">*</span></label>
                 <input type="text" name="" readonly value="<?=!empty($row['modified_date'])?date('H:i:s',strtotime($row['modified_date'])):date('H:i:s')?>" placeholder="Time Harvested">
                  </fieldset>
				  
				  
				    <fieldset class="col-md-4">
					<label>&nbsp;</label>
					
				<?php if(!empty($id)){?>	
                 <input type="button" name="<?=(!empty($id))?'digital_update':'digital_submit'?>" value="<?=(!empty($id))?'Update':'Submit'?>" id="submit" class="button" onclick="digital_validation('digital_update')">
				 
				<?php }else{ ?> 
				 <input type="button" name="<?=(!empty($id))?'digital_update':'digital_submit'?>" value="<?=(!empty($id))?'Update':'Submit'?>" id="submit" class="button" onclick="digital_validation('digital_submit')">
				<?php } ?>
                  </fieldset>
				  
				  
				  
                  </form>
              </div>
                  
                  </p>
        </div>
    </div>
<?php }?>