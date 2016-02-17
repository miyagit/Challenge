<?php
session_start();
$lastDate = $_SESSION['LastLoginDate'];

echo '前回ログイン日は、' . $lastDate . 'です！';
// ユーザーの１回目の訪問
$access_time = date('Y年m月d日H時i分s秒');
 $_SESSION["LastLoginDate"] =  $access_time;

 // 次の訪問で。。。



