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
		"私の身長は".print $this -> tall."<br>";
		"私の体重は".print $this -> weight."<br>";
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