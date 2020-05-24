<header>
  <div class="header-width">
    <nav class="top-nav">
      <ul>
        <?php
         if(empty($_SESSION['user_id'])){
         ?>
        <li><a href="../index.php">トップ</a></li>
        <li><a href="register.php">ユーザー登録</a></li>
        <li><a href="login.php">ログイン</a></li>
      <?php
    }else{
      ?>
        <li><a href="../index.php">トップ</a></li>
        <li><a href="mypage.php">マイページ</a></li>
        <li><a href="logout.php">ログアウト</a></li>
      <?php
    }
       ?>
      </ul>
    </nav>
</header>
