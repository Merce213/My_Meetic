<?php session_start() ?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../public/css/style.css">
  <script src="https://kit.fontawesome.com/0b5822fed1.js" crossorigin="anonymous"></script>
  <title>My Meetic</title>
</head>

<body>
  <header>
    <nav>
      <div class="container">
        <div class="navbar">
          <div class="logo">
            <a href="account.php"><img src="../../public/img/logo.png" alt="Logo" class=""></a>
          </div>
          <ul class="flex">
            <?php if (isset($_SESSION['email'])) : ?>
              <li><a href="#" class="account">Mon compte<i class="fas fa-caret-down"></i></a>
                <ul class="sub">
                  <li><a href="account.php" class="">Mes informations</a></li>
                  <li><a href="edit.php" class="">Modifier mon compte</a></li>
                  <li><a href="../../controller/account.php?delete=true" class="">Supprimer mon compte</a></li>
                  <li><a href="../../controller/user.php?logout=true" class="">Déconnexion</a></li>
                </ul>
              </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>

    </nav>
  </header>