<?php
 $fp = fopen('kadai.txt', 'a');
 
 fwrite($fp,date('Y年m月d日H時i分s秒'.'(開始)'));
 
$abc = array(1,2,3);
echo count($abc).'<br>';
fwrite($fp,date('Y年m月d日H時i分s秒'.'(終了)'));
$file_txt = file_get_contents('kadai.txt');
echo $file_txt;	
fclose($fp);
