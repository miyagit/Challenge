<?php
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>変更入力画面</title>
</head>
<body>
<?php
    //[修正]詳細情報から変更ボタンを押した場合のみ処理を行う
    if(!$_POST['mode']=="CHANGE"){
        echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
    }else{ ?>
    <form action="<?php echo UPDATE_RESULT ?>" method="POST">
    <?php
    $result = profile_detail($_POST['id']);//[修正]POSTに変更、デフォルトはGET
    //[修正]次のページでアップデート処理をする際にsessionIDをこのページで保存しておく必要があるのでidをsessionに格納。
    session_start();
    $_SESSION['id'] = $_POST['id'];
    ?>
    名前:
    <input type="text" name="name" value="<?php echo $result[0]['name']; ?>">
    <br><br>

    生年月日:　
    <select name="year">
        <option value="">----</option>
        <?php
        for($i=1950; $i<=2010; $i++){ ?>
        <option value="<?php echo $i;?>" <?php if($i == year ($result[0]['birthday'])) { echo "selected";}?>><?php echo $i ;?></option>
        <?php } ?>
    </select>年
    <select name="month">
        <option value="">--</option>
        <?php
        for($i = 1; $i<=12; $i++){?>
        <option value="<?php echo $i;?>" <?php if($i == month($result[0]['birthday'])) { echo "selected";}?>><?php echo $i;?></option>
        <?php } ;?>
    </select>月
    <select name="day">
        <option value="">--</option>
        <?php
        for($i = 1; $i<=31; $i++){ ?>
        <option value="<?php echo $i; ?>" <?php if($i == day($result[0]['birthday'])) { echo "selected";}?>><?php echo $i;?></option>
        <?php } ?>
    </select>日
    <br><br>

    種別:
    <br>
    <?php
    for($i = 1; $i<=3; $i++){ ?>
    <input type="radio" name="type" value="<?php echo $i; ?>"<?php if($i==$result[0]['type']){echo "checked";}?>><?php echo ex_typenum($i);?><br>
    <?php } ?>
    <br>

    電話番号:
    <input type="text" name="tell" value="<?php echo $result[0]['tell']; ?>">
    <br><br>

    自己紹介文
    <br>
    <textarea name="comment" rows=10 cols=50 style="resize:none" wrap="hard"><?php echo $result[0]['comment']; ?></textarea><br><br>

    <input type="hidden" name="mode"  value="RESULT">
    <input type="submit" name="btnSubmit" value="以上の内容で更新を行う">
    <input type="hidden" name="id" value= "<?php echo $result[0]['userID']?>">
    </form>
    <form action="<?php echo RESULT_DETAIL; ?>" method="POST">
    <?php //[修正] hiddenでidを送信することにより、詳細画面に戻った時にエラーが出ないようにする。?>
    <input type="hidden" name="id" value="<?php echo $result[0]['userID']?>">
      <input type="submit" name="NO" value="詳細画面に戻る"style="width:100px">

    </form>
    <?php echo return_top(); ?>
    <?php
    }
    ?>
</body>

</html>
