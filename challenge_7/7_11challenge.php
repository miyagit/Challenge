<HTML>
<HEAD>
<META http-equiv = "Content-Type" content="text/html;charset=sjis"/>
<?php
//�e�L�X�g�G�f�B�^�ɂǂ�ȕ����R�[�h���\������Ă��Ă��u���E�U�ł�sjis�Ƃ��ĕ\������B
?>
</HEAD>
<BODY bgcolor = "#FFFFFF" text="#000000">
<FORM name = 'form1' method = "post" action = 7_11challenge.php>
�X�V�������l��ID : <BR>
<input type = "text" name = "ID_insert_key">
<BR>
���O : <BR>
<input type = "text" name = "NAME_insert_key">
<BR>
TEL : <BR>
<input type = "text" name = "TEL_insert_key">
<BR>
�N�� : <BR>
<input type = "text" name = "AGE_insert_key">
<BR>
�a���� : <BR>
<input type = "text" name = "BIRTHDAY_insert_key">
<BR>
<INPUT type = "submit" value = "�f�[�^���X�V">
</FORM>

<?php

try{
$pdo_object= new PDO('mysql:host=localhost;dbname=Challenge_db;charset=sjis','miya','yuya');
}catch(PDOException $Exception){
 	die('�ڑ��Ɏ��s���܂���:'.$Exception->getMessage());
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
	print "�f�[�^���X�V���܂����B<BR>";
}catch(PDOException $Exception) {
	print "�G���[:" .$Exception ->getMessage();
}


}
?>

</BODY>
</HTML>
