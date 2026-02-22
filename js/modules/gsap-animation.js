export function GSAP() {
    //GSAP Animation
    gsap.registerPlugin(ScrollTrigger, DrawSVGPlugin, MotionPathPlugin);
    function callGSAP() {

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
            .fromTo("#plane", { 
                opacity: 1
            }, {
                motionPath: {
                    path: "#timeline-path",
                    align: "#timeline-path",
                    alignOrigin: [.7, 2],
                    autoRotate: true
                },
                ease: "none"
            },
            0
            );

    }

    callGSAP();
}