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

$contract_code = $_POST['code'];
$contract_yaer = $_POST['year'];
$contract_month = $_POST['month'];
$contract_day = $_POST['day'];
$contract_week = $_POST['week'];
$contract_hour = $_POST['hour'];
$contract_minute = $_POST['minute'];
$contract_number = $_POST['number'];


$contract_yaer = htmlspecialchars($contract_yaer,ENT_QUOTES,'UTF-8');
$contract_month = htmlspecialchars($contract_month,ENT_QUOTES,'UTF-8');
$contract_day = htmlspecialchars($contract_day,ENT_QUOTES,'UTF-8');
$contract_week = htmlspecialchars($contract_week,ENT_QUOTES,'UTF-8');
$contract_hour = htmlspecialchars($contract_hour,ENT_QUOTES,'UTF-8');
$contract_day = htmlspecialchars($contract_day,ENT_QUOTES,'UTF-8');
$contract_number = htmlspecialchars($contract_number,ENT_QUOTES,'UTF-8');


print 'こちらの予約情報に変更しますか？';
print '<br>';
print '<br>';


print '■予約情報■';
print '<br>';

print $contract_yaer.'年'.$contract_month.'月'.$contract_day.'日  '.$contract_week;
print '<br>';
print $contract_hour.'時'.$contract_minute.'分～';
print '<br>';
print '募集人数:'.$contract_number.'人';


print '<form action="contract_edit_done.php" method="post">';
print '<input type="hidden" name="code" value="'.$contract_code.'">';
print '<input type="hidden" name="year" value="'.$contract_yaer.'">';
print '<input type="hidden" name="month" value="'.$contract_month.'">';
print '<input type="hidden" name="day" value="'.$contract_day.'">';
print '<input type="hidden" name="week" value="'.$contract_week.'">';
print '<input type="hidden" name="hour" value="'.$contract_hour.'">';
print '<input type="hidden" name="minute" value="'.$contract_minute.'">';
print '<input type="hidden" name="number" value="'.$contract_number.'">';
print '<input type="button" onclick="history.back()" value="戻る">';
print '<input type="submit" value="OK">';
print '</form>';

?>