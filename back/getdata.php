<?php
switch ($_GET['type']) {
	case 'consult':
		$query = 'SELECT `contact`, `des` FROM `consult` LIMIT 60';
		break;
	case 'appointment':
		$query = 'SELECT `name`, `contact`, `time`, `des` FROM `appointment`';
		break;
	case 'message':
		$query = 'SELECT `contact`, `des` FROM `message`';
		break;
	default:
		die();
}

$conn = mysql_connect('localhost', 'dnzsuser', '123456') or die('Cannot connect to database');
mysql_select_db('DNZS');

$response = array();
$result = mysql_query($query);
while ($row = mysql_fetch_assoc($result)) {
	$response[] = $row;
}
mysql_close();

header('Content-type: application/json');
echo htmlentities(json_encode($response), ENT_NOQUOTES);
?>