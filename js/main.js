import { burgermenu } from "./modules/burger-menu.js";
import { GSAP } from "./modules/gsap-animation.js";
import { videoplayer } from "./modules/video-player.js";
import { bobairplane } from "./modules/bob-airplane.js";

burgermenu();

if(document.body.dataset.page === "homepage") {
    videoplayer();
}

if(document.body.dataset.page === "wartime") {
    GSAP();
}

if(document.body.dataset.page === "bob") {
    bobairplane();
}

if(document.body.dataset.page === "exhibition") {
    videoplayer();
}



