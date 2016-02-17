<?php

// ユーザーの１回目の訪問
$access_time = date('Y年m月d日');
 setcookie('LastLoginDate', $access_time);

 // 次の訪問で。。。

$lastDate = $_COOKIE['LastLoginDate'];

echo 'お帰りなさい！○○さん！<br>';

echo '前回ログイン日は、' . $lastDate . 'です！';

