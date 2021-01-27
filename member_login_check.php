<!DOCTYPE html>
<html lang="en">
<head>
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
    
    <?php
    session_start();
    session_regenerate_id(true);
    
    $member_mail = $_POST['mail'];
    $member_pass = $_POST['pass'];
    
    $member_mail = htmlspecialchars($member_mail,ENT_QUOTES,'UTF-8');
    $member_pass = htmlspecialchars($member_pass,ENT_QUOTES,'UTF-8');
    
    $member_pass1 = md5($member_pass);
    
    $dsn = 'mysql:dbname=heroku_c23ca7e7a15de58;host=us-cdbr-east-03.cleardb.com;charset=utf8';
    $user = 'bbbde1a622f568';
    $password = 'a363e2dc';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $sql = 'SELECT user_id,name FROM user WHERE mail=? AND password=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $member_mail;
    $data[] = $member_pass1;
    $stmt->execute($data);
    
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if($rec === false)
    {
      print '<p class="entry-check-p">登録されていないアドレスです</p>';
      print '<p class="entry-check-p">再度ご登録お願い致します。</p>';
      print '<a href="member_login.php" class="top">戻る</a>';
    }
    else
    {
      session_start();
      $_SESSION['member_login'] = 1;
      $_SESSION['member_code'] = $rec['user_id'];
      $_SESSION['member_name'] = $rec['name'];
      header('Location:index.php');
      exit();
    }
    
    $dbh = null;
    ?>
  </div>
</body>
</html>
<?php 