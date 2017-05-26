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
            <h4><?=!empty($id)?'View ':''?>Broadcast Details</h4>
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
			  ?>
                  <div class="col-md-3">Country:</div>
				  <div class="col-md-5"><?=$country['name_country']?></div>
				  <div class="col-md-2">&nbsp;</div> 	  	  
              </div>
			  
			  
			  
			 <div class="col-md-12">
				   <div class="col-md-3">Language:</div>
				   <div class="col-md-5"><?=$languages['name']?></div>	  
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
			  <?php
				$Publisher=mysql_fetch_assoc(mysql_query("select id_publisher,name_publisher_en from publisher where id_publisher=".$row['distribution']));
			
				?>
				   <div class="col-md-3">Publisher:</div>
				   <div class="col-md-5"><?=$Publisher['name_publisher_en']?></div>
				   <div class="col-md-2">&nbsp;</div>	  	  
              </div>
			  
			  
			  <div class="col-md-12">
			      <div class="col-md-3">Owner:</div>
				  <div class="col-md-5"><?=$row['owner']?></div>
				  <div class="col-md-2">&nbsp;</div>
              </div>
			  
			  
			   <div class="col-md-12">
			      <div class="col-md-3">Add Rate ($):</div>
				  <div class="col-md-5"><?=$row['adrate_color']?></div>	 
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




<?php }else{?>

<div id="modal" class="modal-example-content">
        <div class="modal-example-header">
            <button type="button" class="close" onClick="$.fn.custombox('close');">&times;</button>
            <h4><?=!empty($id)?'Edit ':''?>Broadcast Media Details</h4>
        </div>
        <div class="modal-example-body">
        <p>
           <div class="row">
            <form action="" method="post"  enctype="multipart/form-data" id="broad_frm">
			<input type="hidden" name="id" value="<?=$row['id_publication']?>">
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
              <select name="status" id="broad_status">
			      <option value="">Status</option>
			  	  <option value="1" <? if($row['active']=='1')echo 'Selected'?>>Active</option>
			  	  <option value="0" <? if($row['active']=='0')echo 'Selected'?>>Inactive</option>
			  </select>
              </fieldset>
			  
			  <fieldset class="col-md-6">
			  <label>Media Outlet Name <span style="color:#FF0000">*</span></label>
			  <input type="text" name="mediaOutlet" id="broad_mediaOutlet" value="<?=$row['name_publication_en']?>" placeholder="Media Outlet Name">
              </fieldset>
			  
			  <fieldset class="col-md-6">
			  <label>Type <span style="color:#FF0000">*</span></label>
                <?php
			   //Get Type details
				$get_type=mysql_query("select * from publication_type where id_publication_type IN (4,5)");
			   ?>
                <select name="id_publication_type" id="id_publication_type">
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
              <select name="country_id" id="broad_country_id">
			  
			  <option value="">Country</option>
			     <?php while($getCountry=mysql_fetch_assoc($country)){?>
					<option value="<?=$getCountry['id_country']?>" <? if($row['country']==$getCountry['id_country'])echo 'Selected'?>><?=$getCountry['name_country']?></option>
					<?php }?>
			  
			  </select>
              </fieldset>
              
               <fieldset class="col-md-6">
			   <label>Language <span style="color:#FF0000">*</span></label>
                <select  name="language_id" id="broad_language_id">
				<option value="">--Select Language--</option>
				    <?php
					foreach ($lang_arr as $lang)
					{	?>
						<option value="<?=$lang?>" <? if($row['language']==$lang)echo 'Selected'?>><?=$lang?></option>
					<?php }?>
				</select>
                </fieldset>
                
               
                                            
                <fieldset class="col-md-6">
				<label>Media Outlet Genre <span style="color:#FF0000">*</span></label>
                <?php
				$Genre=mysql_query("select * from publication_genre Order BY name_publication_genre ASC");
				?>
                <select name="id_publication_genre" id="broad_id_publication_genre">
				<option value="">Media Outlet Genre</option>
				    <?php while($getGenre=mysql_fetch_assoc($Genre)){?>
					<option value="<?=$getGenre['id_publication_genre']?>" <? if($row['id_publication_genre']==$getGenre['id_publication_genre'])echo 'Selected'?>><?=$getGenre['name_publication_genre']?></option>
					<?php }?>
				</select>
               </fieldset>
			   
			   
			   <fieldset class="col-md-6">
			   <label>Publisher <span style="color:#FF0000">*</span></label>
				<?php
				$Publisher=mysql_query("select id_publisher,name_publisher_en from publisher ORDER BY name_publisher_en ASC");
				?>
                <select name="id_publisher" id="broad_id_publisher">
				    <option value="">--Select Publisher--</option>
				    <?php while($getPublisher=mysql_fetch_assoc($Publisher)){?>
					<option value="<?=$getPublisher['id_publisher']?>" <? if($row['distribution']==$getPublisher['id_publisher'])echo 'Selected'?>><?=$getPublisher['name_publisher_en']?></option>
					<? }?>
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
				<label>Owner <span style="color:#FF0000">*</span></label>
                <input type="text" name="owner" id="owner" value="<?=$row['owner']?>" placeholder="Owner">
                </fieldset>
			  
			  
			   
				
				
				 <fieldset class="col-md-6">
				 <label>Add Rate ($/sec) <span style="color:#FF0000">*</span></label>
                <input type="text" onKeyPress="return isnum(event);" name="rate" id="broad_rate" value="<?=$row['adrate_color']?>" placeholder="Add Rate ($/sec)">
                </fieldset>
				
				
				
				<fieldset class="col-md-6">
				<label>URL</label>
                <input type="text" name="url" id="broad_url" value="<?=$row['url']?>" placeholder="URL">
                </fieldset>
				
				
				<fieldset class="col-md-6">
				<label>Phone <span style="color:#FF0000">*</span></label>
                <input type="text" name="telephone" id="broad_phone" onKeyPress="return isnum(event);"  value="<?=$row['telephone']?>" placeholder="Phone" maxlength="15">
                </fieldset>
				
				
				<fieldset class="col-md-6">
				<label>Email <span style="color:#FF0000">*</span></label>
                <input type="text" name="email" id="broad_email" value="<?=$row['email']?>" placeholder="Email">
                </fieldset>
			    
                                            
                 <fieldset class="col-md-4">
				 <label>&nbsp;</label>
                 
				 <?php if(!empty($id)){?>
				 <input type="button" name="<?=(!empty($id))?'broad_update':'broad_submit'?>" value="<?=(!empty($id))?'Update':'Submit'?>" id="submit" class="button" onclick="broad_validation('broad_update')">
				 <?php }else{ ?>
				  <input type="button" name="<?=(!empty($id))?'broad_update':'broad_submit'?>" value="<?=(!empty($id))?'Update':'Submit'?>" id="submit" class="button" onclick="broad_validation('broad_submit')">
				 <?php } ?>
                  </fieldset>
                  </form>
              </div>
                  
                  </p>
        </div>
    </div>

<?php }?>