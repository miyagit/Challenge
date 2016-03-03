<?php
require_once '../common/defineUtil.php';

/**
 * 使用した場所にトップページへのリンクを挿入する
 * @return トップページへのリンクのaタグ
 */
function return_top(){
    return "<a href='".ROOT_URL."'>トップへ戻る</a>";
}

/**
 * 種別番号から実際の種別名を返却する
 * @param type $type 種別と対応した数字
 * @return string 種別名
 */
function ex_typenum($type){
    switch ($type){
        case 1;
            return "エンジニア";
        case 2;
            return "営業";
        case 3;
            return "その他";
    }
}

/**
 * フォームの再入力時に、すでにセッションに対応した値があるときはその値を返却する
 * @param type $name formのname属性
 * @return type セッションに入力されていた値
 */
function form_value($name){
    if(isset($_POST['mode']) && $_POST['mode']=='REINPUT'){//REINPUTは確認画面に行ったあと戻るボタンを押したときの条件
        if(isset($_SESSION[$name])){
            return $_SESSION[$name];
        }
    }
}

/**
 * ポストからセッションに存在チェックしてから値を渡す。
 * 二回目以降のアクセス用に、ポストから値の上書きがされない該当セッションは初期化する
 * @param type $name
 * @return type
 */
function bind_p2s($name){
    if(!empty($_POST[$name])){
        $_SESSION[$name] = $_POST[$name];
        return $_POST[$name];//配列の中に値を入れる。配列に値がない場合はnullを返して、配列にnullを入れる。
    }else{//セッションにnullを返していなければ一番最初のセッションの値が入っているから２回目三回目の更新も一回目のsessionの値が入り続ける。
        $_SESSION[$name] = null;
        return null;
    }
}

function year ($birthday) {

	$jikannen = strtotime("$birthday");
	$year = date('Y', $jikannen);
	return $year;
}

function month ($birthday) {

	$jikangetu = strtotime("$birthday");
	$month = date('m', $jikangetu);
	return $month;
}

function day ($birthday) {

	$jikanday = strtotime("$birthday");
	$day = date('d', $jikanday);
	return $day;
}