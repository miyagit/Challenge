<?php require_once '../common/scriptUtil.php'; //トップページに戻るボタンを追加するためにrequire分を追加?>
<?php require_once '../common/defineUtil.php'; ?>
<?php session_start();?>
<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
      <title>登録確認画面</title>
</head>
  <body>
    <?php
    if(!empty($_POST['name']) && !empty($_POST['year']) && !empty($_POST['type'])
            && !empty($_POST['tell']) && !empty($_POST['comment'])
            //↓課題2生年月日がデフォルトのままだと再度入力画面を表示。
            && ($_POST['year']!== "----")&& ($_POST['month']!== "--")&& ($_POST['day']!== "--")){
        $post_name = $_POST['name'];
        //date型にするために1桁の月日を2桁にフォーマットしてから格納
        $post_birthday = $_POST['year'].'-'.sprintf('%02d',$_POST['month']).'-'.sprintf('%02d',$_POST['day']);
        $post_type = $_POST['type'];
        $post_tell = $_POST['tell'];
        $post_comment = $_POST['comment'];

        //セッション情報に格納

        $_SESSION['name'] = $post_name;
        $_SESSION['year'] = $_POST['year'];
        $_SESSION['month'] = $_POST['month'];
        $_SESSION['day'] = $_POST['day'];
        $_SESSION['birthday'] = $post_birthday;
        $_SESSION['type'] = $post_type;
        $_SESSION['tell'] = $post_tell;
        $_SESSION['comment'] = $post_comment;
    ?>

        <h1>登録確認画面</h1><br>
        名前:<?php echo $post_name;?><br>
        生年月日:<?php echo $post_birthday;?><br>
        種別:<?php echo $post_type?><br>
        電話番号:<?php echo $post_tell;?><br>
        自己紹介:<?php echo $post_comment;?><br>

        上記の内容で登録します。よろしいですか？

        <form action="<?php echo INSERT_RESULT ?>" method="POST">
          <input type="submit" name="yes" value="はい">
          <?php //↓課題5?>
          	<input type='hidden' name='myname' value='true' />
        </form>
        <form action="<?php echo INSERT ?>" method="POST">
            <input type="submit" name="no" value="登録画面に戻る">
        </form>

    <?php }else{ ?>
        <h1>入力項目が不完全です</h1><br>
        再度入力を行ってください<br>
        <?php
        if ($_POST['name'] == "") {
        	print "未入力:"."名前"."<br>";//課題3

        }if ($_POST['year'] == "----" || $_POST['month'] == "--" || $_POST['day'] == "--") {
        	print "未入力:"."生年月日"."<br>";//課題3

        }if ($_POST['type'] == "") {
        	print "未入力:"."種別"."<br>";//課題3

        }if ($_POST['tell'] == "") {
        	print "未入力:"."電話番号:"."<br>";//課題3

        }if ($_POST['comment'] == "") {
        	print "未入力:"."自己紹介文:"."<br>";//課題3

        }?>
        <form action="<?php echo INSERT ?>" method="POST">
            <input type="submit" name="no" value="登録画面に戻る">
        </form>
    <?php }?>
    <br><br>
    <?php echo return_top(); //課題1?>


</body>
</html>
