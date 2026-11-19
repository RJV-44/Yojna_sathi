<?php
session_start();
$isLoggedIn = isset($_SESSION['user']);
$user = $_SESSION['user'] ?? null;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Get help with government schemes, scholarships, or application tracking. Contact the Yojna Sathi citizen helpdesk.">
    <title>Contact & Helpdesk | Yojna Sathi</title>
    <link rel="stylesheet" href="../assets/css/home.css?v=<?= time() ?>">
    <link rel="stylesheet" href="../assets/css/user-pages.css?v=<?= time() ?>">
    <link rel="stylesheet" href="../assets/css/validation.css?v=<?= time() ?>">
</head>

<body>
    <!-- Site Header -->
    <header class="site-header" id="topHeader">
        <div class="container nav-wrap">
            <a class="brand" href="../index.php" aria-label="Yojna Sathi Home">
                <span class="brand-mark">YS</span>
                <span class="brand-copy">
                    <strong>Yojna Sathi</strong>
                    <small>Your benefits, one place</small>
                </span>
            </a>

            <nav class="main-nav" aria-label="Primary navigation">
                <a class="nav-link" href="../index.php">Home</a>
                <a class="nav-link" href="schemes.php">Schemes</a>
                <a class="nav-link" href="scholarships.php">Scholarships</a>

                <div class="nav-dropdown">
                    <button class="nav-dropdown-toggle active" type="button" aria-expanded="false" aria-haspopup="true">
                        <span>More</span>
                        <svg class="chevron-icon" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    <div class="nav-dropdown-menu">
                        <a class="nav-dropdown-item" href="announcements.php">
                            <span class="dropdown-icon">📢</span>
                            <div class="dropdown-item-text">
                                <span class="dropdown-title">Updates & Alerts</span>
                                <span class="dropdown-desc">Latest news & scheme deadlines</span>
                            </div>
                        </a>
                        <a class="nav-dropdown-item" href="about.php">
                            <span class="dropdown-icon">ℹ️</span>
                            <div class="dropdown-item-text">
                                <span class="dropdown-title">About Us</span>
                                <span class="dropdown-desc">Mission, values & citizen impact</span>
                            </div>
                        </a>
                        <a class="nav-dropdown-item active" href="contact.php">
                            <span class="dropdown-icon">📞</span>
                            <div class="dropdown-item-text">
                                <span class="dropdown-title">Help & Contact</span>
                                <span class="dropdown-desc">Toll-free helpline & citizen support</span>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="nav-divider" aria-hidden="true"></div>

                <div class="nav-actions">
                    <?php if ($isLoggedIn): ?>
                        <a class="nav-user-chip" href="profile.php">
                            <span class="nav-user-avatar"><?= strtoupper(substr($user['name'] ?? 'U', 0, 1)) ?></span>
                            <span><?= htmlspecialchars(strtok($user['name'] ?? 'User', ' ')) ?></span>
                        </a>
                        <a class="nav-login" href="logout.php">Logout</a>
                    <?php else: ?>
                        <a class="nav-login" href="login.php">Login</a>
                        <a class="button button-primary nav-register" href="register.php">Register</a>
                    <?php endif; ?>
                </div>
            </nav>

            <button class="menu-toggle" type="button" aria-label="Toggle navigation" aria-expanded="false">
                <div class="menu-toggle-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
        </div>
    </header>

    <main>
        <!-- Page Hero -->
        <section class="page-hero">
            <div class="container page-hero-content">
                <div class="breadcrumbs">
                    <a href="../index.php">Home</a> &gt; <span>Contact Support</span>
                </div>
                <p class="eyebrow">We Are Here to Assist You</p>
                <h1>Citizen Helpdesk & Support</h1>
                <p>Have questions regarding scheme eligibility, required certificates, or scholarship deadlines? Reach out to our dedicated support team or browse the common questions below.</p>
            </div>
        </section>

        <!-- Contact Form & Info Grid -->
        <div class="container contact-layout">
            <!-- Left Info Cards -->
            <div class="contact-info">
                <div class="contact-method-card">
                    <div class="contact-method-icon">&#9742;</div>
                    <div class="contact-method-content">
                        <strong>Toll-Free Citizen Helpline</strong>
                        <span>1800-111-2026</span>
                        <small>Available Monday to Friday, 9:00 AM – 6:00 PM</small>
                    </div>
                </div>

                <div class="contact-method-card">
                    <div class="contact-method-icon">&#9993;</div>
                    <div class="contact-method-content">
                        <strong>Email Support Desk</strong>
                        <span>help@yojnasathi.in</span>
                        <small>Average turnaround time: Under 24 hours</small>
                    </div>
                </div>

                <div class="contact-method-card">
                    <div class="contact-method-icon">&#128337;</div>
                    <div class="contact-method-content">
                        <strong>Operating Hours</strong>
                        <span>Mon - Sat: 9:00 AM - 6:00 PM</span>
                        <small>Closed on National Gazetted Holidays</small>
                    </div>
                </div>

                <div class="contact-method-card">
                    <div class="contact-method-icon">&#127963;</div>
                    <div class="contact-method-content">
                        <strong>Citizen Grievance Cell</strong>
                        <span>Central Civic Center, New Delhi</span>
                        <small>Direct assistance for senior citizens & disabled persons</small>
                    </div>
                </div>
            </div>

            <!-- Right Form Card -->
            <div class="contact-form-card">
                <h2>Send Us a Message</h2>
                <p>Fill out the form below and an advisor will guide you on appropriate schemes.</p>

                <form class="contact-form" id="contactForm" novalidate>
                    <div class="form-group">
                        <label for="name">Your Full Name <span style="color: var(--accent-coral);">*</span></label>
                        <input class="form-input" id="name" name="name" type="text" placeholder="e.g. Ramesh Kumar" value="<?= htmlspecialchars($user['name'] ?? '') ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address <span style="color: var(--accent-coral);">*</span></label>
                        <input class="form-input" id="email" name="email" type="email" placeholder="you@example.com" value="<?= htmlspecialchars($user['email'] ?? '') ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="query-category">Query Category</label>
                        <select class="form-select" id="query-category" name="category">
                            <option value="general">General Scheme Inquiry</option>
                            <option value="scholarship">Scholarship & Student Funding</option>
                            <option value="farmer">Agricultural Aid & Kisan Loans</option>
                            <option value="business">MSME & Small Business Support</option>
                            <option value="technical">Technical Issue on Portal</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message">How Can We Help You? <span style="color: var(--accent-coral);">*</span></label>
                        <textarea class="form-textarea" id="message" name="message" rows="5" placeholder="Describe the scheme or issue you need guidance on (min 10 characters)..." required></textarea>
                    </div>

                    <button class="button button-primary" type="submit" style="width: 100%;">
                        Submit Message <span aria-hidden="true">&#8594;</span>
                    </button>

                    <p id="contact-success" class="form-success" hidden style="margin-top: 16px; padding: 12px; background: var(--accent-green-soft); border-radius: var(--radius-md); color: #065f46; font-weight: 600;">
                        &#10003; Thank you! Your message has been received. Our support team will contact you shortly.
                    </p>
                </form>
            </div>
        </div>

        <!-- FAQ Section -->
        <section class="faq-section">
            <div class="container">
                <div class="section-heading" style="text-align: center; display: block;">
                    <p class="eyebrow">Frequently Asked Questions</p>
                    <h2 style="margin: 0 auto; max-width: 600px;">Answers to Common Citizen Questions</h2>
                </div>

                <div class="faq-list">
                    <!-- FAQ 1 -->
                    <div class="faq-item open">
                        <button class="faq-question" type="button" aria-expanded="true">
                            <span>Does Yojna Sathi charge any fee to check or apply for schemes?</span>
                            <span class="faq-arrow">&#9660;</span>
                        </button>
                        <div class="faq-answer">
                            No, never. Yojna Sathi is a 100% free informational and citizen guidance portal. All central and state government schemes are accessible directly without middleman commissions.
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="faq-item">
                        <button class="faq-question" type="button" aria-expanded="false">
                            <span>What documents are most commonly needed to apply for public benefits?</span>
                            <span class="faq-arrow">&#9660;</span>
                        </button>
                        <div class="faq-answer">
                            The primary documents include an Aadhaar Card, an active Bank Account passbook seeded with Aadhaar (NPCI enabled), a valid Income Certificate from the local Tehsildar or Revenue Officer, and an address proof (Ration Card or Electricity Bill).
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="faq-item">
                        <button class="faq-question" type="button" aria-expanded="false">
                            <span>What does "Aadhaar Seeded Bank Account" mean?</span>
                            <span class="faq-arrow">&#9660;</span>
                        </button>
                        <div class="faq-answer">
                            Direct Benefit Transfer (DBT) sends money via Aadhaar numbers through the NPCI gateway. Your bank branch must link ("seed") your Aadhaar number to your savings account so welfare payments credit instantly without bouncing.
                        </div>
                    </div>

                    <!-- FAQ 4 -->
                    <div class="faq-item">
                        <button class="faq-question" type="button" aria-expanded="false">
                            <span>How do I track the status of my submitted application?</span>
                            <span class="faq-arrow">&#9660;</span>
                        </button>
                        <div class="faq-answer">
                            When you submit an application on the official ministry portal (like NSP for scholarships or JanSamarth for loans), you receive an Application Reference Number (ARN). You can log into the respective official portal to check real-time approval stages.
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <a class="brand" href="../index.php" style="margin-bottom: 14px;">
                        <span class="brand-mark">YS</span>
                        <span class="brand-copy">
                            <strong style="color: #ffffff;">Yojna Sathi</strong>
                            <small style="color: #94a3b8;">Your benefits, one place</small>
                        </span>
                    </a>
                    <p>Connecting every Indian resident with eligible public welfare programs and educational scholarships.</p>
                </div>

                <div class="footer-col">
                    <h4>Browse</h4>
                    <ul class="footer-links">
                        <li><a href="schemes.php">Government Schemes</a></li>
                        <li><a href="scholarships.php">Student Scholarships</a></li>
                        <li><a href="announcements.php">Latest Deadlines</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>About</h4>
                    <ul class="footer-links">
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="contact.php">Contact & Support</a></li>
                        <li><a href="../admin/index.php" style="color: var(--accent-gold); font-weight: 700;">Administrator Access</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Helpline</h4>
                    <p style="font-size: 0.9rem; color: #94a3b8; line-height: 1.6;">
                        Toll-Free Support:<br>
                        <strong style="color: var(--accent-gold); font-size: 1.1rem;">1800-111-2026</strong>
                    </p>
                </div>
            </div>

            <div class="footer-bottom">
                <span>&copy; <?= date('Y') ?> Yojna Sathi. Dedicated to public welfare.</span>
                <div style="display: flex; gap: 20px;">
                    <a href="../index.php">Home</a>
                    <a href="#topHeader">Back to Top &#8593;</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/validation.js"></script>
</body>

</html>