export function GSAP() {
    gsap.registerPlugin(ScrollTrigger);
    function callGSAP() {
        const screen = window.innerWidth

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
            opacity: 0.95,
            scrollTrigger: {
                trigger: "body",
                start: "top 0%",
                end: "bottom 90%",
                scrub: .1,
            },
        });

        if (screen < 768) {
            gsap.fromTo("#hsi-1", {
                x: -800
            }, {
                x: 0,
                duration: .5,
                scrollTrigger: {
                    trigger: "#hs-slider",
                    start: "top 70%",
                    bottom: "bottom 0%",
                    toggleActions: "play none none reverse"
                },
            })

            gsap.fromTo("#hsi-2", {
                x: 800
            }, {
                x: 0,
                duration: .5,
                scrollTrigger: {
                    trigger: "#hs-slider",
                    start: "top 40%",
                    bottom: "bottom 0%",
                    toggleActions: "play none none reverse"
                },
            })

            gsap.fromTo("#hsi-3", {
                x: -800
            }, {
                x: 0,
                duration: .5,
                scrollTrigger: {
                    trigger: "#hs-slider",
                    start: "top 0%",
                    bottom: "bottom 0%",
                    toggleActions: "play none none reverse"
                },
            })
        }

    }

    callGSAP();
}