<?php

namespace App\Models;

class Payment
{
  protected $db;

  public function __construct($db)
  {
    $this->db = $db;
  }

  public function findByUserId($userId)
  {
    return $this->db->get('payments', '*', ['User_id' => $userId]);
  }

  public function create($data)
  {
    $this->db->insert('payments', $data);
  }

  public function update($userId, $data)
  {
    $this->db->update('payments', $data, ['User_id' => $userId]);
  }
}
