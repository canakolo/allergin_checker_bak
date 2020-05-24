<?php
    ini_set('log_erros','on');
    ini_set('error_log','../php.log');

    //debug
    $debug_flg = true;
    function debug($str){
      global $debug_flg;
      if(!empty($debug_flg)){
        error_log('デバッグ：'.$str);
      }
    }

    //セッション準備・セッション期間の延長
    session_save_path("/var/tmp/");
    ini_set('session.gc_maxlifetime',60*60*24*30);
    ini_set('session.cookie_lifetime', 60*60*24*30);
    session_start();

    session_regenerate_id();

    function debugLogStart(){
        debug('<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<画面表示処理開始');
        debug('セッションID：'.session_id());
        debug('セッション変数の中身'.print_r($_SESSION,true));
        debug('現在日時タイムスタンプ：'.time());
        if(!empty($_SESSION['login_date']) && !empty($_SESSION['login_limit'])){
            debug($_SESSION['login_date']);
            debug($_SESSION['login_limit']);
            debug('ログイン期限日時タイムスタンプ'.($_SESSION['login_date'] + $_SESSION['login_limit']));
      }
    }

    //エラーメッセージの定義と関数
    define('MSG01','入力必須です。');
    define('MSG02','Emailの形式で入力してください。');
    define('MSG03','パスワード（２回目）が合っていません。');
    define('MSG04','半角英数字で入力してください。');
    define('MSG05','６文字以上で入力してください。');
    define('MSG06','２５６文字以内で入力してください。');
    define('MSG07','エラーが発生しました。しばらく経ってからやり直してください。');
    define('MSG08','そのメールアドレスは既に登録されています。');
    define('MSG09','パスワードまたはメールアドレスが違います。');

    function validRequired($str,$key){
        if(empty($str)){
            global $err_msg;
            $err_msg[$key] = MSG01;
        }
    }
    function validEmail($str, $key){
        if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",$str)){
            global $err_msg;
            $err_msg[$key] = MSG02;
        }
    }
    function validEmailDup($email){
        global $err_msg;
    try{
        $dbh = dbConnect();
        $sql = 'SELECT count(*) FROM student WHERE email = :email AND delete_flg = 0 ';
        $data = array(':email' => $email);
        $stmt = queryPost($dbh, $sql, $data);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!empty(array_shift($result))){
          $err_msg['email'] = MSG08;
        }
    }catch (Exception $e){
        error_log('エラー発生:'.$e->getMessage());
        $err_msg['common'] = MSG07;
    }
    }

    // function validNameDup($name){
    //     global $err_msg;
    // try{
    //     $dbh = dbConnect();
    //     $sql = 'SELECT count(*) FROM teacher WHERE name = :name AND delete_flg = 0 ';
    //     $data = array(':name' => $name);
    //     $stmt = queryPost($dbh, $sql, $data);
    //     $result = $stmt->fetch(PDO::FETCH_ASSOC);
    //     if(!empty(array_shift($result))){
    //       $err_msg['name'] = MSG10;
    //     }
    // }catch (Exception $e){
    //     error_log('エラー発生:'.$e->getMessage());
    //     $err_msg['common'] = MSG07;
    // }
    // }

    function validMinLen($str, $key, $min = 6){
      if(mb_strlen($str) < $min){
        global $err_msg;
        $err_msg[$key] = MSG05;
      }
    }

    function validMaxLen($str, $key, $max = 256){
      if(mb_strlen($str) > $max){
        global $err_msg;
        $err_msg[$key] = MSG06;
      }
    }
    //関数の中でdatebaseにつなぐのかなと思ったけど、データをとってくるのは、関数を呼び出すとき
    function validMatch($str1, $str2, $key){
      if($str1 !== $str2){
        global $err_msg;
        $err_msg[$key] = MSG03;
      }
    }

    function validHalf($str, $key){
      if(!preg_match("/^[a-zA-Z0-9]+$/", $str)){
      global $err_msg;
      $err_msg[$key] = MSG04;
    }
    }

    //データベースへの接続
    function dbConnect(){
      $dsn = 'mysql:dbname=allergin; host=localhost; charset=utf8';
      $user = 'root';
      $password = 'root';
      $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
      );
      $dbh = new PDO($dsn, $user, $password, $options);
      return $dbh;
    }
      function queryPost($dbh, $sql, $data){
        $stmt = $dbh->prepare($sql);
        if(!$stmt->execute($data)){
          debug('クエリに失敗しました');
          debug('失敗したSQL：'.print_r($stmt, true));
          $err_msg['common'] = MSG07;
          return 0;
        }else{
          debug('基本的なDBには接続できたよ');
          return $stmt;
        }
      }

      function getFoodInfo(){
        debug('アレルギー食品情報を取得します');
        try{
          $dbh = dbConnect();
          $sql = 'SELECT * FROM food';
          $data = array();
          $stmt = queryPost($dbh, $sql, $data);

          if($stmt){
            return $stmt->fetchAll();
          }else{
            return false;
          }
        }catch (Exception $e){
          error_log('エラー発生：'.$e->getMessage());
        }
      }

//innerJoinだと、student.food1とmenu.menu1_allergin1と一致している行でないと取得できない。基のデータを基準にしてJoinする方は順番が変わる
//  function getMenuList(){
  //  debug('メニュー情報を入手します');
    //try{
     //$dbh = dbConnect();
     //$sql = 'SELECT id, food1, surve_date, menu1, menu1_allergin1 FROM student INNER JOIN menu ON student.food1 = menu.menu1_allergin1';
     //$data = array();
     //$stmt = queryPost($dbh, $sql, $data);
     //$result = $stmt->fetchAll();
     //debug('クエリ結果の中身：'.print_r($result,true));
   //}
    //catch (Exception $e){
    //error_log('エラー発生：'.$e->getMessage());
    //debug('DBに接続できませんでした');
    //}
  //}

//  function getUserFood(){
  //  $userId = $_SESSION['user_id'];
  //  debug('ログインユーザー：'.print_r($userId));
  //  debug('ログインユーザーのアレルギー食品を取得します');
  //  try{
    //$dbh = dbConnect();
    //$sql = 'SELECT food1 FROM student WHERE id = :id';
    //$data = array(':id' => $userId);
    //$stmt = queryPost($dbh, $sql, $data);

    //$userFood= $stmt->fetch(PDO::FETCH_ASSOC);
    //return array_shift($userFood);
    //debug('ユーザーのアレルギー食品：'.print_r($userFood, true));
  //}catch (Exception $e){
    //error_log('エラー表示：'.$e->getMessage());
    //debug('DBに接続できませんでした');
  //}
  //}


//function getAllerginMenu(){
//  debug('ユーザーが食べられない給食メニューと出される日を取得します。');
  //try{
  //$dbh = dbConnect();
  //$sql = 'SELECT surve_date, menu1 from menu1';
  //$data = array();
  //$stmt = queryPost($dbh, $sql, $data);
  //$result = $stmt->fetch(PDO::FETCH_ASSOC);
  //return $result;
  //debug(print_r($result, true));
//}catch (Exception $e){
  //error_log('エラー表示：'.$e->getMessage());
  //debug('データベースに接続できませんでした');
//}
//}
