<?php 
session_start();
session_regenerate_id(true);

$dsn = 'mysql:dbname=contract_info;host=localhost;charset=utf8';
$user = 'root';
$password = 'root';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT contract_id,user_id,year,month,day,week,hour,minute FROM user_detail WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

$dbh = null;


?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <h3>2021年 予約状況</h3>
  <?php while(true): ?>
    <?php $rec = $stmt->fetch(PDO::FETCH_ASSOC); ?>
    <?php if($rec === false): ?>
      <?php break; ?>
    <?php endif ?>
    <p><?php print $rec['month'].'月'.$rec['day'].'日'?></p>
    <p><?php print $rec['week'].''.$rec['hour'].'時'.$rec['minute'].'分'  ?></p>
  <?php endwhile; ?>

  <a href="contract_index.php">トップ</a>
</body>
</html>