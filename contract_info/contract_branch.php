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

if(isset($_POST['disp']) === true)
{
  if(isset($_POST['contractcode']) === false)
  {
    header('Location:contract_ng.php');
    exit();
  }
  $contract_code = $_POST['contractcode'];
  header('Location:contract_disp.php?contractcode='.$contract_code);
  exit();
}

if(isset($_POST['add']) === true)
{
  if(isset($_POST['contractcode']) === false)
  {
    header('Location:contract_ng.php');
    exit();
  }
  $contract_code = $_POST['contractcode'];
  header('Location:contract_add.php?contractcode='.$contract_code);
  exit();
}

if(isset($_POST['edit']) === true)
{
  if(isset($_POST['contractcode']) === false)
  {
    header('Location:contract_ng.php');
    exit();
  }
  $contract_code = $_POST['contractcode'];
  header('Location:contract_edit.php?contractcode='.$contract_code);
  exit();
}

if(isset($_POST['delet']) === true)
{
  if(isset($_POST['contractcode']) === false)
  {
    header('Location:contract_ng.php');
    exit();
  }
  $contract_code = $_POST['contractcode'];
  header('Location:contract_delet.php?contractcode='.$contract_code);
  exit();
}


?>