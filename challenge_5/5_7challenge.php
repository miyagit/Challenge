<?php
$count = 1;
if (isset($_COOKIE["count"])) {
	$count = $_COOKIE["count"];
	$count++;
	
}
setcookie("count",$count);
?>
// ユーザーの１回目の訪問
<?php
if ($count == 1) {
?>
print $_POST["onamae"]."さん、こんにちは！".'<br>';
print "あなたは".$_POST["gender"]."です！".'<br>';
print "趣味は".$_POST["honbun"]."なんですね！";

<?php 
}elseif (isset($_POST["back"])) {
	?>
<FORM name = "form1" method = "POST" action = "5_7challenge.php">
名前:<BR>
<INPUT type = "text" name = "onamae" value = "<?= $_COOKIE['NAMAE']?>">
<BR>
<BR>
性別:<BR>
<INPUT type = "radio" name = "gender" value = "男">男<BR> 
<INPUT type = "radio" name = "gender" value = "女">女<BR>
<BR>	
趣味:<BR>
<TEXTAREA name="honbun" cols = "30" value = "<?= $_COOKIE['HONBUN']?>">
rows="5"></TEXTAREA>
<BR>
<INPUT type="submit" value = "送信">
</FORM>

}
 setcookie('NAMAE', $_POST["onamae"]);
 setcookie('GENDER', $_POST["gender"]);
 setcookie('HONBUN', $_POST["honbun"]);
 // 次の訪問で。。。

$namae  = $_COOKIE['NAMAE'];
$gender = $_COOKIE['GENDER'];
$honbun = $_COOKIE['HONBUN'];
print $_POST["onamae"]."さん、こんにちは！".'<br>';
print "あなたは".$_POST["gender"]."です！".'<br>';
print "趣味は".$_POST["honbun"]."なんですね！";
