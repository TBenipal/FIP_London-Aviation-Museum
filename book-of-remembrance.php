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
<body data-page="bor">
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
                    <li class="nav-item dropdown">
                        <div class="select active">
                            <span class="selected active">Battle of Britain</span>
                            <div class="caret"></div>
                        </div>

                        <ul class="menu">
                            <li class="active"><a href="battle-of-britain.php">Battle of Britain</a></li>
                            <li><a href="book-of-remembrance.php">Book of Remembrance</a></li>
                        </ul>
                    </li>
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
        <section id="bor-hero" class="grid-con">
            <h1 id="mobile-bor-heading" class="sub-headings col-span-full">Book of Remembrance</h1>
            <div id="bor-content" class="col-span-full">
                <div id="bor-text-container">
                    <h2 id="bor-heading" class="sub-headings col-span-full">Book of Remembrance</h2>
                    <p class="bor-text col-span-full">During the Second World War, aviation training was an essential but dangerous part of the Allied war effort. In London, Ontario, British Commonwealth Air Training Plan (BCATP) schools operated at a rapid pace, preparing aircrew for service overseas. Although these men and women were not always engaged in active combat, the risks they faced were very real. Aircraft accidents, mechanical failures, and demanding flight conditions resulted in the loss of many trainees and instructors. The Book of Remembrance serves as a lasting tribute to those who lost their lives during aviation training in and around London. It records the names of aircrew members, instructors, and support personnel who made the ultimate sacrifice while preparing to defend freedom. Each name represents an individual story of service, courage, and commitment. This memorial reminds visitors that victory in the air depended not only on those who flew in combat but also on those who trained, taught, and supported them. The Book of Remembrance ensures that their contributions are not forgotten and that their sacrifices are acknowledged with dignity and respect.</p>
                </div>
                <div id="bor-books" class="col-span-full">
                    <div id="bor-book-4" class="bor-book">
                        <a href="#book-1-section"><img src="images/Bor/book1_cover.png" alt="In Memory of BCATP Trainees & Instructors Book Cover"></a>
                    </div>
                    <div id="book-container">
                        <div id="bor-book-1" class="bor-book">
                            <a href="#book-1-section"><img src="images/Bor/book1_cover.png" alt="In Memory of BCATP Trainees & Instructors Book Cover"></a>
                        </div>
                        <div id="bor-book-2" class="bor-book">
                            <a href="#book-2-section"><img src="images/Bor/book2_cover.png" alt="In Memory of BCATP Trainees & Instructors Book Cover"></a>
                        </div>
                        <div id="bor-book-3" class="bor-book">
                            <a href="#book-3-section"><img src="images/Bor/book3_cover.png" alt="In Memory of BCATP Trainees & Instructors Book Cover"></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="books-section" class="grid-con">
            <h1 class="hidden">Books</h1>

            <div id="books" class="col-span-full">

                <div id="book-1-section" class="book-section" >
                    <div id="book-1-cover" class="book-cover">
                        <img src="images/Bor/book1_cover.png" alt="In Memory of BCATP Trainees & Instructors Book Cover">
                    </div>
                    <div id="book-1-container" class="book-text-container">
                        <p class="book-sub-heading">Section One · Those Lost in Training</p>
                        <h2 class="book-heading">In Memory of BCATP Trainees & Instructors</h2>
                        <p class="book-text">The Book of Remembrance records the names of aircrew members, instructors, and support personnel who made the ultimate sacrifice while preparing to defend freedom at London's BCATP schools. Each entry includes the individual's name, rank, squadron, date of loss, service number, and — where available — a portrait photograph and account of the circumstances of their loss.</p>
                        <ul class="book-points">
                            <li class="book-list">Individual profile pages with portraits and service histories</li>
                            <li class="book-list">Service information and circumstances of each loss recorded </li>
                            <li class="book-list">Links to additional historical records from Western University</li>
                            <li class="book-list">Archives and RCAF official records</li>
                            <li class="book-list">Honouring both Canadian trainees and international</li>
                            <li class="book-list">Commonwealth aircrew who trained at Crumlin Airport</li>
                        </ul>
                    </div>
                </div>

                <section id="bor-viewer" class="hidden col-span-full">
                        <h2 class="sub-headings">Pilot Records</h2>
                        <input 
                            type="text" 
                            id="pilot-search-input" 
                            placeholder="Search by last name..."
                            style="margin:20px 0; padding:10px; width:100%; max-width:400px;"
                        />
                        <div id="pilot-grid"></div>
                    </section>

                <div id="book-2-section" class="book-section">
                    <div id="book-2-cover" class="book-cover">
                        <img src="images/Bor/book2_cover.png" alt="In Memory of BCATP Trainees & Instructors Book Cover">
                    </div>
                    <div id="book-2-container" class="book-text-container">
                        <p class="book-sub-heading">Section Two · Londoners & the Battle of Britain</p>
                        <h2 class="book-heading">How London Helped Turn the Tide in History</h2>
                        <p class="book-text">The Battle of Britain (July–October 1940) was a key WWII turning point and the first major air campaign. London, Ontario supported the effort through aircrew training, with locals serving as pilots, navigators, and ground crew. The skills developed in Canadian training schools supported the Royal Air Force during a critical time, highlighting how London’s aviation history connects to broader global events.</p>
                        <ul class="book-points">
                            <li class="book-list">Individual biographies and service records of Londoners who served</li>
                            <li class="book-list">Aircraft they flew — Hawker Hurricanes and Supermarine Spitfires</li>
                            <li class="book-list">Combat records and decorations received</li>
                        </ul>
                    </div>
                </div>

                <div id="book-3-section" class="book-section">
                    <div id="book-3-cover" class="book-cover">
                        <img src="images/Bor/book3_cover.png" alt="In Memory of BCATP Trainees & Instructors Book Cover">
                    </div>
                    <div id="book-3-container" class="book-text-container">
                        <p class="book-sub-heading">Section Three · About This Project</p>
                        <h2 class="book-heading">Sources & Acknowledgements</h2>
                        <p class="book-text">The Book of Remembrance is a product of the museum's Student Capstone / Final Integrated Project (FIP), developed in partnership with 427 Wing RCAF Association. The database draws on archival research, historical records, and community contributions to build a comprehensive and enduring memorial to those who served.</p>
                        <ul class="book-points">
                            <li class="book-list">Western University Archives — primary photographic and documentary source </li>
                            <li class="book-list">Ron Nelson Collection (A18-016-027) — key historical images and records</li>
                            <li class="book-list">RCAF Official Records — service histories, ranks, and squadron assignments </li>
                            <li class="book-list">Local historical societies and national archives</li>
                            <li class="book-list">Special thanks to museum curators, historians, veterans' families, and community supporters whose contributions made this memorial possible</li>
                        </ul>
                    </div>
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