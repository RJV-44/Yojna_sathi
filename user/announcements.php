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
    <meta name="description" content="Official updates, newly launched schemes, and application deadlines for Indian citizens.">
    <title>Announcements & Updates | Yojna Sathi</title>
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
                        <a class="nav-dropdown-item active" href="announcements.php">
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
                        <a class="nav-dropdown-item" href="contact.php">
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
                    <a href="../index.php">Home</a> &gt; <span>Announcements</span>
                </div>
                <p class="eyebrow">Stay Informed</p>
                <h1>Latest Scheme Updates & Deadlines</h1>
                <p>Track newly announced citizen welfare packages, extended scholarship submission windows, and policy revisions in real-time.</p>
            </div>
        </section>

        <!-- Announcements List -->
        <div class="container" style="padding-bottom: 80px;">
            <div class="announcement-list">
                <!-- Announcement 1 -->
                <article class="announcement-item">
                    <div class="announcement-meta">
                        <span class="priority-tag priority-urgent">Urgent Deadline</span>
                        <span class="announcement-date">October 18, 2026</span>
                        <span class="scheme-tag">Education</span>
                    </div>
                    <h2>National Merit Scholarship Applications Open for Academic Year 2026-27</h2>
                    <p>The Ministry of Education has opened fresh and renewal registrations on the National Scholarship Portal. Eligible students with over 80% marks in 12th standard are advised to complete their OTR authentication before the cutoff deadline on October 31, 2026.</p>
                    <div>
                        <a href="scholarship-details.php?type=merit">View Scholarship Details <span>&#8594;</span></a>
                    </div>
                </article>

                <!-- Announcement 2 -->
                <article class="announcement-item">
                    <div class="announcement-meta">
                        <span class="priority-tag priority-new">New Launch</span>
                        <span class="announcement-date">October 12, 2026</span>
                        <span class="scheme-tag">Agriculture</span>
                    </div>
                    <h2>Kisan Machinery & Solar Pump Capital Subsidy Window Announced</h2>
                    <p>Applications for 50% capital grant vouchers for solar water pumps and rotavators are now live across all notified agrarian districts. Farmers possessing valid land record extracts (Khata/Khasra) can submit claims through designated cooperative banks.</p>
                    <div>
                        <a href="scheme-details.php?type=farmer">Check Farm Grant Guidelines <span>&#8594;</span></a>
                    </div>
                </article>

                <!-- Announcement 3 -->
                <article class="announcement-item">
                    <div class="announcement-meta">
                        <span class="priority-tag priority-notice">Policy Notice</span>
                        <span class="announcement-date">September 29, 2026</span>
                        <span class="scheme-tag">Health</span>
                    </div>
                    <h2>Ayushman Golden Card Drive Extended Across All Rural Primary Centers</h2>
                    <p>All citizens aged 70 and above, regardless of income bracket, can now generate their Ayushman Vay Vandana card for ₹5 Lakh annual cashless hospital coverage. Visit any local hospital or CSC with your Aadhaar card for immediate issuance.</p>
                    <div>
                        <a href="scheme-details.php?type=health">Read Healthcare Guide <span>&#8594;</span></a>
                    </div>
                </article>

                <!-- Announcement 4 -->
                <article class="announcement-item">
                    <div class="announcement-meta">
                        <span class="priority-tag priority-notice">Important Advisory</span>
                        <span class="announcement-date">September 15, 2026</span>
                        <span class="scheme-tag">Banking & DBT</span>
                    </div>
                    <h2>Mandatory Aadhaar Seeding on NPCI Mapper for DBT Beneficiaries</h2>
                    <p>All scholarship recipients and farm subsidy applicants must ensure their bank account is seeded with Aadhaar. Unseeded accounts may experience payment delays during the upcoming quarterly disbursement cycle.</p>
                    <div>
                        <a href="contact.php">Need Assistance? Contact Support <span>&#8594;</span></a>
                    </div>
                </article>
            </div>
        </div>
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
                    <p>Direct citizen information gateway for public schemes and scholarships.</p>
                </div>

                <div class="footer-col">
                    <h4>Browse</h4>
                    <ul class="footer-links">
                        <li><a href="schemes.php">Government Schemes</a></li>
                        <li><a href="scholarships.php">Student Scholarships</a></li>
                        <li><a href="about.php">About Us</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Help & Support</h4>
                    <ul class="footer-links">
                        <li><a href="contact.php">Helpdesk Contact</a></li>
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
                <span>&copy; <?= date('Y') ?> Yojna Sathi. Dedicated to citizen welfare.</span>
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