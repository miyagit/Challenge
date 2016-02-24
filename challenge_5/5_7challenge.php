<?php
setcookie("namae",$_POST ["onamae"]); 
setcookie("gender",$_POST ["gender"]);
setcookie("honbun",$_POST ["honbun"]);

if(isset($_COOKIE["namae"]) &&isset($_COOKIE["gender"]) &&isset($_COOKIE["honbun"])){
	$fullname = $_COOKIE["namae"];
	$fullgender = $_COOKIE["gender"];
	$fullhonbun = $_COOKIE["honbun"];
}else{
$_COOKIE["namae"] = "";
$_COOKIE["gender"] = "";
$_COOKIE["honbun"] = "";
}   
?>
<HTML>
<HEAD>
<META http-equiv = "Content-Type" content="text/html;charset=utf-8">
</HEAD>

<BODY bgcolor = "#FFFFFF" text="#000000">



<FORM name = "form1" method = "POST" action = "5_7challenge.php">
名前:<BR>
<INPUT type = "text" name = "onamae" value = "<?=$fullname?>">
<BR>
<BR>

性別:<BR>
<?php
if($fullgender == "男") {
	?>
	<INPUT type = "radio" name = "gender" value = "男"checked>男<BR>
	<INPUT type = "radio" name = "gender" value = "女">女<BR>
	<?php
}else if($fullgender == "女"){
	?>
	
	<INPUT type = "radio" name = "gender" value = "男">男<BR>
	<INPUT type = "radio" name = "gender" value = "女"checked>女<BR>
		
<?php
}else {
?>
<INPUT type = "radio" name = "gender" value = "男">男<BR>
<INPUT type = "radio" name = "gender" value = "女">女<BR>
<BR>
<?php
}		
?>
趣味:<BR>
<TEXTAREA name="honbun" cols = "30"
rows="5"><?=$fullhonbun?></TEXTAREA>
<BR>
<INPUT type="submit" value = "送信">
</FORM>

</BODY>
</HTML>
