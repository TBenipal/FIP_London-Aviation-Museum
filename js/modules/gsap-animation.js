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

            gsap.utils.toArray(".te-heading").forEach((heading) => {
                gsap.fromTo(
                    heading, { 
                        scale: 0,
                        opacity: 0 
                    }, {
                        scale: 1,
                        opacity: 1,
                        duration: 0.1,
                        delay: .1*2,
                        scrollTrigger: {
                            trigger: heading,
                            start: "top 78%",
                            end: "bottom 50%",
                            toggleActions: "play none none reverse",
                        }
                    }
                );
            });

            gsap.utils.toArray(".timeline-event").forEach((event, i) => {
                const content = event.querySelector(".tc-content");
                const image = event.querySelector(".te-img");

                const tl = gsap.timeline({
                    scrollTrigger: {
                        trigger: event,
                        start: "top 45%",
                        end: "bottom 50%",
                        toggleActions: "play none none reverse",
                    }
                });

                tl.fromTo([image, content], { 
                    scale: 0, 
                    opacity: 0 
                }, {
                    scale: 1,
                    opacity: 1,
                    duration: 0.3,
                    ease: "power2.out",
                    stagger: 0
                });
            });
        }

        if(screen > 768 && screen < 1200) {
            gsap.utils.toArray(".te-heading:not(#heading-post)").forEach((heading) => {
                gsap.fromTo(
                    heading, { 
                        scale: 0,
                        opacity: 0 
                    }, {
                        scale: 1,
                        opacity: 1,
                        duration: 0.1,
                        scrollTrigger: {
                            trigger: heading,
                            start: "top 60%",
                            end: "bottom 50%",
                            toggleActions: "play none none reverse",
                        }
                    }
                );
            });

            gsap.fromTo("#heading-post", {
                scale: 0,
                opacity: 0
            }, {
                scale: 1,
                opacity: 1,
                duration: 0.1,
                scrollTrigger: {
                    trigger: "#heading-post",
                    start: "top 55%",
                    end: "bottom 50%",
                    toggleActions: "play none none reverse",
                },
            })

            gsap.fromTo("#img-1918", {
                x: 200,
                scale: 0,
                opacity: 0,
            }, {
                x: 0,
                scale: 1,
                opacity: 1,
                duration: .3,
                scrollTrigger: {
                    trigger: "#img-1918",
                    start: "top 50%",
                    end: "bottom 50%",
                    toggleActions: "play none none reverse",
                },
            })

            gsap.fromTo("#content-1918", {
                x: -200,
                scale: 0,
                opacity: 0,
            }, {
                x: 0,
                scale: 1,
                opacity: 1,
                duration: .3,
                delay: .1*2,
                scrollTrigger: {
                    trigger: "#content-1918",
                    start: "top 50%",
                    end: "bottom 50%",
                    toggleActions: "play none none reverse",
                },
            })

            gsap.fromTo("#img-1939", {
                x: -200,
                scale: 0,
                opacity: 0,
            }, {
                x: 0,
                scale: 1,
                opacity: 1,
                duration: .3,
                scrollTrigger: {
                    trigger: "#img-1939",
                    start: "top 50%",
                    end: "bottom 50%",
                    toggleActions: "play none none reverse",
                },
            })

            gsap.fromTo("#content-1939", {
                x: 200,
                scale: 0,
                opacity: 0,
            }, {
                x: 0,
                scale: 1,
                opacity: 1,
                duration: .3,
                delay: .1*2,
                scrollTrigger: {
                    trigger: "#content-1939",
                    start: "top 50%",
                    end: "bottom 50%",
                    toggleActions: "play none none reverse",
                },
            })

            gsap.fromTo("#img-1945", {
                x: 200,
                scale: 0,
                opacity: 0,
            }, {
                x: 0,
                scale: 1,
                opacity: 1,
                duration: .3,
                scrollTrigger: {
                    trigger: "#img-1945",
                    start: "top 50%",
                    end: "bottom 50%",
                    toggleActions: "play none none reverse",
                },
            })

            gsap.fromTo("#content-1945", {
                x: -200,
                scale: 0,
                opacity: 0,
            }, {
                x: 0,
                scale: 1,
                opacity: 1,
                duration: .3,
                delay: .1*2,
                scrollTrigger: {
                    trigger: "#content-1945",
                    start: "top 50%",
                    end: "bottom 50%",
                    toggleActions: "play none none reverse",
                },
            })

            gsap.fromTo("#img-post", {
                x: -200,
                scale: 0,
                opacity: 0,
            }, {
                x: 0,
                scale: 1,
                opacity: 1,
                duration: .3,
                scrollTrigger: {
                    trigger: "#img-post",
                    start: "top 45%",
                    end: "bottom 50%",
                    toggleActions: "play none none reverse",
                },
            })

            gsap.fromTo("#content-post", {
                x: 200,
                scale: 0,
                opacity: 0,
            }, {
                x: 0,
                scale: 1,
                opacity: 1,
                duration: .3,
                delay: .1*2,
                scrollTrigger: {
                    trigger: "#content-post",
                    start: "top 45%",
                    end: "bottom 50%",
                    toggleActions: "play none none reverse",
                },
            })
        }

        if(screen > 1200) {
            gsap.utils.toArray(".te-heading:not(#heading-post)").forEach((heading) => {
                gsap.fromTo(
                    heading, { 
                        scale: 0,
                        opacity: 0 
                    }, {
                        scale: 1,
                        opacity: 1,
                        duration: 0.1,
                        scrollTrigger: {
                            trigger: heading,
                            start: "top 55%",
                            end: "bottom 50%",
                            toggleActions: "play none none reverse",
                        }
                    }
                );
            });

            gsap.fromTo("#heading-post", {
                scale: 0,
                opacity: 0
            }, {
                scale: 1,
                opacity: 1,
                duration: 0.1,
                scrollTrigger: {
                    trigger: "#heading-post",
                    start: "top 60%",
                    end: "bottom 50%",
                    toggleActions: "play none none reverse",
                },
            })

            gsap.fromTo("#img-1918", {
                x: 200,
                scale: 0,
                opacity: 0,
            }, {
                x: 0,
                scale: 1,
                opacity: 1,
                duration: .3,
                scrollTrigger: {
                    trigger: "#img-1918",
                    start: "top 55%",
                    end: "bottom 50%",
                    toggleActions: "play none none reverse",
                },
            })

            gsap.fromTo("#content-1918", {
                x: -200,
                scale: 0,
                opacity: 0,
            }, {
                x: 0,
                scale: 1,
                opacity: 1,
                duration: .3,
                delay: .1*2,
                scrollTrigger: {
                    trigger: "#content-1918",
                    start: "top 55%",
                    end: "bottom 50%",
                    toggleActions: "play none none reverse",
                },
            })

            gsap.fromTo("#img-1939", {
                x: -200,
                scale: 0,
                opacity: 0,
            }, {
                x: 0,
                scale: 1,
                opacity: 1,
                duration: .3,
                scrollTrigger: {
                    trigger: "#img-1939",
                    start: "top 55%",
                    end: "bottom 50%",
                    toggleActions: "play none none reverse",
                },
            })

            gsap.fromTo("#content-1939", {
                x: 200,
                scale: 0,
                opacity: 0,
            }, {
                x: 0,
                scale: 1,
                opacity: 1,
                duration: .3,
                delay: .1*2,
                scrollTrigger: {
                    trigger: "#content-1939",
                    start: "top 55%",
                    end: "bottom 50%",
                    toggleActions: "play none none reverse",
                },
            })

            gsap.fromTo("#img-1945", {
                x: 200,
                scale: 0,
                opacity: 0,
            }, {
                x: 0,
                scale: 1,
                opacity: 1,
                duration: .3,
                scrollTrigger: {
                    trigger: "#img-1945",
                    start: "top 50%",
                    end: "bottom 50%",
                    toggleActions: "play none none reverse",
                },
            })

            gsap.fromTo("#content-1945", {
                x: -200,
                scale: 0,
                opacity: 0,
            }, {
                x: 0,
                scale: 1,
                opacity: 1,
                duration: .3,
                delay: .1*2,
                scrollTrigger: {
                    trigger: "#content-1945",
                    start: "top 50%",
                    end: "bottom 50%",
                    toggleActions: "play none none reverse",
                },
            })

            gsap.fromTo("#img-post", {
                x: -200,
                scale: 0,
                opacity: 0,
            }, {
                x: 0,
                scale: 1,
                opacity: 1,
                duration: .3,
                scrollTrigger: {
                    trigger: "#img-post",
                    start: "top 55%",
                    end: "bottom 50%",
                    toggleActions: "play none none reverse",
                },
            })

            gsap.fromTo("#content-post", {
                x: 200,
                scale: 0,
                opacity: 0,
            }, {
                x: 0,
                scale: 1,
                opacity: 1,
                duration: .3,
                delay: .1*2,
                scrollTrigger: {
                    trigger: "#content-post",
                    start: "top 55%",
                    end: "bottom 50%",
                    toggleActions: "play none none reverse",
                },
            })
        }
    }
    callGSAP();
}