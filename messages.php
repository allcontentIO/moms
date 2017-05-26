<?php
if(!empty($_REQUEST['msg'])){
	
	$errmsg= $_REQUEST['msg'];
}

 if($errmsg == "login_err"){?>
<script type="text/javascript">
alert("Invalid username and password.");
</script>
<?php } ?>
<?php if($errmsg == "ins_err"){?>
<script type="text/javascript">
alert("Error in Inserting Record.");
</script>
<?php } ?>
<?php if($errmsg == "ins_succ"){?>
<script type="text/javascript">
alert("Record Inserting Successfully.");
</script>
<?php } ?>
<?php if($errmsg == "del_succ"){?>
<script type="text/javascript">
alert("Record Deleted Successfully.");
</script>
<?php } ?>

<?php if($errmsg== "upd_succ"){?>
<script type="text/javascript">
alert("Record Updated Successfully.");
</script>
<?php } ?>

