<?php
include_once 'inc/header.php';
if (isset($_SESSION['email'])) {
  header("Location: account.php");
}
?>

<main>
  <section>
    <div class="registerbox">
      <h1 class="title">Inscription</h1>
      <form method="POST" action="../controller/user.php">
        <input type="hidden" name="type" value="register">
        <div class="user-details">
          <div class="input-box">
            <label for="lastname">Nom</label>
            <input type="text" id="lastname" name="lastname" placeholder="Entrer votre nom">
          </div>
          <div class="input-box">
            <label for="firstname">Prénom</label>
            <input type="text" id="firstname" name="firstname" placeholder="Entrer votre prénom">
          </div>
          <div class="input-box">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Entrer votre adresse email">
          </div>
          <div class="input-box">
            <label for="birthdate">Anniversaire</label>
            <input type="date" id="birthdate" name="birthdate">
          </div>
          <div class="input-box">
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" placeholder="Entrer votre mot de passe">
          </div>
          <div class="input-box">
            <label for="repassword">Confirmer mot de passe</label>
            <input type="password" id="repassword" name="repassword" placeholder="Confirmer votre mot de passe">
          </div>
          <div class="input-box">
            <label for="city">Ville</label>
            <input type="text" id="city" name="city" placeholder="Entrer votre ville">
          </div>
          <div class="input-box">
            <label for="loisir">Loisir</label>
            <input type="text" id="loisir" name="loisir" placeholder="Entrer un loisir">
          </div>
          <div class="gender-details">
            <span class="gender-title">Genre</span>
            <div class="category">
              <div class="radio-input">
                <input type="radio" id="male" name="gender" value="Homme" checked>
                <label for="male">Homme</label>
              </div>
              <div class="radio-input">
                <input type="radio" id="female" name="gender" value="Femme">
                <label for="female">Femme</label>
              </div>
              <div class="radio-input">
                <input type="radio" id="other" name="gender" value="Autre">
                <label for="other">Autre</label>
              </div>
            </div>
          </div>
        </div>
        <div class="button">
          <input type="submit" name="submit" value="S'inscrire">
        </div>
        <a href="login.php">Se connecter</a>
      </form>
    </div>
  </section>
</main>

<?php
include_once 'inc/footer.php';
?>