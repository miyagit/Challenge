<?php
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';
?>
<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
      <title>ユーザー情報詳細画面</title>
</head>
  <body>
    <?php
    /*[修正]デフォルトはGET。変更画面・削除画面から詳細画面に戻る際にREQUESTにしておかなければ
     * search_result.phpからクエリストリングで値を送信するとき,
     * 詳細画面に戻るとき、GET/POSTから値を送信する必要があるので、
     * REQUESTにして値を受け取れるようにする。
     */

    $result = profile_detail($_REQUEST['id']);
    //エラーが発生しなければ表示を行う
    if(is_array($result)){
    ?>

    <h1>詳細情報</h1>
    ID:<?php echo $result[0]['userID'];?><br> <?php // [修正] IDを追加?>
    名前:<?php echo $result[0]['name'];?><br>
    生年月日:<?php echo $result[0]['birthday'];?><br>
    種別:<?php echo ex_typenum($result[0]['type']);?><br>
    電話番号:<?php echo $result[0]['tell'];?><br>
    自己紹介:<?php echo $result[0]['comment'];?><br>
    登録日時:<?php echo date('Y年n月j日　G時i分s秒', strtotime($result[0]['newDate'])); ?><br>

    <form action="<?php echo UPDATE; ?>" method="POST">
        <input type="submit" name="update" value="変更"style="width:100px">
        <?php // [修正]↓hiddenでIDを渡し、削除画面の部分でエラーを出さないようにする。?>
        <input type="hidden" name="id" value= "<?php echo $result[0]['userID']?>">
        <?php // [修正]↓hiddenで値を更新画面に直リンクで行けないようにする。?>
        <input type="hidden" name="mode" value="CHANGE" >
    </form>

    <form action="<?php echo DELETE;?>" method="POST">
        <input type="submit" name="delete" value="削除"style="width:100px">
        <?php // [修正]↓hiddenでIDを渡し、削除画面の部分でエラーを出さないようにする。?>
        <input type="hidden" name="id" value= "<?php echo $result[0]['userID']?>">
        <?php // [修正]↓hiddenで値を削除画面に直リンクで行けないようにする。?>
        <input type="hidden" name="mode" value="DELETE" >
    </form>

    <?php
    }else{
        echo 'データの検索に失敗しました。次記のエラーにより処理を中断します:'.$result;
    }
    echo return_top();//[修正]TOPページに戻るリンクを追加
    ?>
  </body>
</html>
