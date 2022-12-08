<?php

/**
 * @file
 */

use Service\Container;

require __DIR__ . '/bootstrap.php';

$container = new Container($config);
$userLoader = $container->getUserLoader();
$user = $userLoader->findUserById($_COOKIE["id"]);

if ($_POST['atualizar']) {
  $user->setName($_POST['name']);
  $user->setEmail($_POST['email']);
  $user->setPhone($_POST['phone']);
  $user->setPassword($_POST['password']);

  if ($container->updateUser($user)) { ?>
    <script>alert("Alterado com sucesso!")</script>
  <?php }
  else { ?>
    <script>alert("Erro ao alterar!")</script>
  <?php }

}

require __DIR__ . '/header.php';

?>
<link rel="stylesheet" href="assets/css/cadastro.css">
<img onclick="location.href='index.php'" class="close-icon close-icon--atualizar-page" src="assets/img/close-button.png" alt="Ícone de Fechar">
<h1 class="logo">
  <img alt="Logo do jogo da memória" src="assets/img/pokemon-logo.png">
</h1>
<form class="sign-up" method="post" action="#">
  <label class="label" for="name">Nome Completo</label>
  <input id="name" name="name" class="input" type="text" value="<?php echo $user->getName()?>">
  <fieldset>
    <label class="label label1" for="birthday">Data de Nascimento</label>
    <input disabled id="birthday" name="birthday" class="input input1" type="date" value="<?php echo $user->getBirthday()->format("Y-m-d")?>">
    <label class="label label2" for="cpf">CPF</label>
    <input disabled onkeyup="handleCpf(event)" maxlength="14" id="cpf" name="cpf" class="input input2" type="text" value="<?php echo $user->getCpf()?>">
  </fieldset>
  <fieldset>
    <label class="label label1" for="email">Email</label>
    <input id="email" name="email" class="input input1" type="text" value="<?php echo $user->getEmail()?>">
    <label class="label label2" for="phone">Telefone</label>
    <input onkeyup="handlePhone(event)" id="phone" name="phone" class="input input2" type="tel" value="<?php echo $user->getPhone()?>">
  </fieldset>
  <fieldset>
    <label class="label label1" for="username">Username</label>
    <input disabled id="username" name="username" class="input input1" type="text" value="<?php echo $user->getUsername()?>">
    <label class="label label2" for="password">Senha</label>
    <input id="password" name="password" class="input input2" type="password" value="<?php echo $user->getPassword()?>">
  </fieldset>
  <input type="submit" name="atualizar" value="Atualizar">
</form>
<script src="assets/js/regex.js"></script>
<?php
require __DIR__ . '/footer.php';
