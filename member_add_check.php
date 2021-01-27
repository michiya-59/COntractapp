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
    <?php include 'header.php';?>
    <h3 class="mypage-title">この情報でよろしいですか？</h3>
    <div class="login-form">
    <?php
    $member_name = $_POST["name"];
    $member_mail = $_POST["mail"];
    $member_pass = $_POST["pass"];
    $member_pass2 = $_POST["pass2"];

    $member_name = htmlspecialchars($member_name,ENT_QUOTES,"UTF-8");
    $member_mail = htmlspecialchars($member_mail,ENT_QUOTES,"UTF-8");
    $member_pass = htmlspecialchars($member_pass,ENT_QUOTES,"UTF-8");
    $member_pass2 = htmlspecialchars($member_pass2,ENT_QUOTES,"UTF-8");

    if($member_name === "")
    {
      print '<p class="entry-check-p">名前が入力されていません</p>';
    }
    else
    {
      print '<p class="entry-check-p">氏名：'.$member_name.'</p>';
    }

    if(preg_match('/\A[\w\-\.]+\@[\w\-\.]+\.([a-z]+)\z/',$member_mail) === 0)
    {
      print '<p class="entry-check-p">メールアドレスを正確に入力してください</p><br>';
    }
    else
    {
      print '<p class="entry-check-p">メールアドレス：'.$member_mail.'</p>';
    }

    if($member_pass ===  "")
    {
      print '<p class="entry-check-p>パスワードが入力されていません</p>';
    }

    if($member_pass !== $member_pass2)
    {
      print '<p class="entry-check-p>パスワードが一致しません,</p>';
    }

    if($member_name === "" ||$member_mail === "" || $member_pass === "" || $member_pass !== $member_pass2)
    {
      print '<form>';
      print '<input type = "button" onclick = "history.back()" value="戻る">';
      print '</form>';
    }
    else
    {
      $member_pass = md5($member_pass);
      print '<form action="member_add_done.php" method="post">';
      print '<input type = "hidden" name="name" value="'.$member_name.'">';
      print '<input type = "hidden" name="pass" value="'.$member_pass.'">';
      print '<input type = "hidden" name="mail" value="'.$member_mail.'">';
      print '<br>';
      print '<input type="button" onclick = "history.back()" value="戻る" class="form-btn">';
      print '<input type="submit" value="OK" class="form-btn">';
      print '</form>';
    }
    ?>
    </div>
  </div>
</body>
</html>
