<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us!</title>
    <link href="css/main.css" rel="stylesheet">
    <link href="css/grid.css" rel="stylesheet">
</head>
<body data-page="contact">
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
                    <li class="nav-item"><a href="wartime.php">Wartime</a></li>
                    <li class="nav-item"><a href="exhibition.php">Exhibition</a></li>
                    <li class="nav-item"><a href="contact.php" class="active">Contact!</a></li>
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

        <!--Contact-->
        <section id="contact-section" class="grid-con">
            <h2 class="contact-header col-span-full l-col-start-1 l-col-end-13">Reach Out!</h2>
            <p id="contact-text" class="col-span-full l-col-start-1 l-col-end-13">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deserunt labore perferendis quasi recusandae natus laboriosam est ipsa totam incidunt quia iure a maxime itaque quod, pariatur, ipsam ab error cum?</p>
            
            <?php
                if (isset($_GET['msg'])) {
                    echo '
                    <div id="thanks-container">
                        <div id="thanks">
                            <h3>Thank you for<br>contacting</h3>
                            <a id="explore-btn" href="index.php#project-1">Explore!</a>
                            <p>' . htmlspecialchars($_GET['msg'], ENT_QUOTES, 'UTF-8') . '</p>
                        </div>
                    </div>'; 
                } ?>

<<<<<<< Updated upstream:contact.php
            <!--Form-->
           <form id="contact-form" class="col-span-full" method="post" action="includes/send.php">
=======
            <?php if (isset($_GET['msg'])): ?>
                <div id="thanks-container">
                    <div id="thanks">
                        <h3>Thank you for<br>contacting</h3>
                        <a id="explore-btn" href="index.php">Explore!</a>
                        <p><?php echo htmlspecialchars($_GET['msg'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                </div>
            <?php endif; ?>

>>>>>>> Stashed changes:contact.php
<<<<<<< Updated upstream:contact.html
            
=======

            <?php if (isset($_GET['msg'])): ?>
                <div id="thanks-container">
                    <div id="thanks">
                        <h3>Thank you for<br>contacting</h3>
                        <a id="explore-btn" href="index.php">Explore!</a>
                        <p><?php echo htmlspecialchars($_GET['msg'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                </div>
            <?php endif; ?>

>>>>>>> Stashed changes:contact.php
<<<<<<< Updated upstream:contact.html
            
=======

            <?php if (isset($_GET['msg'])): ?>
                <div id="thanks-container">
                    <div id="thanks">
                        <h3>Thank you for<br>contacting</h3>
                        <a id="explore-btn" href="index.php">Explore!</a>
                        <p><?php echo htmlspecialchars($_GET['msg'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                </div>
            <?php endif; ?>

>>>>>>> Stashed changes:contact.php
            <!--Form-->
            <form id="contact-form" class="col-span-full" method="POST" >
            <form id="contact-form" class="col-span-full" method="POST" >
<<<<<<< Updated upstream:contact.php
>>>>>>> Stashed changes:contact.html
=======
>>>>>>> Stashed changes:contact.html
                <div id="form">
                    <input type="text" placeholder="Name *" class="field" name="first_name" id="first_name" required aria-label="First Name">
                    <br>
                    <input type="text" placeholder="Last Name *" class="field" name="last_name" id="last_name" required aria-label="Last Name">
                    <br>
                    <input type="email" placeholder="Email *" class="field" name="email" id="email" required aria-label="Email Address">
                    <br>
                </div>
                <textarea id="message" placeholder="Message *" class="field" name="message" required aria-label="Your Message"></textarea>
            </form>
<<<<<<< Updated upstream:contact.php

            <button id="submit-btn" form="contact-form" type="submit" class="col-start-2 col-end-4 m-col-start-7 m-col-end-9 l-col-start-11 l-col-end-13" aria-label="Submit contact form">Submit !</button>
=======
             <div id="contact-feedback"></div>   
            <button id="submit-btn" form="contact-form" type="submit" class="col-start-2 col-end-4 m-col-start-7 m-col-end-9 l-col-start-11 l-col-end-13" aria-label="Submit contact form">Submit!</button>
             <div id="contact-feedback"></div>   
            <button id="submit-btn" form="contact-form" type="submit" class="col-start-2 col-end-4 m-col-start-7 m-col-end-9 l-col-start-11 l-col-end-13" aria-label="Submit contact form">Submit!</button>
             <div id="contact-feedback"></div>   
            <button id="submit-btn" form="contact-form" type="submit" class="col-start-2 col-end-4 m-col-start-7 m-col-end-9 l-col-start-11 l-col-end-13" aria-label="Submit contact form">Submit!</button>

<<<<<<< Updated upstream:contact.html
<<<<<<< Updated upstream:contact.html
            <button id="submit-btn" form="contact-form" type="submit" class="col-start-2 col-end-4 l-col-start-11 l-col-end-13" aria-label="Submit contact form">Submit !</button>
=======
>>>>>>> Stashed changes:contact.php
=======
>>>>>>> Stashed changes:contact.php
<<<<<<< Updated upstream:contact.php
>>>>>>> Stashed changes:contact.html
=======
>>>>>>> Stashed changes:contact.html
        </section>

        <section id="newsletter" class="grid-con">
            <h1 id="nl-header" class="sub-headings col-span-full l-col-start-1 l-col-end-13">Newsletter!</h1>

            <div id="nl-content" class="col-span-full l-col-start-1 l-col-end-13">
                <p id="nl-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolores explicabo, cum rem error sunt velit, dolorum et architecto quaerat hic quae! Laborum tenetur provident perferendis nemo, dolor enim maiores unde. Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque eum saepe molestias obcaecati sit? Placeat sed ipsam quis voluptate nisi eius vero nostrum dolore ipsa possimus suscipit repudiandae, accusantium neque.</p>
                
                <form id="nl-form-con" class="col-span-full">
                    <div id="nl-form">
<<<<<<< Updated upstream:contact.php
                        <input type="text" placeholder="Name *" class="nl-field" name="first_name" id="first_name" required>
                        <br>
                        <input type="email" placeholder="Email *" class="nl-field" name="email" id="email" required>
                        <br>
                    </div>
                    <button id="nl-subscribe">Subscribe</button>
=======
                        <input type="text" placeholder="Name *" class="nl-field" name="nl_name" id="nl_name" required>
                        <input type="text" placeholder="Name *" class="nl-field" name="nl_name" id="nl_name" required>
                        <input type="text" placeholder="Name *" class="nl-field" name="nl_name" id="nl_name" required>
                        <br>
                        <input type="email" placeholder="Email *" class="nl-field" name="nl_email" id="nl_email" required>
                        <input type="email" placeholder="Email *" class="nl-field" name="nl_email" id="nl_email" required>
                        <br>
                    </div>
                    <div id="nl-feedback"></div>
                    <button id="nl-subscribe" type="submit">Subscribe</button>
                    <div id="nl-feedback"></div>
                    <button id="nl-subscribe" type="submit">Subscribe</button>
<<<<<<< Updated upstream:contact.php
>>>>>>> Stashed changes:contact.html
=======
>>>>>>> Stashed changes:contact.html
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
<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js"></script>
<script type="module" src="js/main.js"></script>
</html>