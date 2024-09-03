// const imgContainer = document.querySelectorAll(".img-container");
// let counter = 0;

// function slide() {
//     imgContainer.forEach(function (slide) {
//         slide.style.transform = `translateX(-${counter * 100}%)`;
//     })
// }

// function next() {
//     if (counter < imgContainer.length - 3) {
//         counter++;
//         slide();
//     }

// }

// function pre() {
//     counter--;
//     slide();
// }

function loader(){
    var lTimeline = gsap.timeline();
    
    function time() {
        var a = 0;
        var interval = setInterval(function () {
            if (a < 100 ) {
                a = a + Math.floor(Math.random() * 20);
                if(a > 100){
                    a = 100;
                }
                document.querySelector(".loader h1").innerHTML = a + "%";
            } else {
                a=100;
                clearInterval(interval);
            }
        }, 150);
    }
    
    lTimeline.to(".loader", {
        delay: 0.5,
        duration: 1,
        onStart: time(),
    });
    
    lTimeline.to(".loader", {
        y: "-100vh",
        duration: 1,
        delay: 0.5
    });
    lTimeline.from("nav a ,.login a",{
        opacity:0,
        stagger:0.1,
        duration:0.6,
        ease:"linear",
        delay:-0.6
    });
    lTimeline.from(".product-container .product",{
        opacity:0,
        duration:0.5,
        stagger:0.1,
        ease:"linear"
    });

    
}


loader();





// const imgContainerHover = document.querySelectorAll('.product-container');


// imgContainerHover.addEventListener('mouseenter', () => {
//     console.log("object")
//     gsap.to(".product-container img", {
//         scale: 1.1,
//         duration: 1
//     });
// });

// imgContainerHover.addEventListener('mouseleave', () => {
//     gsap.to(".product-container img", {
//         scale: 1,
//         duration: 1
//     });
// });

// gsap.to(".product-container img", {
//     scale: 1.1,
//     duration: 1,
//     delay:2
// });



gsap.from(".why-choose-us", {
    scale: 0,
    duration: 1,
    scrollTrigger: {
        trigger: ".why-choose-us",
        start: "top 99%",
        end: "top 95%",
        scroller: "body",
        scrub: 1
    }
});

gsap.from("footer", {
    scale: 0,
    scrollTrigger: {
        trigger: "footer",
        scroller: "body",
        start: "top 99.9%",
        end: "top 95%"
    }
});