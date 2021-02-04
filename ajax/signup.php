<?php

  require_once __DIR__ . '/../classes/User.php';

  // Проверяем данные из формы
  $tel = trim(filter_var($_POST['tel'], FILTER_SANITIZE_STRING));
  $pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));

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
  // Проверяем наличие такого номера в БД
  if ($user->checkTel($tel)) {
    echo "Такой пользователь уже существует";
    exit;
  }

  // Регистрируем пользователя в БД
  $user_id = $user->signupUser($tel, $pass);

  // Авторизуем пользователя
  if($user_id) {
    $user->loginUser($tel, $pass, $user_id);
  }
 ?>
