$(document).ready(function () {
  $(window).scroll(function () {
    if ($(this).scrollTop() > 70) {
      $("header").addClass("fixed-header");
    } else {
      $("header").removeClass("fixed-header");
    }
  });
});

const toggleBtn = document.querySelector(".toggle-button");
const mobileMenu = document.querySelector(".mobile-menu");

toggleBtn.addEventListener("click", () => {
  toggleBtn.classList.toggle("active");
  mobileMenu.classList.toggle("active");
});

document.querySelectorAll("header .mobile-menu .dropdown > a").forEach(link => {
  link.addEventListener("click", e => {
    e.preventDefault();
    link.parentElement.classList.toggle("active");
  });
});


$(".banner-wrapper").slick({
  dots: false,
  arrows: true,
  infinite: true,
  speed: 500,
  fade: true,
  cssEase: "linear",
});

// testimonial slider

$(".testi-wrapper").slick({
  slidesToShow: 2, 
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 3000,
  arrows:true,
  dots: false,
  responsive: [
    {
      breakpoint: 768, 
      settings: {
        slidesToShow: 1
      }
    }
  ]
});


// course slider

$(".course-slider").slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 3000,
  arrows: true,
  dots: true,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
      },
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
      },
    },
  ],
});

// team slider

$(".team-slider").slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 3000,
  arrows: true,
  dots: true,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
      },
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
      },
    },
  ],
});


// counter js

document.addEventListener("DOMContentLoaded", function () {
  const counters = document.querySelectorAll(".counter-number");

  const animateCounter = (counter) => {
    const target = +counter.getAttribute("data-target");
    let count = 0;
    const increment = target / 60; 

    const updateCounter = () => {
      count += increment;
      if (count < target) {
        counter.textContent = Math.floor(count).toLocaleString() + "+";
        requestAnimationFrame(updateCounter);
      } else {
        counter.textContent = target.toLocaleString() + "+";
      }
    };

    updateCounter();
  };

  const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        animateCounter(entry.target);
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.5 });

  counters.forEach(counter => observer.observe(counter));
});
