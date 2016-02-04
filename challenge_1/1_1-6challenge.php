<?php
print "Hello world.";//課題1
print "<BR>";
?>


<?php
$a = "groove";
$b = "-";
$c = "gear";

print $a.$b.$c;
print "<BR>";
//課題2
?>

<?php
$a = "miyajima";
print $a;

print "<BR>";
$b = "22";
print $b;
print "<BR>";
$c = "大阪府";
print $c;
print "<BR>";
//課題3
?>

<?php
const king = 13;
$queen = 12;
$goukei = king + $queen;//課題4
print $goukei;//課題5
print "<BR>";
?>

<?php
$mondai = "'b'";
if($mondai == 1) {
	print "「1です！」";

}else if($mondai == 2) {
	print "「プログラミングキャンプ！」";
}else if($mondai == "'a'") {
	print "「文字です！」";
}else {
	print "「その他です！」";
}//課題6
print "<BR>";
?>

