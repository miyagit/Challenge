<HTML>
<HEAD>
<META http-equiv = "Content-Type" content="text/html;charset=sjis"/>
<?php
//�e�L�X�g�G�f�B�^�ɂǂ�ȕ����R�[�h���\������Ă��Ă��u���E�U�ł�sjis�Ƃ��ĕ\������B
?>
</HEAD>
<BODY bgcolor = "#FFFFFF" text="#000000">
<FORM name = 'form1' method = "post" action = 7_8challenge.php>
���O : <BR>
<input type = "text" name = "search_key">
<BR>
<INPUT type = "submit" value = "��������">
</FORM>

<?php

try{
$pdo_object= new PDO('mysql:host=localhost;dbname=Challenge_db;charset=sjis','miya','yuya');
}catch(PDOException $Exception){
 	die('�ڑ��Ɏ��s���܂���:'.$Exception->getMessage());
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
	print "�������ʂ�".$count."���ł��B<BR>";
}catch(PDOException $Exception) {
	print "�G���[:" .$Exception ->getMessage();
}
if($count < 1) {
	print "�������ʂ�����܂���B<BR>";
}else {
	?>
<TABLE width = "450" border = "1" cellspacing = "0" cellpadding = "8">
<TBODY>
<TR><TH>�ԍ�</TH><TH>����</TH><TH>�N��</TH></TR>
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
