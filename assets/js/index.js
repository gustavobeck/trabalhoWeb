const optionBtn = document.querySelectorAll(".option__btn");
const optionChoice = document.querySelectorAll(".option__item");

const modal = document.querySelector(".modal");

const pairOfCardsFoundText = document.querySelector("#pairOfCardsFound");
const totalPairOfCardText = document.querySelector('#totalPairOfCard');
const finalTimeText = document.querySelector("#finalTime")

let finishGame = false;

let pairOfCardsToFinishTheGame = 0;

let sizeBoard = 2; // 2x2 is the default size

let gameMode = 'classic';

let timeInit = 60;

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
    item.classList.add("option__item--selected")
  })
})

initGame();

function initGame() {
  setBoard(sizeBoard);
  pairOfCardsToFinishTheGame = 0;
  if (gameMode == 'classic') {
    // minute = 0;
    // minuteText.innerHTML = "00";
    secondText.innerHTML = "00";
    timer = setInterval(classicMode, 1000)
  } else {
    console.log(sizeBoard)
    switch (sizeBoard) {
      case 2:
        timeInit = 1*60;
        second = 1*60;
        break;
      case 4:
        timeInit = 2*60;
        second = 2*60;
        break;
      case 6:
        timeInit = 4*60;
        second = 4*60;
        break;
      case 8:
        timeInit = 8*60;
        second = 8*60;
        break;
    }
    // minuteText.innerHTML = "0" + minute;
    // secondText.innerHTML = "00";
    timer = setInterval(againstTimeMode, 1000)
  }
}

function closeModal() {
  modal.classList.remove('modal--show');
}

function playAgain() {
  location.reload();
}

function matchAjax() {
  $.ajax({
    type: 'POST',
    data: {
      size: sizeBoard,
      mode: gameMode,
      inicialTime: timeInit,
      finalTime: second,
      score: numberOfCardsClicked,
    },
    dataType: 'html',
    url: '../../partidaAjax.php',
    success: function (result) {
      console.log(result);
      modal.classList.add('modal--show');
    },
    error: function () {
      alert("ERRO!");
    }
  });
};
