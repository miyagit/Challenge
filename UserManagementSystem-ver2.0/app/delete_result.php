<?php
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>削除結果画面</title>
</head>
<body>
    <?php
    //[修正]削除確認画面からはいボタンを押した場合のみ処理を行う
    if(!$_POST['mode']=="RESULT"){
    	echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
    }else{
    $result = delete_profile($_POST['id']);//[修正]POSTに変更、デフォルトはGET
    //エラーが発生しなければ表示を行う
    if(!isset($result)){
    ?>
    <h1>削除確認</h1>
    削除しました。<br>
    <?php
    }else{
        echo 'データの削除に失敗しました。次記のエラーにより処理を中断します:'.$result;
    }
    }
    echo return_top();
    ?>
   </body>
</body>
</html>
