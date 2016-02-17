<HTML>

<head>
<TITLE>PHPのテスト</TITLE>
</head>
<body>
<?php
$file_dir = 'C:\xampp\htdocs\develop\\';
$file_path = $file_dir.$_FILES["uploadfile"]["name"];
if(move_uploaded_file($_FILES["uploadfile"]["name"],$file_path)) {
	$img_dir = "/image/";
	$img_path = $img_dir.$_FILES["uploaded"]["name"];
	$size = getimagesize($file_path);
	?>
	ファイルアップロードを完了しました。<BR>
	<IMG src = "<?=$img_path?>"<?=$size[3]?>><BR>
	<B><?=$_POST["comment"]?></B><BR>
<?php
}else {
?>
正常にアップロードできませんでした。<BR>
<?php
}
?>
</body>
</HTML>
   