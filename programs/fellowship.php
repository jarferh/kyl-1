<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mallam Zaki Fellowship - Katagum Youth League</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .program-hero {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('../fellowship/1.jpeg');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
            text-align: center;
        }

        .program-content {
            padding: 60px 0;
        }

        .program-section {
            margin-bottom: 40px;
        }

        .program-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin: 40px 0;
        }

        .stat-card {
            background: #f5f5f5;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        .stat-number {
            font-size: 2.5em;
            font-weight: bold;
            color: #8b4513;
            margin-bottom: 10px;
        }

        .image-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin: 40px 0;
        }

        .gallery-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
        }

        .timeline {
            position: relative;
            max-width: 800px;
            margin: 40px auto;
        }

        .timeline-item {
            padding: 20px;
            background: #f5f5f5;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .apply-section {
            background: #8b4513;
            color: white;
            padding: 60px 0;
            text-align: center;
        }

        .apply-button {
            display: inline-block;
            padding: 15px 30px;
            background: white;
            color: #8b4513;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 20px;
            transition: all 0.3s ease;
        }

        .apply-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header id="header">
        <div class="container header-container">
            <div class="logo">
                <a href="../index.php">
                    <img src="../img/logo.png" alt="Katagum Youth League Logo">
                </a>
            </div>
            <button class="mobile-menu-btn" id="mobileMenuBtn">
                <i class="fas fa-bars"></i>
            </button>
            <nav id="mainNav">
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../index.php#about">About</a></li>
                    <li><a href="../index.php#programs">Programs</a></li>
                    <li><a href="../index.php#contact">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="program-hero">
        <div class="container">
            <h1>Mallam Zaki Fellowship Program</h1>
            <p>Empowering the Next Generation of Leaders</p>
        </div>
    </section>

    <!-- Program Content -->
    <section class="program-content">
        <div class="container">
            <div class="program-section">
                <h2>About the Fellowship</h2>
                <p>The Mallam Zaki Fellowship is KYL's flagship leadership development program, designed to nurture and empower emerging young leaders from Katagum. Through intensive training, mentorship, and hands-on experience, fellows develop the skills and knowledge needed to drive positive change in their communities.</p>
            </div>

            <div class="program-stats">
                <div class="stat-card">
                    <div class="stat-number">30+</div>
                    <p>Fellows Graduated</p>
                </div>
                <div class="stat-card">
                    <div class="stat-number">6</div>
                    <p>Months Duration</p>
                </div>
                <div class="stat-card">
                    <div class="stat-number">12</div>
                    <p>Expert Mentors</p>
                </div>
            </div>

            <div class="program-section">
                <h2>Program Components</h2>
                <ul>
                    <li>Leadership Development Workshops</li>
                    <li>Community Project Implementation</li>
                    <li>One-on-One Mentorship</li>
                    <li>Networking Opportunities</li>
                    <li>Skills Development Training</li>
                </ul>
            </div>

            <div class="program-section">
                <h2>Fellowship Timeline</h2>
                <div class="timeline">
                    <div class="timeline-item">
                        <h3>Month 1-2: Foundation Phase</h3>
                        <p>Core leadership principles, self-discovery, and team building</p>
                    </div>
                    <div class="timeline-item">
                        <h3>Month 3-4: Development Phase</h3>
                        <p>Skill-building workshops and project planning</p>
                    </div>
                    <div class="timeline-item">
                        <h3>Month 5-6: Implementation Phase</h3>
                        <p>Community project execution and leadership practice</p>
                    </div>
                </div>
            </div>

            <div class="program-section">
                <h2>Success Stories</h2>
                <div class="image-gallery">
                    <img src="../fellowship/1.jpeg" alt="Fellowship Activity" class="gallery-image">
                    <img src="../fellowship/2.jpeg" alt="Community Project" class="gallery-image">
                    <img src="../fellowship/3.jpeg" alt="Graduation Ceremony" class="gallery-image">
                </div>
            </div>
        </div>
    </section>

    <!-- Apply Section -->
    <section class="apply-section">
        <div class="container">
            <h2>Join the Next Cohort</h2>
            <p>Applications are now open for the 2025 Mallam Zaki Fellowship Program</p>
            <a href="apply-fellowship.php" class="apply-button">Apply Now</a>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-logo">
                <img src="../img/logo.png" alt="Katagum Youth League Logo">
            </div>
            <p class="copyright">© 2024 Katagum Youth League. All Rights Reserved.</p>
        </div>
    </footer>

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
    </script>
</body>
</html>
