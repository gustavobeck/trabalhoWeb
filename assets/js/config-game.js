const unrevealAllCardsBtn = document.querySelector("#unrevealAllCards");

function changeGameMode(mode) {
  clearInterval(timer);
  gameMode = mode;
  removeCards();
  initGame();
}

function changeSizeBoard(size) {
  removeCards();
  sizeBoard = size;
  clearInterval(timer);
  initGame();
}

function revealAllCards() {
  cards.forEach(item => {
    if (!item.classList.contains('game__card--flipped')) {
      item.firstElementChild.classList.add('game__card--revealed')
    }
  })
}

function unrevealAllCards() {
  unrevealAllCardsBtn.classList.remove('option__item--selected')
  cards.forEach(item => {
    if (item.firstElementChild.classList.contains('game__card--revealed')) {
      item.firstElementChild.classList.remove('game__card--revealed')
    }
  })
}
