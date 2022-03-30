<?php
require_once '../model/user.php';
require_once '../helpers/session_helper.php';

class Users
{
  private $userModel;

  public function __construct()
  {
    $this->userModel = new User;
  }

  public function register()
  {

    $data = [
      'lastname' => htmlspecialchars(trim($_POST['lastname'])),
      'firstname' => htmlspecialchars(trim($_POST['firstname'])),
      'birthdate' => htmlspecialchars(trim($_POST['birthdate'])),
      'gender' => htmlspecialchars(trim($_POST['gender'])),
      'city' => htmlspecialchars(trim($_POST['city'])),
      'email' => htmlspecialchars(trim($_POST['email'])),
      'password' => htmlspecialchars(trim($_POST['password'])),
      'repassword' => htmlspecialchars(trim($_POST['repassword'])),
      'loisir' => htmlspecialchars(trim($_POST['loisir']))
    ];

    if (
      empty($data['lastname']) || empty($data['firstname']) || empty($data['birthdate']) ||
      empty($data['gender']) || empty($data['city']) || empty($data['email']) || empty($data['password']) || empty($data['repassword']) || empty($data['loisir'])
    ) {
      redirect("../view/register.php");
    }

    if (!preg_match("/^[a-zA-Z0-9]*$/", $data['lastname'] || $data['firstname'])) {
      redirect("../view/register.php");
    }

    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
      redirect("../view/register.php");
    }

    if (strlen($data['password']) < 6) {
      redirect("../view/register.php");
    } else if ($data['password'] !== $data['repassword']) {
      redirect("../view/register.php");
    }

    if ($this->userModel->findUserByEmailOrUsername($data['email'])) {
      redirect("../view/register.php");
    }

    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

    $loggedInUser = $this->userModel->register($data);
    if ($loggedInUser) {
      redirect("../view/login.php");
    } else {
      die("Something went wrong");
    }
  }

  public function login()
  {
    $data = [
      'email' => htmlspecialchars(trim($_POST['email'])),
      'password' => htmlspecialchars(trim($_POST['password']))
    ];

    if (empty($data['email']) || empty($data['password'])) {
      redirect("../view/login.php");
    }

    if ($this->userModel->findUserByEmailOrUsername($data['email'])) {
      $loggedInUser = $this->userModel->login($data['email'], $data['password']);
      if ($loggedInUser) {
        $this->createUserSession($loggedInUser);
      } else {
        redirect("../view/login.php");
      }
    } else {
      redirect("../view/login.php");
    }
  }

  public function createUserSession($user)
  {
    $_SESSION['email'] = $user->email;
    redirect("../view/account.php");
  }

  public function logout()
  {
    unset($_SESSION['email']);
    session_destroy();
    redirect("../view/welcome.php");
  }
}

$init = new Users;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  switch ($_POST['type']) {
    case 'register':
      $init->register();
      break;
    case 'login':
      $init->login();
      break;
    default:
      redirect("../view/welcome.php");
  }
} else {
  switch ($_GET['logout']) {
    case 'true':
      $init->logout();
      break;
    default:
      redirect("../view/welcome.php");
  }
}
