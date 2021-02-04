<?php
  setcookie('id', $user->id, time() - 3600 * 24 * 30, "/");
  setcookie('hash', $user->hash, time() - 3600 * 24 * 30, "/");
  unset($_COOKIE['id']);
  unset($_COOKIE['hash']);
  echo true; 
?>
