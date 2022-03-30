<?php
require_once 'database.php';

class User
{

  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function findUserByEmailOrUsername($email)
  {
    $this->db->query('SELECT * FROM users WHERE email = :email');
    $this->db->bind(':email', $email);

    $row = $this->db->single();

    if ($this->db->rowCount() > 0) {
      return $row;
    } else {
      return false;
    }
  }

  public function register($data)
  {
    $aujourdhui = date("Y-m-d");
    $diff = date_diff(date_create($data['birthdate']), date_create($aujourdhui));
    $age = $diff->format('%y');

    $this->db->query('INSERT INTO users (lastname, firstname, birthdate, gender, city, email, password, loisir, age) 
      VALUES (:lastname, :firstname, :birthdate, :gender, :city, :email, :password, :loisir, :age)');

    $this->db->bind(':lastname', $data['lastname']);
    $this->db->bind(':firstname', $data['firstname']);
    $this->db->bind(':birthdate', $data['birthdate']);
    $this->db->bind(':gender', $data['gender']);
    $this->db->bind(':city', $data['city']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':password', $data['password']);
    $this->db->bind(':loisir', $data['loisir']);
    $this->db->bind(':age', $age);

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function login($email, $password)
  {
    $row = $this->findUserByEmailOrUsername($email);

    if ($row == false) return false;

    $hashedPassword = $row->password;
    if (password_verify($password, $hashedPassword)) {
      return $row;
    } else {
      return false;
    }
  }
}
