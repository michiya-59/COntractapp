<?php 

session_start();
session_regenerate_id(true);

$contract_id = $_POST['contractcode'];
$user_id = $_POST['userid'];
$contract_year = $_POST['year'];
$contract_month = $_POST['month'];
$contract_day = $_POST['day'];
$contract_week = $_POST['week'];
$contract_hour = $_POST['hour'];
$contract_minute = $_POST['minute'];

$user_name = $_SESSION['member_name'];

$dsn = 'mysql:dbname=heroku_c23ca7e7a15de58;host=us-cdbr-east-03.cleardb.com;charset=utf8';
$user = 'bbbde1a622f568';
$password = 'a363e2dc';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


$sql = 'SELECT number FROM info WHERE contract_id=?';
$stmt = $dbh->prepare($sql);
$data[] = $contract_id;
$stmt->execute($data);
$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$contract_number = $rec['number'];
$contract_number = $contract_number - 1;;


$sql = 'INSERT INTO user_detail (contract_id,user_id,year,month,day,week,hour,minute,user_name) VALUES (?,?,?,?,?,?,?,?,?)';
$stmt = $dbh->prepare($sql);
$data = array();
$data[] = $contract_id;
$data[] = $user_id;
$data[] = $contract_year;
$data[] = $contract_month;
$data[] = $contract_day;
$data[] = $contract_week;
$data[] = $contract_hour;
$data[] = $contract_minute;
$data[] = $user_name;
$stmt->execute($data);

$sql = 'UPDATE info SET number=? WHERE contract_id=?';
$stmt = $dbh->prepare($sql);
$data = array();
$data[] = $contract_number;
$data[] = $contract_id;
$stmt->execute($data);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
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
    <h3 class="mypage-title">予約完了致しました</h3>
    <a href="index.php" class="top">トップ</a>
  </div>
</body>
</html>