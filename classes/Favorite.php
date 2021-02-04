<?php
  require_once __DIR__ . '/Connect.php';

  class Favorite extends Connect
  {
    public function setFav($user_id, $fav_id)
    {
      $sql = 'INSERT INTO `favorite` (`user_id`, `fav_id`) VALUES (:user_id, :fav_id)';
      $query = $this->PDO->prepare($sql);
      $query->execute(['user_id' => $user_id, 'fav_id' => $fav_id]);
      return true;
    }

    public function getFavs($user_id)
    {
      $sql = "SELECT * FROM `favorite` WHERE `user_id` = :user_id";
      $query = $this->PDO->prepare($sql);
      $query->execute(['user_id' => $user_id]);
      $response = $query->fetchAll(PDO::FETCH_OBJ);
      return $response;
    }

    public function activeFav($fav_id)
    {
      $sql = "SELECT * FROM `favorite` WHERE `user_id` = :user_id AND `fav_id` = :fav_id";
      $query = $this->PDO->prepare($sql);
      $query->execute(['user_id' => $_COOKIE['id'], 'fav_id' => $fav_id]);
      $response = $query->fetch(PDO::FETCH_OBJ);
      return $response;
    }

    public function deleteFav($fav_id)
    {
      $sql = "DELETE FROM `favorite` WHERE `user_id` = :user_id AND `fav_id` = :fav_id";
      $query = $this->PDO->prepare($sql);
      $query->execute(['user_id' => $_COOKIE['id'], 'fav_id' => $fav_id]);
      $response = $query->fetch(PDO::FETCH_OBJ);

    }
  }
 ?>
