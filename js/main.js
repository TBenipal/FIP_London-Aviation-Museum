import { burgermenu } from "./modules/burger-menu.js";
import { GSAP } from "./modules/gsap-animation.js";
import { videoplayer } from "./modules/video-player.js";

burgermenu();
GSAP();
videoplayer();

if(document.body.dataset.page === "home") {

} 