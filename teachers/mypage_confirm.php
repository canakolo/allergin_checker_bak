<?php
    require('../function.php');
    debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
    debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「献立登録確認ページ');
    debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
    var_dump($_POST['menu1_allergin1']);
    var_dump($dbFoodInfo['id']);
    if(!empty($_POST['register'])){

        if(!empty($_POST['menu1'])){
            $surve_date1 = $_POST['surve_date1'];
            $menu1 = $_POST['menu1'];
            $menu1_allergin1 = $_POST['menu1_allergin1'];
            $menu1_allergin2 = $_POST['menu1_allergin2'];
            $menu1_allergin3 = $_POST['menu1_allergin3'];
            $menu1_allergin4 = $_POST['menu1_allergin4'];
            $menu1_allergin5 = $_POST['menu1_allergin5'];

            validRequired($surve_date1, 'surve_date1');
            validRequired($menu1, 'menu1');

            if(empty($err_msg)){
             debug('バリデーションOKです');
             try{
                $dbh = dbConnect();
                $sql = 'INSERT into menu1 (surve_date1, menu1, menu1_allergin1, menu1_allergin2, menu1_allergin3, menu1_allergin4, menu1_allergin5) VALUES (:surve_date1, :menu1, :menu1_allergin1, :menu1_allergin2, :menu1_allergin3, :menu1_allergin4, :menu1_allergin5)';
                $data = array(':surve_date1' => $surve_date1, ':menu1' => $menu1, ':menu1_allergin1' => $menu1_allergin1, ':menu1_allergin2' => $menu1_allergin2, ':menu1_allergin3' => $menu1_allergin3, ':menu1_allergin4' => $menu1_allergin4, ':menu1_allergin5' => $menu1_allergin5);
                $stmt = queryPost($dbh, $sql, $data);

                if($stmt){
                  debug('DBに登録できました');
                  debug('登録完了画面へ遷移します');
                  header("location: mypage_complete.php");
                }else{
                  debug('DBに登録できませんでした');
                }
            }catch (Exception $e){
                error_log('エラー発生：'.$e->getMessage());
                $err_msg['common'] = MSG07;
                }
            }
        }
    }
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
        <section id="main">
            <div id="contents" class="site-width normal-background">
                <form action="" method="post" class="form">
                    <label class="">
                        入力した内容を確認し、登録してください。
                        <br />
                        <input type="textarea" name="surve_date1" value="<?php if(!empty($_POST['surve_date1'])) echo $_POST['surve_date1']; ?>">
                    </label>
                    <div class="area-msg">
                    </div>

                    <div class="menu1">
                        <label class="">
                            献立１の名前
                            <input type="text" name="menu1" value="<?php if(!empty($_POST['menu1'])) echo $_POST['menu1']; ?>">
                            </br>
                        </label>

                        <label>
                            アレルギー成分１：
                            <input type="text" name="menu1_allergin1">
                            </br>
                        </label>

                        <label>
                            アレルギー成分２：
                            <input type="text" name="menu1_allergin2" value="<?php if(!empty($_POST['menu1_allergin2'])) echo $_POST['menu1_allergin2']; ?>">
                            </br>
                        </label>

                        <label>
                            アレルギー成分３：
                            <input type="text" name="menu1_allergin3" value="<?php if(!empty($_POST['menu1_allergin3'])) echo $_POST['menu1_allergin3']; ?>">
                            </br>
                        </label>

                        <label>
                            アレルギー成分４：
                            <input type="text" name="menu1_allergin4" value="<?php if(!empty($_POST['menu1_allergin4'])) echo $_POST['menu1_allergin4']; ?>">
                            </br>
                        </label>

                        <label>
                            アレルギー成分５：
                            <input type="text" name="menu1_allergin5" value="<?php if(!empty($_POST['menu1_allergin5'])) echo $_POST['menu1_allergin5']; ?>">
                            </br>
                        </label>
                    </div>

                    <div class="btn-container">
                        <input type="submit" name="register" class="btn btn-mid" value="登録する">
                    </div>
                    <div class="btn-container">
                        <input type="button" onclick="history.back()" value="戻る">
                    </div>
                </form>
            </div>
        </section>
    </body>
</html>
