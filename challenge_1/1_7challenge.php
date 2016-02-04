<?php
//課題応用編
$sougaku = $_GET['sougaku'];    // 5000が入ります

$kosuu = $_GET['kosuu'];    // 500が入ります

$syubetsu = $_GET['syubetsu'];    //１：雑貨、２：生鮮食品、３：その他が入ります
$zakka = 7;
$syokuhin = 15;
$sonohoka = 20;

$z = $zakka * $kosuu;
$sy = $syokuhin * $kosuu;
$so = $sonohoka * $kosuu;


print $syubetsu;
print "<BR>";
print $sougaku;
print "<BR>";
print $sougaku /$kosuu;
print "<BR>";
if($z >= 5000) {
	print $z*0.05."ポイント取得";
}else if ($z >= 3000) {
	print $z*0.04."ポイント取得";
}
print "<BR>";
if($sy >= 5000) {
	print $sy*0.05."ポイント取得";
}else if ($sy >= 3000) {
	print $sy*0.04."ポイント取得";
}
print "<BR>";
if($so >= 5000) {
	print $so*0.05."ポイント取得";
}else if ($so >= 3000) {
	print $so*0.04."ポイント取得";
}
print "<BR>";
?>
