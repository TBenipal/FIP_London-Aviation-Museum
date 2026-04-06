export function timeline() {
    gsap.registerPlugin(ScrollTrigger, DrawSVGPlugin, MotionPathPlugin);
    const screen = window.innerWidth

    if (screen < 768) {
        gsap.timeline({
            scrollTrigger: {
                trigger: "#timeline-animation",
                start: "top 90%",
                end: "bottom 60%",
                scrub: .8,
                anticipatePin: 1,
                ease: "none"
            }
            })
            .fromTo("#mobile-path", { 
                drawSVG: "0%" 

            }, { 
                drawSVG: "100%", 
                ease: "none" 
            })
            .fromTo(".mobile-plane", { 
                opacity: 1
            }, {
                motionPath: {
                    path: "#mobile-path",
                    align: "#mobile-path",
                    alignOrigin: [.2, .1],
                    scrub: .8
                },
                ease: "none"
            },
        0
        );
    }

    if(screen > 768 && screen < 1200) {
        gsap.timeline({
            scrollTrigger: {
                trigger: "#timeline-animation",
                start: "top 90%",
                end: "+=3000", 
                scrub: .8,
                anticipatePin: 1,
                ease: "none"
            }
            })
            .fromTo("#path", { 
                drawSVG: "0%" 

            }, { 
                drawSVG: "100%", 
                ease: "none" 
            })
            .fromTo(".plane", { 
                opacity: 1
            }, {
                motionPath: {
                    path: "#path",
                    align: "#path",
                    alignOrigin: [0.497, 0.1],
                    scrub: .8
                },
                ease: "none"
            },
        0
        );
    }

    if(screen > 1200) {
        gsap.timeline({
            scrollTrigger: {
                trigger: "#timeline-animation",
                start: "top 80%",
                end: "+=3000", 
                scrub: .8,
                anticipatePin: 1,
                ease: "none"
            }
            })
            .fromTo("#path", { 
                drawSVG: "0%" 

            }, { 
                drawSVG: "100%", 
                ease: "none" 
            })
            .fromTo(".plane", { 
                opacity: 1
            }, {
                motionPath: {
                    path: "#path",
                    align: "#path",
                    alignOrigin: [0.497, 0.1],
                    scrub: .8
                },
                ease: "none"
            },
        0
        );
    }
}