<!DOCTYPE html>
<html lang="en">
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
    <h3 class="entry-title">会員登録</h3>
    <form action="member_add_check.php" method="post">
      <p class="entry-p">氏名</p>
      <input type="text" name="name" class="form">
      <p class="entry-p">メールアドレス</p>
      <input type="text" name="mail" class="form">
      <p class="entry-p">パスワード</p>
      <input type="password" name="pass" class="form">
      <p class="entry-p">確認用パスワード</p>
      <input type="password" name="pass2" class="form"><br>
      
      <input type="button" onclick="history.back()" value="戻る" class="form-btn">
      <input type="submit" value="OK" class="form-btn">
    </form> 

  </div>
</div>
</body>
</html>