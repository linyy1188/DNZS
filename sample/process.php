<?php
function ierror($error_str){
$html = '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>电脑诊所—网络开拓者协会</title>
    <meta name="description" content="电脑诊所">
    <meta name="author" content="linyy1188">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Styles --> 
    <link type="text/css" href="css/custom-theme/jquery-ui-1.9.2.custom.css" rel="stylesheet" />
    <link type="text/css" href="css/def-main.css" rel="stylesheet"/>
    <link type="text/css" href="bootstrap/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="css/demo.css" rel="stylesheet">
	
  </head>

  <body>

  <!--[if lt IE 9]>
  <link rel="stylesheet" type="text/css" href="css/custom-theme/jquery.ui.1.9.2.ie.css"/>
  <![endif]-->

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <div class="brand" style="color:#FFF" >BITNP </div>
          <div class="nav-collapse collapse">
              <ul class="nav">
                <li><a href="index.html">首页</a></li>
                <li><a href="consult.html">咨询</a></li>
                <li class="active"><a href="#">预约</a></li>
                <li><a href="message.html">留言</a></li>
              </ul>
              <ul class="nav pull-right">
              	<li><a href="#">了解我们</a></li>
              </ul>
          </div>
        </div>
      </div>
    </div>';
    echo $html.'<div style = "text-align:center;">'.$error_str.'</div>';
    mysql_close();
    die();
}
function appointment(){
	session_start();
	if ($_SESSION['6_letters_code']!=$_GET['code'])
		ierror('Wrong code');
	$name = $_GET['name'];
	$contact = $_GET['contact'];
	$time = intval($_GET['date']);
	$des = $_GET['desc'];
	if (is_null($name)||is_null($contact)||is_null($time))
		ierror('Not Enough Info');
	if ((!is_numeric($contact))||(strlen($contact)!=11))
		ierror('Illegl phone number');
	if (strlen($name)>=16)
		ierror('Not a good name');
	if ($time<1||$time>6)
		ierror('Not a good date');
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
		ierror('Not Enough Info');
	if ((!is_numeric($contact))||(strlen($contact)!=11))
		ierror('Illegl phone number');
	if (strlen($name)>=16)
		ierror('Not a good name');
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
		ierror('Not Enough Info');
	if ((!is_numeric($contact))||(strlen($contact)!=11))
		ierror('Illegl phone number');
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