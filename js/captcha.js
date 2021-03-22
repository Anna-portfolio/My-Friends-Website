let captchaPic = document.querySelector("#captcha-pic-container").children;
let captchaPicContainer = document.getElementById("captcha-pic-container");
let captchaBtn = document.getElementById("captcha-btn");
let captchaContainer = document.querySelector("#captcha-container");
let captchaError = document.getElementById("captcha-error");

let picArray = [];
let randomArray = [];

for (let i = 0; i < captchaPic.length; i++) {
    picArray.push(captchaPic[i]);
    randomArray.push(captchaPic[i]);
}

function getCaptchaContainer() {
    captchaBtn.addEventListener("click", () => {
        captchaContainer.style.display = "flex";
    });
}

getCaptchaContainer();

//gets a random order of CAPTCHA images (ids remain the same)
function randomPic() {
    for (let j = 0; j < randomArray.length; j++) {
        captchaPicContainer.appendChild(
            randomArray.splice(
                Math.floor(Math.random() * randomArray.length),
                1,
            )[0],
        );
    }
}

randomPic();

function captchaClick() {
    let correctAnswer = picArray[0];
    correctAnswer.addEventListener("click", () => {
        captchaContainer.style.display = "none";
        captchaBtn.checked = true;
        captchaError.innerText = "";
    });

    let wrongAnswers = picArray;
    wrongAnswers.shift();

    for (let i = 0; i < wrongAnswers.length; i++) {
        wrongAnswers[i].addEventListener("click", () => {
            captchaContainer.style.display = "none";
            captchaBtn.checked = false;
            captchaError.innerText = "This field is required";
        });
    }
}
captchaClick();
