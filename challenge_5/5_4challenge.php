<?php
session_start();
if(isset($_SESSION['LastLoginDate'])) {
	$lastDate = $_SESSION['LastLoginDate'];
	echo '前回ログイン日は、' . $lastDate . 'です！';
}else {
	echo '初めての訪問です。';
}

$access_time = date('Y年m月d日H時i分s秒');
$_SESSION["LastLoginDate"] =  $access_time;




