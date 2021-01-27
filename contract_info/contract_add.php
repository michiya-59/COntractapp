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
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ろくまる農園</title>
</head>
<body>
予約情報追加<br>
<br>
<form action="contract_add.check.php" method="post" enctype="multipart/form-data">
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
  
  <input type="submit" value="OK" >
</form>
</body>
</html>