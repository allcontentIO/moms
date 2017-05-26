<?php
$limit = 3;
$adjacent = 3;
$con = mysqli_connect("192.168.0.27","root","root","db_pagination");
if(mysqli_connect_errno()){
echo "Database did not connect";
exit();
}

?>