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
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  ショップ管理トップメニュー<br><br>
  <a href="../contract_staff/staff_list.php">スタッフ管理</a><br>
  <a href="../contract_info/contract_list.php">予約管理</a><br>
  <a href="../index.php">生徒さん画面</a><br><br>
  <a href="staff_logout.php">ログアウト</a><br>
</body>
</html>