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

require __DIR__ . '/header.php';
?>
<link rel="stylesheet" href="assets/css/index.css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js"></script>
<header>
  <div class="username-profile">
    <img class="username-profile__img" src="assets/img/pokebola-icon.png" alt="Ícone Pokebola">
    <div class="username-profile__name"><?php echo $user->getUsername()?></div>
  </div>
  <h1 class="logo">
    <img alt="Logo do jogo da memória" src="assets/img/pokemon-logo.png">
  </h1>
  <div class="setting-item">
    Configurações
    <img onclick="openOrCloseMenu()" class="settings-item__icon"
      src="assets/img/settings-button.png" alt="Ícone configurações">
  </div>
</header>

<main>

  <div class="option">
    <div class="option__btn">
      <img class="option__icon" alt="Botão de tamanho do tabuleiro" src="assets/img/board-size.png">
      <span class="option__text">Tamanho do tabuleiro</span>
    </div>
    <ul class="option__list display">
      <li onclick="changeSizeBoard(2)" class="option__item option__item--selected">
        <img class="option__pokebola" src="assets/img/pokebola-icon.png"
          alt="Ícone Pokebola">
          2 x 2
        </li>
      <li onclick="changeSizeBoard(4)" class="option__item">
        <img class="option__pokebola" src="assets/img/pokebola-icon.png"
          alt="Ícone Pokebola">
          4 x 4</li>
      <li onclick="changeSizeBoard(6)" class="option__item">
        <img class="option__pokebola" src="assets/img/pokebola-icon.png"
          alt="Ícone Pokebola">6 x 6</li>
      <li onclick="changeSizeBoard(8)" class="option__item">
        <img class="option__pokebola" src="assets/img/pokebola-icon.png"
          alt="Ícone Pokebola">8 x 8</li>
    </ul>
  </div>

  <div class="option">
    <div class="option__btn">
      <img class="option__icon" alt="Botão de modo de jogo"
        src="assets/img/game-mode.png">
      <span class="option__text">Modo de jogo</span>
    </div>
    <ul class="option__list display">
      <li onclick="changeGameMode('classic')" class="option__item option__item--selected">
        <img class="option__pokebola" src="assets/img/pokebola-icon.png"
          alt="Ícone Pokebola">
        Clássico</li>
      <li onclick="changeGameMode('against-time')" class="option__item">
        <img class="option__pokebola" src="assets/img/pokebola-icon.png"
          alt="Ícone Pokebola">
        Contra-tempo</li>
    </ul>
  </div>

  <div class="option">
    <div class="option__btn">
      <img class="option__icon" alt="Botão de trapaça"
        src="assets/img/reveal-cards.png">
      <span class="option__text">Trapaça</span>
    </div>
    <ul class="option__list display">
      <li onclick="revealAllCards()" class="option__item">
        <img class="option__pokebola" src="assets/img/pokebola-icon.png"
          alt="Ícone Pokebola">
          Mostrar jogo</li>
      <li id="unrevealAllCards" onclick="unrevealAllCards()" class="option__item">
        <img class="option__pokebola" src="assets/img/pokebola-icon.png"
          alt="Ícone Pokebola">
          Resetar jogo</li>
    </ul>
  </div>

  <div class="game">
    <div class="game__header">
      <div class="game__clock">
        <img src="assets/img/clock.png" alt="Ícone relógio">
        <span id="second">0</span>s
      </div>
    </div>
    <div class="game__board game__board--2">
      <!-- <div class="game__card game__card--2">
        <div class="game__card-inner">
          <div class="game__card-front">
            <img class="game__card-content" alt="Imagem do verso do card"
              src="assets/img/card-verse.png">
          </div>
          <div class="game__card-back">
            <img class="game__card-content" alt="Imagem do card"
              src="assets/img/pikachu-card.png">
          </div>
        </div>
      </div> -->
    </div>
  </main>

</main>

<aside class="menu menu--closed">
  <div onclick="location.href='ranking.php'" class="menu-item">
    <img class="menu-item__img" src="assets/img/pokebola-icon.png" alt="Ícone Pokebola">
    <div class="menu-item__title">Ranking</div>
  </div>
  <div onclick="location.href='historico.php'" class="menu-item">
    <img class="menu-item__img" src="assets/img/pokebola-icon.png" alt="Ícone Pokebola">
    <div class="menu-item__title">Histórico</div>
  </div>
  <div onclick="location.href='atualizar.php?id=<?php echo $user->getId()?>'" class="menu-item">
    <img class="menu-item__img" src="assets/img/pokebola-icon.png" alt="Ícone Pokebola">
    <div class="menu-item__title">Editar Perfil</div>
  </div>
  <div onclick="location.href='login.php?exit=true'" class="menu-item">
    <img class="menu-item__img" src="assets/img/pokebola-icon.png" alt="Ícone Pokebola">
    <div class="menu-item__title">Sair</div>
  </div>
</aside>

<div class="modal modal--against-time">
  <div class="modal-result">
    <div class="modal-result__cards-correct">
      Você encontrou <span id="pairOfCardsFound">...</span> de <span
        id="totalPairOfCard">...</span>
    </div>
    <div class="modal-result__time">
      Sua pontuação foi <span id="finalTime"></span>
    </div>

    <img class="modal__pokebola" src="assets/img/pokebola-icon.png">
    <hr>

    <div class="modal__buttons">
      <button onclick="closeModal()" class="modal__button modal__button--close">
        Fechar
      </button>
      <button onclick="playAgain()" class="modal__button modal__button--play-again">
        Jogar denovo
      </button>
    </div>
  </div>
</div>

<script src="assets/js/cards.js"></script>
<script src="assets/js/config-game.js"></script>
<script src="assets/js/menu.js"></script>
<script src="assets/js/timer.js"></script>
<script src="assets/js/index.js"></script>
<?php
require __DIR__ . '/footer.php';
