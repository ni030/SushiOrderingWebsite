document.querySelectorAll('.home-link').forEach(link => link.classList.add('active'));

var swiper = new Swiper(".home-slider", {
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    loop:true,
  });

  //menu slider effect
  document.addEventListener("DOMContentLoaded", function() {
    let scrollContainer = document.querySelector(".box-wrap .box-container");
    let leftBtn = document.getElementById("leftBtn");
    let rightBtn = document.getElementById("rightBtn");

    rightBtn.addEventListener("click", () => {
        scrollContainer.style.scrollBehavior="smooth";
        scrollContainer.scrollLeft += 900; 
    });

    leftBtn.addEventListener("click", () => {
        scrollContainer.style.scrollBehavior= "smooth";
        scrollContainer.scrollLeft -= 900; 
    });
    });

   //menu nav (sushi, drinks, sides) 
   /*document.addEventListener("DOMContentLoaded", function() {
    const sushiBtn = document.getElementById("sushiBtn");
    const sidesBtn = document.getElementById("sidesBtn");
    const drinksBtn = document.getElementById("drinksBtn");

    sushiBtn.addEventListener("click", function(event) {
        event.preventDefault();
        scrollToSection("bostonRoll");
    });

    sidesBtn.addEventListener("click", function(event) {
        event.preventDefault();
        scrollToSection("chocoTaiyaki");
    });

    drinksBtn.addEventListener("click", function(event) {
        event.preventDefault();
        scrollToSection("hotMatcha");
    });

    function scrollToSection(sectionId) {
        const section = document.getElementById(sectionId);
        if (section) {
            const container = document.querySelector(".box-container");
            const scrollLeft = section.offsetLeft - container.offsetLeft;
            container.scrollTo({
                left: scrollLeft,
                behavior: "smooth"
            });
        }
    }
});*/
