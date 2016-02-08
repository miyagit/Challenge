<?php
$param1 = $_GET['param1'];//21が入ります
$param2 = $param1;
$kekka = $param1;
$sosuu1 =2;//素数1には2が入っている。
$sosuu2 =3;//素数2には3が入っている。
$sosuu3 =5;//素数3には5が入っている。
$sosuu4 =7;//素数4には7が入っている。
$sosuuHUTAKETA = param2;
while($kekka >1) {
	if($param1 %2 == 0) {
		$kekka = $param1 /2;
		print "1ケタの素因数".$sosuu1;
		print "元の値".$param2;
		$param1 = $kekka;
	}else if($param1 %3 == 0) {
		$kekka = $param1 /3;
		print "1ケタの素因数".$sosuu2;
		print "元の値".$param2;
		$param1 = $kekka;
	}else if ($param1 %5 == 0) {
		$kekka = $param1 /5;
		print "1ケタの素因数".$sosuu3;
		print "元の値".$param2;
		$param1 = $kekka;
	}else if ($param1 %7 == 0) {
		$kekka = $param1 /7;
		print "1ケタの素因数".$sosuu4;
		print "元の値".$param2;
		$param1 = $kekka;
	}else {
		print "元の値".$param2;
		print "その他".$kekka;
		
		break;
	}
print "<BR>";
}
?>