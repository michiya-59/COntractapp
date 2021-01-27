<?php 
session_start();
session_regenerate_id(true);

if(isset($_SESSION['member_login']) === true)
{
  $user_id = $_SESSION['member_code'];

  $dsn = 'mysql:dbname=heroku_c23ca7e7a15de58;host=us-cdbr-east-03.cleardb.com;charset=utf8';
  $user = 'bbbde1a622f568';
  $password = 'a363e2dc';
  $dbh = new PDO($dsn,$user,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  $sql = 'SELECT contract_id,user_id,year,month,day,week,hour,minute FROM user_detail WHERE user_id=?';
  $stmt = $dbh->prepare($sql);
  $data[] = $user_id;
  $stmt->execute($data);
}


$dbh = null;


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
    <?php include 'header.php' ?>
    <h3 class="mypage-title">2021年 予約状況</h3>
    <?php if(isset($_SESSION['member_login']) === true): ?>
      <?php while(true): ?>
        <?php $rec = $stmt->fetch(PDO::FETCH_ASSOC); ?>
        <?php if($rec === false): ?>
          <?php break; ?>
        <?php endif ?>
        <div class="contract-detail">
          <?php 
          if($rec['minute'] == 0)
            $minute = $rec['minute'];
            $minutes = sprintf('%02d',0);
          ?>
          <p class="contract-detail-part1"><?php print $rec['month'].'月'.$rec['day'].'日'?></p>
          <p class="contract-detial-part2"><?php print $rec['week'].''.$rec['hour'].'時'.$minutes.'分～'  ?></p>
          <p class="contract-detial-part2">北総合体育館  リトモス</p>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
        <p class="mypage-title">予約状況がありません</p>
    <?php endif; ?>
  
    <a href="index.php" class="top">トップ</a>
  </div>
</body>
</html>