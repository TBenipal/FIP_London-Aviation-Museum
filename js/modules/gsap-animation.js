export function GSAP() {
    gsap.registerPlugin(ScrollTrigger);
    function callGSAP() {

        gsap.to(".scroll-arrow", {
            opacity: 0,
            scrollTrigger: {
                trigger: "#hero-container",
                start: "top 0%",
                end: "bottom 90%",
                scrub: 1
            },
        });

        gsap.to("#header-section", {
            opacity: 0.90,
            scrollTrigger: {
                trigger: "body",
                start: "top 0%",
                end: "bottom 90%",
                scrub: .1
            },
        });

    }

    callGSAP();
}