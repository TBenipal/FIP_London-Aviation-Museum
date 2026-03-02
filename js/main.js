import { burgermenu } from "./modules/burger-menu.js";
import { timeline } from "./modules/timeline.js";
import { videoplayer } from "./modules/video-player.js";
import { bobairplane } from "./modules/bob-airplane.js";
import { GSAP } from "./modules/gsap-animation.js";
import { homepage } from "./modules/homepage.js";
import './modules/ajax-forms.js';


burgermenu();

if(document.body.dataset.page === "homepage") {
    videoplayer();
    GSAP();
    homepage();
}

if(document.body.dataset.page === "wartime") {
    timeline();
}

if(document.body.dataset.page === "bob") {
    bobairplane();
}

if(document.body.dataset.page === "exhibition") {
    videoplayer();
}



