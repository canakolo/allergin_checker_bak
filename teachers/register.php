<?php
    require('../function.php');
    debug('「「「「「「「「「「「「「「「「「「「「「「「');
    debug('「「「「「「「「「「「「「「ユーザー登録ページ');
    debug('「「「「「「「「「「「「「「「「「「「「「「「');

    //①POST情報があったら、ヴァリデーションチェックをする
    //②パスワードとパスワード（再）が一致しているかチェックする
    //③DBに登録する
    //④クエリが成功したら、セッションタイムを伸ばして、IDを格納する

    if(!empty($_POST)){
        $name = $_POST['name'];
        $pass = $_POST['pass'];
        $pass_re = $_POST['pass_re'];

        validRequired($name, 'name');
        validRequired($pass, 'pass');
        validRequired($pass_re, 'pass_re');

        if(empty($err_msg)){
            validMaxLen($name, 'name');
            //validNameDup($name);

            validHalf($pass, 'pass');
            validMinLen($pass,'pass');
            validMaxLen($pass, 'pass');

            validMinLen($pass_re, 'pass_re');
            validMaxLen($pass_re, 'pass_re');

            if(empty($err_msg)){
                validMatch($pass, $pass_re, 'pass_re');

                if(empty($err_msg)){
                    try{
                        $dbh = dbConnect();
                        $sql = 'INSERT into teacher (name, password,login_time, create_date) VALUES (:name, :pass, :login_time, :create_date)';
                        $data = array(':name'=>$name, ':pass'=>password_hash($pass,PASSWORD_DEFAULT),':login_time'=>date('Y-m-d H:i:s'), ':create_date'=>date('Y-m-d H:i:s'));
                        $stmt = queryPost($dbh, $sql, $data);

                        if($stmt){
                            $sesLimit = 60*60;
                            $_SESSION['login_date'] = time();
                            $_SESSION['login_limit'] = $sesLimit;
                            $_SESSION['user_id'] = $dbh->lastInsertId();
                            debug('DBに登録できたよ');
                            debug('セッション変数の中身：'.print_r($_SESSION, true));
                            header("Location: mypage.php");
                            }else{
                                error_log('DBに登録できなかったよ');
                                $err_msg['common'] = MSG07;
                            }

                        }catch(Exception $e){
                            error_log('エラー発生：'.$e->getMessage());
                            $err_msg['common'] = MSG07;
                        }
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="ja">
    <head meta charset="utf-8">
      <title>ユーザー登録</title>
      <link rel="stylesheet" type="text/css" href="../style.css">
      <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    </head>

    <body class="page user-register page-1colum">
        <?php require('header.php'); ?>
        <div id="contents" class="site-width teacher-background">
            <section id="main">
                <div class="form-container">
                    <form action="" method="post" class="teacher-form">
                        <h2 class="title"><span class="marker">&ensp;ユーザー登録&ensp;</span></h2>
                        <div class="area-msg">
                          <?php
                           if(!empty($err_msg['common'])) echo $err_msg['common'];
                           ?>
                        </div>

                        <label class="<?php if(!empty($err_msg['name'])) echo 'err';?> form-label">
                            名前
                           <input type="text" name="name" value="<?php if(!empty($_POST['name'])) echo $_POST['name']; ?>">
                        </label>
                        <div class="area-msg">
                           <?php
                            if(!empty($err_msg['name'])) echo $err_msg['name'];
                            ?>
                        </div>

                        <label class="<?php if(!empty($err_msg['pass'])) echo 'err'; ?> form-label">
                          パスワード　<span style="font-size:12px">英数字６文字以上</span>
                          <input type="password" name="pass" value="<?php if(!empty($_POST['pass'])) echo $_POST['pass']; ?>">
                        </label>
                        <div class="area-msg">
                            <?php
                             if(!empty($err_msg['pass'])) echo $err_msg['pass'];
                            ?>
                        </div>
                        <label class="<?php if(!empty($err_msg['pass_re'])) echo 'err'; ?> form-label">
                            パスワード（再入力）
                            <input type="password" name="pass_re" value="<?php if(!empty($_POST['pass_re'])) echo $_POST['pass_re']; ?>">
                        </label>
                        <div class="area-msg">
                            <?php if(!empty($err_msg['pass_re'])) echo $err_msg['pass_re']; ?>
                        </div>
                        <div class="btn-container">
                            <input type="submit" class="mid-btn register-btn" value="登録">
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </body>
</html>
