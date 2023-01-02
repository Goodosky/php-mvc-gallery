<?php
class User
{
  private $db; // 'users' collection

  public function __construct()
  {
    $client = new MongoDB\Client(
      "mongodb://localhost:27017/wai",
      [
        'username' => 'wai_web',
        'password' => 'w@i_w3b',
      ]
    );

    $this->db = $client->wai->users;
  }


  function addUser($login, $email, $password)
  {
    // Check if login is taken
    if ($this->db->findOne(['login' => $login])) return false;

    // Check if email is taken
    if ($this->db->findOne(['email' => $email])) return false;

    // Create user
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $this->db->insertOne([
      'login' => $login,
      'email' => $email,
      'password' => $hashed_password
    ]);

    return true;
  }

  function login($login, $password)
  {
    $user = $this->db->findOne(['login' => $login]);

    // Check if login match a user in the database
    if (!$user) return false;

    // Check password
    if (!password_verify($password, $user['password'])) return false;

    // Return the user's identifier
    return $user['_id'];
  }
}
