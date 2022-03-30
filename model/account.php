<?php
require_once 'database.php';

class Account
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  function get_lastname()
  {
    $email = $_SESSION['email'];
    $this->db->query("SELECT lastname FROM users WHERE email = :email");
    $this->db->bind(':email', $email);

    $row = $this->db->single();

    foreach ($row as $value) {
      echo $value;
    };
  }

  function get_firstname()
  {
    $email = $_SESSION['email'];
    $this->db->query("SELECT firstname FROM users WHERE email = :email");
    $this->db->bind(':email', $email);

    $row = $this->db->single();

    foreach ($row as $value) {
      echo $value;
    };
  }

  function get_birthdate()
  {
    $email = $_SESSION['email'];
    $this->db->query("SELECT birthdate FROM users WHERE email = :email");
    $this->db->bind(':email', $email);

    $row = $this->db->single();

    foreach ($row as $value) {
      echo $value;
    };
  }

  function get_gender()
  {
    $email = $_SESSION['email'];
    $this->db->query("SELECT gender FROM users WHERE email = :email");
    $this->db->bind(':email', $email);

    $row = $this->db->single();

    foreach ($row as $value) {
      echo $value;
    };
  }

  function get_mail()
  {
    $email = $_SESSION['email'];
    $this->db->query("SELECT email FROM users WHERE email = :email");
    $this->db->bind(':email', $email);

    $row = $this->db->single();

    foreach ($row as $value) {
      echo $value;
    };
  }

  function get_loisir()
  {
    $email = $_SESSION['email'];
    $this->db->query("SELECT loisir FROM users WHERE email = :email");
    $this->db->bind(':email', $email);

    $row = $this->db->single();

    foreach ($row as $value) {
      echo $value;
    };
  }

  function set_email()
  {
    if (empty($_POST['editEmail'])) {
      $newEmail = $_SESSION['email'];
      $email = $_SESSION['email'];
    } else {
      $newEmail = $_POST['editEmail'];
      $email = $_SESSION['email'];
    }
    $this->db->query("UPDATE users SET email = '$newEmail' WHERE email = '$email'");
    if ($this->db->execute()) {
      $_SESSION['email'] = $newEmail;
      return true;
    } else {
      return false;
    }
  }

  function set_password()
  {
    $newPassword = $_POST['editPassword'];
    $hashpwd = password_hash("$newPassword", PASSWORD_DEFAULT);
    $email = $_SESSION['email'];
    $this->db->query("UPDATE users SET password = '$hashpwd' WHERE email = '$email'");
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  function delete()
  {
    $email = $_SESSION['email'];
    $this->db->query("UPDATE users SET email = '', password = '' WHERE email = '$email'");
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
