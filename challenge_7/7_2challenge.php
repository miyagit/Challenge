<?php
//tyr~catchで接続エラーを取得＆表示
try{
$pdo_object= new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','miya','yuya');
}catch(PDOException $Exception){
 	die('接続に失敗しました:'.$Exception->getMessage());
}
$namae = mb_convert_encoding('鈴木よしお','sjis','auto');


$sql = "INSERT INTO profiles(profilesID,name,tell,age,birthday) VALUES(:profilesID,:name,:tell,:age,:birthday)";



$query = $pdo_object-> prepare($sql);

$query -> bindValue(':profilesID',6);
$query -> bindValue(':name',$namae);
$query -> 
bindValue(':tell','08045674747');
$query -> bindValue(':age',24);
$query -> bindValue(':birthday','1993-03-20');

$query -> execute();

