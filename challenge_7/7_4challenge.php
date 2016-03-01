<HTML>
<HEAD>
<META http-equiv = "Content-Type" content="text/html;charset=sjis"/>
</HEAD>
<BODY bgcolor = "#FFFFFF" text="#000000">

<?php
//tyr~catchで接続エラーを取得＆表示
try{
$pdo_object= new PDO('mysql:host=localhost;dbname=Challenge_db;charset=sjis','miya','yuya');
}catch(PDOException $Exception){
 	die('接続に失敗しました:'.$Exception->getMessage());
}

$sql = "select * from profiles where profilesID = :profilesID";

$query = $pdo_object-> prepare($sql);
$query -> bindValue(':profilesID',1);
$query -> execute();


$result = $query->fetchall(PDO::FETCH_ASSOC);
//print_r ($result);


foreach ($result as $value) {
foreach ($value as $key2  =>$value2) {
print $key2.":".$value2."<br>";	
}
}

?>

</BODY>
</HTML>
