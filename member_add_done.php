<?php 

session_start();
session_regenerate_id(true);

$member_name = $_POST["name"];
$member_mail = $_POST["mail"];
$member_pass = $_POST["pass"];

$member_name = htmlspecialchars($member_name,ENT_QUOTES,"UTF-8");
$member_pass = htmlspecialchars($member_pass,ENT_QUOTES,"UTF-8");
$member_mail = htmlspecialchars($member_mail,ENT_QUOTES,"UTF-8");

$dsn = 'mysql:dbname=heroku_c23ca7e7a15de58;host=us-cdbr-east-03.cleardb.com;charset=utf8';
$user = 'bbbde1a622f568';
$password = 'a363e2dc';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'INSERT INTO user(name,password,mail) VALUES (?,?,?)';
$stmt =$dbh->prepare($sql);
$data[] = $member_name;
$data[] = md5($member_pass);
$data[] = $member_mail;
$stmt->execute($data);

$dbh = null;
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
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
    <?php include 'header.php'; ?>

    <div class="login-form">
      <p class="entry-check-p"><?php print $member_name ?>さん</p>
      <p class="entry-check-p">会員登録完了しました</p>
      <p class="entry-check-p">ご利用する場合はログインをしてください</p>
      <a href="index.php" class="top">戻る</a>
    </div>
  </div>
</body>
</html>
