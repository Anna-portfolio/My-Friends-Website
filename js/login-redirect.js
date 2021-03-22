let redirectCounter = document.querySelector(".redirect-counter");

let counter = 20;

timerId = setInterval(timer, 1000);

function timer() {
    counter--;
    redirectCounter.innerText = counter;
    if (counter === 0) {
        window.location.assign("browse-friends.php");
    }
}

timer();
