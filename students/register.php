<?php
    require('../function.php');
    debug('「「「「「「「「「「「「「「「「「「「「「「「');
    debug('「「「「「「「「「「「「「「ユーザー登録ページ');
    debug('「「「「「「「「「「「「「「「「「「「「「「「');

    debugLogStart();
    //①POST情報があったら、ヴァリデーションチェックをする
    //②パスワードとパスワード（再）が一致しているかチェックする
    //③DBに登録する
    //④クエリが成功したら、セッションタイムを伸ばして、IDを格納する

    $dbFoodname = getFoodname();
    debug('DBから食アレカテゴリーを入手：'.print_r($dbFoodname, true));

    if(!empty($_POST)){
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $pass_re = $_POST['pass_re'];
        $food1 = $_POST['food1'];
        $food2 = $_POST['food2'];
        $food3 = $_POST['food3'];
        $food4 = $_POST['food4'];
        $food5 = $_POST['food5'];

        validRequired($email, 'email');
        validRequired($pass, 'pass');
        validRequired($pass_re, 'pass_re');

            if(empty($err_msg)){
            validEmail($email, 'email');
            validMaxLen($email, 'email');
            validEmailDup($email);

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
                        $sql = 'INSERT into student (email, password, food1, food2, food3, food4, food5, login_time, create_date) VALUES (:email, :pass, :food1, :food2, :food3, :food4, :food5, :login_time, :create_date)';
                        $data = array(':email'=>$email, ':pass'=>password_hash($pass,PASSWORD_DEFAULT), ':food1' => $food1, ':food2' => $food2, ':food3' => $food3, ':food4' => $food4, ':food5' => $food5, ':login_time'=>date('Y-m-d H:i:s'), ':create_date'=>date('Y-m-d H:i:s'));
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
        <header>
            <div class="site-width">
                <nav class="top-nav">
                    <ul>
                        <li><a href="../index.php">トップ</a></li>
                        <li><a href="user-register.php">ユーザー登録</li>
                        <li><a href="">ログイン</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <body class="page user-register page-1colum">
        <?php //require('header.php'); //?>
            <div id="contents" class="site-width student-background">
                <section id="main">
                    <div class="form-container">
                        <form action="" method="post" class="student-form">
                            <h2 class="title"><span class="marker">&ensp;ユーザー登録&ensp;</span></h2>
                            <div class="area-msg">
                                <?php
                                if(!empty($err_msg['common'])) echo $err_msg['common'];
                                ?>
                            </div>

                            <label class="<?php if(!empty($err_msg['email'])) echo $err['email'];?> form-label">
                                メールアドレス
                                <input type="text" name="email" value="<?php if(!empty($_POST['email'])) echo $_POST['email']; ?>">
                            </label>
                            <div class="area-msg">
                                <?php
                                if(!empty($err_msg['email'])) echo $err_msg['email'];
                                ?>
                            </div>

                            <label class="<?php if(!empty($err_msg['pass'])) echo 'err'; ?> form-label">
                                パスワード<span style="font-size:12px">英数字６文字以上</span>
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

                            <label class="<?php if(!empty($err_msg['food1'])) echo 'err'; ?> ng-food">
                                食べられないもの１
                                <select name="food1" class="select-food">
                                    <option value="0" selected>選択してください </option>
                                    <?php foreach ($dbFoodname as $key => $val){ ;?>
                                    <option value="<?php echo $val['food_id']; ?>"> <?php echo $val['food_name']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </label>
                            <br>

                            <label class="<?php if(!empty($err_msg['food2'])) echo 'err'; ?> ng-food">
                                食べられないもの２
                                <select name="food2" class="select-food">
                                    <option value="0" selected>選択してください</option>
                                    <?php foreach ($dbFoodname as $key => $val) { ;?>
                                    <option value="<?php echo $val['food_id']; ?>"><?php echo $val['food_name']; ?></option>　　
                                    <?php
                                    };
                                    ?>
                                </select>
                            </label>
                            <br>

                            <label class="<?php if(!empty($err_msg['food3'])) echo 'err'; ?> ng-food">
                                食べられないもの３
                                <select name="food3" class="select-food">
                                    <option value="0" selected>選択してください</option>
                                    <?php foreach($dbFoodname as $key=> $val){ ;?>
                                    <option value="<?php echo $val['food_id']; ?>"><?php echo $val['food_name']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </label>
                            <br>
                            <label class="<?php if(!empty($err_msg['food4'])) echo 'err'; ?> ng-food">
                                食べられないもの４
                                <select name="food4" class="select-food">
                                    <option value="0" selected>選択してください</option>
                                    <?php foreach($dbFoodname as $key=> $val){ ;?>
                                    <option value="<?php echo $val['food_id']; ?>"><?php echo $val['food_name']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </label>
                            <br>
                            <label class="<?php if(!empty($err_msg['food5'])) echo 'err'; ?> ng-food">
                            食べられないもの５
                            <select name="food5" class="select-food">
                                <option value="0" selected>選択してください</option>
                                <?php foreach($dbFoodname as $key=> $val){ ;?>
                                <option value="<?php echo $val['food_id']; ?>"><?php echo $val['food_name']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            </label>
                            <br>
                            <div class="btn-container">
                                <input type="submit" class="mid-btn register-btn" value="登録">
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </body>
    </html>
