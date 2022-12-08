const minuteText = document.querySelector("#minute");
const secondText = document.querySelector("#second");

// minuteText.innerHTML = "00";
// secondText.innerHTML = "00";
let second = 0;
// let minute = 0;
let timer;

function classicMode() {
  // if (second == 59) {
  //   second = 0;
  //   minute++;
  //   secondText.innerHTML = "00";
  //   if (minute < 10) {
  //     minuteText.innerHTML = "0" + minute;
  //   } else {
  //     minuteText.innerHTML = minute;
  //   }
  // } else {
  second++;
  if (second < 10) {
    secondText.innerHTML = "0" + second;
  } else {
    secondText.innerHTML = second;
  }
}

function againstTimeMode() {
  if (second == 0 && minute == 0) {
    clearInterval(timer);
    pairOfCardsFoundText.innerHTML = pairOfCardsToFinishTheGame;
    totalPairOfCardText.innerHTML = (sizeBoard ** 2) / 2;
    finalTimeText.innerHTML = minuteText.innerHTML + ":" + secondText.innerHTML;
    modal.classList.add('modal--show');
  }
  else if (second == 0) {
    second = 59;
    minute--;
    secondText.innerHTML = second;
    minuteText.innerHTML = "0" + minute;
  } else {
    second--;
    if (second < 10) {
      secondText.innerHTML = "0" + second;
    } else {
      secondText.innerHTML = second;
    }
  }
}
