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
    // Intro Player with YouTube auto-generated captions
    const introplayer = new Plyr('#intro-player', {
        autoplay: false, // autoplay can interfere with captions
        captions: { active: true, language: 'en' }, // show captions button
        controls: [
            'play-large',
            'play',
            'progress',
            'current-time',
            'duration',
            'mute',
            'volume',
            'captions', // captions button
            'fullscreen'
        ],
        youtube: {
            rel: 0,
            modestbranding: 1,
            cc_load_policy: 1, // ensures captions show
            cc_lang_pref: 'en', // English captions
            iv_load_policy: 3, // hide annotations
            disablekb: 1
        }
    });
}