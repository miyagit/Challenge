<?php
function view_profile($AAA){
	if($AAA == "miyajima") {
 		$profile ["miyajima"] = array("id" => "4869","namae" => "ミヤジマ","tosi" => 22,"basyo" => "");
 		return $profile ["miyajima"];
 	}else if($AAA == "yamada") {
 		$profile ["yamada"] = array("id" => "5884","namae" => "ヤマダ","tosi" => 53,"basyo" => "兵庫県");
		return $profile["yamada"];
	}else if($AAA == "aoki") {
		 $profile ["aoki"] = array("id" => "4649","namae" => "アオキ","tosi" => 60,"basyo" => "滋賀県");
		 return $profile["aoki"];
		 
	}	 
}



$A = view_profile("miyajima");
$B = view_profile("yamada");
$C = view_profile("aoki");
$ABC = array($A,$B,$C);
$limit = 2;
$count = 0;


foreach ($ABC as $value) {
	foreach($value as $key2 => $value2) {
		if($value2 == "" || $key2 == "id") {
			continue;
		}
		echo $key2.$value2."<br>";
	}
}
