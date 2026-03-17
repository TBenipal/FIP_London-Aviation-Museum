export function timeline() {
    gsap.registerPlugin(ScrollTrigger, DrawSVGPlugin, MotionPathPlugin);
    function timeline() {

        gsap.timeline({
            scrollTrigger: {
                trigger: "#timeline-content",
                start: "top 90%",
                end: "bottom 0%",
                scrub: 1
            }
            })
            .fromTo("#timeline-path", { 
                drawSVG: "0%" 

            }, { 
                drawSVG: "100%", 
                ease: "none" 
            })
            .fromTo(".plane", { 
                opacity: 1
            }, {
                motionPath: {
                    path: "#timeline-path",
                    align: "#timeline-path",
                    alignOrigin: [.6, .5],
                    autoRotate: 30
                },
                ease: "none"
            },
            0
        );
    }
    timeline();

    function mobtimeline() {
        gsap.timeline({
            scrollTrigger: {
                trigger: "#mobile-timeline-container",
                start: "top 50%",
                end: "bottom 0%",
                scrub: 1
            }
            })
            .fromTo("#mobile-timeline-path", { 
                drawSVG: "0%" 

            }, { 
                drawSVG: "100%", 
                ease: "none" 
            })
            .fromTo(".mobile-plane", { 
                opacity: 1,
            }, {
                motionPath: {
                    path: "#mobile-timeline-path",
                    align: "#mobile-timeline-path",
                    alignOrigin: [1.2, .5],
                    autoRotate: 30
                },
                ease: "none"
            },
            0
        );
    }
    mobtimeline();
}