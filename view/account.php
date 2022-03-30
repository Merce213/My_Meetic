<?php
include_once 'inc/header.php';
if (!isset($_SESSION['email'])) {
  header("Location: login.php");
}
?>

<?php include_once '../controller/account.php'; ?>
<main>
  <section>
    <div class="account_container">
      <h1>Votre compte</h1>
      <p class="info">Nom : <?php $account->get_lastname(); ?> </p>
      <p class="info">Prénom : <?php $account->get_firstname(); ?> </p>
      <p class="info">Date de naissance : <?php $account->get_birthdate(); ?></p>
      <p class="info">Genre : <?php $account->get_gender(); ?></p>
      <p class="info">Email : <?php $account->get_mail(); ?></p>
      <p class="info">Loisir(s) : <?php $account->get_loisir(); ?> </p>
    </div>
  </section>
</main>

<?php
include_once 'inc/footer.php';
?>