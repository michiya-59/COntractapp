<?php 

session_start();
session_regenerate_id(true);

try
{

}


catch(Exception $e)
{
  print 'ただいま障害が発生しております。ご迷惑をおかけして大変申し訳ございません';
  exit();
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style1.css?v=2" type="text/css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Yusei+Magic&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function(){
        $('.slider').bxSlider({
            auto: true,
            pause: 4000,
        });
    });
  </script>
</head>
<body>
  <div class="container-xl">
    <?php include 'header.php' ?>
    <div class="slider">
      <img src="gazou/dance6.jpg" class="slider-item slider-item1">
      <img src="gazou/dance4.jpg" class="slider-item slider-item1">
      <img src="gazou/dance5.jpg" class="slider-item slider-item1">
      <img src="gazou/dance7.jpg" class="slider-item slider-item1">
    </div>
    
    <p class="contract-info"><a href="contract_mypage.php" class="contract-a">予約状況</a></p>
    <p class="contract-info"><a href="contract_detail.php" class="contract-a">予約</a></p>
    <p class="contract-info"><a href="../contract_staff_login/staff_login.php" class="contract-a">スタッフ</a></p>
  </div>
</body>
</html>