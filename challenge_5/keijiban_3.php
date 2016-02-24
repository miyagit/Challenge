<?php
function session_chk(){
    $period_time = 120;
    session_start();
    if(!empty($_SESSION['last_access'])){       
        if((mktime() - $_SESSION['last_access']) > $period_time){
            echo '<meta http-equiv="refresh" content="0;URL='.REDIRECT.'?mode=timeout">';
            logout_s();
            exit;
        }else{
            $_SESSION['last_access']=mktime();
        }
    }else{
        echo '<meta http-equiv="refresh" content="0;URL='.REDIRECT.'">';
        exit;
    }
}    

/**
 * セッション情報を破棄するための関数
 */
function logout_s(){
    session_unset();
    if (isset($_COOKIE['PHPSESSID'])) {
        setcookie('PHPSESSID', '', time() - 1800, '/');
    }
    session_destroy();
}
