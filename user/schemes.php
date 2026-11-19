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
    <meta name="description" content="Explore central and state government schemes across agriculture, business, health, housing, and social welfare.">
    <title>Government Schemes Directory | Yojna Sathi</title>
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
                <a class="nav-link active" href="schemes.php">Schemes</a>
                <a class="nav-link" href="scholarships.php">Scholarships</a>

                <div class="nav-dropdown">
                    <button class="nav-dropdown-toggle" type="button" aria-expanded="false" aria-haspopup="true">
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
                    <a href="../index.php">Home</a> &gt; <span>Government Schemes</span>
                </div>
                <p class="eyebrow">Citizen Services & Welfare</p>
                <h1>Explore Government Schemes</h1>
                <p>Browse verified public welfare initiatives, agricultural aid, subsidized credit facilities, healthcare cards, and housing grants with plain-language guidelines.</p>
            </div>
        </section>

        <!-- Schemes Directory -->
        <section class="schemes-section" style="padding-top: 0;">
            <div class="container">
                <!-- Search Bar -->
                <div class="search-bar-wrap">
                    <div class="search-bar">
                        <svg viewBox="0 0 20 20" aria-hidden="true">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                        <input id="scheme-search" type="search" placeholder="Search by scheme name, keywords, or citizen group..." aria-label="Search schemes">
                        <button type="button" class="search-clear-btn" id="search-clear" aria-label="Clear search">&#10005;</button>
                    </div>
                    <span class="results-count" id="results-count">Showing all programs</span>
                </div>

                <!-- Category Filters -->
                <div class="category-row" aria-label="Filter Schemes">
                    <button class="category active" type="button" data-filter="all">
                        All Programs <span class="category-badge">7</span>
                    </button>
                    <button class="category" type="button" data-filter="farmer">
                        Farmers & Agriculture <span class="category-badge">2</span>
                    </button>
                    <button class="category" type="button" data-filter="business">
                        Business & Startups <span class="category-badge">2</span>
                    </button>
                    <button class="category" type="button" data-filter="family">
                        Health & Family <span class="category-badge">1</span>
                    </button>
                    <button class="category" type="button" data-filter="housing">
                        Housing <span class="category-badge">1</span>
                    </button>
                    <button class="category" type="button" data-filter="education">
                        Education <span class="category-badge">1</span>
                    </button>
                </div>

                <!-- Scheme Grid -->
                <div class="scheme-grid" id="scheme-list">
                    <!-- Scheme 1: Farmer -->
                    <article class="scheme-card" data-category="farmer" data-search="farm loan assistance farmer agriculture kisan crop equipment subsidy tractor">
                        <div class="card-meta">
                            <span class="card-icon green">AG</span>
                            <span class="status-badge open">Open Now</span>
                        </div>
                        <h3>Kisan Farm Loan & Equipment Grant</h3>
                        <p>Low-interest working credit and up to 50% capital subsidies to purchase farm machinery, tractors, solar water pumps, and modern seed stock.</p>
                        <div class="scheme-tags">
                            <span class="scheme-tag">Farmers</span>
                            <span class="scheme-tag">4% Subsidized Interest</span>
                            <span class="scheme-tag">Equipment</span>
                        </div>
                        <div class="scheme-card-footer">
                            <a href="scheme-details.php?type=farmer">Check Eligibility <span>&#8594;</span></a>
                        </div>
                    </article>

                    <!-- Scheme 2: Business -->
                    <article class="scheme-card" data-category="business" data-search="small business startup enterprise msme mudra loan capital grant entrepreneur shopkeeper">
                        <div class="card-meta">
                            <span class="card-icon coral">BU</span>
                            <span class="status-badge open">Open Now</span>
                        </div>
                        <h3>MSME Micro-Enterprise Growth Loan</h3>
                        <p>Collateral-free working capital loans up to ₹10 Lakh for retail shops, artisan workshops, and young entrepreneurs seeking expansion.</p>
                        <div class="scheme-tags">
                            <span class="scheme-tag">Small Business</span>
                            <span class="scheme-tag">Up to ₹10 Lakh</span>
                            <span class="scheme-tag">Collateral-free</span>
                        </div>
                        <div class="scheme-card-footer">
                            <a href="scheme-details.php?type=business">Check Eligibility <span>&#8594;</span></a>
                        </div>
                    </article>

                    <!-- Scheme 3: Health -->
                    <article class="scheme-card" data-category="family" data-search="healthcare support family medical insurance ayushman hospitalization health card wellness">
                        <div class="card-meta">
                            <span class="card-icon blue">HE</span>
                            <span class="status-badge open">Open Now</span>
                        </div>
                        <h3>Ayushman National Health Protection</h3>
                        <p>Comprehensive cashless hospitalisation coverage of up to ₹5 Lakh per family per year across 28,000+ empaneled public & private hospitals.</p>
                        <div class="scheme-tags">
                            <span class="scheme-tag">All Citizens</span>
                            <span class="scheme-tag">₹5 Lakh Coverage</span>
                            <span class="scheme-tag">Cashless</span>
                        </div>
                        <div class="scheme-card-footer">
                            <a href="scheme-details.php?type=health">Check Eligibility <span>&#8594;</span></a>
                        </div>
                    </article>

                    <!-- Scheme 4: Housing -->
                    <article class="scheme-card" data-category="housing" data-search="housing urban rural home construction grant pm awas subsidy shelter first home">
                        <div class="card-meta">
                            <span class="card-icon purple">HO</span>
                            <span class="status-badge open">Open Now</span>
                        </div>
                        <h3>Pradhan Mantri Awas Housing Grant</h3>
                        <p>Direct financial assistance and home loan interest subsidy up to ₹2.67 Lakh for building or purchasing your first permanent pucca home.</p>
                        <div class="scheme-tags">
                            <span class="scheme-tag">First-time Owners</span>
                            <span class="scheme-tag">₹2.67 Lakh Subsidy</span>
                            <span class="scheme-tag">Housing</span>
                        </div>
                        <div class="scheme-card-footer">
                            <a href="scheme-details.php?type=housing">Check Eligibility <span>&#8594;</span></a>
                        </div>
                    </article>

                    <!-- Scheme 5: Women & Business -->
                    <article class="scheme-card" data-category="business" data-search="women entrepreneurship skill grant female self help group stree shakti cottage industry">
                        <div class="card-meta">
                            <span class="card-icon coral">WO</span>
                            <span class="status-badge upcoming">Applications Soon</span>
                        </div>
                        <h3>Women Entrepreneurship & Seed Fund</h3>
                        <p>Specialized grant and zero-interest micro-loans for women-led enterprises, self-help groups, and home-based manufacturing units.</p>
                        <div class="scheme-tags">
                            <span class="scheme-tag">Women Only</span>
                            <span class="scheme-tag">Seed Capital</span>
                            <span class="scheme-tag">Mentorship</span>
                        </div>
                        <div class="scheme-card-footer">
                            <a href="scheme-details.php?type=women">Check Eligibility <span>&#8594;</span></a>
                        </div>
                    </article>

                    <!-- Scheme 6: Crop Insurance -->
                    <article class="scheme-card" data-category="farmer" data-search="crop insurance fasal bima drought flood damage compensation farmer agriculture weather">
                        <div class="card-meta">
                            <span class="card-icon green">CI</span>
                            <span class="status-badge open">Open Now</span>
                        </div>
                        <h3>Comprehensive Crop Insurance (PMFBY)</h3>
                        <p>Insurance coverage and financial support to farmers in the event of failure of any of the notified crops as a result of natural calamities.</p>
                        <div class="scheme-tags">
                            <span class="scheme-tag">Kharif & Rabi</span>
                            <span class="scheme-tag">1.5% Premium</span>
                            <span class="scheme-tag">Instant Payout</span>
                        </div>
                        <div class="scheme-card-footer">
                            <a href="scheme-details.php?type=crop">Check Eligibility <span>&#8594;</span></a>
                        </div>
                    </article>

                    <!-- Scheme 7: Education Skill -->
                    <article class="scheme-card" data-category="education" data-search="skill development training youth technical placement certification apprentice">
                        <div class="card-meta">
                            <span class="card-icon yellow">SK</span>
                            <span class="status-badge open">Open Now</span>
                        </div>
                        <h3>National Youth Skill & Apprentice Grant</h3>
                        <p>Free certified industrial training with a monthly stipend of ₹8,000 for high school & ITI graduates to guarantee workforce readiness.</p>
                        <div class="scheme-tags">
                            <span class="scheme-tag">Youth (18-29)</span>
                            <span class="scheme-tag">₹8,000 / month</span>
                            <span class="scheme-tag">Certified</span>
                        </div>
                        <div class="scheme-card-footer">
                            <a href="scheme-details.php?type=education">Check Eligibility <span>&#8594;</span></a>
                        </div>
                    </article>
                </div>

                <!-- Empty State -->
                <div class="empty-state" id="empty-state" hidden>
                    <svg viewBox="0 0 24 24">
                        <path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
                    </svg>
                    <h3>No matching schemes found</h3>
                    <p>Try searching with another keyword or resetting the category filter.</p>
                    <button class="button button-secondary" type="button" id="reset-filters-btn">Reset All Filters</button>
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
                    <p>A citizen-first digital initiative designed to connect every resident with eligible welfare schemes, public grants, and scholarships.</p>
                </div>

                <div class="footer-col">
                    <h4>Citizen Services</h4>
                    <ul class="footer-links">
                        <li><a href="schemes.php">Government Schemes</a></li>
                        <li><a href="scholarships.php">Student Scholarships</a></li>
                        <li><a href="scheme-details.php?type=farmer">Kisan Agriculture Aid</a></li>
                        <li><a href="scheme-details.php?type=business">MSME Business Capital</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Quick Links</h4>
                    <ul class="footer-links">
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="announcements.php">Updates & Deadlines</a></li>
                        <li><a href="contact.php">Helpdesk & Contact</a></li>
                        <li><a href="../admin/index.php" style="color: var(--accent-gold); font-weight: 700;">Administrator Access</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Helpline</h4>
                    <p style="font-size: 0.9rem; color: #94a3b8; line-height: 1.6;">
                        Toll-Free Support:<br>
                        <strong style="color: var(--accent-gold); font-size: 1.1rem;">1800-111-2026</strong><br>
                        Mon - Fri (9 AM - 6 PM)
                    </p>
                </div>
            </div>

            <div class="footer-bottom">
                <span>&copy; <?= date('Y') ?> Yojna Sathi. Dedicated to transparent public service.</span>
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