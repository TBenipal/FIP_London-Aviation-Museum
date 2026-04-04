<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <link rel="icon" type="image/x-icon" href=""> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.8.3/plyr.css">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/grid.css" rel="stylesheet">
    <title>Exhibition</title>
</head>
<body data-page="exhibition">
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
                    <li class="nav-item"><a href="index.php">Home</a></li>
                    <li class="nav-item"><a href="battle-of-britain.php">Battle of Britian</a></li>
                    <li class="nav-item"><a href="wartime.php">Wartime</a></li>
                    <li class="nav-item"><a href="exhibition.php" class="active">Exhibition</a></li>
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

        <section id="exhibition-hero" class="grid-con">
            <h1 class="hidden">Exhibition Introduction</h1>
            <div id="exhibition-main" class="col-span-full l-col-start-1 l-col-end-13">
                <picture>
                    <source srcset="images/Exhibtion/des-exhibtion-hero.jpg" media="(max-width: 767px)">
                    <source srcset="images/Exhibtion/des-exhibtion-hero.jpg" media="(max-width: 1199px)">
                    <img src="images/Exhibtion/des-exhibtion-hero.jpg" alt="Exhibition Hero Image">
                </picture>
            </div>
            
            <div id="eh-container" class="col-span-full l-col-start-1 l-col-end-13">
                <div id="ehi-1" class="eh-sub-container">
                    <div class="hero-sub-img">
                        <picture>
                            <source srcset="images/Homepage/des-events-thumbnail.webp" media="(max-width: 767px)">
                            <source srcset="images/Homepage/des-events-thumbnail.webp" media="(max-width: 1199px)">
                            <img src="images/Homepage/des-events-thumbnail.webp" alt="Events Thumbnail Image">
                        </picture>
                    </div>
                    <span class="hero-sub-heading">Events</span>
                </div>

                <div id="ehi-2" class="eh-sub-container">
                    <div class="hero-sub-img">
                        <picture>
                            <source srcset="images/Homepage/des-guide-thumbnail.webp" media="(max-width: 767px)">
                            <source srcset="images/Homepage/des-guide-thumbnail.webp" media="(max-width: 1199px)">
                            <img src="images/Homepage/des-guide-thumbnail.webp" alt="Guide Tour Thumbnail Image">
                        </picture>
                    </div>
                    <span class="hero-sub-heading">Guide Tour</span>
                </div>

                <div id="ehi-3" class="eh-sub-container">
                    <div class="hero-sub-img">
                        <picture>
                            <source srcset="images/Homepage/des-gallery-thumbnail.webp" media="(max-width: 767px)">
                            <source srcset="images/Homepage/des-gallery-thumbnail.webp" media="(max-width: 1199px)">
                            <img src="images/Homepage/des-gallery-thumbnail.webp" alt="Gallery Thumbnail Image">
                        </picture>
                    </div>
                    <span class="hero-sub-heading">Gallery</span>
                </div>
            </div>
        </section>

        <!-- <div id="gutter-7"></div> -->

        <section id="exhibition-social" class="grid-con">
            <h1 id="es-heading" class="sub-headings col-span-full l-col-start-1 l-col-end-13">A City in the Air London's Aviation Story</h1>
            <div class="video-container col-span-full l-col-start-2 l-col-end-12">
                <video class="video-player" playsinline controls controls data-poster="" aria-label="Loop Video">
                    <source src="video/des-loop-video.mp4" type="video/mp4" media="(max-width: 767px)">
                    <source src="video/des-loop-video.mp4" type="video/mp4" media="(max-width: 1199px)">
                    <source src="video/des-loop-video.mp4" type="video/mp4">
                    Your browser does not support the video tag. Please update your browser or try a different one.
                </video>
            </div>

            <div id="es-content" class="col-span-full l-col-start-1 l-col-end-13">
                <div class="es-container">
                    <div class="es-sub-img">
                        <picture>
                            <source srcset="images/Homepage/des-events-thumbnail.webp" media="(max-width: 767px)">
                            <source srcset="images/Homepage/des-events-thumbnail.webp" media="(max-width: 1199px)">
                            <img src="images/Homepage/des-events-thumbnail.webp" alt="Name #1 Image">
                        </picture>
                    </div>
                    <h2 class="es-sub-heading">Events</h2>
                    <div class="es-gutter"></div>
                    <p class="es-sub-text">Opened June 24, 1940 at Crumlin Airport, this school provided primary pilot training using Fleet Finch II aircraft. Student pilots learned fundamental flight skills, aerobatics, and basic navigation — both Canadian and international trainees progressed from here to advanced training schools across the Commonwealth.</p>
                </div>
                <div class="es-container">
                    <div class="es-sub-img">
                        <picture>
                            <source srcset="images/Homepage/des-guide-thumbnail.webp" media="(max-width: 767px)">
                            <source srcset="images/Homepage/des-guide-thumbnail.webp" media="(max-width: 1199px)">
                            <img src="images/Homepage/des-guide-thumbnail.webp" alt="Name #2 Image">
                        </picture>
                    </div>
                    <h2 class="es-sub-heading">Guided Tour</h2>
                    <div class="es-gutter"></div>
                    <p class="es-sub-text">Opened December 17, 1940, this school trained navigators and air observers using the Avro Anson and Harvard aircraft. Trainees from New Zealand, the United States, and across the Commonwealth completed navigation, bombing, gunnery, and map-reading courses, supported by Link trainers for instrument flight simulation.</p>
                </div>
                <div class="es-container">
                    <div class="es-sub-img">
                        <picture>
                            <source srcset="images/Homepage/des-gallery-thumbnail.webp" media="(max-width: 767px)">
                            <source srcset="images/Homepage/des-gallery-thumbnail.webp" media="(max-width: 1199px)">
                            <img src="images/Homepage/des-gallery-thumbnail.webp" alt="Name #3 Image">
                        </picture>
                    </div>
                    <h2 class="es-sub-heading">Gallery</h2>
                    <div class="es-gutter"></div>
                    <p class="es-sub-text">A lasting tribute to those who lost their lives during aviation training in and around London. The Book of Remembrance records the names of aircrew, instructors, and support personnel who made the ultimate sacrifice preparing to defend freedom — searchable by name, rank, squadron, date of loss, and service number.</p>
                </div>
            </div>

            <div id="es-sub-content" class="col-span-full l-col-start-1 l-col-end-13">
                <div id="es-about-img">
                    <picture>
                        <source srcset="images/Exhibtion/des-exhibtion-about.jpg" media="(max-width: 767px)">
                        <source srcset="images/Exhibtion/des-exhibtion-about.jpg" media="(max-width: 1199px)">
                        <img src="images/Exhibtion/des-exhibtion-about.jpg" alt="About Image">
                    </picture>
                </div>
                <div id="es-about-text">
                    <h2 id="es-about-heading" class="sub-headings">About London Aviation Museum</h2>
                    <p id="es-about-description">A project of 427 Wing (London), Royal Canadian Air Force Association. The museum is housed in a 1943 airmen's canteen at the London International Airport — the last surviving building from the British Commonwealth Air Training Plan (BCATP) base that existed at London's airport during World War II. The canteen is a London landmark, listed in the city's Register of Cultural Heritage Resources. The museum commemorates the thousands of Canadian and Commonwealth airmen who trained at this site, as well as the military and civilian personnel who supported them — and the nearly 250 London men who lost their lives serving with the RCAF during World War Two.</p>
                </div>
            </div>
        </section>

        <section id="exhibition-gallery" class="grid-con">
            <h1 id="eg-heading" class="sub-headings col-span-full l-col-start-1 l-col-end-13">Gallery Collection</h1>
    
            <div class="gallery-box col-span-full m-col-start-1 m-col-end-5 l-col-start-1 l-col-end-4">
                <picture>
                    <source srcset="images/Exhibtion/des-exhibtion-gallery-img-1.jpg" media="(max-width: 767px)">
                    <source srcset="images/Exhibtion/des-exhibtion-gallery-img-1.jpg" media="(max-width: 1199px)">
                    <img src="images/Exhibtion/des-exhibtion-gallery-img-1.jpg" alt="Gallery Image 1">
                </picture>
            </div>

            <div class="gallery-box col-span-full m-col-start-5 m-col-end-9 l-col-start-4 l-col-end-8">
                <picture>
                    <source srcset="images/Exhibtion/des-exhibtion-gallery-img-2.jpg" media="(max-width: 767px)">
                    <source srcset="images/Exhibtion/des-exhibtion-gallery-img-2.jpg" media="(max-width: 1199px)">
                    <img src="images/Exhibtion/des-exhibtion-gallery-img-2.jpg" alt="Gallery Image 2">
                </picture>
            </div>

            <div class="gallery-box col-span-full m-col-start-1 m-col-end-5 l-col-start-8 l-col-end-13">
                <picture>
                    <source srcset="images/Exhibtion/des-exhibtion-gallery-img-3.jpg" media="(max-width: 767px)">
                    <source srcset="images/Exhibtion/des-exhibtion-gallery-img-3.jpg" media="(max-width: 1199px)">
                    <img src="images/Exhibtion/des-exhibtion-gallery-img-3.jpg" alt="Gallery Image 3">
                </picture>
            </div>

            <div class="gallery-box col-span-full m-col-start-5 m-col-end-9 l-col-start-1 l-col-end-4">
                <picture>
                    <source srcset="images/Exhibtion/des-exhibtion-gallery-img-4.jpg" media="(max-width: 767px)">
                    <source srcset="images/Exhibtion/des-exhibtion-gallery-img-4.jpg" media="(max-width: 1199px)">
                    <img src="images/Exhibtion/des-exhibtion-gallery-img-4.jpg" alt="Gallery Image 4">
                </picture>
            </div>

            <div class="gallery-box col-span-full m-col-start-1 m-col-end-5 l-col-start-4 l-col-end-9">
                <picture>
                    <source srcset="images/Exhibtion/des-exhibtion-gallery-img-5.jpg" media="(max-width: 767px)">
                    <source srcset="images/Exhibtion/des-exhibtion-gallery-img-5.jpg" media="(max-width: 1199px)">
                    <img src="images/Exhibtion/des-exhibtion-gallery-img-5.jpg" alt="Gallery Image 5">
                </picture>
            </div>

            <div class="gallery-box col-span-full m-col-start-5 m-col-end-9 l-col-start-9 l-col-end-13">
                <picture>
                    <source srcset="images/Exhibtion/des-exhibtion-gallery-img-6.jpg" media="(max-width: 767px)">
                    <source srcset="images/Exhibtion/des-exhibtion-gallery-img-6.jpg" media="(max-width: 1199px)">
                    <img src="images/Exhibtion/des-exhibtion-gallery-img-6.jpg" alt="Gallery Image 5">
                </picture>
            </div>

            <div id="eg-btn-container" class="col-span-full m-col-start-1 m-col-end-9 l-col-start-1 l-col-end-13">
                <button id="eg-btn">Show more</button>
            </div>
        </section>

        <section id="newsletter" class="grid-con">
            <h1 id="nl-header" class="sub-headings col-span-full l-col-start-1 l-col-end-13">Stay Informed!</h1>

            <div id="nl-content" class="col-span-full l-col-start-1 l-col-end-13">
                <p id="nl-text">Sign up for updates on the museum's opening, new exhibitions, and upcoming events honouring London's aviation heritage.</p>
                
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