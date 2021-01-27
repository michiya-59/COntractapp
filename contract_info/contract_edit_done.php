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
$contract_code = $_POST['code'];
$contract_year = $_POST['year'];
$contract_month = $_POST['month'];
$contract_day = $_POST['day'];
$contract_week = $_POST['week'];
$contract_hour = $_POST['hour'];
$contract_minute = $_POST['minute'];
$contract_number = $_POST['number'];


$contract_year = htmlspecialchars($contract_year,ENT_QUOTES,'UTF-8');
$contract_month = htmlspecialchars($contract_month,ENT_QUOTES,'UTF-8');
$contract_day = htmlspecialchars($contract_day,ENT_QUOTES,'UTF-8');
$contract_week = htmlspecialchars($contract_week,ENT_QUOTES,'UTF-8');
$contract_hour = htmlspecialchars($contract_hour,ENT_QUOTES,'UTF-8');
$contract_day = htmlspecialchars($contract_day,ENT_QUOTES,'UTF-8');
$contract_number = htmlspecialchars($contract_number,ENT_QUOTES,'UTF-8');


$dsn = 'mysql:dbname=contract_info;host=localhost;charset=utf8';
$user = 'root';
$password = 'root';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'UPDATE info SET year=?,month=?,day=?,week=?,hour=?,minute=?,number=? WHERE contract_id=?';
$stmt = $dbh->prepare($sql);
$data[] = $contract_year;
$data[] = $contract_month;
$data[] = $contract_day;
$data[] = $contract_week;
$data[] = $contract_hour;
$data[] = $contract_minute;
$data[] = $contract_number;
$data[] = $contract_code;
$stmt->execute($data);

$dbh = null;

print '修正しました';
print '<br>';
}

catch(Exception $e)
{
  print 'ただいま障害が発生しております。ご迷惑をお掛けして大変申し訳ございません';
  exit();
}
?>
<a href="contract_list.php">戻る</a>