<?php
// サーバー側に保存する名前
$file_name = 'upload.txt';
move_uploaded_file( $_FILES['userfile']['tmp_name'], $file_name);//サーバーに保存してサーバーの方で管理しやすいように名前を付ける処理。
$file_path = file_get_contents($file_name);
print $file_path;