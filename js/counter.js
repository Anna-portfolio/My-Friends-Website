let valueOne = document.getElementById("counter-value1");
let valueTwo = document.getElementById("counter-value2");
let valueThree = document.getElementById("counter-value3");

valueOne.innerHTML = "700000";
valueTwo.innerHTML = "100000";
valueThree.innerHTML = "2000";

function getCount() {
    function getCounterOne() {
        let i = 700000;
        let intervalOne;

        function counterOne() {
            let valueOneInt = 1500000;
            if (i >= valueOneInt) {
                clearInterval(intervalOne);
            }

            valueOne.innerHTML = i;
            i = i + 10000;
        }

        intervalOne = setInterval(counterOne, 25);
    }
    function getCounterTwo() {
        let j = 100000;
        let intervalTwo;

        function counterTwo() {
            let valueTwoInt = 300000;
            if (j >= valueTwoInt) {
                clearInterval(intervalTwo);
            }

            valueTwo.innerHTML = "+" + j;
            j = j + 2000;
        }

        intervalTwo = setInterval(counterTwo, 20);
    }
    function getCounterThree() {
        let k = 2000;
        let intervalThree;

        function counterThree() {
            let valueThreeInt = 70000;
            if (k >= valueThreeInt) {
                clearInterval(intervalThree);
            }

            valueThree.innerHTML = k;
            k = k + 1000;
        }

        intervalThree = setInterval(counterThree, 25);
    }

    getCounterOne();
    getCounterTwo();
    getCounterThree();
}

window.addEventListener("scroll", () => {
    if (this.pageYOffset > window.screen.availHeight) {
        getCount();
        //replaces getCount() with an empty function, so that it is called only once
        getCount = function () {};
    }
});
