<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style1.css?v=2" type="text/css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Yusei+Magic&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
</head>
<body>
  <div class="container-xl">
    <header>
      <div class="header">
        <div class="left-header">
          <a href="../index.php"><img class="dance-img" src="../gazou/dance3.jpg"></a>
          <p class="title"><a href="../index.php" class="title-a">予約専用ページ</a> </p>
        </div>
        <div class="right-header">
          <?php if(isset($_SESSION['member_login']) === true): ?>
            <a href="../member_logout.php"><i class="fa fa-user "></i> </a>
          <?php else: ?>
            <a href="../member_login.php"><i class="fa fa-user "></i> </a>
          <?php endif ?>
        </div>
      </div>
    </header>
    <div class="login-form">
      <p class="staff-login-p">スタッフログイン</p>
      <form action="staff_login_check.php" method="post">
        <p class="staff-login-p">スタッフコード</p><br>
        <input type="text" name="code"><br>
        <p class="staff-login-p">パスワード</p><br>
        <input type="password" name="pass"><br><br>
        <input type="submit" value="ログイン" class="form-btn">
      </form>    
    </div>
  </div>
</body>
</html>