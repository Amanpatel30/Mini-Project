function page1animation() {
    var tl = gsap.timeline();

    tl.from(".logo img", { opacity: 0, duration: 0.7 });
    tl.from(".logo h3", { y: -30, opacity: 0, duration: 0.8 });
    tl.from("#butterfly3", { opacity: 0, duration: 0.7 });
    tl.from("nav a", { y: -30, opacity: 0, duration: 1, stagger: 0.2 });
    tl.from(".login a", { y: -30, opacity: 0, duration: 0.8, stagger: 0.2 });
    tl.from(".theme-button", { opacity: 0, duration: 0.8, stagger: 0.2 });
    tl.from(".search-section", { opacity: 0, duration: 0.6, stagger: 0.2 });
    tl.from(".page1 img:last-child", { opacity: 0, duration: 0.6, stagger: 0.2 });
    tl.from("#butterfly,#butterfly2,#butterfly4,#cloud", { opacity: 0, duration: 0.7 });
}

page1animation();

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

function butterfly() {
    var b1 = gsap.timeline({ repeat: -1 });

    b1.to("#butterfly", {
        scaleX: 0.3,
        duration: 0.5,
        yoyo: true,
        ease: "linear",
        repeat: -1
    }).to("#butterfly", {
        x: "200vh",
        duration: 20,
        ease: "linear",
        repeat: -1
    }).to("#butterfly", {
        y: "-100px",
        duration: 1.25,
        yoyo: true,
        repeat: -1,
        ease: "sine.inOut"
    });

    var b2 = gsap.timeline({ repeat: -1 });
    b2.to("#butterfly2", {
        scaleX: 0.3,
        duration: .60,
        yoyo: true,
        ease: "linear",
        repeat: -1
    }).to("#butterfly2", {
        y: "700px",
        duration: 1.25,
        yoyo: true,
        repeat: -1,
        ease: "sine.inOut"
    })
    .from("#butterfly2", {
        x: "200vh",
        duration: 25,
        ease: "linear",
        repeat: -1
    });
    gsap.to("#cloud", {
        x: "200vh",
        duration: 25,
        ease: "linear",
        repeat: -1
    });

    gsap.to("#cloud2", {
        x: "200vh",
        duration: 30,
        ease: "linear",
        repeat: -1,
        delay: 2
    });

    gsap.to("#butterfly3", {
        scaleX: 0.3,
        duration: 0.7,
        ease: "linear",
        repeat: -1,
        yoyo: true,
        ease: "sine.inOut"
    });



    gsap.to("#butterfly5", {
        scaleX: 0.3,
        duration: 1,
        ease: "linear",
        repeat: -1,
        yoyo: true,
        ease: "sine.inOut"
    });
}
butterfly();
$(document).ready(function () {
    // Handle the keyup event on the search input
    $("#input-search-box").keyup(function () {
        var input = $(this).val().trim();
        if (input != "") {
            $.ajax({
                url: "livesearch.php", // PHP script that handles the search
                method: "POST",
                data: { input: input },
                success: function (data) {
                    if (data.trim() !== "") {
                        $(".search-result").html(data).show();
                    } else {
                        $(".search-result").hide();
                        alert("No matching records found. Please try a different search term.");
                    }
                }
            });
        } else {
            $(".search-result").hide();
        }
    });
});
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('input-search-box');
    const content = document.querySelector('.blur-background');
  
    searchInput.addEventListener('input', function() {
        // console.log(searchInput.value.length)
      if (searchInput.value.length > 0) {
        content.classList.add('blur');
      } else {
        content.classList.remove('blur');
      }
    });
  });
