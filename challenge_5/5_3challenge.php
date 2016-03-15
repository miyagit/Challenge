<?php

// ユーザーの１回目の訪問
$access_time = date('Y年m月d日H時i分s秒');
 setcookie('LastLoginDate', $access_time);


echo 'お帰りなさい！宮嶋さん！<br>';

if(isset($_COOKIE['LastLoginDate'])) {
$lastlogin = $_COOKIE['LastLoginDate'];
echo '前回ログイン日は、' .$lastlogin. 'です！';
}else {
echo '初めての訪問です。';
}
