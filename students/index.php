<?php
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
            <title>トップページ</title>
            <link rel="stylesheet" type="text/css" href="style.css">
            <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        </head>

        <body>
            <div class="site-width">
                <h1>給食アレルギーのある日をお知らせします</h1>
                <nav id="top-nav">
                    <ul>
                        <li><a href="login.php">生徒はこちら！</a></li>
                        <li><a href="../teachers/login.php">給食の先生はこちら！</a></li>
                    </ul>
                </nav>
            </div>

        </body>
     </html>
