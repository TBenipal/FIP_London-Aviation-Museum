(function() {
    // Variables
    const menu = document.querySelector("#sidebar");
    const hamburger = document.querySelector(".hamburger");
    const closeHamburger = document.querySelector(".close-hamburger");

    //GSAP Animation

    //Functions
    function toggleMenu() {
        menu.classList.toggle("active");
    }

    //Event Listeners
    hamburger.addEventListener("click", toggleMenu);
    closeHamburger.addEventListener("click", toggleMenu);
    menuLinks.forEach(link=>{
        link.addEventListener("click", toggleMenu);
    })
    
})();