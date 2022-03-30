<?php
include_once 'inc/header.php';
if (isset($_SESSION['email'])) {
  header("Location: account.php");
}
?>

<main>
  <section>
    <div class="loginbox">
      <i class="fas fa-user avatar"></i>
      <h1 class="title">Connexion</h1>
      <form method="POST" action="../controller/user.php">
        <input type="hidden" name="type" value="login">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Entrer votre adresse email">
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" placeholder="Entrer votre mot de passe">
        <input type="submit" name="submit" value="Connexion">
        <a href="register.php">S'inscrire</a>
      </form>
    </div>
  </section>
</main>

<?php
include_once 'inc/footer.php';
?>