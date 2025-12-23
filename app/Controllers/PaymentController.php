<?php

namespace App\Controllers;

use App\Models\Payment;
use DateTime;

class PaymentController
{
  private $db;

  public function __construct($db)
  {
    $this->db = $db;
    if (session_status() === PHP_SESSION_NONE) session_start();
  }

  public function index()
  {
    require __DIR__ . '/../../views/user/payment.php';
  }

  public function process()
  {
    if (!isset($_SESSION['user_id'])) {
      header("Location: /PROJECTOOP/public/login");
      exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['payBtn'])) {

      $name = $_POST['payname'];
      $card = $_POST['paynumber'];
      $userId = $_SESSION['user_id'];

      if (empty($name) || strlen($card) < 5 || !is_numeric($card)) {
        die('SOMETHING IS WRONG!!!');
      }

      $paymentModel = new Payment($this->db);
      $existingPayment = $paymentModel->findByUserId($userId);

      $now = date('Y-m-d H:i:s');
      $expire = date('Y-m-d H:i:s', strtotime('+1 day'));

      if (!$existingPayment) {
        $paymentModel->create([
          'Name' => $name,
          'Card_id' => $card,
          'Amount' => 10,
          'Payment_count' => 1,
          'Start_date' => $now,
          'Exp_date' => $expire,
          'User_id' => $userId
        ]);
      } else {
        $newCount = $existingPayment['Payment_count'] + 1;

        $paymentModel->update($userId, [
          'Name' => $name,
          'Card_id' => $card,
          'Start_date' => $now,
          'Exp_date' => $expire,
          'Amount' => 10,
          'Payment_count' => $newCount
        ]);
      }

      header("Location: /PROJECTOOP/public/dashboard");
      exit();
    }
  }
}
