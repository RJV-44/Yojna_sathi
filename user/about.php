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
    <meta name="description" content="Learn about Yojna Sathi's mission to make government schemes and citizen benefits accessible, understandable, and actionable.">
    <title>About Us | Yojna Sathi</title>
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
                        <a class="nav-dropdown-item active" href="about.php">
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
                    <a href="../index.php">Home</a> &gt; <span>About Us</span>
                </div>
                <p class="eyebrow">Our Purpose & Mission</p>
                <h1>Making public support easier to find, understand, and claim.</h1>
                <p>Every year, hundreds of welfare programs and educational scholarships go unclaimed simply because citizens do not know they qualify or get overwhelmed by official paperwork. Yojna Sathi solves that problem.</p>
            </div>
        </section>

        <!-- About Story Grid -->
        <section class="container about-grid">
            <div>
                <p class="eyebrow">Citizen First Tech</p>
                <h2 style="font-family: var(--font-heading); font-size: 2.2rem; font-weight: 800; color: var(--ink); margin-bottom: 18px; line-height: 1.2;">
                    A unified digital bridge between the government and the citizen.
                </h2>
                <p style="color: var(--muted); line-height: 1.7; margin-bottom: 20px; font-size: 1.05rem;">
                    Government portals are often fragmented across dozens of different ministries, departments, and regional portals. Finding out whether you qualify for an agricultural subsidy, a tuition waiver, or a micro-business credit line used to require hours of searching through confusing PDF gazettes.
                </p>
                <p style="color: var(--muted); line-height: 1.7; font-size: 1.05rem;">
                    <strong>Yojna Sathi</strong> organizes this vast ocean of public policy into structured, searchable cards with plain-language eligibility checklists, required document lists, and direct links to authentic application gateways.
                </p>
            </div>

            <div class="about-highlight-box">
                <div class="eyebrow" style="color: var(--primary);">Key Impact Metrics</div>
                <strong>120+ Schemes Curated Across 35 Sectors</strong>
                <p>From primary school grants to post-doctoral fellowships, tractor subsidies to health cards, our verified database is constantly updated with official notifications.</p>
                <div style="margin-top: 24px;">
                    <a class="button button-primary" href="schemes.php">Explore All Programs &rarr;</a>
                </div>
            </div>
        </section>

        <!-- Core Values -->
        <section class="values-section" style="background: var(--surface-alt); border-top: 1px solid var(--line); border-bottom: 1px solid var(--line);">
            <div class="container">
                <div class="section-heading" style="text-align: center; display: block; margin-bottom: 48px;">
                    <p class="eyebrow">Guiding Principles</p>
                    <h2 style="margin: 0 auto; max-width: 650px;">Useful information, thoughtfully and honestly presented.</h2>
                </div>

                <div class="value-grid">
                    <article class="value-card">
                        <div class="value-card-icon">&#9997;</div>
                        <h3>Clarity First</h3>
                        <p>No legal jargon or confusing administrative terms. We translate complex scheme notifications into straightforward sentences that any citizen can understand.</p>
                    </article>

                    <article class="value-card">
                        <div class="value-card-icon">&#128187;</div>
                        <h3>Access for Everyone</h3>
                        <p>Our platform is lightweight, mobile-optimized, fast-loading, and completely free to use on any smartphone or tablet, even on slower 3G/4G rural mobile connections.</p>
                    </article>

                    <article class="value-card">
                        <div class="value-card-icon">&#128640;</div>
                        <h3>Action Over Bureaucracy</h3>
                        <p>We don't stop at telling you what exists. We provide ready document checklists, step-by-step guides, and direct links to the official government portal to submit your form.</p>
                    </article>
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
                    <p>Designed for citizen welfare, transparent digital governance, and equal opportunity.</p>
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