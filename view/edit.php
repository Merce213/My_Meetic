<?php
include_once 'inc/header.php';
?>
<?php include_once '../controller/account.php'; ?>
<main>
  <section>
    <div class="account_container">
      <form method="POST">
        <input type="hidden" name="type" value="edit">

        <div class="input-box">
          <label for="editEmail">Nouvelle email</label>
          <input type="email" id="editEmail" name="editEmail" placeholder="Modifier votre adresse email">
        </div>

        <div class="input-box">
          <label for="editPassword">Nouveau mot de passe</label>
          <input type="password" id="editPassword" name="editPassword" placeholder="Modifier votre mot de passe">
        </div>

        <div class="input-box">
          <label for="editLoisir">Nouveaux loisir(s)</label>
          <input type="text" id="editLoisir" name="editLoisir" placeholder="Modifier vos loisirs">
        </div>

        <input type="submit" name="submit" value="Modifier">
      </form>
    </div>
  </section>
</main>

<?php
include_once 'inc/footer.php';
?>