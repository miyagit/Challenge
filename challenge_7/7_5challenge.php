<HTML>
<HEAD>
<META http-equiv = "Content-Type" content="text/html;charset=sjis"/>
<?php
//�e�L�X�g�G�f�B�^�ɂǂ�ȕ����R�[�h���\������Ă��Ă��u���E�U�ł�sjis�Ƃ��ĕ\������B
?>
</HEAD>
<BODY bgcolor = "#FFFFFF" text="#000000">

<?php
//tyr~catch�Őڑ��G���[���擾���\��
try{
$pdo_object= new PDO('mysql:host=localhost;dbname=Challenge_db;charset=sjis','miya','yuya');
}catch(PDOException $Exception){
 	die('�ڑ��Ɏ��s���܂���:'.$Exception->getMessage());
}

$sql = " select * from profiles where name like :name";

$query = $pdo_object-> prepare($sql);
$query -> bindValue(:name,'%��%')

$query -> execute();

$result = $query->fetchall(PDO::FETCH_ASSOC);
//print_r ($result);


foreach ($result as $value) {
foreach ($value as $key2  =>$value2) {
print $key2.":".$value2."<br>";	
}
}

/*
�ݒ�ŕ����R�[�h�I��������̂́A�T�N���G�f�B�^�ŏ�����Ă��镶����
�����R�[�h��ݒ肷��B�f�[�^�x�[�X�ɓ����Ă��镶���́Asjis�Ȃ�ŁA
sjis�̖΂�utf8�̖΂͑S���ʕ��Ɣ��f����A�Ȃ��ŕԂ�l���Ԃ��Ă���B


*/

?>

</BODY>
</HTML>




