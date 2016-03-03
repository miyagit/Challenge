<?php
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>更新結果画面</title>
</head>
  <body>
    <?php
    //[修正]詳細情報から変更ボタンを押した場合のみ処理を行う
    if(!$_POST['mode']=="RESULT"){
    	echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
    }else{
    //update処理を実行するためにsessionにpostから送られてきたデータをセッションに格納する。
     session_start();
     $_SESSION['name'] = $_POST['name'];
     $_SESSION['year'] = $_POST['year'];
     $_SESSION['month'] = $_POST['month'];
     $_SESSION['day'] = $_POST['day'];
     $_SESSION['type'] = $_POST['type'];
     $_SESSION['tell'] = $_POST['tell'];
     $_SESSION['comment'] = $_POST['comment'];
     $_SESSION['birthday'] = $_SESSION['year'].'-'.sprintf('%02d',$_SESSION['month']).'-'.sprintf('%02d',$_SESSION['day']);
    //[修正]sessionに変更、デフォルトはGET
    $result = update_profile($_SESSION['name'],$_SESSION['birthday'],$_SESSION['type'],$_SESSION['tell'],$_SESSION['comment'],$_SESSION['id']);
    //エラーが発生しなければ表示を行う
    //[修正]更新した項目を表示する処理を追加。
    if(!isset($result)){?>
		<h1>更新確認</h1><br>
            名前:<?php echo $_SESSION['name'];?><br>
            生年月日:<?php echo $_SESSION['birthday'];?><br>
            種別:<?php echo ex_typenum($_SESSION['type'])?><br>
            電話番号:<?php echo $_SESSION['tell'];?><br>
            自己紹介:<?php echo $_SESSION['comment']?><br><br>
    以上の内容で更新しました。<br>
    <?php
    }else{
        echo 'データの更新に失敗しました。次記のエラーにより処理を中断します:'.$result;
    }
    echo return_top();
    ?>
    <?php
    }
    ?>
  </body>
</html>
