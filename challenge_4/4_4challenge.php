<?php
 
//日時の初期化 
$stamp = mktime(0,0,0,1,1,2015);
$stamp2 = mktime(23,59,59,12,31,2015);
$kekka = $stamp2 - $stamp;
print $kekka;

?>
