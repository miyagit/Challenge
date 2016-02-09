<?php
function view_profile($AAA){
	if($AAA == "id1") {
 		$profile ["id1"] = array("namae" => "ミヤジマ","tosi" => 22,"basyo" => "大阪府");
 		$kekka1 = $profile ["id1"];
 		return $kekka1;
 	}else if($AAA == "id2") {
 		$profile ["id2"] = array("namae" => "ヤマダ","tosi" => 53,"basyo" => "兵庫県");
		return $profile["id2"];
	}else if($AAA == "id3") {
		 $profile ["id3"] = array("namae" => "アオキ","tosi" => 60,"basyo" => "滋賀県");
		 return $profile["id3"];
	}	 
}



$A = view_profile("id3");

foreach($A as $key =>$value){

	print $key.":"."$value<br>";
	
}









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