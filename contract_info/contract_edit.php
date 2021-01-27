<?php 

session_start();
session_regenerate_id(true);
// if(isset($_SESSION['login']) === false)
// {
//   print 'ログインされていません'.'<br>';
//   print '<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
//   exit();
// }
// else
// {
//   print $_SESSION['staff_name'];
//   print 'さんログイン中'.'<br>'.'<br>';
// }

try
{
$contract_code = $_GET['contractcode'];

$dsn = 'mysql:dbname=heroku_c23ca7e7a15de58;host=us-cdbr-east-03.cleardb.com;charset=utf8';
$user = 'bbbde1a622f568';
$password = 'a363e2dc';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT contract_id,year,month,day,week,hour,minute FROM info  WHERE contract_id=?';
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

$dbh = null;

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
  ■予約情報修正■<br>
  <br>
  予約コード<br>
  <?php echo $contract_code; ?><br><br>
  変更前予約情報<br>
  <?php echo $contract_year.'年'.$contract_month.'月'.$contract_day.'日  '.$contract_week.$contract_hour.'時'.$contract_minute.'分～';  ?>
  <br><br>
  <form action="contract_edit_check.php" method="post" >
  <input type="hidden" name="code" value="<?php print $contract_code; ?>">
  予約の年<br>
  <select name="year">
    <option value="2021">2021年</option>
    <option value="2022">2022年</option>
    <option value="2023">2021年</option>
  </select><br>

  予約の月<br>
  <select name="month">
  <?php for($i = 1; $i <= 12; $i++): ?>
    <option value="<?php  echo $i ?>">
      <?php echo $i ?>月
    </option>
  <?php endfor;?>
  </select><br>

  予約の日にち<br>
  <select name="day">
  <?php for($i = 1; $i <= 31; $i++): ?>
    <option value="<?php  echo $i ?>">
      <?php echo $i ?>日
    </option>
  <?php endfor; ?>
  </select><br>

  予約の曜日<br>
  <select name="week">
    <option value="日曜日">日曜日</option>
    <option value="月曜日">月曜日</option>
    <option value="火曜日">火曜日</option>
    <option value="水曜日">水曜日</option>
    <option value="木曜日">木曜日</option>
    <option value="金曜日">金曜日</option>
    <option value="土曜日">土曜日</option>
  </select><br>

  予約時間<br>
  <select name="hour">
  <?php for($i = 1; $i <= 20; $i++): ?>
    <option value="<?php  echo $i ?>">
      <?php echo $i?>時
    </option>
  <?php endfor; ?>
  </select>
  <select name="minute">
  <?php for($i = 00; $i <= 60; $i++): ?>
    <option value="<?php  echo $i ?>">
      <?php echo $i?>分
    </option>
  <?php endfor; ?>
  </select><br>

  予約募集人数<br>
  <input type="text" name="number" style="width:30px">人<br>
 
  <input type="button" onclick="history.back()" value="戻る">
  <input type="submit" value="OK"> 
  </form>
</body>
</html>
