<?php
  require_once __DIR__ . '/Connect.php';

  class User extends Connect
  {

    public function __construct()
    {
      parent::__construct();
    }

    public function checkTel($tel)
    {

      $sql = "SELECT * FROM `users` WHERE `tel` LIKE :tel";
      $query = $this->PDO->prepare($sql);
      $query->execute(['tel' => $tel]);
      $response = $query->fetch(PDO::FETCH_OBJ);
      return $response;
    }

    public function signupUser($tel, $pass)
    {
      // Кодируем пароль
      $salt = $this->salt;
      $pass = md5($pass . $salt);


      $sql = 'INSERT INTO `users` (`tel`, `pass`, `time`) VALUES (:tel, :pass, :time)';
      $query = $this->PDO->prepare($sql);
      $query->execute(['tel' => $tel, 'pass' => $pass, 'time' => time()]);
      $user_id = $this->PDO->lastInsertId(); // Получаем ID созданной записи
      return $user_id;
    }

    public function getUsers()
    {
      $sql = "SELECT * FROM `users`";
      $query = $this->PDO->query($sql);
      $response = $query->fetchAll(PDO::FETCH_OBJ);
      return $response;
    }



    public function getUser($user_id)
    {
      $query = $this->PDO->prepare("SELECT * FROM `users` WHERE `id` = :user_id");
      $query->execute(['user_id' => $user_id]);
      $user = $query->fetch(PDO::FETCH_OBJ);
      return $user;
    }

    public function loginUser($tel, $pass, $user_id = null)
    {
      // Кодируем пароль
      $salt = $this->salt;
      $pass = md5($pass . $salt);

      if($user_id == null) {
        // Ищем этого пользователя в БД
        $sql = 'SELECT * FROM `users` WHERE `tel` = :tel AND `pass` = :pass';
        $query = $this->PDO->prepare($sql);
        $query->execute(['tel' => $tel, 'pass' => $pass]);
        $user = $query->fetch(PDO::FETCH_OBJ);

        $user_id = $user->id;
      }
      if (!$user_id)
        echo "Неверный логин или пароль";
      else {
        // Создаем hash
        $hash = md5(microtime());

        // Обновляем hash в БД
        $sql = "UPDATE `users` SET `hash` = :hash WHERE `id` = :user_id";
        $query = $this->PDO->prepare($sql);
        $query->execute(['user_id' => $user_id, 'hash' => $hash]);

        setcookie('id', $user_id, time() + 3600 * 24 * 30, "/");
        setcookie('hash', $hash, time() + 3600 * 24 * 30, "/");
        echo 'Готово';
      }
    }

    public function checkUser($user)
    {
      if ($_COOKIE['id'] != $user->id AND $_COOKIE['hash'] != $user->hash) {
        return header("Location: login.php");
      }
      else if ($_COOKIE['id'] == null AND $_COOKIE['hash'] == null) {
        return header("Location: login.php");
      }
    }


  }
 ?>
