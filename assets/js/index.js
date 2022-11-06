const menu = document.querySelector(".menu");
const settingItem = document.querySelector(".setting-item");

const optionBtn = document.querySelectorAll(".option__btn");
const optionChoice = document.querySelectorAll(".option__item");

const gameBoard = document.querySelector(".game__board");

createCards(2); // 2x2 is the default size

optionBtn.forEach(item => {
  item.addEventListener('click', () => {
    item.parentElement.lastElementChild.classList.toggle("display")
  });
})

optionChoice.forEach(item => {
  item.addEventListener('click', () => {
    let optionItemParent = item.parentElement.children;
    for (let i = 0; i < optionItemParent.length; i++) {
      optionItemParent[i].classList.remove("option__item--selected")
    }

    // optionItemParent.removeAttribute("option__item--selected");
    item.classList.add("option__item--selected")
  })
})

function openOrCloseMenu() {
  menu.classList.toggle("menu--closed");
  settingItem.classList.toggle("setting-item--menu-opened");
}

function changeSizeBoard(sizeBoard) {
  removeCards();
  createCards(sizeBoard);
}

function createCards(sizeBoard) {
  // To-do: Adicionar lista de cartas, duplicar lista e embaralhar

  let listOfCards = ['pikachu', 'bulbassaur'];
  let cloneListOfCards = listOfCards;

  listOfCards = listOfCards.concat(cloneListOfCards);

  console.log(listOfCards);

  gameBoard.setAttribute("class", "game__board game__board--" + sizeBoard)
  for(let i = 0; i < (sizeBoard ** 2); i++) {
    let gameCard = document.createElement("div")
    gameCard.setAttribute("class", "game__card game__card--" + sizeBoard)
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
    imgBack.setAttribute("src", "assets/img/pikachu-card.png")
    gameCardBack.appendChild(imgBack)

    let imgFront = document.createElement("img")
    imgFront.setAttribute("class", "game__card-content")
    imgFront.setAttribute("src", "assets/img/card-verse.png")
    gameCardFront.appendChild(imgFront)
  }

  const cards = document.querySelectorAll(".game__card");

  let cardsFlipped = 0;
  let firstCard;
  let secondCard;

  cards.forEach(item => {
    item.addEventListener('click', () => {
      if (!item.classList.contains('game__card--flipped')) {
        cardsFlipped++;
        if (cardsFlipped == 1)  {
            firstCard = item;
        } else if (cardsFlipped == 2 && firstCard != item) {
          secondCard = item;
          verifyCards(firstCard, secondCard);
          cardsFlipped = 0;
        }
      }
      item.firstElementChild.classList.toggle("game__card--flipped")
    })
  })
}



function verifyCards(firstCard, secondCard) {
  if (firstCard.innerHtml == secondCard.innerHtml) {
    firstCard.firstElementChild.classList.add("game__card--blocked")
    secondCard.firstElementChild.classList.add("game__card--blocked")
  } else {
    firstCard.firstElementChild.classList.toggle("game__card--flipped")
    secondCard.firstElementChild.classList.toggle("game__card--flipped")
  }
}

function removeCards() {
  let cards = document.querySelectorAll(".game__card");
  cards.forEach(item => {
    item.remove();
  })
}

