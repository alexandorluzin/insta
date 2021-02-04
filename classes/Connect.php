<?php

class Connect
{
  private $host; // IP
  private $user; // LOGIN
  private $password; // PASS
  private $options; // CONFIG
  private $data_base; // DB
  private $charset = "UTF8";
  protected $salt = "dfgdfger4t54t45tdfgdfg2efgfghrt43ghj76u67///efg";
  public $PDO;

  public function __construct()
  {

    $this->host = "localhost";
    $this->user = "ce57149_insta";
    $this->password = "123456789";
    $this->data_base = "ce57149_insta";
    $this->options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_EMULATE_PREPARES   => false,
      ];

    $this->PDO = new PDO("mysql:host=$this->host;dbname=$this->data_base;charset=$this->charset", $this->user, $this->password, $this->options);
  }


  public function close_connect_pdo()
  {
    $this->PDO = null;
  }

  public function getInfoPDO()
  {
    return $this->PDO;
  }

}

 ?>
