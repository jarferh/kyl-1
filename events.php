<?php
require_once(__DIR__ . '/config/database.php');

// Fetch upcoming events (today and future) ordered by date
$stmt = $pdo->prepare("SELECT * FROM events WHERE event_date >= CURDATE() AND status = 'active' ORDER BY event_date ASC");
$stmt->execute();
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/x-icon" href="img/logo.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="Browse upcoming events and programs at Katagum Youth League. Join our community activities and development initiatives.">
    <title>Upcoming Events - Katagum Youth League (KYL)</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="js/main.js" defer></script>
</head>
<body>
    <header id="header">
        <div class="container header-container">
            <div class="logo">
                <img src="img/logo.png" alt="Katagum Youth League Logo">
            </div>
            <button class="mobile-menu-btn" id="mobileMenuBtn" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <nav id="mainNav">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="events.php" class="active">Events</a></li>
                    <li><a href="#achievements">Programs</a></li>
                    <li><a href="gallery.html">Gallery</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
        </div>

    </header>

    <!-- overlay for mobile nav -->
    <div id="navOverlay" class="nav-overlay" aria-hidden="true"></div>

    <style>
    /* Small mobile overlay to match fellowship pattern */
    @media (max-width: 768px) {
        .nav-overlay { position: fixed; inset: 0; background: rgba(0,0,0,0.5); opacity: 0; visibility: hidden; transition: opacity .2s ease; z-index: 998; }
        .nav-overlay.show { opacity: 1; visibility: visible; }
    }
    </style>

    <section class="events-hero" style="background:linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)),url('img/kyl.jpg') center/cover;min-height:40vh;display:flex;align-items:center;justify-content:center;margin-top:70px;text-align:center;">
        <div class="container">
            <h1 style="font-size:clamp(2.5rem,5vw,4rem);margin-bottom:1rem;color:#fff;-webkit-text-fill-color:white;">Upcoming Events</h1>
            <p style="font-size:1.2rem;color:rgba(255,255,255,0.9);max-width:800px;margin:0 auto;">Join us at our upcoming programs and community activities. Be part of the change in Katagum.</p>
        </div>
    </section>

    <main class="container events-page" style="padding:60px 20px;">
        <div class="events-grid" style="margin-top:20px;">
            <?php
            // If DB returned no events, show demo static events
            if (empty($events)) {
                $demo = [
                    ['id' => 'demo-1', 'title' => 'Katagum Colloquium 3.0', 'event_date' => '2025-11-10', 'location' => 'Main Hall, Katagum', 'description' => 'Annual youth forum bringing together young leaders, policymakers, and experts to discuss opportunities and challenges facing youth.'],
                    ['id' => 'demo-2', 'title' => 'Mallam Zaki Fellowship Launch', 'event_date' => '2025-09-25', 'location' => 'Conference Center', 'description' => 'Launch of the next Mallam Zaki Fellowship cohort with workshops and networking sessions.'],
                    ['id' => 'demo-3', 'title' => 'Youth Climate Action Day', 'event_date' => '2025-10-05', 'location' => 'City Park', 'description' => 'Community clean-up and tree-planting to raise environmental awareness among youth.'],
                ];
                foreach ($demo as $ev):
            ?>
                <article class="event-card demo">
                    <div class="event-card-body">
                        <div class="event-date"><?php echo date('M j, Y', strtotime($ev['event_date'])); ?></div>
                        <h3><?php echo htmlspecialchars($ev['title']); ?></h3>
                        <p class="muted"><?php echo htmlspecialchars($ev['location']); ?></p>
                        <p><?php echo nl2br(htmlspecialchars($ev['description'])); ?></p>
                        <a class="btn" href="event.php?id=<?php echo urlencode($ev['id']); ?>">View Details</a>
                    </div>
                </article>
            <?php
                endforeach;
            } else {
                foreach ($events as $ev):
            ?>
                <article class="event-card">
                    <div class="event-card-body">
                        <div class="event-date"><?php echo date('M j, Y', strtotime($ev['event_date'])); ?></div>
                        <h3><?php echo htmlspecialchars($ev['title']); ?></h3>
                        <p class="muted"><?php echo htmlspecialchars($ev['location']); ?></p>
                        <p><?php echo nl2br(htmlspecialchars(substr($ev['description'], 0, 240))); ?><?php echo strlen($ev['description'])>240? '...':''; ?></p>
                        <a class="btn" href="event.php?id=<?php echo $ev['id']; ?>">View Details</a>
                    </div>
                </article>
            <?php
                endforeach;
            }
            ?>
        </div>
    </main>

     <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-logo">
                <img src="img/logo.png" alt="Katagum Youth League Logo">
            </div>
            <div class="footer-links">
                <a href="../index.php">Home</a>
                <a href="../events.php">About</a>
                <a href="../index.php#aims">Aims</a>
                <a href="../index.php#achievements">Programs</a>
                <a href="../index.php#timeline">Events</a>
                <a href="../index.php#team">Team</a>
                <a href="../index.php#contact">Contact</a>
                <a href="../gallery.html">Gallery</a>
            </div>
            <p class="copyright">© 2024 Katagum Youth League. All Rights Reserved.</p>
        </div>
    </footer>
    
    <script>
        // Mobile Menu Toggle (copied from programs/fellowship.php)
        (function(){
            var btn = document.getElementById('mobileMenuBtn');
            var nav = document.getElementById('mainNav');
            var overlay = document.getElementById('navOverlay');

            function openNav(){
                if (!nav || !overlay || !btn) return;
                nav.classList.add('active');
                overlay.classList.add('show');
                document.body.style.overflow = 'hidden';
                btn.setAttribute('aria-expanded','true');
                btn.innerHTML = '<i class="fas fa-times"></i>';
                overlay.setAttribute('aria-hidden','false');
            }
            function closeNav(){
                if (!nav || !overlay || !btn) return;
                nav.classList.remove('active');
                overlay.classList.remove('show');
                document.body.style.overflow = '';
                btn.setAttribute('aria-expanded','false');
                btn.innerHTML = '<i class="fas fa-bars"></i>';
                overlay.setAttribute('aria-hidden','true');
            }

            if (btn && nav) btn.addEventListener('click', function(){ if (nav.classList.contains('active')) closeNav(); else openNav(); });
            if (overlay) overlay.addEventListener('click', closeNav);
            document.addEventListener('keydown', function(e){ if (e.key === 'Escape' && nav && nav.classList.contains('active')) closeNav(); });
        })();

        // Scroll Header Effect
        const header = document.getElementById('header');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // Intersection Observer for animations (small enhancement)
        const observerOptions = { root: null, rootMargin: '0px', threshold: 0.1 };
        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in-view');
                    obs.unobserve(entry.target);
                }
            });
        }, observerOptions);
        document.querySelectorAll('.animate-on-scroll, .program-section, .feature-card, .area-card, .event-card, .glass-card').forEach(el => observer.observe(el));
    </script>
</body>
</html>
