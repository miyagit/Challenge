<?php
 
//日時の初期化 date
$stamp = mktime(10,0,0,11,4,2016);
$today = date('Y年m月d日 H時i分s秒',$stamp);
print $today;  

?>
