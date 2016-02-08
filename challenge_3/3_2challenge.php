<?php
function hanbetsu($num1,$num2,$num3) {
	if ($num1%2 ==0){
		print "偶数"."<br>";
	}else{
		print "奇数"."<br>";
	}
	if ($num2%2 ==0){
		print "偶数"."<br>";
	}else{
		print "奇数"."<br>";
	}if ($num3%2 ==0){
		print "偶数"."<br>";
	}else{
		print "奇数"."<br>";
	}
}

print hanbetsu(4,3,5);
?>