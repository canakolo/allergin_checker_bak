<?php
ini_set('log_erros','on');
ini_set('error_log','php.log');

 require('function.php');
 debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
 debug('トップページ「「「「「「「「「「「「「「「「「「「「「「「「「「');
 debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
 debugLogStart();
 ?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>トップページ</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    </head>

    <body>
        <div class="site-width normal-background">
            <h1 class="title"><span class="marker">&ensp;NG FOOD CHECKER&ensp;</span></h1>
            <img src="image/hungry.jpg" class="top-img">
            <ul class="enter-list">
                <li>お子様・保護者の方は<a href="students/login.php">こちら</a>をクリック</li>
                <li>給食の先生は<a href="teachers/login.php">こちら</a>をクリック</li>
            </ul>
            </div>
        </div>
    </body>
</html>
