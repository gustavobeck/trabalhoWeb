<?php

/**
 * @file
 */

use Service\Container;

require __DIR__ . '/bootstrap.php';

if (!isset($_COOKIE['id'])) {
  header("Location: login.php");
}

$container = new Container($config);
$userLoader = $container->getUserLoader();
$user = $userLoader->findUserById($_COOKIE["id"]);

$gameMatchLoader = $container->getGameMatchLoader();
$gameMatches = $gameMatchLoader->getGameMatchesHistory($_COOKIE["id"]);

require __DIR__ . '/header.php';
?>
<link rel="stylesheet" href="assets/css/index.css">
<link rel="stylesheet" href="assets/css/ranking.css">
<link rel="stylesheet" href="assets/css/historico.css">
<header>
  <div class="username-profile">
    <img class="username-profile__img" src="assets/img/pokebola-icon.png"
      alt="Ícone Pokebola">
    <div class="username-profile__name"><?php echo $user->getUsername()?></div>
  </div>
  <img class="logo" alt="Logo do jogo da memória" src="assets/img/pokemon-logo.png">
  <img onclick="location.href='index.php'" class="close-icon" src="assets/img/close-button.png" alt="Ícone de Fechar">
</header>
<main>
  <h2 class="ranking__title">Histórico</h2>
  <div class="ranking">
    <?php foreach ($gameMatches as $gameMatch) : ?>
      <div class="ranking__item">
        <img class="ranking__img" src="assets/img/pokebola-icon.png" alt="Imagem Pokebola">
        <div class="ranking__username"><?php echo $gameMatch->getSize() . ' x ' . $gameMatch->getSize() ?></div>
        <div class="ranking__username"><?php echo $gameMatch->getMode()?></div>
        <div class="ranking__username"><?php echo $gameMatch->getTime()?>s</div>
        <div class="ranking__username"><?php echo $gameMatch->getScore()?> jogadas</div>
        <div class="ranking__username"><?php echo $gameMatch->getDate()->format("d/m/Y")?></div>
      </div>
    <?php endforeach; ?>
  </div>

</main>
<?php
require __DIR__ . '/footer.php';
