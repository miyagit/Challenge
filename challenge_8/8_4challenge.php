<HTML>
<HEAD>
<TITLE>�N���X�̃e�X�g</TITLE>
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
		"���̐g����".print $this -> tall."�ł��B<br>";
		"���̑̏d��".print $this -> weight."�ł��B<br>";
	}
}
$newHuman = new Human();
$newHuman -> PRIVACY(178,60);
$newHuman -> SHOWPRIVACY();

?>
</BODY>
</HTML>