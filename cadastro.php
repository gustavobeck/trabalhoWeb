<?php

/**
 * @file
 */

require __DIR__ . '/bootstrap.php';

use Model\User;
use Service\Container;

if ($_POST['cadastro']) {
  $container = new Container($config);
  $name = $_POST['name'];
  $birthday = DateTime::createFromFormat("Y-m-d", $_POST['birthday']);
  $cpf = $_POST['cpf'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  $user = new User(NULL, $name, $birthday, $cpf, $email, $phone, $username, $password);

  if ($container->setUser($user)) {
    header('Location: login.php');
  }

}
require __DIR__ . '/header.php';

?>
<link rel="stylesheet" href="assets/css/cadastro.css">
<h1 class="logo">
  <img alt="Logo do jogo da memória" src="assets/img/pokemon-logo.png">
</h1>
<form class="sign-up" method="post" action="#">
  <label class="label" for="name">Nome Completo</label>
  <input id="name" name="name" class="input" type="text">
  <fieldset>
    <label class="label label1" for="birthday">Data de Nascimento</label>
    <input id="birthday" name="birthday" class="input input1" type="date">
    <label class="label label2" for="cpf">CPF</label>
    <input onkeyup="handleCpf(event)" maxlength="14" id="cpf" name="cpf" class="input input2" type="text">
  </fieldset>
  <fieldset>
    <label class="label label1" for="email">Email</label>
    <input id="email" name="email" class="input input1" type="text">
    <label class="label label2" for="phone">Telefone</label>
    <input onkeyup="handlePhone(event)" maxlength="15" id="phone" name="phone" class="input input2" type="tel">
  </fieldset>
  <fieldset>
    <label class="label label1" for="username">Username</label>
    <input id="username" name="username" class="input input1" type="text">
    <label class="label label2" for="password">Senha</label>
    <input id="password" name="password" class="input input2" type="password">
  </fieldset>
  <input type="submit" name="cadastro" value="Cadastrar">
</form>
<script src="assets/js/regex.js"></script>
<?php
require __DIR__ . '/footer.php';
