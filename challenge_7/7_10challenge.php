<HTML>
<HEAD>
<META http-equiv = "Content-Type" content="text/html;charset=sjis"/>
<?php
//�e�L�X�g�G�f�B�^�ɂǂ�ȕ����R�[�h���\������Ă��Ă��u���E�U�ł�sjis�Ƃ��ĕ\������B
?>
</HEAD>
<BODY bgcolor = "#FFFFFF" text="#000000">
<FORM name = 'form1' method = "post" action = 7_10challenge.php>
ID : <BR>
<input type = "text" name = "ID_insert_key">
<BR>
<INPUT type = "submit" value = "�폜">
</FORM>

<?php

try{
$pdo_object= new PDO('mysql:host=localhost;dbname=Challenge_db;charset=sjis','miya','yuya');
}catch(PDOException $Exception){
 	die('�ڑ��Ɏ��s���܂���:'.$Exception->getMessage());
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
	print "�f�[�^���폜���܂����B<BR>";
}catch(PDOException $Exception) {
	print "�G���[:" .$Exception ->getMessage();
}

}
?>

</BODY>
</HTML>
