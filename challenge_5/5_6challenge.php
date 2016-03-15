<?php
$file_name = 'upload.txt';
//var_dump($_FILES);
move_uploaded_file($_FILES['userfile']['tmp_name'], $file_name);//サーバーに保存してサーバーの方で管理しやすいように名前を付ける処理。
//HTMLでサーバーにアップロードしたファイルを$_FILESで受け取る。
//$_FILES[]の一つ目はHTMLフォームで指定したときのname属性を書く。
$file_content = file_get_contents($file_name);
print $file_content;
