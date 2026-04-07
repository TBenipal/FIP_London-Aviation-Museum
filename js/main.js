import { burgermenu } from "./modules/burger-menu.js";
import { timeline } from "./modules/timeline.js";
import { videoplayer } from "./modules/video-player.js";
import { bobairplane } from "./modules/bob-airplane.js";
import { GSAP } from "./modules/gsap-animation.js";
import { homepage } from "./modules/homepage.js";
import { pilot } from "./modules/bob-pilots.js";
import { bobgallery } from "./modules/bob-gallery.js";
import { contactform } from "./modules/ajax-forms.js";
import { nlform } from "./modules/vue-form.js";
import { bor } from "./modules/bor.js";


burgermenu();
nlform();

if(document.body.dataset.page === "homepage") {
    videoplayer();
    GSAP();
    homepage();
}

if(document.body.dataset.page === "wartime") {
    timeline();
    GSAP();
}

if(document.body.dataset.page === "bob") {
    pilot();
    bobairplane();
    bobgallery();
}

if(document.body.dataset.page === "exhibition") {
    videoplayer();
}

if(document.body.dataset.page === "bor") {
    bor();
}

if(document.body.dataset.page === "contact") {
    contactform();
}



