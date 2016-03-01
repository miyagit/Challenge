<HTML>
<HEAD>
<META http-equiv = "Content-Type" content="text/html;charset=sjis"/>
<?php
//テキストエディタにどんな文字コードが表示されていてもブラウザではsjisとして表示する。
?>
</HEAD>
<BODY bgcolor = "#FFFFFF" text="#000000">
<FORM name = 'form1' method = "post" action = 7_12challenge.php>

名前 : <BR>
<input type = "text" name = "NAME_insert_key">
<BR>

年齢 : <BR>
<input type = "text" name = "AGE_insert_key">
<BR>
誕生日 : <BR>
<input type = "text" name = "BIRTHDAY_insert_key_nen">
<input type = "text" name = "BIRTHDAY_insert_key_tuki">
<input type = "text" name = "BIRTHDAY_insert_key_hi">
<BR>
<INPUT type = "submit" value = "複合検索">
</FORM>

<?php

try{
$pdo_object= new PDO('mysql:host=localhost;dbname=Challenge_db;charset=sjis','miya','yuya');
}catch(PDOException $Exception){
 	die('接続に失敗しました:'.$Exception->getMessage());
};

if(!isset($_POST['NAME_insert_key']) &&!isset($_POST['AGE_insert_key']) &&!isset($_POST['BIRTHDAY_insert_key_nen'])&&!isset($_POST['BIRTHDAY_insert_key_tuki'])&&!isset($_POST['BIRTHDAY_insert_key_hi'])) {
 $_POST['NAME_insert_key']     = null;
 $_POST['AGE_insert_key']      = null;
 $_POST['BIRTHDAY_insert_key_nen'] = null;
 $_POST['BIRTHDAY_insert_key_tuki'] = null;
 $_POST['BIRTHDAY_insert_key_hi'] = null;
}else {

	$NAME_insert_key = '%'.$_POST['NAME_insert_key'].'%';
	$AGE_insert_key = '%'.$_POST['AGE_insert_key'].'%';
	$BIRTHDAY_insert_key =  '%'.$_POST['BIRTHDAY_insert_key_nen'].'-'.$_POST['BIRTHDAY_insert_key_tuki'].'-'.$_POST['BIRTHDAY_insert_key_hi'].'%';

try {
	$sql = "SELECT * FROM profiles WHERE name LIKE :name AND age LIKE :age AND birthday LIKE :birthday";
	$query = $pdo_object -> prepare($sql);
	$query -> bindValue(':name',$NAME_insert_key);
	$query -> bindValue(':age',$AGE_insert_key);
	$query -> bindValue(':birthday',$BIRTHDAY_insert_key);
	$query -> execute();
	$count = $query -> rowCount();
	print "検索結果は".$count."件です。<BR>";
}catch(PDOException $Exception) {
	print "エラー:" .$Exception ->getMessage();
}
if($count < 1) {
	print "件数結果がありません。<BR>";
}else {
	?>
<TABLE width = "450" border = "1" cellspacing = "0" cellpadding = "8">
<TBODY>
<TR><TH>番号</TH><TH>氏名</TH><TH>電話番号</TH><TH>年齢</TH><TH>誕生日</TH></TR>
<?php
	while($row = $query->fetch(PDO::FETCH_ASSOC)) {
	?>
	<TR>
	<TD align = "center"><?=htmlspecialchars($row['profilesID'])?></TD>
	<TD><?=($row['name'])?></TD>
	<TD align = "center"><?=htmlspecialchars($row['tell'])?></TD>
	<TD align = "center"><?=htmlspecialchars($row['age'])?></TD>
	<TD align = "center"><?=htmlspecialchars($row['birthday'])?></TD>
	</TR>
	<?php
	}
	?>
	</TBODY></TABLE>

<?php
}
}
?>
</BODY>
</HTML>
