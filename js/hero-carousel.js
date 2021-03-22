let heroOne = document.getElementById("vid-01");
let heroTwo = document.getElementById("vid-02");
let heroThree = document.getElementById("vid-03");

let heroArray = [];
heroArray.push(heroOne, heroTwo, heroThree);

let heroId = -1;
getHero();

function getHero() {
    for (let i = 0; i < heroArray.length; i++) {
        heroArray[i].classList.remove("hero-active");
        heroArray[i].autoplay = "false";
        heroArray[i].currentTime = 0;
    }
    heroId++;
    if (heroId > heroArray.length - 1) {
        heroId = 0;
    }
    heroArray[heroId].classList.add("hero-active");
    heroArray[heroId].autoplay = "true";
    setTimeout(getHero, 10000);
}
