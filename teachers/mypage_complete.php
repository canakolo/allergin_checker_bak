<?php
    require('../function.php');

    debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
    debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「献立登録完了ページ');
    debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset= utf-8>
        <title>献立登録確認</title>
        <link rel="stylesheet" type="text/css" href="../style.css">
        <link 'http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    </head>

    <body>
        <?php require('header.php'); ?>
        <div class="site-width normal-background">
            <div class="complete-msg ">
                <h2><span class="marker">献立の登録が完了しました。</span></h2>
                <p>献立の登録を続けますか。</p>
                <div class="btn-container">
                    <input type="button" class="mid-btn continue-btn" value="はい" onclick="location.href='mypage.php'">
                    <input type="button" class="mid-btn exit-btn" name="exit" value="いいえ" onclick="location.href='logout.php'">
                </div>
            </div>
        </div>
    </body>
</html>
