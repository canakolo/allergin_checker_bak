<?php
    require('../function.php');
    debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「');
    debug('検索画面「「「「「「「「「「「「「「「「「「「「「「「');
    debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「');

    debugLogStart();

 //$dbMenuList =getMenuList();
//foreach($dbMenuList as $key => $val);

 //if(!empty($_POST['month'])){
   //$month = $_POST['month'];

 //}
//  $dbMenuList =getMenuList();
  //foreach($dbMenuList as $key => $val){
  //echo $dbMenuList[0]['surve_date'];
  //echo $dbMenuList[0]['menu1'];

  //}



  //if($_SESSION['user_id'] = );
 //if($dbMenuList['food1'] =$dbMenuList['menu1_allergin1']){
  //  echo $dbMenuList['surve_date'];
    //echo $dbMenuList['menu1'];
  //}
//特定のユーザーと紐づいて引っ張れていない

//アレルギー食品が１つならこれで取り出せた
//function getAllerginMenu(){
  //debug('ユーザーが食べられない給食メニューと出される日を取得します。');
  //$userAllerginFood = getAllerginFood();
  //try{
  //$dbh = dbConnect();
  //$sql = 'SELECT surve_date, menu1, menu1_allergin1 from menu where menu1_allergin1 = :menu1_allergin1';
  //$data = array(':menu1_allergin1' => $userAllerginFood);
  //$stmt = queryPost($dbh, $sql, $data);
  //$result = $stmt->fetch(PDO::FETCH_ASSOC);
  //return $result;
  //debug(print_r($result, true));
//}catch (Exception $e){
  //error_log('エラー表示：'.$e->getMessage());
  //debug('データベースに接続できませんでした');
//}
//}

//function getAllerginFood(){
  //debug('給食のアレルギー成分を取得します。');
  //$userId = $_SESSION['user_id'];
  //try{
    //$dbh = dbConnect();
    //$sql = 'SELECT surve_date, menu1, menu1_allergin1, menu1_allergin2, menu1_allergin3, menu1_allergin4, menu1_allergin5, id, food1 FROM menu LEFT OUTER JOIN student
    //ON menu.menu1_allergin1 = student.food1 WHERE id = :id';
    //$data = array(':id' => $userId);
    //$stmt = queryPost($dbh, $sql, $data);
    //$result= $stmt->fetchAll();
    //return $result;
    //debug('SQL文の結果表示：'.var_dump($result));
  //}catch(Exception $e){
    //error_log('エラー表示：'.$e->getMessage());
    //debug('データベースに表示できませんでした');
  //}
//}
  //$userAllerginFood = getAllerginFood();

//compared with food1
    function getAllerginFood11(){
        debug('給食のアレルギー成分を取得します①');
        $userId = $_SESSION['user_id'];
        try{
            $dbh = dbConnect();
            $sql = 'SELECT surve_date1, menu1 FROM menu1
                    WHERE EXISTS (SELECT food1 FROM student WHERE
                        id = :id AND food1 = menu1.menu1_allergin1 OR
                        id = :id AND food1 = menu1.menu1_allergin2 OR
                        id = :id AND food1 = menu1.menu1_allergin3 OR
                        id = :id AND food1 = menu1.menu1_allergin4 OR
                        id = :id AND food1 = menu1.menu1_allergin5)
                    ORDER BY surve_date1 ASC';
            $data = array(':id' => $userId);
            $stmt = queryPost($dbh, $sql, $data);
            $result = $stmt->fetchAll();
            return $result;
            debug('SQL文の結果表示：'.var_dump($result));
        }catch (Exception $e){
            error_log('エラー表示：'.$e->getMessage());
            debug('データベースに接続できませんでした');
        }
    }
    $userAllerginFood11 = getAllerginFood11();
    function getAllerginFood12(){
      debug('給食のアレルギー成分を取得します①');
      $userId = $_SESSION['user_id'];
      try{
          $dbh = dbConnect();
          $sql = 'SELECT surve_date2, menu2 FROM menu2
                  WHERE EXISTS (SELECT food1 FROM student WHERE
                      id = :id AND food1 = menu2.menu2_allergin1 OR
                      id = :id AND food1 = menu2.menu2_allergin2 OR
                      id = :id AND food1 = menu2.menu2_allergin3 OR
                      id = :id AND food1 = menu2.menu2_allergin4 OR
                      id = :id AND food1 = menu2.menu2_allergin5)
                  ORDER BY surve_date2 ASC';
          $data = array(':id' => $userId);
          $stmt = queryPost($dbh, $sql, $data);
          $result = $stmt->fetchAll();
          return $result;
          debug('SQL文の結果表示：'.var_dump($result));
      }catch (Exception $e){
          error_log('エラー表示：'.$e->getMessage());
          debug('データベースに接続できませんでした');
        }
    }
    $userAllerginFood12 = getAllerginFood12();
    function getAllerginFood13(){
      debug('給食のアレルギー成分を取得します③');
      $userId = $_SESSION['user_id'];
      try{
          $dbh = dbConnect();
          $sql = 'SELECT surve_date3, menu3 FROM menu3
                  WHERE EXISTS (SELECT food1 FROM student WHERE
                      id = :id AND food1 = menu3.menu3_allergin1 OR
                      id = :id AND food1 = menu3.menu3_allergin2 OR
                      id = :id AND food1 = menu3.menu3_allergin3 OR
                      id = :id AND food1 = menu3.menu3_allergin4 OR
                      id = :id AND food1 = menu3.menu3_allergin5)
                  ORDER BY surve_date3 ASC';
          $data = array(':id' => $userId);
          $stmt = queryPost($dbh, $sql, $data);
          $result = $stmt->fetchAll();
          return $result;
          debug('SQL文の結果表示：'.var_dump($result));
      }catch (Exception $e){
          error_log('エラー表示：'.$e->getMessage());
          debug('データベースに接続できませんでした');
        }
    }
    $userAllerginFood13 = getAllerginFood13();
    function getAllerginFood14(){
      debug('給食のアレルギー成分を取得します④');
      $userId = $_SESSION['user_id'];
      try{
          $dbh = dbConnect();
          $sql = 'SELECT surve_date4, menu4 FROM menu4
                  WHERE EXISTS (SELECT food1 FROM student WHERE
                      id = :id AND food1 = menu4.menu4_allergin1 OR
                      id = :id AND food1 = menu4.menu4_allergin2 OR
                      id = :id AND food1 = menu4.menu4_allergin3 OR
                      id = :id AND food1 = menu4.menu4_allergin4 OR
                      id = :id AND food1 = menu4.menu4_allergin5)
                  ORDER BY surve_date4 ASC';
          $data = array(':id' => $userId);
          $stmt = queryPost($dbh, $sql, $data);
          $result = $stmt->fetchAll();
          return $result;
          debug('SQL文の結果表示：'.var_dump($result));
      }catch (Exception $e){
          error_log('エラー表示：'.$e->getMessage());
          debug('データベースに接続できませんでした');
        }
    }
    $userAllerginFood14 = getAllerginFood14();
    function getAllerginFood15(){
      debug('給食のアレルギー成分を取得します５');
      $userId = $_SESSION['user_id'];
      try{
          $dbh = dbConnect();
          $sql = 'SELECT surve_date5, menu5 FROM menu5
                  WHERE EXISTS (SELECT food1 FROM student WHERE
                      id = :id AND food1 = menu5.menu5_allergin1 OR
                      id = :id AND food1 = menu5.menu5_allergin2 OR
                      id = :id AND food1 = menu5.menu5_allergin3 OR
                      id = :id AND food1 = menu5.menu5_allergin4 OR
                      id = :id AND food1 = menu5.menu5_allergin5)
                  ORDER BY surve_date5 ASC';
          $data = array(':id' => $userId);
          $stmt = queryPost($dbh, $sql, $data);
          $result = $stmt->fetchAll();
          return $result;
          debug('SQL文の結果表示：'.var_dump($result));
      }catch (Exception $e){
          error_log('エラー表示：'.$e->getMessage());
          debug('データベースに接続できませんでした');
        }
    }
    $userAllerginFood15 = getAllerginFood15();
    function getAllerginFood21(){
        debug('給食のアレルギー成分を取得します①');
        $userId = $_SESSION['user_id'];
        try{
            $dbh = dbConnect();
            $sql = 'SELECT surve_date1, menu1 FROM menu1
                    WHERE EXISTS (SELECT food2 FROM student WHERE
                        id = :id AND food2 = menu1.menu1_allergin1 OR
                        id = :id AND food2 = menu1.menu1_allergin2 OR
                        id = :id AND food2 = menu1.menu1_allergin3 OR
                        id = :id AND food2 = menu1.menu1_allergin4 OR
                        id = :id AND food2 = menu1.menu1_allergin5)';
            $data = array(':id' => $userId);
            $stmt = queryPost($dbh, $sql, $data);
            $result = $stmt->fetchAll();
            return $result;
            debug('SQL文の結果表示：'.var_dump($result));
        }catch (Exception $e){
            error_log('エラー表示：'.$e->getMessage());
            debug('データベースに接続できませんでした');
        }
    }
    $userAllerginFood21 = getAllerginFood21();
    function getAllerginFood22(){
        debug('給食のアレルギー成分を取得します①');
        $userId = $_SESSION['user_id'];
        try{
            $dbh = dbConnect();
            $sql = 'SELECT surve_date2, menu2 FROM menu2
                    WHERE EXISTS (SELECT food2 FROM student WHERE
                        id = :id AND food2 = menu2.menu2_allergin1 OR
                        id = :id AND food2 = menu2.menu2_allergin2 OR
                        id = :id AND food2 = menu2.menu2_allergin3 OR
                        id = :id AND food2 = menu2.menu2_allergin4 OR
                        id = :id AND food2 = menu2.menu2_allergin5)';
            $data = array(':id' => $userId);
            $stmt = queryPost($dbh, $sql, $data);
            $result = $stmt->fetchAll();
            return $result;
            debug('SQL文の結果表示：'.var_dump($result));
        }catch (Exception $e){
            error_log('エラー表示：'.$e->getMessage());
            debug('データベースに接続できませんでした');
        }
    }
    $userAllerginFood22 = getAllerginFood22();
    function getAllerginFood23(){
        debug('給食のアレルギー成分を取得します③');
        $userId = $_SESSION['user_id'];
        try{
            $dbh = dbConnect();
            $sql = 'SELECT surve_date3, menu3 FROM menu3
                    WHERE EXISTS (SELECT food1 FROM student WHERE
                        id = :id AND food2 = menu3.menu3_allergin1 OR
                        id = :id AND food2 = menu3.menu3_allergin2 OR
                        id = :id AND food2 = menu3.menu3_allergin3 OR
                        id = :id AND food2 = menu3.menu3_allergin4 OR
                        id = :id AND food2 = menu3.menu3_allergin5)';
            $data = array(':id' => $userId);
            $stmt = queryPost($dbh, $sql, $data);
            $result = $stmt->fetchAll();
            return $result;
            debug('SQL文の結果表示：'.var_dump($result));
        }catch (Exception $e){
            error_log('エラー表示：'.$e->getMessage());
            debug('データベースに接続できませんでした');
        }
    }
    $userAllerginFood23 = getAllerginFood23();
    function getAllerginFood24(){
        debug('給食のアレルギー成分を取得します④');
        $userId = $_SESSION['user_id'];
        try{
            $dbh = dbConnect();
            $sql = 'SELECT surve_date4, menu4 FROM menu4
                    WHERE EXISTS (SELECT food2 FROM student WHERE
                        id = :id AND food2 = menu4.menu4_allergin1 OR
                        id = :id AND food2 = menu4.menu4_allergin2 OR
                        id = :id AND food2 = menu4.menu4_allergin3 OR
                        id = :id AND food2 = menu4.menu4_allergin4 OR
                        id = :id AND food2 = menu4.menu4_allergin5)';
            $data = array(':id' => $userId);
            $stmt = queryPost($dbh, $sql, $data);
            $result = $stmt->fetchAll();
            return $result;
            debug('SQL文の結果表示：'.var_dump($result));
        }catch (Exception $e){
            error_log('エラー表示：'.$e->getMessage());
            debug('データベースに接続できませんでした');
        }
    }
    $userAllerginFood24 = getAllerginFood24();
    function getAllerginFood25(){
        debug('給食のアレルギー成分を取得します５');
        $userId = $_SESSION['user_id'];
        try{
            $dbh = dbConnect();
            $sql = 'SELECT surve_date5, menu5 FROM menu5
                    WHERE EXISTS (SELECT food1 FROM student WHERE
                        id = :id AND food2 = menu5.menu5_allergin1 OR
                        id = :id AND food2 = menu5.menu5_allergin2 OR
                        id = :id AND food2 = menu5.menu5_allergin3 OR
                        id = :id AND food2 = menu5.menu5_allergin4 OR
                        id = :id AND food2 = menu5.menu5_allergin5)';
            $data = array(':id' => $userId);
            $stmt = queryPost($dbh, $sql, $data);
            $result = $stmt->fetchAll();
            return $result;
            debug('SQL文の結果表示：'.var_dump($result));
        }catch (Exception $e){
            error_log('エラー表示：'.$e->getMessage());
            debug('データベースに接続できませんでした');
        }
    }
    $userAllerginFood25 = getAllerginFood25();
?>

<!DOCTYPE html>
    <html lang="ja">
        <head>
            <meta charset="utf-8">
            <title>検索画面</title>
            <link rel="stylesheet" type="text/css" href="../style.css">
            <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        </head>
    </html>

    <body>
    <?php require('header.php'); ?>
        <main class="site-width normal-background">
            <form action="" method="post" class="ngfood-form">
                <div class="month-select">
                    <label class="month-check">
                        <!--<select name="month" value="">-->
                        <select>
                            <option value="0" selected>選択してください</option>
                            <?php $month = array(1,2,3,4,5,6,7,8,9,10,11,12);
                            foreach ($month as $key){ ;?>
                            <option value="month"><?php echo $key; ?></option>
                            <?php
                                };
                            ?>
                        </select>
                        月分の食べられないメニューを確認します。
                    </label>
                </div>
                <div class="btn-container">
                    <input type="submit" name="check" value="チェック" class="mid-btn check-btn">
                </div>
            </form>
            <div class="show-result">
                <div class="show_result1">
                  <div class="show_result11">
                    <?php
                    if(!empty($_POST['check'])){
                    foreach ($userAllerginFood11 as $key=> $val){
                    $surve_date1 = $val['surve_date1'];
                    $menu1 =$val['menu1'];
                    ?>
                    <table class="table_menu">
                        <td><?php echo date('Y年n月j日', strtotime($surve_date1)); ?></td>
                        <td><?php echo $menu1; ?></td>
                        <?php
                                };
                            };
                        ?>
                    </table>
                  </div>
                  <div class="show_result12">
                    <?php
                        if(!empty($_POST['check'])){
                        foreach ($userAllerginFood12 as $key=> $val){
                        $surve_date2 = $val['surve_date2'];
                        $menu2 =$val['menu2'];
                    ?>
                    <table class="table_menu">
                        <td><?php echo date('Y年n月j日', strtotime($surve_date2)); ?></td>
                        <td><?php echo $menu2; ?></td>
                        <?php
                              };
                          };
                        ?>
                    </table>
                  </div>

                  <div class="show_result13">
                    <?php
                    if(!empty($_POST['check'])){
                    foreach ($userAllerginFood13 as $key=> $val){
                    $surve_date3 = $val['surve_date3'];
                    $menu3 =$val['menu3'];
                    ?>
                    <table class="table_menu">
                        <td><?php echo date('Y年n月j日', strtotime($surve_date3)); ?></td>
                        <td><?php echo $menu3; ?></td>
                        <?php
                                };
                            };
                        ?>
                    </table>
                  </div>

                  <div class="show_result14">
                    <?php
                        if(!empty($_POST['check'])){
                        foreach ($userAllerginFood14 as $key=> $val){
                        $surve_date4 = $val['surve_date4'];
                        $menu4 =$val['menu4'];
                    ?>
                    <table class="table_menu">
                        <td><?php echo date('Y年n月j日', strtotime($surve_date4)); ?></td>
                        <td><?php echo $menu4; ?></td>
                        <?php
                                };
                            };
                        ?>
                    </table>
                </div>
                <div class="show_result15">
                    <?php
                        if(!empty($_POST['check'])){
                        foreach ($userAllerginFood15 as $key=> $val){
                        $surve_date5 = $val['surve_date5'];
                        $menu5 =$val['menu5'];
                    ?>
                    <table class="table_menu">
                        <td><?php echo date('Y年n月j日', strtotime($surve_date5)); ?></td>
                        <td><?php echo $menu5; ?></td>
                        <?php
                                };
                            };
                        ?>
                    </table>
                </div>
            </div>

            <div class="show_result2">
              <div class="show_result21">
                <?php
                    if(!empty($_POST['check'])){
                    foreach ($userAllerginFood21 as $key=> $val){
                    $surve_date1 = $val['surve_date1'];
                    $menu1 =$val['menu1'];
                ?>
                <table class="table_menu">
                    <td><?php echo $surve_date1; ?></td>
                    <td><?php echo $menu1; ?></td>
                    <?php
                            };
                        };
                    ?>
                </table>
            </div>

            <div class="show_result22">
                <?php
                    if(!empty($_POST['check'])){
                    foreach ($userAllerginFood22 as $key=> $val){
                    $surve_date2 = $val['surve_date2'];
                    $menu2 =$val['menu2'];
                ?>
                <table class="table_menu">
                    <td><?php echo $surve_date2; ?></td>
                    <td><?php echo $menu2; ?></td>
                    <?php
                            };
                        };
                    ?>
                </table>
            </div>

            <div class="show_result23">
                <?php
                    if(!empty($_POST['check'])){
                    foreach ($userAllerginFood23 as $key=> $val){
                    $surve_date3 = $val['surve_date3'];
                    $menu3 =$val['menu3'];
                ?>
                <table class="table_menu">
                    <td><?php echo $surve_date3; ?></td>
                    <td><?php echo $menu3; ?></td>
                    <?php
                            };
                        ;}
                    ?>
                </table>
            </div>

            <div class="show_result24">
                <?php
                    if(!empty($_POST['check'])){
                    foreach ($userAllerginFood24 as $key=> $val){
                    $surve_date4 = $val['surve_date4'];
                    $menu4 =$val['menu4'];
                ?>
                <table class="table_menu">
                    <td><?php echo $surve_date4; ?></td>
                    <td><?php echo $menu4; ?></td>
                    <?php
                            };
                        };
                    ?>
                </table>
            </div>
            <div class="show_result25">
                <?php
                    if(!empty($_POST['check'])){
                    foreach ($userAllerginFood25 as $key=> $val){
                    $surve_date5 = $val['surve_date5'];
                    $menu5 =$val['menu5'];
                ?>
                <table class="table_menu">
                    <td><?php echo $surve_date5; ?></td>
                    <td><?php echo $menu5; ?></td>
                    <?php
                            };
                        };
                    ?>
                </table>
            </div>
        </div>
    </div>
 </main>
</body>
