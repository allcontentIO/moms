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
$print_media = mysql_query("SELECT * FROM publication WHERE id_publication='".$_REQUEST['id']."'");
$row =  mysql_fetch_array($print_media);
} 

if($task=='view'){

?>
<div id="modal" class="modal-example-content">
        <div class="modal-example-header">
		    <?php if(isset($_REQUEST['act']) && $_REQUEST['act'] == "view"){?>
			 <a href="index.php?pagename=publisher" charset="close" style="float:right;">&times;</a>
			<?php }else{ ?>
            <button type="button" class="close" onClick="$.fn.custombox('close');">&times;</button>
            <?php } ?>
			<h4><?=!empty($id)?'View ':''?>Print Media Details</h4>
        </div>
        <div class="modal-example-body">
        <p>
           <div class="row">
           
		     <div class="col-md-12">
                  <div class="col-md-3">Status:</div>
				  <div class="col-md-5"><?=($row['active']=='1')?'Active':'Inactive'?></div>
				  <div class="col-md-2">
				  <? if(!empty($row['logo'])){?>
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
             	   <div class="col-md-3">Frequency:</div>
				   <?php 
				   $frequency=mysql_fetch_assoc(mysql_query("select name_frequency from frequency where id_frequency=".$row['id_frequency']));	?>
				  <div class="col-md-5"><?=$frequency['name_frequency']?></div>	  
				  <div class="col-md-2">&nbsp;</div>	  
              </div>
			  
			  <?php 
			       if(!empty($row['expected_date']) && $row['expected_date']!='0000-00-00'){
	   			            $expected_date= date('d-m-Y',strtotime($row['expected_date']));
				   }
				   elseif(!empty($row['expected_day'])){
							$expected_date= $row['expected_day'];
				   }else{
							$expected_date= 'N/A';
				   }?>
			  <div class="col-md-12">
             	   <div class="col-md-3">Expected Date/Day:</div>
				  <div class="col-md-5"><?=$expected_date?></div>	  
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
				   <div class="col-md-5"><?=$row['language']?></div>
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
			      <div class="col-md-3">Delivery Method:</div>
				  <div class="col-md-5"><?=$row['del_method']?></div>
				  <div class="col-md-2">&nbsp;</div> 	  
              </div>
			  
			  
			  
			  <div class="col-md-12">
				   <div class="col-md-3">Circulation:</div>
				   <div class="col-md-5"><?=$row['circulation']?></div>
				   <div class="col-md-2">&nbsp;</div>	  	  
              </div>
			  
			  <div class="col-md-12">
			  <?php
			  $rate= explode("@",$row['rate_sheet']);
			  ?>
			  
			   <div class="col-md-3">Add Rate ($):</div>
				  <div class="col-md-5"><?=$row['adrate_color']?></div>
				  <div class="col-md-2">&nbsp;</div>  	  
              </div>
			  
			  <div class="col-md-12">
			  
				   <div class="col-md-3">Rate Sheet:</div>
				   <div class="col-md-5">
				<? 
				$filename = $row['id_publication'].".pdf";
				$filepath = $_RATEPATH.$filename;
				
				if(file_exists($filepath)){?>
				   <a href="<?php echo $_HOSTURL."adrates/".$filename;?>" target="_blank">View Rate Sheet</a>
				   <?php }else{echo 'n/a';}?>
				   </div>
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
            <h4><?=!empty($id)?'Edit ':''?>Print Media Details</h4>
        </div>
        <div class="modal-example-body">
        <p>
           <div class="row">
            <form action="" method="post" enctype="multipart/form-data" name="prin_frm1" id="print_frm1">
			<input type="hidden" name="id_publication" id="id_publication" value="<?=$row['id_publication']?>">
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
              <select name="active" id="status">
			      <option value="">Status</option>
			  	  <option value="1" <? if($row['active']=='1')echo 'Selected'?>>Active</option>
			  	  <option value="0" <? if($row['active']=='0')echo 'Selected'?>>Inactive</option>
			  </select>
              </fieldset>
			  
			  <fieldset class="col-md-6">
			  <label>Media Outlet Name <span style="color:#FF0000">*</span></label>
			  <input type="text" name="name_publication_en" id="mediaOutlet" value="<?=$row['name_publication_en']?>" placeholder="Media Outlet Name">
              </fieldset>
			  
			  <fieldset class="col-md-6">
			  <label>Type <span style="color:#FF0000">*</span></label>
               <?php
			   //Get Type details
				$get_type=mysql_query("select * from publication_type where id_publication_type IN (1,2)");
			   ?>
                <select name="id_publication_type" id="type">
					<option value="">--Select Type--</option>
					<?php while($getType=mysql_fetch_assoc($get_type)){?>
					<option value="<?=$getType['id_publication_type']?>"  <? if($row['id_publication_type']==$getType['id_publication_type'])echo 'Selected'?>><?=$getType['name_publication_type_en']?></option>
					<?php }?>
				</select>
                </fieldset>
				
				 
				

                                            
                <fieldset class="col-md-6">
				<label>Frequency <span style="color:#FF0000">*</span></label>
                 <?php
				$frequency=mysql_query("select * from frequency ORDER BY name_frequency ASC");
				?>
                 <select name="id_frequency" id="id_frequency" onChange="getFrequency(this.value)">
				 	<option value="">--Select Frequency--</option>
					<?php while($getFrequency=mysql_fetch_assoc($frequency)){?>
					<option value="<?=$getFrequency['id_frequency']?>" <? if($row['id_frequency']==$getFrequency['id_frequency'])echo 'Selected'?>><?=$getFrequency['name_frequency']?></option>
					<?php }?>
					
				 </select>
                 </fieldset>
				 
				<?php if(!empty($row["expected_date"]) && $row["expected_date"]!='0000-00-00'){?> 
				<fieldset class="col-md-6" id="frequent_day"><label>Expected Date <span style="color:#FF0000">*</span></label><input type="text" name="expected_date" id="expected_date" value="<?=(!empty($row["expected_date"]) && $row["expected_date"]!='0000-00-00')?date("Y-m-d",strtotime($row["expected_date"])):''?>" placeholder="Expected Date"  style="margin:0"><span style="color:blue; line-height:12px;">Date format: yyyy-mm-dd </span></fieldset>
				<?php }elseif($row['id_frequency']=='3'){
				      $row_expected= explode(",",$row["expected_day"]);
				?> 
				<fieldset class="col-md-6" id="frequent_day">
				<label>Expected Day <span style="color:#FF0000">*</span></label> <br /><input type="checkbox" name="expected_day[]" onclick="getExpected()" <? if($row_expected[0]=='Sunday' || trim($row_expected[1])=='Sunday'){echo 'checked';}else{echo 'disabled';}?> style="width:32px" id="expected_day" value="Sunday" > Sunday <input type="checkbox" style="width:32px" <? if($row_expected[0]=='Monday' || trim($row_expected[1])=='Monday'){echo 'checked';}else{echo 'disabled';}?> name="expected_day[]"  onclick="getExpected()" id="expected_day" value="Monday" >Monday<input type="checkbox" name="expected_day[]" style="width:32px" id="expected_day" value="Tuesday"  onclick="getExpected()" <? if($row_expected[0]=='Tuesday' || trim($row_expected[1])=='Tuesday'){echo 'checked';}else{echo 'disabled';}?>>Tuesday <input type="checkbox" style="width:32px" onclick="getExpected()" name="expected_day[]" id="expected_day" value="Wednesday" <? if($row_expected[0]=='Wednesday' || trim($row_expected[1])=='Wednesday'){echo 'checked';}else{echo 'disabled';}?> >Wednesday <input type="checkbox" style="width:32px" name="expected_day[]" id="expected_day" onclick="getExpected()" value="Thursday" <? if($row_expected[0]=='Thursday' || trim($row_expected[1])=='Thursday'){echo 'checked';}else{echo 'disabled';}?>>Thursday <input type="checkbox" style="width:32px" name="expected_day[]" id="expected_day" onclick="getExpected()" value="Friday" <? if($row_expected[0]=='Friday' || trim($row_expected[1])=='Friday'){echo 'checked';}else{echo 'disabled';}?>>Friday <input type="checkbox" onclick="getExpected()" style="width:32px" name="expected_day[]" id="expected_day" value="Saturday" <? if($row_expected[0]=='Saturday' || trim($row_expected[1])=='Saturday'){echo 'checked';}else{echo 'disabled';}?>>Saturday
				</fieldset>
				<?php }elseif(!empty($row["expected_day"])){?> 
				<fieldset class="col-md-6" id="frequent_day">
				<label>Expected Day <span style="color:#FF0000">*</span></label>
				<select name="expected_day" id="expected_day">
					<option value="Sunday" <? if($row["expected_day"]=='Sunday')echo 'Selected'?>>Sunday</option>
					<option value="Monday" <? if($row["expected_day"]=='Monday')echo 'Selected'?>>Monday</option>
					<option value="Tuesday" <? if($row["expected_day"]=='Tuesday')echo 'Selected'?>>Tuesday</option>
					<option value="Wednesday" <? if($row["expected_day"]=='Wednesday')echo 'Selected'?>>Wednesday</option>
					<option value="Thursday" <? if($row["expected_day"]=='Thursday')echo 'Selected'?>>Thursday</option>
					<option value="Friday" <? if($row["expected_day"]=='Friday')echo 'Selected'?>>Friday</option>
					<option value="Saturday" <? if($row["expected_day"]=='Saturday')echo 'Selected'?>>Saturday</option>
				</select>
				</fieldset>
				<?php }elseif($row['id_frequency']=='1'){?>
				<fieldset class="col-md-6" id="frequent_day"><label>Expected Date <span style="color:#FF0000">*</span></label><br/><span style="color:blue; line-height:12px;">Not Applicable</span></fieldset>
				<?php }else{?>
				
				<fieldset class="col-md-6" id="frequent_day"></fieldset>
				
				<? }?>
				
				
			  
				 
				 
				
              <fieldset class="col-md-6">
			  <label>Country <span style="color:#FF0000">*</span></label>
			  <?php
			  //Get Country details
				$country=mysql_query("select * from country ORDER BY name_country ASC");
			  ?>
              <select name="country" id="id_country">
			  <option value="">--Select Country--</option>
			     <?php while($getCountry=mysql_fetch_assoc($country)){?>
					<option value="<?=$getCountry['id_country']?>" <? if($row['country']==$getCountry['id_country'])echo 'Selected'?>><?=$getCountry['name_country']?></option>
					<?php }?>
			  
			  </select>
              </fieldset>
              
               <fieldset class="col-md-6">
			   <label>Language <span style="color:#FF0000">*</span></label>
			 
                <select name="language" id="language_id">
				<option value="">--Select Language--</option>
				    <?php
					 foreach ($lang_arr as $lang)
					{?>
					<option value="<?=$lang?>" <? if($row['language']==$lang)echo 'Selected'?>><?=$lang?></option>
					<?php }?>
				</select>
                </fieldset>
                
               
                                            
                <fieldset class="col-md-6">
				<label>Media Outlet Genre <span style="color:#FF0000">*</span></label>
                <?php
				$Genre=mysql_query("select * from publication_genre Order BY name_publication_genre ASC");
				?>
                <select name="id_publication_genre" id="id_publication_genre">
				<option value="">Media Outlet Genre</option>
				    <?php while($getGenre=mysql_fetch_assoc($Genre)){?>
					<option value="<?=$getGenre['id_publication_genre']?>" <? if($row['id_publication_genre']==$getGenre['id_publication_genre'])echo 'Selected'?>><?=$getGenre['name_publication_genre']?></option>
					<?php }?>
				</select>
               </fieldset>
			   
			   <? if(!empty($row['logo'])){?>
			    <fieldset class="col-md-6">
				<label>Logo </label>
			    <input type="file" name="logo" placeholder="Logo" style="margin-bottom:0px;
				 padding:2px !important;">
				<? if(!empty($row['logo'])){?>
				  
				<? }else{echo 'n/a';}?>
                </fieldset>
				<? }else{?>
				<fieldset class="col-md-6">
				<label>Logo</label>
			    <input type="file" name="logo" placeholder="Logo" style="padding:2px !important;">
				
				</fieldset>
				<?php }?>
				
				
				<fieldset class="col-md-6">
				<label>Publisher <span style="color:#FF0000">*</span></label>
               <?php
				$Publisher=mysql_query("select id_publisher,name_publisher_en from publisher Order BY name_publisher_en ASC");
				

				
				?>
                <select name="distribution" id="id_publisher">
				<option value="">--Select Publisher--</option>
				    <?php while($getPublisher=mysql_fetch_assoc($Publisher)){?>
					<option value="<?=$getPublisher['id_publisher']?>" <? if($row['distribution']==$getPublisher['id_publisher'])echo 'Selected'?>><?=$getPublisher['name_publisher_en']?></option>
					<?php }?>
				</select>
                </fieldset>
			  
			  
			    <fieldset class="col-md-6">
				<label>Delivery Method <span style="color:#FF0000">*</span></label>
                <select name="del_method" id="del_method">
				 	<option value="">--Select Delivery Method--</option>
					<option value="Delivery" <? if($row['del_method']=='Delivery')echo 'Selected'?>>Delivery</option>
					<option value="Collect" <? if($row['del_method']=='Collect')echo 'Selected'?>>Collect</option>
					<option value="Download" <? if($row['del_method']=='Download')echo 'Selected'?>>Download</option>
					<option value="Press Display" <? if($row['del_method']=='Press Display')echo 'Selected'?>>Press Display</option>
				    <option value="Distributor" <? if($row['del_method']=='Distributor')echo 'Selected'?>>Distributor</option>
					<option value="Outlet" <? if($row['del_method']=='Outlet')echo 'Selected'?>>Outlet</option>
				</select>
                </fieldset>
				
				
				
				 <fieldset class="col-md-6">
				 <label>Circulation <span style="color:#FF0000">*</span></label>
                <input type="text" onKeyPress="return isnum(event);" name="circulation" id="circulation" value="<?=$row['circulation']?>" placeholder="Circulation">
                </fieldset>
				
				
				 <fieldset class="col-md-6">
				 <label>Add Rate ($) <span style="color:#FF0000">*</span></label>
                <input type="text" name="adrate_bw" onKeyPress="return isnum(event);" id="ad_rate" value="<?=$row['adrate_color']?>" placeholder="Add Rate ($)">
                </fieldset>
				
				<? 
				$filename = $row['id_publication'].".pdf";
				$filepath = $_RATEPATH.$filename;
				
				if(file_exists($filepath)){?>
				<fieldset class="col-md-6">
				<label>Rate Sheet</label>
			    <input type="file" name="rate_sheet" id="rate_sheet" placeholder="Rate Sheet"style="margin-bottom:0px; padding:2px !important;">
				
				<a href="<?php echo $_HOSTURL."adrates/".$filename;?>" target="_blank" style="margin-bottom:13px; float:left;">View Rate Sheet</a>
				
                </fieldset>
				<? }else{?>
				<fieldset class="col-md-6">
				<label>Rate Sheet</label>
			    <input type="file" name="rate_sheet" id="rate_sheet" placeholder="Rate Sheet" style="padding:2px !important;">		
				</fieldset>
				<?php }?>
				<fieldset class="col-md-6">
				<label>URL</label>
                <input type="text" name="url" id="url" value="<?=$row['url']?>" placeholder="URL">
                </fieldset>
				
				
				<fieldset class="col-md-6">
				<label>Phone <span style="color:#FF0000">*</span></label>
                <input type="text" name="telephone" id="phone" onKeyPress="return isnum(event);"  value="<?=$row['telephone']?>" placeholder="Phone" maxlength="15">
                </fieldset>
				
				
				<fieldset class="col-md-6">
				<label>Email <span style="color:#FF0000">*</span></label>
                <input type="text" name="email" id="email" value="<?=$row['email']?>" placeholder="Email">
                </fieldset>
				
				                            
                 <fieldset class="col-md-4">
				 <label>&nbsp;</label>
				 <?php if(!empty($id)){?>
                 <input type="button" name="<?=(!empty($id))?'update':'submit'?>" value="<?=(!empty($id))?'Update':'Submit'?>" id="submit" class="button" onclick="validation('update')"> 
                  <?php }else{ ?>
				  <input type="button" name="<?=(!empty($id))?'update':'submit'?>" value="<?=(!empty($id))?'Update':'Submit'?>" id="submit" class="button" onclick="validation('submit')">
				  <?php } ?>
				  </fieldset>
                  </form>
              </div>
                  
                  </p>
        </div>
    </div>

<?php }?>