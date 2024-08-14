function page1animation() {
    var tl = gsap.timeline();

    tl.from(".logo img", {
        opacity: 0,
        duration: 0.7,
    });
    tl.from(".logo h3", {
        y: -30,
        opacity: 0,
        duration: 0.8,
    });
    tl.from("nav a", {
        y: -30,
        opacity: 0,
        duration: 1,
        stagger: 0.2
    });
    tl.from(".login a", {
        y: -30,
        opacity: 0,
        duration: 0.8,
        stagger: 0.2
    });
    tl.from(".theme-button",{
        opacity: 0,
        duration: 0.8,
        stagger: 0.2
    });
    tl.from(".search-section", {
        opacity: 0,
        duration: 0.6,
        stagger: 0.2
    });
}

page1animation();


var btn = document.querySelector(".theme-button");
var darkIcon = document.querySelector('.dark-icon');
var lightIcon = document.querySelector('.light-icon');

let theme = 0;

btn.addEventListener("click", function () {
    if (theme === 0) {
        document.body.classList.add("dark");
        darkIcon.style.display = "none";
        lightIcon.style.display = "block";
        theme = 1;
    } else {
        document.body.classList.remove("dark");
        lightIcon.style.display = "none";
        darkIcon.style.display = "block";
        theme = 0;
    }
});