<?php

$yuya = array("ID" => '0320',"namae" => 'yuya',"address" => '���{');
$motoko = array("ID" => '1029',"namae" => 'motoko',"address" => '�_��');
$akio = array("ID" => '0712',"namae" => 'akio',"address" => '���ꌧ');

$limit = 2;
$profile = array($yuya,$motoko,$akio);

foreach($profile as $value) {
	foreach($value as $key => $value2) {
		if($key == "ID" || $key == "address") {
			continue;
		}
		print $key.":".$value2."<br>";
	
	}
}


?>