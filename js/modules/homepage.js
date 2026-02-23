export function homepage() {
    // //Hero Slider
    // const heroSlider = document.querySelector("#hs-slider");
    // const heroSlides = document.querySelectorAll(".hero-sub-container");
    // const heroNext = document.querySelector(".hs-next");
    // const heroPrev = document.querySelector(".hs-prev");

    // let heroIndex = 0;

    // function updateHeroSlider() {
    //     const slideWidth = heroSlides[0].clientWidth;
    //     heroSlider.scrollLeft = slideWidth * heroIndex;
    // }

    // heroNext.addEventListener("click", () => {
    //     if (window.innerWidth < 1200 && heroIndex < heroSlides.length - 1) {
    //         heroIndex++;
    //         updateHeroSlider();
    //     }
    // });

    // heroPrev.addEventListener("click", () => {
    //     if (window.innerWidth < 1200 && heroIndex > 0) {
    //         heroIndex--;
    //         updateHeroSlider();
    //     }
    // });

    //Whats on Slider
    const woSlider = document.querySelector("#wo-content");
    const woSlides = document.querySelectorAll(".wo-blocks");
    const woNext = document.querySelector(".slide-next");
    const woPrev = document.querySelector(".slide-prev");

    let woIndex = 0;

    function updateWoSlider() {
        const slideWidth = woSlides[0].clientWidth;
        woSlider.scrollLeft = slideWidth * woIndex;
    }

    woNext.addEventListener("click", () => {
        if (window.innerWidth < 1200) {
            woIndex++;

            if (woIndex >= woSlides.length) {
                woIndex = 0;
            }

            updateWoSlider();
        }
    });

    woPrev.addEventListener("click", () => {
        if (window.innerWidth < 1200) {
            woIndex--;

            if (woIndex < 0) {
                woIndex = woSlides.length - 1; // go to last slide
            }

            updateWoSlider();
        }
    });

    //Support Us Slider
    const ssSlider = document.querySelector("#ss-content");
    const ssSlides = document.querySelectorAll("#ss-content .ss-blocks");
    const ssNext = document.querySelector("#support-us .slide-next");
    const ssPrev = document.querySelector("#support-us .slide-prev");

    let ssIndex = 0;

    function updateSsSlider() {
        const slideWidth = ssSlides[0].clientWidth;
        ssSlider.scrollLeft = slideWidth * ssIndex;
    }

    ssNext.addEventListener("click", () => {
        if (window.innerWidth < 1200) {
            ssIndex++;

            if (ssIndex >= ssSlides.length) {
                ssIndex = 0; // loop back to first
            }

            updateSsSlider();
        }
    });

    ssPrev.addEventListener("click", () => {
        if (window.innerWidth < 1200) {
            ssIndex--;

            if (ssIndex < 0) {
                ssIndex = ssSlides.length - 1; // loop to last
            }

            updateSsSlider();
        }
    });

}