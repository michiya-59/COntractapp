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
  $dsn = 'mysql:dbname=heroku_c23ca7e7a15de58;host=us-cdbr-east-03.cleardb.com;charset=utf8';
  $user = 'bbbde1a622f568';
  $password = 'a363e2dc';
  $dbh = new PDO($dsn,$user,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT contract_id,year,month,day,week,hour,minute FROM info WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

$dbh = null;

print '予約情報';
print '<br>';
print '<br>';
print '<form action="contract_branch.php" method="post">';
while(true)
{
  $rec = $stmt->fetch(PDO::FETCH_ASSOC);
  if($rec === false)  
  {
  break;
  }
  print '<input type="radio" name="contractcode" value="'.$rec['contract_id'].'">';
  print $rec['year'].'年'.$rec['month'].'月'.$rec['day'].'日'.$rec['week'].$rec['hour'].'時'.$rec['minute'].'分～';
  print '<br>';
}
print '<input type="submit" name="disp" value="参照">';
print '<input type="submit" name="add" value="追加">';
print '<input type="submit" name="edit" value="修正">';
print '<input type="submit" name="delet" value="削除">';
print '</form>';

}
catch(Exception $e)
{
  print 'ただいま障害が発生しております。ご迷惑をおかけして大変申し訳ございません';
  exit();
}

?>
<br>
<a href="../contract_staff_login/staff_top.php">トップメニューへ</a><br>