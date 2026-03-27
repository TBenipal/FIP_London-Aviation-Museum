<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Battle of Britian</title>
    <link href="css/main.css" rel="stylesheet">
    <link href="css/grid.css" rel="stylesheet">
</head>
<body data-page="bob">
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
                    <li class="nav-item"><a href="battle-of-britain.php" class="active">Battle of Britian</a></li>
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
        <section id="bob-hero" class="grid-con">
            <div id="bob-content" class="container hero-container col-span-full">
                <div class="bob-slider">
                <div class="active-display"></div>

                <div class="preview-row">
                    <div class="item">
                    <img src="images/Bob/des-pilot-1.jpg" alt="Switzerland" />
                    <div class="content">
                        <h2 class="name">Pilot 1</h2>
                        <p class="des">Position: </p>
                        <button>See More</button>
                    </div>
                    </div>
                    <div class="item">
                    <img src="images/Bob/des-pilot-2.jpg" alt="Pilot 2" />
                    <div class="content">
                        <h2 class="name">Pilot 2</h2>
                        <p class="des">Position: </p>
                        <button>See More</button>
                    </div>
                    </div>
                    <div class="item">
                    <img src="images/Bob/des-pilot-3.jpg" alt="Pilot 3" />
                    <div class="content">
                        <h2 class="name">Pilot 3</h2>
                        <p class="des">Position: </p>
                        <button>See More</button>
                    </div>
                    </div>
                    <div class="item">
                    <img src="images/Bob/des-pilot-4.jpg" alt="Pilot 4" />
                    <div class="content">
                        <h2 class="name">Pilot 4</h2>
                        <p class="des">Position: </p>
                        <button>See More</button>
                    </div>
                    </div>
                    <div id="pilot-5" class="item">
                    <img src="images/Bob/des-pilot-5.jpg" alt="Pilot 5" />
                    <div class="content">
                        <h2 class="name">Pilot 5</h2>
                        <p class="des">Position: </p>
                        <button>See More</button>
                    </div>
                    </div>
                </div>

                </div>
            </div>
        </section>

        <section id="bob-history" class="grid-con">
            <h1 id="bh-heading" class="sub-headings col-span-full">The Battle of Britain</h1>
            <div id="bh-img" class="col-span-full l-col-start-1 l-col-end-6">
                <picture>
                    <source srcset="images/Bob/des-history-img.jpg" media="(max-width: 767px)">
                    <source srcset="images/Bob/des-history-img.jpg" media="(max-width: 1199px)">
                    <img src="images/Bob/des-history-img.jpg" alt="Battle of Britian History Image">
                </picture>
            </div>
            <div id="bh-content" class="col-span-full l-col-start-7 l-col-end-13">
                <h2 id="des-bh-heading" class="sub-headings col-span-full">The Battle of Britain</h2>
                <p id="bh-sub-heading" class="bh-text"><strong>A Critical Turning Point in the Second World War</strong></p>
                <p class="bh-text">The Battle of Britain, fought between July and October 1940, marked a critical turning point in the Second World War. It was the first major military campaign fought entirely in the air and played a decisive role in preventing a German invasion of the United Kingdom. While the battle took place overseas, its impact reached far beyond Britain's borders. London, Ontario, played an important supporting role through its connection to aircrew training and aviation preparation.</p>
                <button id="bh-btn">Read More History!</button>
            </div>
        </section>

        <section id="bob-description" class="grid-con">
            <h1 class="hidden">Description</h1>
            <div id="bd-content" class="col-span-full l-col-start-1 l-col-end-6">
                <h2 id="bd-heading" class="sub-headings">Londoners and the Battle of Britain</h2>
                <p class="bd-text">Individuals from the London region served as pilots, navigators, and ground crew, while others contributed indirectly through training programs that later fed into front-line squadrons. The skills developed in Canadian training schools helped sustain the Royal Air Force during one of its most challenging periods. By highlighting Londoners' involvement in the Battle of Britain, this section emphasizes the city's contribution to a global conflict. It demonstrates how local communities were deeply connected to international events and how efforts made at home influenced the outcome of the war abroad.</p>                
                <p class="bd-text">London, Ontario, played an important supporting role through its connection to aircrew training and aviation preparation. The British Commonwealth Air Training Plan (BCATP) schools operated at Crumlin Airport prepared aviators who would go on to serve in decisive engagements over British skies. Remembering these connections helps place London's aviation history within a wider historical and global context — demonstrating that the war effort was as much a community endeavour as it was a military one.</p>                
                <button id="bd-btn" class="col-span-full"><a href="book-of-remembrance.php">Honor & Remember</a></button>
            </div>
            <div id="bd-img" class="col-span-full l-col-start-7 l-col-end-13">
                <picture>
                    <source srcset="images/Bob/des-description-img.jpg" media="(max-width: 767px)">
                    <source srcset="images/Bob/des-description-img.jpg" media="(max-width: 1199px)">
                    <img src="images/Bob/des-description-img.jpg" alt="Description Image">
                </picture>
            </div>
        </section>

        <section id="bob-airplane" class="grid-con">
            <h1 id="ba-heading" class="col-span-full">Aircraft Flown by London's Airmen</h1>

            <div id="ba-content" class="col-span-full">

                <div id="ba-model" class="col-span-full">
                    <model-viewer src="model/military+fighter+plane+3d+model.glb" src="model/military+fighter+plane+3d+model.glb" camera-controls auto-rotate ar>
                    </model-viewer>
                </div>

                <div id="ba-navbar">

                    <ul id="ba-nav">
                        <li class="nav-item">
                            <button class="ba-tab active" data-content="name">Name</button>
                        </li>

                        <li class="nav-item">
                            <button class="ba-tab" data-content="mechanic">Mechanic</button>
                        </li>

                        <li class="nav-item">
                            <button class="ba-tab" data-content="history">History</button>
                        </li>
                    </ul>
                    <div id="ba-text"></div>
                </div>
                <template id="name">
                    <p>Londoners who served in the Battle of Britain flew iconic British aircraft that became symbols of the Allied struggle for air supremacy over the English Channel.</p>
                </template>

                <template id="mechanic">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum ipsum assumenda, qui ipsam fugit reprehenderit quam officiis voluptatibus suscipit repellat at dolor provident odio cumque, delectus placeat beatae excepturi laboriosam.</p>
                </template>

                <template id="history">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium ipsam, doloribus, aperiam perferendis dolorem, distinctio porro architecto voluptatibus ratione iste magni error commodi quam? Reiciendis nemo natus ea cumque rerum.</p>
                </template>
            </div>

            <div id="ba-images" class="col-span-full">
                <div class="ba-img">
                    <picture>
                        <source srcset="images/Bob/des-3dmodel-img.jpg" media="(max-width: 767px)">
                        <source srcset="images/Bob/des-3dmodel-img.jpg" media="(max-width: 1199px)">
                        <img src="images/Bob/des-3dmodel-img.jpg" alt="Model Image">
                    </picture>
                </div>
                <div class="ba-img">
                    <picture>
                        <source srcset="images/Bob/des-3dmodel-img.jpg" media="(max-width: 767px)">
                        <source srcset="images/Bob/des-3dmodel-img.jpg" media="(max-width: 1199px)">
                        <img src="images/Bob/des-3dmodel-img.jpg" alt="Model Image">
                    </picture>
                </div>
                <div class="ba-img">
                    <picture>
                        <source srcset="images/Bob/des-3dmodel-img.jpg" media="(max-width: 767px)">
                        <source srcset="images/Bob/des-3dmodel-img.jpg" media="(max-width: 1199px)">
                        <img src="images/Bob/des-3dmodel-img.jpg" alt="Model Image">
                    </picture>
                </div>
            </div>

        </section>

        <section id="bob-gallery" class="grid-con">
            <h1 class="hidden">Battle of Britain Gallery</h1>
            <div id="gutter-6" class="col-span-full"></div>
            <div id="bg-main" class="col-span-full">
                <picture>
                    <source srcset="images/Bob/des-bob-gallery-1.jpg" media="(max-width: 767px)">
                    <source srcset="images/Bob/des-bob-gallery-1.jpg" media="(max-width: 1199px)">
                    <img src="images/Bob/des-bob-gallery-1.jpg" alt="Model Image">
                </picture>
            </div>
            <div id="bg-content" class="col-span-full">
                <div class="bg-img">
                    <picture>
                        <source srcset="images/Bob/des-bob-gallery-1.jpg" media="(max-width: 767px)">
                        <source srcset="images/Bob/des-bob-gallery-1.jpg" media="(max-width: 1199px)">
                        <img src="images/Bob/des-bob-gallery-1.jpg" alt="Model Image">
                    </picture>
                </div>
                <div class="bg-img">
                    <picture>
                        <source srcset="images/Bob/des-bob-gallery-2.jpg" media="(max-width: 767px)">
                        <source srcset="images/Bob/des-bob-gallery-2.jpg" media="(max-width: 1199px)">
                        <img src="images/Bob/des-bob-gallery-2.jpg" alt="Model Image">
                    </picture>
                </div>
                <div class="bg-img">
                    <picture>
                        <source srcset="images/Bob/des-bob-gallery-1.jpg" media="(max-width: 767px)">
                        <source srcset="images/Bob/des-bob-gallery-1.jpg" media="(max-width: 1199px)">
                        <img src="images/Bob/des-bob-gallery-1.jpg" alt="Model Image">
                    </picture>
                </div>
                <div class="bg-img">
                    <picture>
                        <source srcset="images/Bob/des-3dmodel-img.jpg" media="(max-width: 767px)">
                        <source srcset="images/Bob/des-3dmodel-img.jpg" media="(max-width: 1199px)">
                        <img src="images/Bob/des-3dmodel-img.jpg" alt="Model Image">
                    </picture>
                </div>
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
        <div id="footer-logo" class="col-start-1 m-col-start-2 m-col-end-9 l-col-start-2 l-col-end-12">
            <img src="images/horizontal-logo.svg" alt="London Aviation Museum Logo">
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
                <div class="social-icon">
                    <img src="images/instagram.png" alt="Instagram Icon">
                </div>
                <div class="social-icon">
                    <img src="images/facebook.png" alt="Instagram Icon">
                </div>
                <div class="social-icon">
                    <img src="images/tiktok.png" alt="Instagram Icon">
                </div>
                <div class="social-icon">
                    <img src="images/x.png" alt="Instagram Icon">
                </div>
            </div>
        </div>
    </footer>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.14.1/dist/gsap.min.js"></script>
<script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/3.5.0/model-viewer.min.js"></script>
<script type="module" src="js/main.js"></script>
</html>