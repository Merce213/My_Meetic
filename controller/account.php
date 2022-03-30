<?php
require_once '../model/account.php';
require_once '../helpers/session_helper.php';

class Accounts
{
  private $accountModel;

  public function __construct()
  {
    $this->accountModel = new Account;
  }

  public function get_lastname()
  {
    $this->accountModel->get_lastname();
  }

  public function get_firstname()
  {
    $this->accountModel->get_firstname();
  }

  public function get_birthdate()
  {
    $this->accountModel->get_birthdate();
  }

  public function get_gender()
  {
    $this->accountModel->get_gender();
  }

  public function get_mail()
  {
    $this->accountModel->get_mail();
  }

  public function get_loisir()
  {
    $this->accountModel->get_loisir();
  }

  public function set_email()
  {
    $modify = $this->accountModel->set_email();
    if ($modify) {
      redirect("../view/account.php");
    } else {
      die("Something went wrong");
    }
  }

  public function set_password()
  {
    $modify = $this->accountModel->set_password();
    if ($modify) {
      redirect("../view/account.php");
    } else {
      die("Something went wrong");
    }
  }

  public function delete()
  {
    $this->accountModel->delete();
  }
}

$account = new Accounts;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  switch ($_POST['type']) {
    case 'edit':
      $account->set_email();
      $account->set_password();
      break;
    default:
      redirect("../view/account.php");
  }
} else {
  switch ($_GET['delete']) {
    case 'true':
      $account->delete();
      redirect("../view/welcome.php");
      break;
  }
}
