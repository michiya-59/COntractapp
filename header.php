<header>
      <div class="header">
        <div class="left-header">
          <a href="index.php"><img class="dance-img" src="gazou/dance3.jpg"></a>
          <p class="title"><a href="index.php" class="title-a">予約専用ページ</a> </p>
        </div>
        <div class="right-header">
          <?php if(isset($_SESSION['member_login']) === true): ?>
            <a href="member_logout.php"><i class="fa fa-user "></i> </a>
          <?php else: ?>
            <a href="member_login.php"><i class="fa fa-user "></i> </a>
          <?php endif ?>
        </div>
      </div>
    </header>