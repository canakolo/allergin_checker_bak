<?php
    require('../function.php');
    debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
    debug('献立入力ページ「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
    debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
    $dbFoodInfo = getFoodInfo();
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset= "utf-8">
        <title>献立入力</title>
        <link rel="stylesheet" type="text/css" href="../style.css">
        <link 'http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    </head>

    <body>
        <?php require('header.php'); ?>
        <section id="main">
            <div id="contents" class="site-width normal-background">
                <form action="mypage_confirm.php" method="post" class="menu-form">
                    <div class="surve-schedule">
                        <label class="<?php if(!empty($err_msg['surve_month'])) echo 'err'; ?>">
                            献立を提供する月を選択してください。
                            <select>
                                <option value="0" selected>選択してください</option>
                                <?php $month = array(1,2,3,4,5,6,7,8,9,10,11,12);
                                    foreach ($month as $key){ ;?>
                                <option value="surve_month"><?php echo $key."月"; ?></option>
                                <?php
                                    };
                                ?>
                            </select>
                        </label>
                        <br />
                        <label class="<?php if(!empty($err_msg['surve_date1'])) echo 'err'; ?> ">
                            献立を提供する日を入力してください。
                            <input type="date" name="surve_date1" value="<?php if(!empty($_POST['surve_date1'])) echo $_POST['surve_date1']; ?>">
                        </label>
                    </div>
                    <div class="area-msg">
                        <?php
                            if(!empty($err_msg['surve_date1'])) echo $err_msg['surve_date1'];
                        ?>
                    </div>

                    <div class="menu-wrap">
                        <div class="menu-name">
                            <label class="<?php if(!empty($err_msg['menu1'])) echo 'err'; ?>">
                                献立１の名前
                                <input type="text" name="menu1" value="<?php if(!empty($_POST['menu1'])) echo $_POST['menu1']; ?>">
                                </br>
                            </label>
                        </div>
                        <div class="allergin-select">
                            <label>
                                アレルギー成分１：
                                <select name="menu1_allergin1[]">
                                    <option value="0" selected>選択してください</option>
                                    <?php foreach ($dbFoodInfo as $key => $val) { ;?>
                                        <option value="<?php echo $; ?>"><?php echo $val['food_name']; ?></option>
                                    <?php
                                        };
                                    ?>
                                </select>
                                </br>
                            </label>
                            <label>
                                アレルギー成分２：
                                <select name="menu1_allergin2">
                                    <option value="0" selected>選択してください</option>
                                    <?php foreach($dbFoodInfo as $key => $val){ ;?>
                                        <option value="<?php echo $val['food_id'];?>"><?php echo $val['food_name']; ?></option>
                                    <?php
                                        };
                                    ?>
                                </select>
                                </br>
                            </label>

                            <label>
                                アレルギー成分３：
                                <select name="menu1_allergin3">
                                    <option value="0" selected>選択してください</option>
                                    <?php foreach($dbFoodInfo as $key => $val){ ;?>
                                        <option value="<?php echo $val['food_id']; ?>"><?php echo $val['food_name']; ?></option>
                                        <?php
                                            };
                                         ?>
                                </select>
                                </br>
                            </label>

                            <label>
                                アレルギー成分４：
                                <select name="menu1_allergin4">
                                    <option value="0" selected>選択してください</option>
                                    <?php foreach($dbFoodInfo as $key => $val){ ;?>
                                    <option value="<?php echo $val['food_id']; ?>"><?php echo $val['food_name']; ?></option>
                                    <?php
                                        };
                                    ?>
                                </select>
                                </br>
                            </label>

                            <label>
                                アレルギー成分５：
                                <select name="menu1_allergin5">
                                    <option value="0" selected>選択してください</option>
                                    <?php foreach($dbFoodInfo as $key => $val){ ;?>
                                    <option value="<?php echo $val['food_id']; ?>"><?php echo $val['food_name']; ?></option>
                                    <?php
                                        };
                                    ?>
                                </select>
                                </br>
                            </label>
                        </div>
                    </div>

                    </br>
                    <div class="menu-wrap">
                        <div class="menu-name">
                            <label class="<?php if(!empty($err_msg['menu2'])) echo 'err'; ?> menu-name">
                                献立２の名前
                                <input type="text" name="menu2" value="<?php if(!empty($_POST['menu2'])) echo $_POST['menu2']; ?>">
                                </br>
                            </label>
                        </div>
                        <div class="allergin-select">
                            <label>
                                アレルギー成分１：
                                <select name="menu2_allergin1">
                                    <option value="0" selected>選択してください</option>
                                    <?php foreach ($dbFoodInfo as $key => $val) { ;?>
                                    <option value="<?php echo $val['food_id']; ?>"><?php echo $val['food_name']; ?></option>
                                    <?php
                                        };
                                    ?>
                                </select>
                                </br>
                            </label>

                            <label>
                                アレルギー成分２：
                                <select name="menu2_allergin2">
                                    <option value="0" selected>選択してください</option>
                                    <?php foreach($dbFoodInfo as $key => $val){ ;?>
                                    <option value="<?php echo $val['food_id']; ?>"><?php echo $val['food_name']; ?></option>
                                    <?php
                                        };
                                    ?>
                                </select>
                                </br>
                            </label>

                            <label>
                                アレルギー成分３：
                                <select name="menu2_allergin3">
                                    <option value="0" selected>選択してください</option>
                                    <?php foreach($dbFoodInfo as $key => $val){ ;?>
                                    <option value="<?php echo $val['food_id']; ?>"><?php echo $val['food_name']; ?></option>
                                    <?php
                                        };
                                    ?>
                                </select>
                                </br>
                            </label>

                            <label>
                                アレルギー成分４：
                                <select name="menu2_allergin4">
                                    <option value="0" selected>選択してください</option>
                                    <?php foreach($dbFoodInfo as $key => $val){ ;?>
                                    <option value="<?php echo $val['food_id']; ?>"><?php echo $val['food_name']; ?></option>
                                    <?php
                                        };
                                    ?>
                                </select>
                                </br>
                            </label>

                            <label>
                                アレルギー成分５：
                                <select name="menu2_allergin5">
                                    <option value="0" selected>選択してください</option>
                                    <?php foreach($dbFoodInfo as $key => $val){ ;?>
                                    <option value="<?php echo $val['food_id']; ?>"><?php echo $val['food_name']; ?></option>
                                    <?php
                                        };
                                    ?>
                                </select>
                                </br>
                            </label>
                        </div>
                    </div>
                    </br>
                    <div class="menu-wrap">
                        <div class="menu-name">
                            <label class="<?php if(!empty($err_msg['menu3'])) echo 'err'; ?> menu-name">
                                献立３の名前
                                <input type="text" name="menu3" value="<?php if(!empty($_POST['menu3'])) echo $_POST['menu3']; ?>">
                                </br>
                            </label>
                        </div>
                        <div class="allergin-select">
                            <label>
                                アレルギー成分１：
                                <select name="menu3_allergin1">
                                    <option value="0" selected>選択してください</option>
                                    <?php foreach ($dbFoodInfo as $key => $val) { ;?>
                                    <option value="<?php echo $val['food_id']; ?>"><?php echo $val['food_name']; ?></option>
                                    <?php
                                        };
                                    ?>
                                </select>
                                </br>
                            </label>

                            <label>
                                アレルギー成分２：
                                <select name="menu3_allergin2">
                                    <option value="0" selected>選択してください</option>
                                    <?php foreach($dbFoodInfo as $key => $val){ ;?>
                                    <option value="<?php echo $val['food_id']; ?>"><?php echo $val['food_name']; ?></option>
                                    <?php
                                        };
                                    ?>
                                </select>
                                </br>
                            </label>

                            <label>
                                アレルギー成分３：
                                <select name="menu3_allergin3">
                                    <option value="0" selected>選択してください</option>
                                    <?php foreach($dbFoodInfo as $key => $val){ ;?>
                                    <option value="<?php echo $val['food_id']; ?>"><?php echo $val['food_name']; ?></option>
                                    <?php
                                        };
                                    ?>
                                </select>
                                </br>
                             </label>
                            <label>
                                アレルギー成分４：
                                <select name="menu3_allergin4">
                                <option value="0" selected>選択してください</option>
                                <?php foreach($dbFoodInfo as $key => $val){ ;?>
                                <option value="<?php echo $val['food_id']; ?>"><?php echo $val['food_name']; ?></option>
                                <?php
                                    };
                                ?>
                                </select>
                                </br>
                            </label>

                            <label>
                                アレルギー成分５：
                                <select name="menu3_allergin5">
                                    <option value="0" selected>選択してください</option>
                                    <?php foreach($dbFoodInfo as $key => $val){ ;?>
                                    <option value="<?php echo $val['food_id']; ?>"><?php echo $val['food_name']; ?></option>
                                    <?php
                                        };
                                    ?>
                                </select>
                                </br>
                            </label>
                        </div>
                    </div>
                    </br>
                    <div class="menu-wrap">
                        <div class="menu-name">
                            <label class="<?php if(!empty($err_msg['menu4'])) echo 'err'; ?> menu-name">
                                献立４の名前
                                <input type="text" name="menu4" value="<?php if(!empty($_POST['menu4'])) echo $_POST['menu4']; ?>">
                                </br>
                            </label>
                        </div>
                        <div class="allergin-select">
                            <label>
                                アレルギー成分１：
                                <select name="menu4_allergin1">
                                    <option value="0" selected>選択してください</option>
                                    <?php foreach ($dbFoodInfo as $key => $val) { ;?>
                                    <option value="<?php echo $val['food_id']; ?>"><?php echo $val['food_name']; ?></option>
                                    <?php
                                        };
                                    ?>
                                </select>
                                </br>
                            </label>

                            <label>
                                アレルギー成分２：
                                <select name="menu4_allergin2">
                                    <option value="0" selected>選択してください</option>
                                    <?php foreach($dbFoodInfo as $key => $val){ ;?>
                                    <option value="<?php echo $val['food_id']; ?>"><?php echo $val['food_name']; ?></option>
                                    <?php
                                        };
                                    ?>
                                </select>
                                </br>
                            </label>
                            <label>
                                アレルギー成分３：
                                <select name="menu4_allergin3">
                                    <option value="0" selected>選択してください</option>
                                    <?php foreach($dbFoodInfo as $key => $val){ ;?>
                                    <option value="<?php echo $val['food_id']; ?>"><?php echo $val['food_name']; ?></option>
                                    <?php
                                        };
                                    ?>
                                </select>
                                </br>
                            </label>
                            <label>
                                アレルギー成分４：
                                <select name="menu4_allergin4">
                                    <option value="0" selected>選択してください</option>
                                    <?php foreach($dbFoodInfo as $key => $val){ ;?>
                                    <option value="<?php echo $val['food_id']; ?>"><?php echo $val['food_name']; ?></option>
                                    <?php
                                        };
                                    ?>
                                </select>
                                </br>
                            </label>

                            <label>
                                アレルギー成分５：
                                <select name="menu4_allergin5">
                                    <option value="0" selected>選択してください</option>
                                    <?php foreach($dbFoodInfo as $key => $val){ ;?>
                                    <option value="<?php echo $val['food_id']; ?>"><?php echo $val['food_name']; ?></option>
                                    <?php
                                        };
                                    ?>
                                </select>
                                </br>
                            </label>
                        </div>
                  </div>
                  </br>
                  <div class="menu-wrap">
                      <div class="menu-name">
                          <label class="<?php if(!empty($err_msg['menu5'])) echo 'err'; ?> menu-name">
                              献立５の名前
                              <input type="text" name="menu5" value="<?php if(!empty($_POST['menu5'])) echo $_POST['menu5']; ?>">
                              </br>
                          </label>
                      </div>
                      <div class="allergin-select">
                          <label>
                              アレルギー成分１：
                              <select name="menu5_allergin1">
                                  <option value="0" selected>選択してください</option>
                                  <?php foreach ($dbFoodInfo as $key => $val) { ;?>
                                  <option value="<?php echo $val['food_id']; ?>"><?php echo $val['food_name']; ?></option>
                                  <?php
                                      };
                                  ?>
                              </select>
                              </br>
                          </label>

                          <label>
                              アレルギー成分２：
                              <select name="menu5_allergin2">
                                  <option value="0" selected>選択してください</option>
                                  <?php foreach($dbFoodInfo as $key => $val){ ;?>
                                  <option value="<?php echo $val['food_id']; ?>"><?php echo $val['food_name']; ?></option>
                                  <?php
                                      };
                                  ?>
                              </select>
                              </br>
                          </label>
                          <label>
                              アレルギー成分３：
                              <select name="menu5_allergin3">
                                  <option value="0" selected>選択してください</option>
                                  <?php foreach($dbFoodInfo as $key => $val){ ;?>
                                  <option value="<?php echo $val['food_id']; ?>"><?php echo $val['food_name']; ?></option>
                                  <?php
                                      };
                                  ?>
                              </select>
                              </br>
                          </label>
                          <label>
                              アレルギー成分４：
                              <select name="menu5_allergin4">
                                  <option value="0" selected>選択してください</option>
                                  <?php foreach($dbFoodInfo as $key => $val){ ;?>
                                  <option value="<?php echo $val['food_id']; ?>"><?php echo $val['food_name']; ?></option>
                                  <?php
                                      };
                                  ?>
                              </select>
                              </br>
                          </label>

                          <label>
                              アレルギー成分５：
                              <select name="menu5_allergin5">
                                  <option value="0" selected>選択してください</option>
                                  <?php foreach($dbFoodInfo as $key => $val){ ;?>
                                  <option value="<?php echo $val['food_id']; ?>"><?php echo $val['food_name']; ?></option>
                                  <?php
                                      };
                                  ?>
                              </select>
                              </br>
                          </label>
                      </div>
                　</div>

                  <div class="btn-container">
                      <input type="submit" name="confirm" class="mid-btn confirm-btn" value="確認する">
                  </div>
                </form>
            </div>
        </section>
    </body>
</html>
