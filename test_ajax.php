<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>

 
<body>

    <script> 
	 function submit_frm()
	 {
       var fd = new FormData(document.getElementById("myForm"));
		//fd.append("CustomField", "This is some extra data");
		$.ajax({
		  url: "comment.php",
		  type: "POST",
		  data: fd,
		  processData: false,  
		  contentType: false ,
		   success: function(response)
						 {
			   
								 alert('success');
			 
						 }
		});
	  }	
    </script> 


<form id="myForm"  method="post" enctype="multipart/form-data"> 
    Name: <input type="text" name="name" />
	Hidden: <input type="hidden" name="name_hid" id="name_hid" value="112"/>
	File: <input type="file" name="input_file" id="input_file"/> 
    Comment: <textarea name="comment"></textarea> 
    <input type="button" value="Submit Comment" onclick="submit_frm()"/> 
</form>
</body>
</html>
