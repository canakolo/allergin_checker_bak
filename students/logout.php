<?php
require('../function.php');
debug('「「「「「「「「「「「「「「「「「「「「「「「「「');
debug('「「「「「「「「「「「「「「「「「「「「ログアウト画面');
debug('「「「「「「「「「「「「「「「「「「「「「「「「「');
debugLogStart();
debug('ログアウトします。');
debugLogStart();

session_destroy();
debug('ログアウトが完了しました');
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset= utf-8>
        <title>ログアウト完了</title>
        <link rel="stylesheet" type="text/css" href="../style.css">
        <link 'http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    </head>

    <body>
        <div class="site-width normal-background">
            <h2>ログアウトが完了しました。</h2>
            <label>
                <div class="btn-container">
                    <input type="button" class="mid-btn top-btn"  value="TOPへ戻る" onclick="location.href='../index.php'">
                </div>
            </lavel>
        </div>
    </body>
</html>
