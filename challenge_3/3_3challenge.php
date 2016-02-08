<?php
function hanbetsu($num1,$num2 =5,$type =false) {
	if($type == false) {
		$kekka = $num1 * $num2;
		print $kekka;
	}else {
		$kekka3 = $num1 * $num2;
		$kekka4 = $kekka3 * $kekka3;
		print $kekka4;
	}
}	
	print hanbetsu(4,3,true);
?>