<?php
function view_profile(){
	return array("id" => "4649","namae" => "ミヤジマ","tosi" => 22,"basyo" => "大阪府");
	
}
$hyouji = view_profile();
foreach($hyouji as $key =>$value){
	if($key == "id"){
		continue;
	}else {
	print $key.":"."$value<br>";
	}
}	
	
?>