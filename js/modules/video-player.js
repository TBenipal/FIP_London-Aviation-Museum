export function videoplayer() {
    const lpPlayer = new Plyr('#lp-player', {
        autoplay: true,
        muted: true,
        loop: { active: true },
        controls: []
    });
    const generalplayer = new Plyr('.video-player', {
        controls: [
            'play-large',
            'play',
            'progress',
            'current-time',
            'duration',
            'mute',
            'volume',
            'captions',
            'pip',
            'airplay',
            'fullscreen'
        ],
    });
    const introplayer = new Plyr('.intro-video-player', {
        controls: [
            'play-large',
            'play',
            'progress',
            'current-time',
            'duration',
            'mute',
            'volume',
            'captions',
            'pip',
            'airplay',
            'fullscreen'
        ],
    });
}