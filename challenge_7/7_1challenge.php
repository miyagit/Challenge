<?php
//tyr~catchで接続エラーを取得＆表示
try{
$pdo_object=
 	new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','miya','yuya');
}catch(PDOException $Exception){
 	die('接続に失敗しました:'.$Exception->getMessage());
}