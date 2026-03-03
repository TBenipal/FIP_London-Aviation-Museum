<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <link rel="icon" type="image/x-icon" href=""> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>London Aviation Museum</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/grid.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css">
</head>
<body data-page="wartime">
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
                    <li class="nav-item"><a href="index.php">Home</a></li>
                    <li class="nav-item"><a href="battle-of-britain.php">Battle of Britian</a></li>
                    <li class="nav-item"><a href="wartime.php" class="active">Wartime</a></li>
                    <li class="nav-item"><a href="exhibition.php">Exhibition</a></li>
                    <li class="nav-item"><a href="contact.php">Contact!</a></li>
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
                            <a class="icon-link" href="includes/admin/login.php">
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
        <section id="wartime-hero" class="grid-con">
            <h1 class="hidden">Wartime Introduction</h1>
            <div id="wartime-main" class="l-col-start-1 l-col-end-13"></div>
            
            <div id="wh-container" class="col-span-full l-col-start-1 l-col-end-13">
                <div id="whi-1" class="wh-sub-container">
                    <div class="hero-sub-img"></div>
                    <span class="hero-sub-heading">Events</span>
                </div>

                <div id="whi-2" class="wh-sub-container">
                    <div class="hero-sub-img"></div>
                    <span class="hero-sub-heading">Guide Tour</span>
                </div>

                <div id="whi-3" class="wh-sub-container">
                    <div class="hero-sub-img"></div>
                    <span class="hero-sub-heading">Gallery</span>
                </div>
            </div>
        </section>

        <section id="timeline-section" class="grid-con">
            <h1 id="ts-header" class="sub-headings l-col-start-1 l-col-end-4">Timeline <br> of Aviation <br> History</h1>
            <p id="ts-text" class="l-col-start-5 l-col-end-13">This timeline traces the evolution of aviation in London from early experimentation to post-war development. Visitors are encouraged to consider how technological progress, public interest, and global conflict shaped aviation's role in the city — from the first public flight demonstrations to the massive Commonwealth training effort of the Second World War.</p>

                <div id="ts1-container" class="ts-container">
                        <div class="ts-img"></div>
                        <h2 class="ts-year">1900–1918</h2>
                        <p class="ts-text">Early Flight: International pioneers brought powered flight to Canada. Beckwith Havens demonstrated flight in London in 1911, sparking public fascination with the new age of aviation.</p>
                    </div>

                    <div id="ts2-container" class="ts-container">
                        <div class="ts-img"></div>
                        <h2 class="ts-year">1919–1939</h2>
                        <p class="ts-text">Growth of Aviation: Post-war enthusiasm led to the establishment of Lambeth Airfield in 1928 and the founding of the London Flying Club, cementing London's place in Canadian aviation culture.</p>
                    </div>

                    <div id="ts3-container" class="ts-container">
                        <div class="ts-img"></div>
                        <h2 class="ts-year">1940–1945</h2>
                        <p class="ts-text">WWII & the BCATP: Crumlin Airport became a major training hub. No. 3 Elementary Flying Training School and No. 4 Air Observer School trained thousands of aircrew from across the Commonwealth.</p>
                    </div>

                    <div id="ts4-container" class="ts-container">
                        <div class="ts-img"></div>
                        <h2 class="ts-year">1945–1956</h2>
                        <p class="ts-text">Post-War Aviation: London's military presence continued with 420 Squadron operating from 1948 to 1956. The wartime infrastructure evolved into what is now London International Airport.</p>
                    </div>

            </div>
        </section>

        <section id="detail-timeline" class="grid-con">
            <h1 class="hidden">Detailed Timeline</h1>
            <div id="dt-main-img" class="l-col-start-1 l-col-end-8"></div>
            <div id="dt-sub-img" class="l-col-start-8 l-col-end-13"></div>
            <div id="dt-container" class="l-col-start-1 l-col-end-13">
                <div class="dt-img"></div>
                <div class="dt-img"></div>
                <div class="dt-img"></div>
            </div>

            <div id="dt1-profile" class="dt-profile"> 
                <div class="dt-container">
                    <div class="dt-profile-img"></div>
                    <h2 class="dt-profile-heading">Early Flight — 1900–1918</h2>
                    <p class="dt-profile-text">The Silver Dart's first powered flight in Canada in 1909 inspired a generation. By 1911, Beckwith Havens was performing demonstrations over London, Ontario. Public exhibitions by Brookins and Labatt in 1912 captured imaginations across the city, laying the groundwork for local aviation interest.</p>
                </div>
            </div>

            <div id="dt2-profile" class="dt-profile"> 
                <div class="dt-container">
                    <div class="dt-profile-img"></div>
                    <h2 class="dt-profile-heading">Growth of Aviation — 1919–1939</h2>
                    <p class="dt-profile-text">Following World War I, civilian aviation flourished. The Lambeth Airport site was selected in 1926, officially opening on August 24, 1928. The London Flying Club was established that same year with a DeHavilland Cirrus Moth. By 1929, London saw its first regular airmail flight.</p>
                </div>
            </div>

            <div id="dt3-profile" class="dt-profile"> 
                <div class="dt-container">
                    <div class="dt-profile-img"></div>
                    <h2 class="dt-profile-heading">WWII & the BCATP — 1940–1945</h2>
                    <p class="dt-profile-text">On January 19, 1940, the first flight into Crumlin Airport took place. No. 3 Elementary Flying Training School opened June 24, 1940, followed by No. 4 Air Observer School on December 17, 1940. Together, they trained pilots and navigators from Canada, Britain, New Zealand, and beyond.</p>
                </div>
            </div>

            <div id="dt4-profile" class="dt-profile"> 
                <div class="dt-container">
                    <div class="dt-profile-img"></div>
                    <h2 class="dt-profile-heading">Post-War Aviation — 1945–1956</h2>
                    <p class="dt-profile-text">After the war, London maintained its military aviation legacy. The 420 Squadron auxiliary operated from 1948 to 1956, ensuring continued readiness and training. The wartime canteen building — now home to 427 Wing's museum — stands as the last surviving BCATP structure on the airport grounds.</p>
                </div>
            </div>

                    <svg id="timeline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1019 2906" fill="none">
                        <path id="timeline-path" d="M353.495 5.97217C611.661 30.9722 1102.99 124.272 1002.99 297.472C877.995 513.972 125.494 575.472 139.494 947.472C153.494 1319.47 1141.49 1801.97 927.994 2085.47C714.494 2368.97 255.994 2212.97 39.494 2551.97C-177.006 2890.97 722.994 2740.97 825.494 2901.97" stroke="#A28C63" stroke-width="12" fill="none"/>
                        <g id="plane" transform="translate(0 0) scale(0.20)" fill="#A08B63">
                            <path id="plane-path" d="M510.338,141.484c-2.918-7.697-9.353-13.517-17.289-15.65c-8.201-2.202-81.596-20.617-133.564,9.412
                            c-12.698,7.339-36.19,23.066-71.663,47.974L80.701,127.669c-6.554-1.758-13.534-0.836-19.405,2.56l-22.144,12.8
                            c-8.047,4.651-12.945,13.312-12.783,22.622c0.162,9.301,5.359,17.792,13.568,22.161l138.257,73.574
                            c-23.356,16.41-46.106,32.068-59.904,41.515l-62.037-36.523c-7.936-4.676-17.775-4.71-25.754-0.102l-17.715,10.24
                            c-7.262,4.198-12.006,11.699-12.698,20.062c-0.691,8.371,2.765,16.538,9.242,21.879l84.369,69.478
                            c4.983,4.104,11.332,6.17,17.775,5.786l57.079-3.43c3.959-0.239,7.817-1.399,11.255-3.379l243.61-140.8
                            c48.956-28.297,82.935-79.275,84.352-81.434C512.3,157.809,513.256,149.181,510.338,141.484z"/>
                        </g>
                    </svg>
                </div>
            </div>
        </section>
    

        <section id="newsletter" class="grid-con">
            <h1 id="nl-header" class="sub-headings col-span-full l-col-start-1 l-col-end-13">Newsletter!</h1>

            <div id="nl-content" class="col-span-full l-col-start-1 l-col-end-13">
                <p id="nl-text">Stay connected with the London Aviation Museum. Subscribe to receive updates on upcoming exhibitions, events, and the latest stories from London's rich aviation history. Be the first to hear about our permanent exhibition opening in the fall of 2026.</p>
                
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
<script src="https://cdn.jsdelivr.net/npm/gsap@3.14.1/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.14.1/dist/MotionPathPlugin.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.14.1/dist/DrawSVGPlugin.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.14.1/dist/ScrollTrigger.min.js"></script>
<script src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>
<script type="module" src="js/main.js"></script>
</html>