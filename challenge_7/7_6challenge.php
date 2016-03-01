<HTML>
<HEAD>
<META http-equiv = "Content-Type" content="text/html;charset=sjis"/>
<?php
//テキストエディタにどんな文字コードが表示されていてもブラウザではsjisとして表示する。
?>
</HEAD>
<BODY bgcolor = "#FFFFFF" text="#000000">

<?php
//tyr~catchで接続エラーを取得＆表示
try{
$pdo_object= new PDO('mysql:host=localhost;dbname=Challenge_db;charset=sjis','miya','yuya');
}catch(PDOException $Exception){
 	die('接続に失敗しました:'.$Exception->getMessage());
}

$sql = " delete from profiles where profilesID = :profilesID";
$sql2 = "select * from profiles";

$query = $pdo_object-> prepare($sql);
$query -> bindValue(':profilesID',6);
$query -> execute();

$query2 = $pdo_object-> prepare($sql2);
$query2 -> execute();


$result = $query2->fetchall(PDO::FETCH_ASSOC);
//print_r ($result);


foreach ($result as $value) {
foreach ($value as $key2  =>$value2) {
print $key2.":".$value2."<br>";	
}
}

/*
設定で文字コード選択するものは、サクラエディタで書かれている文字の
文字コードを設定する。データベースに入ってある文字は、sjisなんで、
sjisの茂とutf8の茂は全く別物と判断され、なしで返り値が返ってくる。


*/

?>

</BODY>
</HTML>




