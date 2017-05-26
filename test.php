<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>

<?php

 $lang_arr = array(1=>'English',2=>'Arabic',3=>'Arabic/English',4=>'English/French',5=>'Arabic/English/French',6=>'French',7=>'Urdu',8=>'Russian',9=>' German',10=>'Farsi',11=>'Malayalam',12=>'Mandarin');

foreach ($lang_arr as $lang)
{
     echo $lang."<br>";
}

?>



</body>
</html>
