<?php

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once('../config/database.php');

// Function to check if there's an active batch
function getActiveBatch($pdo) {
    $stmt = $pdo->prepare("SELECT * FROM batches WHERE status = 'open' AND application_end >= CURRENT_TIMESTAMP ORDER BY created_at DESC LIMIT 1");
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
// Get active batch
$activeBatch = getActiveBatch($pdo);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mallam Zaki Fellowship Application - Katagum Youth League</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #8b4513;
            --primary-dark: #6b3410;
            --primary-light: #a55a28;
            --secondary: #f8f9fa;
            --accent: #28a745;
            --danger: #dc3545;
            --warning: #ffc107;
            --dark: #212529;
            --light: #ffffff;
            --gray-100: #f8f9fa;
            --gray-200: #e9ecef;
            --gray-300: #dee2e6;
            --gray-400: #ced4da;
            --gray-500: #adb5bd;
            --gray-600: #6c757d;
            --gray-700: #495057;
            --gray-800: #343a40;
            --gray-900: #212529;
            --border-radius: 12px;
            --shadow-sm: 0 2px 4px rgba(0,0,0,0.06);
            --shadow-md: 0 4px 6px rgba(0,0,0,0.1);
            --shadow-lg: 0 10px 15px rgba(0,0,0,0.15);
            --shadow-xl: 0 20px 25px rgba(0,0,0,0.25);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--gray-700);
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }

        /* Header Styles */
        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: var(--shadow-sm);
        }

        .header-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo img {
            height: 50px;
            width: auto;
        }

        .nav {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav a {
            text-decoration: none;
            color: var(--gray-700);
            font-weight: 500;
            transition: var(--transition);
            position: relative;
        }

        .nav a:hover {
            color: var(--primary);
        }

        .nav a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary);
            transition: var(--transition);
        }

        .nav a:hover::after {
            width: 100%;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, rgba(139, 69, 19, 0.9), rgba(107, 52, 16, 0.8)),
                        url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="20" cy="20" r="2" fill="rgba(255,255,255,0.1)"/><circle cx="80" cy="50" r="1" fill="rgba(255,255,255,0.05)"/><circle cx="50" cy="80" r="1.5" fill="rgba(255,255,255,0.08)"/></pattern></defs><rect width="100%" height="100%" fill="url(%23grain)"/></svg>');
            color: white;
            padding: 4rem 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle at center, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: rotate 20s linear infinite;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .hero h1 {
            font-size: clamp(2rem, 5vw, 3.5rem);
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .hero p {
            font-size: 1.25rem;
            opacity: 0.9;
            margin-bottom: 2rem;
        }

        /* Main Container */
        .main-container {
            max-width: 900px;
            margin: -2rem auto 2rem;
            padding: 0 2rem;
            position: relative;
            z-index: 10;
        }

        /* Application Form */
        .application-form {
            background: var(--light);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-xl);
            overflow: hidden;
            position: relative;
        }

        .application-form::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--primary-light), var(--primary));
        }

        /* Progress Bar */
        .progress-container {
            padding: 2rem;
            background: var(--gray-50);
            border-bottom: 1px solid var(--gray-200);
        }

        .progress-bar {
            display: flex;
            justify-content: space-between;
            position: relative;
            margin-bottom: 1rem;
        }

        .progress-bar::before {
            content: '';
            position: absolute;
            top: 15px;
            left: 0;
            right: 0;
            height: 2px;
            background: var(--gray-300);
            z-index: 1;
        }

        .progress-step {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            z-index: 2;
            flex: 1;
        }

        .progress-step-circle {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: var(--gray-300);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray-600);
            font-weight: 600;
            font-size: 0.875rem;
            margin-bottom: 0.5rem;
            transition: var(--transition);
        }

        .progress-step.active .progress-step-circle {
            background: var(--primary);
            color: white;
            box-shadow: 0 0 0 4px rgba(139, 69, 19, 0.2);
        }

        .progress-step-label {
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--gray-600);
            text-align: center;
        }

        .progress-step.active .progress-step-label {
            color: var(--primary);
            font-weight: 600;
        }

        /* Status Messages */
        .status-message {
            margin: 2rem;
            padding: 1.5rem;
            border-radius: var(--border-radius);
            border-left: 4px solid;
            animation: slideIn 0.5s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .status-success {
            background: rgba(40, 167, 69, 0.1);
            border-color: var(--accent);
            color: #155724;
        }

        .status-error {
            background: rgba(220, 53, 69, 0.1);
            border-color: var(--danger);
            color: #721c24;
        }

        .status-closed {
            background: rgba(108, 117, 125, 0.1);
            border-color: var(--gray-500);
            color: var(--gray-700);
            text-align: center;
        }

        /* Form Sections */
        .form-section {
            padding: 2rem;
            border-bottom: 1px solid var(--gray-200);
            position: relative;
        }

        .form-section:last-child {
            border-bottom: none;
        }

        .form-section h3 {
            color: var(--primary);
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .form-section h3::before {
            content: '';
            width: 4px;
            height: 1.5rem;
            background: var(--primary);
            border-radius: 2px;
        }

        /* Form Groups */
        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--gray-700);
            font-size: 0.9rem;
            letter-spacing: 0.025em;
        }

        .required-field::after {
            content: ' *';
            color: var(--danger);
            font-weight: 600;
        }

        /* Form Controls */
        .form-control {
            color:(var(--light));
            width: 100%;
            padding: 0.875rem 1rem;
            border: 2px solid var(--gray-300);
            border-radius: 8px;
            font-size: 1rem;
            background: var(--light);
            transition: var(--transition);
            position: relative;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(139, 69, 19, 0.1);
            transform: translateY(-1px);
        }

        .form-control:hover {
            border-color: var(--gray-400);
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
            font-family: inherit;
        }

        select.form-control {
            cursor: pointer;
            color:(var(--light))
        }

        input[type="file"].form-control {
            padding: 0.75rem;
            border: 2px dashed var(--gray-300);
            background: var(--gray-50);
            cursor: pointer;
            transition: var(--transition);
        }

        input[type="file"].form-control:hover {
            border-color: var(--primary);
            background: rgba(139, 69, 19, 0.05);
        }

        /* Character Counter */
        .char-counter {
            position: absolute;
            bottom: 8px;
            right: 12px;
            font-size: 0.75rem;
            color: var(--gray-500);
            background: rgba(255, 255, 255, 0.9);
            padding: 2px 6px;
            border-radius: 4px;
            pointer-events: none;
        }

        /* Validation */
        .form-control.error {
            border-color: var(--danger);
            background: rgba(220, 53, 69, 0.05);
        }

        .validation-error {
            color: var(--danger);
            font-size: 0.875rem;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            animation: shake 0.5s ease-in-out;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        /* Submit Button */
        .submit-section {
            padding: 2rem;
            background: var(--gray-50);
            text-align: center;
        }

        .submit-btn {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: white;
            border: none;
            padding: 1rem 3rem;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            min-width: 200px;
            box-shadow: var(--shadow-md);
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .submit-btn:hover {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary));
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .submit-btn:hover::before {
            left: 100%;
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .submit-btn:disabled {
            background: var(--gray-400);
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        /* Loading State */
        .loading {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .spinner {
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255,255,255,0.3);
            border-top: 2px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Alert */
        .alert {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 1rem 1.5rem;
            border-radius: var(--border-radius);
            color: white;
            z-index: 1001;
            box-shadow: var(--shadow-lg);
            animation: slideInRight 0.5s ease-out;
            max-width: 400px;
        }

        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .alert-error {
            background: var(--danger);
        }

        .alert-success {
            background: var(--accent);
        }

        /* Footer */
        .footer {
            background: var(--primary);
            color: var(--gray-300);
            text-align: center;
            padding: 3rem 2rem 2rem;
            margin-top: 4rem;
        }

        .footer-logo img {
            height: 60px;
            margin-bottom: 1rem;
            filter: brightness(0.8);
        }

        .footer p {
            color: var(--light);
            margin: 0;
            opacity: 0.8;
        }

        /* Mobile Styles */
        @media (max-width: 768px) {
            .header-container {
                padding: 1rem;
            }

            .nav {
                display: none;
            }

            .main-container {
                padding: 0 1rem;
                margin-top: -1rem;
            }

            .form-section {
                padding: 1.5rem;
            }

            .progress-container {
                padding: 1.5rem;
            }

            .progress-bar {
                display: none;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .progress-step-label {
                font-size: 0.75rem;
            }

            .submit-btn {
                width: 100%;
                padding: 1rem;
            }

            .alert {
                right: 10px;
                left: 10px;
                max-width: none;
            }
        }

        /* Accessibility */
        @media (prefers-reduced-motion: reduce) {
            * {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }

        /* High contrast mode */
        @media (prefers-contrast: high) {
            :root {
                --primary: #000000;
                --gray-300: #666666;
                --gray-700: #000000;
            }
        }

        /* Dark mode support */
        @media (prefers-color-scheme: dark) {
            :root {
                --light: #1a1a1a;
                --gray-50: #2a2a2a;
                --gray-100: #333333;
                --gray-200: #404040;
                --gray-300: #4a4a4a;
                --gray-700: #e0e0e0;
                --gray-900: #ffffff;
            }

            body {
                background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            }

            .application-form {
                background: var(--light);
                color: var(--gray-700);
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="header">
        <div class="header-container">
            <div class="logo">
                <a href="../index.php">
                    <img src="../img/logo.png" alt="Katagum Youth League Logo">
                </a>
            </div>
            <nav>
                <ul class="nav">
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../index.php#about">About</a></li>
                    <li><a href="../index.php#programs">Programs</a></li>
                    <li><a href="../index.php#contact">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Mallam Zaki Fellowship</h1>
            <p>Empowering the next generation of leaders in Northern Nigeria</p>
        </div>
    </section>

    <!-- Main Container -->
    <div class="main-container">
        <div class="application-form">
            <!-- Progress Bar -->
            <div class="progress-container">
                <div class="progress-bar">
                    <div class="progress-step active">
                        <div class="progress-step-circle">1</div>
                        <div class="progress-step-label">Personal Info</div>
                    </div>
                    <div class="progress-step">
                        <div class="progress-step-circle">2</div>
                        <div class="progress-step-label">Education</div>
                    </div>
                    <div class="progress-step">
                        <div class="progress-step-circle">3</div>
                        <div class="progress-step-label">Experience</div>
                    </div>
                    <div class="progress-step">
                        <div class="progress-step-circle">4</div>
                        <div class="progress-step-label">Documents</div>
                    </div>
                </div>
            </div>

            <!-- Status Messages -->
            <?php if ($activeBatch): ?>
            <div class="status-message status-success" style="display: flex; align-items: center; gap: 1.5rem;">
                <div style="font-size: 2.2rem; color: var(--accent);">
                    <i class="fas fa-bullhorn"></i>
                </div>
                <div>
                    <h3 style="color: #155724; margin-bottom: 8px; font-size: 1.25rem;">
                        <?php echo htmlspecialchars($activeBatch['name']); ?> — Applications Open
                    </h3>
                    <p style="margin: 0; color: #155724;">
                        <strong>Deadline:</strong>
                        <span style="background: var(--warning); color: #212529; padding: 2px 8px; border-radius: 6px; font-weight: 600; text-align: center;">
                            <?php echo date('F d, Y', strtotime($activeBatch['application_end'])); ?>
                        </span>
                    </p>
                </div>
            </div>
            <?php else: ?>
            <div class="status-message status-closed" style="display: flex; align-items: center; gap: 1.5rem;">
                <div style="font-size: 2.2rem; color: var(--gray-500);">
                    <i class="fas fa-lock"></i>
                </div>
                <div>
                    <h3 style="margin-bottom: 8px; color: var(--gray-700); font-size: 1.15rem;">
                        Applications Currently Closed
                    </h3>
                    <p style="margin: 0; color: var(--gray-700);">
                        There are no open application batches at the moment.<br>
                        Please check back later or follow us for updates.
                    </p>
                </div>
            </div>
            <?php endif; ?>
            <?php
// Add this section right after the status messages in apply-fellowship.php

// Handle success/error messages from session
if (isset($_SESSION['success'])) {
    echo '<div class="status-message status-success">
            <h3 style="color: #155724; margin-bottom: 10px;">Application Submitted Successfully!</h3>
            <p>' . htmlspecialchars($_SESSION['success']) . '</p>
          </div>';
    unset($_SESSION['success']);
}

if (isset($_SESSION['error'])) {
    echo '<div class="status-message status-error">
            <h3 style="color: #721c24; margin-bottom: 10px;">Error</h3>
            <p>' . htmlspecialchars($_SESSION['error']) . '</p>
          </div>';
    unset($_SESSION['error']);
}

// Handle GET parameter success message
if (isset($_GET['success']) && $_GET['success'] == '1') {
    echo '<div class="status-message status-success">
            <h3 style="color: #155724; margin-bottom: 10px;">Application Submitted Successfully!</h3>
            <p>Thank you for your application! We have received your submission and will review it shortly. You should receive a confirmation email soon.</p>
          </div>';
}
?>
            <!-- Application Form -->
            <?php if ($activeBatch): ?>
            <form id="fellowshipForm" action="process-fellowship.php" method="POST" enctype="multipart/form-data">
                <!-- Personal Information -->
                <div class="form-section">
                    <h3><i class="fas fa-user"></i> Personal Information</h3>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label class="required-field">Full Name</label>
                            <input type="text" name="full_name" required class="form-control" placeholder="Enter your full name">
                        </div>
                        
                        <div class="form-group">
                            <label class="required-field">Date of Birth</label>
                            <input type="date" name="birth_date" required class="form-control">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="required-field">Gender</label>
                            <select name="gender" required class="form-control">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="required-field">State of Origin</label>
                            <select name="state" required class="form-control">
                                <option value="">Select State</option>
                                <option value="Bauchi">Bauchi</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="required-field">Local Government Area</label>
                            <select name="local_government" required class="form-control">
                                <option value="">Select LGA</option>
                                <option value="Alkaleri">Alkaleri</option>
                                <option value="Bauchi">Bauchi</option>
                                <option value="Bogoro">Bogoro</option>
                                <option value="Dambam">Dambam</option>
                                <option value="Darazo">Darazo</option>
                                <option value="Dass">Dass</option>
                                <option value="Gamawa">Gamawa</option>
                                <option value="Ganjuwa">Ganjuwa</option>
                                <option value="Giade">Giade</option>
                                <option value="Itas/Gadau">Itas/Gadau</option>
                                <option value="Jama'are">Jama'are</option>
                                <option value="Katagum">Katagum</option>
                                <option value="Kirfi">Kirfi</option>
                                <option value="Misau">Misau</option>
                                <option value="Ningi">Ningi</option>
                                <option value="Shira">Shira</option>
                                <option value="Tafawa Balewa">Tafawa Balewa</option>
                                <option value="Toro">Toro</option>
                                <option value="Warji">Warji</option>
                                <option value="Zaki">Zaki</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="required-field">Ward</label>
                            <input type="text" name="ward" required class="form-control" placeholder="Enter your ward">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="required-field">Phone Number</label>
                            <input type="tel" name="phone" required class="form-control" placeholder="+234 XXX XXX XXXX">
                        </div>

                        <div class="form-group">
                            <label class="required-field">Email Address</label>
                            <input type="email" name="email" required class="form-control" placeholder="your@email.com">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="required-field">Residential Address</label>
                        <textarea name="residential_address" required class="form-control" placeholder="Enter your full residential address"></textarea>
                    </div>
                </div>

                <!-- Educational Background -->
                <div class="form-section">
                    <h3><i class="fas fa-graduation-cap"></i> Educational Background</h3>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label class="required-field">Highest Level of Education</label>
                            <select name="education_level" required class="form-control">
                                <option value="">Select Education Level</option>
                                <option value="SSCE">SSCE</option>
                                <option value="NCE">NCE</option>
                                <option value="ND">ND</option>
                                <option value="HND">HND</option>
                                <option value="BSc./BTech.">BSc./BTech.</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Name of Educational Institution</label>
                            <input type="text" name="institution_name" required class="form-control" placeholder="Name of your school/university">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="required-field">Course of Study</label>
                        <input type="text" name="course_of_study" required class="form-control" placeholder="Your field of study/major">
                    </div>

                    <div class="form-group">
                        <label>Year of Graduation</label>
                        <input type="number" name="graduation_year" min="1990" max="2025" class="form-control" placeholder="2020">
                    </div>
                </div>

                <!-- Professional Background -->
                <div class="form-section">
                    <h3><i class="fas fa-briefcase"></i> Professional Background</h3>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label>Current Occupation/Job Title</label>
                            <input type="text" name="current_occupation" class="form-control" placeholder="Your current job title">
                        </div>

                        <div class="form-group">
                            <label>Employer/Organization Name</label>
                            <input type="text" name="employer_name" class="form-control" placeholder="Name of your employer">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Work Experience (Previous and Current)</label>
                        <textarea name="work_experience" class="form-control" placeholder="Describe your work experience, including roles, responsibilities, and achievements"></textarea>
                    </div>

                    <div class="form-group">
                        <label class="required-field">Volunteer Experience</label>
                        <textarea name="volunteer_experience" required class="form-control" placeholder="Describe your volunteer work and community involvement"></textarea>
                    </div>

                    <div class="form-group">
                        <label class="required-field">Relevant Skills and Competencies</label>
                        <textarea name="skills_competencies" required class="form-control" placeholder="List your relevant skills, technical abilities, and competencies"></textarea>
                    </div>

                    <div class="form-group">
                        <label class="required-field">Leadership Roles Held</label>
                        <textarea name="leadership_roles" required class="form-control" placeholder="Describe any leadership positions you've held and your achievements"></textarea>
                    </div>
                </div>

                <!-- Motivation and Goals -->
                <div class="form-section">
                    <h3><i class="fas fa-target"></i> Motivation and Goals</h3>

                    <div class="form-group">
                        <label class="required-field">Why do you want to join The Mallam Zaki Fellowship? (500 words)</label>
                        <textarea name="why_fellowship" required maxlength="4000" class="form-control" placeholder="Share your motivation for applying to this fellowship..."></textarea>
                        <div class="char-counter">0/4000 characters</div>
                    </div>

                    <div class="form-group">
                        <label class="required-field">Describe a challenging situation you faced and how you overcame it. (300 words)</label>
                        <textarea name="challenge_description" required maxlength="2400" class="form-control" placeholder="Share a specific challenge and your approach to overcoming it..."></textarea>
                        <div class="char-counter">0/2400 characters</div>
                    </div>

                    <div class="form-group">
                        <label class="required-field">What do you hope to achieve through this fellowship? (300 words)</label>
                        <textarea name="fellowship_goals" required maxlength="2400" class="form-control" placeholder="Describe your goals and expected outcomes from the fellowship..."></textarea>
                        <div class="char-counter">0/2400 characters</div>
                    </div>

                    <div class="form-group">
                        <label class="required-field">How do you plan to apply the skills learned during the fellowship in your community? (300 words)</label>
                        <textarea name="skills_application" required maxlength="2400" class="form-control" placeholder="Explain how you'll use the fellowship experience to benefit your community..."></textarea>
                        <div class="char-counter">0/2400 characters</div>
                    </div>

                    <div class="form-group">
                        <label class="required-field">Can you accommodate yourself in Azare for a short period, up to 2 weeks?</label>
                        <select name="can_accommodate" required class="form-control">
                            <option value="">Select Answer</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                            <option value="Maybe">Maybe</option>
                        </select>
                    </div>
                </div>

                <!-- Media Upload -->
                <div class="form-section">
                    <h3><i class="fas fa-upload"></i> Required Documents</h3>

                    <div class="form-group">
                        <label class="required-field">In 1 minute or less Video, tell us why you should be selected</label>
                        <input type="file" name="video" accept="video/*" required class="form-control">
                        <small class="form-text text-muted">
                            <i class="fas fa-info-circle"></i> 
                            Upload 1 supported file: video. Max 10 MB.
                        </small>
                    </div>

                    <div class="form-group">
                        <label class="required-field">Recent Passport Photograph</label>
                        <input type="file" name="passport_photo" accept="image/*" required class="form-control">
                        <small class="form-text text-muted">
                            <i class="fas fa-info-circle"></i> 
                            Upload 1 supported file: image. Max 1 MB.
                        </small>
                    </div>
                </div>

                <!-- Submit Section -->
                <div class="submit-section">
                    <button type="submit" class="submit-btn" id="submitBtn">
                        <span class="btn-text">Submit Application</span>
                        <div class="spinner" style="display: none;"></div>
                    </button>
                    <p style="margin-top: 1rem; color: var(--gray-600); font-size: 0.9rem;">
                        Please review all information carefully before submitting. You will receive a confirmation email upon successful submission.
                    </p>
                </div>
            </form>
            
        </div>
    </div>

    <?php endif; ?>
    
    <!-- Footer -->
    <footer class="footer">
        <div class="footer-logo">
            <img src="../img/logo.png" alt="Katagum Youth League Logo">
        </div>
        <p>&copy; 2024 Katagum Youth League. All Rights Reserved.</p>
    </footer>

    <!-- Alert Container -->
    <div id="alertContainer"></div>

    <script>
        // Enhanced Form Functionality
        class FellowshipForm {
            constructor() {
                this.form = document.getElementById('fellowshipForm');
                this.submitBtn = document.getElementById('submitBtn');
                this.currentStep = 1;
                this.totalSteps = 4;
                this.isSubmitting = false;
                
                this.init();
            }

            init() {
                this.setupEventListeners();
                this.setupCharacterCounters();
                this.setupFileValidation();
                this.setupProgressTracking();
                this.setupAutoSave();
            }

            setupEventListeners() {
                // Remove JS form submission override
                // this.form.addEventListener('submit', (e) => this.handleSubmit(e));

                // Real-time validation
                this.form.addEventListener('input', (e) => this.validateField(e.target));
                this.form.addEventListener('change', (e) => this.validateField(e.target));
                
                // Prevent accidental navigation
                this.form.addEventListener('submit', () => {
                    this.isSubmitting = true;
                });
                window.addEventListener('beforeunload', (e) => {
                    if (this.hasUnsavedChanges() && !this.isSubmitting) {
                        e.preventDefault();
                        e.returnValue = '';
                    }
                });
            }

            setupCharacterCounters() {
                document.querySelectorAll('textarea[maxlength]').forEach(textarea => {
                    const counter = textarea.parentNode.querySelector('.char-counter');
                    if (counter) {
                        const updateCounter = () => {
                            const current = textarea.value.length;
                            const max = textarea.getAttribute('maxlength');
                            counter.textContent = `${current}/${max} characters`;
                            
                            if (current > max * 0.9) {
                                counter.style.color = 'var(--warning)';
                            } else if (current > max * 0.95) {
                                counter.style.color = 'var(--danger)';
                            } else {
                                counter.style.color = 'var(--gray-500)';
                            }
                        };
                        
                        textarea.addEventListener('input', updateCounter);
                        updateCounter();
                    }
                });
            }

            setupFileValidation() {
                document.querySelectorAll('input[type="file"]').forEach(input => {
                    input.addEventListener('change', (e) => {
                        const file = e.target.files[0];
                        if (!file) return;

                        const fileName = input.name;
                        let maxSize, allowedTypes;

                        switch (fileName) {
                            case 'video':
                                maxSize = 10 * 1024 * 1024; // 10MB
                                allowedTypes = ['video/mp4', 'video/mov', 'video/avi', 'video/wmv'];
                                break;
                            case 'passport_photo':
                                maxSize = 1 * 1024 * 1024; // 1MB
                                allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];
                                break;
                            case 'additional_docs':
                                maxSize = 10 * 1024 * 1024; // 10MB
                                allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
                                break;
                        }

                        if (file.size > maxSize) {
                            this.showAlert(`File size too large. Maximum allowed: ${this.formatFileSize(maxSize)}`, 'error');
                            input.value = '';
                            return;
                        }

                        if (!allowedTypes.includes(file.type)) {
                            this.showAlert('Invalid file type. Please check the allowed formats.', 'error');
                            input.value = '';
                            return;
                        }

                        this.showAlert(`File "${file.name}" uploaded successfully!`, 'success');
                    });
                });
            }

            setupProgressTracking() {
                const sections = document.querySelectorAll('.form-section');
                const progressSteps = document.querySelectorAll('.progress-step');

                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const sectionIndex = Array.from(sections).indexOf(entry.target);
                            if (sectionIndex >= 0 && sectionIndex < progressSteps.length) {
                                this.updateProgress(sectionIndex + 1);
                            }
                        }
                    });
                }, { threshold: 0.5 });

                sections.forEach(section => observer.observe(section));
            }

            setupAutoSave() {
                // Auto-save form data to prevent data loss
                let saveTimeout;
                this.form.addEventListener('input', () => {
                    clearTimeout(saveTimeout);
                    saveTimeout = setTimeout(() => {
                        this.saveFormData();
                    }, 2000);
                });

                // Load saved data on page load
                this.loadFormData();
            }

            updateProgress(step) {
                if (step === this.currentStep) return;
                
                const progressSteps = document.querySelectorAll('.progress-step');
                progressSteps.forEach((stepEl, index) => {
                    if (index < step) {
                        stepEl.classList.add('active');
                    } else {
                        stepEl.classList.remove('active');
                    }
                });
                
                this.currentStep = step;
            }

            validateField(field) {
                const errorDiv = field.parentNode.querySelector('.validation-error');
                
                // Remove existing error
                if (errorDiv) {
                    errorDiv.remove();
                }
                field.classList.remove('error');

                // Check if field is valid
                if (field.hasAttribute('required') && !field.value.trim()) {
                    this.showFieldError(field, 'This field is required');
                    return false;
                }

                // Email validation
                if (field.type === 'email' && field.value) {
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(field.value)) {
                        this.showFieldError(field, 'Please enter a valid email address');
                        return false;
                    }
                }

                // Phone validation
                if (field.type === 'tel' && field.value) {
                    const phoneRegex = /^(\+234|0)[789][01]\d{8}$/;
                    if (!phoneRegex.test(field.value.replace(/\s/g, ''))) {
                        this.showFieldError(field, 'Please enter a valid Nigerian phone number');
                        return false;
                    }
                }

                // Date validation (age check)
                if (field.type === 'date' && field.name === 'birth_date' && field.value) {
                    const birthDate = new Date(field.value);
                    const today = new Date();
                    const age = today.getFullYear() - birthDate.getFullYear();
                    
                    if (age < 18 || age > 35) {
                        this.showFieldError(field, 'Applicants must be between 18 and 35 years old');
                        return false;
                    }
                }

                return true;
            }

            showFieldError(field, message) {
                field.classList.add('error');
                
                const errorDiv = document.createElement('div');
                errorDiv.className = 'validation-error';
                errorDiv.innerHTML = `<i class="fas fa-exclamation-circle"></i> ${message}`;
                
                field.parentNode.appendChild(errorDiv);
            }

            async handleSubmit(e) {
                e.preventDefault();
                
                if (this.isSubmitting) return;
                
                // Validate all fields
                const isValid = this.validateForm();
                if (!isValid) {
                    this.showAlert('Please correct the errors in the form before submitting.', 'error');
                    return;
                }

                this.setSubmittingState(true);

                try {
                    const formData = new FormData(this.form);
                    
                    // Simulate form submission (replace with actual submission)
                    await this.simulateSubmission(formData);
                    
                    this.showAlert('Application submitted successfully! You will receive a confirmation email shortly.', 'success');
                    this.clearFormData();
                    
                } catch (error) {
                    console.error('Submission error:', error);
                    this.showAlert('An error occurred while submitting your application. Please try again.', 'error');
                } finally {
                    this.setSubmittingState(false);
                }
            }

            validateForm() {
                const requiredFields = this.form.querySelectorAll('[required]');
                let isValid = true;
                let firstError = null;

                requiredFields.forEach(field => {
                    if (!this.validateField(field)) {
                        isValid = false;
                        if (!firstError) firstError = field;
                    }
                });

                // Scroll to first error
                if (firstError) {
                    firstError.scrollIntoView({ 
                        behavior: 'smooth', 
                        block: 'center' 
                    });
                    firstError.focus();
                }

                return isValid;
            }

            setSubmittingState(isSubmitting) {
                this.isSubmitting = isSubmitting;
                const btnText = this.submitBtn.querySelector('.btn-text');
                const spinner = this.submitBtn.querySelector('.spinner');
                
                if (isSubmitting) {
                    btnText.textContent = 'Submitting...';
                    spinner.style.display = 'inline-block';
                    this.submitBtn.disabled = true;
                } else {
                    btnText.textContent = 'Submit Application';
                    spinner.style.display = 'none';
                    this.submitBtn.disabled = false;
                }
            }

            async simulateSubmission(formData) {
                // Simulate network delay
                return new Promise((resolve) => {
                    setTimeout(resolve, 2000);
                });
            }

            showAlert(message, type = 'success') {
                const alertContainer = document.getElementById('alertContainer');
                const alert = document.createElement('div');
                alert.className = `alert alert-${type}`;
                alert.innerHTML = `
                    <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-triangle'}"></i>
                    ${message}
                `;
                
                alertContainer.appendChild(alert);
                
                setTimeout(() => {
                    alert.style.animation = 'slideInRight 0.5s ease-out reverse';
                    setTimeout(() => alert.remove(), 500);
                }, 4000);
            }

            saveFormData() {
                const formData = new FormData(this.form);
                const data = {};
                
                for (let [key, value] of formData.entries()) {
                    if (typeof value === 'string') {
                        data[key] = value;
                    }
                }
                
                // Store in memory instead of localStorage
                this.savedData = data;
            }

            loadFormData() {
                if (this.savedData) {
                    Object.entries(this.savedData).forEach(([key, value]) => {
                        const field = this.form.querySelector(`[name="${key}"]`);
                        if (field && field.type !== 'file') {
                            field.value = value;
                        }
                    });
                }
            }

            clearFormData() {
                this.savedData = null;
            }

            hasUnsavedChanges() {
                return this.savedData && Object.keys(this.savedData).length > 0;
            }

            formatFileSize(bytes) {
                const sizes = ['B', 'KB', 'MB', 'GB'];
                if (bytes === 0) return '0 B';
                const i = Math.floor(Math.log(bytes) / Math.log(1024));
                return Math.round(bytes / Math.pow(1024, i) * 100) / 100 + ' ' + sizes[i];
            }
        }

        // Initialize the form when DOM is loaded
        document.addEventListener('DOMContentLoaded', () => {
            new FellowshipForm();
        });

        // Additional utility functions
        function smoothScrollTo(element) {
            element.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }

        // Add modern form styling enhancements
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentNode.classList.add('focused');
            });
            
            input.addEventListener('blur', function() {
                this.parentNode.classList.remove('focused');
            });
        });
    </script>
</body>
</html>