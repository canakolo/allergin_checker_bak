<?php
require('../function.php');

debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
debug('ログインページ「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
debugLogStart();
//ログイン認証
require('auth.php');
//①ポスト送信の中身を変数に入れる
//②変数の中身を、バリデーションチェックする
//③終わったら、デバックにバリデーションOKする
//④ポストされたemailからuserIdを把握し、パスワードが合っているかをチェックする
//⑤パスワード保持にチェックが入っていたら、sessionLimitを伸ばす

if(!empty($_POST)){
  debug('ポスト送信があります');
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  $pass_save = (!empty($_POST['pass_save']))? true : false;


validRequired($email,'email');
validRequired($pass,'pass');

validEmail($email,'email');

validMaxLen($pass, 'pass');
validMinLen($pass,'pass');
validHalf($pass, 'pass');



if(empty($err_msg)){
  debug('バリデーションOKです。');
try{
  $dbh = dbConnect();
  $sql = 'SELECT password, id FROM student WHERE email = :email';
//$dataで連想配列をつくっていて、連想配列のキーとして'email'、値として＄Email
  $data = array(':email' => $email);
  $stmt = queryPost($dbh, $sql, $data);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  debug('クエリ結果の中身：'.print_r($result,true));
  if(!empty($result) && password_verify($pass, array_shift($result))){
    debug('パスワードがマッチしました');
    //array_shifthaは、配列のうち１番最初のキーと値をとるもの。今までid,passwordの順だったから、idと$passwordを比較していた。

    $sesLimit = 60 * 60;
    $_SESSION['login_date'] = time();
    $_SESSION['user_id'] = $result['id'];
    debug('セッション変数の中身：'.print_r($_SESSION,true));
    debug('マイページへ遷移しますlogin');
    header("Location: mypage.php");

  }else{
    debug('パスワードが一致しません。');
    $err_msg['common'] = MSG09;
  }

}catch(Exception $e){
  error_log('エラー発生：'.$e->getMessage());
  $err_msg['common'] = MSG07;
}
}
}
 ?>

 <!DOCTYPE html>
    <html lang="ja">
        <head meta charset="utf-8">
            <title>ログインページ</title>
            <link rel="stylesheet" type="text/css" href="../style.css">
            <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        </head>

    <body class="page-login page-1colum">
      <?php require('header.php'); ?>

      <div id="contents" class="site-width student-background">
          <!--メインコンテンツ-->
          <section id="main">
              <div class="form-container">
                  <!--フォームを構成する要素input要素とかは、フォーム要素の中に入れる-->
                  <form action="" method="post" class="student-form">
                      <h2 class="title"><span class="marker">&ensp;ログイン&ensp;</span></h2>
                      <!--エラーメッセージを提示するところでは、divでclass属性を指定しておく-->
                      <div class="area-msg">
                        <?php
                        if(!empty($err_msg['common'])) echo $err_msg['common'];
                        ?>
                      </div>
                      <!--class属性errのものについて、cssを設定するためのhtml-->
                      <label class="<?php if(!empty($err_msg['email'])) echo 'err'; ?> form-label">
                          メールアドレス
                          <input type="text" name="email" value="<?php if(!empty($_POST['email'])) echo $_POST['email']; ?>">
                      </label>
                      <div class="area-msg">
                        <!--エラーメッセージを表示させる-->
                        <?php
                        if(!empty($err_msg['email'])) echo $err_msg['email'];
                        ?>
                      </div>

                      <label class="<?php if(!empty($err_msg['pass'])) echo 'err'; ?> form-label">
                          パスワード
                          <input type="password" name="pass" value="<?php if(!empty($_POST['pass'])) echo $_POST['pass']; ?>">
                      </label>
                      <div class="area-msg">
                        <?php
                        if(!empty($err_msg['pass'])) echo $err_msg['pass'];
                        ?>
                      </div>
                      <label class="login-include checkbox">
                          <input type="checkbox" name="pass-save">次回ログインを省略する
                      </label>
                      <div class="btn-container">
                          <input type="submit" class="mid-btn login-btn" value="ログイン">
                      </div>
                      <div class="btn-container">
                          <input type="button" class="mid-btn register-btn" value="新規登録" onclick="location.href='register.php'">
                      </div>
                      <label class="login-include">
                          パスワードを忘れた方は<a href="pass.php">コチラ！</a>
                      </label>
                  </form>
          </section>
      </body>
    </html>
