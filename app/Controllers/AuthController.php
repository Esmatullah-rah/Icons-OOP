<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Payment;

class AuthController
{
  private $db;

  public function __construct($dbConnection)
  {
    $this->db = $dbConnection;
    if (session_status() === PHP_SESSION_NONE) session_start();
  }

  public function register()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      $username = htmlspecialchars(trim(strtolower($_POST['UserFullname'])));
      $email = $_POST['userEmail'];
      $password = $_POST['userPassword'];
      $image = $_FILES['userImg'];

      if (strlen($username) < 3) {
        die("Invalid User Name (Must be 3+ chars)");
      }
      if (strlen($password) < 5) {
        die("Invalid Password (Must be 5+ chars)");
      }
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Incorrect Email format");
      }

      $userModel = new User($this->db);
      if ($userModel->findByEmail($email)) {
        die("This email is already registered");
      }

      if ($image['error'] === 0) {
        $imageExt = pathinfo($image['name'], PATHINFO_EXTENSION);
        $cleanUsername = preg_replace('/[^a-z0-9]/', '_', strtolower($username));
        if ($imageExt == 'jpg' || $imageExt == 'png') {
          $newImageName = $cleanUsername . '.' . $imageExt;
          $destination = __DIR__ . '/../../public/assets/images/' . $newImageName;
        } else {
          die("Please select a valid image file");
        }

        if (!is_dir(dirname($destination))) {
          mkdir(dirname($destination), 0777, true);
        }

        if (!move_uploaded_file($image['tmp_name'], $destination)) {
          die("Image upload failed.");
        }
      } else {
        die("Please select a valid image file");
      }

      $userId = $userModel->create($username, $email, $password, $newImageName);

      if ($userId) {
        $_SESSION['user_id'] = $userId;
        $_SESSION['user_email'] = $email;
        $_SESSION['user_name'] = $username;
        $_SESSION['user_role'] = 'user';
        $_SESSION['imgname'] = $newImageName;

        header('Location: /PROJECTOOP/public/payment');
        exit();
      } else {
        die("Registration failed in database.");
      }
    }
  }

  public function login()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $email = trim($_POST['userEmail']);
      $password = trim($_POST['userPassword']);

      // $userModel = new User($this->db);
      $user = $this->db->get('users', '*', ['Email' => $email]);

      if ($user && password_verify($password, $user['Password'])) {

        $_SESSION['user_id'] = $user['ID'];
        $_SESSION['user_email'] = $user['Email'];
        $_SESSION['user_role'] = $user['role'];
        $_SESSION['user_name'] = $user['Name'];
        $_SESSION['imgname'] = $user['Image'] ?? 'default.jpg';

        if ($user['role'] === 'admin') {
          header('Location: /PROJECTOOP/public/admin/dashboard');
          exit();
        } else {
          $payment = $this->db->get('payments', '*', ['User_id' => $user['ID']]);

          $now = time();

          if ($payment && strtotime($payment['Exp_date']) > $now) {
            header('Location: /PROJECTOOP/public/dashboard');
          } else {
            header('Location: /PROJECTOOP/public/payment');
          }
          exit();
        }
      } else {
        echo "<script>alert('Invalid Email or Password'); window.location.href='login';</script>";
      }
    }
  }

  public function logout()
  {
    session_unset();
    session_destroy();
    header('Location: /PROJECTOOP/public/index.php');
    exit();
  }
}
