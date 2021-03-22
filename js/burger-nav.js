let navMenu = document.getElementById("nav-list");
let burger = document.getElementById("burger");

function burgerMenu() {
    navMenu.classList.toggle("active");
    navMenu.classList.add("nav-menu-small");
    navMenu.style.display = "flex";
    burger.classList.toggle("toX");
}
navMenu.classList.remove("nav-menu-small");
burger.classList.remove("toX");
