<HTML>
<HEAD>
<META http-equiv = "Content-Type" content="text/html;charset=sjis"/>
<?php
//テキストエディタにどんな文字コードが表示されていてもブラウザではsjisとして表示する。
?>
</HEAD>
<BODY bgcolor = "#FFFFFF" text="#000000">
<FORM name = 'form1' method = "post" action = 7_10challenge.php>
ID : <BR>
<input type = "text" name = "ID_insert_key">
<BR>
<INPUT type = "submit" value = "削除">
</FORM>

<?php

try{
$pdo_object= new PDO('mysql:host=localhost;dbname=Challenge_db;charset=sjis','miya','yuya');
}catch(PDOException $Exception){
 	die('接続に失敗しました:'.$Exception->getMessage());
};

if(!isset($_POST['ID_insert_key'])) {
 $_POST['ID_insert_key'] = null;
}else {
$ID_insert_key =$_POST['ID_insert_key'];

try {
	$sql = "delete from profiles where profilesID = :profilesID";
	$query = $pdo_object -> prepare($sql);
	$query -> bindValue(':profilesID',$ID_insert_key);
	$query -> execute();
	print "データを削除しました。<BR>";
}catch(PDOException $Exception) {
	print "エラー:" .$Exception ->getMessage();
}

}
?>

</BODY>
</HTML>
