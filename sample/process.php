<?php
function appointment(){
	$name = $_GET['name'];
	$contact = $_GET['contact'];
	$time = intval($_GET['date']);
	$des = $_GET['desc'];
	if (is_null($name)||is_null($contact)||is_null($time))
		die('Not Enough Info');
	if ((!is_numeric($contact))||(strlen($contact)!=11))
		die('Illegl phone number');
	if (strlen($name)>=16)
		die('Not a good name');
	if ($time<1||$time>6)
		die('Not a good date');
	$query='';
	$query.='INSERT INTO `appointment` (`name`, `contact`, `time`, `des`) ';
	$query.="VALUES('$name', '$contact', $time, '$des')";
	mysql_real_escape_string($query);
	mysql_query($query);
}
function consult(){
	$name = $_GET['name'];
	$contact = $_GET['contact'];
	$des = $_GET['desc'];
	if (is_null($name)||is_null($contact))
		die('Not Enough Info');
	if ((!is_numeric($contact))||(strlen($contact)!=11))
		die('Illegl phone number');
	if (strlen($name)>=16)
		die('Not a good name');
	$query='';
	$query.="INSERT INTO `consult` (`name`, `contact`, `des`) VALUES ('$name','$contact','$des')";
	print $query;
	mysql_real_escape_string($query);
	print $query;
	mysql_query($query);
}
function message(){
	$contact = $_GET['contact'];
	$des = $_GET['desc'];
	if (is_null($des))
		die('Not Enough Info');
	if ((!is_numeric($contact))||(strlen($contact)!=11))
		die('Illegl phone number');
	$query='';
	$query.='INSERT INTO `message` (`contact`, `des`) ';
	$query.="VALUES('$contact', '$des')";
	mysql_real_escape_string($query);
	mysql_query($query);
}

$conn = mysql_connect('localhost', 'dnzsuser', '123456') or die('Cannot connect to database');
mysql_select_db('DNZS', $conn);
$page = $_GET['page'];
switch ($page) {
	case 'appointment':
		appointment();
		break;

	case 'consult':
		consult();
		break;

	case 'message':
		message();
		break;
}
mysql_close();
header("Location: $page");
?>