<?php 

session_start();
session_regenerate_id(true);

$contract_id = $_POST['contractcode'];
$user_id = $_SESSION['member_code'];


$dsn = 'mysql:dbname=heroku_c23ca7e7a15de58;host=us-cdbr-east-03.cleardb.com;charset=utf8';
$user = 'bbbde1a622f568';
$password = 'a363e2dc';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT year,month,day,week,hour,minute,number FROM info WHERE contract_id=?';
$stmt = $dbh->prepare($sql);
$data[] = $contract_id;
$stmt->execute($data);

$rec = $stmt->fetch(PDO::FETCH_ASSOC);

$contract_year = $rec['year'];
$contract_month = $rec['month'];
$contract_day = $rec['day'];
$contract_week = $rec['week'];
$contract_hour = $rec['hour'];
$contract_minute = $rec['minute'];

if($rec['minute'] == 0)
$minute = $rec['minute'];
$minutes = sprintf('%02d',0);
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
    <h1 class="mypage-title">予約確認画面</h1>
    <p class="mypage-title">この時間で予約してもよろしいですか？</p>
    <form action="contract_detail_entry_done.php" method="post">
      <div class="contract-detail">
        <p class="contract-detial-part2"><?php print $contract_year.'年'.$contract_month.'月'.$contract_day.'日 '.$contract_week.' '.$contract_hour.'時'.$minutes.'分～'; ?></p>
        <p class="contract-detial-part2">北総合体育館  リトモスキッズ</p>
      </div>
      <input type="hidden" name="contractcode" value="<?php print $contract_id ?>">
      <input type="hidden" name="userid" value="<?php print $user_id ?>">
      <input type="hidden" name="year" value="<?php print $contract_year ?>">
      <input type="hidden" name="month" value="<?php print $contract_month ?>">
      <input type="hidden" name="day" value="<?php print $contract_day ?>">
      <input type="hidden" name="week" value="<?php print $contract_week ?>">
      <input type="hidden" name="hour" value="<?php print $contract_hour ?>">
      <input type="hidden" name="minute" value="<?php print $contract_minute ?>">
      <input type="button" onclick="history.back()" value="戻る" class="detail-btn">
      <input type="submit" value="確定" class="detail-btn">
    </form>
  </div>
</body>
</html>