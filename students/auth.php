<?php
//ログイン認証と自動ログアウト機能
//login_dateがある場合、ログインしたことがあるユーザーである。そうじゃなかったら、未ログインユーザーだから、ログインページに遷移する。
//login_dateがあるユーザーのうち、①ログイン日時と有効期限を超えていた場合、セッションを削除して、ログインページへ遷移する。
//②ログイン日時と有効期限を超えていなかった場合、ログイン日時を更新し、マイページへ遷移させる

if(!empty($_SESSION['login_date'])){
  debug('ログイン済みユーザーです。');

if(($_SESSION['login_date'] + $_SESSION['login_limit']) < time()){
  debug('ログイン有効期限オーバーです。');
  session_destroy();
  //toppageでlogin.phpに遷移させているので、この処理と合わせて無限ループになってしまう。別のページを噛ませる？
  //header("Location: login.php");
}else{
  debug('ログイン有効期限内です。');
  $_SESSION['login_date'] === time();


  if(basename($_SERVER['PHP_SELF']) === 'login.php'){
  debug('マイページへ遷移します。auth');
  header("Location: mypage.php");
}
}


}else{
  debug('未ログインユーザーです。');
  //header("Location: login.php");
}
debug('画面表示処理終了 <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<');
