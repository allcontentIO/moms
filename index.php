<?php
ob_start();
session_start();
 
include('includes/connect.php');
include('includes/conf.php');
include('includes/head.php');
//include('messages.php');
include('includes/functions.php');
if(empty($_SESSION['moms_uname'])){
	$msg='login';
	header('Location:login.php?msg='.$msg);	
}




extract($_POST);
/*if(isset($_POST['submit']))
{


		if(($_FILES['logo']['name'])!="")
		{
			$add_file=$_FILES['logo']['name'];
			$name = time()."@".$add_file;
			$logo="momslogo/print/".$name;
			
			move_uploaded_file($_FILES["logo"]["tmp_name"],$logo);
		}
	
		$expectedday='';
		if($id_frequency==3){
		
		    for($i=0;$i<count($expected_day);$i++){
			       
			        if(count($expected_day)==$i+1)
			          $expectedday.= $expected_day[$i];
					else
					  $expectedday.= $expected_day[$i].",";
			
			}
		
		}
		else{$expectedday= $expected_day;}
		 
			$ins_user=mysql_query("INSERT INTO publication(`active`,`name_publication_en`,`name_publication_ar`,`id_publication_type`,`id_frequency`,`country`,`language`,`id_publication_genre`,`logo`,`circulation`,`distribution`,`del_method`,`adrate_color`,`rate_sheet`,`url`,`telephone`,`email`,`created`,`modified`,`created_by`,`expected_date`,`expected_day`) VALUES ('".$active."','".$name_publication_en."','".$name_publication_en."','".$id_publication_type."','".$id_frequency."','".$country."','".$language."','".$id_publication_genre."','".$logo."','".$circulation."','".$distribution."','".$del_method."','".$adrate_bw."','".$rate_sheet."','".$url."','".$telephone."','".$email."','".date('Y-m-d H:i:s')."','".date('Y-m-d H:i:s')."','admin','".$expected_date."','".$expectedday."')");	

         
	     if(($_FILES['rate_sheet']['name'])!="")
		{
		
		    $p_id = mysql_insert_id(); 
			$add_file=explode('.',$_FILES['rate_sheet']['name']);
			$name = $p_id.".".$add_file[1];
			$rate_sheet = $_RATEPATH.$name;
		
			
			
			move_uploaded_file($_FILES["rate_sheet"]["tmp_name"],$rate_sheet);
			
			mysql_query("update publication set rate_sheet = '".$rate_sheet."' where id_publication = '".$p_id."'");
			
			
		}
		 
		 


		if($ins_user)
		{
			$msg='ins_succ';
			
			
			header("location:index.php?pagename=printmedia&msg=".$msg);
		}
}
*/
if(isset($_POST["update"]))
{/*
    extract($_POST);
	
	$Printmedia=mysql_query("select logo,rate_sheet from publication where id_publication=".$id_publication);
	
	$getMedia=mysql_fetch_assoc($Printmedia);
	
	if(($_FILES['logo']['name'])!="")
		{
			$add_file=$_FILES['logo']['name'];
			$name = time()."@".$add_file;
			$logo="momslogo/print/".$name;
			unset($getMedia['logo']);
			
			move_uploaded_file($_FILES["logo"]["tmp_name"],$logo);
	}else{
	         $logo=$getMedia['logo'];
	
	}
	
	
	
	if(!empty($expected_date))
	       $expected_day='';
	if(!empty($expected_day))
	       $expected_date='';	
		   
	$expectedday='';
		if($id_frequency==3){
		
		    for($i=0;$i<count($expected_day);$i++){
			       
			        if(count($expected_day)==$i+1)
			          $expectedday.= $expected_day[$i];
					else
					  $expectedday.= $expected_day[$i].", ";
			
			}
		
	}
	else{$expectedday= $expected_day;}	   
		   
							
	$sql_update = mysql_query("UPDATE publication  SET  `active` = '".$active."',`name_publication_en` = '".$name_publication_en."',`name_publication_ar` = '".$name_publication_en."', `id_publication_type` = '".$id_publication_type."',`id_frequency` = '".$id_frequency."',`country` = '".$country."', `language` = '".$language."',`id_publication_genre` = '".$id_publication_genre."',`logo` = '".$logo."',`circulation` = '".$circulation."', `distribution` = '".$distribution."',`del_method` = '".$del_method."',`adrate_color` = '".$adrate_bw."', `rate_sheet` = '".$rate_sheet."',`url` = '".$url."',`telephone` = '".$telephone."',`email` = '".$email."',`modified` = '".date('Y-m-d H:i:s')."',`created` = 'admin',`expected_date` = '".$expected_date."',`expected_day` =  '".$expectedday."' WHERE `id_publication`='".$_POST['id_publication']."'");
	
	if(($_FILES['rate_sheet']['name'])!="")
	{
			$add_file=explode('.',$_FILES['rate_sheet']['name']);
			
			
			$name = $_POST['id_publication'].".".$add_file[1];
			$rate_sheet = $_RATEPATH.$name;
			
		  
			
			unset($getMedia['rate_sheet']);
			move_uploaded_file($_FILES["rate_sheet"]["tmp_name"],$rate_sheet);
			mysql_query("update publication set rate_sheet = '".$rate_sheet."' where id_publication = '".$_POST['id_publication']."'");
			
			
	}else{
	         $rate_sheet=$getMedia['rate_sheet'];
	}

	
	
	
	
	 $msg='upd_succ';
	 header("location:index.php?pagename=printmedia&msg=".$msg);   
*/}

if($_REQUEST['task']=='delete')
{

     $Printmedia=mysql_fetch_assoc(mysql_query("select logo,rate_sheet from publication where id_publication=".$_REQUEST['id']));
	 
	 unset($Printmedia['logo']);
	 unset($Printmedia['rate']);
	

	
	 $sql_update = mysql_query("delete from publication WHERE `id_publication`='".$_REQUEST['id']."'");
	 
	 $msg='del_succ';
	 header("location:index.php?pagename=printmedia&msg=".$msg);  
}


if(isset($_POST['digital_submit']))
{/*


		if(($_FILES['logo']['name'])!="")
		{
			$add_file=$_FILES['logo']['name'];
			$name = time()."@".$add_file;
			$logo="momslogo/digital/".$name;
			
			move_uploaded_file($_FILES["logo"]["tmp_name"],$logo);
		}
		
		

		
		
		
$ins_user=mysql_query("INSERT INTO publication(`active`,`name_publication_en`,`name_publication_ar`,`id_publication_type`,`country`,`language`,`id_publication_genre`,`logo`,`distribution`,`url`,`telephone`,`email`,`created`,`modified`,`created_by`,`subscription`,`hits`,`source_rank`) VALUES ('".$status."','".$mediaOutlet."','".$mediaOutlet."','".$id_publication_type."','".$country_id."','".$language_id."','".$id_publication_genre."','".$logo."','".$id_publisher."','".$url."','".$telephone."','".$email."','".date('Y-m-d H:i:s')."','".date('Y-m-d H:i:s')."','admin','".$subscription."','".$hits."','".$source_rank."')");	




		if($ins_user)
		{
			$msg='ins_succ';
			header("location:index.php?pagename=digitalmedia&msg=".$msg);  
		}
*/}

if(isset($_POST["digital_update"]))
{/*
    extract($_POST);
	
	$Printmedia=mysql_query("select logo from tbl_digital_media where id=".$id);
	$getMedia=mysql_fetch_assoc($Printmedia);
	
	if(($_FILES['logo']['name'])!="")
		{
			$add_file=$_FILES['logo']['name'];
			$name = time()."@".$add_file;
			$logo="momslogo/digital/".$name;
			unset($getMedia['logo']);
			
			move_uploaded_file($_FILES["logo"]["tmp_name"],$logo);
	}else{
	         $logo=$getMedia['logo'];
	
	}
	
	
				
   $sql_update = mysql_query("UPDATE publication  SET  `active` = '".$status."',`name_publication_en` = '".$mediaOutlet."',`name_publication_ar` = '".$mediaOutlet."', `id_publication_type` = '".$id_publication_type."',`country` = '".$country_id."', `language` = '".$language_id."',`id_publication_genre` = '".$id_publication_genre."',`subscription` = '".$subscription."',`hits` = '".$hits."',`source_rank` = '".$source_rank."',`logo` = '".$logo."',`url` = '".$url."',`telephone` = '".$phone."',`email` = '".$email."',`modified` = '".date('Y-m-d H:i:s')."',`distribution` = '".$distribution."' WHERE `id_publication`='".$_POST['id']."'");
	
	
	
	
	
	 $msg='upd_succ';
	 header("location:index.php?pagename=digitalmedia&msg=".$msg);    
*/}




/*
if(isset($_POST['broad_submit']))
{


		if(($_FILES['logo']['name'])!="")
		{
			$add_file=$_FILES['logo']['name'];
			$name = time()."@".$add_file;
			$logo="momslogo/broad/".$name;
			
			move_uploaded_file($_FILES["logo"]["tmp_name"],$logo);
		}
		
$ins_user=mysql_query("INSERT INTO publication(`active`,`name_publication_en`,`name_publication_ar`,`id_publication_type`,`country`,`language`,`id_publication_genre`,`logo`,`distribution`,`url`,`telephone`,`email`,`created`,`modified`,`created_by`,`owner`,`adrate_color`) VALUES ('".$status."','".$mediaOutlet."','".$mediaOutlet."','".$id_publication_type."','".$country_id."','".$language_id."','".$id_publication_genre."','".$logo."','".$id_publisher."','".$url."','".$telephone."','".$email."','".date('Y-m-d H:i:s')."','".date('Y-m-d H:i:s')."','admin','".$owner."','".$rate."')");





			$msg='ins_succ';
			header("location:index.php?pagename=broadcast&msg=".$msg);  
			exit;
		
}*/

if(isset($_POST["broad_update"]))
{/*
    extract($_POST);
	
	$Printmedia=mysql_query("select logo from tbl_broad_media where id=".$id);
	$getMedia=mysql_fetch_assoc($Printmedia);
	
	if(($_FILES['logo']['name'])!="")
		{
			$add_file=$_FILES['logo']['name'];
			$name = time()."@".$add_file;
			$logo="momslogo/broad/".$name;
			unset($getMedia['logo']);
			
			move_uploaded_file($_FILES["logo"]["tmp_name"],$logo);
	}else{
	         $logo=$getMedia['logo'];
	
	}
	
						
	$sql_update = mysql_query("UPDATE publication  SET  `active` = '".$status."',`name_publication_en` = '".$mediaOutlet."',`name_publication_ar` = '".$mediaOutlet."', `id_publication_type` = '".$id_publication_type."',`country` = '".$country_id."', `language` = '".$language_id."',`id_publication_genre` = '".$id_publication_genre."',`logo` = '".$logo."',`url` = '".$url."',`telephone` = '".$phone."',`email` = '".$email."',`modified` = '".date('Y-m-d H:i:s')."',`distribution` = '".$id_publisher."', `owner` = '".$owner."',`adrate_color` = '".$rate."' WHERE `id_publication`='".$_POST['id']."'");
	
	
	
	
	 $msg='upd_succ';
	 header("location:index.php?pagename=broadcast&msg=".$msg);  
*/}


if($_REQUEST['task']=='broad_delete')
{/*
     $Broadmedia=mysql_fetch_assoc(mysql_query("select logo from publication where id_publication=".$_REQUEST['id']));
	 
	 unset($Broadmedia['logo']);

	 $sql_update = mysql_query("delete from publication WHERE `id_publication`='".$_REQUEST['id']."'");
	 
	 $msg='del_succ';
	 header("location:index.php?pagename=broadcast&msg=".$msg);  
*/}

if(isset($_POST['issue_submit']))
{/*   
       extract($_POST);
       $Issue_id = mysql_fetch_array(mysql_query("SELECT id_issue FROM publication_issue ORDER BY id_issue DESC LIMIT 0,1"));

       $get_id = mysql_fetch_assoc(mysql_query("select *  FROM publication where name_publication_en='".$_REQUEST['search_broad_outlet']."'")); 


  
		$ins_user=mysql_query("INSERT INTO publication_issue(`id_publication`,`issue_date`,`received_date`,`received_by`,`created`,`created_by`,`done_time`,`done_by`,`id_issue`) VALUES ('".$get_id['id_publication']."','".$issue_date."','".$received_date."','".$received_by."','".$created."','".$scanned_by."','".$done_time."','".$processed_by."','".$Issue_id['id_issue']."')");	

		
			$msg='ins_succ';
			header("location:index.php?pagename=issue&msg=".$msg);  
		
*/}

if(isset($_POST["issue_update"]))
{/*
       extract($_POST);
	
	
	

       $get_id = mysql_fetch_assoc(mysql_query("select *  FROM publication where name_publication_en='".$_REQUEST['search_broad_outlet']."'")); 

						
	$sql_update = mysql_query("UPDATE publication_issue  SET  `id_publication` = '".$get_id['id_publication']."',`received_date` = '".$received_date."',`received_by` = '".$received_by."',`created` = '".$created."',`created_by` = '".$scanned_by."',`done_time` = '".$done_time."',`done_by` = '".$processed_by."',`issue_date` = '".$issue_date."' WHERE `id_publication_issue`='".$_POST['id_publication_issue']."'");
	
	
	
	 $msg='upd_succ';
	 header("location:index.php?pagename=issue&msg=".$msg);  
*/}


if($_REQUEST['task']=='issue_delete')
{/*
     
	 $sql_update = mysql_query("delete from publication_issue WHERE `id_publication_issue`='".$_REQUEST['id']."'");
	 
	 $msg='del_succ';
	 header("location:index.php?pagename=issue&msg=".$msg);  
*/}


if(isset($_POST['publisher_submit']))
{/*


		
$ins_user=mysql_query("INSERT INTO publisher(`status`,`name_publisher_en`,`name_publisher_ar`,`id_country`,`url`,`phone`,`email`,`created`,`modified`,`created_by`,`fax`) VALUES ('".$status."','".$name_publisher_en."','".$name_publisher_en."','".$id_country."','".$url."','".$phone."','".$email."','".date('Y-m-d H:i:s')."','".date('Y-m-d H:i:s')."','".$_SESSION['moms_uid']."','".$fax."')");



		if($ins_user)
		{
			$msg='ins_succ';
			header("location:index.php?pagename=publisher&msg=".$msg);  
		}
*/}

if(isset($_POST["publisher_update"]))
{/*
    extract($_POST);
	
	
							
	$sql_update = mysql_query("UPDATE publisher  SET  `status` = '".$status."',`name_publisher_en` = '".$name_publisher_en."',`name_publisher_ar` = '".$name_publisher_ar."',`id_country` = '".$id_country."', `url` = '".$url."',`phone` = '".$phone."',`email` = '".$email."',`fax` = '".$fax."',`modified` = '".date('Y-m-d H:i:s')."' WHERE `id_publisher`='".$_POST['id_publisher']."'");
	
	 $msg='upd_succ';
	 header("location:index.php?pagename=publisher&msg=".$msg);    
*/}
if($_REQUEST['task']=='publisher_delete')
{/*

    

	 mysql_query("delete from publisher WHERE `id_publisher`='".$_REQUEST['id']."'");
	 
	 $msg='del_succ';
	 header("location:index.php?pagename=publisher&msg=".$msg);  
*/}


?>



<script type="text/javascript">
function validation(txt){
 
 if($('#status').val().trim() == "")
  {
     alert("Please Select Status");
	 $('#status').focus();
	 return false;
  }
  
  if($('#mediaOutlet').val().trim() == "")
  {
     alert("Please Select Media Outlet");
	 $('#mediaOutlet').focus();
	 return false;
  }
  
  if($('#type').val().trim() == "")
  {
     alert("Please Select Type.");
	 $('#type').focus();
	 return false;
  }
  if($('#id_frequency').val().trim() == "")
  {
     alert("Please Select Frequency.");
	 $('#id_frequency').focus();
	 return false;
  }
  
 /* if($('#id_frequency').val().trim()==8){
	  if($('#expected_date').val().trim() == "")
	  {
		 alert("Please Enter Expected Date");
		 $('#expected_date').focus();
		 return false;
	  }
  }
  if($('#id_frequency').val().trim()==7){
	  if($('#expected_date').val().trim() == "")
	  {
		 alert("Please Enter Expected Date");
		 $('#expected_date').focus();
		 return false;
	  }
  }
  if($('#id_frequency').val().trim()==5){
	  if($('#expected_date').val().trim() == "")
	  {
		 alert("Please Enter Expected Date");
		 $('#expected_date').focus();
		 return false;
	  }
  }
  if($('#id_frequency').val().trim()==4){
	  if($('#expected_date').val().trim() == "")
	  {
		 alert("Please Enter Expected Date");
		 $('#expected_date').focus();
		 return false;
	  }
  }
  if($('#id_frequency').val().trim()==6){
	  if($('#expected_date').val().trim() == "")
	  {
		 alert("Please Enter Expected Date");
		 $('#expected_date').focus();
		 return false;
	  }
  }
  if($('#id_frequency').val().trim()==3){
  
      var chks = document.getElementsByName('expected_day[]');
	  var count= 0;
		for (var i = 0; i < chks.length; i++)
		{
		
			if (chks[i].checked==true)
			{
				count= count+1;
			}
			
		}
	 if(count==2){
	      var chks2 = document.getElementsByName('expected_day[]');
			
		 for (var i = 0; i < chks2.length; i++)
		 {   
		 	 if (chks2[i].checked ==false){
						
						chks2[i].disabled='true';
			 }
		 }
		 if(count>2){
			 alert("Expected Day should be only 2.");
			 $('#expected_day').focus();
			 return false;
		 }
	 }
	 if(count<2){
	    
	     alert("Please select atleast 2 days.");
		 $('#expected_day').focus();
		 return false;
	 }
   }
  */
  
   
   var fd = new FormData(document.getElementById("print_frm1"));
   if(txt == "submit")
   {
	  
	   $.ajax({
						 url:"ajax/add_print_media.php",
						 type:"POST",
						 data:fd,
						 processData: false,  
		 				 contentType: false ,
						 success: function(response)
						 {
			   
								 $('#getContent').html(response);
								 $.fn.custombox('close');
			 
						 }
			
				});
	  
   }
   else
   {
   
   
   
 		$.ajax({
						 url:"ajax/update_print_media.php",
						 type:"POST",
						 data:fd,
						 processData: false,  
		 				 contentType: false ,
						 success: function(response)
						 {
			   
								 $('#getContent').html(response);
								 $.fn.custombox('close');
			 
						 }
			
				});
   
   
   }
  
  

}
function digital_validation(txt){
 
 if($('#dig_status').val().trim() == "")
  {
     alert("Please Select Status");
	 $('#dig_status').focus();
	 return false;
  }
  
  if($('#dig_mediaOutlet').val().trim() == "")
  {
     alert("Please Select Media Outlet");
	 $('#dig_mediaOutlet').focus();
	 return false;
  }
  
  if($('#dig_type').val().trim() == "")
  {
     alert("Please Select Type.");
	 $('#dig_type').focus();
	 return false;
  }
  if($('#dig_country_id').val().trim() == "")
  {
     alert("Please Select Country.");
	 $('#dig_country_id').focus();
	 return false;
  }
  if($('#dig_language_id').val().trim() == "")
  {
     alert("Please Select Language.");
	 $('#dig_language_id').focus();
	 return false;
  }
  if($('#dig_id_publication_genre').val().trim() == "")
  {
     alert("Please Select Media Outlet Genre.");
	 $('#dig_id_publication_genre').focus();
	 return false;
  }
  
  if($('#dig_source_rank').val().trim() == "")
  {
     alert("Please Select Source Rank.");
	 $('#dig_source_rank').focus();
	 return false;
  }
  if($('#dig_subscription').val().trim() == "")
  {
     alert("Please Select Subscription.");
	 $('#dig_subscription').focus();
	 return false;
  }
  if($('#dig_id_publisher').val().trim() == "")
  {
     alert("Please Enter Publisher.");
	 $('#dig_id_publisher').focus();
	 return false;
  }
  if($('#dig_hits').val().trim() == "")
  {
     alert("Please Enter Hits/Month.");
	 $('#dig_hits').focus();
	 return false;
  }
  var url = document.getElementById("dig_url").value;
      
  if(url != "")
  {
        var pattern = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
       
        if (!pattern.test(url)) {
            alert("Please enter valid website url");
            document.getElementById("dig_url").focus();
            document.getElementById("dig_url").value ='';
            return false;
        }
  }    
  if($('#dig_phone').val().trim() == "")
  {
     alert("Please Enter Phone No.");
	 $('#dig_phone').focus();
	 return false;
  }
  if($('#dig_email').val().trim() == "")
  {
     alert("Please Enter Email");
	 $('#dig_email').focus();
	 return false;
  }
  else if(validEmail($('#dig_email').val().trim()) == false)
  {
	  alert("Please enter Valid email address.");
      $('#dig_email').focus();
      return false;
  }
  
  
  //var data = $('#digital_frm').serialize();
   var fd = new FormData(document.getElementById("digital_frm"));
   if(txt == "digital_submit")
   {
	  
	   $.ajax({
						 url:"ajax/add_digital_media.php",
						 type:"POST",
						 data:fd,
						 processData: false,  
		 				 contentType: false ,
						 success: function(response)
						 {
			   
								 $('#getdigitalContent').html(response);
								 $.fn.custombox('close');
			 
						 }
			
				});
	  
   }
   else
   {
   
   
   
 		$.ajax({
						 url:"ajax/update_digital_media.php",
						 type:"POST",
						 data:fd,
						 processData: false,  
		 				 contentType: false ,
						 success: function(response)
						 {
			   
								 $('#getdigitalContent').html(response);
								 $.fn.custombox('close');
			 
						 }
			
				});
   
   
   }
  

}

function publisher_validation(txt){

 if($('#publisher_status').val().trim() == "")
  {
     alert("Please Select Status");
	 $('#publisher_status').focus();
	 return false;
  }
  
  if($('#name_publisher_en').val().trim() == "")
  {
     alert("Please Enter Publisher Name");
	 $('#name_publisher_en').focus();
	 return false;
  }
  
  if($('#publisher_id_country').val().trim() == "")
  {
     alert("Please Select Country.");
	 $('#publisher_id_country').focus();
	 return false;
  }

  var url = document.getElementById("publisher_url").value;
      
  if(url != "")
  {
        var pattern = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
       
        if (!pattern.test(url)) {
            alert("Please enter valid website url");
            document.getElementById("publisher_url").focus();
            document.getElementById("publisher_url").value ='';
            return false;
        }
  }    
  if($('#publisher_phone').val().trim() == "")
  {
     alert("Please Enter Phone No.");
	 $('#publisher_phone').focus();
	 return false;
  }
  if($('#publisher_email').val().trim() == "")
  {
     alert("Please Enter Email");
	 $('#publisher_email').focus();
	 return false;
  }
  else if(validEmail($('#publisher_email').val().trim()) == false)
  {
	  alert("Please enter Valid email address.");
      $('#publisher_email').focus();
      return false;
  }
  
  var fd = new FormData(document.getElementById("publisher_frm"));
   if(txt == "publisher_submit")
   {
	  
	   $.ajax({
						 url:"ajax/add_publisher.php",
						 type:"POST",
						 data:fd,
						 processData: false,  
		 				 contentType: false ,
						 success: function(response)
						 {
			   
								 $('#getpublisherContent').html(response);
								 $.fn.custombox('close');
			 
						 }
			
				});
	  
   }
   else
   {
   
   
   
 		$.ajax({
						 url:"ajax/update_publisher.php",
						 type:"POST",
						 data:fd,
						 processData: false,  
		 				 contentType: false ,
						 success: function(response)
						 {
			   
								 $('#getpublisherContent').html(response);
								 $.fn.custombox('close');
			 
						 }
			
				});
   
   
   }
  
  

}

function broad_validation(txt){

 if($('#broad_status').val().trim() == "")
  {
     alert("Please Select Status");
	 $('#broad_status').focus();
	 return false;
  }
  
  if($('#broad_mediaOutlet').val().trim() == "")
  {
     alert("Please Select Media Outlet");
	 $('#broad_mediaOutlet').focus();
	 return false;
  }
  
  if($('#id_publication_type').val().trim() == "")
  {
     alert("Please Select Type.");
	 $('#id_publication_type').focus();
	 return false;
  }
  if($('#broad_country_id').val().trim() == "")
  {
     alert("Please Select Country.");
	 $('#broad_country_id').focus();
	 return false;
  }
  if($('#broad_language_id').val().trim() == "")
  {
     alert("Please Select Language.");
	 $('#broad_language_id').focus();
	 return false;
  }
  
  if($('#broad_id_publication_genre').val().trim() == "")
  {
     alert("Please Select Media Outlet Genre.");
	 $('#broad_id_publication_genre').focus();
	 return false;
  }
  if($('#broad_id_publisher').val().trim() == "")
  {
     alert("Please Select Publisher.");
	 $('#broad_id_publisher').focus();
	 return false;
  }
  
  if($('#owner').val().trim() == "")
  {
     alert("Please Enter Owner Name.");
	 $('#owner').focus();
	 return false;
  }
  if($('#broad_rate').val().trim() == "")
  {
     alert("Please Enter Rate.");
	 $('#broad_rate').focus();
	 return false;
  }
  var url = document.getElementById("broad_url").value;
      
  if(url != "")
  {
        var pattern = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
       
        if (!pattern.test(url)) {
            alert("Please enter valid website url");
            document.getElementById("broad_url").focus();
            document.getElementById("broad_url").value ='';
            return false;
        }
  }    
  if($('#broad_phone').val().trim() == "")
  {
     alert("Please Enter Phone No.");
	 $('#broad_phone').focus();
	 return false;
  }
  if($('#broad_email').val().trim() == "")
  {
     alert("Please Enter Email");
	 $('#broad_email').focus();
	 return false;
  }
  else if(validEmail($('#broad_email').val().trim()) == false)
  {
	  alert("Please enter Valid email address.");
      $('#broad_email').focus();
      return false;
  }
  
   var fd = new FormData(document.getElementById("broad_frm"));
   if(txt == "broad_submit")
   {
	  
	   $.ajax({
						 url:"ajax/add_broadcast_media.php",
						 type:"POST",
						 data:fd,
						 processData: false,  
		 				 contentType: false ,
						 success: function(response)
						 {
			   
								 $('#getbroadContent').html(response);
								 $.fn.custombox('close');
			 
						 }
			
				});
	  
   }
   else
   {
   
   
   
 		$.ajax({
						 url:"ajax/update_broad_media.php",
						 type:"POST",
						 data:fd,
						 processData: false,  
		 				 contentType: false ,
						 success: function(response)
						 {
			   
								 $('#getbroadContent').html(response);
								 $.fn.custombox('close');
			 
						 }
			
				});
   
   
   }
  

}
function confirm_delete(Id,task)
{
    if(task == '0')
	{
	  atask = "delete";
	}
	else
    if(task == '1')
	{
	  atask = "broad_delete";
	}
	else
	if(task == '2')
	{
	  atask = "digital_delete";
	}
	else
	if(task == '3')
	{
	  atask = "issue_delete";
	}
	else
	if(task == '4')
	{
	  atask = "publisher_delete";
	}
	
	
    var conf = confirm("Are you sure, want to delete record?");
	if(conf == true)
	{
		//window.location.href = 'index.php?id='+Id+'&task='+atask;
		
		if(atask == "delete")
		{
			$.ajax({
							 url:"ajax/delete_print_media.php",
							 type:"POST",
							 data:"actionfunction=showData&page=1&id="+Id,
							 cache: false,
							 success: function(response)
							 {
				   
									 $('#getContent').html(response);
									 
				 
							 }
				
					});
	   
		}
		else
		if(atask == "digital_delete")
		{
			$.ajax({
							 url:"ajax/delete_digitals_media.php",
							 type:"POST",
							 data:"actionfunction=showData&page=1&id="+Id,
							 cache: false,
							 success: function(response)
							 {
				   
									 $('#getdigitalContent').html(response);
									
				 
							 }
				
					});
		}
		else
		if(atask == "broad_delete")
		{
		
		    
			$.ajax({
							 url:"ajax/delete_broad_media.php",
							 type:"POST",
							 data:"actionfunction=showData&page=1&id="+Id,
							 cache: false,
							 success: function(response)
							 {
				   
									 $('#getbroadContent').html(response);
									
				 
							 }
				
					});
		}
		else
		if(atask == "issue_delete")
		{
		
		    
			$.ajax({
							 url:"ajax/delete_search_issue.php",
							 type:"POST",
							 data:"actionfunction=showData&page=1&id="+Id,
							 cache: false,
							 success: function(response)
							 {
				   
									 $('#getissueContent').html(response);
									
				 
							 }
				
					});
		}
		if(atask == "publisher_delete")
		{
		
		    
			$.ajax({
							 url:"ajax/delete_publisher.php",
							 type:"POST",
							 data:"actionfunction=showData&page=1&id="+Id,
							 cache: false,
							 success: function(response)
							 {
				   
									 $('#getpublisherContent').html(response);
									
				 
							 }
				
					});
		}
		
		
		
		
		
		
	}
}

function validation_issue(txt){
 
   if($('#issue_date').val().trim() == "")
  {
     alert("Please Enter Issue Date");
	 $('#issue_date').focus();
	 return false;
  } 

 if($('#search_issue_outlet').val().trim() == "")
  {
     alert("Please Select Media Outlet");
	 $('#search_issue_outlet').focus();
	 return false;
  }
  
 /* if($('#expected_date').val().trim() == "")
  {
     alert("Please Enter Expected Date");
	 $('#expected_date').focus();
	 return false;
  }*/
  if($('#received_date').val().trim() == "")
  {
     alert("Please Enter Received Date");
	 $('#received_date').focus();
	 return false;
  }
  if($('#received_by').val().trim() == "")
  {
     alert("Please Enter Received User");
	 $('#received_by').focus();
	 return false;
  }
  
  /*if($('#scanned_date').val().trim() == "")
  {
     alert("Please Enter Scanned Date");
	 $('#scanned_date').focus();
	 return false;
  }
  if($('#scanned_by').val().trim() == "")
  {
     alert("Please Enter Scanned User.");
	 $('#scanned_by').focus();
	 return false;
  }
  if($('#processed_date').val().trim() == "")
  {
     alert("Please Enter Processed Date.");
	 $('#processed_date').focus();
	 return false;
  }
  if($('#processed_by').val().trim() == "")
  {
     alert("Please Enter Processed User");
	 $('#processed_by').focus();
	 return false;
  }*/
  
  
   var fd = new FormData(document.getElementById("issue_frm"));
   if(txt == "issue_submit")
   {
	  
	   $.ajax({
						 url:"ajax/add_search_issue.php",
						 type:"POST",
						 data:fd,
						 processData: false,  
		 				 contentType: false ,
						 success: function(response)
						 {
			   
								 $('#getissueContent').html(response);
								 $.fn.custombox('close');
			 
						 }
			
				});
	  
   }
   else
   {
   
   
   
 		$.ajax({
						 url:"ajax/update_search_issue.php",
						 type:"POST",
						 data:fd,
						 processData: false,  
		 				 contentType: false ,
						 success: function(response)
						 {
			   
								 $('#getissueContent').html(response);
								 $.fn.custombox('close');
			 
						 }
			
				});
   
   
   }
}
</script>

<!--Date picker starts here-->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="pagination/style.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="https://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css" />
     <script type="text/javascript">
	 var $dp = jQuery.noConflict();
       $dp(function() {
          $dp( "#issue_from_date").datepicker(
          {
              dateFormat: 'mm/dd/yy',
            changeMonth: true,
            changeYear: true,
            yearRange: '1950:2050'
          })
		  $dp( "#issue_to_date").datepicker(
          {
              dateFormat: 'mm/dd/yy',
            changeMonth: true,
            changeYear: true,
            yearRange: '1950:2050'
          })
		  $dp( "#issue_date").datepicker(
          {
            dateFormat: 'mm/dd/yy',
            changeMonth: true,
            changeYear: true,
            yearRange: '1950:2050'
          })
          });
      </script> 
<!--Date picker end here-->


       


<script>
function getreceive(getVal){
   
   
 
   $.ajax({
	url:"ajax/get_expected_date.php",
	type:"POST",
	data:"id_publication="+getVal,
	cache: false,
    success: function(response)
	{
	   var response= response.trim().split('_');
	   
	   
	   
	   
	   //$('#exp').html(response[0]);
	   //$('#expected_date').val(response[1]);
	   document.getElementById("exp").innerHTML = response[0];
	   document.getElementById("expected_date").value = response[1]; 	 
		 
	}
    });
};
function getFrequency(getVal){


   $.ajax({
	url:"ajax/get_frequency.php",
	type:"POST",
	data:"frequency="+getVal,
	cache: false,
    success: function(response)
	{
	   document.getElementById("frequent_day").innerHTML = response;	 
	}
    });
};
function getExpected(){


	if($('#id_frequency').val().trim()==3){
  
      var chks = document.getElementsByName('expected_day[]');
	  var count= 0;
		for (var i = 0; i < chks.length; i++)
		{
		
			if (chks[i].checked==true)
			{
				count= count+1;
				
			}
			
		}
	 if(count >= 2){
	 
	 
	      var chks2 = document.getElementsByName('expected_day[]');
		 
			
		 for (var i = 0; i < chks2.length; i++)
		 {   
		 	 if (chks2[i].checked ==false){
						
						chks2[i].disabled='true';
			 }
		 }
		 
	 }
	 else
	 {
	  
	 var chks2 = document.getElementsByName('expected_day[]');
	  for (var i = 0; i < chks2.length; i++)
		 {   
			 chks2[i].disabled=false;
		 
		 	
		 }
	 }
   }
};


$(document).ready(function(){



			//e.preventDefault();


<? if(!empty($_REQUEST['id_publication'])){?>

$("#<?=$_REQUEST['id_publication']?>").trigger('click');


<? }?>



 $.ajax({
					 url:"ajax/print_media.php",
					 type:"POST",
					 data:"actionfunction=showData&page=1",
					 cache: false,
        			 success: function(response)
					 {
		   
						     $('#getContent').html(response);
		 
					 }
		
	  	});
		



<?php if(!empty($_REQUEST['pagename'])){?>
showdiv('<?=$_REQUEST['pagename']?>');





<?php if($_REQUEST['task'] == "view_pop"){?>
$.fn.custombox({
					effect: 'fadein',
					url:    'add_print_media.php?task=view&act=view&id=<?=$_REQUEST['id_publication']?>'
});
<?php } ?>



  
function showdiv(pagename){


    

     if(pagename=='printmedia'){
	            
	        <?php if($_REQUEST['msg'] != ""){?>
			var msg = "ins_succ";
			<?php } ?>   
	 
	        $.ajax({
					 url:"ajax/print_media.php",
					 type:"POST",
					 data:"actionfunction=showData&page=1&msg="+msg,
					 cache: false,
        			 success: function(response)
					 {
		   
						     $('#getContent').html(response);
		 
					 }
		
	  	    });
	       
		   /* $.fn.custombox( this, {
					effect: 'fadein'
			});
			e.preventDefault();*/
	 
	        $("#menu-1").show();   
		    $("#showstore1").show();
			$("#store1").addClass("selected");
			$("#showstore2").hide();
			$("#store2").removeClass("selected");
			$("#showstore3").hide();
			$("#store3").removeClass("selected");
	 
	 }
	 else if(pagename=='digitalmedia'){
	 
	 
	       $.ajax({
					 url:"ajax/digital_media.php",
					 type:"POST",
					 data:"actionfunction=showData&page=1",
					 cache: false,
        			 success: function(response)
					 {
		   
						     $('#getdigitalContent').html(response);
		 
					 }
		
	      	});
	 
	
	        $("#menu-1").show();
	        $("#showstore1").hide();
			$("#store1").removeClass("selected");
			$("#showstore2").show();
			$("#store2").addClass("selected");
			$("#showstore3").hide();
			$("#store3").removeClass("selected");

	 }
	 else if(pagename=='broadcast'){
	 
	        $.ajax({
					 url:"ajax/broad_media.php",
					 type:"POST",
					 data:"actionfunction=showData&page=1",
					 cache: false,
        			 success: function(response)
					 {
		   
						     $('#getbroadContent').html(response);
		 
					 }
		
	      	});
	      
	       
	        $("#menu-1").show();
	        $("#showstore1").removeClass("selected").hide();
			$("#store1").removeClass("selected");
			$("#showstore2").removeClass("selected").hide();
			$("#store2").removeClass("selected");
			$("#showstore3").addClass("selected").show();
			$("#store3").addClass("selected");
	 
	 }
	 else if(pagename=='issue'){
	 
	        $.ajax({
					 url:"ajax/search_issue.php",
					 type:"POST",
					 data:"actionfunction=showData&page=1",
					 cache: false,
        			 success: function(response)
					 {
		   
						     $('#getissueContent').html(response);
		 
					 }
		
	      	}); 
	 
	        $("#menu-2").show();
	        $("#showstore1").removeClass("selected").hide();
			$("#store1").removeClass("selected");
			$("#showstore2").removeClass("selected").hide();
			$("#store2").removeClass("selected");
			$("#showstore3").addClass("selected").hide();
			$("#store3").removeClass("selected");
	        $("#menu-2").show();
			$("#showissues").show();
	 }
	  else if(pagename=='publisher'){
	  
	        $.ajax({
					 url:"ajax/publisher.php",
					 type:"POST",
					 data:"actionfunction=showData&page=1",
					 cache: false,
        			 success: function(response)
					 {
		   
						     $('#getpublisherContent').html(response);
		 
					 }
		
	      	}); 
	  
	        $("#menu-3").show();
	        $("#showstore1").removeClass("selected").hide();
			$("#store1").removeClass("selected");
			$("#showstore2").removeClass("selected").hide();
			$("#store2").removeClass("selected");
			$("#showstore3").removeClass("selected").hide();
			$("#store3").removeClass("selected");
			$("#showstore4").addClass("selected").hide();
			$("#store4").removeClass("selected");
	        $("#menu-2").hide();
			$("#showissues").hide();
			$("#menu-3").show();
			$("#showpublisher").show();
	 }
	 

}
<?php }else{?>

    
	$("#menu-1").show();
	$("#store1").addClass("selected");
	$("#showstore1").addClass("selected").show();
<?php }?> 
    $(".menu").slideToggle(400);
	$('#store1').on('click', function() {
	        
		    
			 $("#getContent").hide();
			 $('.img_load').show();  	
	   
	       $.ajax({
					 url:"ajax/print_media.php",
					 type:"POST",
					 data:"actionfunction=showData&page=1",
					 cache: false,
        			 success: function(response)
					 {
					         $('.img_load').hide();  
		                     $("#getContent").show();
			 				 $('#getContent').html(response);
		 
					 }
		
	      	});
	
	
			$("#showstore1").show();
			$("#store1").addClass("selected");
			$("#showstore2").hide();
			$("#store2").removeClass("selected");
			$("#showstore3").hide();
			$("#store3").removeClass("selected");
	});
	$('#store2').on('click', function() {
	          
			 $("#getdigitalContent").hide();
			 $('.img_load').show();   
			  
			  
	       $.ajax({
					 url:"ajax/digital_media.php",
					 type:"POST",
					 data:"actionfunction=showData&page=1",
					 cache: false,
        			 success: function(response)
					 {
		                     $("#getdigitalContent").show();
							 $('.img_load').hide();  
						     $('#getdigitalContent').html(response);
		 
					 }
		
	      	});
	
			$("#showstore1").hide();
			$("#store1").removeClass("selected");
			$("#showstore2").show();
			$("#store2").addClass("selected");
			$("#showstore3").hide();
			$("#store3").removeClass("selected");
	});
	$('#store3').on('click', function() {
	         $("#getbroadContent").hide();
			 $('.img_load').show();   
	
	         $.ajax({
					 url:"ajax/broad_media.php",
					 type:"POST",
					 data:"actionfunction=showData&page=1",
					 cache: false,
        			 success: function(response)
					 {
		 					 $("#getbroadContent").show();
							 $('.img_load').hide();  
						     $('#getbroadContent').html(response);
		 
					 }
		
	      	});
	
			$("#showstore1").removeClass("selected").hide();
			$("#store1").removeClass("selected");
			$("#showstore2").removeClass("selected").hide();
			$("#store2").removeClass("selected");
			$("#showstore3").addClass("selected").show();
			$("#store3").addClass("selected");
	});
	
	$('.show-1').on('click', function() {
	           
		
			 $("#getContent").hide();
			 $('.img_load').show();   
			   
	         $.ajax({
					 url:"ajax/print_media.php",
					 type:"POST",
					 data:"actionfunction=showData&page=1",
					 cache: false,
        			 success: function(response)
					 {
		                      
							 $("#getContent").show();
			 				 $('.img_load').hide(); 
						     $('#getContent').html(response);
		 
					 }
		
	      	});  
			
			 $.ajax({
					 url:"ajax/digital_media.php",
					 type:"POST",
					 data:"actionfunction=showData&page=1",
					 cache: false,
        			 success: function(response)
					 {
		                      
							 $("#getdigitalContent").show();
			 				 $('.img_load').hide(); 
						     $('#getdigitalContent').html(response);
		 
					 }
		
	      	});  
	
	
	         $.ajax({
					 url:"ajax/broad_media.php",
					 type:"POST",
					 data:"actionfunction=showData&page=1",
					 cache: false,
        			 success: function(response)
					 {
		                      
							 $("#getbroadContent").show();
			 				 $('.img_load').hide(); 
						     $('#getbroadContent').html(response);
		 
					 }
		
	      	});  
	 
	
			$("#menu-2").show();
			$("#showissues").show();
	});
	
	$('.show-2').on('click', function() {
	           
			   
			   
			   
			 $("#getissueContent").hide();
			 $('.img_load').show();   
			   
	         $.ajax({
					 url:"ajax/search_issue.php",
					 type:"POST",
					 data:"actionfunction=showData&page=1",
					 cache: false,
        			 success: function(response)
					 {
		                       $('.img_load').hide(); 
							 $("#getissueContent").show();
			 				
						     $('#getissueContent').html(response);
		 
					 }
		
	      	});  
			
			   $.ajax({
					 url:"ajax/search_issue.php",
					 type:"POST",
					 data:"actionfunction=showData&page=1",
					 cache: false,
        			 success: function(response)
					 {
		                       $('.img_load').hide(); 
							 $("#getissueContent").show();
			 				
						     $('#getissueContent').html(response);
		 
					 }
		
	      	}); 
			
			
	
			$("#menu-2").show();
			$("#showissues").show();
	});
	$('.show-3').on('click', function() {
	          
	         $("#getpublisherContent").hide();
			 $('.img_load').show();   
	         $.ajax({
					 url:"ajax/publisher.php",
					 type:"POST",
					 data:"actionfunction=showData&page=1",
					 cache: false,
        			 success: function(response)
					 {
		                     $('.img_load').hide();
							 $("#getpublisherContent").show();
			                    
						     $('#getpublisherContent').html(response);
		 
					 }
		
	      	});  
	
			$("#menu-3").show();
			$("#showpublisher").show();
	});
	
			
	
		
});


</script>
<!--- Auto Suggestion -->
<script>
var $as = jQuery.noConflict();
$as(function() {

    
	var printmedia = [
	<?php
    $sql=mysql_query("select name_publication_en from publication where id_publication_type IN (1,2) ORDER BY name_publication_en ASC");
	while($row=mysql_fetch_assoc($sql))
	{
	 echo'"';
	 echo $row['name_publication_en'];
	 echo'",';
	}
	?>
	];
	$as("#search_outlet").autocomplete({
	source: printmedia
	});
	
	
	var digitalmedia = [
	<?php
    $sql=mysql_query("select name_publication_en from publication where id_publication_type IN (3,6,7,8,9) ORDER BY name_publication_en ASC");
	while($row=mysql_fetch_assoc($sql))
	{
	 echo'"';
	 echo $row['name_publication_en'];
	 echo'",';
	}
	?>
	];
	$as("#search_digital_outlet").autocomplete({
	source: digitalmedia
	});
	
	
	var broadcast = [
	<?php
    $sql=mysql_query("select name_publication_en from publication  where id_publication_type IN (4,5) ORDER BY name_publication_en ASC");
	while($row=mysql_fetch_assoc($sql))
	{
	 echo'"';
	 echo $row['name_publication_en'];
	 echo'",';
	}
	?>
	];
	$as("#search_broad_outlet").autocomplete({
	source: broadcast
	});
	
	
	
	
	
	
	
	var issue = [
	<?php
    $sql=mysql_query("select name_publication_en from publication ORDER BY name_publication_en ASC");
	while($row=mysql_fetch_assoc($sql))
	{
	 echo'"';
	 echo $row['name_publication_en'];
	 echo'",';
	}
	?>
	];
	$as("#search_issue_outlet").autocomplete({
	source: issue
	
	});
	
	
	
	
	
<?php /*?>    var printmedia = [
	<?php
    $sql=mysql_query("select name_publication_genre from publication_genre ORDER BY name_publication_genre ASC");
	while($row=mysql_fetch_assoc($sql))
	{
	 echo'"';
	 echo $row['name_publication_genre'];
	 echo'",';
	}
	?>
	];
	$ep("#search_genre").autocomplete({
	source: printmedia
	});
	<?php */?>
	
	
});
</script>
<!--- Auto Suggestion -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
function filter_type(getValue,page) {
	    
		
		$("#getContent").hide();
		$('.img_load').show();
		   
        var search_status= $('#search_status').val();
		var search_country= $('#search_country').val();
		var search_language= $('#search_language').val();
		var search_type= $('#search_type').val();
		var search_frequency= $('#search_frequency').val();
		var search_outlet= $('#search_outlet').val();
		var search_print_publisher= $('#search_print_publisher').val();
		var datasrch="task=search&search_status="+search_status+"&search_country="+search_country+"&search_language="+search_language+"&search_type="+search_type+"&search_frequency="+search_frequency+"&search_outlet="+search_outlet+"&search_print_publisher="+search_print_publisher+"&type="+getValue+"&actionfunction=showData&page="+page;
			$.ajax({
				url: 'ajax/print_media.php',
				type: 'POST',
				data: datasrch,
				cache:false,
				success:function(html){
				     
					$('.img_load').hide();
					$("#getContent").show();
					$("#getContent").html(html);
					
				}
			});
}
function filter_search() {

        $("#getContent").hide();
		$('.img_load').show();

        var search_status= $('#search_status').val();
		var search_country= $('#search_country').val();
		var search_language= $('#search_language').val();
		var search_type= $('#search_type').val();
		var search_frequency= $('#search_frequency').val();
		var search_outlet= $('#search_outlet').val();
		var search_print_publisher= $('#search_print_publisher').val();
		var datasrch="task=search&search_status="+search_status+"&search_country="+search_country+"&search_language="+search_language+"&search_type="+search_type+"&search_frequency="+search_frequency+"&search_outlet="+search_outlet+"&search_print_publisher="+search_print_publisher;
			$.ajax({
				url: 'ajax/search_print_media.php',
				type: 'POST',
				data: datasrch,
				cache:false,
				success:function(html){
				
					$('.img_load').hide();
					$("#getContent").show();
					$("#getContent").html(html);
				}
			});
}
function filter_digital_search() {
        
		$("#getdigitalContent").hide();
		$('.img_load').show();
 
        var search_digit_status= $('#search_digit_status').val();
		var search_digit_country= $('#search_digit_country').val();
		var search_digit_language= $('#search_digit_language').val();
		var search_digit_genre= $('#search_digit_genre').val();
		var search_digit_type= $('#search_digit_type').val();
		var search_publisher= $('#search_publisher').val();
		var search_digital_outlet= $('#search_digital_outlet').val();
		var datasrch="task=search&search_digit_status="+search_digit_status+"&search_digit_country="+search_digit_country+"&search_digit_language="+search_digit_language+"&search_digit_type="+search_digit_type+"&search_publisher="+search_publisher+"&search_digital_outlet="+search_digital_outlet+"&search_digit_genre="+search_digit_genre;
			$.ajax({
				url: 'ajax/search_digital_media.php',
				type: 'POST',
				data: datasrch,
				cache:false,
				success:function(html){
				    
					$('.img_load').hide();
					$("#getdigitalContent").show();
					$("#getdigitalContent").html(html);
				}
			});
}
function digital_filter_type(getValue,page) {

        $("#getdigitalContent").hide();
		$('.img_load').show();
	
        var search_digit_status= $('#search_digit_status').val();
		var search_digit_country= $('#search_digit_country').val();
		var search_digit_language= $('#search_digit_language').val();
		var search_digit_type= $('#search_digit_type').val();
		var search_digit_genre= $('#search_digit_genre').val();
		var search_publisher= $('#search_publisher').val();
		var search_digital_outlet= $('#search_digital_outlet').val();
		var datasrch="task=search&search_digit_status="+search_digit_status+"&search_digit_country="+search_digit_country+"&search_digit_language="+search_digit_language+"&search_digit_type="+search_digit_type+"&search_publisher="+search_publisher+"&search_digital_outlet="+search_digital_outlet+"&type="+getValue+"&actionfunction=showData&page="+page+"&search_digit_genre="+search_digit_genre;
			$.ajax({
				url: 'ajax/digital_media.php',
				type: 'POST',
				data: datasrch,
				cache:false,
				success:function(html){
				
					$('.img_load').hide();
					$("#getdigitalContent").show();
					$("#getdigitalContent").html(html);
				}
			});
}

function publisher_filter_type(page) {
	    
		$("#getpublisherContent").hide();
		$('.img_load').show();
		
        var search_publisher_status= $('#search_publisher_status').val();
		var search_publisher_country= $('#search_publisher_country').val();
		var search_publisher= $('#search_publish').val();
		var datasrch="task=search&search_publisher_status="+search_publisher_status+"&search_publisher_country="+search_publisher_country+"&search_publisher="+search_publisher+"&actionfunction=showData&page="+page;
			$.ajax({
				url: 'ajax/publisher.php',
				type: 'POST',
				data: datasrch,
				cache:false,
				success:function(html){
				     
					$('.img_load').hide();
					$("#getpublisherContent").show();
					$("#getpublisherContent").html(html); 
					
				}
			});
}


function filter_broad_search() {

        $("#getbroadContent").hide();
		$('.img_load').show(); 

        var search_broad_status= $('#search_broad_status').val();
		var search_broad_country= $('#search_broad_country').val();
		var search_broad_language= $('#search_broad_language').val();
		var search_broad_type= $('#search_broad_type').val();
		var search_broad_genre= $('#search_broad_genre').val();
		var search_broad_outlet= $('#search_broad_outlet').val();
		var search_broad_publisher= $('#search_broad_publisher').val();
		var datasrch="task=search&search_broad_status="+search_broad_status+"&search_broad_country="+search_broad_country+"&search_broad_language="+search_broad_language+"&search_broad_type="+search_broad_type+"&search_broad_genre="+search_broad_genre+"&search_broad_outlet="+search_broad_outlet+"&search_broad_publisher="+search_broad_publisher;
			$.ajax({
				url: 'ajax/search_broad_media.php',
				type: 'POST',
				data: datasrch,
				cache:false,
				success:function(html){
				    
					$('.img_load').hide();
					$("#getbroadContent").show();
					$("#getbroadContent").html(html); 
					
				}
			});
}

function broad_filter_type(getValue,page) {
	    
		$("#getbroadContent").hide();
		$('.img_load').show(); 
		
        var search_broad_status= $('#search_broad_status').val();
		var search_broad_country= $('#search_broad_country').val();
		var search_broad_language= $('#search_broad_language').val();
		var search_broad_type= $('#search_broad_type').val();
		var search_broad_genre= $('#search_broad_genre').val();
		var search_broad_outlet= $('#search_broad_outlet').val();
		var search_broad_publisher= $('#search_broad_publisher').val();
		var datasrch="task=search&search_broad_status="+search_broad_status+"&search_broad_country="+search_broad_country+"&search_broad_language="+search_broad_language+"&search_broad_genre="+search_broad_genre+"&search_broad_outlet="+search_broad_outlet+"&search_broad_publisher="+search_broad_publisher+"&type="+getValue+"&actionfunction=showData&page="+page;
			$.ajax({
				url: 'ajax/broad_media.php',
				type: 'POST',
				data: datasrch,
				cache:false,
				success:function(html){
				 
				 	$('.img_load').hide();
					$("#getbroadContent").show();
					$("#getbroadContent").html(html); 
				}
			});
}
function issue_search(page) {
        
		$("#getbroadContent").hide();
		$('.img_load').show(); 
		
	    var search_issue_status= $('#search_issue_status').val();
		var search_issue_country= $('#search_issue_country').val();
		var search_issue_language= $('#search_issue_language').val();
		var search_issue_type= $('#search_issue_type').val();
		var search_issue_frequency= $('#search_issue_frequency').val();
		var search_issue_outlet= $('#search_issue_outlet').val();
		var search_date_type= $('#search_date_type').val();
		var issue_from_date= $('#issue_from_date').val();
		var issue_to_date= $('#issue_to_date').val();
		var datasrch="task=search&search_issue_status="+search_issue_status+"&search_issue_country="+search_issue_country+"&search_issue_language="+search_issue_language+"&search_issue_type="+search_issue_type+"&search_issue_frequency="+search_issue_frequency+"&search_issue_outlet="+search_issue_outlet+"&search_date_type="+search_date_type+"&issue_from_date="+issue_from_date+"&issue_to_date="+issue_to_date+"&actionfunction=showData&page="+page;
			$.ajax({
				url: 'ajax/search_issue.php',
				type: 'POST',
				data: datasrch,
				cache:false,
				success:function(html){
				    
					$('.img_load').hide();
					$("#getissueContent").show();
					$("#getissueContent").html(html); 
					
				}
			});
}
</script>



<body>
    <div class="bg-overlay"></div>

    <div class="container-fluid">
        <div class="row">
            
           <?php include('includes/side_bar.php'); ?>
            <div class="col-md-8 col-sm-12" style="padding:0;">
                
                <div id="menu-container">

                    <div id="menu-1" class="about content">
                        <div class="row">
                          <div class="cd-tabs">
	<nav>
		<ul class="cd-tabs-navigation">
			<li><a data-content="store1" id="store1" href="javascript:void(0)">Print Media</a></li>
			<li><a data-content="store2" id="store2" href="javascript:void(0)">Digital Media</a></li>
			<li><a data-content="store3" id="store3" href="javascript:void(0)">Broadcast Media</a></li>
			
		</ul> <!-- cd-tabs-navigation -->
	</nav>

	<ul class="cd-tabs-content" style="background:#fff;">
	    
		<!--Print Media Starts Here-->
		<?    
		    extract($_POST);
			
			
			
		    if(!empty($_POST['search'])){
		                $sql = "SELECT * FROM publication where 1";
						$sqls='';
						if(!empty($search_status)){
						
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
						if(!empty($from_date) && !empty($to_date)){
						
						   $sqls.=" AND created between '".date('Y-m-d',strtotime($from_date))."' and '".date('Y-m-d',strtotime($to_date))."'";
						}
			           
						$sql_count = mysql_fetch_assoc(mysql_query("SELECT count(*) as total FROM publication where 1 $sqls"));
						$sql= $sql.$sqls;	
		
		       }else{
			
						$sql = "SELECT * FROM publication LIMIT 0,10";
			            
						$sql_count = mysql_fetch_assoc(mysql_query("SELECT count(*) as total FROM (
    SELECT id_publication FROM publication LIMIT 0, 10
)  publication"));
			   }
					
			
				$result = mysql_query($sql) or die(mysql_error());
		   ?> 
		
		
		<li data-content="store1" id="showstore1">
		<? //include('messages.php')?>
		
			<p>
            <div class="row">
            <form action="index.php" method="post">
             <fieldset class="col-md-6">
              <select name="search_status" id="search_status">
			      <option value="">Status</option>
			  	  <option value="1" <? if($search_status=='1')echo 'Selected'?>>Active</option>
			  	  <option value="0" <? if($search_status=='0')echo 'Selected'?>>Inactive</option>
			  </select>
              </fieldset>
              <fieldset class="col-md-6">
			  <? //Get Country details
				$country=mysql_query("select * from country ORDER BY name_country ASC");
              ?>
              <select name="search_country" id="search_country">
			  <option value="">Country</option>
			     <?php while($getCountry=mysql_fetch_assoc($country)){?>
					<option value="<?=$getCountry['id_country']?>" <? if($search_country==$getCountry['id_country'])echo 'Selected'?>><?=$getCountry['name_country']?></option>
					<?php }?>
			  
			  </select>
              </fieldset>
              
               <fieldset class="col-md-6">
			
                <select name="search_language" id="search_language">
				    <option value="">Language</option>
				<?php 	
				foreach ($lang_arr as $lang)
				{
				?>
					<option value="<?=$lang?>" <? if($search_language==$lang)echo 'Selected'?>><?=$lang?></option>
				<?php }?>
				</select>
                </fieldset>
                <fieldset class="col-md-6">
				
				 <?php
			   //Get Type details
				$get_type=mysql_query("select * from publication_type where id_publication_type IN (1,2)");
			   ?>
                <select name="search_type" id="search_type">
					<option value="">Type</option>
					<option value="">All</option>
					<?php while($getType=mysql_fetch_assoc($get_type)){?>
					<option value="<?=$getType['id_publication_type']?>"  <? if($search_type==$getType['id_publication_type'])echo 'Selected'?>><?=$getType['name_publication_type_en']?></option>
					<?php }?>
				</select>
                </fieldset>
                                            
                <fieldset class="col-md-6">
				<?php
				$frequency=mysql_query("select * from frequency");
				?>
                 <select name="search_frequency" id="search_frequency">
				 	<option value="">Frequency</option>
					<?php while($getFrequency=mysql_fetch_assoc($frequency)){?>
					<option value="<?=$getFrequency['id_frequency']?>" <? if($getFrequency['id_frequency']==$search_frequency) echo 'Selected'?>><?=$getFrequency['name_frequency']?></option>
					<?php }?>
					
				 </select>
                 </fieldset>
                <fieldset class="col-md-6">
			<?php /*?>	<?php
				$outlet=mysql_query("select id_publication,name_publication_en from publication ORDER BY name_publication_en ASC");
				?>
                <select name="search_outlet" id="search_outlet"> 
				    <option value="">Media Outlet Name</option>
				    <?php while($getOutlet=mysql_fetch_assoc($outlet)){?>
					<option value="<?=$getOutlet['id_publication']?>" <? if($getOutlet['id_publication']==$search_outlet) echo 'Selected'?>><?=$getOutlet['name_publication_en']?></option>
					<?php }?>	
				</select><?php */?>
				
				<input type="text" name="search_outlet" id="search_outlet" Placeholder="Media Outlet Name">
				
                </fieldset>
				
				
				<fieldset class="col-md-6">
				<?php
				$Publisher=mysql_query("select id_publisher,name_publisher_en from publisher ORDER BY name_publisher_en ASC");
				?>
                <select id="search_print_publisher">
				    <option value="">Publisher</option>
				    <?php while($getPublisher=mysql_fetch_assoc($Publisher)){?>
					<option value="<?=$getPublisher['id_publisher']?>" <? if($search_publisher==$getPublisher['id_publisher'])echo 'Selected'?>><?=$getPublisher['name_publisher_en']?></option>
					<?php }?>	
				</select>
                </fieldset>
				                           
                 <fieldset class="col-md-2">
                 <input value="Search" type="button" onClick="filter_type('',1)" id="submit" class="button">
                  </fieldset>
				  
				  <fieldset class="col-md-2">
                  <input value="Reset" type="reset" class="button">
                  </fieldset>
				  
                  </form>
              </div>
             
          <div class="row"> 
		  <?php if($_SESSION['moms_type']=='super_admin'){?>
		  <a href="add_print_media.php" class="fadein"><div class="add_left" style="margin-left:14px;">
		  Add Media Outlet  
		  </div></a>	
		  <?php }?>
		  </div>
		       
		  <div class="img_load" align="center" style="display:none;">	    
		  <br><br><br><br><br>
		  <img src="images/progress.gif"  />   
		  <br><br><br><br><br><br><br> 
          </div>
		  <div id="getContent">
		    
		  
		  </div>        
           <div class="row" style="margin-left:0">
		   <?php
			   //Get Type details
				$get_type=mysql_query("select * from publication_type where id_publication_type IN (1,2)");
			   ?>
		   <?php while($getType=mysql_fetch_assoc($get_type)){?>
           <div class="add_left" onClick="filter_type('<?=$getType['id_publication_type']?>','1')"><?=$getType['name_publication_type_en']?></div>
		   <?php }?>
		   <div class="add_left" onClick="filter_type('All','1')">All</div>
           </div>           
                                    
         </p>
		</li>
		<!--Print Media End Here-->
		
		
		
		
		<!--Digital Media Starts Here-->
		<?    
		    extract($_POST);
		    if(!empty($_POST['digital_search'])){
		                $sql = "SELECT * FROM tbl_digital_media where 1";
						$sqls='';
						if(!empty($search_digit_status)){
						
						   $sqls.=" AND status='".$search_digit_status."'";
						}
						if(!empty($search_digit_country)){
						
						   $sqls.=" AND country_id ='".$search_digit_country."'";
						}
						if(!empty($search_digit_language)){
						
						   $sqls.=" AND language_id='".$search_digit_language."'";
						}
						if(!empty($search_digit_type)){
						
						   $sqls.=" AND type='".$search_digit_type."'";
						}
						if(!empty($search_digit_outlet)){
						
						   $sqls.=" AND id ='".$search_digit_outlet."'";
						}
						
			           
						$sql_count = mysql_fetch_assoc(mysql_query("SELECT count(*) as total FROM tbl_digital_media where 1 $sqls"));
						$sql= $sql.$sqls;	
		
		       }else{
			
						$sql = "SELECT * FROM tbl_digital_media";
			            
						$sql_count = mysql_fetch_assoc(mysql_query("SELECT count(*) as total FROM tbl_digital_media"));
			   }
					
			
				$result = mysql_query($sql) or die(mysql_error());
		   ?> 
		
		
		<li data-content="store2" id="showstore2">
		<? //include('messages.php')?>
		
			<p>
            <div class="row">
            <form action="index.php" method="post">
             <fieldset class="col-md-6">
              <select name="search_digit_status" id="search_digit_status">
			      <option value="">Status</option>
			  	  <option value="1" <? if($search_digit_status=='1')echo 'Selected'?>>Active</option>
			  	  <option value="0" <? if($search_digit_status=='0')echo 'Selected'?>>Inactive</option>
			  </select>
              </fieldset>
              <fieldset class="col-md-6">
			  <? //Get Country details
				$country=mysql_query("select * from country ORDER BY name_country ASC");
              ?>
              <select name="search_digit_country" id="search_digit_country">
			  <option value="">Country</option>
			     <?php while($getCountry=mysql_fetch_assoc($country)){?>
					<option value="<?=$getCountry['id_country']?>" <? if($search_digit_country==$getCountry['id_country'])echo 'Selected'?>><?=$getCountry['name_country']?></option>
					<?php }?>
			  
			  </select>
              </fieldset>
              
               <fieldset class="col-md-6">
			  
                <select  name="search_digit_language" id="search_digit_language">
				    <option value="">Language</option>
				    <?php foreach ($lang_arr as $lang)
					{?>
					<option value="<?=$lang?>" <? if($search_digit_language==$lang)echo 'Selected'?>><?=$lang?></option>
					<?php }?>
				</select>
                </fieldset>
                <fieldset class="col-md-6">
                <select name="search_digit_type" id="search_digit_type">
					<option value="">Type</option>
					<option value="">All</option>
					<option value="6" <? if($search_digit_type=='6')echo 'Selected'?>>Editorial</option>
					<option value="7" <? if($search_digit_type=='7')echo 'Selected'?>>Social Media</option>
					<option value="8" <? if($search_digit_type=='8')echo 'Selected'?>>Blogs</option>
					<option value="9" <? if($search_digit_type=='9')echo 'Selected'?>>Forums</option>
					<option value="3" <? if($search_digit_type=='3')echo 'Selected'?>>Website</option>
				</select>
                </fieldset>
				
				
				  <fieldset class="col-md-6">
				 <?php
				$Genre=mysql_query("select * from publication_genre Order BY name_publication_genre ASC");
				?>
                <select name="search_digit_genre" id="search_digit_genre">
				<option value="">Media Outlet Genre</option>
				    <?php while($getGenre=mysql_fetch_assoc($Genre)){?>
					<option value="<?=$getGenre['id_publication_genre']?>" <? if($search_digit_genre==$getGenre['id_publication_genre'])echo 'Selected'?>><?=$getGenre['name_publication_genre']?></option>
					<?php }?>
				</select>
                </fieldset>
				
				
				
                <fieldset class="col-md-6">
				<?php /*?><?php
				$outlet=mysql_query("select id,mediaOutlet from tbl_digital_media Order BY mediaOutlet ASC");
				?>
                <select id="search_digital_outlet">
				    <option value="">Media Outlet Name</option>
				    <?php while($getOutlet=mysql_fetch_assoc($outlet)){?>
					<option value="<?=$getOutlet['id']?>"  <? if($search_outlet==$getOutlet['id'])echo 'Selected'?>><?=$getOutlet['mediaOutlet']?></option>
					<?php }?>	
				</select><?php */?>
				<input type="text" name="search_digital_outlet" id="search_digital_outlet" Placeholder="Media Outlet Name">
                </fieldset>
				
				
				
				<fieldset class="col-md-6">
				<?php
				$Publisher=mysql_query("select id_publisher,name_publisher_en from publisher ORDER BY name_publisher_en ASC");
				?>
                <select name="search_publisher" id="search_publisher">
				    <option value="">Publisher</option>
				    <?php while($getPublisher=mysql_fetch_assoc($Publisher)){?>
					<option value="<?=$getPublisher['id_publisher']?>" <? if($search_publisher==$getPublisher['id_publisher'])echo 'Selected'?>><?=$getPublisher['name_publisher_en']?></option>
					<?php }?> 
				</select>
                </fieldset>
				
				
				
				
				                            
                <fieldset class="col-md-2">
                <input type="button" name="digital_search" onClick="digital_filter_type('','1')" value="Search" class="button">
                </fieldset>
				<fieldset class="col-md-2">
                <input value="Reset" type="reset" class="button">
                </fieldset>
				  
				
                </form>
              </div>
          
		  <div class="row"> 
		  <?php if($_SESSION['moms_type']=='super_admin'){?>
		 <a href="add_digital_media.php" class="fadein"> <div class="add_left" style="margin-left:14px;">
		  Add Media Outlet
		  </div></a>	  
		  <?php }?>
		  </div>   
          <div class="img_load" align="center" style="display:none;">	    
		  <br><br><br><br><br>
		  <img src="images/progress.gif"  />   
		  <br><br><br><br><br><br><br>
          </div>
		  <div id="getdigitalContent">         
      
		  
		  
		  </div>                        
                     
           <div class="row" style="margin-left:0">
           <div class="add_left" onClick="digital_filter_type('6','1')">Editorial</div>
           <div class="add_left" onClick="digital_filter_type('7','1')">Social Media</div>
		   <div class="add_left" onClick="digital_filter_type('8','1')">Blogs</div>
		   <div class="add_left" onClick="digital_filter_type('9','1')">Forums</div>
		   <div class="add_left" onClick="digital_filter_type('3','1')">Website</div>
		   <div class="add_left" onClick="digital_filter_type('All','1')">All</div>
           </div>           
                                    
         </p>
		</li>
		<!--Digital Media End Here-->
		
		
		
		
		
		
		<!--Broad Media Starts Here-->
		<?    
		    extract($_POST);
		    if(!empty($_POST['broad_search'])){
		                $sql = "SELECT * FROM tbl_broad_media where 1";
						$sqls='';
						if(!empty($search_broad_status)){
						
						   $sqls.=" AND status='".$search_broad_status."'";
						}
						if(!empty($search_broad_country)){
						
						   $sqls.=" AND country_id ='".$search_broad_country."'";
						}
						if(!empty($search_broad_language)){
						
						   $sqls.=" AND language_id='".$search_broad_language."'";
						}
						if(!empty($search_broad_type)){
						
						   $sqls.=" AND type='".$search_broad_type."'";
						}
						if(!empty($search_broad_outlet)){
						
						   $sqls.=" AND id ='".$search_broad_outlet."'";
						}
						
			           
						$sql_count = mysql_fetch_assoc(mysql_query("SELECT count(*) as total FROM tbl_broad_media where 1 $sqls"));
						$sql= $sql.$sqls;	
		
		       }else{
			
						$sql = "SELECT * FROM tbl_broad_media";
			            
						$sql_count = mysql_fetch_assoc(mysql_query("SELECT count(*) as total FROM tbl_broad_media"));
			   }
					
			
				$result = mysql_query($sql) or die(mysql_error());
		   ?> 
		
		
		<li data-content="store3"  id="showstore3">
		<? //include('messages.php')?>
		
			<p>
            <div class="row">
            <form action="index.php" method="post">
             <fieldset class="col-md-6">
              <select name="search_broad_status" id="search_broad_status">
			      <option value="">Status</option>
			  	  <option value="1" <? if($search_broad_status=='1')echo 'Selected'?>>Active</option>
			  	  <option value="0" <? if($search_broad_status=='0')echo 'Selected'?>>Inactive</option>
			  </select>
              </fieldset>
              <fieldset class="col-md-6">
			  <? //Get Country details
				$country=mysql_query("select * from country ORDER BY name_country ASC");
              ?>
              <select name="search_broad_country" id="search_broad_country">
			  <option value="">Country</option>
			     <?php while($getCountry=mysql_fetch_assoc($country)){?>
					<option value="<?=$getCountry['id_country']?>" <? if($search_broad_country==$getCountry['id_country'])echo 'Selected'?>><?=$getCountry['name_country']?></option>
					<?php }?>
			  
			  </select>
              </fieldset>
              
               <fieldset class="col-md-6">
			   
                <select  name="search_broad_language" id="search_broad_language">
				    <option value="">Language</option>
				    <?php foreach ($lang_arr as $lang)
					{	?>
					<option value="<?=$lang?>" <? if($search_broad_language==$lang)echo 'Selected'?>><?=$lang?></option>
					<?php }?>
				</select>
                </fieldset>
                <fieldset class="col-md-6">
                <select name="search_broad_type" id="search_broad_type">
					<option value="">Type</option>
					<option value="">All</option>
					<option value="4" <? if($search_broad_type=='4')echo 'Selected'?>>TV</option>
					<option value="5" <? if($search_broad_type=='5')echo 'Selected'?>>Radio</option>
				</select>
                </fieldset>
				
				
				
                                            
                
                <fieldset class="col-md-6">
				 <?php
				$Genre=mysql_query("select * from publication_genre Order BY name_publication_genre ASC");
				?>
                <select name="search_broad_genre" id="search_broad_genre">
				<option value="">Media Outlet Genre</option>
				    <?php while($getGenre=mysql_fetch_assoc($Genre)){?>
					<option value="<?=$getGenre['id_publication_genre']?>" <? if($search_broad_genre==$getGenre['id_publication_genre'])echo 'Selected'?>><?=$getGenre['name_publication_genre']?></option>
					<?php }?>
				</select>
                </fieldset>
			
				
				 <fieldset class="col-md-6">
				<?php /*?><?php
				$outlet=mysql_query("select id,mediaOutlet from tbl_broad_media ORDER BY mediaOutlet ASC");
				?>
                <select name="search_broad_outlet" id="search_broad_outlet">
				    <option value="">Media Outlet Name</option>
				    <?php while($getOutlet=mysql_fetch_assoc($outlet)){?>
					<option value="<?=$getOutlet['id']?>" <? if($search_broad_outlet==$getOutlet['id'])echo 'Selected'?>><?=$getOutlet['mediaOutlet']?></option>
					<?php }?>	
				</select><?php */?>
				<input type="text" name="search_broad_outlet" id="search_broad_outlet" Placeholder="Media Outlet Name">
                </fieldset>
				
				<fieldset class="col-md-6">
				<?php
				$Publisher=mysql_query("select id_publisher,name_publisher_en from publisher ORDER BY name_publisher_en ASC");
				?>
                <select id="search_broad_publisher">
				    <option value="">Publisher</option>
				    <?php while($getPublisher=mysql_fetch_assoc($Publisher)){?>
					<option value="<?=$getPublisher['id_publisher']?>" <? if($search_publisher==$getPublisher['id_publisher'])echo 'Selected'?>><?=$getPublisher['name_publisher_en']?></option>
					<?php }?>	
				</select>
                </fieldset>
				
				
				                            
                <fieldset class="col-md-2">
                <input type="button" name="broad_search" onClick="broad_filter_type('','1')" value="Search" class="button">
                </fieldset>
				<fieldset class="col-md-2">
                <input value="Reset" type="reset" class="button">
                </fieldset>
                </form>
              </div>
         
		  <div class="row"> 
		  <?php if($_SESSION['moms_type']=='super_admin'){?>
		  <a href="add_broadcast.php" class="fadein"><div class="add_left" style="margin-left:14px;">
		  Add Media Outlet	  
		  </div></a>
		  <?php }?>
		  </div>   
		  <div class="img_load" align="center" style="display:none;">	    
		  <br><br><br><br><br>
		  <img src="images/progress.gif"  />   
		  <br><br><br><br><br><br><br>
          </div>
          <div  id="getbroadContent"></div>	 
					 
           <div class="row" style="padding-left:14px;">
           <div class="add_left" onClick="broad_filter_type('4','1')">TV</div>
           <div class="add_left" onClick="broad_filter_type('5','1')">Radio</div>
		   <div class="add_left" onClick="broad_filter_type('All','1')">All</div>
           </div>           
                                    
         </p>
		</li>
		<!--Broad Media End Here-->
		
		
		
		
		
		
		



		<li data-content="settings">
			<p>Settings Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam nam magni, ullam nihil a suscipit, ex blanditiis, adipisci tempore deserunt maiores. Nostrum officia, ratione enim eaque nihil quis ea, officiis iusto repellendus. Animi illo in hic, maxime deserunt unde atque a nesciunt? Non odio quidem deserunt animi quod impedit nam, voluptates eum, voluptate consequuntur sit vel, et exercitationem sint atque dolores libero dolorem accusamus ratione iste tenetur possimus excepturi. Accusamus vero, dignissimos beatae tempore mollitia officia voluptate quam animi vitae.</p>

			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique ipsam eum reprehenderit minima at sapiente ad ipsum animi doloremque blanditiis unde omnis, velit molestiae voluptas placeat qui provident ab facilis.</p>
		</li>

		<li data-content="trash">
			<p>Trash Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio itaque a iure nostrum animi praesentium, numquam quidem, nemo, voluptatem, aspernatur incidunt. Fugiat aspernatur excepturi fugit aut, dicta reprehenderit temporibus, nobis harum consequuntur quo sed, illum.</p>

			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima doloremque optio tenetur, natus voluptatum error vel dolorem atque perspiciatis aliquam nemo id libero dicta est saepe laudantium provident tempore ipsa, accusamus similique laborum, consequatur quia, aut non maiores. Consectetur minus ipsum aliquam pariatur dolorem rerum laudantium minima perferendis in vero voluptatem suscipit cum labore nemo explicabo, itaque nobis debitis molestias officiis? Impedit corporis voluptates reiciendis deleniti, magnam, fuga eveniet! Velit ipsa quo labore molestias mollitia, quidem, alias nisi architecto dolor aliquid qui commodi tempore deleniti animi repellat delectus hic. Alias obcaecati fuga assumenda nihil aliquid sed vero, modi, voluptatem? Vitae voluptas aperiam nostrum quo harum numquam earum facilis sequi. Labore maxime laboriosam omnis delectus odit harum recusandae sint incidunt, totam iure commodi ducimus similique doloremque! Odio quaerat dolorum, alias nihil quam iure delectus repellendus modi cupiditate dolore atque quasi obcaecati quis magni excepturi vel, non nemo consequatur, mollitia rerum amet in. Nesciunt placeat magni, provident tempora possimus ut doloribus ullam!</p>
		</li>
		
	</ul> <!-- cd-tabs-content -->
</div> <!-- cd-tabs -->
                        </div> <!-- /.row -->

                     
                    </div> <!-- /.about -->

                    <div id="menu-2" class="services content">
                        <div class="row">
                           <div class="cd-tabs">
	<nav>
		<ul class="cd-tabs-navigation">
			<li><a data-content="issues" href="javascript:void(0)" class="selected">Issues Management</a></li>
			
		</ul> <!-- cd-tabs-navigation -->
	</nav>

	<ul class="cd-tabs-content">
		
		
			<!--Issues Starts Here-->
		<?    
		    extract($_POST);
		    if(!empty($_POST['search'])){
		                $sql = "SELECT * FROM publication_issue where 1";
						$sqls='';
						
						if(!empty($from_date) && !empty($to_date)){
						   
						   $sqls.=" AND issue_date between '".date('Y-m-d',strtotime($from_date))."' and '".date('Y-m-d',strtotime($to_date))."'";
						}
			           
						$sql_count = mysql_fetch_assoc(mysql_query("SELECT count(*) as total FROM publication_issue where 1 $sqls"));
						$sql= $sql.$sqls;	
		
		       }else{
			
						$sql = "SELECT * FROM publication_issue LIMIT 0,10";
			            
						$sql_count = mysql_fetch_assoc(mysql_query("SELECT count(*) as total FROM (
    SELECT id_publication FROM publication_issue LIMIT 0, 10
)  publication_issue"));
			   }
					
			
				$result = mysql_query($sql) or die(mysql_error());
		   ?> 
		
		
		<li data-content="issues" id="showissues">
		<? //include('messages.php')?>
		
			<p>
            <div class="row">
           
			  <form>
			  <fieldset class="col-md-6">
              <select id="search_issue_status">
			      <option value="">Status</option>
			  	  <option value="1" <? if($search_status=='1')echo 'Selected'?>>Active</option>
			  	  <option value="0" <? if($search_status=='0')echo 'Selected'?>>Inactive</option>
			  </select>
              </fieldset>
              <fieldset class="col-md-6">
			  <? //Get Country details
				$country=mysql_query("select * from country ORDER BY name_country ASC");
              ?>
              <select id="search_issue_country">
			  <option value="">Country</option>
			     <?php while($getCountry=mysql_fetch_assoc($country)){?>
					<option value="<?=$getCountry['id_country']?>" <? if($search_country==$getCountry['id_country'])echo 'Selected'?>><?=$getCountry['name_country']?></option>
					<?php }?>
			  
			  </select>
              </fieldset>
              
               <fieldset class="col-md-6">
			  
                <select id="search_issue_language">
				    <option value="">Language</option>
				    <?php foreach ($lang_arr as $lang)
					{
					?>
					<option value="<?=$lang?>" <? if($search_language==$lang)echo 'Selected'?>><?=$lang?></option>
					<?php }?>
				</select>
                </fieldset>
                <fieldset class="col-md-6">
				
				 <?php
			   //Get Type details
				$get_type=mysql_query("select * from publication_type where id_publication_type IN (1,2)");
			   ?>
                <select id="search_issue_type">
					<option value="">Type</option>
					<option value="">All</option>
					<?php while($getType=mysql_fetch_assoc($get_type)){?>
					<option value="<?=$getType['id_publication_type']?>"  <? if($search_type==$getType['id_publication_type'])echo 'Selected'?>><?=$getType['name_publication_type_en']?></option>
					<?php }?>
				</select>
                </fieldset>
                                            
                <fieldset class="col-md-6">
				<?php
				$frequency=mysql_query("select * from frequency");
				?>
                 <select name="search_issue_frequency" id="search_issue_frequency">
				 	<option value="">Frequency</option>
					<?php while($getFrequency=mysql_fetch_assoc($frequency)){?>
					<option value="<?=$getFrequency['id_frequency']?>" <? if($getFrequency['id_frequency']==$search_frequency) echo 'Selected'?>><?=$getFrequency['name_frequency']?></option>
					<?php }?>
					
				 </select>
                 </fieldset>
                <fieldset class="col-md-6">
				<?php /*?><?php
				$outlet=mysql_query("select id_publication,name_publication_en from publication ORDER BY name_publication_en ASC");
				?>
                <select id="search_issue_outlet"> 
				    <option value="">Media Outlet Name</option>
				    <?php while($getOutlet=mysql_fetch_assoc($outlet)){?>
					<option value="<?=$getOutlet['id_publication']?>" <? if($getOutlet['id_publication']==$search_outlet) echo 'Selected'?>><?=$getOutlet['name_publication_en']?></option>
					<?php }?>	
				</select><?php */?>
				<input type="text" name="search_issue_outlet" id="search_issue_outlet" Placeholder="Media Outlet Name">
                </fieldset>
              <fieldset class="col-md-6">
                <select id="search_date_type">
					<option value="">--Select Search Type--</option>
					<option value="expected_date">Expected Date</option>
					<option value="received_date">Received Date</option>
					<option value="created">Scanned Date</option>
					<option value="done_time">Processed Date</option>
				</select>
                </fieldset>
                                            
         
                                            
                <fieldset class="col-md-6">
             
			   <input type="text" class="form_input" name="issue_from_date" id="issue_from_date" placeholder="Search From Date">
			   </fieldset>
			   
			   
			 
			                                
                 <fieldset class="col-md-2">
                 <input value="Search" type="button" onClick="issue_search('1')" id="submit" class="button">
                  </fieldset>
				  
				  <fieldset class="col-md-2">
                  <input value="Reset" type="reset" class="button">
                  </fieldset> 
				  
				  <fieldset class="col-md-2">&nbsp;</fieldset>  
				  
				  <fieldset class="col-md-6">
			   
			   <input type="text" class="form_input" name="issue_to_date" id="issue_to_date" placeholder="Search To Date">
               </fieldset>
			  			   
              </form>    
              </div>
             
          <div class="row"> 
		  <?php if($_SESSION['moms_type']=='super_admin'){?>
		   <a href="add_issue.php" class="fadein"><div class="add_left" style="margin-left:14px;">
		   Add Issue	  
		  </div></a>
		  <?php } ?>
		  </div>
		   <div class="img_load" align="center" style="display:none;">	    
		  <br><br><br><br><br>
		  <img src="images/progress.gif"  />   
		  <br><br><br><br><br><br><br>
          </div>    
          <div id="getissueContent" style="overflow-x:auto">
		  
		  </div>        
                                    
         </p>
		</li>
		<!--Issues End Here-->


		
	</ul> <!-- cd-tabs-content -->
</div> <!-- cd-tabs -->
                        </div> <!-- /.row -->
                    </div> <!-- /.services -->

                   

<!--Publisher starts here-->
<div id="menu-3" class="services content">
                        <div class="row">
                           <div class="cd-tabs">
	<nav>
		<ul class="cd-tabs-navigation">
			<li><a data-content="publisher" href="javascript:void(0)" class="selected">Publisher Management</a></li>
			
		</ul> <!-- cd-tabs-navigation -->
	</nav>

	<ul class="cd-tabs-content">
		
		
			<!--Publisher Starts Here-->
		
		<li data-content="issues" id="showpublisher">
		<? //include('messages.php')?>
		
			<p>
            <div class="row">
           
			  <form>
			  <fieldset class="col-md-6">
              <select id="search_publisher_status">
			      <option value="">Status</option>
			  	  <option value="A" <? if($search_publisher_status=='A')echo 'Selected'?>>Active</option>
			  	  <option value="I" <? if($search_publisher_status=='I')echo 'Selected'?>>Inactive</option>
			  </select>
              </fieldset>
              <fieldset class="col-md-6">
			  <? //Get Country details
				$country=mysql_query("select * from country ORDER BY name_country ASC");
              ?>
              <select id="search_publisher_country">
			  <option value="">Country</option>
			     <?php while($getCountry=mysql_fetch_assoc($country)){?>
					<option value="<?=$getCountry['id_country']?>" <? if($search_publisher_country==$getCountry['id_country'])echo 'Selected'?>><?=$getCountry['name_country']?></option>
					<?php }?>
			  
			  </select>
              </fieldset>
              
                <fieldset class="col-md-6">
				<?php
				$Publisher=mysql_query("select id_publisher,name_publisher_en from publisher ORDER BY name_publisher_en ASC");
				?>
                <select id="search_publish"> 
				    <option value="">--Select Publisher--</option>
				    <?php while($getPublisher=mysql_fetch_assoc($Publisher)){?>
					<option value="<?=$getPublisher['id_publisher']?>" <? if($getPublisher['id_publisher']==$search_issue_outlet) echo 'Selected'?>><?=$getPublisher['name_publisher_en']?></option>
					<?php }?>	
				</select>
                </fieldset>
                                            
               
			                                
                 <fieldset class="col-md-2">
                 <input value="Search" type="button" onClick="publisher_filter_type('1')" id="submit" class="button">
                  </fieldset>
				  
				  <fieldset class="col-md-2">
                  <input value="Reset" type="reset" class="button">
                  </fieldset> 
				  
				  <fieldset class="col-md-2">&nbsp;</fieldset>  
				  
				  <fieldset class="col-md-6">
			   
			   </fieldset>
			  			   
              </form>    
              </div>
             
          <div class="row"> 
		  <?php if($_SESSION['moms_type']=='super_admin'){?>
		 <a href="add_publisher.php" class="fadein"><div class="add_left" style="margin-left:14px;">
		  Add Publisher  
		  </div></a>	
		  <?php } ?>
		  </div>
		   
		  <div class="img_load" align="center" style="display:none;">	    
		  <br><br><br><br><br>
		  <img src="images/progress.gif"  />   
		  <br><br><br><br><br><br><br>	   
          </div> 
		       
          <div id="getpublisherContent">
		  
		  </div>        
                                    
         </p>
		</li>
		<!--Issues End Here-->


		
	</ul> <!-- cd-tabs-content -->
</div> <!-- cd-tabs -->
                        </div> <!-- /.row -->
                    </div>
<!--Publisher end here-->					
					

                 

                </div> <!-- /#menu-container -->

            </div> <!-- /.col-md-8 -->

        </div> <!-- /.row -->
    </div> <!-- /.container-fluid -->
    
    <div class="container-fluid">   
        <div class="row">
            <div class="col-md-12 footer">
			<p id="footer-text">Copyright &copy; 2020 <a href="https://allcontent.io/" target="_blank">ALLCONTENT Corporation</a></p>
            </div><!-- /.footer --> 
        </div>
    </div> <!-- /.container-fluid -->

    <script src="js/vendor/jquery-1.10.1.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
    <!--<script src="js/jquery.easing-1.3.js"></script>-->
    <script src="js/bootstrap.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript">
            
			jQuery(function ($) {

                $.supersized({

                    // Functionality
                    slide_interval: 3000, // Length between transitions
                    transition: 1, // 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
                    transition_speed: 700, // Speed of transition

                    // Components                           
                    slide_links: 'blank', // Individual links for each slide (Options: false, 'num', 'name', 'blank')
                    slides: [ // Slideshow Images
                        {
                            image: 'images/0001.jpg'
                        }, {
                            image: 'images/0002.jpg'
                        }, {
                            image: 'images/0003.jpg'
                        }, {
                            image: 'images/0004.jpg'
                        }, {
                            image: 'images/0005.jpg'
                        }
                    ]

                });
            });
            
    </script>
    
  <!-- External JS -->
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="http://alexgorbatchev.com/pub/sh/current/scripts/shCore.js"></script>
    <script src="http://agorbatchev.typepad.com/pub/sh/3_0_83/scripts/shBrushJScript.js"></script>
    <script src="http://agorbatchev.typepad.com/pub/sh/3_0_83/scripts/shBrushCss.js"></script>
    <script src="http://alexgorbatchev.com/pub/sh/current/scripts/shBrushXml.js"></script>

    <!-- jQuery Custombox JS -->
    <script src="src/jquery.custombox.js"></script>

    <!-- Demo page JS -->
    <script src="demo/js/demo.js"></script>

    <script>
        if ( $(window).width() > 360 ) {
            SyntaxHighlighter.all();
        }
    </script>  	
</body>
</html>
<?php unset($_SESSION['msg']);?> 

