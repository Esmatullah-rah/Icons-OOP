<?php

namespace App\Config;

use Medoo\Medoo;

class Database
{
  private $database;

  public function connect()
  {
    if ($this->database === null) {
      $this->database = new Medoo([
        'type' => 'mysql',
        'host' => 'localhost',
        'database' => 'mydb',
        'username' => 'root',
        'password' => '',

        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_general_ci',
        'port' => 3306
      ]);
    }

    return $this->database;
  }
}
