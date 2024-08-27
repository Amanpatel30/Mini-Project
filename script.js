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
    tl.from("#butterfly3", {
        opacity: 0,
        duration: 0.7,
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
    tl.from(".theme-button", {
        opacity: 0,
        duration: 0.8,
        stagger: 0.2
    });
    tl.from(".search-section", {
        opacity: 0,
        duration: 0.6,
        stagger: 0.2
    });
    tl.from("#butterfly,#butterfly2,#cloud",{
        opacity: 0,
        duration: 0.7,
    });
   
}

page1animation();

function themeFunction() {
    var btn = document.querySelector(".theme-button");
    var darkIcon = document.querySelector('.dark-icon');
    var lightIcon = document.querySelector('.light-icon');

    let theme = 1;

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
}

themeFunction();

{
const suggestion = [
    "Javascript",
    "Web development",
    "GreenSock",
    "3d Website"
];

const inputbox = document.querySelector('#input-search-box');
const searchResult = document.querySelector(".search-result");

inputbox.addEventListener("keyup", function (data) {
    let userData = data.target.value;
    let filterData = [];

    if (userData) {
        filterData = suggestion.filter((data) => {
            return data.toLowerCase().includes(userData.toLowerCase());
        });
        filterData = filterData.map((data) => {
            return data = '<li onclick="selectedList(this)">' + data + '</li>';
        });
    }

    displaySuggestion(filterData);

    if (!filterData.length) {
        searchResult.innerHTML = '';
    }

    // Check if Enter key is pressed
    if (data.key === "Enter") {
        const selectedValue = inputbox.value.toLowerCase().trim();

        // Check if the entered value matches any suggestion
        const isMatch = suggestion.some(s => s.toLowerCase() === selectedValue);

        if (isMatch) {
            // Redirect to product.html if a valid match is found
            window.location.href = "./product-page/product.html";
        } else {
            // Alert if no matching data is found
            alert("No data found");
        }
    }
});

function displaySuggestion(list) {
    let dataList;
    if (!list.length) {
        dataList = '<li>' + inputbox.value + '</li>';
    } else {
        dataList = list.join('');
    }
    searchResult.innerHTML = dataList;
}

function selectedList(list) {
    inputbox.value = list.innerHTML;
    searchResult.innerHTML = "";

    const selectedValue = list.innerHTML.toLowerCase().trim();

    if (selectedValue === "javascript" ||
        selectedValue === "web development" ||
        selectedValue === "greensock" ||
        selectedValue === "3d website") {

        // Redirect to product.html when a suggestion is clicked
        window.location.href = "./product-page/product.html";
    } else {
        alert("No page available for the selected suggestion.");
    }
}
}

var b1 = gsap.timeline({ repeat: -1 });

b1
    .to("#butterfly", {
        scaleX: 0.3,
        duration: 0.5, 
        yoyo: true,    
        ease: "linear",
        repeat: -1
    })
    .to("#butterfly", {
        x: "200vh", 
        duration: 20, 
        ease: "linear",
        repeat:-1
    }, butterfly) 
    .to("#butterfly", {
        y: "-100px",  
        duration: 1.25,
        yoyo: true,   
        repeat: -1,   
        ease: "sine.inOut",
    }, butterfly); 

    var b2 = gsap.timeline({ repeat: -1 });

b2
    .to("#butterfly2", {
        scaleX: 0.3,
        duration: 0.5, 
        yoyo: true,    
        ease: "linear",
        repeat: -1
    })
    .from("#butterfly2", {
        x: "200vh", 
        duration: 25, 
        ease: "linear",
        repeat:-1
    }, butterfly) 
    .to("#butterfly2", {
        y: "300px",  
        duration: 1.25,
        yoyo: true,   
        repeat: -1,   
        ease: "sine.inOut", 
    }, butterfly); 




    gsap.to("#cloud",{
        x: "200vh", 
        duration: 25, 
        ease: "linear",
        repeat:-1
    });
    gsap.to("#cloud2",{
        x: "200vh", 
        duration: 30, 
        ease: "linear",
        repeat:-1,
        delay:2
    });
    gsap.to("#butterfly3",{
        scaleX:0.3, 
        duration: 0.7   , 
        ease: "linear",
        repeat:-1,
        yoyo: true, 
        ease:"sine.inOut"
    });