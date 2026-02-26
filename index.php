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
    <title>London Aviation Musadasdseum</title>
</head>
<body data-page="homepage">
    <!-- Header -->
    <header id="header-section" class="grid-con">
        <h1 class="hidden">Navbar</h1>

        <div id="menu" class="col-span-full">

            <div id="mobile-header">
                <div id="header-logo"><a href="index.html">
                    <img src="images/logo_horizontal.png" alt="London Aviation Museum Logo"></a>
                </div>
                
                <button class="hamburger" aria-label="Open menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

            </div>

            <nav id="sidebar">
                <ul>
                    <li class="nav-item"><a href="index.html" class="active">Home</a></li>
                    <li class="nav-item"><a href="battle-of-britain.html">Battle of Britian</a></li>
                    <li class="nav-item"><a href="wartime.html">Wartime</a></li>
                    <li class="nav-item"><a href="exhibition.html">Exhibition</a></li>
                    <li class="nav-item"><a href="contact.html">Contact!</a></li>
                </ul>

                <?php if (isset($_SESSION["admin"])): ?>
                    <div class="admin-panel">
                        <a href="includes/admin/logout.php">Logout</a>
                        <a href="#">Add Post</a>
                        <a href="#">Edit Content</a>
                    </div>
                <?php endif; ?>
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
                        <video id="lp-player" muted playsinline autoplay loop data-poster="" aria-label="Loop Video">
                            <source src="video/IDP_video.mp4" type="video/mp4" media="(max-width: 767px)">
                            <source src="video/IDP_video.mp4" type="video/mp4" media="(max-width: 1199px)">
                            <source src="video/IDP_video.mp4" type="video/mp4">
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
                        <div class="hero-sub-img"></div>
                        <span class="hero-sub-heading">Events</span>
                    </div>

                    <div id="hsi-2" class="hero-sub-container">
                        <div class="hero-sub-img"></div>
                        <span class="hero-sub-heading">Guide Tour</span>
                    </div>

                    <div id="hsi-3" class="hero-sub-container">
                        <div class="hero-sub-img"></div>
                        <span class="hero-sub-heading">Gallery</span>
                    </div>
                </div>

            </div>
        </section>

        <section id="our-museum" class="grid-con">
            <h1 id="mobile-om-heading" class="col-span-full">Our Museum</h1>
            <div id="om-right-content" class="col-span-full l-col-start-7 l-col-end-13">
                <h2 id="desktop-om-heading">Our Museum</h2>
                <div id="om-block-1" class="om-blocks"><p class="block-text">Name #1</p></div>
                <div id="om-block-3" class="om-blocks"><p class="block-text">Name #3</p></div>
            </div>

            <div id="om-left-content" class="col-span-full l-col-start-2 l-col-end-7">
                <div id="om-text-block">
                    <p id="om-text" class="text-body">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim blanditiis nostrum consequatur sed quas illo minus inventore vel qui ex, alias reprehenderit temporibus nobis soluta iure culpa quisquam libero atque?
                        <br><br>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis qui corrupti sint doloremque impedit velit...
                    </p>
                </div>
                <div id="om-block-2" class="om-blocks"><p class="block-text">Name #2</p></div>
                <div id="om-block-4" class="om-blocks"><p class="block-text">Name #4</p></div>
            </div>

            <!--Introduction Video-->
            <section id="intro-video" class="col-span-full l-col-start-2 l-col-end-12">
                    <h2 class="hidden">Loop Video</h2>
                    <div class="video-container">
                        <video class="video-player" playsinline controls controls data-poster="" aria-label="Loop Video">
                            <source src="" type="video/mp4" media="(max-width: 767px)">
                            <source src="" type="video/mp4" media="(max-width: 1199px)">
                            <source src="../../video/IDP_video.mp4" type="video/mp4">
                            Your browser does not support the video tag. Please update your browser or try a different one.
                        </video>
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
                    <div class="wo-block-img"></div>
                    <h2 class="wo-block-headings">Exhibitions</h2>
                    <p class="wo-block-texts">Name #1</p>
                </div>

                <div id="wo-block-2" class="wo-blocks">
                    <div class="wo-block-img"></div>
                    <h2 class="wo-block-headings">Activities and Experiences</h2>
                    <p class="wo-block-texts">Name #2</p>
                </div>

                <div id="wo-block-3" class="wo-blocks">
                    <div class="wo-block-img"></div>
                    <h2 class="wo-block-headings">Exhibitions</h2>
                    <p class="wo-block-texts">Name #3</p>
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
                    <div class="ss-block-img"></div>
                    <h2 class="ss-block-headings">DONATE</h2>
                </div>

                <div id="ss-block-2" class="ss-blocks">
                    <div class="ss-block-img"></div>
                    <h2 class="ss-block-headings">CHARITY</h2>
                </div>

                <div id="ss-block-3" class="ss-blocks">
                    <div class="ss-block-img"></div>
                    <h2 class="ss-block-headings">LUNCH CHARITY</h2>
                </div>
            </div>

        </section>

        <section id="newsletter" class="grid-con">
            <h1 id="nl-header" class="sub-headings col-span-full l-col-start-1 l-col-end-13">Newsletter!</h1>

            <div id="nl-content" class="col-span-full l-col-start-1 l-col-end-13">
                <p id="nl-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolores explicabo, cum rem error sunt velit, dolorum et architecto quaerat hic quae! Laborum tenetur provident perferendis nemo, dolor enim maiores unde. Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque eum saepe molestias obcaecati sit? Placeat sed ipsam quis voluptate nisi eius vero nostrum dolore ipsa possimus suscipit repudiandae, accusantium neque.</p>
                
                <form id="nl-form-con" class="col-span-full">
                    <div id="nl-form">
                        <input type="text" placeholder="Name *" class="nl-field" name="first_name" id="first_name" required>
                        <br>
                        <input type="email" placeholder="Email *" class="nl-field" name="email" id="email" required>
                        <br>
                    </div>
                    <button id="nl-subscribe">Subscribe</button>
                </form>
            </div>

        </section>
        
    </main>

    <footer id="footer-section" class="grid-con">
        <div id="footer-logo" class="col-start-1 m-col-start-2 m-col-end-9 l-col-start-2 l-col-end-12">
            <img src="images/logo_horizontal.png" alt="London Aviation Museum Logo">
        </div>
        <div id="footer-content" class="col-span-full m-col-start-2 m-col-end-8 l-col-start-2 l-col-end-12">
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
            <h2 id="social-header">Social Media</h2>
            <div id="social-content">
                <div class="social-icon"></div>
                <div class="social-icon"></div>
                <div class="social-icon"></div>
                <div class="social-icon"></div>
            </div>
        </div>
    </footer>
    
    
</body>
<script src="https://cdn.plyr.io/3.8.3/plyr.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js"></script>
<script type="module" src="js/main.js"></script>
</html>