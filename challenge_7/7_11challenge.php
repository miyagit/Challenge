<HTML>
<HEAD>
<META http-equiv = "Content-Type" content="text/html;charset=sjis"/>
<?php
//テキストエディタにどんな文字コードが表示されていてもブラウザではsjisとして表示する。
?>
</HEAD>
<BODY bgcolor = "#FFFFFF" text="#000000">
<FORM name = 'form1' method = "post" action = 7_11challenge.php>
更新したい人のID : <BR>
<input type = "text" name = "ID_insert_key">
<BR>
名前 : <BR>
<input type = "text" name = "NAME_insert_key">
<BR>
TEL : <BR>
<input type = "text" name = "TEL_insert_key">
<BR>
年齢 : <BR>
<input type = "text" name = "AGE_insert_key">
<BR>
誕生日 : <BR>
<input type = "text" name = "BIRTHDAY_insert_key">
<BR>
<INPUT type = "submit" value = "データを更新">
</FORM>

<?php

try{
$pdo_object= new PDO('mysql:host=localhost;dbname=Challenge_db;charset=sjis','miya','yuya');
}catch(PDOException $Exception){
 	die('接続に失敗しました:'.$Exception->getMessage());
}

if(!isset($_POST['ID_insert_key']) &&!isset($_POST['NAME_insert_key']) &&!isset($_POST['TEL_insert_key']) &&!isset($_POST['AGE_insert_key']) &&!isset($_POST['BIRTHDAY_insert_key'])) {
 $_POST['ID_insert_key']       = null;
 $_POST['NAME_insert_key']     = null;
 $_POST['TEL_insert_key']      = null;
 $_POST['AGE_insert_key']      = null;
 $_POST['BIRTHDAY_insert_key'] = null;
}else {

$ID_insert_key =$_POST['ID_insert_key'];
$NAME_insert_key =$_POST['NAME_insert_key'];
$TEL_insert_key =$_POST['TEL_insert_key'];
$AGE_insert_key =$_POST['AGE_insert_key'];
$BIRTHDAY_insert_key =$_POST['BIRTHDAY_insert_key'];


try {
	$sql = "UPDATE profiles SET name = :name, tell = :tell, age = :age, birthday = :birthday WHERE profilesID = :profilesID;";
	$query = $pdo_object -> prepare($sql);
	$query -> bindValue(':profilesID',$ID_insert_key);
	$query -> bindValue(':name',$NAME_insert_key);
	$query -> bindValue(':tell',$TEL_insert_key);
	$query -> bindValue(':age',$AGE_insert_key);
	$query -> bindValue(':birthday',$BIRTHDAY_insert_key);
	$query -> execute();
	print "データを更新しました。<BR>";
}catch(PDOException $Exception) {
	print "エラー:" .$Exception ->getMessage();
}


}
?>

</BODY>
</HTML>
