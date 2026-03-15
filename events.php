<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/grid.css" rel="stylesheet">
    <title>Events — London Aviation Museum</title>
</head>
<body data-page="events">

    <header id="header-section" class="grid-con">
        <h1 class="hidden">Navbar</h1>
        <div id="menu" class="col-span-full">
            <div id="mobile-header">
                <div id="header-logo">
                    <a href="index.php"><img src="images/logo_horizontal.png" alt="London Aviation Museum Logo"></a>
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
                    <li class="nav-item"><a href="battle-of-britain.php">Battle of Britain</a></li>
                    <li class="nav-item"><a href="wartime.php">Wartime</a></li>
                    <li class="nav-item"><a href="exhibition.php">Exhibition</a></li>
                    <li class="nav-item"><a href="events.php" class="active">Events</a></li>
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
            </nav>
        </div>
    </header>

    <section id="events-hero">
        <h1>Events</h1>
        <p>Lectures, exhibitions, and commemorations at the London Aviation Museum.</p>
    </section>

    <section id="events-section">
        <div class="events-tabs">
            <button class="tab-btn active" data-tab="upcoming">Upcoming</button>
            <button class="tab-btn" data-tab="past">Past Events</button>
            <button class="tab-btn" data-tab="all">All Events</button>
        </div>
        <div class="events-grid" id="events-grid">
            <p style="opacity:0.5;">Loading events...</p>
        </div>
    </section>

    <script src="js/main.js"></script>
    <script>
    (function () {
        const API   = 'includes/events.php';
        let allEvents = [];
        let activeTab = 'upcoming';
        const today   = new Date().toISOString().split('T')[0];

        async function init() {
            const res = await fetch(API);
            allEvents = await res.json();
            render();
        }

        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                activeTab = this.dataset.tab;
                render();
            });
        });

        function render() {
            const grid = document.getElementById('events-grid');
            let events = allEvents;

            if (activeTab === 'upcoming') events = allEvents.filter(e => e.event_date >= today);
            if (activeTab === 'past')     events = allEvents.filter(e => e.event_date < today).reverse();

            if (!events.length) {
                grid.innerHTML = `<div class="no-events"><p>No ${activeTab} events found.</p></div>`;
                return;
            }

            grid.innerHTML = events.map(e => {
                const isPast = e.event_date < today;
                return `
                    <article class="event-card">
                        <div class="event-img">
                            ${e.featured_image_url
                                ? `<img src="${esc(e.featured_image_url)}" alt="${esc(e.title)}" loading="lazy">`
                                : `<div class="event-img-placeholder">✈</div>`}
                        </div>
                        <div class="event-body">
                            <span class="event-badge${isPast ? ' past' : ''}">${isPast ? 'Past' : 'Upcoming'}</span>
                            <div class="event-meta">
                                <span>📅 ${formatDate(e.event_date)}${e.event_time ? ' · ' + formatTime(e.event_time) : ''}</span>
                                ${e.location ? `<span>📍 ${esc(e.location)}</span>` : ''}
                            </div>
                            <h2 class="event-title">${esc(e.title)}</h2>
                            <p class="event-desc">${esc(e.description)}</p>
                        </div>
                    </article>`;
            }).join('');
        }

        function formatDate(d) {
            const [y, m, day] = d.split('-');
            const months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
            return `${months[+m - 1]} ${+day}, ${y}`;
        }

        function formatTime(t) {
            const [h, m] = t.split(':');
            const ampm = +h >= 12 ? 'PM' : 'AM';
            const hour = +h % 12 || 12;
            return `${hour}:${m} ${ampm}`;
        }

        function esc(s) {
            return String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
        }

        init();
    })();
    </script>
</body>
</html>