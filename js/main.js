(function() {
    // Variables
    const menu = document.querySelector("#sidebar");
    const hamburger = document.querySelector(".hamburger");
    const closeHamburger = document.querySelector(".close-hamburger");

    
    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('active');
        sidebar.classList.toggle('active');
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
    
})();