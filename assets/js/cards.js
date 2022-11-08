const listOfCards = [
  'bellsprout',
  'bulbassaur',
  'carterpie',
  'charmander',
  'clefairy',
  'diglett',
  'ekans',
  'geodude',
  'growlithe',
  'jigglypuff',
  'machop',
  'mankey',
  'meowth',
  'nidoran-masc',
  'nidoran-fem',
  'oddish',
  'paras',
  'pidgey',
  'pikachu',
  'poliwag',
  'ponyta',
  'psyduck',
  'rattata',
  'sandshrew',
  'slowpoke',
  'spearow',
  'squirtle',
  'tentacool',
  'venonat',
  'vulpix',
  'weedle',
  'zubat'
];

let cards = '';

const gameBoard = document.querySelector(".game__board");

function setBoard(sizeBoard) {
  let cardsFromList = listOfCards.sort(() => Math.random() - 0.5)

  cardsFromList.splice((sizeBoard ** 2) / 2)
  let cardsFromListCopy = cardsFromList;
  cardsFromList = cardsFromList.concat(cardsFromListCopy);
  cardsFromList.sort(() => Math.random() - 0.5);

  gameBoard.setAttribute("class", "game__board game__board--" + sizeBoard)
  for (let i = 0; i < (sizeBoard ** 2); i++) {
    createCard(cardsFromList[i]);
  }

  cards = document.querySelectorAll(".game__card");

  let cardsFlipped = 1;
  let firstCard;
  let secondCard;

  cards.forEach(item => {
    item.addEventListener('click', () => {
      if (!item.classList.contains('game__card--flipped')) {
        if (cardsFlipped == 1) {
          item.firstElementChild.classList.toggle("game__card--flipped")
          firstCard = item;
          firstCard.firstElementChild.classList.add("game__card--blocked")
          cardsFlipped++;
        } else if (cardsFlipped == 2 && firstCard != item) {
          item.firstElementChild.classList.toggle("game__card--flipped")
          secondCard = item;
          verifyCards(firstCard, secondCard);
          cardsFlipped = 1;
        }
      }
    })
  })
}

function createCard(card) {
  let gameCard = document.createElement("div")
  gameCard.setAttribute("class", "game__card")
  gameCard.setAttribute("pokemonName", card)
  gameBoard.appendChild(gameCard);

  let gameCardInner = document.createElement("div")
  gameCardInner.setAttribute("class", "game__card-inner")
  gameCard.appendChild(gameCardInner)

  let gameCardFront = document.createElement("div")
  gameCardFront.setAttribute("class", "game__card-front")
  gameCardInner.appendChild(gameCardFront)

  let gameCardBack = document.createElement("div")
  gameCardBack.setAttribute("class", "game__card-back")
  gameCardInner.appendChild(gameCardBack)

  let imgBack = document.createElement("img")
  imgBack.setAttribute("class", "game__card-content")
  imgBack.setAttribute("src", "assets/img/cards/" + card + ".png")
  gameCardBack.appendChild(imgBack)

  let imgFront = document.createElement("img")
  imgFront.setAttribute("class", "game__card-content")
  imgFront.setAttribute("src", "assets/img/card-verse.png")
  gameCardFront.appendChild(imgFront)
}

function verifyCards(firstCard, secondCard) {
  firstCard.firstElementChild.classList.remove("game__card--blocked")
  secondCard.firstElementChild.classList.remove("game__card--blocked")
  if (firstCard.getAttribute('pokemonName') === secondCard.getAttribute('pokemonName')) {
    firstCard.firstElementChild.classList.add("game__card--blocked")
    secondCard.firstElementChild.classList.add("game__card--blocked")
    pairOfCardsToFinishTheGame++;
    // Stop the game when all the cards are revealed
    if (pairOfCardsToFinishTheGame == ((sizeBoard ** 2) / 2)) {
      clearInterval(timer);
      pairOfCardsFoundText.innerHTML = pairOfCardsToFinishTheGame;
      totalPairOfCardText.innerHTML = (sizeBoard ** 2) / 2;
      finalTimeText.innerHTML = minuteText.innerHTML + ":" + secondText.innerHTML;
      modal.classList.add('modal--show');
    }
    return 1;
  } else {
    setTimeout(() => {
      firstCard.firstElementChild.classList.toggle("game__card--flipped")
      secondCard.firstElementChild.classList.toggle("game__card--flipped")
    }, 1000)
  }
}

function removeCards() {
  let cards = document.querySelectorAll(".game__card");
  cards.forEach(item => {
    item.remove();
  })
}
