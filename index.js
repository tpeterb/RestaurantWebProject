const whyUsSlideshow = document.getElementsByClassName("whyUsSlideshow")[0];
console.log(whyUsSlideshow);

const whyUsSlideshowPages = document.getElementsByClassName("whyUsSlideshowPage");
whyUsSlideshowPages[0].classList.add("activeSlide");

const leftArrows = document.getElementsByClassName("leftArrow");
const rightArrows = document.getElementsByClassName("rightArrow");
const page1Buttons = document.getElementsByClassName("page1Button");
const page2Buttons = document.getElementsByClassName("page2Button");
const page3Buttons = document.getElementsByClassName("page3Button");
const slideImages = ["slide1.jpg", "slide2.jpg", "slide3.jpg"];

page1Buttons[0].classList.add("activePageButton");

var slideshowPageIndex = 0;
var slideshowTimer = setInterval(changeSlide, 4000);

for (var x = 0; x < leftArrows.length; x++) {
    leftArrows[x].addEventListener("click", () => {
        whyUsSlideshowPages[slideshowPageIndex].classList.remove("activeSlide");

        whyUsSlideshowPages[slideshowPageIndex--].style.display = "none";
        if (slideshowPageIndex < 0) {
            slideshowPageIndex = whyUsSlideshowPages.length - 1;
        }
        whyUsSlideshowPages[slideshowPageIndex].style.display = "grid";
        whyUsSlideshowPages[slideshowPageIndex].classList.add("activeSlide");
        resetSlideshowTimer();
    });
}

for (var x = 0; x < rightArrows.length; x++) {
    rightArrows[x].addEventListener("click", () => {
        whyUsSlideshowPages[slideshowPageIndex].classList.remove("activeSlide");
        whyUsSlideshowPages[slideshowPageIndex++].style.display = "none";
        if (slideshowPageIndex >= whyUsSlideshowPages.length) {
            slideshowPageIndex = 0;
        }
        whyUsSlideshowPages[slideshowPageIndex].style.display = "grid";
        whyUsSlideshowPages[slideshowPageIndex].classList.add("activeSlide");
        resetSlideshowTimer();
    });
}

for (var x = 0; x < page1Buttons.length; x++) {
    page1Buttons[x].addEventListener("click", () => {
        handleSlideShowPageButton(0);
    });
}

for (var x = 0; x < page2Buttons.length; x++) {
    page2Buttons[x].addEventListener("click", () => {
        handleSlideShowPageButton(1);
    });
}

for (var x = 0; x < page3Buttons.length; x++) {
    page3Buttons[x].addEventListener("click", () => {
        handleSlideShowPageButton(2);
    });
}

for (var x = 1; x < whyUsSlideshowPages.length; x++) {
    whyUsSlideshowPages[x].style.display = "none";
}

function changeSlide() {
    whyUsSlideshowPages[slideshowPageIndex].classList.remove("activeSlide");
    whyUsSlideshowPages[slideshowPageIndex++].style.display = "none";
    if (slideshowPageIndex >= whyUsSlideshowPages.length) {
        slideshowPageIndex = 0;
    }
    whyUsSlideshowPages[slideshowPageIndex].style.display = "grid";
    whyUsSlideshowPages[slideshowPageIndex].classList.add("activeSlide");
}

function handleSlideShowPageButton(slideshowIndex) {
    if (whyUsSlideshowPages[slideshowIndex].classList.contains("activeSlide")) {
        resetSlideshowTimer();
        return;
    }
    const activeSlide = document.getElementsByClassName("activeSlide")[0];
    activeSlide.style.display = "none";
    activeSlide.classList.remove("activeSlide");
    whyUsSlideshowPages[slideshowIndex].style.display = "grid";
    whyUsSlideshowPages[slideshowIndex].classList.add("activeSlide");
    slideshowPageIndex = slideshowIndex;
    whyUsSlideshow.style.backgroundImage = `url('${slideImages[slideshowIndex]}')`;
    resetSlideshowTimer();
}

function resetSlideshowTimer() {
    clearInterval(slideshowTimer);
    slideshowTimer = setInterval(changeSlide, 4000);
}

const cookieAcceptButton = document.querySelector(".cookieAcceptButton");

cookieAcceptButton.addEventListener("click", () => {
    const cookieContainer = document.querySelector(".cookies");
    cookieContainer.style.display = "none";
});

