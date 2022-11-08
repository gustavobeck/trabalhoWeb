const menu = document.querySelector(".menu");
const settingItem = document.querySelector(".setting-item");

function openOrCloseMenu() {
  menu.classList.toggle("menu--closed");
  settingItem.classList.toggle("setting-item--menu-opened");
}
