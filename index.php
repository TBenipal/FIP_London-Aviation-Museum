<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <link rel="icon" type="image/x-icon" href=""> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.8.3/plyr.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/grid.css" rel="stylesheet">
    <title>Where London Met the Sky</title>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
</head>
<body data-page="homepage">
    <!-- Header -->
    <header id="header-section" class="grid-con">
        <h1 class="hidden">Navbar</h1>

        <div id="menu" class="col-span-full">

            <div id="mobile-header">
                <div id="header-logo"><a href="index.php">
                    <img src="images/horizontal-logo.svg" alt="London Aviation Museum Logo"></a>
                </div>
                
                <button class="hamburger" aria-label="Open menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

            </div>

                <nav id="sidebar">
                <ul>
                    <li class="nav-item"><a href="index.php" class="active">Home</a></li>
                    <li class="nav-item"><a href="battle-of-britain.php">Battle of Britian</a></li>
                    <li class="nav-item"><a href="wartime.php">Wartime</a></li>
                    <li class="nav-item"><a href="exhibition.php">Exhibition</a></li>
                    <li class="nav-item"><a href="contact.php">Contact</a></li>
                    <li class="nav-item">
                        <?php if (isset($_SESSION["admin"])): ?>
                            <a class="icon-link" href="includes/admin/logout.php">
                                <svg class="admin-icon" xmlns="http://www.w3.org/2000/svg" id="Layer_2" data-name="Layer 2" viewBox="0 0 73.2 90.1">
                                    <g data-name="Layer 2">
                                        <path class="cls-2" d="M61.9,33.8h-2.8v-10.8C59.1,10.1,49.8,0,36.5,0S14.1,10.3,14.1,23v10.7h0q0,.1,0,0h-2.8c-6.2,0-11.2,5-11.3,11.3v33.8c0,6.2,5,11.2,11.3,11.3h50.6c6.2,0,11.2-5,11.3-11.3v-33.8c0-6.2-5.1-11.2-11.3-11.2ZM19.7,33.8v-10.8c0-9.6,6.6-17.4,16.8-17.4s17,7.6,17,17.4v10.7h0q0,.1,0,0H19.7v.1h0ZM67.5,78.8c0,3.1-2.5,5.6-5.6,5.6H11.3c-3.1,0-5.6-2.5-5.6-5.6v-33.8c0-3.1,2.5-5.6,5.6-5.6h50.6c3.1,0,5.6,2.5,5.6,5.6v33.8ZM42.2,56.3c0,2.1-1.1,3.9-2.8,4.9h-.1.1v9.2c0,1.6-1.3,2.8-2.8,2.8-1.6,0-2.8-1.3-2.8-2.8v-9.2h.1-.1c-1.7-1-2.8-2.8-2.8-4.9,0-3.1,2.5-5.6,5.6-5.6,3.1-.1,5.6,2.4,5.6,5.6Z"/>
                                    </g>
                                </svg>
                            </a>
                        <?php else: ?>
                            <a class="icon-link" href="admin/login.php">
                                <svg class="admin-icon" xmlns="http://www.w3.org/2000/svg" id="Layer_2" data-name="Layer 2" viewBox="0 0 600 700">
                                    <g data-name="Layer 1">
                                        <g>
                                        <path class="cls-1" d="M300,300c82.84,0,150-67.16,150-150S382.84,0,300,0s-150,67.16-150,150,67.16,150,150,150Z"/>
                                        <path class="cls-1" d="M600,550c0-82.85-67.15-150-150-150H150C67.16,400,0,467.15,0,550v150h600v-150Z"/>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                        <?php endif; ?>
                    </li>
                </ul>

                <!-- <?php if (isset($_SESSION["admin"])): ?>
                    <div class="admin-panel">
                        <a href="includes/admin/logout.php">Logout</a>
                        <a href="#">Add Post</a>
                        <a href="#">Edit Content</a>
                    </div>
                <?php endif; ?> -->
            </nav>
        </div>
    </header>

<main>
    <section id="hero-section" class="grid-con">
        <div id="hero-container" class="col-span-full l-col-start-1 l-col-end-13">
            <h1 class="hidden">Welcome to <br> London Aviation Museum</h1>
            <!--Loop Video-->
            <section id="loop-video">
                <h2 class="hidden">Loop Video</h2>
                <div id="lp-container">
                    <video id="lp-player" autoplay muted loop playsinline preload="auto" poster="images/Thumbnail-logo.jpg" aria-label="Loop Video">
                        <source src="video/des-loop-video.mp4" type="video/mp4" media="(max-width: 767px)">
                        <source src="video/des-loop-video.mp4" type="video/mp4" media="(max-width: 1199px)">
                        <source src="video/des-loop-video.mp4" type="video/mp4">
                        Your browser does not support the video tag. Please update your browser or try a different one.
                    </video>
                </div>
            </section>
        </div>
        
        <div id="hs-container" class="col-span-full l-col-start-1 l-col-end-13"> 

            <div class="scroll-arrow">
                <i class="fa fa-chevron-down"></i>
            </div>

            <!-- <button class="slide-prev">&#10094;</button>
            <button class="slide-next">&#10095;</button> -->

            <div id="hs-slider">
                <div id="hsi-1" class="hero-sub-container">
                    <div class="hero-sub-img">
                        <picture>
                            <source srcset="images/Homepage/mob-events-thumbnail.webp" media="(max-width: 767px)">
                            <source srcset="images/Homepage/tab-events-thumbnail.webp" media="(max-width: 1199px)">
                            <img src="images/Homepage/des-events-thumbnail.webp" alt="Events">
                        </picture>
                    </div>
                    <span class="hero-sub-heading">Events</span>
                </div>

                <div id="hsi-2" class="hero-sub-container">
                    <div class="hero-sub-img">
                        <picture>
                            <source srcset="images/Homepage/mob-guide-thumbnail.webp" media="(max-width: 767px)">
                            <source srcset="images/Homepage/tab-guide-thumbnail.webp" media="(max-width: 1199px)">
                            <img src="images/Homepage/des-guide-thumbnail.webp" alt="Guide Tour">
                        </picture>
                    </div>
                    <span class="hero-sub-heading">Guide Tour</span>
                </div>

                <div id="hsi-3" class="hero-sub-container">
                    <div class="hero-sub-img">
                        <picture>
                            <source srcset="images/Homepage/mob-gallery-thumbnail.webp" media="(max-width: 767px)">
                            <source srcset="images/Homepage/tab-gallery-thumbnail.webp" media="(max-width: 1199px)">
                            <img src="images/Homepage/des-gallery-thumbnail.webp" alt="Events">
                        </picture>
                    </div>
                    <span class="hero-sub-heading">Gallery</span>
                </div>
            </div>

        </div>
    </section>

    <section id="our-museum" class="grid-con">
        <h1 id="mobile-om-heading" class="col-span-full">Our Museum</h1>
        <div id="om-right-content" class="col-span-full m-col-start-5 m-col-end-9 l-col-start-7 l-col-end-13">
            <h2 id="desktop-om-heading">Our Museum</h2>
            <div id="om-block-1" class="om-blocks">
                    <picture>
                        <source srcset="images/Homepage/mob-name-1.webp" media="(max-width: 767px)">
                        <source srcset="images/Homepage/tab-name-1.webp" media="(max-width: 1199px)">
                        <img src="images/Homepage/des-name-1.webp" alt="Name #1">
                    </picture>
            </div>
            <div id="om-block-3" class="om-blocks">
                <picture>
                    <source srcset="images/Homepage/des-name-3.jpg" media="(max-width: 767px)">
                    <source srcset="images/Homepage/des-name-3.jpg" media="(max-width: 1199px)">
                    <img src="images/Homepage/des-name-3.jpg" alt="Name #3">
                </picture>
            </div>
        </div>

        <div id="om-left-content" class="col-span-full m-col-start-1 m-col-end-5 l-col-start-2 l-col-end-7">
            <div id="om-text-block">
                <p id="om-text" class="om-text-body">
                    427 Wing's museum is housed in a 1943 airmen's canteen at the London International Airport. The canteen is the last surviving building from the British Commonwealth Air Training Plan (BCATP) base that existed at London's airport during World War II. It is a London landmark and is listed in the city's Register of Cultural Heritage Resources.
                    The museum commemorates the thousands of Canadian and Commonwealth airmen who trained at this site, as well as the military and civilian personnel who supported and instructed them. It will also commemorate the nearly 250 London men who lost their lives while serving with the RCAF during World War Two.
                    The museum is currently installing a permanent exhibition in the main hall of the canteen building, illustrating the history of military and civilian aviation in the London region. It will focus primarily on the two BCATP training schools - a navigator's school and an elementary flying school. The exhibit will incorporate uniforms, a variety of artifacts, historic images and several
                    model aircraft from the museum's collection, including a Spitfire and a Lancaster. The exhibition is slated to open in the fall of 2026.
                </p>
            </div>
            <div id="om-block-2-4">
                <div id="om-block-2" class="om-blocks">
                    <picture>
                        <source srcset="images/Homepage/des-name-2.jpg" media="(max-width: 767px)">
                        <source srcset="images/Homepage/des-name-2.jpg" media="(max-width: 1199px)">
                        <img src="images/Homepage/des-name-2.jpg" alt="Name #2">
                    </picture>
                </div>
                <div id="om-block-4" class="om-blocks">
                    <picture>
                        <source srcset="images/Homepage/des-name-4.jpg" media="(max-width: 767px)">
                        <source srcset="images/Homepage/des-name-4.jpg" media="(max-width: 1199px)">
                        <img src="images/Homepage/des-name-4.jpg" alt="Name #4">
                    </picture>
                </div>
            </div>
        </div>

        <!--Introduction Video-->
        <section id="intro-video" class="col-span-full l-col-start-2 l-col-end-12">
                <h2 class="hidden">Loop Video</h2>
                <div class="intro-video-container">
                    <div class="intro-video-player plyr__video-embed" id="intro-player">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/fundkBtFOrQ?si=FRaNywsbaX1jMGqU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
        </section>

        <div id="gutter-1" class="gutter"></div>
    </section>

    <section id="whats-on" class="grid-con">
        <h1 id="wo-heading" class="sub-headings col-span-full l-col-start-1 l-col-end-13">What is on?</h1>

        <button class="slide-prev">&#10094;</button>
        <button class="slide-next">&#10095;</button>

        <div id="wo-content" class="col-span-full l-col-start-1 l-col-end-13">
            <div id="wo-block-1" class="wo-blocks">
                <div class="wo-block-img">
                    <picture>
                        <source srcset="images/Homepage/des-wo-exhibtion.jpg" media="(max-width: 767px)">
                        <source srcset="images/Homepage/des-wo-exhibtion.jpg" media="(max-width: 1199px)">
                        <img src="images/Homepage/des-wo-exhibtion.jpg" alt="Exhibitions">
                    </picture>
                </div>
                <h2 class="wo-block-headings">Permanent Exhibition — Opening Fall 2026</h2>
                <p class="wo-block-texts">Military & civilian aviation history of the London region</p>
            </div>

            <div id="wo-block-2" class="wo-blocks">
                <div class="wo-block-img">
                    <picture>
                        <source srcset="images/Homepage/des-wo-activities.jpg" media="(max-width: 767px)">
                        <source srcset="images/Homepage/des-wo-activities.jpg" media="(max-width: 1199px)">
                        <img src="images/Homepage/des-wo-activities.jpg" alt="Activities and Experiences">
                    </picture>
                </div>
                <h2 class="wo-block-headings">Explore the Aviation Timeline</h2>
                <p class="wo-block-texts">From early flight to WWII — key events in London's aviation story</p>
            </div>

            <div id="wo-block-3" class="wo-blocks">
                <div class="wo-block-img">
                    <picture>
                        <source srcset="images/Homepage/des-wo-exhibtion2.jpg" media="(max-width: 767px)">
                        <source srcset="images/Homepage/des-wo-exhibtion2.jpg" media="(max-width: 1199px)">
                        <img src="images/Homepage/des-wo-exhibtion2.jpg" alt="Exhibitions">
                    </picture>
                </div>
                <h2 class="wo-block-headings">Book of Remembrance</h2>
                <p class="wo-block-texts">Honouring those who gave their lives in BCATP training</p>
            </div>
        </div>
        <button id="wo-content-btn" class="col-span-full l-col-start-1 l-col-end-13">More Activities & Exhibition</button>
        <div id="gutter-2" class="gutter"></div>
    </section>

    <section id="support-us" class="grid-con">
        <h1 id="ss-heading" class="sub-headings col-span-full l-col-start-1 l-col-end-13">Support Us!</h1>
        <div id="gutter-3" class="col-span-full l-col-start-3 l-col-end-13"></div>

        <button class="slide-prev">&#10094;</button>
        <button class="slide-next">&#10095;</button>

        <div id="ss-content" class="col-span-full l-col-start-1 l-col-end-13">
            <div id="ss-block-1" class="ss-blocks">
                <div class="ss-block-img">
                    <picture>
                        <source srcset="images/Homepage/des-ss-donate.jpg" media="(max-width: 767px)">
                        <source srcset="images/Homepage/des-ss-donate.jpg" media="(max-width: 1199px)">
                        <img src="images/Homepage/des-ss-donate.jpg" alt="Donate">
                    </picture>
                </div>
                <h2 class="ss-block-headings">DONATE</h2>
                <p class="ss-block-texts">Help preserve London's aviation heritage and fund our 2026 exhibition</p>
            </div>

            <div id="ss-block-2" class="ss-blocks">
                <div class="ss-block-img">
                    <picture>
                        <source srcset="images/Homepage/des-ss-charity.jpg" media="(max-width: 767px)">
                        <source srcset="images/Homepage/des-ss-charity.jpg" media="(max-width: 1199px)">
                        <img src="images/Homepage/des-ss-charity.jpg" alt="Charity">
                    </picture>
                </div>
                <h2 class="ss-block-headings">CHARITY</h2>
                <p class="ss-block-texts">Support 427 Wing RCAF Association's community commemoration programs</p>
            </div>

            <div id="ss-block-3" class="ss-blocks">
                <div class="ss-block-img">
                    <picture>
                        <source srcset="images/Homepage/des-ss-lunch.jpg" media="(max-width: 767px)">
                        <source srcset="images/Homepage/des-ss-lunch.jpg" media="(max-width: 1199px)">
                        <img src="images/Homepage/des-ss-lunch.jpg" alt="Lunch Charity">
                    </picture>
                </div>
                <h2 class="ss-block-headings">LUNCH CHARITY</h2>
                <p class="ss-block-texts">Join us for our annual fundraising luncheon honouring RCAF veterans and their families</p>
            </div>
        </div>

    </section>

    <section id="newsletter-app">
        <section id="newsletter" class="grid-con">    
            <h1 id="nl-header" class="sub-headings col-span-full l-col-start-1 l-col-end-13">Stay Informed!</h1>
            <div id="nl-content" class="col-span-full l-col-start-1 l-col-end-13">
                <p id="nl-text"> Sign up for updates on the museum's opening, new exhibitions, and upcoming eventshonouring London's aviation heritage.</p>
                
                <form id="nl-form-con" class="col-span-full" @submit.prevent="submitNewsletter">
                    <div id="nl-form">
                        <input type="text" placeholder="Name *" class="nl-field" v-model="firstName" required/>
                        <br />
                        <input type="email" placeholder="Email *" class="nl-field" v-model="email" required/>
                        <br />
                    </div>
                    <button id="nl-subscribe" :disabled="loading">{{ loading ? 'Subscribing...' : 'Subscribe' }}</button>
                </form>
                <div v-if="feedbackMessage" :class="feedbackClass" id="nl-feedback" v-html="feedbackMessage"></div>
            </div>
        </section>
    </section>
    
</main>

<footer id="footer-section" class="grid-con">
        <div id="footer-content" class="col-span-full">
            <div id="about-museum">
                <h2 class="footer-sub-headers">About Museum</h2>
                <div id="am-content">
                    <a class="footer-links">Our Purpose</a>
                    <a class="footer-links">Get To Know</a>
                    <a class="footer-links">Plans</a>
                    <a class="footer-links">Sustainability</a>
                </div>
            </div>

            <div id="services">
                <h2 class="footer-sub-headers">Services</h2>
                <div id="services-content">
                    <a class="footer-links">Membership</a>
                    <a class="footer-links">Way of Giving</a>
                    <a class="footer-links">Donate</a>
                    <a class="footer-links">Volunteer</a>
                </div>
            </div>

            <div id="book-event">
                <h2 class="footer-sub-headers">Book Event</h2>
                <div id="bk-content">
                    <a class="footer-links">Rental Options</a>
                    <a class="footer-links">Catering Services</a>
                </div>
            </div>

            <div id="professionals">
                    <h2 class="footer-sub-headers">Professionals</h2>
                    <div id="pro-content">
                        <a class="footer-links">Media</a>
                        <a class="footer-links">Exhibition</a>
                        <a class="footer-links">Business With Us</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="social" class="col-span-full l-col-start-1 l-col-end-13">
            <div id="social-content">
                <div class="social-icon">
                    <img src="images/instagram-icon.svg" alt="Instagram Icon">
                </div>
                <div class="social-icon">
                    <img src="images/facebook-icon.svg" alt="Facebook Icon">
                </div>
                <div class="social-icon">
                    <img src="images/tiktok-icon.svg" alt="Tiktok Icon">
                </div>
                <div class="social-icon">
                    <img src="images/x-icon.svg" alt="X Icon">
                </div>
            </div>
        </div>
    </footer>
    
    
</body>
<script src="https://cdn.plyr.io/3.8.3/plyr.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js"></script>
<script type="module" src="js/main.js"></script>
</html>