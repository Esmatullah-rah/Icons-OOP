<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Config\Database;
use App\Controllers\AuthController;
use App\Controllers\PaymentController;
use App\Controllers\AdminController;
use App\Controllers\IconController;

session_start();

$db = (new Database())->connect();

$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$script_name = dirname($_SERVER['SCRIPT_NAME']);

$script_name = str_replace('\\', '/', $script_name);

if (stripos($request_uri, $script_name) === 0) {
  $uri = substr($request_uri, strlen($script_name));
} else {
  $uri = $request_uri;
}

if ($uri == '' || $uri == '/') {
  $uri = '/index.php';
}

switch ($uri) {

  case '/index.php':
    require __DIR__ . '/../views/home/index.php';
    break;

  case '/register':
    $controller = new AuthController($db);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $controller->register();
    } else {
      require __DIR__ . '/../views/auth/register.php';
    }
    break;

  case '/login':
    $controller = new AuthController($db);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $controller->login();
    } else {
      require __DIR__ . '/../views/auth/login.php';
    }
    break;

  case '/logout':
    $controller = new AuthController($db);
    $controller->logout();
    break;

  case '/payment':
    $controller = new PaymentController($db);
    $controller->index();
    break;

  case '/payment/process':
    $controller = new PaymentController($db);
    $controller->process();
    break;

  case '/dashboard':
    if (!isset($_SESSION['user_id'])) {
      header('Location: login');
      exit;
    }
    require __DIR__ . '/../views/user/dashboard.php';
    break;

  case '/admin/dashboard':
    $controller = new AdminController($db);
    $controller->dashboard();
    break;

  case '/admin/users':
    $controller = new AdminController($db);
    $controller->usersTable();
    break;

  case '/admin/users/edit':
    $controller = new AdminController($db);
    $controller->editUser();
    break;

  case '/icons/fontawesome':
    $controller = new IconController();
    $controller->fontawesome();
    break;

  case '/icons/themify':
    $controller = new IconController();
    $controller->themify();
    break;

  case '/admin/payments/export':
    $controller = new AdminController($db);
    $controller->exportPayments();
    break;

  default:
    echo "<h1>404 - Page Not Found</h1>";
    echo "<p>The requested URL <strong>$uri</strong> was not found.</p>";
    break;
}
