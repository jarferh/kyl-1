<?php
header("Content-Security-Policy: default-src 'self'; script-src 'self' https://cdnjs.cloudflare.com; style-src 'self' https://fonts.googleapis.com 'unsafe-inline' https://cdnjs.cloudflare.com; font-src 'self' https://fonts.gstatic.com; img-src 'self' https://images.unsplash.com data:; connect-src 'self' https://script.google.com; frame-src 'none'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image/x-icon" href="img/logo.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katagum Youth League | Empowering Youths for National Development</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="js/timer.js" defer></script>
    <script src="js/main.js" defer></script>
</head>

<body>
    <!-- Header -->
    <header id="header">
        <div class="container header-container">
            <div class="logo">
                <img src="img/logo.png" alt="Katagum Youth League Logo">
            </div>
            <button class="mobile-menu-btn" id="mobileMenuBtn">
                <i class="fas fa-bars"></i>
            </button>
            <nav id="mainNav">
                <ul>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#aims">Aims & Objectives</a></li>
                    <li><a href="#achievements">Programs</a></li>
                    <li><a href="#timeline">Events</a></li>
                    <li><a href="#team">Our Team</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="gallery.html">Gallery</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container">
            <div class="hero-content">
                <h1>Katagum Youth League</h1>
                <p>Empowering Youths for National Development</p>
                <div class="hero-btns">
                    <a href="#get-involved" class="btn">Join the Movement</a>
                    <a href="gallery.html" class="btn btn-outline">View Our Work</a>
                </div>
                <div class="countdown-card" id="countdown-card" style="display: none;">
                    <h3 id="countdown-title"></h3>
                    <div class="countdown">
                        <div class="time-block">
                            <span id="days">00</span>
                            <span class="label">Days</span>
                        </div>
                        <div class="time-block">
                            <span id="hours">00</span>
                            <span class="label">Hours</span>
                        </div>
                        <div class="time-block">
                            <span id="minutes">00</span>
                            <span class="label">Minutes</span>
                        </div>
                        <div class="time-block">
                            <span id="seconds">00</span>
                            <span class="label">Seconds</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about" id="about">
        <div class="container">
            <h2 class="fade-in">About Us</h2>
            <div class="about-content fade-in" style="animation-delay: 0.2s;">
                <div class="about-text">
                    <p>The Katagum Youth League (KYL) is a non-profit organization dedicated to empowering young people
                        in Katagum, Bauchi State, Nigeria through leadership development, education support, climate
                        action, and anti-trafficking advocacy.</p>
                    <p>Founded in 2022 by Comrade Jamilu Alhaji Mato, KYL works to uplift youth across Katagum by
                        providing opportunities for personal growth, community engagement, and social impact.</p>
                    <div class="founder-quote">
                        <p>"Our youth are not just the leaders of tomorrow, but the change-makers of today. At KYL, we
                            believe in harnessing their potential to build a better Katagum for all."</p>
                        <p class="author">- Comrade Jamilu Alhaji Mato, Founder & CEO</p>
                    </div>
                </div>
                <div class="about-image">
                    <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1469&q=80"
                        alt="KYL Youth Group Photo">
                </div>
            </div>
        </div>
    </section>

    <!-- Aims & Objectives Section -->
    <section class="aims" id="aims">
        <div class="container">
            <h2 class="fade-in">Aims & Objectives</h2>
            <div class="aims-container fade-in" style="animation-delay: 0.2s;">
                <div class="aims-toggle">
                    <button class="active" data-lang="english">English</button>
                    <button data-lang="hausa">Hausa</button>
                </div>
                <div class="aims-content active" id="english-aims">
                    <ul class="aims-list">
                        <li>Promote youth leadership and community development initiatives</li>
                        <li>Encourage education and peace-building among young people</li>
                        <li>Organize civic engagement programs and leadership fellowships</li>
                        <li>Support sustainable agriculture and environmental awareness</li>
                        <li>Collaborate with NGOs and local authorities on youth development</li>
                        <li>Combat human trafficking through awareness campaigns</li>
                        <li>Provide mentorship and career guidance for youth</li>
                        <li>Foster intergenerational dialogue and knowledge transfer</li>
                        <!-- Additions for better clarity and engagement -->
                        <li>Empower girls and young women through targeted initiatives</li>
                        <li>Promote digital literacy and technology skills among youth</li>
                        <li>Encourage youth entrepreneurship and innovation</li>
                        <li>Facilitate access to mental health resources and support</li>
                    </ul>
                </div>
                <div class="aims-content" id="hausa-aims">
                    <ul class="aims-list">
                        <li>Inganta shugabanci matasa da ci gaban al'umma</li>
                        <li>Karfafa ilimi da zaman lafiya tsakanin matasa</li>
                        <li>Shirya shirye-shiryen shiga cikin al'umma da kuma gudanar da shugabanni</li>
                        <li>Taimaka wa noma mai dorewa da wayar da kan muhalli</li>
                        <li>Haɗin kai tare da ƙungiyoyi da hukumomin gida don ci gaban matasa</li>
                        <li>Yaƙi da fataucin mutane ta hanyar yaƙin neman wayar da kan jama'a</li>
                        <li>Ba da jagoranci da jagorancin aiki ga matasa</li>
                        <li>Haɓaka tattaunawa tsakanin tsararraki da canja wurin ilimi</li>
                        <!-- Hausa translations for new aims -->
                        <li>Karfafa mata da 'yan mata ta hanyar shirye-shiryen na musamman</li>
                        <li>Inganta ilimin zamani da fasaha tsakanin matasa</li>
                        <li>Karfafa kasuwanci da kirkire-kirkire a tsakanin matasa</li>
                        <li>Samar da hanyoyin tallafi da wayar da kai kan lafiyar kwakwalwa</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Achievements & Programs Section -->
    <section class="achievements" id="achievements">
        <div class="container">
            <h2 class="fade-in">Our Impact</h2>
            <div class="achievements-grid fade-in" style="animation-delay: 0.2s;">
                <div class="achievement-card">
                    <div class="achievement-icon">🎓</div>
                    <div class="achievement-number">30</div>
                    <p>Fellows graduated from our Fellowship Program</p>
                </div>
                <div class="achievement-card">
                    <div class="achievement-icon">🌱</div>
                    <div class="achievement-number">100+</div>
                    <p>Trees planted in our climate action initiative</p>
                </div>
                <div class="achievement-card">
                    <div class="achievement-icon">📚</div>
                    <div class="achievement-number">500+</div>
                    <p>Youths engaged in our educational programs</p>
                </div>
                <div class="achievement-card">
                    <div class="achievement-icon">🧠</div>
                    <div class="achievement-number">7+</div>
                    <p>Programs Held So far</p>
                </div>
            </div>

                        <div class="programs fade-in" style="animation-delay: 0.4s;">
                <h3>Our Core Programs</h3>
                <div class="programs-grid">
                    <div class="program-card">
                        <div class="program-image">
                            <img src="fellowship/1.jpeg" alt="Mallam Zaki Fellowship">
                        </div>
                        <div class="program-content">
                            <h3>Mallam Zaki Fellowship</h3>
                            <p>Our flagship leadership development program for emerging young leaders.</p>
                            <a href="programs/fellowship.php" class="btn">Learn More</a>
                        </div>
                    </div>
                    <div class="program-card">
                        <div class="program-image">
                            <img src="Agricultural/1.jpeg" alt="Modern Agriculture">
                        </div>
                        <div class="program-content">
                            <h3>Modern Agriculture</h3>
                            <p>Transforming agriculture through innovation and sustainable practices.</p>
                            <a href="programs/agriculture.php" class="btn">Learn More</a>
                        </div>
                    </div>
                    <div class="program-card">
                        <div class="program-image">
                            <img src="img/school.jpg" alt="Youth Development">
                        </div>
                        <div class="program-content">
                            <h3>Youth Development</h3>
                            <p>Comprehensive programs for personal and professional growth.</p>
                            <a href="programs/youth.php" class="btn">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Upcoming Programs Section -->
    <section class="timeline-section" id="timeline">
        <div class="container">
            <h2 class="fade-in">Upcoming Programs</h2>
            <div class="timeline fade-in" style="animation-delay: 0.2s;">
                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="timeline-date">2025</div>
                        <h3>Katagum Colloquium 3.0</h3>
                        <p>Annual youth forum bringing together young leaders, policymakers, and experts to discuss
                            pressing issues affecting Katagum youth.</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="timeline-date">2025</div>
                        <h3>Mallam Zaki Fellowship</h3>
                        <p>Next cohort of our flagship leadership development program for emerging young leaders.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Past Events Section -->
    <section class="timeline-section">
        <div class="container">
            <h2 class="fade-in">Past Events</h2>
            <div class="timeline fade-in" style="animation-delay: 0.2s;">
                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="timeline-date">May 2025</div>
                        <h3>Youth Leadership Retreat (Kano)</h3>
                        <p>3-day intensive leadership training for 40 selected youth leaders from across Katagum.</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="timeline-date">January 2025</div>
                        <h3>2-Day Seminar on Modern Agricultural Practices</h3>
                        <p>Hands-on training for youth on sustainable agriculture practices and modern farming
                            techniques.</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="timeline-date">June 2024</div>
                        <h3>Late Alh. Ahmadu Muhammadu Wabi III Debate, Quiz and Spelling Competition</h3>
                        <p>Academic competition held in Jama'are to promote education and healthy academic rivalry among
                            secondary schools.</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="timeline-date">December 2024</div>
                        <h3>Mallam Zaki Fellowship Graduation</h3>
                        <p>Graduation ceremony for the inaugural cohort of the Mallam Zaki Fellowship program.</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="timeline-date">April 2024</div>
                        <h3>Katagum Colloquium 2.0</h3>
                        <p>Second edition of our annual youth forum with over 200 participants from across Bauchi State.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team" id="team">
        <div class="container">
            <h2 class="fade-in">Meet the Team</h2>
            <div class="team-grid fade-in" style="animation-delay: 0.2s; display: flex; flex-wrap: wrap; gap: 32px; justify-content: center;">
                <!-- Executive Leadership -->
                <div class="team-member" style="background: #fff; border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,0.06); padding: 24px 18px; max-width: 260px; text-align: center; flex: 1 1 220px;">
                    <div class="member-image" style="width: 110px; height: 110px; margin: 0 auto 16px; border-radius: 50%; overflow: hidden; border: 3px solid #eaeaea;">
                        <img src="img/jamilu.jpeg" alt="Comrade Jamilu Alhaji Mato" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div class="member-info">
                        <h3 style="margin-bottom: 6px; font-size: 1.15rem;">Jamilu Alhaji Mato</h3>
                        <p style="color: #666; font-size: 0.98rem; margin-bottom: 10px;">Executive Chairman</p>
                    </div>
                </div>

                <div class="team-member" style="background: #fff; border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,0.06); padding: 24px 18px; max-width: 260px; text-align: center; flex: 1 1 220px;">
                    <div class="member-image" style="width: 110px; height: 110px; margin: 0 auto 16px; border-radius: 50%; overflow: hidden; border: 3px solid #eaeaea;">
                        <img src="img/char.jpeg" alt="Aminu Abubakar Wali" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div class="member-info">
                        <h3 style="margin-bottom: 6px; font-size: 1.15rem;">Aminu Abubakar Wali</h3>
                        <p style="color: #666; font-size: 0.98rem; margin-bottom: 10px;">Deputy Chairman</p>
                    </div>
                </div>

                <div class="team-member" style="background: #fff; border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,0.06); padding: 24px 18px; max-width: 260px; text-align: center; flex: 1 1 220px;">
                    <div class="member-image" style="width: 110px; height: 110px; margin: 0 auto 16px; border-radius: 50%; overflow: hidden; border: 3px solid #eaeaea;">
                        <img src="img/3.jpeg" alt="Muhammad Muhammad" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div class="member-info">
                        <h3 style="margin-bottom: 6px; font-size: 1.15rem;">Muhammad Muhammad</h3>
                        <p style="color: #666; font-size: 0.98rem; margin-bottom: 10px;">Secretary General</p>
                    </div>
                </div>
                <div class="team-member" style="background: #fff; border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,0.06); padding: 24px 18px; max-width: 260px; text-align: center; flex: 1 1 220px;">
                    <div class="member-image" style="width: 110px; height: 110px; margin: 0 auto 16px; border-radius: 50%; overflow: hidden; border: 3px solid #eaeaea;">
                        <img src="img/4.jpeg" alt="Ibrahim Bappah Aliyu" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div class="member-info">
                        <h3 style="margin-bottom: 6px; font-size: 1.15rem;">Ibrahim Bappah Aliyu</h3>
                        <p style="color: #666; font-size: 0.98rem; margin-bottom: 10px;">Assistant Secretary General</p>
                    </div>
                </div>
                <!-- Directors -->
                <div class="team-member" style="background: #fff; border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,0.06); padding: 24px 18px; max-width: 260px; text-align: center; flex: 1 1 220px;">
                    <div class="member-image" style="width: 110px; height: 110px; margin: 0 auto 16px; border-radius: 50%; overflow: hidden; border: 3px solid #eaeaea;">
                        <img src="img/WhatsApp Image 2025-07-03 at 10.12.52 PM.jpeg" alt="Aliyu Musa Dada" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div class="member-info">
                        <h3 style="margin-bottom: 6px; font-size: 1.15rem;">Aliyu Musa Dada</h3>
                        <p style="color: #666; font-size: 0.98rem; margin-bottom: 10px;">Program and Innovation Director</p>
                    </div>
                </div>

                <div class="team-member" style="background: #fff; border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,0.06); padding: 24px 18px; max-width: 260px; text-align: center; flex: 1 1 220px;">
                    <div class="member-image" style="width: 110px; height: 110px; margin: 0 auto 16px; border-radius: 50%; overflow: hidden; border: 3px solid #eaeaea;">
                        <img src="img/mm.jpeg" alt="Musbahu Muhammad" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div class="member-info">
                        <h3 style="margin-bottom: 6px; font-size: 1.15rem;">Musbahu Muhammad</h3>
                        <p style="color: #666; font-size: 0.98rem; margin-bottom: 10px;">Strategy and Partnership Director</p>
                    </div>
                </div>

                <div class="team-member" style="background: #fff; border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,0.06); padding: 24px 18px; max-width: 260px; text-align: center; flex: 1 1 220px;">
                    <div class="member-image" style="width: 110px; height: 110px; margin: 0 auto 16px; border-radius: 50%; overflow: hidden; border: 3px solid #eaeaea;">
                        <img src="img/placeholder.jpg" alt="Muhammad Isah Dogo" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div class="member-info">
                        <h3 style="margin-bottom: 6px; font-size: 1.15rem;">Muhammad Isah Dogo</h3>
                        <p style="color: #666; font-size: 0.98rem; margin-bottom: 10px;">Finance Director</p>
                    </div>
                </div>

                <div class="team-member" style="background: #fff; border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,0.06); padding: 24px 18px; max-width: 260px; text-align: center; flex: 1 1 220px;">
                    <div class="member-image" style="width: 110px; height: 110px; margin: 0 auto 16px; border-radius: 50%; overflow: hidden; border: 3px solid #eaeaea;">
                        <img src="img/com.jpeg" alt="Ibrahim MaiBulangu" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div class="member-info">
                        <h3 style="margin-bottom: 6px; font-size: 1.15rem;">Ibrahim MaiBulangu</h3>
                        <p style="color: #666; font-size: 0.98rem; margin-bottom: 10px;">Communication and Public Engagement Director</p>
                    </div>
                </div>

                <!-- Additional Team Members -->
                <div class="team-member" style="background: #fff; border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,0.06); padding: 24px 18px; max-width: 260px; text-align: center; flex: 1 1 220px;">
                    <div class="member-image" style="width: 110px; height: 110px; margin: 0 auto 16px; border-radius: 50%; overflow: hidden; border: 3px solid #eaeaea;">
                        <img src="img/placeholder.jpg" alt="Muhammad Shehu" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div class="member-info">
                        <h3 style="margin-bottom: 6px; font-size: 1.15rem;">Muhammad Shehu</h3>
                        <p style="color: #666; font-size: 0.98rem; margin-bottom: 10px;">Community Engagement and Mobilization Director</p>
                    </div>
                </div>

                <div class="team-member" style="background: #fff; border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,0.06); padding: 24px 18px; max-width: 260px; text-align: center; flex: 1 1 220px;">
                    <div class="member-image" style="width: 110px; height: 110px; margin: 0 auto 16px; border-radius: 50%; overflow: hidden; border: 3px solid #eaeaea;">
                        <img src="img/placeholder.jpg" alt="Mahmud Abdullahi" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div class="member-info">
                        <h3 style="margin-bottom: 6px; font-size: 1.15rem;">Mahmud Abdullahi</h3>
                        <p style="color: #666; font-size: 0.98rem; margin-bottom: 10px;">Inclusion and Special Need Director</p>
                    </div>
                </div>

                <div class="team-member" style="background: #fff; border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,0.06); padding: 24px 18px; max-width: 260px; text-align: center; flex: 1 1 220px;">
                    <div class="member-image" style="width: 110px; height: 110px; margin: 0 auto 16px; border-radius: 50%; overflow: hidden; border: 3px solid #eaeaea;">
                        <img src="img/placeholder.jpg" alt="Amina Abdulkadir" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div class="member-info">
                        <h3 style="margin-bottom: 6px; font-size: 1.15rem;">Amina Abdulkadir</h3>
                        <p style="color: #666; font-size: 0.98rem; margin-bottom: 10px;">Women and Gender Director</p>
                    </div>
                </div>

                <div class="team-member" style="background: #fff; border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,0.06); padding: 24px 18px; max-width: 260px; text-align: center; flex: 1 1 220px;">
                    <div class="member-image" style="width: 110px; height: 110px; margin: 0 auto 16px; border-radius: 50%; overflow: hidden; border: 3px solid #eaeaea;">
                        <img src="img/12.jpeg" alt="Umar Muhammad" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div class="member-info">
                        <h3 style="margin-bottom: 6px; font-size: 1.15rem;">Umar Muhammad</h3>
                        <p style="color: #666; font-size: 0.98rem; margin-bottom: 10px;">Technical Director</p>
                    </div>
                </div>

                <div class="team-member" style="background: #fff; border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,0.06); padding: 24px 18px; max-width: 260px; text-align: center; flex: 1 1 220px;">
                    <div class="member-image" style="width: 110px; height: 110px; margin: 0 auto 16px; border-radius: 50%; overflow: hidden; border: 3px solid #eaeaea;">
                        <img src="img/13.jpeg" alt="Amadu Abdu" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div class="member-info">
                        <h3 style="margin-bottom: 6px; font-size: 1.15rem;">Amadu Abdu</h3>
                        <p style="color: #666; font-size: 0.98rem; margin-bottom: 10px;">Transport & Logistics Director</p>
                    </div>
                </div>

                <div class="team-member" style="background: #fff; border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,0.06); padding: 24px 18px; max-width: 260px; text-align: center; flex: 1 1 220px;">
                    <div class="member-image" style="width: 110px; height: 110px; margin: 0 auto 16px; border-radius: 50%; overflow: hidden; border: 3px solid #eaeaea;">
                        <img src="img/14.jpeg" alt="Sulaiman Ahmad Faggo" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div class="member-info">
                        <h3 style="margin-bottom: 6px; font-size: 1.15rem;">Sulaiman Ahmad Faggo</h3>
                        <p style="color: #666; font-size: 0.98rem; margin-bottom: 10px;">Welfare Director</p>
                    </div>
                </div>

                <div class="team-member" style="background: #fff; border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,0.06); padding: 24px 18px; max-width: 260px; text-align: center; flex: 1 1 220px;">
                    <div class="member-image" style="width: 110px; height: 110px; margin: 0 auto 16px; border-radius: 50%; overflow: hidden; border: 3px solid #eaeaea;">
                        <img src="img/15.jpeg" alt="Usman Rufa'i Jama'are" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div class="member-info">
                        <h3 style="margin-bottom: 6px; font-size: 1.15rem;">Usman Rufa'i Jama'are</h3>
                        <p style="color: #666; font-size: 0.98rem; margin-bottom: 10px;">Special Duties Officer</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Partners Section -->
    <section class="partners">
        <div class="container">
            <h2 class="fade-in">Our Partners</h2>
            <div class="partners-grid fade-in"
                style="animation-delay: 0.2s; display: flex; justify-content: center; align-items: center; gap: 40px; flex-wrap: wrap;">
                <img src="img/wunti.png" alt="Wunti Al-Khair Foundation" class="partner-logo"
                    style="max-height: 80px; max-width: 180px; object-fit: contain;">
                <img src="img/ideas.png" alt="Ideas & Data Academy" class="partner-logo"
                    style="max-height: 80px; max-width: 180px; object-fit: contain;">
            </div>
            <p class="fade-in" style="text-align: center; margin-top: 30px; animation-delay: 0.4s;">We're grateful for
                the support of our partners who share our vision for youth empowerment in Katagum.</p>
        </div>
    </section>

    <!-- Get Involved Section -->
    <section class="get-involved" id="get-involved">
        <div class="container">
            <h2 class="fade-in">Get Involved</h2>
            <div class="involved-container fade-in" style="animation-delay: 0.2s;">
                <div class="involved-options">
                    <div class="involved-card">
                        <h3>Become a Volunteer</h3>
                        <p>Join our team of dedicated volunteers working to make a difference in Katagum communities.
                        </p>
                    </div>
                    <div class="involved-card">
                        <h3>Apply for Fellowship</h3>
                        <p>Applications open for the next cohort of our Mallam Zaki Leadership Fellowship.</p>
                    </div>
                    <div class="involved-card">
                        <h3>Partner With Us</h3>
                        <p>Organizations and businesses can collaborate with us on youth programs.</p>
                    </div>
                </div>
                <div class="involved-form">
                    <form id="volunteerForm">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="interest">Area of Interest</label>
                            <select id="interest" name="interest" required>
                                <option value="">Select an option</option>
                                <option value="volunteer">General Volunteer</option>
                                <option value="fellowship">Leadership Fellowship</option>
                                <option value="climate">Climate Action</option>
                                <option value="education">Education Support</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="message">Why do you want to join KYL?</label>
                            <textarea id="message" name="message" required></textarea>
                        </div>
                        <button type="submit" class="btn">Submit Application</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact" id="contact">
        <div class="container">
            <h2 class="fade-in">Contact Us</h2>
            <div class="contact-container fade-in" style="animation-delay: 0.2s;">
                <div class="contact-info">
                    <div class="contact-details">
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <h4>Our Office</h4>
                                <p>No. 12 Zaki Road, Azare<br>Katagum Zone, Bauchi State</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div>
                                <h4>Call Us</h4>
                                <p>+234 814 395 3391</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <h4>Email Us</h4>
                                <p>katagumyouthleague@gmail.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="social-links">
                        <a href="https://instagram.com/katagumyouthleague" target="_blank"><i
                                class="fab fa-instagram"></i></a>
                        <a href="https://twitter.com/KTGyouthleague" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="https://web.facebook.com/p/Katagum-Youth-League-100079845590316/?_rdc=1&_rdr#"
                            target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.linkedin.com/company/katagum-youth-league?trk=public_post_feed-actor-image"
                            target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="contact-form">
                    <form id="contactForm">
                        <div class="form-group">
                            <label for="contact-name">Name</label>
                            <input type="text" id="contact-name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="contact-email">Email</label>
                            <input type="email" id="contact-email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="contact-subject">Subject</label>
                            <input type="text" id="contact-subject" name="subject" required>
                        </div>
                        <div class="form-group">
                            <label for="contact-message">Message</label>
                            <textarea id="contact-message" name="message" required></textarea>
                        </div>
                        <button type="submit" class="btn">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
        <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-logo">
                <img src="img/logo.png" alt="Katagum Youth League Logo">
            </div>
            <div class="footer-links">
                <a href="#about">About</a>
                <a href="#aims">Aims</a>
                <a href="#achievements">Programs</a>
                <a href="#timeline">Events</a>
                <a href="#team">Team</a>
                <a href="#get-involved">Get Involved</a>
                <a href="#contact">Contact</a>
                <a href="gallery.html">Gallery</a>
            </div>
            <p class="copyright">© 2024 Katagum Youth League. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>

    <script>
        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mainNav = document.getElementById('mainNav');

        mobileMenuBtn.addEventListener('click', () => {
            mainNav.classList.toggle('active');
            mobileMenuBtn.innerHTML = mainNav.classList.contains('active') ?
                '<i class="fas fa-times"></i>' : '<i class="fas fa-bars"></i>';
        });

        // Scroll Header Effect
        const header = document.getElementById('header');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // Aims Toggle
        const aimsToggleBtns = document.querySelectorAll('.aims-toggle button');

        aimsToggleBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                // Remove active class from all buttons and content
                document.querySelector('.aims-toggle button.active').classList.remove('active');
                document.querySelector('.aims-content.active').classList.remove('active');

                // Add active class to clicked button and corresponding content
                btn.classList.add('active');
                const lang = btn.getAttribute('data-lang');
                document.getElementById(`${lang}-aims`).classList.add('active');
            });
        });

        // Scroll Animation
        const fadeElements = document.querySelectorAll('.fade-in');

        const fadeInOnScroll = () => {
            fadeElements.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                const windowHeight = window.innerHeight;

                if (elementTop < windowHeight - 100) {
                    element.style.opacity = '1';
                }
            });
        };

        window.addEventListener('scroll', fadeInOnScroll);
        window.addEventListener('load', fadeInOnScroll);

        // Form Submission
        const volunteerForm = document.getElementById('volunteerForm');
        const contactForm = document.getElementById('contactForm');

        // Google Apps Script Web App URL
        const GOOGLE_SHEET_URL = 'https://script.google.com/macros/s/AKfycbwOjUiss76xxbYIIDOe8yaRNBgkfJYyTxR2es1yH7BT702HDXLrjCaS1GobxIrZCvt-0Q/exec';
        // New endpoint for contact form (replace with your Apps Script URL for sending email)
        const CONTACT_FORM_URL = 'https://script.google.com/macros/s/AKfycbw3ackhF2ltd7cJ_E9SV3WTGyHdBc7A6am48dNImsmJRVxa1eP9dYtvXvcnmoGs-54Y/exec';

        volunteerForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const submitBtn = volunteerForm.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Loading...';
            submitBtn.disabled = true;
            const formData = new FormData(volunteerForm);
            try {
                const response = await fetch(GOOGLE_SHEET_URL, {
                    method: 'POST',
                    body: formData
                });
                let result;
                try {
                    result = await response.json();
                } catch {
                    result = await response.text();
                }
                if (response.ok && (result.result === "success" || (typeof result === "string" && result.indexOf("success") !== -1))) {
                    alert('Thank you for your interest in KYL! We will contact you soon.');
                    volunteerForm.reset();
                } else if (response.status === 200 && typeof result === "string" && result.trim() === "") {
                    alert('Your application was received, but there was a technical issue with the confirmation. Please check your email for updates.');
                    volunteerForm.reset();
                } else {
                    alert('There was an error submitting your application. Please try again later.');
                }
            } catch (error) {
                alert('Your application was received, but there was a technical issue with the confirmation. Please check your email for updates.');
                volunteerForm.reset();
            } finally {
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            }
        });

        contactForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const submitBtn = contactForm.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Loading...';
            submitBtn.disabled = true;
            const formData = new FormData(contactForm);
            try {
                const response = await fetch(CONTACT_FORM_URL, {
                    method: 'POST',
                    body: formData
                });
                if (response.ok) {
                    alert('Your message has been sent. We will get back to you shortly.');
                    contactForm.reset();
                } else {
                    alert('There was an error sending your message. Please try again later.');
                }
            } catch (error) {
                alert('There was an error sending your message. Please try again later.');
            } finally {
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            }
        });

        // Close mobile menu when clicking a link
        const navLinks = document.querySelectorAll('nav ul li a');

        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (mainNav.classList.contains('active')) {
                    mainNav.classList.remove('active');
                    mobileMenuBtn.innerHTML = '<i class="fas fa-bars"></i>';
                }
            });
        });

        // Countdown Timer
        const countdownDate = new Date('2025-08-03T09:00:00').getTime();

        function updateCountdown() {
            const now = new Date().getTime();
            const distance = countdownDate - now;

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById('days').textContent = String(days).padStart(2, '0');
            document.getElementById('hours').textContent = String(hours).padStart(2, '0');
            document.getElementById('minutes').textContent = String(minutes).padStart(2, '0');
            document.getElementById('seconds').textContent = String(seconds).padStart(2, '0');

            if (distance < 0) {
                clearInterval(countdownInterval);
                document.querySelector('.countdown-card').style.display = 'none';
            }
        }

        const countdownInterval = setInterval(updateCountdown, 1000);
        updateCountdown();
    </script>
</body>

</html>