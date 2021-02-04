<?php
  require_once __DIR__ . '/../classes/User.php';

  $tel = trim(filter_var($_POST['tel'], FILTER_SANITIZE_STRING));
  $pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));

  // Проверяем наличие телефона и пароля
  $error = '';
  if (strlen($tel) <= 10)
    $error = 'Введите телефон';
  else if (strlen($pass) <= 3)
    $error = 'Введите пароль';

  if($error != '') {
    echo $error;
    exit;
  }
  $user = new User();

  $user->loginUser($tel, $pass);

 ?>
