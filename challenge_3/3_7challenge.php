<?php

counter ();




function counter () {
	for($i = 1;$i<=20;$i++) {
		if($i ==1){
			static $data = 3;
			print $i."回目".$data."<BR>";
		}else {
			print $i."回目".$data *=2;
			print "<br>";
		}
	}

}