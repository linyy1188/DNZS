<?php
$time = $_GET['date'];
$conn = mysql_connect('localhost', 'dnzsuser', '123456');
mysql_select_db('DNZS');
if (!is_numeric($time))
	die();
$result = mysql_query("SELECT `time` FROM `appointment` WHERE time<=$time");
$sum= mysql_num_rows($result);
echo $sum;
?>