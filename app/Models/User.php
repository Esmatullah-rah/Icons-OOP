<?php

namespace App\Models;

class User
{
  protected $db;

  public function __construct($dbConnection)
  {
    $this->db = $dbConnection;
  }

  public function findByEmail($email)
  {
    return $this->db->get('users', '*', ['Email' => $email]);
  }

  public function create($name, $email, $password, $image)
  {
    $this->db->insert('users', [
      'Name' => $name,
      'Email' => $email,
      'Password' => password_hash($password, PASSWORD_DEFAULT),
      'role' => 'user',
      'Image' => $image
    ]);

    return $this->db->id();
  }

  public function findById($id)
  {
    return $this->db->get('users', '*', ['ID' => $id]);
  }


  public function getAll()
  {
    return $this->db->select('users', '*');
  }

  public function update($id, $data)
  {
    return $this->db->update('users', $data, ['ID' => $id]);
  }

  public function delete($id)
  {
    return $this->db->delete('users', ['ID' => $id]);
  }
}
