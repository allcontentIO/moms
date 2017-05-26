<?php
ob_start();
session_start();
 
include('includes/connect.php');
include('includes/conf.php');
include('includes/head.php');
$task= $_REQUEST['task'];
$getid=explode('?_',$_REQUEST['id_publisher']);
print_r($getid);

$id_publisher= $getid[0];
if(!empty($id_publisher))
{
$print_media = mysql_query("SELECT * FROM publication WHERE distribution='".$id_publisher."'");
//echo "SELECT * FROM publication WHERE distribution='".$id_publisher."'";

} 


?>

<div id="modal" class="modal-example-content">
        <div class="modal-example-header">
            <button type="button" class="close" onClick="$.fn.custombox('close');">&times;</button>
            <h4>View Print Media Details</h4>
        </div>
        <div class="modal-example-body">
        <p>
           <div class="row">
       
			  
			  <?php $i =1;
			       while($row =  mysql_fetch_array($print_media)){?>			  
			   <div class="col-md-12">
				   <?php if($i == 1){?>
				   <div class="col-md-3">Media Outlet:</div>
				   <?php }else{ ?><div class="col-md-3">&nbsp;</div><?php } ?>
				  <div class="col-md-7"><a href="index.php?pagename=printmedia&id_publication=<?=$row['id_publication']?>&task=view_pop"><?=$row['name_publication_en']?></a></div>
              </div>
              <?php $i++;}?>
			  
                
                 
              </div>
                  
                  </p>
        </div>
    </div>

