function page1animation(){
    var tl = gsap.timeline();

tl.from(".logo img",{
    opacity:0,
    duration:0.7,
});
tl.from(".logo h3",{
    y:-30,
    opacity:0,
    duration:0.8,
});
tl.from("nav a",{
    y:-30,
    opacity:0,
    duration:1,
    stagger:0.2
});
tl.from(".login a",{
    y:-30,
    opacity:0,
    duration:0.8,
    stagger:0.2
});
tl.from(".search-section",{
    opacity:0,
    duration:0.6,
    stagger:0.2
});
}

// page1animation();