<?php

$yuya = array("ID" => '0320',"namae" => 'yuya',"address" => '‘åã•{');
$motoko = array("ID" => '1029',"namae" => 'motoko',"address" => '_ŒË');
$akio = array("ID" => '0712',"namae" => 'akio',"address" => ' ‰êŒ§');


$profile = array($yuya,$motoko,$akio);

$count = 0;
$limit = 2;

foreach($profile as $value) {
		foreach($value as $key => $value2) {
			if($limit > $count) {
				if($key == "ID" || $key == "address") {
					continue;
			}
			print $key.":".$value2."<br>";
			$count ++;
			}
	}
}


?>