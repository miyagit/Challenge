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
		"���̐g����".print $this -> tall."<br>";
		"���̑̏d��".print $this -> weight."<br>";
	}
}

class Singer extends Human {
	public function clear() {
		$this ->tall = "";
		$this ->weight = "";
	}
	
}

$newSinger = new Singer();
$newSinger -> clear();
$newSinger -> SHOWPRIVACY();
?>
</BODY>
</HTML>