<?php

  $user_id = $_COOKIE['id'];
  $fav_id = trim(filter_var($_POST['fav_id'], FILTER_SANITIZE_STRING));

  require_once __DIR__ . '/../classes/Favorite.php';

  $fav = new Favorite();

  if ($fav->activeFav($fav_id)) {
    // Удаляем
    $fav->deleteFav($fav_id);
    echo "del";
  } else {
    // Создаем
    $fav->setFav($user_id, $fav_id);
    echo "new";
  }

 ?>
