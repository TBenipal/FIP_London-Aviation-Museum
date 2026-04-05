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
                    <div id="pilot-1" class="item focus-none">
                        <picture>
                            <source srcset="images/Bob/des-pilot-1.jpg" media="(max-width: 767px)">
                            <source srcset="images/Bob/des-pilot-1.jpg" media="(max-width: 1199px)">
                            <img src="images/Bob/des-pilot-1.jpg" alt="Smith R.Reilley" />
                        </picture>
                        <div class="content">
                            <h2 class="name">Smith R.Reilley</h2>
                            <!-- <p class="des">Position: </p> -->
                            <button>See More</button>
                        </div>
                    </div>
                    <div id="pilot-2" class="item">
                        <picture>
                            <source srcset="images/Bob/Verschoyle Philip Cronyn.jpg" media="(max-width: 767px)">
                            <source srcset="images/Bob/Verschoyle Philip Cronyn.jpg" media="(max-width: 1199px)">
                            <img src="images/Bob/Verschoyle Philip Cronyn.jpg" alt="Smith R.Reilley" />
                        </picture>
                        <div class="content">
                            <h2 class="name">Verschoyle Philip Cronyn</h2>
                            <!-- <p class="des">Position: </p> -->
                            <button>See More</button>
                        </div>
                    </div>
                    <div id="pilot-3" class="item">
                        <img src="images/Bob/Smither.jpg" alt="Pilot 3" />
                        <div class="content">
                            <h2 class="name">Smither</h2>
                            <!-- <p class="des">Position: </p> -->
                            <button>See More</button>
                        </div>
                    </div>
                    <div id="pilot-4" class="item">
                        <img src="images/Bob/p3.jpg" alt="Pilot 4" />
                        <div class="content">
                            <h2 class="name">John William.</h2>
                            <!-- <p class="des">Position: </p> -->
                            <button>See More</button>
                        </div>
                    </div>
                    <div id="pilot-5" class="item">
                        <img src="images/Bob/Grassick.jpg" alt="Pilot 5" />
                        <div class="content">
                            <h2 class="name">Grassick</h2>
                            <!-- <p class="des">Position: </p> -->
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
            <h1 id="bd-heading" class="sub-headings col-span-full">Londoners and the Battle of Britain</h1>
            <div id="bd-img" class="col-span-full l-col-start-7 l-col-end-13">
                <picture>
                    <source srcset="images/Bob/des-description-img.jpg" media="(max-width: 767px)">
                    <source srcset="images/Bob/des-description-img.jpg" media="(max-width: 1199px)">
                    <img src="images/Bob/des-description-img.jpg" alt="Description Image">
                </picture>
            </div>
            <div id="bd-content" class="col-span-full l-col-start-1 l-col-end-7">
                <p class="bd-text">Individuals from the London region served as pilots, navigators, and ground crew, while others contributed indirectly through training programs that later fed into front-line squadrons. The skills developed in Canadian training schools helped sustain the Royal Air Force during one of its most challenging periods. By highlighting Londoners' involvement in the Battle of Britain, this section emphasizes the city's contribution to a global conflict. It demonstrates how local communities were deeply connected to international events and how efforts made at home influenced the outcome of the war abroad. London, Ontario, played an important supporting role through its connection to aircrew training and aviation preparation. The British Commonwealth Air Training Plan (BCATP) schools operated at Crumlin Airport prepared aviators who would go on to serve in decisive engagements over British skies. Remembering these connections helps place London's aviation history within a wider historical and global context — demonstrating that the war effort was as much a community endeavour as it was a military one.
                </p>          
                <button id="bd-btn" class="col-span-full"><a href="book-of-remembrance.php">Honor & Remember</a></button>
            </div>
        </section>

        <section id="bob-airplane" class="grid-con">
            <h1 id="ba-heading-main" class="ba-heading col-span-full">Aircraft Flown by London's Airmen</h1>
            <div id="ba-content" class="col-span-full">

                <div id="ba-model">
                    <model-viewer src="model/propeller airplane 3d model.glb" camera-controls auto-rotate ar></model-viewer>
                    <img class="ba-gif" src="images/Bob/Animated GIF.gif">
                </div>

                <div id="ba-text-imgs">
                    <h2 id="ba-heading-sub" class="ba-heading">Aircraft Flown by London's Airmen</h2>
                     <div id="ba-navbar">
                        <ul id="ba-nav">
                            <!-- <li class="nav-item">
                                <button class="ba-tab active" data-content="name">Name</button>
                            </li> -->

                            <li class="nav-item">
                                <button class="ba-tab active" data-content="mechanic">Mechanic</button>
                            </li>

                            <li class="nav-item">
                                <button class="ba-tab" data-content="history">History</button>
                            </li>
                        </ul>
                        <div id="ba-text"></div>
                    </div>

                    <template class="templates" id="mechanic">
                        <p>The Spitfire Mk I/II–type fighter was powered by the Rolls-Royce Merlin, a liquid-cooled V12 engine producing just over 1,000 horsepower, driving a three-blade propeller for strong speed and climb performance. Its structure used a stressed-skin aluminum airframe, keeping the aircraft lightweight yet strong. The Spitfire’s distinctive elliptical wings improved aerodynamic efficiency by reducing drag and providing balanced lift across the span, contributing to its smooth handling. It was equipped with eight .303 Browning machine guns mounted in the wings, and its control surfaces allowed precise maneuvering, making it highly effective in air combat.</p>
                    </template>

                    <template class="templates" id="history">
                        <p>The Spitfire Mk I/II–type fighter entered service with the Royal Air Force in the late 1930s and became one of the most important aircraft of the Second World War. It played a crucial role during the Battle of Britain in 1940, where its speed and maneuverability allowed it to effectively engage German fighters and bombers. While the Hawker Hurricane handled many bomber interceptions, the Spitfire was primarily used to counter enemy fighter aircraft. Its continuous development throughout the war led to many improved variants, solidifying its reputation as one of the most iconic and effective fighters of its time.</p>
                    </template>

                    <template class="templates" id="mechanic-2">
                        <p>The Fairey Finch Mk II was powered by an Armstrong Siddeley Tiger radial engine producing around 330 horsepower, driving a two-bladed propeller suited for stable, low-speed flight. It was a two-seat biplane with a welded steel tube fuselage and fabric covering, while its wooden wings provided structural strength with relatively simple construction. The aircraft featured fixed landing gear and dual controls, allowing instructors to train pilots effectively. Its design emphasized reliability and ease of handling rather than speed, making it well-suited for basic pilot training in the early stages of flight instruction.</p>
                    </template>

                    <template class="templates" id="history-2">
                        <p>The Fairey Finch Mk II entered service in the early 1930s as a primary trainer for the Royal Air Force and later saw extensive use with the Royal Canadian Air Force. By the start of the Second World War, it was already considered outdated compared to more modern monoplanes, but it remained in service as an elementary training aircraft. In Canada, the Finch played an important role in the British Commonwealth Air Training Plan, helping to train new pilots during the early years of the war before being gradually replaced by more advanced trainers.</p>
                    </template>

                    <template class="templates" id="mechanic-3">
                        <p>The Harvard Mk II–type trainer was powered by a Pratt & Whitney R-1340 Wasp radial engine producing around 600 horsepower, driving a constant-speed propeller that allowed better performance control during training. It featured a low-wing monoplane design with an all-metal structure, providing greater strength and durability compared to earlier fabric-covered trainers. The aircraft was equipped with retractable landing gear and dual cockpit controls arranged in tandem, enabling instructors to guide students through more advanced flight maneuvers. Its responsive handling and more powerful engine made it an ideal step between basic trainers and high-performance combat aircraft.</p>
                    </template>

                    <template class="templates" id="history-3">
                        <p>The Harvard Mk II was a version of the North American T-6 Texan advanced trainer, widely used by the Royal Air Force and Commonwealth air forces during the Second World War. Introduced in the late 1930s, it became a key aircraft in the British Commonwealth Air Training Plan, particularly in Canada, where it was used to train thousands of pilots in advanced flying techniques before they moved on to operational combat aircraft. Known for its reliability and more demanding handling compared to basic trainers, the Harvard helped prepare pilots for high-performance fighters and remained in service with various air forces for many years after the war.</p>
                    </template>

                    <template class="templates" id="mechanic-4">
                        <p>The Airspeed Oxford was powered by two Armstrong Siddeley Cheetah radial engines, each producing around 350 horsepower, driving two-bladed propellers and providing reliable performance for training purposes. It featured a low-wing monoplane design with a mixed construction of wood and metal, balancing durability with ease of production and maintenance. The aircraft was equipped with dual controls to allow instructor and trainee operation, along with systems for navigation, radio communication, and bombing training. Some variants also included a dorsal gun turret for gunnery instruction, making the Oxford a versatile platform for preparing aircrew in multiple operational roles.</p>
                    </template>

                    <template class="templates" id="history-4">
                        <p>The Airspeed Oxford was introduced in 1937 as a twin-engine advanced trainer for the Royal Air Force and became one of the most widely used training aircraft of the Second World War. It was primarily used under the British Commonwealth Air Training Plan to prepare pilots, navigators, and wireless operators for service, playing a crucial role in training thousands of aircrew across Britain, Canada, Australia, and other Allied nations. Derived from the earlier Airspeed Envoy, the Oxford was versatile and reliable, remaining in service throughout the war and continuing in training roles for several years afterward.</p>
                    </template>

                    <div id="ba-images"">
                        <div class="ba-img active" 
                            data-model="model/propeller airplane 3d model.glb"
                            data-id="1"
                            data-title="Spitfire Mk I/II–type fighter">
                            <picture>
                                <source srcset="images/Bob/Spitfire Mk12-type fighter.png" media="(max-width: 767px)">
                                <source srcset="images/Bob/Spitfire Mk12-type fighter.png" media="(max-width: 1199px)">
                                <img src="images/Bob/Spitfire Mk12-type fighter.png" alt="Fighter Plane">
                            </picture>
                        </div>

                        <div class="ba-img" 
                            data-model="model/yellow biplane 3d model.glb"
                            data-id="2"
                            data-title="Fairey Finch Mk II">
                            <picture>
                                <source srcset="images/Bob/Fairey Finch Mk2.png" media="(max-width: 767px)">
                                <source srcset="images/Bob/Fairey Finch Mk2.png" media="(max-width: 1199px)">
                                <img src="images/Bob/Fairey Finch Mk2.png" alt="Fighter Plane">
                            </picture>
                        </div>

                        <div class="ba-img" 
                            data-model="model/yellow propeller airplane 3d model.glb"
                            data-id="3"
                            data-title="Harvard Mk II–type trainer">
                            <picture>
                                <source srcset="images/Bob/Harvard Mk2-type trainer.png" media="(max-width: 767px)">
                                <source srcset="images/Bob/Harvard Mk2-type trainer.png" media="(max-width: 1199px)">
                                <img src="images/Bob/Harvard Mk2-type trainer.png" alt="Fighter Plane">
                            </picture>
                        </div>

                        <div class="ba-img" 
                            data-model="model/yellow twin-engine airplane 3d model.glb"
                            data-id="4"
                            data-title="Airspeed Oxford">
                            <picture>
                                <source srcset="images/Bob/Airspeed Oxford.png" media="(max-width: 767px)">
                                <source srcset="images/Bob/Airspeed Oxford.png" media="(max-width: 1199px)">
                                <img src="images/Bob/Airspeed Oxford.png" alt="Fighter Plane">
                            </picture>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="bob-gallery" class="grid-con">
            <h1 class="hidden">Battle of Britain Gallery</h1>
            <div id="gutter-6" class="col-span-full"></div>
            <div id="bg-main" class="col-span-full">
                <picture>
                    <source srcset="images/Bob/Spitfire Mk12-type fighter.png" media="(max-width: 767px)">
                    <source srcset="images/Bob/Spitfire Mk12-type fighter.png" media="(max-width: 1199px)">
                    <img src="images/Bob/Spitfire Mk12-type fighter.png" alt="Model Image">
                </picture>
            </div>
            <div id="bg-content" class="col-span-full">
                <div class="bg-img">
                    <picture>
                        <source srcset="images/Bob/Spitfire Mk12-type fighter.png" media="(max-width: 767px)">
                        <source srcset="images/Bob/Spitfire Mk12-type fighter.png" media="(max-width: 1199px)">
                        <img src="images/Bob/Spitfire Mk12-type fighter.png" alt="Model Image">
                    </picture>
                </div>
                <div class="bg-img">
                    <picture>
                        <source srcset="images/Bob/Fairey Finch Mk2.png" media="(max-width: 767px)">
                        <source srcset="images/Bob/Fairey Finch Mk2.png" media="(max-width: 1199px)">
                        <img src="images/Bob/Fairey Finch Mk2.png" alt="Model Image">
                    </picture>
                </div>
                <div class="bg-img">
                    <picture>
                        <source srcset="images/Bob/Harvard Mk2-type trainer.png" media="(max-width: 767px)">
                        <source srcset="images/Bob/Harvard Mk2-type trainer.png" media="(max-width: 1199px)">
                        <img src="images/Bob/Harvard Mk2-type trainer.png" alt="Model Image">
                    </picture>
                </div>
                <div class="bg-img">
                    <picture>
                        <source srcset="images/Bob/Airspeed Oxford.png" media="(max-width: 767px)">
                        <source srcset="images/Bob/Airspeed Oxford.png" media="(max-width: 1199px)">
                        <img src="images/Bob/Airspeed Oxford.png" alt="Model Image">
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
<script src="https://cdn.jsdelivr.net/npm/gsap@3.14.1/dist/gsap.min.js"></script>
<script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/3.5.0/model-viewer.min.js"></script>
<script type="module" src="js/main.js"></script>
</html>