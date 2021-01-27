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

$sql = 'SELECT contract_id,year,month,day,week,hour,minute,number FROM info WHERE contract_id=?';
$stmt = $dbh->prepare($sql);
$data[] = $contract_code;
$stmt->execute($data);

$rec = $stmt->fetch(PDO::FETCH_ASSOC);

$sql = 'SELECT user_name FROM user_detail WHERE contract_id=?';
$stmt = $dbh->prepare($sql);
$data = array();
$data[] = $contract_code;
$stmt->execute($data);

print '予約空き情報'.'<br>'.'<br>';
print '予約コード:'.$contract_code.'<br>'.'<br>';
print $rec['year'].'年'.$rec['month'].'月'.$rec['day'].'日'.$rec['week'].$rec['hour'].'時'.$rec['minute'].'分～';
print '<br>';
print '募集人数:';
print $rec['number'].'人';
print '<br>';
print '<br>';
print '予約者名（参加者）：';
while(true){
  $user_name = $stmt->fetch(PDO::FETCH_ASSOC);
  if($user_name === false){
    break;
  }
  else{
    print $user_name['user_name'].'・';
  }
}

$dbh = null;
print '<form>';
print '<input type="button" onclick="history.back()" value="戻る">' ;
print '</form>';

}

catch(Exception $e)
{
  print 'ただいま障害が発生しております。ご迷惑をお掛けして大変申し訳ございません';
  exit();
}
?>