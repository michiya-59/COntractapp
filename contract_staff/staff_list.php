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

  $sql = 'SELECT code,name FROM staff WHERE 1';
  $stmt = $dbh->prepare($sql);
  $stmt->execute();

  $dbh = null;

  print 'スタッフ一覧<br><br>';
  print '<form action="staff_branch.php" method="post">';
  while(true)
  {
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    if($rec === false)
    {
    break;
    }
    print '<input type="radio" name="staffcode" value="'.$rec['code'].'">';
    print $rec['name'];
    print'<br>';
  }
  print '<input type="submit" name="disp" value="参照">';
  print '<input type="submit" name="add" value="追加">';
  print '<input type="submit" name="edit" value="修正">';
  print '<input type="submit" name="delet" value="削除">';
  print '</form>';
}
catch(Exception $e)
{
  print 'ただいま障害により大変ご迷惑おかけしております。';
  exit();
}

?>
<br>
<a href="../contract_staff_login/staff_top.php">トップメニューへ</a><br>