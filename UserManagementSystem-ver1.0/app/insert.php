<?php require_once '../common/defineUtil.php'; ?>
<?php require_once '../common/scriptUtil.php';//トップページに戻るボタンを追加するためにrequire分を追加 ?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>登録画面</title>
</head>
<body>
<?php
session_start();
$_SESSION['last_access']=mktime();
if(isset($_SESSION['name'])) {?>
    <form action="<?php echo INSERT_CONFIRM ?>" method="POST">
    名前:
    <input type="text" name="name"value = "<?=$_SESSION['name']//課題4?>">
    <br><br>
<?php
}else {?>
	<form action="<?php echo INSERT_CONFIRM ?>" method="POST">
名前:
<input type="text" name="name">
<br><br>

<?php
}
?>

    生年月日:


    <select name="year">
        <?php //課題4
    if ($_SESSION['year'] !== "----") {?>
    	<option value = "<?=$_SESSION['year']?>" selected><?=$_SESSION['year']?></option>
    	<?php
        for($i=1950; $i<=2010; $i++){ ?>
        <option value="<?php echo $i;?>"><?php echo $i ;?></option>
        <?php } ?>
    </select>年
    <?php
    } else { ?>
        <option value="----">----</option>
        <?php
        for($i=1950; $i<=2010; $i++){ ?>
        <option value="<?php echo $i;?>"><?php echo $i ;?></option>
        <?php } ?>
    </select>年
    <?php
    }
    ?>
    <select name="month">
    	<?php
    	if ($_SESSION['month'] !== "--") {?>
    	    	<option value = "<?=$_SESSION['month']?>" selected><?=$_SESSION['month']?></option>
    	    	<?php
    	        for($i=1; $i<=12; $i++){ ?>
    	        <option value="<?php echo $i;?>"><?php echo $i ;?></option>
    	        <?php } ?>
    	    </select>月
    	    <?php
    	    } else { ?>

        <option value="--">--</option>
        <?php
        for($i = 1; $i<=12; $i++){?>
        <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php } ;?>
    </select>月
    <?php
    }
    ?>
    <select name="day">
    <?php
    if ($_SESSION['day'] !== "--") {?>
        	    	<option value = "<?=$_SESSION['day']?>" selected><?=$_SESSION['day']?></option>
        	    	<?php
        	        for($i=1; $i<=31; $i++){ ?>
        	        <option value="<?php echo $i;?>"><?php echo $i ;?></option>
        	        <?php } ?>
        	    </select>日
        	    <?php
        	    } else { ?>
        <option value="--">--</option>
        <?php
        for($i = 1; $i<=31; $i++){ ?>
        <option value="<?php echo $i; ?>"><?php echo $i;?></option>
        <?php } ?>
    </select>日
    <br><br>
    <?php
    }
    ?>
<br><br>
    種別:
    <br>
	<?php
	 if($_SESSION['type'] == "エンジニア") {//課題4 ?>
		<input type="radio" name="type" value="エンジニア" checked>エンジニア<br>
		<input type="radio" name="type" value="営業">営業<br>
    	<input type="radio" name="type" value="その他">その他<br>
		<?php
	}else if($_SESSION['type'] == "営業") {?>
		<input type="radio" name="type" value="エンジニア">エンジニア<br>
		<input type="radio" name="type" value="営業" checked>営業<br>
		<input type="radio" name="type" value="その他">その他<br>
		<?php
	}else if($_SESSION['type'] == "その他") {?>
		<input type="radio" name="type" value="エンジニア">エンジニア<br>
		<input type="radio" name="type" value="営業">営業<br>
		<input type="radio" name="type" value="その他" checked>その他<br>
		<?php
	} else  { ?>
		<input type="radio" name="type" value="エンジニア">エンジニア<br>
		<input type="radio" name="type" value="営業">営業<br>
		<input type="radio" name="type" value="その他">その他<br>
	<?php
	}
	?>

       <br>

    電話番号:
    <input type="text" name="tell"value = "<?=$_SESSION['tell'] //課題4 ?>">
    <br><br>

    自己紹介文
    <br>
    <textarea name="comment" rows=10 cols=50 style="resize:none" wrap="hard"><?=$_SESSION['comment'] //課題4 ?></textarea><br><br>

    <input type="submit" name="btnSubmit" value="確認画面へ">
    </form>
    <br><br>
    <?php
    echo return_top(); //課題1
        ?>
</body>
</html>
