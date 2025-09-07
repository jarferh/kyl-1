<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Agriculture Program - Katagum Youth League</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .program-hero {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('../Agricultural/1.jpeg');
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

        .program-features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin: 40px 0;
        }

        .feature-card {
            background: #f5f5f5;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
        }

        .feature-icon {
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
            <h1>Modern Agriculture Program</h1>
            <p>Transforming Agriculture Through Innovation and Technology</p>
        </div>
    </section>

    <!-- Program Content -->
    <section class="program-content">
        <div class="container">
            <div class="program-section">
                <h2>About the Program</h2>
                <p>Our Modern Agriculture Program is designed to revolutionize farming practices in Katagum through the introduction of innovative techniques, sustainable methods, and modern technology. We aim to empower young farmers with the knowledge and tools they need to succeed in modern agriculture.</p>
            </div>

            <div class="program-features">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-seedling"></i>
                    </div>
                    <h3>Sustainable Farming</h3>
                    <p>Learn eco-friendly farming practices that protect the environment while maximizing yield</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-tractor"></i>
                    </div>
                    <h3>Modern Technology</h3>
                    <p>Experience the latest agricultural technologies and mechanized farming techniques</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-hand-holding-water"></i>
                    </div>
                    <h3>Water Management</h3>
                    <p>Master efficient irrigation systems and water conservation methods</p>
                </div>
            </div>

            <div class="program-section">
                <h2>Program Components</h2>
                <ul>
                    <li>Hands-on Training in Modern Farming Techniques</li>
                    <li>Agricultural Technology Workshops</li>
                    <li>Sustainable Farming Practices</li>
                    <li>Market Access and Business Skills</li>
                    <li>Expert Mentorship from Experienced Farmers</li>
                </ul>
            </div>

            <div class="impact-stats">
                <div class="stat-card">
                    <div class="stat-number">100+</div>
                    <p>Young Farmers Trained</p>
                </div>
                <div class="stat-card">
                    <div class="stat-number">50</div>
                    <p>Hectares Cultivated</p>
                </div>
                <div class="stat-card">
                    <div class="stat-number">30%</div>
                    <p>Yield Increase</p>
                </div>
            </div>

            <div class="program-section">
                <h2>Success Stories</h2>
                <div class="image-gallery">
                    <img src="../Agricultural/2.jpeg" alt="Training Session" class="gallery-image">
                    <img src="../Agricultural/3.jpeg" alt="Modern Farming" class="gallery-image">
                    <img src="../Agricultural/4.jpeg" alt="Harvest Time" class="gallery-image">
                </div>
            </div>
        </div>
    </section>

    <!-- Join Section -->
    <section class="join-section">
        <div class="container">
            <h2>Join Our Agricultural Revolution</h2>
            <p>Be part of the transformation in Katagum's agricultural sector</p>
            <a href="../index.php#get-involved" class="join-button">Get Started</a>
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
