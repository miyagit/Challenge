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

$sql = " select * from profiles where name like :name";

$query = $pdo_object-> prepare($sql);
$query -> bindValue(:name,'%茂%')

$query -> execute();

$result = $query->fetchall(PDO::FETCH_ASSOC);
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




