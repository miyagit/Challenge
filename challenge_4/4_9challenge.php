<?php
//ファイルを読み込みモードで開く。
$fp = fopen('xxx.txt', 'r');
// 読み取り操作 - １行読み取り
$file_txt = fgets($fp);
print $file_txt;

// ファイルを閉じる
fclose($fp);
?>