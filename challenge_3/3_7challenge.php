<?php
for($i = 1; $i<=20;$i++) {
print $i."回目:";
counter();
}

function counter() {
//関数が最初に呼び出された時にだけ、初期化される変数、それがstatic。
	static $data = 3;
	print  $data = $data  *2 ;
	print "<br>";

}

?>