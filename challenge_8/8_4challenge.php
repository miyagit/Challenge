<HTML>
<HEAD>
<TITLE>クラスのテスト</TITLE>
</HEAD>
<BODY>
<?php
class Human {
	public $tall = 10;
	public $weight = 20;
	public function PRIVACY($tall1,$weight1) {
		$this ->tall =   $tall1;
		$this ->weight = $weight1;
	}
	public function SHOWPRIVACY() {
		"私の身長は".print $this -> tall."です。<br>";
		"私の体重は".print $this -> weight."です。<br>";
	}
}
$newHuman = new Human();
$newHuman -> PRIVACY(178,60);
$newHuman -> SHOWPRIVACY();

?>
</BODY>
</HTML>