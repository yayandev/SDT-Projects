 // function modeMalam() {
 //    let modeMalam = document.getElementById("modeMalam");
 //    let modeSiang = document.getElementById("modeSiang");
 //    let induk = document.getElementById("induk");
 //    modeSiang.setAttribute("style", "");
 //    modeMalam.setAttribute("style", "display: none");
 //    induk.setAttribute("style", "background-color: black;color:white;");
 // }
 // function modeSiang() {
 //    let modeMalam = document.getElementById("modeMalam");
 //    let modeSiang = document.getElementById("modeSiang");
 //    let induk = document.getElementById("induk");
 //    modeSiang.setAttribute("style", "display: none");
 //    modeMalam.setAttribute("style", "");
 //    induk.setAttribute("style", "background-color: white;");
 // }

 // Swiper JS
var swiper = new Swiper(".mySwiper", {
        observer: true,
        observeParents: true,
        keyboard: true,
        mousewheel: true,
        slidesPerView: 4,
        spaceBetween: 30,
        freeMode: true,
        watchSlidesProgress: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
});