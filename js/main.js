(function() {
    console.log(gsap);
    // Variables
    const menu = document.querySelector("#sidebar");
    const hamburger = document.querySelector(".hamburger");
    const closeHamburger = document.querySelector(".close-hamburger");

    
    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('active');
        menu.classList.toggle('active');
    });
    
    const lpPlayer = new Plyr('#lp-player', {
    autoplay: true,
    muted: true,
    loop: { active: true },
    controls: []
    });
    const player = new Plyr('#player', {
        controls: [
            'play-large',
            'play',
            'progress',
            'current-time',
            'duration',
            'mute',
            'volume',
            'pip',
            'airplay',
            'fullscreen'
        ],
        settings: ['captions', 'quality', 'speed', 'loop'],
    });

    //GSAP Animation
    gsap.registerPlugin(ScrollTrigger, DrawSVGPlugin, MotionPathPlugin);
    function callGSAP() {

        // gsap.fromTo(".timeline", {
        //     drawSVG: "0%",
        // }, {
        //     drawSVG: "100%",
        //     duration: 5,
        //     ease: "none",
        //     scrollTrigger: {
        //         trigger: ".timeline",
        //         start: "top 90%",
        //         end: "bottom 10%",
        //         scrub: 1,
        //     }
        // });

        gsap.timeline({
            scrollTrigger: {
                trigger: "#timeline-section",
                start: "top 80%",
                end: "bottom 40%",
                scrub: 1
            }
            })
            .fromTo("#timeline-path", { 
                drawSVG: "0%" 

            }, { drawSVG: "100%", 
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
    
})();