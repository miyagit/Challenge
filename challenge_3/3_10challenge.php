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
$limit = 1;
$count = 0;


foreach ($ABC as $value) {
	if($limit == $count) {
		break;
	}
	foreach($value as $key2 => $value2) {
		if($value2 == "" || $key2 == "id") {
			continue;
		}
		echo $key2.$value2."<br>";
		
	}$count++;
}




/*
	foreach($A as $key =>$value){
		if($key == "id" || $value == "") {
			continue;
		}	if($count == $limit) {
		break;
		print $key.":"."$value<br>";
	}$count ++;
	if($count == $limit) {
		break;
	}
	foreach($B as $key =>$value){
		if($key == "id" || $value == "") {
			continue;
		}
		print $key.":"."$value<br>";
	}$count++;
	if($count == $limit) {
		break;
	}
	foreach($C as $key =>$value){
		if($key == "id" || $value == "") {
			continue;
		}
		print $key.":"."$value<br>";
	}$count++;	


*/





/*
 $profile ["id1"] = array("namae" => "ミヤジマ","tosi" => 22,"basyo" => "大阪府");
 
 $profile ["id2"] = array("namae" => "ヤマダ","tosi" => 53,"basyo" => "兵庫県");

 $profile ["id3"] = array("namae" => "アオキ","tosi" => 60,"basyo" => "滋賀県");
 
 foreach($profile["id3"] as $key =>$value){

	print $key.":"."$value<br>";


戻り値がある場合(return)は、戻ってから受け取る値がないと
実行することができない。実際には実行するのだけれども
空振りしてしまう。returnで値を返しているが空振りして
結局は関数は実行できないことになっている。
$A = view_profile("id3");など。

戻り値がない場合、print ~~と関数名に直接書かれていて、returnなどが
ない場合は、戻り値がないので、変数に値を格納しなくても
view_profile();で関数の中の値を出力することができる。


}
*/