const imgContainer = document.querySelectorAll(".img-container");
let counter = 0;

function slide() {
    imgContainer.forEach(function (slide) {
        slide.style.transform = `translateX(-${counter * 100}%)`;
    })
}

function next() {
    if (counter < imgContainer.length - 3) {
        counter++;
        slide();
    }

}
function pre() {
    counter--;
    slide();
}