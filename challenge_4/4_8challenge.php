﻿<?php
//ファイルを書き込みモードで開く。
$fp = fopen('xxx.txt','w');
//書き込み操作 - 1行読み取り
fwrite($fp,'私は宮嶋ですよ。');

//ファイルを閉じる。
fclose($fp);



?>