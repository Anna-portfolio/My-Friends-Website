let header = document.querySelectorAll(
    ".faq-container__section__accordion__item__title",
);
let answer = document.querySelectorAll(
    ".faq-container__section__accordion__item__content",
);
let tick = document.querySelectorAll(
    ".faq-container__section__accordion__item__image",
);

for (let i = 0; i < header.length; i++) {
    header[i].addEventListener("click", () => {
        if (answer[i].style.display === "flex") {
            answer[i].style.animation = "hideAnswer 0.5s ease-in";
            tick[i].style.animation = "tickRotateOut 0.5s ease-in";
            tick[i].classList.remove("image-upside-down");

            setTimeout(() => {
                answer[i].style.display = "none";
            }, 500);
        } else {
            answer[i].style.display = "flex";
            answer[i].style.animation = "showAnswer 0.5s ease-in";
            tick[i].style.animation = "tickRotateIn 0.5s ease-in";
            tick[i].classList.add("image-upside-down");
        }
    });
}
