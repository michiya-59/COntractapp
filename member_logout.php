<?php 
session_start();
$_SESSION = array();
if($_COOKIE[session_name()] === true)
{
  setcookie(session_name(),'',time() - 42000, '/');
}
session_destroy();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style1.css?v=2" type="text/css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Yusei+Magic&display=swap" rel="stylesheet">
</head>
<body>
  <div class="container-xl">
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

    <p class="mypage-title">ログアウトしました</p>
    <a href="index.php" class="top">トップ</a>
  </div>
</body>
</html>