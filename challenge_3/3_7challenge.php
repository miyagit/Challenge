<?php
for($i = 1; $i<=20;$i++) {
print $i."���:";
counter();
}

function counter() {
//�֐����ŏ��ɌĂяo���ꂽ���ɂ����A�����������ϐ��A���ꂪstatic�B
	static $data = 3;
	print  $data = $data  *2 ;
	print "<br>";

}

?>