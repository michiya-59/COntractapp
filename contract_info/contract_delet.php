<?php 

session_start();
session_regenerate_id(true);
if(isset($_SESSION['login']) === false)
{
  print 'ログインされていません'.'<br>';
  print '<a href="../contract_staff_login/staff_login.html">ログイン画面へ</a>';
  exit();
}
else
{
  print $_SESSION['staff_name'];
  print 'さんログイン中'.'<br>'.'<br>';
}

try
{
$contract_code = $_GET['contractcode'];

$dsn = 'mysql:dbname=heroku_c23ca7e7a15de58;host=us-cdbr-east-03.cleardb.com;charset=utf8';
$user = 'bbbde1a622f568';
$password = 'a363e2dc';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT contract_id,year,month,day,week,hour,minute FROM info WHERE contract_id=?';
$stmt = $dbh->prepare($sql);
$data[] = $contract_code;
$stmt->execute($data);

$rec = $stmt->fetch(PDO::FETCH_ASSOC);

$contract_year = $rec['year'];
$contract_month = $rec['month'];
$contract_day = $rec['day'];
$contract_week = $rec['week'];
$contract_hour = $rec['hour'];
$contract_minute = $rec['hour'];

}

catch(Exception $e)
{
  print 'ただいま障害が発生しております。ご迷惑をお掛けして大変申し訳ございません';
  exit();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
 予約コード<br>
  <?php echo $contract_code; ?><br><br>
  予約情報<br>
  <?php echo $contract_year.'年'.$contract_month.'月'.$contract_day.'日  '.$contract_week.$contract_hour.'時'.$contract_minute.'分～';  ?>
  <br><br>
  この予約情報を削除してもよろしいですか？<br>
  <br>
  <form action="contract_delet_done.php" method="post">
  <input type="hidden" name="code" value="<?php print $contract_code; ?>">
  <input type="button" onclick="history.back()" value="戻る">
  <input type="submit" value="OK"> 
  </form>
</body>
</html>
