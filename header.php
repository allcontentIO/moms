<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Welcome to Sevenza</title>

<!--[if IE]>
<mce:style type="text/css" media="screen"><!
@font-face{
  font-family: 'Lato';
  src: url(http://themes.googleusercontent.com/static/fonts/lato/v6/wkfQbvfT_02e2IWO3yYueQ.woff) format('woff');
}
-->


<!--CSS FILES ONLY-->
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/form_style.css" rel="stylesheet" type="text/css">
<!--//CSS FILES ONLY-->

<!---Index Css-->
<link rel="stylesheet" href="datepick/jquery-ui.css" />
<link rel="stylesheet" href="datepick/MonthPicker.2.1.css" />
<link rel="stylesheet" type="text/css" href="js/jquery_validate/stylesheets/jjjquery.validate.css" />

<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" type="text/javascript"></script>
 <!--<script src="https://raw.github.com/digitalBush/jquery.maskedinput/1.3.1/dist/jquery.maskedinput.min.js" type="text/javascript"></script>-->
<script src="datepick/jquery.ui.core.js" type="text/javascript"></script>
<script src="datepick/jquery.ui.datepicker.js" type="text/javascript"></script>
<script src="datepick/MonthPicker.2.1.min.js" type="text/javascript"></script>
<script src="datepick/MonthPicker.2.1.js" type="text/javascript"></script>
<script src="js/jquery_validate/jquery.validate.js" type="text/javascript"></script>
<script src="js/jquery_validate/jquery.validation.functions.js" type="text/javascript"></script>
<script src="js/validation.js" type="text/javascript"></script>

<!--ckeditor pp-->
<script type="text/javascript" src="admin/ckeditor/ckeditor.js"></script>
<!--<script type="text/javascript" src="admin/ckeditor/ckfinder/ckfinder.js"></script>-->
<script>
	 function valid()
	 {
	
	 var salary_from=document.getElementById('salary_from').value;
	 	 var salary_to=document.getElementById('salary_to').value;
		 
		 if(salary_to<salary_from)
		 {
		 alert('Please selcect proper salary range');
		
		 return false;
		 }
		 else
		 {
		 window.location.href="search.php?salary_to="+salary_to+'&salary_from='+salary_from;
		 }
	 }
	 </script>
	 
<!-- ckeditor -->

<!---Index Css--> 



<!--JS ONLY-->
<!--<script src="http://code.jquery.com/jquery-1.8.2.min.js" type="text/javascript"></script>
		<script src="js/jquery.carouFredSel-6.0.4-packed.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(function() {

				$('#carousel').carouFredSel({
					responsive: true,
					scroll: 1,
					items: {
						width: 300,
						visible: {
							min: 3,
							max: 10
						}
					}
				});

			});
		</script>-->
<!--//JS ONLY-->

<script src="js/ga.js" async="" type="text/javascript"></script>
<!--<script type="text/javascript" src="js/jquery.js"></script>-->
<script type="text/javascript" src="js/jquery_002.js"></script>
<script type="text/javascript">
<!--        //--><![CDATA[//><!--
        $("html").addClass("js");
        $.fn.accordion.defaults.container = false;
        $(function () {
            $("#acc3").accordion({ initShow: "#current" });
            $("#acc1").accordion({
                el: ".h",
                head: "h4, h5",
                next: "div",
                initShow: "div.outer:eq(1)"
            });
            $("#acc2").accordion({
                obj: "div",
                wrapper: "div",
                el: ".h",
                head: "h4, h5",
                next: "div",
                showMethod: "slideFadeDown",
                hideMethod: "slideFadeUp",
                initShow: "div.shown",
                elToWrap: "sup, img"
            });
            $("html").removeClass("js");
        });
        //--><!]]>
</script>
    <!--<![endif]-->



</head>

<body>

<script>

$(document).ready(function(){
	
	
	/*
	function lightBox()
	{
	var win_width = $(window).width();
	var win_height = $(window).height();
	$(".light_box").css({ width:win_width, height:win_height });
	$(".light_box").fadeIn(1000);
	
	}*/
	
	/*function alignCenter()
	{
		var windowWidth = $(window).width() / 2;
		var windowHeight = $(window).height() / 2;
		
		var divWidth = $(".light_window").width() / 2;
		var divHeight = $(".light_window").height() / 2;
		
		/*$(".light_window").css({ left:windowWidth - divWidth })	;
		$(".light_window").css({ top:windowHeight - divHeight })	;*/
		
		/*$(".light_window").css({ left:54.5 })	;
		$(".light_window").css({ top:54.5 })	;
	}*/	

	/*alignCenter();
	lightBox();
	
	$(window).resize(function(){
	
		alignCenter();
		lightBox();
	})
	
	
	
	$(".close_light").click(function(){
		
		$(".light_box").fadeOut(1000);
		window.location.href="index.php?page=jobseeker"
	
	});*/
	
    function lightBox()
	{
	    $(".light_box").fadeIn();
		$(".light_box").css({width:1600});
		$(".light_window").animate({ marginTop:100 },800);
	/*
	$('html').css('overflow', 'hidden');

	$('body').css('overflow', 'hidden');*/
	
	var win_width = $(window).width();
	var win_height = $(window).height();

	$(".light_box").css({ width:win_width, height:win_height });
	
	}
	
	function alignCenter()
	{
	
	
		var windowWidth = $(window).width() / 2;
		/*var windowHeight = $(window).height() / 2;*/
		
		var divWidth = $(".light_window").width() / 2;
		/*var divHeight = $(".light_window").height() / 2;*/
		
		$(".light_window").css({ left:windowWidth - divWidth });
		/*$(".light_window").css({ top:windowHeight - divHeight });*/
	}	

	
	
	$(window).resize(function(){
	
		alignCenter();
		lightBox();
	})
	
	
		alignCenter();
	    lightBox();
	
	
	
	$("#close_click").click(function(){
		
		$(".light_box").fadeOut();
	
	$('html').css('overflow', 'auto');

	$('body').css('overflow', 'auto');
	
	});
	
	

});

</script>

<script>
	
		$(document).ready(function(){
		

		
				$("#icon_menu").click(function(){
				

				$(".nav").slideToggle();
			
				
		
			});
		
		});
	
	
	</script>

<!--<style>
*{ margin:0; padding:0; }

.light_box{ position:cent; display:none; background:rgba(0,0,0,.8);}
.light_window{ background-color:#FFCC00; position:relative; width:300px; height:300px;} 
.close_light{ width:60px; height:60px; position:relative; float:right;  cursor:pointer; color:#FFFFFF; background-image:url(images/close.png); background-size:100% 100%; background-repeat:no-repeat; margin-right:-3px; }

</style>-->

<style type="text/css">

.style1 {color: #0033FF}

.light_box{ background-color:#000000; position:fixed; z-index:100; display:none; overflow:auto;}
.light_window{ background-color:#fff; position:relative; z-index:101; width:400px; height:500px; border-radius:10px; height:auto; padding-bottom:20px; overflow:hidden; top:20px; bottom:20px; padding:0 10px 0 10px; } 
.light_window2{width: 91%; display:none;
height: 100px;
background: none repeat scroll 0% 0% rgb(255, 255, 255);
position: absolute;
border: 2px solid #ccc;
margin-top: 100px;
box-shadow: 2px 4px 6px #ccc; padding:2%; color:#99CC00; font-family:Arial, Helvetica, sans-serif; font-size:6px;}
.close_light{ width:30px; height:30px; position:relative; float:right; background-color:#333333; color:#FFFFFF;  }
.register_here{ position:absolute; bottom:0; z-index:1; width: 12% !important;right: 0;margin-right: 10%;margin-bottom: 2%; cursor:pointer; display:block;}
#close_click{position: absolute;right: 0;width: 30px;height: 30px;background: red;border: 0;margin-right: 10px;margin-top: 10px; text-align:center; line-height:26px; font-weight:bold; color:#FFFFFF; font-family:Arial, Helvetica, sans-serif; cursor:pointer;}
#close_click2{position: absolute;right: 0;width: 30px;height: 30px;background: #99CC00;border: 0;margin-right: 10px;margin-top: 10px; text-align:center; line-height:26px; font-weight:bold; color:#FFFFFF; font-family:Arial, Helvetica, sans-serif; cursor:pointer;}

</style>
<!--end pop up-->


<!--for editor-->
<body>


		
	<!--show pop up -->
		<?php	
			if($_GET['login']=="success")
			{
					$startdate = date('d-m-Y');
					$days = date( 'd-m-Y ',strtotime($startdate." - 2 days"));
					$sql_company = "SELECT * FROM tbl_companydtls as c,tbl_follow_company as fc where fc.user_id='".$_SESSION['jbseek_uid']."'
					  AND fc.cmp_id=c.cmp_id and last_updated_date >= $days and fc.status='1' ";
					$q_com=mysql_query($sql_company);
					
					$sql_job = "SELECT * FROM tbl_job as j,tbl_follow_company as fc where fc.user_id='".$_SESSION['jbseek_uid']."' and fc.cmp_id=j.cmp_id and last_updated_date >= $days and j.status='1' and approve='1' and payment_status='1' ";
					
					$q_job=mysql_query($sql_job);
					
						if(mysql_num_rows($q_com)>0 ||  mysql_num_rows($q_job)>0)	
						{
			
		?>		<div class="light_box">

				<div class="light_window">
				
					<button id="close_click">X</button>
					<br><br><br><br><br><br><br><br><br><br> 
				    <?php 
							include("notification.php");
					?>
					<br><br><br><br><br><br><br><br><br><br> 							
					</div>
									
				</div>
						
						
						
	<?php
					}
	
		 }
	
		
	 ?>
	
	
	<!--end pop up-->
		




<!------------------------------------------------------------------WRAPPER STARTS----------------------------------------------------->
<div id="wrapper" align="center">
<!-----------------------container start----------------------->
  <div class="container">
  
  
<!--LOGO--><a href="home_page.php"><div class="logo"></div></a><!--//LOGO-->

<!--LOGIN-->








<div class="login">

<?php 
   if(isset($_SESSION['jbseek_uname'])){
  $fname=mysql_fetch_array(mysql_query("select first_name from tbl_user where email='".$_SESSION['jbseek_uname']."'"));
  // mysql_query("select ");
  //include("includes/left_menu.php");

             /* $_SESSION['start'] = time(); // taking now logged in time
				if(!isset($_SESSION['expire'])){
				$_SESSION['expire'] = $_SESSION['start'] + (1* 1180) ; // ending a session in 30 seconds
				}
				$now = time(); // checking the time now when home page starts
				
				if($now > $_SESSION['expire'])
				{
				unset($_SESSION['jbseek_uname']);
				session_destroy();
				$session_logout="session_logout";
				
				unset($_SESSION['emp_uname']);
                header('Location:jobseeker_login.php?session_logout='.$session_logout);
				
				//echo "Your session has expire !  <a href='logout.php'>Click Here to Login</a>";
				}
				*/
				 
?>
<a href="jobseeker_logout.php" class="logout_btn">logout</a>
<div class="login_name" >Welcome &nbsp;<?php echo ucfirst($fname['first_name']);//echo $_SESSION['jbseek_uname'];?></div> 


<?php }else{ ?>


<?php 

if($_GET['page'] != "jobseeker_login" && $_GET['page'] != "employer_login" && $_GET['page'] != "forgot_pass" && $_GET['page'] != "jbseek_registration" && $page != "jobseeker_login" && $page != "employer_login")
{
?>

<a href="#"><div id="icon_menu"></div></a>

<a href="jobseeker_login.php"><div class="icon_login"></div></a>

<a href="index.php?page=jbseek_registration"><div class="icon_register"></div></a>
<?php 
}
} ?>
</div>

<div class="clear"></div>
<!--for multilingual end-->
<div id="google_translate_element" align="right"></div>
<script type="text/javascript"> 
function googleTranslateElementInit() 
{ new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element'); 
} 
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
</script> 

<!--//LOGIN-->

<div class="clear"></div>


	<!---Header Menu--->
	<?php ?>
	<?php include('header_menu.php')?>
	<!---Header Menu--->   

	
	<div class="clear"></div>

	<!---Search--->
	<?php include('search.php')?>
	<!---Search--->
	  

    <!---Header Index Menu--->
	<?php //include('header_menu.php')?>
	<?php //include('header_index_menu.php');?>
	<!---Header Index Menu--->  



	