<?php

/**
 * @file
 */

require __DIR__ . '/bootstrap.php';

use Service\Container;

if ($_GET["exit"]) {
  setcookie("id", "", time() - (3600 * 24 * 30));
}
if ($_POST['login']) {
  $container = new Container($config);
  $email = $_POST['email'];
  $password = $_POST['password'];
  $userLoader = $container->getUserLoader();
  $user = $userLoader->findUserByEmail($email);

  if ($user) {
    if ($user->getPassword() === $password) {
      setcookie("id", $user->getId(), time() + (3600 * 24 * 30));
      header('Location: index.php');
    }
    else {
      ?> <script>alert("Senha errada! Digite a senha correta.")</script>
    <?php }
  }
  else {
    ?> <script>alert("Usuário não cadastrado!")</script>
  <?php }
}

require __DIR__ . '/header.php';

?>
<link rel="stylesheet" href="assets/css/login.css">
<h1 class="logo">
  <img alt="Logo do jogo da memória"
    src="assets/img/pokemon-logo.png">
</h1>
<div class="msg--erro"></div>
<form class="login" method="post" action="#">
  <label for="email">Email</label>
  <input id="email" name="email" type="email">
  <label for="password">Senha</label>
  <input id="password" name="password" type="password">
  <input type="submit" class="login__submit" name="login" value="Entrar">
</form>
<span class="sign-up-warning">Ainda não tem cadastro? <a href="cadastro.php">Criar uma conta</a></span>
<?php
require __DIR__ . '/footer.php';
