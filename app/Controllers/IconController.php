<?php

namespace App\Controllers;

class IconController
{
  public function __construct()
  {
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }
  }

  public function fontawesome()
  {
    require __DIR__ . '/../../views/icons/fontawesome.php';
  }

  public function themify()
  {
    require __DIR__ . '/../../views/icons/themify.php';
  }
}
