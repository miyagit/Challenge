<HTML>
<HEAD>
<META http-equiv = "Content-Type" content="text/html;charset=sjis"/>
<?php
//テキストエディタにどんな文字コードが表示されていてもブラウザではsjisとして表示する。
?>
</HEAD>
<BODY bgcolor = "#FFFFFF" text="#000000">
<FORM name = 'form1' method = "post" action = 7_8challenge.php>
名前 : <BR>
<input type = "text" name = "search_key">
<BR>
<INPUT type = "submit" value = "検索する">
</FORM>

<?php

try{
$pdo_object= new PDO('mysql:host=localhost;dbname=Challenge_db;charset=sjis','miya','yuya');
}catch(PDOException $Exception){
 	die('接続に失敗しました:'.$Exception->getMessage());
}

if(!isset($_POST['search_key'])) {
	$_POST['search_key'] = null;
}else {

	$search_key = '%'.$_POST['search_key'].'%';

try {
	$sql = "select * from profiles where name like :name";
	$query = $pdo_object -> prepare($sql);
	$query -> bindValue(':name',$search_key,PDO::PARAM_STR);
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
<TR><TH>番号</TH><TH>氏名</TH><TH>年齢</TH></TR>
<?php
	while($row = $query->fetch(PDO::FETCH_ASSOC)) {
	?>
	<TR>
	<TD align = "center"><?=htmlspecialchars($row['profilesID'])?></TD>
	<TD><?=($row['name'])?></TD>
	<TD align = "center"><?=htmlspecialchars($row['age'])?></TD>
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
