<?php
//課題応用編
$sougaku = $_GET['sougaku'];    // 5000が入ります

$kosuu = $_GET['kosuu'];    // 500が入ります

if($_GET['syubetsu'] == 1) {
	print "１：雑貨"."<br>";
	print "総額:".$sougaku."<br>";
	$nedan = $sougaku / $kosuu;
	print "１個当たりの値段:".$nedan."<br>";
	if($sougaku >= 5000) {
		print $sougaku*0.05."ポイント取得"."<br>";
	}else if ($sougaku >= 3000) {
		print $sougaku*0.04."ポイント取得"."<br>";
}
}else if($_GET['syubetsu'] == 2) {
	print "２：生鮮食品"."<br>";
	print "総額:".$sougaku."<br>";
	$nedan = $sougaku / $kosuu;
	print "１個当たりの値段:".$nedan."<br>";
	if($sougaku >= 5000) {
		print $sougaku*0.05."ポイント取得"."<br>";
	}else if ($sougaku >= 3000) {
		print $sougaku*0.04."ポイント取得"."<br>";
}
}else if($_GET['syubetsu'] == 3) {
	print "３：その他"."<br>";
	print "総額:".$sougaku."<br>";
	$nedan = $sougaku / $kosuu;
	print "１個当たりの値段:".$nedan."<br>";
	if($sougaku >= 5000) {
		print $sougaku*0.05."ポイント取得"."<br>";
	}else if ($sougaku >= 3000) {
		print $sougaku*0.04."ポイント取得"."<br>";
}
}

?>