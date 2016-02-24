<?php
require_once 'keijiban_3.php';
require_once 'keijiban_5.php';

session_chk();
    
    if(!isset($_COOKIE['login_count']) && !isset($_COOKIE['last_login'])){//初めてのログイン時は、セッションIDを作って、SAVEDPHPIDに入れてる、(一回目)
        $lcount = 1;
        $llogin = mktime();
        setcookie('login_count',$lcount);
        setcookie('last_login',$llogin);
        setcookie('SAVEDPHPSESSID',$_COOKIE['PHPSESSID']);
    }else if($_COOKIE['PHPSESSID']!=$_COOKIE['SAVEDPHPSESSID']){//違うセッションがスタートしてる場合、ログインのカウントをプラス一。セッション切れになった場合おそらく。
        setcookie('login_count',$_COOKIE['login_count']+1);   
        $lcount = $_COOKIE['login_count'];
        $llogin = $_COOKIE['last_login'];
        setcookie('last_login',mktime());
        setcookie('SAVEDPHPSESSID',$_COOKIE['PHPSESSID']);
    }else{
        $lcount = $_COOKIE['login_count'];
        $llogin = $_COOKIE['last_login'];
    }
    
?>

<HTML>
<HEAD>
<TITLE>掲示板テスト</TITLE>
<META http-equiv="Content-Type" content = "text/html;
charset = utf-8">
</HEAD>

<BODY>
<FORM name = "form1" method = "POST" action = "keijiban_2.php">
名前:<BR>
<INPUT type = "text" name = "onamae">
<BR>
本文:<BR>
<TEXTAREA name = "honbun" cols = "30"rows = 5></TEXTAREA>
<BR>
<INPUT type = "submit" value = "投稿する">
</FORM>


<?php

readData();

function readData() {	
	$keijiban_file = 'keijiban.txt';
	$fp = fopen($keijiban_file, 'rb');

	if($fp) {
		if(flock($fp, LOCK_SH)) {
			while(!feof($fp)) {
				$buffer = fgets($fp);
				print ($buffer);
			}
			flock($fp, LOCK_UN);
		}else{
			print ("ファイルロックに失敗しました。");
	
		}
	}

	fclose($fp);

}

writeData();

function writeData() {
$namae = $_POST["onamae"];
$honbun = $_POST["honbun"];
$honbun = nl2br($honbun	);
	
$data = "<hr>.<br>	";
$data = $data."<p>名前:".$namae."</p>.<br>";
$data = $data."<p>本文:</p>.<br>";
$data = $data."<p>".$honbun."</p>.<br>";

$keijban_file = 'keijiban.txt';

$fp = fopen($keijban_file, 'ab');

if ($fp){
	if (flock($fp, LOCK_EX)){
		if (fwrite($fp,  $data) === FALSE){
			print('ファイル書き込みに失敗しました');
		}
		flock($fp, LOCK_UN);
	}else{
		print('ファイルロックに失敗しました');
	}


	fclose($fp);
}
}
?>
</BODY>
</HTML>