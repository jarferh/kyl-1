<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youth Development Program - Katagum Youth League</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .program-hero {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('../img/school.jpg');
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

        .development-areas {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin: 40px 0;
        }

        .area-card {
            background: #f5f5f5;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
        }

        .area-icon {
            font-size: 2.5em;
            color: #8b4513;
            margin-bottom: 20px;
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

        .impact-stats {
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

        .upcoming-events {
            margin: 40px 0;
        }

        .event-card {
            background: #f5f5f5;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .join-section {
            background: #8b4513;
            color: white;
            padding: 60px 0;
            text-align: center;
        }

        .join-button {
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

        .join-button:hover {
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
            <h1>Youth Development Program</h1>
            <p>Building Tomorrow's Leaders Today</p>
        </div>
    </section>

    <!-- Program Content -->
    <section class="program-content">
        <div class="container">
            <div class="program-section">
                <h2>About the Program</h2>
                <p>Our Youth Development Program is a comprehensive initiative designed to empower young people in Katagum with the skills, knowledge, and opportunities they need to succeed in today's world. Through various activities and training sessions, we focus on personal growth, professional development, and community engagement.</p>
            </div>

            <div class="development-areas">
                <div class="area-card">
                    <div class="area-icon">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <h3>Digital Skills</h3>
                    <p>Training in modern technology and digital literacy</p>
                </div>
                <div class="area-card">
                    <div class="area-icon">
                        <i class="fas fa-comments"></i>
                    </div>
                    <h3>Communication</h3>
                    <p>Public speaking and interpersonal skills development</p>
                </div>
                <div class="area-card">
                    <div class="area-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <h3>Career Development</h3>
                    <p>Career guidance and professional skills training</p>
                </div>
                <div class="area-card">
                    <div class="area-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Leadership</h3>
                    <p>Leadership development and community service</p>
                </div>
            </div>

            <div class="impact-stats">
                <div class="stat-card">
                    <div class="stat-number">500+</div>
                    <p>Youth Trained</p>
                </div>
                <div class="stat-card">
                    <div class="stat-number">20</div>
                    <p>Training Programs</p>
                </div>
                <div class="stat-card">
                    <div class="stat-number">30+</div>
                    <p>Community Projects</p>
                </div>
            </div>

            <div class="program-section">
                <h2>Key Components</h2>
                <ul>
                    <li>Skills Development Workshops</li>
                    <li>Mentorship Programs</li>
                    <li>Community Service Projects</li>
                    <li>Career Counseling</li>
                    <li>Leadership Training</li>
                    <li>Digital Literacy Programs</li>
                </ul>
            </div>

            <div class="program-section">
                <h2>Success Stories</h2>
                <div class="image-gallery">
                    <img src="../img/12.jpeg" alt="Training Session" class="gallery-image">
                    <img src="../img/13.jpeg" alt="Youth Workshop" class="gallery-image">
                    <img src="../img/14.jpeg" alt="Community Project" class="gallery-image">
                </div>
            </div>

            <div class="upcoming-events">
                <h2>Upcoming Activities</h2>
                <div class="event-card">
                    <h3>Digital Skills Workshop</h3>
                    <p>Learn essential computer skills and digital marketing</p>
                    <p><strong>Date:</strong> August 15, 2025</p>
                </div>
                <div class="event-card">
                    <h3>Career Development Day</h3>
                    <p>Meet professionals and learn about career opportunities</p>
                    <p><strong>Date:</strong> September 1, 2025</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Join Section -->
    <section class="join-section">
        <div class="container">
            <h2>Join Our Youth Development Program</h2>
            <p>Take the first step towards your personal and professional growth</p>
            <a href="../index.php#get-involved" class="join-button">Register Now</a>
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
