<?php

namespace App\Controllers;

class AdminController
{
  private $db;

  public function __construct($dbConnection)
  {
    $this->db = $dbConnection;
    if (session_status() === PHP_SESSION_NONE) session_start();

    if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
      header('Location: /PROJECTOOP/public/login');
      exit();
    }
  }

  public function dashboard()
  {
    require __DIR__ . '/../../views/admin/dashboard.php';
  }

  public function usersTable()
  {
    if (isset($_GET['delete_id'])) {
      $this->db->delete('users', ['ID' => $_GET['delete_id']]);

      header("Location: /PROJECTOOP/public/admin/users");
      exit();
    }

    $limit = 5;
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    if ($page < 1) $page = 1;
    $offset = ($page - 1) * $limit;

    $users = $this->db->select('users', '*', [
      'LIMIT' => [$offset, $limit],
      'ORDER' => ['ID' => 'DESC']
    ]);

    $total_users = $this->db->count('users');
    $total_pages = ceil($total_users / $limit);

    $payments = $this->db->select('payments', '*');

    require __DIR__ . '/../../views/admin/users_table.php';
  }

  public function editUser()
  {
    $id = $_GET['id'] ?? 0;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $this->db->update('users', [
        'Name' => $_POST['up_username'],
        'Email' => $_POST['up_email'],
        'role' => strtolower($_POST['up_role'])
      ], ['ID' => $id]);

      header("Location: /PROJECTOOP/public/admin/users");
      exit();
    }

    $user = $this->db->get('users', '*', ['ID' => $id]);
    require __DIR__ . '/../../views/admin/edit_user.php';
  }

  public function exportPayments()
  {
    if (isset($_GET['id'])) {
      $data = $this->db->select('payments', '*', ['ID' => $_GET['id']]);
      $filename = "payment_" . $_GET['id'] . ".csv";
    } else {
      $data = $this->db->select('payments', '*');
      $filename = "all_payments_" . date('Y-m-d') . ".csv";
    }

    if (empty($data)) {
      header("Location: /PROJECTOOP/public/admin/users");
      exit();
    }

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=' . $filename);

    $output = fopen('php://output', 'w');

    fputcsv($output, array_keys($data[0]));

    foreach ($data as $row) {
      fputcsv($output, $row);
    }

    fclose($output);
    exit();
  }
}
