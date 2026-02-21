export function videoplayer() {
    const lpPlayer = new Plyr('#lp-player', {
        autoplay: true,
        muted: true,
        loop: { active: true },
        controls: []
    });
    const player = new Plyr('.video-player', {
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