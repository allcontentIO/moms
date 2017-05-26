<?php
ob_start();
session_start();

 
include('includes/connect.php');
include('includes/conf.php');
include('messages.php');


if(isset($_POST['btn_login']) || $_POST['btn_login'] != "")
{
	$username = trim($_POST['username']);
	$passwd   = trim($_POST['password']);
	
	if($username=='' || $passwd=='')
	{
		$msg='blank';
		header('Location:login.php?msg='.$msg);	
	}
	else
	{	 
	
	 
		$selAdmin = mysql_query("select * from users where username='".$username."' AND password=OLD_PASSWORD('".$passwd."') AND user_type != 'user'");
		
		$result = mysql_fetch_array($selAdmin);	
		
		
		
		if(mysql_num_rows($selAdmin)>0)
		{
							
			$_SESSION['moms_uname'] = $result['username'];			
			$_SESSION['moms_uid']   = $result['id_users'];
			$_SESSION['moms_type']  = $result['user_type'];
			
			if(!empty($_POST['remember']))
			{

				setcookie("user_name", $_SESSION['moms_uname'], time()+3600, "/");
			  	setcookie("user_id", $_SESSION['moms_uid'], time()+3600, "/");
			  	setcookie("admin_password", $result['password'], time()+3600, "/");
				setcookie("rem", $_POST['remember'], time()+3600, "/");
			} 
			if(empty($_POST['remember']))
			{ setcookie("rem","", time()+3600, "/");
			  setcookie("user_name", "", time()+3600, "/");
			  setcookie("user_id", "", time()+3600, "/");
			  setcookie("admin_password", "", time()+3600, "/");
			  $_COOKIE['user_name'] = "";
			  $_COOKIE['admin_password'] = "";
			
			}	
			
					
			
			header('Location:index.php');			
		}
		else
		{
			$msg='login_err';
			header('Location:login.php?msg='.$msg);	
		}
	}
}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>Media Outlet Management System</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="Expand, contract, animate forms with jQuery wihtout leaving the page" />
        <meta name="keywords" content="expand, form, css3, jquery, animate, width, height, adapt, unobtrusive javascript"/>
		<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<script src="js/cufon-yui.js" type="text/javascript"></script>
		<script src="js/ChunkFive_400.font.js" type="text/javascript"></script>
		<script type="text/javascript">
			Cufon.replace('h1',{ textShadow: '1px 1px #fff'});
			Cufon.replace('h2',{ textShadow: '1px 1px #fff'});
			Cufon.replace('h3',{ textShadow: '1px 1px #000'});
			Cufon.replace('.back');
		</script>
    </head>
	
	
<script type="text/javascript">
function validation(){

        if(document.getElementById('username').value=="")
		{
		    alert("Username can't be blank.");
			document.getElementById('username').focus();
			return false;
		}
		if(document.getElementById('password').value=="")
		{
		    alert("Password can't be blank.");
		    document.getElementById('password').focus();
			return false;
		}


}

</script>
    <body>
		<div class="wrapper">
		
			<div class="content">
            <h2>Media Outlet Management System</h2>
				<div id="form_wrapper" class="form_wrapper">
					<form method="post" action="" class="login active" onsubmit="return validation()">
						<h3>Login</h3>
						<div>
							<label>Username:</label>
							<input type="text" id="username" name="username" value="<?php echo $_COOKIE['user_name']; ?>" />
						</div>
						<div>
							<label>Password:</label>
							<input type="password" id="password" name="password" value="<?php echo $_COOKIE['admin_password'];?>"value="<?php echo $_COOKIE['user_name']; ?>" />
						</div>
						<div class="bottom">
							<!--<div class="remember"><input type="checkbox" name="remember" value="1" <?php if ($_COOKIE['rem']<>"") { echo "CHECKED";}?> /><span>Keep me logged in</span></div>-->
							<input type="submit" value="Login" name="btn_login"></input>
							
							<div class="clear"></div>
						</div>
					</form>
					
				</div>
				<div class="clear"></div>
			</div>
			
		</div>
		

		<!-- The JavaScript -->
		<script type="text/javascript" src="https://ajax.googlemoms.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script type="text/javascript">
			$(function() {
					//the form wrapper (includes all forms)
				var $form_wrapper	= $('#form_wrapper'),
					//the current form is the one with class active
					$currentForm	= $form_wrapper.children('form.active'),
					//the change form links
					$linkform		= $form_wrapper.find('.linkform');
						
				//get width and height of each form and store them for later						
				$form_wrapper.children('form').each(function(i){
					var $theForm	= $(this);
					//solve the inline display none problem when using fadeIn fadeOut
					if(!$theForm.hasClass('active'))
						$theForm.hide();
					$theForm.data({
						width	: $theForm.width(),
						height	: $theForm.height()
					});
				});
				
				//set width and height of wrapper (same of current form)
				setWrapperWidth();
				
				/*
				clicking a link (change form event) in the form
				makes the current form hide.
				The wrapper animates its width and height to the 
				width and height of the new current form.
				After the animation, the new form is shown
				*/
				$linkform.bind('click',function(e){
					var $link	= $(this);
					var target	= $link.attr('rel');
					$currentForm.fadeOut(400,function(){
						//remove class active from current form
						$currentForm.removeClass('active');
						//new current form
						$currentForm= $form_wrapper.children('form.'+target);
						//animate the wrapper
						$form_wrapper.stop()
									 .animate({
										width	: $currentForm.data('width') + 'px',
										height	: $currentForm.data('height') + 'px'
									 },500,function(){
										//new form gets class active
										$currentForm.addClass('active');
										//show the new form
										$currentForm.fadeIn(400);
									 });
					});
					e.preventDefault();
				});
				
				function setWrapperWidth(){
					$form_wrapper.css({
						width	: $currentForm.data('width') + 'px',
						height	: $currentForm.data('height') + 'px'
					});
				}
				
				/*
				for the demo we disabled the submit buttons
				if you submit the form, you need to check the 
				which form was submited, and give the class active 
				to the form you want to show
				*/
				$form_wrapper.find('input[type="submit"]')
							 .click(function(e){
								e.preventDefault();
							 });	
			});
        </script>
    </body>
</html>
 