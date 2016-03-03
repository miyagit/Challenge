<?php

//DBへの接続を行う。成功ならPDOオブジェクトを、失敗なら中断、メッセージの表示を行う
function connect2MySQL(){
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','miya','yuya');
        //SQL実行時のエラーをtry-catchで取得できるように設定
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die('DB接続に失敗しました。次記のエラーにより処理を中断します:'.$e->getMessage());
    }
}

//レコードの挿入を行う。失敗した場合はエラー文を返却する
function insert_profiles($userID, $name, $birthday, $type, $tell, $comment){
    //db接続を確立
    $insert_db = connect2MySQL();

    //DBに全項目のある1レコードを登録するSQL
    $insert_sql = "INSERT INTO user_t(userID,name,birthday,tell,type,comment,newDate)"
            . "VALUES(:userID, :name,:birthday,:tell,:type,:comment,:newDate)";

    //現在時をdatetime型で取得
    $datetime =new DateTime();
    $date = $datetime->format('Y-m-d H:i:s');

    //クエリとして用意
    $insert_query = $insert_db->prepare($insert_sql);

    //SQL文にセッションから受け取った値＆現在時をバインド
    $insert_query->bindValue(':userID',$userID);
    $insert_query->bindValue(':name',$name);
    $insert_query->bindValue(':birthday',$birthday);
    $insert_query->bindValue(':tell',$tell);
    $insert_query->bindValue(':type',$type);
    $insert_query->bindValue(':comment',$comment);
    $insert_query->bindValue(':newDate',$date);

    //SQLを実行
    try{
        $insert_query->execute();
    } catch (PDOException $e) {
        //接続オブジェクトを初期化することでDB接続を切断
        $insert_db=null;
        return $e->getMessage();
    }

    $insert_db=null;
    return null;
}

function serch_all_profiles(){
    //db接続を確立
    $search_db = connect2MySQL();
	//[修正]デフォルトはSELECT * FROM user_t。IDを昇順に表示するためにorder by userIDを追加。
    $search_sql = "SELECT * FROM user_t order by userID";

    //クエリとして用意
    $seatch_query = $search_db->prepare($search_sql);

    //SQLを実行
    try{
        $seatch_query->execute();
    } catch (PDOException $e) {
        $seatch_query=null;
        return $e->getMessage();
    }

    //全レコードを連想配列として返却
    return $seatch_query->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * 複合条件検索を行う
 * @param type $name
 * @param type $year
 * @param type $type
 * @return type
 */
function serch_profiles($name=null,$year=null,$type=null){
    //db接続を確立
    $search_db = connect2MySQL();
    // user_tテーブルの全件表示
    $search_sql = "SELECT * FROM user_t";
    $junban_sql = "order by userID";
    /* デフォルトをfalseにしておく。
    93行目から97行目はsearch.php検索の名前のテキストボックスに値が入っている場合の名前検索。
    98行目から100行目は、生年の所に値が入っているかの生年検索。
    101行目から103行目は、名前のテキストボックスに値が入っていてなおかつ、生年に値が入っている場合の複合検索
    104行目から105行目は種別をチェックしている場合の種別検索
    106行目から108行目は、名前・生年・種別全てのボックスに値が入っている複合検索。
    */
    $flag = false;
    if(isset($name)){
        $search_sql .= " WHERE name like :name";
        $flag = true;
    }
    if(isset($year) && $flag == false){
        $search_sql .= " WHERE birthday like :year";
        $flag = true;
    }else if(isset($year)){
        $search_sql .= " AND birthday like :year";
    }
    if(isset($type) && $flag == false){
        $search_sql .= " WHERE type = :type";
    }else if(isset($type)){
        $search_sql .= " AND type = :type";
    }
    //[修正]どの検索パターンでも表示の順番はIDの昇順の順番で表示されるようにorder by userIDを追加。
    $search_sql .= " order by userID";

    //クエリとして用意
    /*
     * [修正] 検索の全パターンでも表示ができるように処理を追加。
     */

    $seatch_query = $search_db->prepare($search_sql);
    if(isset($name)){
    	$seatch_query->bindValue(':name','%'.$name.'%');
    	if(isset($year)) {
    		$seatch_query->bindValue(':year','%'.$year.'%');
    		if(isset($type)) {
    			$seatch_query->bindValue(':type',$type);
    		}
    	}
    }else if(isset($year)) {
    	$seatch_query->bindValue(':year','%'.$year.'%');
    	if(isset($type)) {
    		$seatch_query->bindValue(':type',$type);
    	}
    }else if(isset($type)) {
    	$seatch_query->bindValue(':type',$type);
    	if(isset($name)){
    		$seatch_query->bindValue(':name','%'.$name.'%');
    	}
    }

    //SQLを実行
    try{
        $seatch_query->execute();
    } catch (PDOException $e) {
        $seatch_query=null;
        return $e->getMessage();
    }

    //該当するレコードを連想配列として返却
    return $seatch_query->fetchAll(PDO::FETCH_ASSOC);
}



function profile_detail($id){
    //db接続を確立
    $detail_db = connect2MySQL();

    $detail_sql = "SELECT * FROM user_t WHERE userID=:id";

    //クエリとして用意
    $detail_query = $detail_db->prepare($detail_sql);

    $detail_query->bindValue(':id',$id);

    //SQLを実行
    try{
        $detail_query->execute();
    } catch (PDOException $e) {
        $detail_query=null;
        return $e->getMessage();
    }

    //レコードを連想配列として返却
    return $detail_query->fetchAll(PDO::FETCH_ASSOC);
}

function delete_profile($id){
    //db接続を確立
    $delete_db = connect2MySQL();
// [修正] デフォルトは"DELETE * FROM user_t WHERE userID=:id"。*が不要の構文エラーが出たため、削除。
    $delete_sql = "DELETE FROM user_t WHERE userID=:id";

    //クエリとして用意
    $delete_query = $delete_db->prepare($delete_sql);

    $delete_query->bindValue(':id',$id);

    //SQLを実行
    try{
        $delete_query->execute();
    } catch (PDOException $e) {
        $delete_query=null;
        return $e->getMessage();
    }
    return null;
}


//[修正]update処理を追加。
	function update_profile( $name, $birthday, $type, $tell, $comment, $userID){
	//db接続を確立
	$update_db = connect2MySQL();
	// [修正] デフォルトは"DELETE * FROM user_t WHERE userID=:id"。*が不要の構文エラーが出たため、削除。
	$update_sql = "UPDATE user_t SET
					name=:name, birthday = :birthday, tell = :tell, type =  :type, comment = :comment, newDate = :newDate
					WHERE userID=:id";

	//現在時をdatetime型で取得
	$datetime =new DateTime();
	$date = $datetime->format('Y-m-d H:i:s');
	//クエリとして用意
	$update_query = $update_db->prepare($update_sql);
	//SQL文にセッションから受け取った値＆現在時をバインド
	$update_query->bindValue(':id',$userID);
	$update_query->bindValue(':name',$name);
	$update_query->bindValue(':birthday',$birthday);
	$update_query->bindValue(':tell',$tell);
	$update_query->bindValue(':type',$type);
	$update_query->bindValue(':comment',$comment);
	$update_query->bindValue(':newDate',$date);


	//SQLを実行
	try{
		$update_query->execute();
	} catch (PDOException $e) {
		$update_query=null;
		return $e->getMessage();
	}
	return null;
}
